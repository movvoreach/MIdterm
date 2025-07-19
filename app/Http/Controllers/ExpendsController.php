<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\ExpendsModel;

class ExpendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $expends = ExpendsModel::with('category')->get();
        return view('Expends.index', compact('expends'));
    }

    public function create()
    {
        $categories = CategoryModel::all();
        return view('Expends.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $expend = new ExpendsModel();
        $expend->category_id = $request->category_id;
        $expend->amount = $request->amount;
        $expend->name = $request->name;
        $expend->status = $request->status;
        $expend->save();

        return redirect()->route('expends.index')->with('success', 'Expend created successfully.');
    }
    public function edit($id)
    {
        $expend = ExpendsModel::findOrFail($id);
        $categories = CategoryModel::all();
        return view('Expends.edit', compact('expend', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $expend = ExpendsModel::findOrFail($id);
        $expend->category_id = $request->category_id;
        $expend->amount = $request->amount;
        $expend->name = $request->name;
        $expend->status = $request->status;
        $expend->save();

        return redirect()->route('expends.index')->with('success', 'Expend updated successfully.');
    }
    public function destroy($id)
    {
        $expend = ExpendsModel::findOrFail($id);
        $expend->delete();

        return redirect()->route('expends.index')->with('success', 'Expend deleted successfully.');
    }

}
