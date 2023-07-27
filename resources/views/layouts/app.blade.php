<!DOCTYPE html>
<html>
<head>
    <title>Eren</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet">
    <style>
    .navbar{background-color: darkblue};
    </style>
</head>
<body>
@include('layouts.navbar')
    
<br/>
<br/>
<br/>
<div class="container">
    
 
    
    @yield('content')
</div>
    
@yield('scripts')
</body>
</html>