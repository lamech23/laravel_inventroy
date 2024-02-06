<?php

namespace App\Http\Controllers;
use App\Models\SubCategory;
use App\Models\Category;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    
    public function create()
    {
        $categories = Category::all();
        return view('subcategory.create', compact('categories'));
    }
    public function store( Request $request){
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
        ]);
        $category_id = $request->input( "category_id" );
        $name = $request->input( "name" );

        $subCategory =  new SubCategory();
        $subCategory->name = $name;
        $subCategory->category_id = $category_id;

        $subCategory->save();
        return redirect()->route('subcategory.create')
                        ->with('success', 'Subcategory created successfully.');

    }

}
