<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel ;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryModel::all();
        return view('CategoryType.index', compact('categories'));
    }

    public function create()
    {
       
        return view('CategoryType.create');
    }

    public function store(Request $request)
    {
        $categories = new CategoryModel();
        $categories->name = $request->name;
        $categories->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }
    public function edit($id)
    {
        $category = CategoryModel::findOrFail($id);
        return view('CategoryType.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = CategoryModel::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }
    public function destroy($id)
    {
        $category = CategoryModel::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
