<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoanDetailsController;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/loan-details', [LoanDetailsController::class, 'index']);
Route::get('/process-data', [LoanDetailsController::class, 'processData']);
Route::get('/emi-view', [LoanDetailsController::class, 'emiView']);


