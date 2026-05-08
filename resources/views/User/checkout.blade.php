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

    <main class="main">

        <!-- breadcrumb -->
        <div class="site-breadcrumb">
            <div class="site-breadcrumb-bg" style="background: url(User/img/01.webp)"></div>
            <div class="container">
                <div class="site-breadcrumb-wrap">
                    <h4 class="breadcrumb-title">Shop Checkout</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="index.html"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">Shop Checkout</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="shop-checkout py-80">
            <div class="container">
                <div class="shop-checkout-wrap">
                    <div class="row g-4">

                        <!-- ==================== LEFT SIDE ==================== -->
                        <div class="col-lg-8">

                            <!-- Product Details -->
                            <h4 class="mb-4 text-dark">Your Cart Items</h4>
                            
                            <div class="cart-table mb-5">
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Sub Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                    @foreach($cartsproducts as $data)       
                                            <tr>
                                                <td>
                                                    <div class="shop-cart-img">
                                                     <img src="{{ asset($data->image) }}" alt="" style="width:100px;">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="shop-cart-content">
                                                        <h5 class="shop-cart-name"><a href="#">{{$data->product_name}}</a></h5>
                                                        <div class="shop-cart-info">
                                                            <p><span>Color:</span> {{$data->color_name}}</p>
                                                            <p><span>Size:</span> {{$data->size}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="fw-semibold">₹{{$data->price}}</span></td>
                                                <td>
                                                    <div class="shop-cart-qty">
                                                        <a href="{{ route('User.MinusButton', encrypt($data->id)) }}" class="minus-btn">
                                                            <i class="fal fa-minus"></i>
                                                        </a>

                                                        <input class="quantity" type="text" value="{{$data->quantity}}" disabled>

                                                        <a href="{{ route('User.PluseButton', encrypt($data->id)) }}" class="plus-btn">
                                                            <i class="fal fa-plus"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td><span class="fw-semibold">₹{{$data->total_price}}</span></td>
                                                <td>
                                                    <a href="{{ route('User.CartPageDelete', encrypt($data->id)) }}" class="shop-cart-remove text-danger"><i class="far fa-times"></i></a>
                                                </td>
                                            </tr>
                                            <!-- You can keep adding more rows same as before -->
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Billing Address Section -->
                            <h4 class="mb-3 text-dark">Billing Address</h4>

                            @foreach($address as $add)
                            <div class="current-address-box border border-2 rounded-4 p-4 shadow-sm bg-white mb-3">
                                <div class="form-check">
                                    <input class="form-check-input mt-1" 
                                           type="radio" 
                                           name="address_id" 
                                           id="address_{{ $add->id }}" 
                                           value="{{ $add->id }}">

                                    <label class="form-check-label w-100" for="address_{{ $add->id }}">
                                        <div class="d-flex justify-content-between align-items-start gap-3">
                                            <div class="flex-grow-1">
                                                <div class="d-flex align-items-center gap-2 mb-2">
                                                    <strong class="fs-5">
                                                        {{ $add->f_name }} {{ $add->l_name }}
                                                    </strong>
                                                    @if($add->is_default ?? false)
                                                        <span class="badge bg-success rounded-pill px-3 py-1">DEFAULT</span>
                                                    @endif
                                                </div>

                                                <div class="text-muted mb-2">
                                                    <i class="fas fa-phone-alt me-2"></i> {{ $add->phone }}
                                                </div>

                                                <div class="text-secondary">
                                                    {{ $add->first_Address }}<br>
                                                    {{ $add->city }}, {{ $add->state }} - {{ $add->post_code }}
                                                </div>
                                            </div>

                                            <div>
                                                <a href="{{ route('User.AddressEdit', $add->id) }}" 
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i> Change
                                                </a>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            @endforeach

                            <!-- Add New Address Button -->
                            <button onclick="toggleForm()" class="theme-btn w-100 mb-4">
                                + Add New Address
                            </button>

                            <!-- Hidden Address Form -->
                            <div id="addressForm" style="display: none;">
                                <div class="shop-checkout-form">
                                    <form action="javascript:void(0)" method="post" id="Saveaddress">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" name="f_name" class="form-control" placeholder="Enter Your First Name" required>
                                                    <!-- <input type="hidden" name="product_id" value="{{ request()->id }}"> -->
                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" name="l_name" class="form-control" placeholder="Enter Your Last Name" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Address Line 1</label>
                                                    <input type="text" name="first_Address" placeholder="House number, street name, area" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Address Line 2 (Optional)</label>
                                                    <input type="text" name="second_Address" class="form-control" placeholder="Landmark, Floor, Apartment">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" name="city" class="form-control" placeholder="Enter Your City" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <input type="text" name="state" class="form-control" placeholder="Enter Your State" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Post Code</label>
                                                    <input type="text" name="post_code" class="form-control" placeholder="Post Code" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <button type="submit" class="theme-btn w-100">Save Address</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                        <!-- ==================== RIGHT SIDE: Fixed Cart Summary ==================== -->
                        <div class="col-lg-4">
                            <div class="shop-cart-summary" style="position: sticky; top: 25px;">
                                <h5 class="mb-4">Cart Summary</h5>
                                <ul class="list-unstyled">
                                    <li class="d-flex justify-content-between py-2 border-bottom">
                                        <strong>Sub Total:</strong> 
                                        <span>₹ {{$Cart_count}}</span>
                                    </li>
                                    <li class="d-flex justify-content-between py-2 border-bottom">
                                        <strong>Shipping:</strong> 
                                        <span class="text-success">Free</span>
                                    </li>
                                    <li class="d-flex justify-content-between py-3 fw-bold fs-5 shop-cart-total">
                                        <strong>Total:</strong> 
                                        <span>₹{{$Cart_count}}</span>
                                    </li>
                                </ul>

                                <div class="mt-4">
                                    <form action="{{ route('User.Order') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="address_id" id="selectedAddressId">

                                        <button type="submit" class="theme-btn w-100">
                                            Checkout Now <i class="fas fa-arrow-right ms-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
});

@if(session('success'))
    Toast.fire({
        icon: 'success',
        title: "{{ session('success') }}"
    });
@endif

@if(session('error'))
    Toast.fire({
        icon: 'error',
        title: "{{ session('error') }}"
    });
@endif
</script>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        function toggleForm() {
            let form = document.getElementById("addressForm");
            if (form.style.display === "none" || form.style.display === "") {
                form.style.display = "block";
                form.scrollIntoView({ behavior: "smooth" });
            } else {
                form.style.display = "none";
            }
        }

        $(document).ready(function() {
            $('#Saveaddress').on('submit', function(event) {
                event.preventDefault();
                
                $.ajax({
                    url: "{{ route('User.Saveaddress') }}",
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
                            Toastify({
                                text: result.message,
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                style: { background: "green", color: "white" }
                            }).showToast();
                            
                            $('#Saveaddress').trigger("reset");
                            document.getElementById("addressForm").style.display = "none";

                            setTimeout(() => window.location.href = result.redirect_url, 1200);
                        } else {
                            Toastify({
                                text: result.message,
                                duration: 4000,
                                gravity: "top",
                                position: "right",
                                style: { background: "red", color: "white" }
                            }).showToast();
                        }
                    }
                });
            });
        });

        // Address selection
        document.querySelectorAll('input[name="address_id"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.getElementById('selectedAddressId').value = this.value;
            });
        });
    </script>




@endsection