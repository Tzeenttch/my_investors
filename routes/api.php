<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Income;
use App\Models\Outcome;
use App\Models\Spending;

Route::get('/incomes', function (Request $request) {
   return Income::all();
    //return $request->user();
});//->middleware('auth:sanctum');

Route::get('/spendings', function (Request $request) {
    return Spending::all();
     //return $request->user();
 });//->middleware('auth:sanctum');