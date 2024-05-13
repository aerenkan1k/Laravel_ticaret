@extends('layouts.app')

@section('content')

<!-- Ürün Detayları -->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-5">
            <img src="{{ asset('storage/' . trim($product->photo, '\'"')) }}" alt="{{ $product->product_name }}" width="400" height="350" class="img-responsive-percent"/>
            </div>
            <div class="col-md-6">
                <h1 class="display-5 fw-bolder">{{ $product->product_name }}</h1>
                <div class="fs-5 mb-5">
                    <p class="card-text"><strong>{{ __('project.price') }}: </strong>{{ $product->price }} ₺</p>
                </div>
                <p class="lead">{{ $product->product_fulldescription }}</p>
                <div class="d-flex">
                    <a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary btn-block text-center">{{ __('project.add_to_cart') }}</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">{{ __('project.related_products') }}</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($relatedProducts as $relatedProduct)
            <!-- Ürün Detayları -->
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <a href="{{ route('show_electronic', $relatedProduct->id) }}">
                    <img src="{{ asset('storage/' . trim($relatedProduct->photo, '\'"')) }}"  alt="{{ $relatedProduct->product_name }}" width="200" height="175" class="img-responsive"/>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $relatedProduct->product_name }}</h5>
                    </a>
                            <!-- Product price-->
                            <p class="card-text"><strong>{{ __('project.price') }}: </strong>{{ $relatedProduct->price }} ₺</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection