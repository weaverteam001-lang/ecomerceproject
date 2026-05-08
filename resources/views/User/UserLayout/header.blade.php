<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- title -->
    <title>Mocart - Multipurpose eCommerce HTML5 Template</title>

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('User/img/logo/favicon.png')}}">

    <!-- css -->

<link rel="stylesheet" href="{{ asset('User/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('User/css/all-fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('User/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('User/css/magnific-popup.min.css') }}">
<link rel="stylesheet" href="{{ asset('User/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('User/css/jquery-ui.min.css') }}">
<link rel="stylesheet" href="{{ asset('User/css/nice-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('User/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('User/css/flex-slider.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <!-- preloader -->
    <div class="preloader">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- preloader end -->


    <!-- header area -->
    <header class="header">

        <!-- header top -->
        <div class="header-top">
            <div class="container">
                <div class="header-top-wrapper">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6 col-xl-5">
                            <div class="header-top-left">
                                <ul class="header-top-list">
                                    <li><a href="mailto:info@example.com"><i class="far fa-envelopes"></i>
                                            Ky267459@gmail.com</a></li>
                                    <li><a href="tel:+21236547898"><i class="far fa-headset"></i> +91 995 012 3317</a>
                                    </li>
                                    <li class="help"><a href="#"><i class="far fa-comment-question"></i> Need Help?</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                   
                    </div>
                </div>
            </div>
        </div>
        <!-- header top end -->

        <!-- header middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-5 col-lg-3 col-xl-3">
                        <div class="header-middle-logo">
                            <a class="navbar-brand" href="index.html">
                                <img src="{{ asset('User/img/ko3.png') }}" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="d-none d-lg-block col-lg-6 col-xl-5">
                        <div class="header-middle-search">
<form action="#">
    <div class="search-content">

     

        <!-- <select class="select" name="category">

       

        </select> -->

        <input type="text" class="form-control" placeholder="Search Here...">
        <button type="submit" class="search-btn">
            <i class="far fa-search"></i>
        </button>

    </div>
</form>
                        </div>
                    </div>
                    <div class="col-7 col-lg-3 col-xl-4">
                        <div class="header-middle-right">
                            <ul class="header-middle-list">
                                <li>
                                    <a href="{{route('User.Login')}}" class="list-item">
                                        <div class="list-item-icon">
                                            <i class="far fa-user-circle"></i>
                                        </div>
                                        <div class="list-item-info">
                                            <h6>Sign In</h6>
                                            <h5>Account</h5>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    @php 
                                    use Illuminate\Support\Facades\Auth;

                                    $cart_total = Auth::check() 
                                        ? DB::table('wishlist')->where('user_id', Auth::id())->count()
                                        : 0;
                                    @endphp
                                    <a href="{{route('User.WishlistPage')}}" class="list-item">
                                        <div class="list-item-icon">
                                            <i class="far fa-heart"></i><span>{{$cart_total}}</span>
                                        </div>
                                        <div class="list-item-info">
                                            <h6>Wishlist</h6>
                                            <h5>My Items</h5>
                                        </div>
                                    </a>
                                </li>

                                @php 
                                if (Auth::check()) {
                                    $cart_total = DB::table('carts')
                                        ->where('user_id', Auth::id())
                                        ->count();

                                    $cart_price = DB::table('carts')
                                        ->where('user_id', Auth::id())
                                        ->sum('price'); // yaha 'price' column hona chahiye
                                } else {
                                    $cart_total = 0;
                                    $cart_price = 0;
                                }
                                @endphp                                
                                <li class="dropdown-cart">
                                    <a href="{{route('User.CartPage')}}" class="shop-cart list-item">
                                        <div class="list-item-icon">
                                            <i class="far fa-shopping-bag"></i><span>{{$cart_total}}</span>
                                        </div>
                                        <div class="list-item-info">
                                            <h6>{{$cart_price}}</h6>
                                            <h5>My Cart</h5>
                                        </div>
                                    </a>
