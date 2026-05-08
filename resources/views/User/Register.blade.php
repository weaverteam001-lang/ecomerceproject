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
                    <h4 class="breadcrumb-title">Register</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="index.html"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">Register</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- register area -->
        <div class="login-area py-100">
            <div class="container">
                <div class="col-md-5 mx-auto">
                    <div class="login-form">
                        <div class="login-header">
                            <img src="assets/img/logo/logo.png" alt="">
                            <p>Create your free mocart account</p>
                        </div>

                        <form action="javascript:void(0)" id="Register" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email"  name="email" class="form-control" placeholder="Your Email">
                            </div>

                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text"  name="mobile" class="form-control" placeholder="Your Phone Name">
                            </div>   

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password"  name="password" class="form-control" placeholder="Your Password">
                            </div>
                            <div class="form-group">
                                <label> Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                            </div>
                            <div class="form-check form-group">
                                <input class="form-check-input" type="checkbox" value="" id="agree">
                                <label class="form-check-label" for="agree">
                                   I agree with the <a href="{{route('User.terms')}}">Terms Of Service.</a>
                                </label>
                            </div>
                            <div class="d-flex align-items-center">
                                <button type="submit" class="theme-btn"><i class="far fa-paper-plane"></i> Register</button>
                            </div>
                        </form>
                        <div class="login-footer">
                            <p>Already have an account? <a href="login.html">Login.</a></p>
                         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- register area end -->

    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

      <script>
        $(document).ready(function() {
            $('#Register').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission
        
                var url = "{{route('User.Registration')}}";
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    success: function(result) {
                        if (result.status_code === 1) {
                            $('#Register').trigger("reset");
                            Toastify({
                                text: result.message,
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                style:{
                                    background:"green",
                                    color: "white",
                                }
                            }).showToast();
                            setTimeout(function() {
                                window.location.href = result.redirect_url; // This will reload the page after 2 seconds
                            }, 1000);

                            
                        } else if (result.status_code === 2) {
                            Toastify({
                                text: result.message,
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                style:{
                                    background:"red",
                                    color: "white",
                                }
                            }).showToast();
                        } else {
                            Toastify({
                                text: result.message,
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                style:{
                                    background:"red",
                                    color: "white",
                                }
                            }).showToast();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', error);
                        Toastify({
                            text: 'An error occurred. Please try again.',
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            style:{
                                    background:"red",
                                    color: "white",
                                }
                        }).showToast();
                    }
                });
            });
        });
    </script>
@endsection