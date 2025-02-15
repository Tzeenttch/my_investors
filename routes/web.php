<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\SpendingController;
use App\Http\Controllers\UserController;
use App\Models\Spending;




//Modify the default route. changing the welcome vies for the login view
Route::get('/', function () {
    return view('welcome');
});

//Routes for Users:

Route::get('/signup', [UserController::class, 'create'])->name('user.create');
Route::post('/signup', [UserController::class, 'store'])->name('user.store');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->name('user.authenticate');

//This middleware protects the routes of unverified users
Route::middleware(['auth'])->group(function () {

Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
//Routes for Incomes
//Route::resource('incomes', IncomeController::class);
Route::get('/incomes', [IncomeController::class, 'index'])->name('incomes.index');

Route::delete('/destroyIncome/{id}', [IncomeController::class, 'destroy'])->name('incomes.destroy');

Route::post('/incomes', [IncomeController::class, 'store'])->name('incomes.store');

Route::get('/createIncome', [IncomeController::class, 'create'])->name('incomes.create');

// To create a path to the edit form
Route::get('/editIncome/{id}', [IncomeController::class, 'edit'])->name('incomes.edit');
//To process the  edit information 
Route::patch('/editIncome/{id}', [IncomeController::class, 'update'])->name('incomes.update');

Route::get('/showIncome/{id}', [IncomeController::class, 'show'])->name('incomes.show');

//Routes for Spendings -- can also use 'resource' to substitute these routes.
Route::get('/spendings', [SpendingController::class, 'index'])->name('spending.index');

Route::post('/spendings', [SpendingController::class, 'store'])->name('spendings.store');

Route::get('/createSpending', [SpendingController::class, 'create'])->name('spendings.add');

Route::delete('/destroySpending/{id}', [SpendingController::class, 'destroy'])->name('spendings.destroy');

Route::get('/editSpending/{id}', [SpendingController::class, 'edit'])->name('spendings.edit');

Route::patch('/editSpending/{id}', [SpendingController::class, 'update'])->name('spendings.update');

Route::get('/showSpending/{id}', [SpendingController::class, 'show'])->name('spendings.show');

});


