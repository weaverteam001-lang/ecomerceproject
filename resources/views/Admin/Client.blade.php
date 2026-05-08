@extends('Admin.AdminLayout.main')

@section('main-content')

<style>
.client-page{
padding:25px 20px;
}

.wrapper{
max-width:760px;
margin:auto;
}

/* Form */
.form-card{
background:#fff;
border-radius:20px;
padding:28px;
box-shadow:0 8px 30px rgba(0,0,0,.06);
border:1px solid #edf0f7;
}

.page-title{
font-size:28px;
font-weight:700;
text-align:center;
margin-bottom:20px;
color:#1e293b;
}

.back-btn{
display:inline-block;
background:#1263BE;
color:#fff;
padding:10px 18px;
border-radius:10px;
text-decoration:none;
font-weight:600;
margin-bottom:20px;
}

.form-group{
margin-bottom:20px;
}

.form-label{
font-weight:600;
font-size:15px;
display:block;
margin-bottom:8px;
color:#334155;
}

.input{
width:100%;
height:46px;
border:1px solid #d6dce7;
border-radius:12px;
padding:0 15px;
transition:.3s;
}

textarea.input{
height:120px;
padding-top:14px;
}

.input:focus{
outline:none;
border-color:#8b5cf6;
box-shadow:0 0 0 4px rgba(139,92,246,.10);
}

.upload-box{
display:block;
border:2px dashed #cbd5e1;
padding:32px;
border-radius:16px;
text-align:center;
background:#fafbff;
cursor:pointer;
}

.upload-box:hover{
border-color:#8b5cf6;
background:#f5f3ff;
}

.upload-box i{
font-size:32px;
color:#8b5cf6;
margin-bottom:10px;
}

.btn-wrap{
display:flex;
justify-content:flex-end;
gap:12px;
margin-top:20px;
}

.reset-btn{
background:#e2e8f0;
border:none;
padding:10px 22px;
border-radius:10px;
font-weight:600;
}

.submit-btn{
background:#3269A6;
color:white;
border:none;
padding:10px 25px;
border-radius:10px;
font-weight:600;
}

/* Table */
.table-box{
margin-top:35px;
background:#fff;
border-radius:20px;
padding:22px;
box-shadow:0 8px 30px rgba(0,0,0,.06);
overflow-x:auto;
}

.table-title{
font-size:24px;
font-weight:700;
margin-bottom:18px;
color:#1e293b;
}

table{
width:100%;
border-collapse:collapse;
min-width:700px;
}

thead{
background:#eef2ff;
}

th{
padding:15px;
font-size:14px;
font-weight:700;
color:#334155;
text-align:left;
}

td{
padding:15px;
border-bottom:1px solid #eef2f7;
font-size:14px;
vertical-align:middle;
}

.client-img{
width:55px;
height:55px;
border-radius:12px;
object-fit:cover;
border:2px solid #ddd;
}

.badge-date{
background:#e0f2fe;
padding:7px 12px;
border-radius:30px;
font-size:12px;
font-weight:600;
}

.action-btn{
display:inline-block;
padding:8px 14px;
border-radius:9px;
text-decoration:none;
font-size:13px;
font-weight:600;
margin-right:6px;
}

.edit-btn{
background:#dcfce7;
color:#166534;
}

.delete-btn{
background:#fee2e2;
color:#b91c1c;
}

.action-btn:hover{
text-decoration:none;
}

@media(max-width:768px){
.form-card,.table-box{
padding:18px;
}
.btn-wrap{
flex-direction:column;
}
.btn-wrap button{
width:100%;
}
}

/* ===== CATEGORY LIST TABLE ===== */
.category-table-box{
    background:#fff;
    padding:22px;
    border-radius:16px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    overflow-x:auto;
    margin-top:20px;
}

.category-table-title{
    font-size:20px;
    font-weight:600;
    color:#222;
    margin-bottom:18px;
}

.category-table{
    width:100%;
    border-collapse:collapse;
    min-width:850px;
    font-family:'Poppins',sans-serif;
}

.category-table thead{
    background:#f3f6fc;
}

.category-table thead th{
    padding:14px 12px;
    text-align:left;
    font-size:13px;
    font-weight:600;
    color:#2c3445;
    border-bottom:1px solid #dde4ef;
}

.category-table tbody td{
    padding:14px 12px;
    font-size:13px;
    color:#555;
    border-bottom:1px solid #eef1f6;
}

.category-table tbody tr{
    transition:.3s;
}

.category-table tbody tr:hover{
    background:#f9fbff;
}

/* ID Badge */
.id-badge{
    background:#eef4ff;
    color:#2368ff;
    padding:5px 10px;
    border-radius:30px;
    font-weight:600;
}

/* Status Button */
.status-btn{
    display:inline-block;
    padding:6px 12px;
    border-radius:6px;
    text-decoration:none;
    font-size:11px;
    font-weight:600;
}

.status-active{
    background:#e8fff1;
    color:#14a44d;
}

.status-inactive{
    background:#ffecec;
    color:#dc3545;
}

/* Action Buttons */
.action-btn{
    display:inline-block;
    text-decoration:none;
    color:#fff;
    padding:7px 14px;
    font-size:11px;
    font-weight:600;
    border-radius:6px;
    margin-right:6px;
    transition:.3s;
}

.action-btn:hover{
    transform:translateY(-2px);
}

.edit-btn{
    background:linear-gradient(135deg,#0d6efd,#084298);
}

.delete-btn{
    background:linear-gradient(135deg,#dc3545,#b02a37);
}

/* Responsive */
@media(max-width:768px){

.category-table-box{
padding:15px;
}

.category-table{
min-width:700px;
}

.category-table th,
.category-table td{
padding:10px 8px;
font-size:12px;
}

.action-btn{
padding:6px 11px;
margin-bottom:5px;
}
}
.modal {
    display: none; /* 👈 default hidden */
    position: fixed;
    z-index: 10000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    
    background-color: rgba(0,0,0,0.8);

    justify-content: center;
    align-items: center;
}

.modal-content {
    width: 300px;
    height: 300px;
    border-radius: 50%;
    object-fit: cover;
}

.close {
    position: absolute;
    top: 20px;
    right: 30px;
    color: white;
    font-size: 35px;
    cursor: pointer;
}
.preview-img {
    cursor: pointer;
}

.toggle-eye {
    color: #555;
    font-size: 16px;
    transition: 0.3s;
}

.toggle-eye:hover {
    color: #1263BE;
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
</style>


<div class="client-page">
<div class="wrapper">

<a href="{{route('Admin.Dashboard')}}" class="back-btn">
← Back
</a>

<h2 class="page-title">
Add Client
</h2>

<form class="form-card" action="javascript:void(0)" method="post" id="client" enctype="multipart/form-data">
@csrf

<div class="form-group">
<label class="form-label">Client Image</label>

<label class="upload-box">
<i class="fas fa-cloud-upload-alt"></i>
<p>Upload Client Image</p>

<input
type="file"
name="client_image"
hidden>
</label>
</div>


<div class="form-group">
<label class="form-label">
Client Name
</label>

<input
type="text"
name="client_name"
class="input"
placeholder="Enter client name">
</div>


<div class="form-group">
<label class="form-label">
Details
</label>

<textarea
name="details"
class="input"
placeholder="Enter details"></textarea>
</div>


<div class="btn-wrap">
<button type="reset" class="reset-btn">
Reset
</button>

<button type="submit" class="submit-btn">
Save Client
</button>
</div>

</form>

</div>
</div>


<div class="category-table-box">

    <h2 class="category-table-title">
        Category List
    </h2>

    <table class="category-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Client Image</th>
                <th>Client Name</th>
                <th>Date</th>
                <th>Details</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
  @foreach($clients as $data)
            <tr>
                <td>
                    <span class="">
                      {{$data->id}}
                    </span>
                </td>

<td>
    <img src="{{ asset($data->client_image) }}" 
         width="50px" height="50px" 
         class="rounded preview-img"
         onclick="openModal(this.src)">
</td>



                <td> {{$data->client_name}}</td>
                <td> {{$data->created_at}}</td>

       <td>
    <span class="details-text" id="details-{{$data->id}}" style="display:none;">
        {{$data->details}}
    </span>

    <br>

    <i class="fa-solid fa-eye toggle-eye"
       onclick="toggleDetails({{$data->id}})"
       style="cursor:pointer; margin-top:5px;">
    </i>
</td>

                <td>
                    <a href="{{route('Admin.EditClient', $data->id)}}"
                       class="action-btn edit-btn">
                        Edit
                    </a>
                        <a href="#"
                        class="action-btn delete-btn"
                        onclick="confirmDelete('{{ route('Admin.DeleteClient', $data->id) }}'); return false;">
                        Delete
                        </a>
                </td>

            </tr>
         
    @endforeach
        </tbody>
    </table>
<!-- Modal -->
<div id="imgModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="modalImage">
</div>
</div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <script>
        $(document).ready(function() {
            $('#client').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission
        
                var url = "{{route('Admin.GetClient')}}";
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
                            $('#client').trigger("reset");
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
                              location.reload();
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





<script>
function openModal(src) {
    let modal = document.getElementById("imgModal");
    modal.style.display = "flex"; // 👈 change
    document.getElementById("modalImage").src = src;
}

function closeModal() {
    document.getElementById("imgModal").style.display = "none";
}
</script>

<script>
function toggleDetails(id) {
    let text = document.getElementById("details-" + id);
    let icon = event.target;

    if (text.style.display === "none") {
        text.style.display = "inline";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        text.style.display = "none";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
</script>



<script>
function confirmDelete(url) {
    Swal.fire({
        title: 'Delete Item?',
        text: 'Are you sure you want to delete this Client',
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