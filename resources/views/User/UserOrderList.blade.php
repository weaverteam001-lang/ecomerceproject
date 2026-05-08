
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
                    <h4 class="breadcrumb-title">Orders List</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="index.html"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">Orders List</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- user orders list -->
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
                                        <div class="user-card-header">
                                            <h4 class="user-card-title">Orders List</h4>
                                            <div class="user-card-header-right">
                                                <div class="user-card-filter">
                                                    <select class="select">
                                                        <option value="">Default</option>
                                                        <option value="1">Pending</option>
                                                        <option value="2">Processing</option>
                                                        <option value="3">Completed</option>
                                                        <option value="3">Cancelled</option>
                                                    </select>
                                                </div>
                                                <div class="user-card-search">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Search...">
                                                        <i class="far fa-search"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


<div class="table-responsive">
    <table class="table table-borderless text-nowrap align-middle">
        <thead>
            <tr>
                <th>Product_Name</th>
                <th>Product_Image</th>
                <th>Purchased Date</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order as $data)
            <tr>
<td>
    <span class="table-list-code" style="font-size:14px;">
        {{$data->product_name}}
    </span>
</td>

                <td>
                    <img src="{{$data->product_image}}"
                         alt="Product"
                         style="width:65px;height:65px;object-fit:cover;border-radius:8px;">
                </td>

                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('F d, Y') }}</td>
              <td>₹{{ number_format($data->total_price,0) }}</td>
<td>
@if(strtolower(trim($data->status)) == 'pending')

<span style="
background:#ffc107;
color:#5c4400;
padding:4px 10px;
font-size:12px;
font-weight:600;
border-radius:2px;
display:inline-block;">
    {{ $data->status }}
</span>

@elseif(in_array(strtolower(trim($data->status)), ['confirmed']))

<span style="
background:#198754;
color:#ffffff;
padding:4px 10px;
font-size:12px;
font-weight:600;
border-radius:2px;
display:inline-block;">
    {{ $data->status }}
</span>

@elseif(strtolower(trim($data->status)) == 'cancelled')

<span style="
background:#dc3545;
color:#ffffff;
padding:4px 10px;
font-size:12px;
font-weight:600;
border-radius:2px;
display:inline-block;">
    {{ $data->status }}
</span>

@endif
</td>
                <td>
                        <button class="btn btn-sm btn-danger">
                            <i class="far fa-trash"></i>
                        </button>

                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
        <!-- user orders list end -->

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