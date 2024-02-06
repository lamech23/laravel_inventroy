<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inventory Item</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
@if (Session::has('status'))
<div class="alert alert-success">
   {{ Session::get('status') }}
</div>
@endif
    <h1>Edit Inventory Item</h1>
    <form action="{{ route('inventory.update', $inventoryItem->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $inventoryItem->name }}">
            @error('name')
               <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $inventoryItem->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>

            @error('category_id')
               <div class="alert alert-danger">{{ $message }}</div>
             @enderror
            
        </div>
        <div class="form-group">
            <label for="subcategory">Subcategory</label>
            <select class="form-control" id="subcategory" name="sub_category_id">
                @foreach($subcategories as $subcategory) //<- This comes from the inventory controller 
                    <option value="{{ $subcategory->id }}" {{ $inventoryItem->sub_category_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                @endforeach
            </select>

            @error('sub_category_id')
               <div class="alert alert-danger">{{ $message }}</div>
             @enderror
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $inventoryItem->quantity }}">

            @error('quantity')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Item</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
