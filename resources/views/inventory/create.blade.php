<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Inventory Item</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

@if (Session::has('status'))
<div class="alert alert-success">
   {{ Session::get('status') }}
</div>
@endif
    <h1>Add Inventory Item</h1>
    <form action="{{ route('inventory.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="subcategory">Subcategory</label>
            <select class="form-control" id="subcategory" name="sub_category_id">
                <option value="">Select Subcategory</option>
                  @foreach($subCategory as $sub_category)
                    <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                  @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity">
        </div>
        <button type="submit" class="btn btn-primary">Add Item</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Populate subcategories based on selected category
    $('#category').change(function() {
        var categoryId = $(this).val();
        $.ajax({
            url: '/subcategories/' + categoryId,
            type: 'GET',
            success: function(response) {
                $('#subcategory').empty();
                $('#subcategory').append('<option value="">Select Subcategory</option>');
                $.each(response, function(key, value) {
                    $('#subcategory').append('<option value="' + value.id + '">' + value.name + '</option>');
                });
            }
        });
    });
</script>
</body>
</html>
