

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
                    <h4 class="breadcrumb-title">Shop Cart</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="index.html"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">Shop Cart</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- shop cart -->
        <div class="shop-cart py-100">
            <div class="container">
                <div class="shop-cart-wrap">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="cart-table">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
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
                                                        <a href="#"><img src="{{$data->image}}" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="shop-cart-content">
                                                        <h5 class="shop-cart-name"><a href="#">{{$data->product_name}}</a></h5>
                                                        <div class="shop-cart-info">
                                                           
                                                            <p><span>Color:</span>{{$data->color_name}}</p>
                                                            <p><span>Size:</span>{{$data->size}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="shop-cart-price">
                                                        <span>₹{{$data->price}}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="shop-cart-qty">
                                                        
                                                        <!-- Minus Button (FIXED) -->
                                                        <a href="{{ route('User.MinusButton', encrypt($data->id)) }}" class="minus-btn">
                                                            <i class="fal fa-minus"></i>
                                                        </a>

                                                        <!-- Quantity -->
                                                        <input class="quantity" type="text" value="{{$data->quantity}}" disabled>

                                                        <!-- Plus Button -->
                                                        <a href="{{ route('User.PluseButton', encrypt($data->id)) }}" class="plus-btn">
                                                            <i class="fal fa-plus"></i>
                                                        </a>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="shop-cart-subtotal">
                                                        <span>₹{{$data->total_price}}</span>
                                                    </div>
                                                </td>
                                              <td>
    <a href="javascript:void(0);" 
       onclick="deleteCart('{{ route('User.CartPageDelete', encrypt($data->id)) }}')" 
       class="shop-cart-remove"
       title="Remove From Cart">
        <i class="far fa-times"></i>
    </a>
</td>
                                            </tr>
                                          @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="shop-cart-footer">
                                <div class="row">
                                    <div class="col-md-7 col-lg-6">
                                        <div class="shop-cart-coupon"></div>
                                    </div>
                                    <div class="col-md-5 col-lg-6">
                                        <div class="shop-cart-btn text-md-end">
                                            <a href="#" class="theme-btn"><span class="fas fa-arrow-left"></span> Continue Shopping</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="shop-cart-summary">
                                <h5>Cart Summary</h5>
                                <ul>
                                    <li><strong>Sub Total:</strong> <span>₹{{ $Cart_count }}</span></li>
                                    <li><strong>Shipping:</strong> <span>Free</span></li>
                                    <li class="shop-cart-total"><strong>Total:</strong> <span> ₹{{ $Cart_count }}</span></li>
                                </ul>
                                <div class="text-end mt-40">
                                    <a href="{{route('User.checkout')}}" class="theme-btn">Checkout Now<i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop cart end -->

    </main>
<script>
function deleteCart(url) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This product will be removed from your CartPage!",
        icon: 'warning',
        width: '340px',
        padding: '20px',
        customClass: {
            popup: 'small-popup',
            title: 'small-title',
            htmlContainer: 'small-text',
            confirmButton: 'confirm-btn',
            cancelButton: 'cancel-btn',
            actions: 'btn-gap' // 👈 gap control
        },
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}
</script>
@endsection