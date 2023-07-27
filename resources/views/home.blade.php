@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Ana çerçeve başlangıcı -->
        <div class="slider-frame">
            <div class="slick-slider">
                <ul class="combined-slider"data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "autoplaySpeed": 2000}'>
                    @foreach($products as $product)
                        <li>
                            <div class="col-md-3 col-6 mb-4">
                                <div class="img_thumbnail productlist">
                                    <img src="{{ asset('img') }}/{{ $product->photo }}" width="186" height="241" class="img-responsive"/>
                                    <div class="caption">
                                        <h4>{{ $product->product_name }}</h4>
                                        <p>{{ $product->product_description }}</p>
                                        <p><strong>{{ __('project.price') }}: </strong>{{ $product->price }} ₺</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                    @foreach($books as $book)
                        <li>
                            <div class="col-md-3 col-6 mb-4">
                                <div class="img_thumbnail productlist">
                                    <img src="{{ asset('img') }}/{{ $book->photo }}" width="186" height="241" class="img-responsive"/>
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $book->name }}</h4>
                                        <p>{{ $book->author }}</p>
                                        <p class="card-text"><strong>{{ __('project.price') }}: </strong> {{ $book->price }} ₺</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- Ana çerçeve bitişi -->
    </div>
</div>
<div class="text-center mt-4">
    <button id="prevSlide" class="btn btn-primary"><-</button>
    <button id="nextSlide" class="btn btn-primary">-></button>
</div>
@endsection

@section('scripts')
    @parent
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            var combinedSlider = $('.combined-slider').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
            });

            $('#prevSlide').click(function() {
                combinedSlider.slick('slickPrev');
            });

            $('#nextSlide').click(function() {
                combinedSlider.slick('slickNext');
            });
        });
    </script>
@endsection
