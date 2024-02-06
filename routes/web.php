<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Display all inventory items
Route::get('/', [InventoryController::class, 'index'])->name('inventory.index');

// Display the form for creating a new inventory item
Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');

// Store a newly created inventory item
Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');

// Display the form for editing an existing inventory item
Route::get('/inventory/{inventoryItem}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');

// Update the specified inventory item
Route::put('/inventory/{inventoryItem}', [InventoryController::class, 'update'])->name('inventory.update');

// Delete the specified inventory item
Route::delete('/inventory/{inventoryItem}', [InventoryController::class, 'destroy'])->name('inventory.destroy');

Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');

// Routes for subcategories
Route::get('/subcategories/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
Route::post('/subcategories', [SubCategoryController::class, 'store'])->name('subcategory.store');
