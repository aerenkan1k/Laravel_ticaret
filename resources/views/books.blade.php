@extends('layouts.app')
    
@section('content')
     
<div class="row">
    @foreach($books as $book)
        <div class="col-md-3 col-6 mb-4">
            <div class="card">
                <img src="{{ asset('img') }}/{{ $book->photo }}" width="186" height="271" class="img-responsive"/>
                <div class="card-body">
                    <h4 class="card-title">{{ $book->name }}</h4>
                    <p>{{ $book->author }}</p>
                    <p class="card-text"><strong>{{ __('project.price') }}: </strong> {{ $book->price }} ₺</p>
                    <p class="btn-holder"><a href="{{ route('addbook.to.cart', $book->id) }}" class="btn btn-primary btn-block text-center" role="button">{{ __('project.add_to_cart') }}</a> </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
     
@endsection