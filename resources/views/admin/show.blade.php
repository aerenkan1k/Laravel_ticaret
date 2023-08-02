@extends('adminlayouts.app')
@section('title', 'Show Product')
@section('contents')
    <h1 class="mb-0">Detail Product</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="title" class="form-control" placeholder="Product Name" value="{{ $product ? $product->product_name : $book->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $product ? $product->price : $book->price }} ₺" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Product Description</label>
            <input type="text" name="product_code" class="form-control" placeholder="Product Description" value="{{ $product ? $product->product_description : $book->author }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Product Details</label>
            <textarea class="form-control" name="description" placeholder="Product Details" readonly>{{ $product ? $product->product_fulldescription : $book->book_description }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $product ? $product->created_at : $book->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $product ? $product->updated_at : $book->updated_at }}" readonly>
        </div>
    </div>
@endsection
