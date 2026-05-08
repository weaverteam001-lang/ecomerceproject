
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
    <title>Mocart - Main Page</title>

    <!-- favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('User/img/logo/favicon.png') }}">
<!-- css -->
<!-- css -->
<link rel="stylesheet" href="{{ asset('User/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('User/css/all-fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('User/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('User/css/magnific-popup.min.css') }}">
<link rel="stylesheet" href="{{ asset('User/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('User/css/jquery-ui.min.css') }}">
<link rel="stylesheet" href="{{ asset('User/css/nice-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('User/css/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body class="home-4">

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
        <!-- <div class="header-top light"> -->
            <div class="container">
                <div class="header-top-wrap">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6 col-xl-5">
                            <div class="header-top-left">
                                <ul class="header-top-list">
                                    <li><a href="mailto:info@example.com"><i class="far fa-envelopes"></i>
                                            Ky267459@gmail.com</a></li>
                                    <li><a href="tel:+21236547898"><i class="far fa-headset"></i> +91 995 01 23317</a>
                                    </li>
                                    <li class="help"><a href="{{route('User.Contact')}}"><i class="far fa-comment-question"></i> Need Help?</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 col-xl-7">
                            <div class="header-top-right">
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header top end -->



        <!-- navbar -->
        <div class="main-navigation">
            <nav class="navbar navbar-expand-lg">
                <div class="container position-relative">
                    <a class="navbar-brand" href="index.html">
                       <img src="{{ asset('User/img/ko3.png') }}" alt="logo">
                    </a>
                    <div class="mobile-menu-right">
                        <div class="mobile-menu-btn">
                            <a href="#" class="nav-right-link search-box-outer"><i class="far fa-search"></i></a>
                            <a href="" class="nav-right-link"><i
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
                              <img src="{{ asset('User/img/logo/logo.png') }}" alt="">
                            </a>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 gap-3">
                                <li class="nav-item dropdown">
                                    <a class="nav-link  active" href="{{route('User.home')}}"
                                        data-bs-toggle="dropdown">Home</a>
                                   
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{route('User.Shop')}}">Shop</a></li>
                                <li class="nav-item dropdown">
                                   
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link " href="#" >Category</a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('User.Account')}}">Account</a>
                                 
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link " href="{{route('User.About')}}">About Us</a>
                                    
                            
                                </li>

                                <li class="nav-item"><a class="nav-link" href="{{route('User.Contact')}}">Contact</a></li>
                            </ul>
                            <!-- nav-right -->
                            <div class="nav-right icon">
                                <a href="#" class="nav-right-link search-box-outer">
                                    <i class="far fa-search"></i>
                                </a>
                                <a href="{{route('User.WishlistPage')}}" class="nav-right-link"><i
                                        class="far fa-heart"></i><span>{{ $count }}</span></a>
                                    
                                @php 
                                use Illuminate\Support\Facades\Auth;

                                $cart_total = Auth::check() 
                                    ? DB::table('carts')->where('user_id', Auth::id())->count()
                                    : 0;
                                @endphp
                                <a href="{{route('User.CartPage')}}" class="nav-right-link"><i
                                        class="far fa-shopping-bag"></i><span>{{$cart_total}}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- navbar end -->

    </header>
    <!-- header area end -->


    <!-- popup search -->
    <div class="search-popup">
        <button class="close-search"><span class="far fa-times"></span></button>
        <form action="#">
            <div class="form-group">
                <input type="search" name="search-field" class="form-control" placeholder="Search Here..." required>
                <button type="submit"><i class="far fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- popup search end -->


    <main class="main">

        <!-- hero slider -->
        <div class="hero-section hs-1">
            <div class="container">
                <div class="hero-single">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="hero-content">
                                    <h6 class="hero-sub-title">Start
                                        From ₹ 50</h6>
                                    <h1 class="hero-title">
                                        <span>Explore</span> <span>Unique</span> <span>Clothes</span>
                                    </h1>
                                    <p>
                                       Discover the latest fashion, smart electronics, and everyday essentials at Likeup. We bring quality products, great prices, and a seamless shopping experience all in one place
                                    </p>
                                    <div class="hero-btn" >
                                        <a href="{{route('User.home')}}" class="theme-btn">Shop Now<i
                                                class="fas fa-arrow-right"></i></a>
                                        <!-- <a href="about.html" class="theme-btn theme-btn2">Learn More<i
                                                class="fas fa-arrow-right"></i></a> -->
                                    </div>
                                </div>
                            </div>
                       
                            
                            <div class="col-lg-5">
                                <div class="hero-right">
                                    
                                    <div class="hero-img">
                                        <div class="hero-img-price">
                                            <!-- <span>Price</span> -->
                                            <span>10% OFF</span>
                                        </div>
                                       <img src="{{ asset('User/img/hero/hero-2.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="hero-product">
                                  @foreach($product as $data) 
                                    <a href="{{route('User.shopsingle', encrypt($data->id))}}">
                                        <div class="price-info">
                                            <h6>Price</h6>
                                            <span>₹{{$data->price}}</span>
                                        </div>
                                        <div class="img">
                                          <img src="{{$data->image}}" alt="">
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- hero slider end -->


        <!-- category area -->
        <div class="category-area ca-3 py-90">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInDown" data-wow-delay=".25s">
                        <div class="site-heading-inline">
                            <h2 class="site-title">Top Category</h2>
                            <a href="">View More <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>

                
                <div class="row wow fadeInUp" data-wow-delay=".25s">
                    @foreach($category as $data)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="category-item">
                            <div class="category-img-box">
                                <a href="{{route('User.shopgrid' , $data->id)}}">
                                    <div class="category-img">
                                        <div class="thumb-big">
                                          
                                            <img src="{{$data->product_image}}" alt="">
                                        </div>
                                        <div class="thumb-list">
                                            <div class="thumb-list-1"><img src="{{$data->second_image}}" alt="">
                                            </div>
                                            <div class="thumb-list-2"><img src="{{$data->product_image}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="category-img-info">
                                    <h4>{{$data->category}}</h4>
                                    <p></p>
                                    <a class="theme-btn" href="{{route('User.shopgrid' , $data->id)}}">View Products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                     @endforeach
                </div>
                
            </div>
          
        </div>
        
        <!-- category area end-->


        <!-- small banner -->
        <!-- <div class="small-banner pb-100">
            <div class="container wow fadeInUp" data-wow-delay=".25s">
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="banner-item">
                            <img src="{{ asset('User/img/ko5.png') }}" alt="">
                            <div class="banner-content">
                                <p>Travel Sale</p>
                                <h3>Best Travel Sale <br> Collectons</h3>
                                <a href="shop-grid.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="banner-item">
                            <img src="{{ asset('User/img/ko5.png') }}" alt="">
                            <div class="banner-content">
                                <p>Hot Sale</p>
                                <h3>Headphone Sale <br> Collections</h3>
                                <a href="shop-grid.html">Discover Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="banner-item">
                            <img src="{{ asset('User/img/banner/mini-banner-3.jpg')}}" alt="">
                            <div class="banner-content">
                                <p>Shoe Sale</p>
                                <h3>Summer Shoe Sale <br> Up To <span>50%</span> Off</h3>
                                <a href="shop-grid.html">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

     <div class="big-banner pt-100">
            <div class="container wow fadeInUp" data-wow-delay=".25s">
                <div class="banner-wrap" style="background-image: url(User/img/ko7.png);">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="banner-content">
                                <div class="banner-info">
                                    <h6>Mega Collections</h6>
                                    <h2>Huge Sale Up To <span>40%</span> Off</h2>
                                    <p>at our outlet stores</p>
                                </div>
                                <a href="{{route('User.Shop')}}" class="theme-btn">Shop Now<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<br>
        <!-- small banner end -->


        <!-- trending item -->
         <!-- Best Item -->
        <div class="product-area pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInDown" data-wow-delay=".25s">
                        <div class="site-heading-inline">
                            <h2 class="site-title">Best Items</h2>
                            <a href="{{route('User.Shop')}}">View More <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="product-wrap item-5 wow fadeInUp" data-wow-delay=".25s">
                    <div class="product-slider owl-carousel owl-theme">

                    @foreach($TrendingItems as $data)
                        <div class="product-item">
                            <div class="product-img">
                                <span class="type new">{{$data->About_product}}</span>
                                <a href="{{route('User.shopsingle', encrypt($data->id))}}"><img src="{{$data->image}}" alt=""></a>
                                <div class="product-action-wrap ">
                                    <div class="product-action ">
                                        <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                            data-tooltip="tooltip" title="Quick View"><i class="far fa-eye"></i></a> -->
                                        <a href="{{route('User.Wishlist', encrypt($data->id))}}" data-tooltip="tooltip" title="Add To Wishlist"><i
                                                class="far fa-heart"></i></a>
                                        
                                               
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3 class="product-title"><a href="shop-single.html">{{$data->product_name}}</a></h3>
                                <div class="product-rate">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="product-bottom">
                                    <div class="product-price">
                                        <span>₹{{$data->price}}</span>
                                    </div>
                                   <a href="{{ route('User.shopsingle', encrypt($data->id)) }}"
                                        class="product-cart-btn"
                                        data-bs-placement="left"
                                        data-tooltip="tooltip" title="Add To Cart">
                                            
                                        <i class="far fa-shopping-bag"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                     @endforeach

                    </div>
                </div>
            </div>
        </div>
        <!-- trending item end -->


        <!-- feature area -->
        <div class="feature-area ft-2 pb-100">
            <div class="container wow fadeInUp" data-wow-delay=".25s">
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                            <img src="{{ asset('User/img/icon/delivery-2.svg') }}" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Free Delivery</h4>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                             <img src="{{ asset('User/img/icon/refund.svg') }}" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Get Refund</h4>
                                <p>Within 7 Days Returns</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                              <img src="{{ asset('User/img/icon/payment.svg') }}" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Safe Payment</h4>
                                <p>100% Secure Payment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                              <img src="{{ asset('User/img/icon/support.svg') }}" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>24/7 Support</h4>
                                <p>Feel Free To Call Us</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- feature area end -->


        <!-- popular item -->
        <!-- <div class="product-area">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-12 wow fadeInDown" data-wow-delay=".25s">
                                <div class="site-heading-inline">
                                    <h2 class="site-title">Popular Items</h2>
                                    <a href="shop-grid.html">All Products <i class="fas fa-angle-double-right"></i></a>
                                </div>
                                <div class="item-tab">
                                    <ul class="nav nav-pills mt-40 mb-50" id="item-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="item-tab1" data-bs-toggle="pill"
                                                data-bs-target="#pill-item-tab1" type="button" role="tab"
                                                aria-controls="pill-item-tab1" aria-selected="true">New Arrivals</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="item-tab2" data-bs-toggle="pill"
                                                data-bs-target="#pill-item-tab2" type="button" role="tab"
                                                aria-controls="pill-item-tab2" aria-selected="false">Accessories</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="item-tab3" data-bs-toggle="pill"
                                                data-bs-target="#pill-item-tab3" type="button" role="tab"
                                                aria-controls="pill-item-tab3" aria-selected="false">Clothing & Outwear</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="item-tab4" data-bs-toggle="pill"
                                                data-bs-target="#pill-item-tab4" type="button" role="tab"
                                                aria-controls="pill-item-tab4" aria-selected="false">Glasses</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="item-tab5" data-bs-toggle="pill"
                                                data-bs-target="#pill-item-tab5" type="button" role="tab"
                                                aria-controls="pill-item-tab5" aria-selected="false">Watches & Shoes</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="item-tab6" data-bs-toggle="pill"
                                                data-bs-target="#pill-item-tab6" type="button" role="tab"
                                                aria-controls="pill-item-tab6" aria-selected="false">Bagpack & Caps</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content wow fadeInUp" data-wow-delay=".25s" id="item-tabContent">
                            <div class="tab-pane show active" id="pill-item-tab1" role="tabpanel" aria-labelledby="item-tab1"
                                tabindex="0">
                                <div class="row item-5 g-3">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type new">New</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/a2.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <span>$250.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type hot">Hot</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/a10.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <span>$250.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type oos">Out Of Stock</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/a11.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <span>$250.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type discount">10% Off</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/d11.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <del>$250.00</del>
                                                        <span>$190.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pill-item-tab2" role="tabpanel"
                                aria-labelledby="item-tab2" tabindex="0">
                                <div class="row item-5 g-3">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type new">New</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/d9.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <span>$250.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type hot">Hot</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/d11.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <span>$250.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type oos">Out Of Stock</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/a2.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <span>$250.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type discount">10% Off</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/a3.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <del>$250.00</del>
                                                        <span>$190.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pill-item-tab3" role="tabpanel" aria-labelledby="item-tab3"
                                tabindex="0">
                                <div class="row item-5 g-3">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type new">New</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/d7.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <span>$250.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type hot">Hot</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/d6.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <span>$250.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type oos">Out Of Stock</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/a13.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <span>$250.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type discount">10% Off</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/a14.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <del>$250.00</del>
                                                        <span>$190.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pill-item-tab4" role="tabpanel" aria-labelledby="item-tab4"
                                tabindex="0">
                                <div class="row item-5 g-3">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type new">New</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/a14.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <span>$250.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type hot">Hot</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/d1.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <span>$250.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type oos">Out Of Stock</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/a20.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <span>$250.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type discount">10% Off</span>
                                                <a href="shop-single.html"><img src="assets/img/product/d2.png"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <del>$250.00</del>
                                                        <span>$190.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pill-item-tab5" role="tabpanel" aria-labelledby="item-tab5"
                                tabindex="0">
                                <div class="row item-5 g-3">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type new">New</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/a12.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <span>$250.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type hot">Hot</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/a13.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <span>$250.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type oos">Out Of Stock</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/a5.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <span>$250.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type discount">10% Off</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/a9.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <del>$250.00</del>
                                                        <span>$190.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pill-item-tab6" role="tabpanel" aria-labelledby="item-tab6"
                                tabindex="0">
                                <div class="row item-5 g-3">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type new">New</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/a1.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <span>$250.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type hot">Hot</span>
                                                <a href="shop-single.html"><img src="assets/img/product/a2.png"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <span>$250.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type oos">Out Of Stock</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/a3.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <span>$250.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <span class="type discount">10% Off</span>
                                                <a href="shop-single.html"><img src="{{ asset('User/img/product/a4.png')}}"
                                                        alt=""></a>
                                                <div class="product-action-wrap">
                                                    <div class="product-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                                            data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Quick View"><i class="far fa-eye"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                                            title="Add To Compare"><i
                                                                class="far fa-arrows-repeat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-title"><a href="shop-single.html">Blue Floral Gown</a></h3>
                                                <div class="product-rate">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="product-bottom">
                                                    <div class="product-price">
                                                        <del>$250.00</del>
                                                        <span>$190.00</span>
                                                    </div>
                                                    <button type="button" class="product-cart-btn"
                                                        data-bs-placement="left" data-tooltip="tooltip"
                                                        title="Add To Cart">
                                                        <i class="far fa-shopping-bag"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-banner wow fadeInRight" data-wow-delay=".25s">
                            <a href="#">
                                <img src="{{ asset('User/img/banner/product-banner.jpg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- popular item end -->


        <!-- big banner -->
        <!-- <div class="big-banner pt-100">
            <div class="container wow fadeInUp" data-wow-delay=".25s">
                <div class="banner-wrap" style="background-image: url(User/img/banner/big-banner.jpg);">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="banner-content">
                                <div class="banner-info">
                                    <h6>Mega Collections</h6>
                                    <h2>Huge Sale Up To <span>40%</span> Off</h2>
                                    <p>at our outlet stores</p>
                                </div>
                                <a href="shop-grid.html" class="theme-btn">Shop Now<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- big banner end -->


        <!-- brand area -->

        <!-- <div class="brand-area py-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto wow fadeInDown" data-wow-delay=".25s">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline">Our Brands</span>
                            <h2 class="site-title">Let's Check Our <span>Popular Brands</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row g-4 justify-content-center wow fadeInUp" data-wow-delay=".25s">
                    <div class="col-md-6 col-lg-2">
                        <div class="brand-item">
                            <a href="shop-grid.html">
                                <img src="{{ asset('User/img/brand/01.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="brand-item">
                            <a href="shop-grid.html">
                                <img src="{{ asset('User/img/brand/02.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="brand-item">
                            <a href="shop-grid.html">
                                <img src="{{ asset('User/img/brand/03.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="brand-item">
                            <a href="shop-grid.html">
                                <img src="{{ asset('User/img/brand/04.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="brand-item">
                            <a href="shop-grid.html">
                                <img src="{{ asset('User/img/brand/05.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="brand-item">
                            <a href="shop-grid.html">
                                <img src="{{ asset('User/img/brand/06.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="brand-item">
                            <a href="shop-grid.html">
                                <img src="{{ asset('User/img/brand/04.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="brand-item">
                            <a href="shop-grid.html">
                                <img src="{{ asset('User/img/brand/02.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="brand-item">
                            <a href="shop-grid.html">
                                <img src="{{ asset('User/img/brand/03.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="brand-item">
                            <a href="shop-grid.html">
                                <img src="{{ asset('User/img/brand/01.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- brand area end -->


        <!-- video area -->
        <!-- <div class="video-area">
            <div class="container-fluid px-0">
                <div class="video-content" style="background-image: url(User/img/video/01.jpg);">
                    <div class="video-wrapper">
                        <a class="play-btn popup-youtube" href="https://www.youtube.com/watch?v=ckHzmP1evNU">
                            <i class="fas fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- video area end -->


        <!-- product list -->
        <!-- <div class="product-list pl-negative">
            <div class="container wow fadeInUp" data-wow-delay=".25s">
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="product-list-box">
                            <h2 class="product-list-title">On sale</h2>
                            <div class="product-list-item">
                                <div class="product-list-img">
                                    <a href="shop-single.html"><img src="{{ asset('User/img/product/a1.png')}}" alt="#"></a>
                                </div>
                                <div class="product-list-content">
                                    <h4><a href="shop-single.html">Blue Floral Gown</a></h4>
                                    <div class="product-list-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-list-price">
                                        <del>60.00</del><span>$40.00</span>
                                    </div>
                                </div>
                                <a href="#" class="product-list-btn" data-bs-placement="left" data-tooltip="tooltip"
                                    title="Add To Cart"><i class="far fa-shopping-bag"></i></a>
                            </div>
                            <div class="product-list-item">
                                <div class="product-list-img">
                                    <a href="shop-single.html"><img src="{{ asset('User/img/product/a3.png')}}" alt="#"></a>
                                </div>
                                <div class="product-list-content">
                                    <h4><a href="shop-single.html">Blue Floral Gown</a></h4>
                                    <div class="product-list-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-list-price">
                                        <del>60.00</del><span>$40.00</span>
                                    </div>
                                </div>
                                <a href="#" class="product-list-btn" data-bs-placement="left" data-tooltip="tooltip"
                                    title="Add To Cart"><i class="far fa-shopping-bag"></i></a>
                            </div>
                            <div class="product-list-item">
                                <div class="product-list-img">
                                    <a href="shop-single.html"><img src="{{ asset('User/img/product/a7.png')}}" alt="#"></a>
                                </div>
                                <div class="product-list-content">
                                    <h4><a href="shop-single.html">Blue Floral Gown</a></h4>
                                    <div class="product-list-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-list-price">
                                        <del>60.00</del><span>$40.00</span>
                                    </div>
                                </div>
                                <a href="#" class="product-list-btn" data-bs-placement="left" data-tooltip="tooltip"
                                    title="Add To Cart"><i class="far fa-shopping-bag"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="product-list-box">
                            <h2 class="product-list-title">Best Seller</h2>
                            <div class="product-list-item">
                                <div class="product-list-img">
                                    <a href="shop-single.html"><img src="{{ asset('User/img/product/a12.png')}}" alt="#"></a>
                                </div>
                                <div class="product-list-content">
                                    <h4><a href="shop-single.html">Blue Floral Gown</a></h4>
                                    <div class="product-list-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-list-price">
                                        <del>60.00</del><span>$40.00</span>
                                    </div>
                                </div>
                                <a href="#" class="product-list-btn" data-bs-placement="left" data-tooltip="tooltip"
                                    title="Add To Cart"><i class="far fa-shopping-bag"></i></a>
                            </div>
                            <div class="product-list-item">
                                <div class="product-list-img">
                                    <a href="shop-single.html"><img src="{{ asset('User/img/product/a13.png')}}" alt="#"></a>
                                </div>
                                <div class="product-list-content">
                                    <h4><a href="shop-single.html">Blue Floral Gown</a></h4>
                                    <div class="product-list-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-list-price">
                                        <del>60.00</del><span>$40.00</span>
                                    </div>
                                </div>
                                <a href="#" class="product-list-btn" data-bs-placement="left" data-tooltip="tooltip"
                                    title="Add To Cart"><i class="far fa-shopping-bag"></i></a>
                            </div>
                            <div class="product-list-item">
                                <div class="product-list-img">
                                    <a href="shop-single.html"><img src="{{ asset('User/img/product/a14.png')}}" alt="#"></a>
                                </div>
                                <div class="product-list-content">
                                    <h4><a href="shop-single.html">Blue Floral Gown</a></h4>
                                    <div class="product-list-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-list-price">
                                        <del>60.00</del><span>$40.00</span>
                                    </div>
                                </div>
                                <a href="#" class="product-list-btn" data-bs-placement="left" data-tooltip="tooltip"
                                    title="Add To Cart"><i class="far fa-shopping-bag"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="product-list-box">
                            <h2 class="product-list-title">Top Rated</h2>
                            <div class="product-list-item">
                                <div class="product-list-img">
                                    <a href="shop-single.html"><img src="{{ asset('User/img/product/d1.png')}}" alt="#"></a>
                                </div>
                                <div class="product-list-content">
                                    <h4><a href="shop-single.html">Blue Floral Gown</a></h4>
                                    <div class="product-list-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-list-price">
                                        <del>60.00</del><span>$40.00</span>
                                    </div>
                                </div>
                                <a href="#" class="product-list-btn" data-bs-placement="left" data-tooltip="tooltip"
                                    title="Add To Cart"><i class="far fa-shopping-bag"></i></a>
                            </div>
                            <div class="product-list-item">
                                <div class="product-list-img">
                                    <a href="shop-single.html"><img src="{{ asset('User/img/product/d2.png')}}" alt="#"></a>
                                </div>
                                <div class="product-list-content">
                                    <h4><a href="shop-single.html">Blue Floral Gown</a></h4>
                                    <div class="product-list-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-list-price">
                                        <del>60.00</del><span>$40.00</span>
                                    </div>
                                </div>
                                <a href="#" class="product-list-btn" data-bs-placement="left" data-tooltip="tooltip"
                                    title="Add To Cart"><i class="far fa-shopping-bag"></i></a>
                            </div>
                            <div class="product-list-item">
                                <div class="product-list-img">
                                    <a href="shop-single.html"><img src="{{ asset('User/img/product/d3.png')}}" alt="#"></a>
                                </div>
                                <div class="product-list-content">
                                    <h4><a href="shop-single.html">Blue Floral Gown</a></h4>
                                    <div class="product-list-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-list-price">
                                        <del>60.00</del><span>$40.00</span>
                                    </div>
                                </div>
                                <a href="#" class="product-list-btn" data-bs-placement="left" data-tooltip="tooltip"
                                    title="Add To Cart"><i class="far fa-shopping-bag"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- product list end -->


        <!-- best seller -->
        <!-- <div class="seller-area py-100">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInDown" data-wow-delay=".25s">
                        <div class="site-heading-inline">
                            <h2 class="site-title">Best Sellers</h2>
                            <a href="vendors.html">View More <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row wow fadeInUp" data-wow-delay=".25s">
                    <div class="col">
                        <div class="seller-item">
                            <div class="seller-img">
                                <a href="vendor-store.html"><img src="{{ asset('User/img/seller/01.png')}}" alt=""></a>
                            </div>
                            <a href="vendor-store.html" class="seller-title">Fast Shop</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="seller-item">
                            <div class="seller-img">
                                <a href="vendor-store.html"><img src="{{ asset('User/img/seller/02.png')}}" alt=""></a>
                            </div>
                            <a href="vendor-store.html" class="seller-title">Borcelle Shop</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="seller-item">
                            <div class="seller-img">
                                <a href="vendor-store.html"><img src="{{ asset('User/img/seller/03.png')}}" alt=""></a>
                            </div>
                            <a href="vendor-store.html" class="seller-title">Fradel Shop</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="seller-item">
                            <div class="seller-img">
                                <a href="vendor-store.html"><img src="{{ asset('User/img/seller/04.png')}}" alt=""></a>
                            </div>
                            <a href="vendor-store.html" class="seller-title">Liceria Shop</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="seller-item">
                            <div class="seller-img">
                                <a href="vendor-store.html"><img src="{{ asset('User/img/seller/05.png')}}" alt=""></a>
                            </div>
                            <a href="vendor-store.html" class="seller-title">Fashion Shop</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="seller-item">
                            <div class="seller-img">
                                <a href="vendor-store.html"><img src="{{ asset('User/img/seller/06.png')}}" alt=""></a>
                            </div>
                            <a href="vendor-store.html" class="seller-title">Quick Shop</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="seller-item">
                            <div class="seller-img">
                                <a href="vendor-store.html"><img src="{{ asset('User/img/seller/07.png')}}" alt=""></a>
                            </div>
                            <a href="vendor-store.html" class="seller-title">Sebastin Shop</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="seller-item">
                            <div class="seller-img">
                                <a href="vendor-store.html"><img src="{{ asset('User/img/seller/08.png')}}" alt=""></a>
                            </div>
                            <a href="vendor-store.html" class="seller-title">Jiorox Shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- best seller end -->


        <!-- deal area -->
        <!-- <div class="deal-area pt-50 pb-50">
            <div class="deal-text-shape">Deal</div>
            <div class="container">
                <div class="deal-wrap wow fadeInUp" data-wow-delay=".25s">
                    <div class="deal-slider owl-carousel owl-theme">
                        <div class="deal-item">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="deal-content">
                                        <div class="deal-info">
                                            <span>Weekly Deal</span>
                                            <h1>Best Deal For This Week</h1>
                                            <p>There are many variations of passages available but the majority have
                                                suffered alteration in some form
                                                by injected humour, or randomised words which don't look even slightly
                                                believable.</p>
                                        </div>
                                        <div class="deal-countdown">
                                            <div class="countdown" data-countdown="2027/12/30"></div>
                                        </div>
                                        <a href="shop-grid.html" class="theme-btn theme-btn2">Shop Now <i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="deal-img">
                                        <img src="assets/img/deal/01.png" alt="">
                                        <div class="deal-discount">
                                            <span>35%</span>
                                            <span>off</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="deal-item">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="deal-content">
                                        <div class="deal-info">
                                            <span>Weekly Deal</span>
                                            <h1>Best Deal For This Week</h1>
                                            <p>There are many variations of passages available but the majority have
                                                suffered alteration in some form
                                                by injected humour, or randomised words which don't look even slightly
                                                believable.</p>
                                        </div>
                                        <div class="deal-countdown">
                                            <div class="countdown" data-countdown="2027/12/30"></div>
                                        </div>
                                        <a href="shop-grid.html" class="theme-btn theme-btn2">Shop Now <i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="deal-img">
                                        <img src="assets/img/deal/02.png" alt="">
                                        <div class="deal-discount">
                                            <span>35%</span>
                                            <span>off</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="deal-item">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="deal-content">
                                        <div class="deal-info">
                                            <span>Weekly Deal</span>
                                            <h1>Best Deal For This Week</h1>
                                            <p>There are many variations of passages available but the majority have
                                                suffered alteration in some form
                                                by injected humour, or randomised words which don't look even slightly
                                                believable.</p>
                                        </div>
                                        <div class="deal-countdown">
                                            <div class="countdown" data-countdown="2027/12/30"></div>
                                        </div>
                                        <a href="shop-grid.html" class="theme-btn theme-btn2">Shop Now <i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="deal-img">
                                        <img src="assets/img/deal/03.png" alt="">
                                        <div class="deal-discount">
                                            <span>35%</span>
                                            <span>off</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- deal area end -->


        <!-- about area -->
        <!-- <div class="about-area py-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-left wow fadeInLeft" data-wow-delay=".25s">
                            <div class="about-img">
                                <div class="row">
                                    <div class="col-7">
                                        <img class="img-1" src="{{ asset('User/img/about/01.jpg')}}" alt="">
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img class="img-2" src="{{ asset('User/img/about/02.jpg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="about-experience">
                                <div class="about-experience-icon">
                                    <img src="{{ asset('User/img/icon/experience.svg')}}" alt="">
                                </div>
                                <b>30 Years Of <br> Experience</b>
                            </div>
                            <div class="about-shape">
                                <img src="{{ asset('User/img/shape/05.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-right wow fadeInRight" data-wow-delay=".25s">
                            <div class="site-heading mb-3">
                                <span class="site-title-tagline justify-content-start">
                                    <i class="flaticon-drive"></i> About Us
                                </span>
                                <h2 class="site-title">
                                    World Largest Online <span>Shopping Marketplace</span> For You.
                                </h2>
                            </div>
                            <p>
                                We are standard text ever since the when an unknown printer took a galley of type and
                                scrambled it to make type but the majority have suffered alteration in some form by
                                injected humour
                                specimen book. It has survived not only five but also the leap into electronic remaining
                                essentially by injected humour unchanged.
                            </p>
                            <div class="about-list">
                                <ul>
                                    <li><i class="fas fa-check-double"></i> Streamlined Shipping Experience</li>
                                    <li><i class="fas fa-check-double"></i> Affordable Modern Design</li>
                                    <li><i class="fas fa-check-double"></i> Competitive Price & Easy To Shop</li>
                                    <li><i class="fas fa-check-double"></i> We Made Awesome Products</li>
                                </ul>
                            </div>
                            <a href="contact.html" class="theme-btn mt-4">Discover More<i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- about area end -->


        <!-- gallery-area -->
        <!-- <div class="gallery-area pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto wow fadeInDown" data-wow-delay=".25s">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline">Our Gallery</span>
                            <h2 class="site-title">Let's Check Our Photo <span>Gallery</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row g-4 popup-gallery">
                    <div class="col-md-4 col-lg-3">
                        <div class="gallery-item wow fadeInDown" data-wow-delay=".25s">
                            <div class="gallery-img">
                                <img src="{{ asset('User/img/gallery/02.jpg')}}" alt="">
                                <a class="popup-img gallery-link" href="{{ asset('User/img/gallery/02.jpg')}}"><i
                                        class="fal fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="gallery-item wow fadeInDown" data-wow-delay=".25s">
                            <div class="gallery-img">
                                <img src="{{ asset('User/img/gallery/03.jpg')}}" alt="">
                                <a class="popup-img gallery-link" href="{{ asset('User/img/gallery/03.jpg')}}"><i
                                        class="fal fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="gallery-item gallery-btn-active wow fadeInDown" data-wow-delay=".25s">
                            <div class="gallery-img">
                                <img src="{{ asset('User/img/gallery/01.jpg')}}" alt="">
                                <a class="popup-img gallery-link" href="{{ asset('User/img/gallery/01.jpg')}}"><i
                                        class="fal fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-6">
                        <div class="gallery-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="gallery-img">
                                <img src="{{ asset('User/img/gallery/06.jpg')}}" alt="">
                                <a class="popup-img gallery-link" href="{{ asset('User/img/gallery/06.jpg')}}"><i
                                        class="fal fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="gallery-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="gallery-img">
                                <img src="{{ asset('User/img/gallery/04.jpg')}}" alt="">
                                <a class="popup-img gallery-link" href="{{ asset('User/img/gallery/04.jpg')}}"><i
                                        class="fal fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="gallery-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="gallery-img">
                                <img src="{{ asset('User/img/gallery/05.jpg')}}" alt="">
                                <a class="popup-img gallery-link" href="{{ asset('User/img/gallery/05.jpg')}}"><i
                                        class="fal fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- gallery-area end -->


        <!-- choose-area -->
        <!-- <div class="choose-area bg py-100">
            <div class="container">
                <div class="row g-4 align-items-center wow fadeInDown" data-wow-delay=".25s">
                    <div class="col-lg-4">
                        <span class="site-title-tagline">Why Choose Us</span>
                        <h2 class="site-title">We Provide Premium Quality Products For You</h2>
                    </div>
                    <div class="col-lg-4">
                        <p>There are many variations of passages available but the majority have suffered you are going
                            to use a passage you need to be sure alteration in some form by injected humour randomised
                            words even slightly believable.</p>
                    </div>
                    <div class="col-lg-4">
                        <div class="choose-img">
                            <img src="{{ asset('User/img/choose/01.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="choose-content wow fadeInUp" data-wow-delay=".25s">
                    <div class="row g-4">
                        <div class="col-lg-4">
                            <div class="choose-item">
                                <div class="choose-icon">
                               <img src="{{ asset('User/img/icon/warranty.svg') }}" alt="">
                                </div>
                                <div class="choose-info">
                                    <h4>Original Products</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="choose-item">
                                <div class="choose-icon">
                                   <img src="{{ asset('User/img/icon/price.svg') }}" alt="">
                                </div>
                                <div class="choose-info">
                                    <h4>Affordable Price</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="choose-item">
                                <div class="choose-icon">
                               <img src="{{ asset('User/img/icon/delivery.svg') }}" alt="">
                                </div>
                                <div class="choose-info">
                                    <h4>Free Shipping</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- choose-area end-->


        <!-- testimonial area -->
        <div class="testimonial-area ts-bg py-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto wow fadeInDown" data-wow-delay=".25s">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline">Testimonials</span>
                            <h2 class="site-title text-white">What Our Client Say's <span>About Us</span></h2>
                        </div>
                    </div>
                </div>
                <div class="testimonial-slider owl-carousel owl-theme wow fadeInUp" data-wow-delay=".25s">

          @foreach($clients as $data)
                    <div class="testimonial-item">
                        <div class="testimonial-author">
                            <div class="testimonial-author-img">
                                <img src="{{$data->client_image}}" alt="">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>{{$data->client_name}}</h4>
                                <p>Customer</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <p>
                              {{$data->details}}
                            </p>
                        </div>
                        <div class="testimonial-rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="testimonial-quote-icon"><img src="{{ asset('User/img/icon/quote.svg')}}" alt=""></div>
                    </div>

             @endforeach
                </div>
            </div>
        </div>
        <!-- testimonial area end -->


        <!-- blog area -->
        <!-- <div class="blog-area py-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto wow fadeInDown" data-wow-delay=".25s">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline">Our Blog</span>
                            <h2 class="site-title">Our Latest News & <span>Blog</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="blog-item-img">
                                <img src="{{ asset('User/img/blog/01.jpg')}}" alt="Thumb">
                                <span class="blog-date"><i class="far fa-calendar-alt"></i> Aug 12, 2025</span>
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                        <li><a href="#"><i class="far fa-comments"></i> 2.5k Comments</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a href="blog-single-sidebar.html">There are many variations of passage available majority suffered.</a>
                                </h4>
                                <p>There are many variations available the majority have suffered alteration randomised
                                    words.</p>
                                <a class="theme-btn" href="blog-single-sidebar.html">Read More<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInDown" data-wow-delay=".25s">
                            <div class="blog-item-img">
                                <img src="{{ asset('User/img/blog/02.jpg')}}" alt="Thumb">
                                <span class="blog-date"><i class="far fa-calendar-alt"></i> Aug 15, 2025</span>
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                        <li><a href="#"><i class="far fa-comments"></i> 3.1k Comments</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a href="blog-single-sidebar.html">Contrary to popular belief making simply random text latin.</a>
                                </h4>
                                <p>There are many variations available the majority have suffered alteration randomised
                                    words.</p>
                                <a class="theme-btn" href="blog-single-sidebar.html">Read More<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="blog-item-img">
                                <img src="{{ asset('User/img/blog/03.jpg')}}" alt="Thumb">
                                <span class="blog-date"><i class="far fa-calendar-alt"></i> Aug 18, 2025</span>
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                        <li><a href="#"><i class="far fa-comments"></i> 1.6k Comments</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a href="blog-single-sidebar.html"> If you are going use passage you need sure there middle
                                        text.</a>
                                </h4>
                                <p>There are many variations available the majority have suffered alteration randomised
                                    words.</p>
                                <a class="theme-btn" href="blog-single-sidebar.html">Read More<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- blog area end -->


        <!-- newsletter area -->
        <!-- <div class="newsletter-area pb-100">
            <div class="container wow fadeInUp" data-wow-delay=".25s">
                <div class="newsletter-wrap">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                          
                                <div class="subscribe-form">
                                    <form action="#">
                                        <input type="email" class="form-control" placeholder="Your Email Address">
                                        <button class="theme-btn" type="submit">
                                            Subscribe <i class="far fa-paper-plane"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- newsletter area end -->


        <!-- instagram-area -->
        <!-- <div class="instagram-area pb-100">
            <div class="container wow fadeInUp" data-wow-delay=".25s">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center">
                            <h2 class="site-title">Instagram <span>@mocart</span></h2>
                        </div>
                    </div>
                </div>
                <div class="instagram-slider owl-carousel owl-theme">
                    <div class="instagram-item">
                        <div class="instagram-img">
                            <img src="{{ asset('User/img/instagram/01.jpg')}}" alt="Thumb">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="instagram-item">
                        <div class="instagram-img">
                            <img src="{{ asset('User/img/instagram/02.jpg')}}" alt="Thumb">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="instagram-item">
                        <div class="instagram-img">
                            <img src="{{ asset('User/img/instagram/03.jpg')}}" alt="Thumb">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="instagram-item">
                        <div class="instagram-img">
                            <img src="{{ asset('User/img/instagram/04.jpg')}}" alt="Thumb">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="instagram-item">
                        <div class="instagram-img">
                            <img src="{{ asset('User/img/instagram/05.jpg')}}" alt="Thumb">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="instagram-item">
                        <div class="instagram-img">
                            <img src="{{ asset('User/img/instagram/06.jpg')}}" alt="Thumb">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="instagram-item">
                        <div class="instagram-img">
                            <img src="{{ asset('User/img/instagram/07.jpg')}}" alt="Thumb">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- instagram-area end -->

    </main>


    <!-- footer area -->
    <footer class="footer-area light">
        <div class="footer-widget">
            <div class="container">
                <div class="row footer-widget-wrapper pt-100 pb-40">
                    <div class="col-md-6 col-lg-3">
