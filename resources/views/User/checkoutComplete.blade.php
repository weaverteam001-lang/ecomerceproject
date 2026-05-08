@extends('User.UserLayout.main')

@section('main-content')


    <!-- mobile popup search -->
    <div class="search-popup">
        <button class="close-search"><span class="far fa-times"></span></button>
        <form action="#">
            <div class="form-group">
                <input type="search" name="search-field" class="form-control" placeholder="Search Here..." required>
                <button type="submit"><i class="far fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- mobile popup search end -->


    <main class="main">

        <!-- breadcrumb -->
        <div class="site-breadcrumb">
            <div class="site-breadcrumb-bg" style="background: url(assets/img/breadcrumb/01.jpg)"></div>
            <div class="container">
                <div class="site-breadcrumb-wrap">
                    <h4 class="breadcrumb-title">Checkout Complete</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="index.html"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">Checkout Complete</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- shop checkout complete -->
        <div class="shop-checkout-complete py-120">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 mx-auto">
                        <div class="checkout-complete-content">
                            <div class="checkout-complete-icon"><i class="far fa-check"></i></div>
                            <h3>Thank you for your order!.</h3>
                            <p>Your order has been placed and will be processed as soon as possible.Make sure you make note of 
                                your order number, which is <b>38HF654DWR</b>.You will be receiving an email shortly with confirmation 
                                of your order.</p>
                            <a href="#" class="theme-btn">Go Back Shopping<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- shop checkout complete end -->

    </main>
@endsection