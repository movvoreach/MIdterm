<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\CategoryModel;

class IncomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = Income::with('category')->get();
        return view('Income.index', compact('incomes'));
    }

    public function create()
    {
        $categories = CategoryModel::all();
        return view('Income.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $income = new Income();
        $income->category_id = $request->category_id;
        $income->amount = $request->amount;
        $income->name = $request->name;
        $income->status = $request->status;
        $income->save();

        return redirect()->route('income.index')->with('success', 'Income created successfully.');
    }
    public function edit($id)
    {
        $income = Income::findOrFail($id);
        $categories = CategoryModel::all();
        return view('Income.edit', compact('income', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $income = Income::findOrFail($id);
        $income->category_id = $request->category_id;
        $income->amount = $request->amount;
        $income->name = $request->name;
        $income->status = $request->status;
        $income->save();

        return redirect()->route('income.index')->with('success', 'Income updated successfully.');
    }
    public function destroy($id)
    {
        $income = Income::findOrFail($id);
        $income->delete();

        return redirect()->route('income.index')->with('success', 'Income deleted successfully.');
    }
}
