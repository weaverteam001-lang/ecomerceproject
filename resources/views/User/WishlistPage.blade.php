


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
                    <h4 class="breadcrumb-title">My Wishlist</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="index.html"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">My Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- user wishlist -->
     <div class="user-area bg-2 py-100">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="sidebar">

                        <!-- ds  -->
                        <div class="sidebar-top">

                        <form action="{{ route('User.UpdateImage') }}" 
                            method="POST"
                            enctype="multipart/form-data"
                            id="profileForm">
                        @csrf

                        <div class="sidebar-profile-img">

                        <!-- Profile image click = full preview popup -->
                        <img id="profilePreview"
                            src="{{ asset($user_image->image ?? 'assets/img/account/03.jpg') }}"
                            alt="Profile Image"
                            onclick="openPreview(event)"
                            style="cursor:pointer;">

                        <!-- Camera click = upload -->
                        <label for="profileInput" class="profile-img-btn">
                            <i class="far fa-camera"></i>
                        </label>

                        <input type="file"
                            name="image"
                            id="profileInput"
                            hidden
                            accept="image/*">

                        </div>

                        </form>


                        <!-- Full Image Popup -->
                        <div id="imageModal" class="img-modal">
                            <span class="close-btn" onclick="closePreview()">&times;</span>
                            <img id="popupImg">
                        </div>
                        <h5>{{ Auth::user()->name }}</h5>
                        <p>{{ Auth::user()->email }}</p>

                        </div>

<!-- xc  -->

    
                            <ul class="sidebar-list">
                                <li><a class="active" href="{{route('User.home')}}"><i class="far fa-gauge-high"></i> Dashboard</a></li>
                                  <li class="user-menu">
                                    <a href="{{route('User.UserOrderList')}}"  class="collapsed">
                                        <i class="far fa-shopping-bag"></i> Orders List
                                    </a>
                                   
                                </li>
                                  
                                </li>
                                <li><a href="{{route('User.WishlistPage')}}"><i class="far fa-heart"></i> My Wishlist</a></li>

                                <li><a href="notification.html"><i class="far fa-bell"></i> Notification <span class="badge badge-danger">02</span></a></li>
                                <li>
                                    <form action="UserLogout" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="logout-btn">
                                            <i class="far fa-sign-out"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>




                    <div class="col-lg-9">
                        <div class="user-wrapper">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="user-card">
                                        <h4 class="user-card-title">My Wishlist</h4>
                                        <div class="row mt-20">
                                           @foreach($Wishlist as $data) 
                                            <div class="col-md-6 col-lg-4">
                                                <div class="product-item">
                                                    <div class="product-img">
                                                        <span class="type new">{{$data->About_product}}</span>
                                                        <a href="{{ route('User.shopsingle', encrypt($data->product_id)) }}"><img src="{{$data->image}}" alt=""></a>
                                                        <div class="product-action-wrap">
                                                            <div class="product-action">
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickview" data-tooltip="tooltip" title="Quick View"><i class="far fa-eye"></i></a>
                                                                    <a href="javascript:void(0);" 
                                                                    onclick="deleteWishlist('{{ route('User.WishlistDelete', $data->id) }}')" 
                                                                    title="Remove From Wishlist">
                                                                    <i class="far fa-xmark"></i>
                                                                    </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h3 class="product-title"><a href="{{ route('User.shopsingle', encrypt($data->product_id)) }}">{{$data->product_name}}</a></h3>
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
                                                            <a href="{{ route('User.shopsingle', encrypt($data->product_id)) }}" 
                                                            class="product-cart-btn" 
                                                            data-bs-placement="left" 
                                                            data-tooltip="tooltip" 
                                                            title="Add To Cart">
                                                                <i class="far fa-shopping-bag"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                        <!-- pagination -->
                                        <div class="pagination-area mt-4 mb-3">
                                            <div aria-label="Page navigation example">
                                                <ul class="pagination">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true"><i class="far fa-angle-double-left"></i></span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true"><i class="far fa-angle-double-right"></i></span>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- user wishlist end -->

    </main>


<script>
document.getElementById('profileInput').addEventListener('change',function(){

if(this.files && this.files[0]){

let reader = new FileReader();

reader.onload=function(e){
document.getElementById('profilePreview').src=e.target.result;
}

reader.readAsDataURL(this.files[0]);

setTimeout(function(){
document.getElementById('profileForm').submit();
},300);

}

});


// Full preview popup
function openPreview(e){
e.preventDefault();

let img=document.getElementById('profilePreview').src;
document.getElementById('popupImg').src=img;
document.getElementById('imageModal').style.display='block';
}

function closePreview(){
document.getElementById('imageModal').style.display='none';
}

document.getElementById('imageModal').onclick=function(e){
if(e.target===this){
closePreview();
}
}
</script>
@endsection