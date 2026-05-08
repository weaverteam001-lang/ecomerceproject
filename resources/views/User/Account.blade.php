

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
                    <h4 class="breadcrumb-title">My Profile</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="index.html"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">My Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- user profile -->
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

                    <!-- end  -->
                    <div class="col-lg-9">
                        <div class="user-wrapper">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="user-card">
                                        <h4 class="user-card-title">Profile Info</h4>
                                        <div class="user-form">


                                            <form action="{{route('User.UpdateAccount')}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input type="text" class="form-control" name="name" value="{{$userdetails->name}}"
                                                                placeholder="First Name">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="text"  name="email" class="form-control"
                                                              value="{{$userdetails->email}}" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                            <input type="text"  name="mobile" class="form-control"
                                                                value="{{$userdetails->mobile}}" placeholder="Phone">
                                                        </div>
                                                    </div>
                                                                                                        <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label>Update Date</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ \Carbon\Carbon::parse($userdetails->updated_at)->format('d-m-Y') }}"
                                                            placeholder="Phone" readonly>
                                                    </div>
</div>


                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text"   name="address" class="form-control"
                                                               value="{{$userdetails->address}}" placeholder=" Save Your Address">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="theme-btn"><span class="far fa-user"></span> Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="user-card">
                                        <h4 class="user-card-title">Change Password</h4>
                                        <div class="col-lg-12">
                                            <div class="user-form">
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Old Password</label>
                                                                <input type="password" class="form-control"
                                                                    placeholder="Old Password">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>New Password</label>
                                                                <input type="password" class="form-control"
                                                                    placeholder="New Password">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Re-Type Password</label>
                                                                <input type="password" class="form-control"
                                                                    placeholder="Re-Type Password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="theme-btn"><span class="far fa-key"></span> Change Password</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- user profile end -->

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