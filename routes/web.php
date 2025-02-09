<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\SpendingController;
use App\Models\Spending;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('incomes', IncomeController::class);
Route::get('/incomes', [IncomeController::class, 'index'])->name('incomes.index');
Route::post('/incomes', [IncomeController::class, 'store'])->name('incomes.store');

Route::get('/spendings', [SpendingController::class, 'index'])->name('spending.index');

Route::get('/createIncome', [IncomeController::class, 'create'])->name('incomes.add');
