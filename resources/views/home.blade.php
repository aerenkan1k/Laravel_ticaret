@extends('layout')
     
@section('content')
      
<div class="row">
    @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-4" style="margin-top:10px;">
            <div class="img_thumbnail productlist">
                <img src="{{ asset('img') }}/{{ $product->photo }}" width="186" height="271" class="img-responsive"/>
                <div class="caption">
                    <h4>{{ $product->product_name }}</h4>
                    <p>{{ $product->product_description }}</p>
                    <p><strong>{{ __('project.price') }}: </strong>{{ $product->price }} ₺</p>
                    <p class="btn-holder"><a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary btn-block text-center" role="button">{{ __('project.add_to_cart') }}</a> </p>
                </div>
            </div>
        </div>
    @endforeach
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