<?php

use App\Http\Controllers\CategoryController;
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

Route::delete('/incomes/delete/{id}', [IncomeController::class, 'destroy'])->name('incomes.destroy');
Route::post('/incomes', [IncomeController::class, 'store'])->name('incomes.store');
Route::get('/incomes/create', [IncomeController::class, 'create'])->name('incomes.create');
Route::get('/incomes/edit/{id}', [IncomeController::class, 'edit'])->name('incomes.edit');
Route::patch('/incomes/edit/{id}', [IncomeController::class, 'update'])->name('incomes.update');
Route::get('/incomes/show/{id}', [IncomeController::class, 'show'])->name('incomes.show');

//Routes for Spendings -- can also use 'resource' to substitute these routes.
Route::get('/spendings', [SpendingController::class, 'index'])->name('spending.index');
Route::post('/spendings', [SpendingController::class, 'store'])->name('spendings.store');
Route::get('/spendings/create', [SpendingController::class, 'create'])->name('spendings.add');
Route::delete('/spendings/delete/{id}', [SpendingController::class, 'destroy'])->name('spendings.destroy');
Route::get('/spendings/edit/{id}', [SpendingController::class, 'edit'])->name('spendings.edit');
Route::patch('/spendings/edit/{id}', [SpendingController::class, 'update'])->name('spendings.update');
Route::get('/spendings/show/{id}', [SpendingController::class, 'show'])->name('spendings.show');


//Route for filter by category:
Route::post('/spendings/filterCategory', [CategoryController::class, 'filterByCategory'])->name('spendings.filterByCategory');
});


