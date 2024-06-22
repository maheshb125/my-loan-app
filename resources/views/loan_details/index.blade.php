@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th scope="col" class="px-2 py-2 border-gray-200 text-gray-900 text-left text-sm uppercase font-semibold">ID</th>
                            <th scope="col" class="px-2 py-2 border-gray-200 text-gray-900 text-left text-sm uppercase font-semibold">Num of Payment</th>
                            <th scope="col" class="px-2 py-2 border-gray-200 text-gray-900 text-left text-sm uppercase font-semibold">First Payment Date</th>
                            <th scope="col" class="px-2 py-2 border-gray-200 text-gray-900 text-left text-sm uppercase font-semibold">Last Payment Date</th>
                            <th scope="col" class="px-2 py-2 border-gray-200 text-gray-900 text-left text-sm uppercase font-semibold">Loan Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($loans as $loan)
                        <tr>
                            <td class="px-2 py-2 text-sm">{{ $loan->clientid }}</td>
                            <td class="px-2 py-2 text-sm">{{ $loan->num_of_payment }}</td>
                            <td class="px-2 py-2 text-sm">{{ $loan->first_payment_date }}</td>
                            <td class="px-2 py-2 text-sm">{{ $loan->last_payment_date }}</td>
                            <td class="px-2 py-2 text-sm">{{ $loan->loan_amount }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
