<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller

    {
        public function create()
        {
            return view('category.create');
        }
    
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required',
            ]);
        
            // Create a new instance of the Category model
            $category = new Category();
            $category->name = $validatedData['name'];
            $category->save();
        
            return redirect()->route('category.create')
                             ->with('success', 'Category created successfully.');
        }
        





}
