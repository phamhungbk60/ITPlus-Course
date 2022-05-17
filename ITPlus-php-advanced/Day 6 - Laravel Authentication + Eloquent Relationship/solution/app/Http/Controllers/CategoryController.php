<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', [
            'categories' => $categories,
            'category' => new Category()
        ]);
    }

    public function store(Request $request)
    {
        $category = Category::create($request->input());
        if ($category !== null) {
            return redirect()->action([CategoryController::class, 'index']);
        }
    }

    public function edit(Request $request, Category $category)
    {
        //return true on request
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        //return true on request
        if ($category->update($request->input())) {
            return redirect()->action([CategoryController::class, 'index']);
        }
    }

    public function destroy(Category $category)
    {
        return $category->delete();
    }
}
