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
            <div class="site-breadcrumb-bg" style="background: url(User/img/01.webp)"></div>
            <div class="container">
                <div class="site-breadcrumb-wrap">
                    <h4 class="breadcrumb-title">Shop List One</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="index.html"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">Shop List One</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- shop-area -->
        <div class="shop-area bg-2 py-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="shop-sidebar">
                            <div class="shop-widget">
                                <div class="shop-search-form">
                                    <h4 class="shop-widget-title">Search</h4>
                                    <form action="#">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search">
                                            <button type="search"><i class="far fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>

             <!-- category Filter    -->
                            <div class="shop-widget">
                                <h4 class="shop-widget-title">Category</h4>
                               <ul class="shop-category-list">

                                    <li>
                                    <a href="{{ route('User.Shop') }}">
                                    All Products
                                    </a>
                                    </li>

                                        @foreach($category as $data)
                                        <li>
                                        <a href="{{ route('User.ShopList',['category'=>$data->id]) }}">
                                        {{$data->category}}
                                        <span>({{ DB::table('products')->where('category_id',$data->id)->count() }})</span>
                                        </a>
                                        </li>
                                        @endforeach

                             </ul>
                            </div>   
                            
            <!-- category Filter  End  -->                            


                            <!-- <div class="shop-widget">
                                <h4 class="shop-widget-title">Price Range</h4>
                                <div class="price-range-box">
                                    <div class="price-range-input">
                                        <input type="text" id="price-amount" readonly>
                                    </div>
                                    <div class="price-range"></div>
                                </div>
                            </div>

                            <div class="shop-widget">
                                <h4 class="shop-widget-title">Ratings</h4>
                                <ul class="shop-checkbox-list rating">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="rate1">
                                            <label class="form-check-label" for="rate1">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="rate2">
                                            <label class="form-check-label" for="rate2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fal fa-star"></i>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="rate3">
                                            <label class="form-check-label" for="rate3">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fal fa-star"></i>
                                                <i class="fal fa-star"></i>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="rate4">
                                            <label class="form-check-label" for="rate4">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fal fa-star"></i>
                                                <i class="fal fa-star"></i>
                                                <i class="fal fa-star"></i>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="rate5">
                                            <label class="form-check-label" for="rate5">
                                                <i class="fas fa-star"></i>
                                                <i class="fal fa-star"></i>
                                                <i class="fal fa-star"></i>
                                                <i class="fal fa-star"></i>
                                                <i class="fal fa-star"></i>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="shop-widget">
                                <h4 class="shop-widget-title">Colors</h4>
                                <ul class="shop-checkbox-list color">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="color1">
                                            <label class="form-check-label" for="color1"><span style="background-color: #606ddd"></span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="color2">
                                            <label class="form-check-label" for="color2"><span style="background-color: #4caf50"></span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="color3">
                                            <label class="form-check-label" for="color3"><span style="background-color: #17a2b8"></span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="color4">
                                            <label class="form-check-label" for="color4"><span style="background-color: #ffc107"></span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="color5">
                                            <label class="form-check-label" for="color5"><span style="background-color: #f44336"></span></label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="shop-widget">
                                <h4 class="shop-widget-title">Sizes</h4>
                                <ul class="shop-checkbox-list">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="size1">
                                            <label class="form-check-label" for="size1">Extra Small</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="size2">
                                            <label class="form-check-label" for="size2">Small</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="size3">
                                            <label class="form-check-label" for="size3">Medium</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="size4">
                                            <label class="form-check-label" for="size4">Large</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="size5">
                                            <label class="form-check-label" for="size5">Extra Large</label>
                                        </div>
                                    </li>
                                </ul>
                            </div> -->


                            <div class="shop-widget-banner mt-30 mb-50">
                                <div class="banner-img" style="background-image:url(assets/img/banner/shop-banner.jpg)"></div>
                                <div class="banner-content">
                                    <h6>Get <span>35% Off</span></h6>
                                    <h4>New Collection of Sunglassess</h4>
                                    <a href="#" class="theme-btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="col-md-12">
                            <div class="shop-sort">
                                <div class="shop-sort-box">
                                    <div class="shop-sorty-label">Sort By:</div>
                                    <select class="select">
                                        <option value="1">Default Sorting</option>
                                        <option value="5">Latest Items</option>
                                        <option value="2">Best Seller Items</option>
                                        <option value="3">Price - Low To High</option>
                                        <option value="4">Price - High To Low</option>
                                    </select>
                                    <div class="shop-sort-show">Showing 1-10 of 50 Results</div>
                                </div>
                                <div class="shop-sort-gl">
                                    <a href="{{route('User.Shop')}}" class="shop-sort-grid"><i class="far fa-grid-round-2"></i></a>
                                    <a href="{{route('User.ShopList')}}" class="shop-sort-list active"><i class="far fa-list-ul"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="shop-item-wrap item-list">
                            <div class="row g-4">

                              @foreach($product as $data)    
                                <div class="col-md-12">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <span class="type">{{$data->About_product}}</span>
                                            <a href="{{ route('User.shopsingle', encrypt($data->id)) }}"><img src="{{$data->image}}" alt=""></a>
                                            <div class="product-action-wrap">
                                                <div class="product-action">
                                                    <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#quickview" data-tooltip="tooltip" title="Quick View"><i class="far fa-eye"></i></a> -->
                                                    <a href="{{route('User.Wishlist', encrypt($data->id))}}" data-tooltip="tooltip" title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                                    <!-- <a href="#" data-tooltip="tooltip" title="Add To Compare"><i class="far fa-arrows-repeat"></i></a> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="product-title"><a href="{{ route('User.shopsingle', encrypt($data->id)) }}">{{$data->product_name}}</a></h3>
                                            <div class="product-rate">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <p>{{$data->full_description}}</p>
                                            <div class="product-bottom">
                                                <div class="product-price">
                                                    <span>₹{{$data->price}}</span>
                                                </div>
                                            <a href="{{ route('User.shopsingle', encrypt($data->id)) }}" class="product-cart-btn" data-bs-placement="left" data-tooltip="tooltip" title="Add To Cart">
                                                <i class="far fa-shopping-bag"></i>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- pagination -->
                        <div class="pagination-area mt-50">
                            <div aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true"><i class="far fa-arrow-left"></i></span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><span class="page-link">...</span></li>
                                    <li class="page-item"><a class="page-link" href="#">10</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true"><i class="far fa-arrow-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- pagination end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- shop-area end -->

    </main>

@endsection