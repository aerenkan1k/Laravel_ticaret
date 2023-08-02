@extends('adminlayouts.app')
@section('title', 'Edit Product')
@section('contents')
    <h1 class="mb-0">Edit Product</h1>
    <hr />
    <form action="{{ route('admin.update', $mergedData['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $mergedData['id'] }}">
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="title" class="form-control" placeholder="Product Name" value="{{ $mergedData['product_name'] ?? $mergedData['name'] }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $mergedData['price'] ?? $mergedData['book_price'] }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Product Description</label>
                <input type="text" name="product_code" class="form-control" placeholder="Product Description" value="{{ $mergedData['product_description'] ?? $mergedData['author'] }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Product Details</label>
                <textarea class="form-control" name="description" placeholder="Description">{{ $mergedData['product_fulldescription'] ?? $mergedData['book_description'] }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
