<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Spending;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SpendingController extends Controller
{

    public function index()
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

        $userId = Auth::id();
        $userName = Auth::user()->name;
        $spendingData = Spending::where('user_id', $userId)->get();

        foreach ($spendingData as $data) {
            $category = Category::findOrFail($data['category_id']);
            $tableData['data'][] = [
                'id' => $data['id'],
                'date' => $data['date'],
                'bank' => $data['bank'],
                'category' => $category->name,
                'amount' => $data['amount']
            ];
        }
        //Aquí la lógica de negocio para el index
        return view('spending.index', ['title' => 'My Spendings', 'name' => $userName, 'tableData' => $tableData]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('spending.createForm', ['title' => 'Create Spending', 'action' => './spendings', 'operation' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //Check if the user is logged in
        if (!Auth::check()) {
            abort(403, 'Unauthorized');
        }
        //Validate the request
        $validated = $request->validate([
            'date' => 'required|date',
            'bank' => 'required|string',
            'amount' => 'required|numeric|between:0.01,10000',
            'category_id' => 'required|exists:categories,name',
        ]);

        $category = Category::where("name", $validated['category_id'])->first();

        // Replace 'category' with its actual 'id'
        $validated['category_id'] = $category->id;
        unset($validated['category']);
        // dd($validated['category_id']);
        $request->user()->spendings()->create($validated);

        return redirect()->route('spending.index')->with('Success', 'Registered Spending');
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
                'bank',
                'category',
                'amount'
            ],
            'data' => []
        ];
        $record = Spending::findOrFail($id);
        $category = Category::findOrFail($record->category_id);

        $tableData['data'][] = [
            'id' => $record->id,
            'date' => $record->date,
            'bank' => $record->bank,
            'category' => $category->name,
            'amount' => $record->amount
        ];

        return view('spending.index', ['title' => 'My Spendings', 'name' => null, 'tableData' => $tableData]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $record = Spending::findOrFail($id);

        return view('spending.editForm', ['title' => 'Edit Spending', 'action' => 'spendings', 'operation' => 'edit', 'record' => $record]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $income = Spending::findOrFail($id);

        $validated = $request->validate([
            'date' => 'required|date',
            'bank' => 'required|string',
            'category' => 'required|string',
            'amount' => 'required|numeric|between:0.01,10000'
        ]);

        $income->update([
            'date' => $validated['date'],
            'bank' => $validated['bank'],
            'category' => $validated['category'],
            'amount' => $validated['amount']
        ]);

        return redirect()->route('spending.index')->with('Succes', 'Spending updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $spendingId = Spending::find($id);

        if ($spendingId) {
            $spendingId->delete();
        } else {
            return redirect()->route('spending.index')->with('Error', 'Spending record not found');
        }

        return redirect()->route('spending.index')->with('Succes', 'Spending record destroyed');
    }
}
