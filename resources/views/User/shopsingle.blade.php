
@extends('User.UserLayout.main')

@section('main-content')

    <main class="main">

        <!-- breadcrumb -->
        <div class="site-breadcrumb">
            <div class="site-breadcrumb-bg" style="background: url(User/img/01.webp)"></div>
            <div class="container">
                <div class="site-breadcrumb-wrap">
                    <h4 class="breadcrumb-title">Shop Single One</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="index.html"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">Shop Single One</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- shop single -->
        <div class="shop-single py-90">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-6 col-xxl-5">
                        <div class="shop-single-gallery">
                            <a class="shop-single-video popup-youtube" href="https://www.youtube.com/watch?v=jLS3DrTJrpI" data-tooltip="tooltip" title="Watch Video">
                                <i class="far fa-play"></i>
                            </a>
                          <div class="flexslider-thumbnails">

                            <!-- MAIN IMAGE -->
                        <div class="main-image-box" style="width:100%; height:400px; overflow:hidden;">
                               <img id="mainImage" 
                                src="{{ asset($shopsingles->image) }}" 
                                alt="#" 
                                style="width:100%; height:100%; object-fit:cover; transition: all 0.4s ease;">
                        </div>

                            <!-- THUMBNAILS -->
                            <div class="thumb-row" style="display:flex; gap:8px; margin-top:10px;">
                                
                                <img src="{{ asset($shopsingles->image) }}" 
                                    class="thumb-img"
                                    onclick="changeImage(this.src)">

                                <img src="{{ asset($shopsingles->second_image ?? $shopsingles->image) }}" 
                                    class="thumb-img"
                                    onclick="changeImage(this.src)">

                                <img src="{{ asset($shopsingles->third_image ?? $shopsingles->image) }}" 
                                    class="thumb-img"
                                    onclick="changeImage(this.src)">
                            </div>

                        </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xxl-6">
                        <div class="shop-single-info">
                            <h4 class="shop-single-title">{{$shopsingles->product_name}}</h4>
                            <div class="shop-single-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                                <span class="rating-count"> (4 Customer Reviews)</span>
                            </div>
                            <div class="shop-single-price">
                                <del>₹690</del>
                                <span class="amount">₹ {{$shopsingles->price}}</span>
                                <span class="discount-percentage">{{$shopsingles->discount}}% Off</span>
                            </div>
                            <p class="mb-3">
                               {{$shopsingles->description}}
                            </p>
                             <form  action="{{ route('User.AddToCart', encrypt($shopsingles->id)) }}" method="post" class="cart-form">
                                            @csrf
                            <div class="shop-single-cs">
                                <div class="row">
                                    <div class="col-md-3 col-lg-4 col-xl-3">
                                        <div class="shop-single-size">
                                            <h6>Category</h6>
                                           <span>Electronics</span>
                                        </div>
                                    </div>


        <!-- Add To Cart (Form) -->
                                       

                                    @php
                                        $sizes = json_decode($shopsingles->size, true) ?? [];
                                    @endphp

                                    <div class="col-md-3 col-lg-4 col-xl-3">
                                        <div class="shop-single-size">
                                            <h6>Size</h6>
                                           <select class="select" name="size">
                                                <option value="">Select Size</option>

                                                @foreach($sizes as $size)
                                                    <option value="{{ $size }}">{{ $size }}</option>
                                                @endforeach

                                              
                                           </select>
                                        </div>
                                    </div>

                                        @php
                                            $colorNames = json_decode($shopsingles->color_name, true) ?? [];
                                            $colorCodes = json_decode($shopsingles->color_code, true) ?? [];
                                        @endphp

                                        <div class="col-md-6 col-lg-12 col-xl-6">
                                            <div class="shop-single-color-new">
                                                <h6>Select Color</h6>

                                                <div class="color-flex">

                                                    @foreach($colorCodes as $index => $code)
                                                        <label class="color-box">
                                                            
                                                            <input 
                                                                type="radio" 
                                                                name="color_code" 
                                                                value="{{ $code }}|{{ $colorNames[$index] ?? '' }}"
                                                                required
                                                            >

                                                            <span class="color-circle" style="background: {{ $code }}"></span>

                                                            <span class="color-name">
                                                                {{ $colorNames[$index] ?? '' }}
                                                            </span>

                                                        </label>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        </div>


                            
                            <div class="shop-single-sortinfo">
                                <ul>
                                    
                                    <li>Category: <span>{{$shopsingles->category}}</span></li>
                                    <li>Tags: <a href="#">{{$shopsingles->tags}}</a>,</li>
                                </ul>
                            </div>
                            <div class="shop-single-action">
                                <div class="row align-items-center">
                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                       <div class="shop-single-btn">

                                
                                            <button type="submit" class="theme-btn">
                                                <span class="far fa-shopping-bag"></span> Add To Cart
                                            </button>
                                       

                                        <!-- Wishlist -->
                                        <a href="#" class="theme-btn theme-btn2 " title="Add To Wishlist" style="margin-left:30px;">
                                            <span class="far fa-heart"></span>
                                        </a>
                                     <button type="submit" name="action" value="buy_now" 
                                        class="theme-btn theme-btn2" 
                                        title="Buy Now" 
                                        style="margin-left:30px; border:none;">

                                        <span class="fas fa-bolt"></span> Buy Now
                                    </button>
                                    </form>
                                    </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                
                <!-- shop single details -->
                <div class="shop-single-details">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-tab1" data-bs-toggle="tab" data-bs-target="#tab1"
                                type="button" role="tab" aria-controls="tab1" aria-selected="true">Description</button>
                            
                            <button class="nav-link" id="nav-tab3" data-bs-toggle="tab" data-bs-target="#tab3"
                                type="button" role="tab" aria-controls="tab3" aria-selected="false">Reviews
                                (05)</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="nav-tab1">
                            <div class="shop-single-desc">
                                <p>{{$shopsingles->full_description}}</p>
                           

                            </div>
                        </div>
                      
                        
                       
                        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="nav-tab3">
                            <div class="shop-single-review">
                                <div class="blog-comments">
                                    <h5>Reviews (05)</h5>
                                    <div class="blog-comments-wrap">
                                        <div class="blog-comments-item mt-0">
                                            <img src="assets/img/blog/com-1.jpg" alt="thumb">
                                            <div class="blog-comments-content">
                                                <h5>Sinkler Denola</h5>
                                                <span><i class="far fa-clock"></i> August 20, 2025</span>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries but also the leap electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                <a href="#"><i class="far fa-reply"></i> Reply</a>
                                                <div class="review-rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="blog-comments-item ms-md-5">
                                            <img src="assets/img/blog/com-2.jpg" alt="thumb">
                                            <div class="blog-comments-content">
                                                <h5>Daniel Wellman</h5>
                                                <span><i class="far fa-clock"></i> August 20, 2025</span>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries but also the leap electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                <a href="#"><i class="far fa-reply"></i> Reply</a>
                                                <div class="review-rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="blog-comments-item">
                                            <img src="assets/img/blog/com-3.jpg" alt="thumb">
                                            <div class="blog-comments-content">
                                                <h5>Kenneth Evans</h5>
                                                <span><i class="far fa-clock"></i> August 20, 2025</span>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries but also the leap electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                <a href="#"><i class="far fa-reply"></i> Reply</a>
                                                <div class="review-rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-comments-form">
                                        <h4 class="mb-4">Leave A Review</h4>
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Your Name*">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" placeholder="Your Email*">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Your Subject*">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <select class="form-control form-select">
                                                            <option value="">Your Rating</option>
                                                            <option value="5">5 Stars</option>
                                                            <option value="4">4 Stars</option>
                                                            <option value="3">3 Stars</option>
                                                            <option value="2">2 Stars</option>
                                                            <option value="1">1 Star</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="5" placeholder="Your Review*"></textarea>
                                                    </div>
                                                    <button type="submit" class="theme-btn"><span class="far fa-paper-plane"></span> Submit Review</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- shop single details end -->


                <!-- similar item shop -->
                <!-- <div class="seller-area pt-50 pb-60">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="site-heading-inline">
                                    <h2 class="site-title">Also Available At</h2>
                                    <a href="#">View More <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="seller-item">
                                    <div class="seller-img">
                                        <a href="#"><img src="{{asset('User/img/seller/01.png')}}" alt=""></a>
                                    </div>
                                    <a href="#" class="seller-title">Fast Shop</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="seller-item">
                                    <div class="seller-img">
                                        <a href="#"><img src="{{asset('User/img/seller/01.png')}}" alt=""></a>
                                    </div>
                                    <a href="#" class="seller-title">Borcelle Shop</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="seller-item">
                                    <div class="seller-img">
                                        <a href="#"><img src="{{asset('User/img/seller/01.png')}}" alt=""></a>
                                    </div>
                                    <a href="#" class="seller-title">Fradel Shop</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="seller-item">
                                    <div class="seller-img">
                                        <a href="#"><img src="{{asset('User/img/seller/01.png')}}" alt=""></a>
                                    </div>
                                    <a href="#" class="seller-title">Liceria Shop</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="seller-item">
                                    <div class="seller-img">
                                        <a href="#"><img src="{{asset('User/img/seller/01.png')}}" alt=""></a>
                                    </div>
                                    <a href="#" class="seller-title">Fashion Shop</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="seller-item">
                                    <div class="seller-img">
                                        <a href="#"><img src="{{asset('User/img/seller/01.png')}}" alt=""></a>
                                    </div>
                                    <a href="#" class="seller-title">Quick Shop</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="seller-item">
                                    <div class="seller-img">
                                        <a href="#"><img src="{{asset('User/img/seller/01.png')}}" alt=""></a>
                                    </div>
                                    <a href="#" class="seller-title">Sebastin Shop</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="seller-item">
                                    <div class="seller-img">
                                        <a href="#"><img src="{{asset('User/img/seller/01.png')}}" alt=""></a>
                                    </div>
                                    <a href="#" class="seller-title">Jiorox Shop</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- similar item shop end -->

            
                <!-- related item -->
                <div class="product-area related-item pt-30">
                    <div class="container px-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="site-heading-inline">
                                    <h2 class="site-title">Related Items</h2>
                                    <a href="#">View More <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 item-2">
                            @foreach($relatedProducts as $data)
                            <div class="col-md-6 col-lg-3">
                                <div class="product-item">
                                    <div class="product-img">
                                        <span class="type new">New</span>
                                        <a href="{{ route('User.shopsingle', encrypt($data->id)) }}"><img src="{{ asset($data->image) }}" alt=""></a>
                                        <div class="product-action-wrap">
                                            <div class="product-action">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickview" data-bs-placement="right" data-tooltip="tooltip" title="Quick View"><i class="far fa-eye"></i></a>
                                                <a href="#" data-bs-placement="right" data-tooltip="tooltip" title="Add To Wishlist"><i class="far fa-heart"></i></a>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="product-title"><a href="{{route('User.shopsingle', Crypt::encrypt($data->id))}}">{{$data->product_name}}</a></h3>
                                        <div class="product-rate">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="product-bottom">
                                            <div class="product-price">
                                                <span> ₹ {{$data->price}}</span>
                                            </div>
                                            <button type="button" class="product-cart-btn" data-bs-placement="left" data-tooltip="tooltip" title="Add To Cart">
                                                <i class="far fa-shopping-bag"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- related item end -->
            </div>
        </div>
        <!-- shop single end -->

    </main>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>





<script>


function changeImage(src) {
    let main = document.getElementById("mainImage");

    main.style.opacity = "0.5"; // fade effect

    setTimeout(() => {
        main.src = src;
        main.style.opacity = "1";
    }, 150);
}
</script>



@endsection