<?php

namespace App\Http\Controllers;

use App\Models\Outcome;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;

class OutcomeController extends Controller
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

        $outcomeData = Outcome::all();
        
        foreach ($outcomeData as $data) {
            $tableData['data'][] = [
                'date' => $data['date'],
                'bank' => $data['bank'],
                'category' => $data['category'],
                'amount' => $data['amount']
            ];
        }
        //Aquí la lógica de negocio para el index
        return view('outcome.index', ['title' => 'My outcomes', 'tableData' => $tableData]);
    }
}
