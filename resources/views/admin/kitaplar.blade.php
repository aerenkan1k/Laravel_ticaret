@extends('adminlayouts.app')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Product</h1>
        <a href="{{ route('admin.store') }}" class="btn btn-primary">Add Product</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    {{-- Display Books --}}
    <h2>Books</h2>
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Book Name</th>
                <th>Price</th>
                <th>Author</th>
                <th>Book Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($books->count() > 0)
                @foreach($books as $item)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $item->name }}</td>
                        <td class="align-middle">{{ $item->price }} ₺</td>
                        <td class="align-middle">{{ $item->author }}</td>
                        <td class="align-middle">{{ $item->book_description }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('admin.show', $item->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('admin.update', $item->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.destroy', $item->id) }}" method="POST" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="6">No Books found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection