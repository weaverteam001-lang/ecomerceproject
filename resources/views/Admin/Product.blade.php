@extends('Admin.AdminLayout.main')

@section('main-content')

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
    padding:8px;
    white-space:nowrap;
    border-bottom:1px solid #eee;
    
}
tbody tr:hover{ background:#f9fbff; }

/* Image */
.product-img{
    width:45px;
    height:45px;
    border-radius:8px;
    border:1px solid #ddd;
    object-fit:cover;
    cursor:pointer;
}

/* Action Buttons (Edit/Delete/Status SAME STYLE) */
.action-btn,
.btn-status{
    padding:5px 10px;
    font-size:11px;
    border-radius:6px;
    text-decoration:none;
    font-weight:600;
    display:inline-block;
}

/* Edit Delete */
.btn-edit{ background:#e8f0ff; color:#3f5bdc; }
.btn-delete{ background:#fdeaea; color:#dc3545; }

/* Status */
.btn-active{ background:#e6f9ee; color:#28a745; }
.btn-inactive{ background:#fdeaea; color:#dc3545; }

/* Stock */
.stock-in{ color:#28a745; font-weight:600; }
.stock-out{ color:#dc3545; font-weight:600; }
.stock-limited{ color:red; font-weight:600; }

/* Image Preview */
.image-preview-overlay{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,0.6);
    display:none;
    align-items:center;
    justify-content:center;
    z-index:9999;
}
.image-preview-box{
    width:400px;
    height:300px;
    background:#fff;
    border-radius:10px;
    padding:10px;
    position:relative;
}
.image-preview-box img{
    width:100%;
    height:100%;
    object-fit:contain;
}
.close-preview{
    position:absolute;
    top:6px;
    right:8px;
    cursor:pointer;
    color:#dc3545;
    font-weight:700;
}


.swal-title {
    font-size: 18px !important;
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
}

.swal-text {
    font-size: 14px !important;
    font-family: 'Poppins', sans-serif;
    color: #555;
}

.swal-confirm-btn {
    background: #e74c3c;
    color: #fff;
    padding: 8px 18px;
    font-size: 14px;
    border-radius: 6px;
    border: none;
    margin-right: 8px;
}

.swal-cancel-btn {
    background: #3498db;
    color: #fff;
    padding: 8px 18px;
    font-size: 14px;
    border-radius: 6px;
    border: none;
}
.action-btn {
    padding: 6px 14px;
    border-radius: 5px;
    font-size: 11px;
    font-weight: 600;
    color: #fff;
    text-decoration: none;
    display: inline-block;
    margin-right: 6px;
    transition: 0.3s ease;
}

/* Edit Button */
.btn-edit {
    background: linear-gradient(135deg, #007bff, #0056b3);
    box-shadow: 0 4px 10px rgba(0,123,255,0.3);
}
.btn-edit:hover {
    transform: translateY(-2px);
}

/* Delete Button */
.btn-delete {
    background: linear-gradient(135deg, #dc3545, #c82333);
    box-shadow: 0 4px 10px rgba(220,53,69,0.3);
}
.btn-delete:hover {
    transform: translateY(-2px);
}
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
    transition: 0.3s;
    cursor: pointer;
}

.img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Hover Effect 🔥 */
.img-box:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

/* delete popp css  */


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
</style>

<div class="page-wrapper">
<br><br>

<div class="page-header">
    <h2>Product List</h2>

    <a href="{{route('Admin.AddProduct')}}"
       style="padding:10px 16px;background:#3269A6;color:#fff;
       font-size:12px;border-radius:5px;text-decoration:none;">
        + Add Product
    </a>
</div>
<br>
<div class="table-card">
<table>
<thead>
<tr>
    <th>ID</th>
    <th>Product</th>
    <th>Image</th>
    <th>Image_2</th>
    <th>Image_3</th>
    <th>Status</th>
    <th>Category_id</th>
     <th>Category_name</th>
    <!-- <th>Price</th> -->
    <th>Discount</th>
      <th>Size</th>
      <th>Stock</th>
      <th>About_Product</th>
      <th>Color</th>
    <th>Created</th>
    <th>Updated</th>
    <th>Action</th>
</tr>
</thead>

<tbody>
@foreach($product as $data)
<tr>
    <td>{{$data->id}}</td>
    <td>{{$data->product_name}} </td>
  <td>
    <div class="img-box" onclick="showImage('{{ asset($data->image) }}')">
       <img src="{{ asset($data->image) }}">
    </div>
   </td>
     <td>
    <div class="img-box" onclick="showImage('{{ asset($data->second_image) }}')">
   <img src="{{ asset($data->second_image) }}">
    </div>
   </td>
     <td>
    <div class="img-box" onclick="showImage('{{ asset($data->third_image) }}')">
       <img src="{{ asset($data->third_image) }}">
    </div>
   </td>
    <td>
         @if($data->status == 1)
            <a href="{{ route('Admin.changeProductState', ['id' => Crypt::encrypt($data->id)]) }}"
              class="btn-status btn-active">Active</a>
           @else
            <a href="{{ route('Admin.changeProductState', ['id' => Crypt::encrypt($data->id)]) }}"
                 class="btn-status btn-inactive">InActive</a>
                 @endif
    </td>
    <td>{{$data->category_id}}</td>
    <td>{{$data->category_name}}</td>
    <td>₹{{$data->price}}</td>
    <td>{{$data->discount}}%</td>
    
    <td>{{ is_array(json_decode($data->size, true)) ? implode(', ', json_decode($data->size, true)) : '' }}</td>
    <td>{{$data->stock}}</td>
    <td>{{$data->About_product}}</td>
<td>
    @php
        $colorNames = json_decode($data->color_name, true);
        $colorCodes = json_decode($data->color_code, true);

        $colorNames = is_array($colorNames) ? $colorNames : [];
        $colorCodes = is_array($colorCodes) ? $colorCodes : [];
    @endphp

    <div style="display:flex; align-items:center; gap:10px; flex-wrap:nowrap; overflow-x:auto;">
        
        @foreach($colorNames as $index => $name)

            <div style="display:flex; align-items:center; gap:4px; font-size:11px; white-space:nowrap;">

                <div style="
                    width:13px;
                    height:13px;
                    border-radius:50%;
                    background: {{ $colorCodes[$index] ?? '#FFFFFF' }};
                    border:1px solid #ccc;
                "></div>

                <span style="font-size:11px;">
                    {{ $name }}
                </span>

            </div>

        @endforeach

    </div>
</td>
    <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</td>
    <td>{{ \Carbon\Carbon::parse($data->updated_at)->format('d-m-Y') }}</td>
   
<td>
    <a href="{{route('Admin.EditProduct' , $data->id)}}"
       class="action-btn btn-edit">
        Edit
    </a>

<a href="#"
   class="action-btn btn-delete"
   onclick="confirmDelete('{{ route('Admin.DeleteProduct', $data->id) }}'); return false;">
   Delete
</a>
</td>
</tr>
@endforeach
</tbody>
</table>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- IMAGE PREVIEW -->
<div class="image-preview-overlay" id="imagePreview">
    <div class="image-preview-box">
        <span class="close-preview" id="closePreview">✖</span>
        <img id="previewImg">
    </div>
</div>

<script>
function showImage(src){
    document.getElementById('previewImg').src = src;
    document.getElementById('imagePreview').style.display = 'flex';
}

function closeImage(){
    document.getElementById('imagePreview').style.display = 'none';
}

// Close preview when clicking on overlay or close button
document.getElementById('closePreview').addEventListener('click', closeImage);
document.getElementById('imagePreview').addEventListener('click', function(e) {
    if (e.target === this) {
        closeImage();
    }
});

</script>


<script>
function confirmDelete(url) {
    Swal.fire({
        title: 'Delete Item?',
        text: 'Do you really want to delete this product',
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