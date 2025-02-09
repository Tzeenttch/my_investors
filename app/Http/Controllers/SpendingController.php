<?php

namespace App\Http\Controllers;

use App\Models\Spending;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;

class SpendingController extends Controller
{

    public function index()
    {

        $tableData = [
            'heading' => [
                'date',
                'bank',
                'category',
                'amount'
            ],
            'data' => []
        ];

        $spendingData = Spending::all();
        
        foreach ($spendingData as $data) {
            $tableData['data'][] = [
                'date' => $data['date'],
                'bank' => $data['bank'],
                'category' => $data['category'],
                'amount' => $data['amount']
            ];
        }
        //Aquí la lógica de negocio para el index
        return view('spending.index', ['title' => 'My Spendings', 'tableData' => $tableData]);
    }
}
