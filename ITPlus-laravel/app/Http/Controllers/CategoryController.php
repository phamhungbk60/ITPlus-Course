<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $category = Category::create($request->input());
        if ($category) {
            return redirect('/categories');
        } 
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', [
            'category' => $category
        ]);
    }

    public function update($id, Request $request)
    {
        $category = Category::findOrFail($id)->update($request->input());
        if ($category) {
            return redirect('/categories');
        }
    }

    public function destroy($id)
    {
        $category = Category::destroy($id);
        if ($category) {
            return redirect('/categories');
        }
    }
}