<div class="footer-widget-box about-us" style="margin-top:0; padding-top:0;">
    
    <a href="index.html" class="footer-logo" style="display:block; margin-top:-38px;">
        <img src="{{ asset('User/img/ko3.png') }}" alt="" style="max-width:180px; margin-top:0;">
    </a>

    <p class="mb-3">
   Likeup Is Your Destination For Trending Products, Trusted Quality And Amazing Deals. 
Explore Fashion, Electronics, Home Essentials And Much More In One Place.
    </p>

    <ul class="footer-contact">
        <li><a href="tel:+21236547898"><i class="far fa-phone"></i>+2 123 654 7898</a></li>
        <li><i class="far fa-map-marker-alt"></i>25/B Milford Road, New York</li>
        <li><a href="mailto:info@example.com"><i class="far fa-envelope"></i>info@example.com</a></li>
        <li><i class="far fa-clock"></i>Mon-Fri (9.00AM - 8.00PM)</li>
    </ul>

</div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Quick Links</h4>
                            <ul class="footer-list">
                                <li><a href="{{route('User.About')}}">About Us</a></li>
                                <li><a href="{{route('User.help')}}">Delivery Info</a></li>
                                <li><a href="{{route('User.Contact')}}">Contact Us</a></li>
                                <li><a href="{{route('User.terms')}}">Terms Of Service</a></li>
                                <li><a href="{{route('User.privacy')}}">Privacy policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Browse Category</h4>
                            <ul class="footer-list">
                                <li><a href="{{route('User.Shop')}}">Accessories</a></li>
                                <li><a href="{{route('User.Shop')}}">Home & Garden</a></li>
                                <li><a href="{{route('User.Shop')}}">Electronics</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Support Center</h4>
                            <ul class="footer-list">
                                <li><a href="{{route('User.help')}}">Support Center</a></li>
                              
                                <li><a href="{{route('User.returnpolicy')}}">Returns Policy</a></li>
                                <li><a href="affiliate.html">Our Affiliates</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Get Mobile App</h4>
                            <p>Likeup App will be available soon on Google Play Store & App Store. Stay tuned!.</p>
                            <div class="footer-download">
                                <h5>Download Our Mobile App</h5>
                                <div class="footer-download-btn">
                                    <a href="{{route('User.Shop')}}">
                                        <i class="fab fa-google-play"></i>
                                        <div class="download-btn-info">
                                            <span>Get It On</span>
                                            <h6>Google Play</h6>
                                        </div>
                                    </a>
                                    <a href="{{route('User.Shop')}}">
                                        <i class="fab fa-app-store"></i>
                                        <div class="download-btn-info">
                                            <span>Get It On</span>
                                            <h6>App Store</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="footer-payment mt-20">
                                <span>We Accept:</span>
                                <img src="{{ asset('User/img/payment/visa.svg')}}" alt="">
                                <img src="{{ asset('User/img/payment/mastercard.svg')}}" alt="">
                                <img src="{{ asset('User/img/payment/amex.svg')}}" alt="">
                                <img src="{{ asset('User/img/payment/discover.svg')}}" alt="">
                                <img src="{{ asset('User/img/payment/paypal.svg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="copyright-wrap">
                    <div class="row">
                        <div class="col-12 col-lg-6 align-self-center">
                            <p class="copyright-text">
                                &copy; Copyright <span id="date"></span> <a href="index.html"> Likeup </a> All Rights
                                Reserved.
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 align-self-center">
                            <div class="footer-social">
                                <span>Follow Us:</span>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-x-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->


    <!-- scroll-top -->
    <a href="#" id="scroll-top"><i class="far fa-arrow-up-from-arc"></i></a>
    <!-- scroll-top end -->


    <!-- modal quick shop-->
    <div class="modal quickview fade" id="quickview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="quickview" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="far fa-xmark"></i></button>
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="quickview-img">
                                <img src="assets/img/product/d2.png" alt="#">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="quickview-content">
                                <h4 class="quickview-title">Blue Floral Gown</h4>
                                <div class="quickview-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <span class="rating-count"> (4 Customer Reviews)</span>
                                </div>
                                <div class="quickview-price">
                                    <h5><del>$860</del><span>$740</span></h5>
                                </div>
                                <ul class="quickview-list">
                                    <li>Brand:<span>Apple</span></li>
                                    <li>Category:<span>Healthcare</span></li>
                                    <li>Stock:<span class="stock">Available</span></li>
                                    <li>Code:<span>789FGDF</span></li>
                                </ul>
                                <div class="quickview-cart">
                                    <a href="{{ route('User.shopsingle', encrypt($data->id)) }}" class="theme-btn">Add to cart</a>
                                </div>
                                <div class="quickview-social">
                                    <span>Share:</span>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-x-twitter"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal quick shop end -->


    <!-- js -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('User/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('User/js/modernizr.min.js') }}"></script>
<script src="{{ asset('User/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('User/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('User/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('User/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('User/js/jquery.appear.min.js') }}"></script>
<script src="{{ asset('User/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('User/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('User/js/counter-up.js') }}"></script>
<script src="{{ asset('User/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('User/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('User/js/countdown.min.js') }}"></script>
<script src="{{ asset('User/js/wow.min.js') }}"></script>
<script src="{{ asset('User/js/main.js') }}"></script>

<!-- Wishlist Js  -->
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end', // top right
        showConfirmButton: false,
        timer: 3000, // 3 second
        timerProgressBar: true,
    });

    @if(session('success'))
        Toast.fire({
            icon: 'success',
            title: '{{ session('success') }}'
        });
    @endif

    @if(session('error'))
        Toast.fire({
            icon: 'error',
            title: '{{ session('error') }}'
        });
    @endif
</script>
</body>

</html>

