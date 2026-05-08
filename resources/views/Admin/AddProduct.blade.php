<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Premium Product Form</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<style>
body {
  background: linear-gradient(135deg,#f8fafc,#eef2ff);
  font-family: 'Segoe UI', sans-serif;
}

/* Card */
.form-card {
  background:#fff;
  border-radius:20px;
  padding:24px;
  box-shadow:0 15px 40px rgba(0,0,0,0.05);
}

/* Inputs */
.input {
  border:1px solid #ddd;
  border-radius:10px;
  padding:10px 14px;
  width:100%;
  font-size:14px;
  transition:.3s;
}
.input:focus {
  border-color:#8b5cf6;
  box-shadow:0 0 0 3px rgba(139,92,246,0.2);
  outline:none;
}

/* Upload Box (NEW) */
.upload-box {
  border:2px dashed #d1d5db;
  border-radius:14px;
  padding:18px;
  text-align:center;
  cursor:pointer;
  transition:0.3s;
  background:#fafafa;
}
.upload-box:hover {
  border-color:#8b5cf6;
  background:#f5f3ff;
}
.upload-box i {
  font-size:22px;
  color:#8b5cf6;
  margin-bottom:6px;
}

/* Color */
.color-box input { display:none; }
.color-box label {
  width:36px;
  height:36px;
  border-radius:10px;
  display:inline-block;
  cursor:pointer;
  position:relative;
  border:2px solid #fff;
  transition:.3s;
}
.color-box input:checked + label {
  transform:scale(1.15);
  box-shadow:0 0 0 3px rgba(139,92,246,0.4);
}
.color-box input:checked + label::after {
  content:"✓";
  position:absolute;
  top:50%;left:50%;
  transform:translate(-50%,-50%);
  color:#fff;
  font-weight:bold;
}
.color-white input:checked + label::after {
  color:#000;
}

/* Size */
.size-box input { display:none; }
.size-box label {
  padding:6px 12px;
  border-radius:10px;
  border:1px solid #ccc;
  cursor:pointer;
  font-size:13px;
  transition:.3s;
}
.size-box input:checked + label {
  background:linear-gradient(135deg,#8b5cf6,#d946ef);
  color:#fff;
  border:none;
  box-shadow:0 5px 15px rgba(139,92,246,0.3);
}
<style>
.input {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
    outline: none;
    background: #fff;
    transition: 0.3s;
}

.input:focus {
    border-color: #007bff;
}
</style>
</style>
</head>

<body class="p-6">

<div class="max-w-4xl mx-auto">
<a href="{{ route('Admin.Product') }}" 
   style="
     display:inline-block;
     padding:8px 16px;
     background:#1263BE;
     color:#fff;
     font-size:14px;
     border-radius:10px;
     text-decoration:none;
     font-weight:500;
     box-shadow:0 5px 15px rgba(99,102,241,0.3);
     transition:0.3s;
   "
   onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 20px rgba(99,102,241,0.4)'"
   onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 5px 15px rgba(99,102,241,0.3)'"
>
  ← Back
</a>
<h1 class="text-2xl font-bold text-center mb-6">Add Product</h1>

<form  action="javascript:void(0)" method="post" id="AddProduct" enctype="multipart/form-data" class="form-card">

@csrf

<!-- 🔥 STYLISH FILE UPLOAD -->
<div class="mb-5">
  <label class="text-sm font-medium">Product Images</label>

  <label class="upload-box mt-2 block">
    <i class="fas fa-cloud-upload-alt"></i>
    <p class="text-sm text-gray-600">Main Product image</p>
    <input type="file" name="image" accept="image/jpeg,image/png,image/webp" class="hidden">
    
  </label>
    <label class="upload-box mt-2 block">
    <i class="fas fa-cloud-upload-alt"></i>
    <p class="text-sm text-gray-600">Second Product Image</p>
    <input type="file" name="second_image" accept="image/jpeg,image/png,image/webp" class="hidden">
    
  </label>

    <label class="upload-box mt-2 block">
    <i class="fas fa-cloud-upload-alt"></i>
    <p class="text-sm text-gray-600">Third Product Image</p>
    <input type="file" name="third_image" accept="image/jpeg,image/png,image/webp" class="hidden">
    
  </label>
</div>

<div class="grid md:grid-cols-2 gap-4">

<!-- LEFT -->
<div class="space-y-4">

<input type="text" name="product_name" placeholder="Product Name" class="input">

<div class="grid grid-cols-2 gap-3">
<input type="number" name="price" placeholder=" Main Price" class="input">
<input type="number" name="discount" placeholder="Discount" class="input">
<input type="number" name="old_price" placeholder="Old_Price" class="input">
</div>

<!-- COLORS -->
<div>

</div>

  <!-- Color Section -->
    <div class="mb-6">
        <label class="block text-sm font-medium mb-2">Add Colors</label>

        <div id="color-wrapper">

            <!-- Default Row -->
            <div class="flex items-center gap-3 mb-3 color-row">

                <!-- Color Name -->
                <input type="text" name="color_name[]" 
                       placeholder="Color Name (e.g. Black)"
                       class="border p-2 rounded-lg w-1/2">

                <!-- Color Picker -->
                <input type="color" name="color_code[]" 
                       value="#FFFFFF"
                       onchange="updatePreview(this)"
                       class="w-12 h-10 border rounded-lg cursor-pointer">

                <!-- Preview -->
                <div class="w-10 h-10 rounded-full border preview"
                     style="background:#000000;"></div>

                <!-- Remove Button -->
                <button type="button" onclick="removeColor(this)" 
                        class="text-red-500 text-sm">Remove</button>
            </div>

        </div>

        <!-- Add Button -->
        <button type="button" onclick="addColor()" 
                class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg">
            + Add Color
        </button>
    </div>
<!-- SIZE -->
<div>
<label class="text-sm">Size</label>

<div class="flex gap-2 mt-2 flex-wrap">

<div class="size-box">
<input type="checkbox" name="size[]" value="S" id="s1">
<label for="s1">S</label>
</div>

<div class="size-box">
<input type="checkbox" name="size[]" value="M" id="s2">
<label for="s2">M</label>
</div>

<div class="size-box">
<input type="checkbox" name="size[]" value="L" id="s3">
<label for="s3">L</label>
</div>

<div class="size-box">
<input type="checkbox" name="size[]" value="XL" id="s4">
<label for="s4">XL</label>
</div>

<div class="size-box">
<input type="checkbox" name="size[]" value="XXL" id="s5">
<label for="s5">XXL</label>
</div>

</div>
</div>

<select name="category_id" class="input">
    <option value="">Select Category</option>

    @foreach($category as $cat)
        <option value="{{ $cat->id }}">
            {{ $cat->category }}
        </option>
    @endforeach

</select>

</div>

<!-- RIGHT -->
<div class="space-y-4">

<input type="number" name="stock" placeholder="Stock" class="input">
<input type="text" name="brand" placeholder="Brand" class="input">
<input type="text" name="sku" placeholder="SKU" class="input">
<input type="text" name="tags" placeholder="Tags" class="input">
<select name="About_product" class="input">
    <option value="">Select Option</option>
    <option value="Trending">Trending</option>
    <option value="Hot">Hot</option>
    <option value="Out Of Stock">Out Of Stock</option>
    <option value="New">New</option>
</select>



</div>

</div>

<!-- Description -->
<div class="mt-4">
<textarea name="description" rows="3" placeholder="Description" class="input"></textarea>
</div>
<!-- Full  Description -->
<div class="mt-4">
<textarea name="full_description" rows="3" placeholder="full_description" class="input"></textarea>
</div>





<!-- Buttons -->
<div class="mt-6 flex justify-end gap-3">
<button type="reset" class="px-5 py-2 border rounded-lg">Reset</button>
<button type="submit" style="background:#3269A6;" class="px-6 py-2 text-white rounded-lg"> Add Product</button>
</div>

</form>



    <!-- Color Section -->
   

    <!-- Submit -->



</div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

      <script>
        $(document).ready(function() {
            $('#AddProduct').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission
        
                var url = "{{route('Admin.GetProduct')}}";
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
                            $('#AddProduct').trigger("reset");
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
<script>
let maxColors = 5;

function addColor() {
    let wrapper = document.getElementById('color-wrapper');
    let count = document.getElementsByClassName('color-row').length;

    if(count >= maxColors){
        alert("Maximum 5 colors allowed");
        return;
    }

    let html = `
    <div class="flex items-center gap-3 mb-3 color-row">

        <input type="text" name="color_name[]" 
               placeholder="Color Name"
               class="border p-2 rounded-lg w-1/2">

        <input type="color" name="color_code[]" 
               value="#000000"
               onchange="updatePreview(this)"
               class="w-12 h-10 border rounded-lg cursor-pointer">

        <div class="w-10 h-10 rounded-full border preview"
             style="background:#000000;"></div>

        <button type="button" onclick="removeColor(this)" 
                class="text-red-500 text-sm">Remove</button>
    </div>
    `;

    wrapper.insertAdjacentHTML('beforeend', html);
}

function removeColor(btn) {
    let rows = document.getElementsByClassName('color-row');

    // Prevent removing last row
    if(rows.length <= 1){
        alert("At least 1 color required");
        return;
    }

    btn.parentElement.remove();
}

function updatePreview(input) {
    input.nextElementSibling.style.background = input.value;
}
</script>

</body>
</html>