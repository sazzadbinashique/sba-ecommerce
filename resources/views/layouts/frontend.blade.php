<!DOCTYPE html>
<html lang="en">
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Book - Shop</title>
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/crumina-fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/grid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/styles.css')}}">

    <!--Plugins styles-->

    <link rel="stylesheet" type="text/css" href="{{asset('app/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/primary-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!--Styles for RTL-->
    <!--<link rel="stylesheet" type="text/css" href="css/rtl.css">-->
    <!--External fonts-->
    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

</head>


<body class=" ">

<header class="header" id="site-header">
    <div class="container">
        <div class="header-content-wrapper">
            <ul class="nav-add">

                @guest
                    <li class="nav-item" style="margin: 5px; padding: 5px;">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item" style="margin: 5px; padding-right: 15px;">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endguest
                <li class="cart">
                    <a href="#" class="js-cart-animate">
                        <i class="seoicon-basket"></i>
                        <span class="cart-count">{{Cart::content()->count()}}</span>
                    </a>
                    <div class="cart-popup-wrap">
                        <div class="popup-cart">
                            <h4 class="title-cart align-center">${{ Cart::total() }}</h4>
                            <br>
                            <a href="/cart">
                                <div class="btn btn-small btn--dark">
                                    <span class="text">View cart</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
                @auth
                    <li class="nav-item" style="margin: 5px; padding: 5px;">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('My Account') }}</a>
                    </li>

                @endauth
            </ul>
        </div>

    </div>

</header>


<div class="content-wrapper">

    <div class="container">
        <div class="row pt120">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="heading align-center mb40">
                    <h4 class="h1 heading-title">
                        <a href="{{url('/')}}">SBA E-commerce</a>
                    </h4>
                    <p class="heading-text">Buy books, and we ship to you.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Books products grid -->

    @yield('content')
</div>

<!-- Footer -->
<footer class="footer">
    <div class="sub-footer small">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <span class="site-copyright-text">
                                2020 © <a href="{{url('/')}}">SBA E-commerce</a>,
                        <a href="{{url('/')}}">All Right Reserves </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>



<script src="{{asset('app/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('app/js/crum-mega-menu.js')}}"></script>
<script src="{{asset('app/js/swiper.jquery.min.js')}}"></script>
<script src="{{asset('app/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('app/js/theme-plugins.js')}}"></script>
<script src="{{asset('app/js/main.js')}}"></script>
<script src="{{asset('app/js/form-actions.js')}}"></script>

<script src="{{asset('app/js/velocity.min.js')}}"></script>
<script src="{{asset('app/js/ScrollMagic.min.js')}}"></script>
<script src="{{asset('app/js/animation.velocity.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- ...end JS Script -->

<script>
    @if(Session::has('success'))
    toastr.success('{{Session::get('success')}}')
    @endif
</script>

</body>

<!-- Mirrored from theme.crumina.net/html-seosight/16_shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Nov 2016 13:03:04 GMT -->
</html>
