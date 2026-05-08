@extends('Admin.AdminLayout.main')

@section('main-content')

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
.page-wrapper{
    margin-left:0px;
    padding:25px;
    background:#f5f6fa;
    min-height:100vh;
}
@media(max-width:992px){
    .page-wrapper{ margin-left:0; }
}

/* Header */
.page-header h2{
    font-size:18px;
    font-weight:700;
    color:#333;
    margin:12px;
}

/* Card */
.table-card{
    background:#fff;
    padding:18px;
    border-radius:14px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
    overflow-x:auto;
}

/* Table */
table{
    width:100%;
    border-collapse:collapse;
    font-size:12px;
}
thead{ background:#f1f4fb; }
th,td{
    padding:10px 8px;
    white-space:nowrap;
    border-bottom:1px solid #eee;
    vertical-align: middle;
    position: relative;
}
tbody tr:hover{ background:#f9fbff; }

/* Image Box */
.img-box {
    width: 50px;
    height: 50px;
    border-radius: 8px;
    overflow: hidden;
    border: 1px solid #ddd;
    background: #f9f9f9;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}
.img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Eye Icon */
.eye-icon {
    cursor: pointer;
    font-size: 16px;
    color: #007bff;
    margin-left: 8px;
}
.eye-icon:hover {
    color: #0056b3;
}

/* Action Buttons */
.action-btn{
    padding: 6px 14px;
    border-radius: 5px;
    font-size: 11px;
    font-weight: 600;
    color: #fff;
    text-decoration: none;
    display: inline-block;
    margin-right: 6px;
}
.btn-edit { background: #007bff; }
.btn-delete { background: #dc3545; }

/* Address Box (hidden by default) */
.address-box{
    display:none;
    margin-top:6px;
    padding:6px 8px;
    background:#f8f9fa;
    border:1px solid #ddd;
    border-radius:6px;
    font-size:12px;
    white-space: normal;
    max-width: 250px;
}
</style>

<div class="page-wrapper">
    <div class="page-header">
        <h2>Order List</h2>
    </div>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Product ID</th>
                    <th>Product_Image</th> 
                    <th>Product_Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total_Price</th>
                    <th>Status</th>
                    <!-- <th>Cart ID</th> -->
                    <th>Address ID</th>
                    <th>Address_First</th>
                    <th>Address_Second</th>
                    <th>Mobile</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Zip_Code</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($order as $orders)
                <tr>
                    <td>{{$orders->id}}</td>
                    <td>{{$orders->user_id}}</td>
                    <td>{{$orders->user_name}}</td>
                    <td>{{$orders->email}}</td>
                    <td>{{$orders->product_id}}</td>

                    <td>
                        <div class="img-box">
                            <img src="{{ asset($orders->product_image) }}" alt="Product Image">
                        </div>
                    </td>

                    <td>{{$orders->product_name}}</td>
                    <td>{{$orders->price}}</td>
                    <td>{{$orders->quantity}}</td>
                    <td>{{$orders->total_price}}</td>
                     <td>Pending</td>

                   
                    <td>{{$orders->address_id}}</td>

                    <!-- Address First (HIDDEN DEFAULT) -->
                    <td>
                        <i class="fa-solid fa-eye eye-icon"
                           onclick="toggleAddr('a1{{$orders->id}}')"></i>

                        <div id="a1{{$orders->id}}" class="address-box">
                            {{$orders->first_Address ?? 'N/A'}}
                        </div>
                    </td>

                    <!-- Address Second (HIDDEN DEFAULT) -->
                    <td>
                        <i class="fa-solid fa-eye eye-icon"
                           onclick="toggleAddr('a2{{$orders->id}}')"></i>

                        <div id="a2{{$orders->id}}" class="address-box">
                            {{$orders->second_Address ?? 'N/A'}}
                        </div>
                    </td>

                    <td>{{$orders->phone}}</td>
                    <td>{{$orders->state}}</td>
                    <td>{{$orders->city}}</td>
                    <td>{{$orders->post_code}}</td>
                    <td>{{ \Carbon\Carbon::parse($orders->created_at)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($orders->updated_at)->format('d-m-Y') }}</td>

                    <td>
                        <a href="#" class="action-btn btn-edit">Edit</a>
                        <a href="{{route('Admin.DeleteOrder',$orders->id )}}" class="action-btn btn-delete">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- SweetAlert2 CDN -->
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
<script>
function toggleAddr(id){
    let el = document.getElementById(id);

    if(el.style.display === "block"){
        el.style.display = "none";
    } else {
        el.style.display = "block";
    }
}
</script>

@endsection