@extends('adminlayouts.app')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Product</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="product_type">Product Type:</label>
                            <select name="product_type" id="product_type" class="form-control">
                                <option value="book">Book</option>
                                <option value="product">Electronic</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" step="0.01" name="price" id="price" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="author">Author (for books only):</label>
                            <input type="text" name="author" id="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Details (for electronic only):</label>
                            <textarea name="fulldescription" id="product_fulldescription" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="photo">Photo:</label>
                            <input type="file" name="photo" id="photo" class="form-control-file">
                        </div>

                        <button type="submit" class="btn btn-primary">Create Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

