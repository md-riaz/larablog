<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- Primary Meta Tags -->
<title>@yield('title')</title>
<meta name="title" content="larablog | A laravel blog">
@if (Request::is('/'))
<meta name="description" content="This is a personal blog site made with Laravel. Hope you all will like it.">
@endif
<meta name="description" content="@yield('title')">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{URL::current()}}">
<meta property="og:title" content="larablog | A laravel blog">
@if (Request::is('/'))
<meta property="og:description" content="This is a personal blog site made with Laravel. Hope you all will like it.">
<meta property="og:image" content="{{asset('images/preview.jpg')}}">
@endif
<meta property="og:description" content="@yield('title')">
<meta property="og:image" content="">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{URL::current()}}">
<meta property="twitter:title" content="larablog | A laravel blog">
<meta property="twitter:description"
    content="This is a personal blog site made with Laravel. Hope you all will like it.">
<meta property="twitter:image" content="">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
<link rel="icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
<link
    href="https://fonts.googleapis.com/css?family=Baloo+Da+2:400,700|Josefin+Sans:400,700|Mrs+Sheppards|Open+Sans:300,400,700|Raleway:300,700&display=swap"
    rel="stylesheet">
<!-- Styles -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link href="{{ asset('css/prism.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
