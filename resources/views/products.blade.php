@extends('layouts.app')
     
@section('content')
      
<div class="row">
    @foreach($products as $product)
        <div class="col-xs-12 col-sm-6 col-md-4" style="margin-top:10px;">
            <div class="card">
                <img src="{{ asset('img') }}/{{ $product->photo }}" class="card-img-top" alt="{{ $product->product_name }}" width="186" height="271" class="img-responsive"/>
                <div class="card-body">
                    <h4 class="card-title">{{ $product->product_name }}</h4>
                    <p class="card-text">{{ $product->product_description }}</p>
                    <p class="card-text"><strong>{{ __('project.price') }}: </strong>{{ $product->price }} ₺</p>
                    <a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary btn-block text-center">{{ __('project.add_to_cart') }}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
      
@endsection