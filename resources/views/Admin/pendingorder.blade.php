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
.order-status-dropdown{
    position:relative;
    display:inline-block;
}

/* Main Button */
.order-status-btn{
    border:none;
    background:linear-gradient(135deg,#fff8e7,#fff3cd);
    color:#d68910;
    padding:8px 18px;
    font-size:13px;
    font-weight:600;
    border-radius:30px;
    cursor:pointer;
    box-shadow:0 4px 12px rgba(0,0,0,.08);
    transition:.3s ease;
}

.order-status-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 18px rgba(0,0,0,.12);
}

/* Dropdown */
.order-status-menu{
    position:absolute;
    top:50px;
    left:0;
    width:165px;
    background:#fff;
    border-radius:14px;
    box-shadow:0 12px 28px rgba(0,0,0,.12);
    overflow:hidden;
    display:none;
    z-index:999;
}

.order-status-menu.show{
    display:block;
    animation:popup .25s ease;
}

/* Menu Items */
.status-item{
    display:block;
    padding:12px 16px;
    text-decoration:none;
    font-size:13px;
    font-weight:600;
    transition:.3s;
}

.status-item:hover{
    background:#f8f9ff;
    padding-left:22px;
}

/* Colored labels */
.pending{
    color:#f39c12;
}

.confirmed{
    color:#28a745;
}

.cancelled{
    color:#e74c3c;
}

@keyframes popup{
    from{
        opacity:0;
        transform:translateY(-10px) scale(.96);
    }
    to{
        opacity:1;
        transform:translateY(0) scale(1);
    }
}
.confirmed-btn{
background:linear-gradient(135deg,#eafaf1,#d5f5e3);
color:#28a745;
}

.cancelled-btn{
background:linear-gradient(135deg,#fdeaea,#fadbd8);
color:#e74c3c;
}

/* Wrapper */
.status-dropdown{
position:relative;
display:inline-block;
}

/* Main Button */
.status-btn{
border:none;
outline:none;
padding:6px 14px;
font-size:12px;
font-weight:600;
border-radius:4px;
cursor:pointer;
min-width:95px;
box-shadow:0 2px 8px rgba(0,0,0,.08);
transition:.3s;
}

.status-btn:hover{
transform:translateY(-1px);
}

/* Status Colors */
.status-pending{
background:#ffe8cc;
color:#f59e0b;
}

.status-success{
background:#dcfce7;
color:#16a34a;
}

.status-cancel{
background:#fee2e2;
color:#b91c1c;
}


/* Dropdown */
.status-options{
position:absolute;
top:38px;
left:0;
width:145px;
background:#fff;
border-radius:4px;
overflow:hidden;
box-shadow:0 8px 20px rgba(0,0,0,.12);
display:none;
z-index:999;
}

.status-options.show{
display:block;
animation:fadeIn .2s ease;
}

/* Links */
.status-options a{
display:block;
text-decoration:none;
}

.status-options a div{
padding:10px 14px;
font-size:12px;
font-weight:600;
transition:.2s;
}

.status-options a div:hover{
background:#f8fafc;
padding-left:18px;
}

/* Option colors */
.status-options a:nth-child(1) div{
color:#b7791f;
}

.status-options a:nth-child(2) div{
color:#047857;
}

.status-options a:nth-child(3) div{
color:#b91c1c;
}
.swal2-popup {
    border-radius: 10px;
}

.swal2-title {
    font-size: 20px;
}

.swal2-html-container {
    font-size: 14px;
    margin-top: 5px;
}

/* icon thoda small */
.swal2-icon {
    transform: scale(0.85);
    margin: 10px auto;
}

/* buttons compact */
.swal2-confirm,
.swal2-cancel {
    padding: 8px 18px !important;
    font-size: 13px !important;
    border-radius: 6px !important;
}

@keyframes fadeIn{
from{
opacity:0;
transform:translateY(-6px);
}
to{
opacity:1;
transform:translateY(0);
}
}
</style>

<div class="page-wrapper">
    <div class="page-header">
        <h2>Pending Order List </h2>
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
                    <th>Status</th>
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
  <td>
<div class="status-dropdown">

<button class="status-btn
@if($orders->status=='Pending') status-pending
@elseif($orders->status=='Confirmed ') status-success
@else status-cancel
@endif">
{{$orders->status}}
</button>

<div class="status-options">

<a href="{{ route('Admin.order.status.change', [Crypt::encrypt($orders->id),'Pending']) }}">
    <div>Pending</div>
</a>

<a href="{{ route('Admin.order.status.change', [Crypt::encrypt($orders->id),'Confirmed ']) }}">
    <div>Confirmed </div>
</a>

<a href="{{ route('Admin.order.status.change', [Crypt::encrypt($orders->id),'Cancelled']) }}">
    <div>Cancelled</div>
</a>

</div>

</div>
</td>
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
                        <a href="#"
                                    class="action-btn btn-delete"
                                    onclick="confirmDelete('{{ route('Admin.DeleteOrder', $orders->id) }}'); return false;">
                                    Delete
                                    </a>
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
function toggleStatus(button){
    let menu = button.nextElementSibling;

    document.querySelectorAll('.order-status-menu').forEach(item=>{
        if(item !== menu){
            item.classList.remove('show');
        }
    });

    menu.classList.toggle('show');
}

document.addEventListener('click',function(e){
if(!e.target.closest('.order-status-dropdown')){
document.querySelectorAll('.order-status-menu').forEach(item=>{
item.classList.remove('show');
});
}
});

document.querySelectorAll('.status-btn').forEach(button=>{

button.addEventListener('click',function(e){

e.stopPropagation();

let menu=this.nextElementSibling;

// close others
document.querySelectorAll('.status-options').forEach(item=>{
if(item!==menu){
item.classList.remove('show');
}
});

menu.classList.toggle('show');

});

});


document.addEventListener('click',function(){
document.querySelectorAll('.status-options').forEach(item=>{
item.classList.remove('show');
});
});
</script>




<script>
function confirmDelete(url) {
    Swal.fire({
        title: 'Delete Item?',
        text: 'Do you really want to delete this Order',
        icon: 'warning',

        width: '320px',     // 👈 compact width
        padding: '1em',     // 👈 tight spacing

        showCancelButton: true,
        confirmButtonText: 'Yes, Delete',
        cancelButtonText: 'Cancel',

        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#3498db'
    }).then((result) => {
        if (result.isConfirmed) {

            Swal.fire({
                title: 'Deleted!',
                icon: 'success',
                timer: 1000,
                showConfirmButton: false
            });

            setTimeout(() => {
                window.location.href = url;
            }, 1000);
        }
    });
}
</script>

@endsection