<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Items</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
     

    <h1>Inventory Items</h1>
    <a href="{{ route('inventory.create') }}" class="btn btn-primary mb-3">Add New Inventory Item</a>
    <div class="mb-3">
        <a href="{{ route('category.create') }}" class="btn btn-primary">Create Category</a>
        <a href="{{ route('subcategory.create') }}" class="btn btn-primary">Create Subcategory</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventoryItems as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category->name }}</td>
                <td>{{ $item->subCategory->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>
                    <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
