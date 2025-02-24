<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Spending;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function filterByCategory(Request $request)
    {
        $tableData = [
            'heading' => [
                'id',
                'date',
                'bank',
                'category',
                'amount'
            ],
            'data' => []
        ];
        $category = $request->input('category'); // Obtener categoría desde el formulario
        // dd($request->category_id);
        $categoryId = Category::where("name", $request->category_id)->first();
        $spendings = Spending::where('category_id', $categoryId->id)->get(); // Filtrar por categoría
        
        foreach ($spendings as $data) {
            $category = Category::findOrFail($data['category_id']);
            $tableData['data'][] = [
                'id' => $data['id'],
                'date' => $data['date'],
                'bank' => $data['bank'],
                'category' => $category->name,
                'amount' => $data['amount']
            ];
        }

        return view('spending.index', ['title' => 'My Spendings', 'name' => null, 'tableData' => $tableData]);
    }
}
