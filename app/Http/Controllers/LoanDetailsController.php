<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class LoanDetailsController extends Controller
{
    public function index()
    {
        $loans = DB::table('loan_details')->get();
        
        return view('loan_details.index', compact('loans'));
    }

    public function emiView()
    {
        $emiDetails = DB::table('emi_details')->get();
        
        return view('emi_details.index', compact('emiDetails'));
    }

    public function processData()
    {
        // Drop and recreate emi_details table
        Schema::dropIfExists('emi_details');

        $loanDetails = DB::table('loan_details')->get();

        if ($loanDetails->isEmpty()) {
            return "No loan details found.";
        }

        $minDate = $loanDetails->min('first_payment_date');
        $maxDate = $loanDetails->max('last_payment_date');

        $columns = $this->generateDynamicColumns($minDate, $maxDate);

        Schema::create('emi_details', function (Blueprint $table) use ($columns) {
            $table->unsignedBigInteger('clientid');
            foreach ($columns as $column) {
                $table->decimal($column, 10, 2)->default(0);
            }
        });

        // Process and insert data
        foreach ($loanDetails as $loan) {
            $this->insertEmiDetails($loan, $columns);
        }

        $emiDetails = DB::table('emi_details')->get();
        
        return view('emi_details.index', compact('emiDetails'));
    }

    private function generateDynamicColumns($minDate, $maxDate)
    {
        $start = new \DateTime($minDate);
        $end = new \DateTime($maxDate);
        $interval = new \DateInterval('P1M');
        $period = new \DatePeriod($start, $interval, $end->add($interval));

        $columns = [];
        foreach ($period as $dt) {
            $columns[] = $dt->format("Y_M");
        }

        return $columns;
    }

    private function insertEmiDetails($loan, $columns)
    {
        $start = new \DateTime($loan->first_payment_date);
        $interval = new \DateInterval('P1M');
        $numPayments = $loan->num_of_payment;
        $emiAmount = $loan->loan_amount / $numPayments;

        $data = ['clientid' => $loan->clientid];
        $totalEmi = 0;
        for ($i = 0; $i < $numPayments; $i++) {
            $column = $start->add($interval)->format("Y_M");
            $data[$column] = $emiAmount;
            $totalEmi += $emiAmount;
        }

        // Adjust the last payment to match total loan amount
        if ($totalEmi != $loan->loan_amount) {
            $adjustment = $loan->loan_amount - $totalEmi;
            $data[$column] += $adjustment;
        }

        DB::table('emi_details')->insert($data);
    }

}
