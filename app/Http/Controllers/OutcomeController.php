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
        $extractedData = [];
        $i = 0;

        foreach ($outcomeData as $data) {
            $extractedData[$i] = $data->getOriginal();
            $tableData['data'][] = [
                'date' => $extractedData[$i]['date'],
                'bank' => $extractedData[$i]['bank'],
                'category' => $extractedData[$i]['category'],
                'amount' => $extractedData[$i]['amount']
            ];
            $i++;
        }
        //Aquí la lógica de negocio para el index
        return view('outcome.index', ['title' => 'My outcomes', 'tableData' => $tableData]);
    }
}
