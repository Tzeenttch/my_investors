<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function Pest\Laravel\post;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tableData = [
            'heading' => [
                'id',
                'date',
                'category',
                'amount'
            ],
            'data' => []
        ];
 
        $userId = Auth::id();
        $userName = Auth::user()->name;    
        $incomeData = Income::where('user_id', $userId)->get();

        foreach ($incomeData as $data) {
            $category = Category::findOrFail($data['category_id']);
            $tableData['data'][] = [
                'id' => $data['id'],
                'date' => $data['date'],
                'category' => $category->name,
                'amount' => $data['amount']
            ];
        }

        //Aquí la lógica de negocio para el index
        return view('income.index', ['title' => 'My incomes','name' => $userName ,'tableData' => $tableData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('income.createForm', ['title' => 'Create Income' ,'action' => './incomes', 'operation' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            abort(403, 'Unauthorized');
        }

        //Validate the request
        $validated = $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric|between:0.01,10000',
            'category_id' => 'required|exists:categories,name',
        ]);

        //Busca la categoria y la reemplaza
        $category = Category::where("name", $validated['category_id'])->first();
        $validated['category_id'] = $category->id;
        unset($validated['category']);
        $request->user()->incomes()->create($validated);
        
        return redirect()->route('incomes.index')->with('Success', 'Registered Income');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tableData = [
            'heading' => [
                'id',
                'date',
                'category',
                'amount'
            ],
            'data' => []
        ];
        $record = Income::findOrFail($id);
        $category = Category::findOrFail($record->category_id);

            $tableData['data'][] = [
                'id' => $record->id,
                'date' => $record->date,
                'category' => $category->name,
                'amount' => $record->amount
            ];

        return view('income.index', ['title' => 'My incomes', 'name'=>null,'tableData' => $tableData]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Contain the complete record with id == $id
        $record = Income::findOrFail($id);

        return view('income.editForm', ['title' => 'Edit Income' ,'action' => 'incomes', 'operation' => 'edit', 'record' => $record]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $income = Income::findOrFail($id);
        
        $validated = $request->validate([
            'date' => 'required|date',
            'category' => 'required|string|',
            'amount' => 'required|numeric|between:0.01,10000'
        ]);
        $income->update([
            'date' => $validated['date'],
            'category' => $validated['category'],
            'amount' => $validated['amount']
        ]);

        return redirect()->route('incomes.index')->with('Succes', 'Income updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $incomeId = Income::find($id);

        if($incomeId){
            $incomeId->delete();
        }else{
            return redirect()->route('incomes.index')-with("Error", "Income record not found");
        }
        return redirect()->route('incomes.index')->with('Succes', 'Income record destroyed');
    }
}