<!-- 

                                    <div class="dropdown-cart-menu">
                                        <div class="dropdown-cart-header">
                                            <span>03 Items</span>
                                            <a href="shop-cart.html">View Cart</a>
                                        </div>
                                        <ul class="dropdown-cart-list">
                                            <li>
                                                <div class="dropdown-cart-item">
                                                    <div class="cart-img">
                                                        <a href="shop-single.html"><img src="{{ asset('User/img/product/b6.png')}}" alt="#"></a>
                                                    </div>
                                                    <div class="cart-info">
                                                        <h4><a href="shop-single.html">Apple Blue Airpod</a></h4>
                                                        <p class="cart-qty">1x - <span
                                                                class="cart-amount">$200.00</span></p>
                                                    </div>
                                                    <a href="#" class="cart-remove" title="Remove this item"><i
                                                            class="far fa-times-circle"></i></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dropdown-cart-item">
                                                    <div class="cart-img">
                                                        <a href="shop-single.html"><img src="{{ asset('User/img/product/e1.png')}}" alt="#"></a>
                                                    </div>
                                                    <div class="cart-info">
                                                        <h4><a href="shop-single.html">Apple Blue Airpod</a></h4>
                                                        <p class="cart-qty">1x - <span
                                                                class="cart-amount">$120.00</span></p>
                                                    </div>
                                                    <a href="#" class="cart-remove" title="Remove this item"><i
                                                            class="far fa-times-circle"></i></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dropdown-cart-item">
                                                    <div class="cart-img">
                                                        <a href="shop-single.html"><img src="{{ asset('User/img/product/d11.png')}}" alt="#"></a>
                                                    </div>
                                                    <div class="cart-info">
                                                        <h4><a href="shop-single.html">Apple Blue Airpod</a></h4>
                                                        <p class="cart-qty">1x - <span
                                                                class="cart-amount">$330.00</span></p>
                                                    </div>
                                                    <a href="#" class="cart-remove" title="Remove this item"><i
                                                            class="far fa-times-circle"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="dropdown-cart-bottom">
                                            <div class="dropdown-cart-total">
                                                <span>Total</span>
                                                <span class="total-amount">$650.00</span>
                                            </div>
                                            <a href="shop-checkout.html" class="theme-btn">Checkout</a>
                                        </div>
                                    </div> -->

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header middle end -->

        <!-- navbar -->
        <div class="main-navigation">
            <nav class="navbar light navbar-expand-lg">
                <div class="container position-relative">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{ asset('User/img/ko3.png') }}" class="logo-scrolled" alt="logo">
                    </a>
                    <div class="category-all">
                        <button class="category-btn" type="button">
                            <i class="fas fa-list-ul"></i><span>All Categories</span>
                        </button>
                   
                    </div>
                    
                    <div class="mobile-menu-right">
                        <div class="mobile-menu-btn">
                            <a href="#" class="nav-right-link search-box-outer"><i class="far fa-search"></i></a>
                            <a href="wishlist.html" class="nav-right-link"><i
                                    class="far fa-heart"></i><span>2</span></a>
                            <a href="shop-cart.html" class="nav-right-link"><i
                                    class="far fa-shopping-bag"></i><span>5</span></a> 
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                            aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <a href="index.html" class="offcanvas-brand" id="offcanvasNavbarLabel">
                                <img src="{{ asset('User/img/logo/logo.png')}}" alt="">
                            </a>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1  gap-4">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{route('User.home')}}">Home</a>
                                  
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{route('User.Shop')}}">Shop</a></li>
                               
                                <li class="nav-item ">
                                    <a class="nav-link " href="{{route('User.Account')}}" >Account</a>
                                   
                                </li>
                            
                                <li class="nav-item ">
                                    <a class="nav-link " href="{{route('User.About')}}" >About Us</a>
                                 
                                </li>
                             
                                <li class="nav-item"><a class="nav-link" href="{{route('User.Contact')}}">Contact</a></li>
                            </ul>
                            <!-- nav-right -->
                            <div class="nav-right">
                                <a class="nav-right-link" href="{{route('User.Shop')}}"><i class="fal fa-star"></i> Recently Viewed</a>
                                <a class="nav-right-link" href=""><i class="fal fa-truck-fast"></i>
                                    Track My Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        
        <!-- navbar end -->

    </header>
    <!-- header area end -->
