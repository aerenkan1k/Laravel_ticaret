<nav class="navbar navbar-expand-sm navbar-dark">
    <div class="container">
    <ul class="navbar-nav">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12">
                <div class="dropdown">
                 
                <button id="dLabel" type="button" class="btn btn-warning" data-bs-toggle="dropdown">
                <i class="fa fa-bars"></i> {{ __('project.categories') }} <span></span>
                </button>
 
                    <div class="dropdown-menu" aria-labelledby="dLabel">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                <a href="{{ route('books') }}" class="btn -btn-block">{{ __('project.books') }}</a>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                <a href="{{ route('products') }}" class="btn -btn-block">{{ __('project.products') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('home') }}"><i class="fa fa-home"></i>{{ __('project.homepage') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('contact') }}"><i class="fa fa-phone"></i>{{ __('project.contact') }}</a>
        </li>
      
        <li class="nav-item">
        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('login') }}">{{ __('project.login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('register') }}">{{ __('project.register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link active" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('project.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
        </li>
        
    </ul>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12">
            <div class="dropdown">
                 
                <button id="dLabel" type="button" class="btn btn-success" data-bs-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> {{ __('project.cart') }} <span class="badge bg-primary">{{ count((array) session('cart')) }}</span>
                </button>
 
                                    <div class="dropdown-menu" aria-labelledby="dLabel">
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                <div class="row cart-detail">
                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="{{ asset('img') }}/{{ $details['photo'] }}" width="50" height="70" class="img-responsive"/>
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>
                                            @if(isset($details['product_name']))
                                                {{ $details['product_name'] }}
                                            @elseif(isset($details['name']))
                                                {{ $details['name'] }}
                                            @else
                                                <!-- if elseler foreache çevrilecek -->
                                            @endif
                                    </p>
                                        <span class="price text-success">{{ $details['price'] }} ₺</span> <span class="count"> {{ __('project.quantity') }}:{{ $details['quantity'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    
                    <div class="row total-header-section">
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                            <p>{{ __('project.total') }}: <span class="text-success">{{ $total }} ₺</span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">{{ __('project.go_cart') }}</a>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ route('changelocale') }}" id="languageDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    @if (App::getLocale() == 'tr')
                        Türkçe
                    @else
                        English
                    @endif
                </a>
                <div class="dropdown-menu" aria-labelledby="languageDropdown">
                    @if (App::getLocale() == 'tr')
                        <a class="dropdown-item" href="{{ route('changelocale') }}">English</a>
                    @else
                        <a class="dropdown-item" href="{{ route('changelocale') }}">Türkçe</a>
                    @endif
                </div>
            </li>
        </ul>
                
            </div>
        </div>
    </div>
</div>
</nav>