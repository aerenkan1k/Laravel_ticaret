@extends('adminlayouts.app')

@section('title', 'Create Product')

@section('contents')
    <h1>Create Product</h1>
    <form action="{{ route('admin.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" min="0" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="price">Photo</label>
            <input type="text" name="photo" id="photo" class="form-control" min="0" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="price">Author</label>
            <input type="text" name="author" id="author" class="form-control" min="0" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="price">Book Description</label>
            <input type="text" name="book_description" id="book_description" class="form-control" min="0" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="book">Book</option>
                <option value="product">Product</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection

