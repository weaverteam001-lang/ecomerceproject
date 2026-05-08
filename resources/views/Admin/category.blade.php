@extends('Admin.AdminLayout.main')

@section('main-content')

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<style>
    /* ---- MAIN CONTENT AREA ---- */
    .page-wrapper {
        /* margin-left: 260px; */
        padding: 25px;
        background: #EDF0F7;
        min-height: 100vh;
        box-sizing: border-box;
    }

    @media (max-width: 992px) {
        .page-wrapper {
            margin-left: 0;
            padding: 15px;
        }
    }

    h1 {
        margin-bottom: 20px;
        font-weight: 600;
        color: #333;
        font-size: 20px;
    }

    /* ---------- ADD CATEGORY ---------- */
    .add-card {
        background: #fff;
        padding: 20px;
        border-radius: 16px;
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        margin-bottom: 30px;
        max-width: 100%;
    }

    .add-card h2 {
        margin-bottom: 15px;
        font-size: 18px;
    }

    .form-group {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        align-items: center;
    }

    .form-group input {
      
        padding: 10px 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 13px;
        box-sizing: border-box;
    }

    .submit-btn {
        padding: 7px 22px;
        background: linear-gradient(135deg, #28a745, #20c997);
        color: #fff;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        white-space: nowrap;
    }

    /* ---------- TABLE ---------- */
    .table-card {
        background: #ffffff;
        padding: 20px;
        border-radius: 14px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        overflow-x: auto;
    }

    .table-card h2 {
        font-size: 17px;
        margin-bottom: 15px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 12.5px;
        min-width: 750px;
    }

    thead {
        background: #f1f4fb;
    }

    thead th {
        padding: 11px 10px;
        text-align: left;
        font-weight: 600;
        color: #333;
        white-space: nowrap;
    }

    tbody td {
        padding: 10px;
        color: #555;
        border-bottom: 1px solid #eee;
        white-space: nowrap;
        vertical-align: middle;
    }

    tbody tr:hover {
        background: #f9fbff;
    }

    /* ────────────────────────────────────────────── */
    /*     Status buttons — same as product blade      */
    /* ────────────────────────────────────────────── */
    .btn-status {
        padding: 5px 10px;
        font-size: 11px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        display: inline-block;
    }

    .btn-active {
        background: #e6f9ee;
        color: #28a745;
    }

    .btn-inactive {
        background: #fdeaea;
        color: #dc3545;
    }
    /* ────────────────────────────────────────────── */

    /* ACTION BUTTONS (Delete) */
    .action-btn {
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 11px;
        font-weight: 600;
        color: #fff;
        text-decoration: none;
        display: inline-block;
        margin-right: 6px;
    }

    .btn-delete {
        background: linear-gradient(135deg, #dc3545, #c82333);
        box-shadow: 0 4px 12px rgba(220,53,69,0.35);
    }

    /* Mobile adjustments */
    @media (max-width: 576px) {
        .form-group {
            flex-direction: column;
            align-items: stretch;
        }

        .form-group input {
            min-width: 100%;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
        }

        .table-card {
            padding: 12px;
        }

        table {
            font-size: 12px;
        }

        thead th,
        tbody td {
            padding: 8px 6px;
        }

        .action-btn {
            display: block;
            margin: 6px 0;
            text-align: center;
            min-width: 70px;
        }
    }

    /* ===== IMAGE PREVIEW ===== */
    .thumb-img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
        cursor: pointer;
        border: 1px solid #ddd;
    }

    /* ===== IMAGE MODAL ===== */
    .img-modal {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.6);
        z-index: 9999;
        align-items: center;
        justify-content: center;
    }

    .img-modal-box {
        position: relative;
        background: #fff;
        padding: 10px;
        border-radius: 12px;
    }

    .img-modal-box img {
        width: 400px;
        height: 300px;
        object-fit: contain;
    }

    .img-close {
        position: absolute;
        top: -10px;
        right: -10px;
        background: #dc3545;
        color: #fff;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        text-align: center;
        line-height: 28px;
        cursor: pointer;
        font-weight: bold;
    }
    .action-btn {
    padding: 6px 14px;
    border-radius: 5px; /* 👈 as you want */
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

/* Update Button */
.btn-update {
    background: linear-gradient(135deg, #ffc107, #e0a800);
    box-shadow: 0 4px 10px rgba(255,193,7,0.3);
}
.btn-update:hover {
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

/* delete popp css end  */


</style>

<div class="page-wrapper">

    <h1>Manage Categories</h1>

    <!-- ADD CATEGORY FORM -->
    <div class="add-card">
        <h2>Add New Category</h2>
        <form action="javascript:void(0)" method="post" id="category" >
            @csrf
            
            <div class="form-group">
                <input type="text" placeholder="Enter category name" name="category">
                <button type="submit" class="submit-btn">+ Add Category</button>
            </div>
        </form>
    </div>

    <!-- TABLE -->
    <div class="table-card">
        <h2>Category List</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
     
            @foreach($category as $data)
            <tbody>
             
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->category}}</td>
                      <td>
                            @if($data->status == 1)
                                <a href="{{ route('Admin.changeCategoryState', ['id' => Crypt::encrypt($data->id)]) }}"
                                   class="btn-status btn-active">Active</a>
                            @else
                                <a href="{{ route('Admin.changeCategoryState', ['id' => Crypt::encrypt($data->id)]) }}"
                                   class="btn-status btn-inactive">InActive</a>
                            @endif
                        </td>
                     

                      

                  <td>{{$data->created_at}}</td>
                  <td>{{$data->updated_at}}</td>
                    <td>
                        <a href="{{ route('Admin.Editcategory', $data->id) }}" class="action-btn btn-edit">Edit</a>

                        <a href="#"
                        class="action-btn btn-delete"
                        onclick="confirmDelete('{{ route('Admin.Deletecategory', $data->id) }}'); return false;">
                        Delete
                        </a>
                        
                    </td>
                </tr>
            @endforeach
            </tbody> 
        </table>
    </div>

</div>

<!-- IMAGE MODAL -->
<div class="img-modal" id="imgModal">
    <div class="img-modal-box">
        <span class="img-close" onclick="closeImg()">×</span>
        <img id="modalImg">
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function openImg(src){
    document.getElementById('modalImg').src = src;
    document.getElementById('imgModal').style.display = 'flex';
}

function closeImg(){
    document.getElementById('imgModal').style.display = 'none';
}
</script>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

      <script>
        $(document).ready(function() {
            $('#category').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission
        
                var url = "{{route('Admin.Getcategory')}}";
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
                            $('#category').trigger("reset");
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
function confirmDelete(url) {
    Swal.fire({
        title: 'Delete Item?',
        text: 'This action cannot be undone.',
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