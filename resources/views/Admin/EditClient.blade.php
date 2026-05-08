<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Update Client</title>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<style>
*{
    box-sizing:border-box;
    margin:0;
    padding:0;
}

body{
    background:#f4f7fb;
    font-family:'Poppins',sans-serif;
}

/* PAGE */
.client-page{
    padding:40px 15px;
}

/* WRAPPER */
.wrapper{
    max-width:600px;
    margin:auto;
}

/* CARD */
.form-card{
    background:#fff;
    border-radius:18px;
    padding:30px 28px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

/* TITLE */
.page-title{
    text-align:center;
    font-size:24px;
    font-weight:700;
    margin-bottom:25px;
    color:#1e293b;
}

/* BACK BUTTON */
.back-btn{
    display:inline-block;
    margin-bottom:18px;
    padding:9px 16px;
    background:#1263BE;
    color:#fff;
    border-radius:8px;
    text-decoration:none;
    font-size:14px;
    font-weight:600;
}

/* FORM GROUP */
.form-group{
    margin-bottom:22px;
}

/* LABEL */
.form-label{
    display:block;
    margin-bottom:7px;
    font-size:14px;
    font-weight:600;
    color:#374151;
}

/* INPUT */
.input{
    width:100%;
    height:46px;
    border-radius:10px;
    border:1px solid #d1d9e6;
    padding:0 12px;
    font-size:14px;
}

textarea.input{
    height:110px;
    padding-top:10px;
}

/* FOCUS */
.input:focus{
    outline:none;
    border-color:#4f46e5;
    box-shadow:0 0 0 3px rgba(79,70,229,.15);
}

/* ===== FIXED UPLOAD BOX ===== */
.upload-box{
    width:100%;
    border:2px dashed #cbd5e1;
    border-radius:14px;
    padding:25px 15px;
    text-align:center;
    background:#f9fbff;
    cursor:pointer;
    transition:.3s;
    display:block;
}

.upload-box:hover{
    border-color:#4f46e5;
    background:#eef2ff;
}

.upload-box i{
    font-size:26px;
    color:#4f46e5;
    margin-bottom:8px;
}

.upload-box p{
    font-size:13px;
    color:#555;
}

/* PREVIEW */
.preview-container{
    margin-top:15px;
    text-align:center;
}

.preview-container img{
    width:100px;
    height:100px;
    object-fit:cover;
    border-radius:12px;
    border:2px solid #ddd;
    cursor:pointer;
}

/* BUTTONS */
.btn-wrap{
    display:flex;
    justify-content:flex-end;
    gap:10px;
    margin-top:20px;
}

.reset-btn{
    padding:9px 18px;
    background:#e5e7eb;
    border:none;
    border-radius:8px;
    font-weight:600;
    cursor:pointer;
}

.submit-btn{
    padding:9px 22px;
    background:#4f46e5;
    color:#fff;
    border:none;
    border-radius:8px;
    font-weight:600;
    cursor:pointer;
}

/* MODAL */
.modal{
    display:none;
    position:fixed;
    left:0;
    top:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.8);
    justify-content:center;
    align-items:center;
}

.modal img{
    width:280px;
    height:280px;
    border-radius:50%;
    object-fit:cover;
}

.close{
    position:absolute;
    top:20px;
    right:30px;
    color:#fff;
    font-size:32px;
    cursor:pointer;
}

/* RESPONSIVE */
@media(max-width:600px){
    .form-card{
        padding:20px;
    }

    .btn-wrap{
        flex-direction:column;
    }

    .btn-wrap button{
        width:100%;
    }
}
.input{
    width:100%;
    height:46px;
    border-radius:10px;
    border:1px solid #d1d9e6;
    padding:0 14px;
    font-size:14px;
    font-family:'Poppins', sans-serif;
    font-weight:500;
    color:#1e293b;
    letter-spacing:0.3px;
}

textarea.input{
    height:110px;
    padding-top:12px;
    line-height:1.6;
}
</style>
</head>

<body>

<div class="client-page">
<div class="wrapper">

<a href="{{route('Admin.Client')}}" class="back-btn">← Back</a>

<div class="form-card">

<h2 class="page-title">Update Client</h2>

<form   action="javascript:void(0)" method="post" id="clientUpdate" enctype="multipart/form-data">
    @csrf

<!-- IMAGE -->
<div class="form-group">
<label class="form-label">Client Image</label>

<label class="upload-box">
<i class="fas fa-cloud-upload-alt"></i>
<p>Click to Upload Image</p>
<input type="file" name="client_image"  hidden onchange="previewImage(event)">

</label>
<input type="hidden" name="id" value="{{$Edit->id}}">

<div class="preview-container">
    <img id="preview"
         src="{{ asset($Edit->client_image) }}"
         onclick="openModal(this.src)">
</div>

</div>

<!-- NAME -->
<div class="form-group">
<label class="form-label">Client Name</label>
<input type="text" class="input" name="client_name" value="{{$Edit->client_name}}">
</div>

<!-- DETAILS -->
<textarea class="input" name="details">{{$Edit->details}}</textarea>

<!-- BUTTON -->
<div class="btn-wrap">
<button type="reset" class="reset-btn">Reset</button>
<button type="submit" class="submit-btn">Update</button>
</div>

</form>

</div>
</div>
</div>

<!-- MODAL -->
<div class="modal" id="modal">
<span class="close" onclick="closeModal()">&times;</span>
<img id="modalImg">
</div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

      <script>
        $(document).ready(function() {
            $('#clientUpdate').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission
        
                var url = "{{route('Admin.UpdateClient')}}";
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
                            $('#clientUpdate').trigger("reset");
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
                            window.location.href = "{{ route('Admin.Client') }}";
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


function previewImage(event){
    let reader = new FileReader();
    reader.onload = function(){
        document.getElementById('preview').src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

function openModal(src){
    document.getElementById('modal').style.display = "flex";
    document.getElementById('modalImg').src = src;
}

function closeModal(){
    document.getElementById('modal').style.display = "none";
}

</script>

</body>
</html>