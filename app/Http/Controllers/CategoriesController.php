<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.list', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(request $request)
    {
        $categorie = new Category();
        $categorie->name = $request->name;
        $categorie->save();
        return redirect()->route('categories.index');
    }
    
    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('admin.categories.update', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $categories = Category::findOrFail($id);
        $categories->name = $request->name;
        $categories->save();
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();
        return redirect()->route('categories.index');
    }

}
