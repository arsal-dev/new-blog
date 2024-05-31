<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add()
    {
        return view('dashboard.categories.add');
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|unique:categories',
            'description' => 'required',
        ]);

        Category::create($validated_data);

        return redirect()->route('add.category')->with('success', 'category added successfully');
    }

    public function all()
    {
        return view('dashboard.categories.all', ['categories' => Category::get()]);
    }
}
