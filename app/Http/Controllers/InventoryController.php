<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\InventoryItem;
class InventoryController extends Controller
    {
        public function index()
        {
            $inventoryItems = InventoryItem::with('category', 'subCategory')->get();
            return view('inventory.index', compact('inventoryItems'));
        }
    
        public function create()
        {
            $categories = Category::all();
            $subCategory = SubCategory::all();
            return view('inventory.create', compact('categories' , 'subCategory'));
        }
    
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required',
                'category_id' => 'required|exists:categories,id',
                'sub_category_id' => 'required|exists:sub_categories,id',
                'quantity' => 'required|numeric|min:0',
            ]);
    
            InventoryItem::create($validatedData);
    
            return redirect()->route('inventory.index')
                             ->with('status', 'Inventory item created successfully.');
        }
    
        public function edit(InventoryItem $inventoryItem)
        {
            
            $categories = Category::all();
            $subcategories = SubCategory::all();           
             return view('inventory.edit', compact('inventoryItem', 'categories', 'subcategories'));
        }
    
        public function update(Request $request, InventoryItem $inventoryItem)
        {
            $validatedData = $request->validate([
                'name' => 'required',
                'category_id' => 'required|exists:categories,id',
                'sub_category_id' => 'required|exists:sub_categories,id',
                'quantity' => 'required',
            ]);
    
            $inventoryItem->update($validatedData);
    
            return redirect()->route('inventory.create')
                             ->with('status', 'Inventory item updated successfully.');
        }
    
        public function destroy(InventoryItem $inventoryItem)
        {
            $inventoryItem->delete();
    
            return redirect()->route('inventory.index')
                             ->with('success', 'Inventory item deleted successfully.');
        }
    }
