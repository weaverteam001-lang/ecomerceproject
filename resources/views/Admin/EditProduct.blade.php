<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f0f4ff, #e0e7ff);
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        .form-card {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(24px);
            border-radius: 28px;
            padding: 36px 40px;
            box-shadow: 0 25px 70px rgba(99, 102, 241, 0.12),
                        0 8px 25px rgba(0, 0, 0, 0.06);
            border: 1px solid rgba(255,255,255,0.7);
            transition: all 0.4s ease;
            max-height: 92vh;
            overflow-y: auto;
        }
        .form-card:hover {
            box-shadow: 0 30px 80px rgba(99, 102, 241, 0.18);
        }

        .page-header {
            background: white;
            padding: 18px 28px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            margin-bottom: 28px;
        }

        .input {
            width: 100%;
            padding: 14px 18px;
            border-radius: 16px;
            border: 2px solid #e2e8f0;
            background: #f8fafc;
            transition: all 0.3s ease;
            font-size: 15px;
        }
        .input:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 5px rgba(99, 102, 241, 0.18);
            background: #ffffff;
        }

        .label {
            font-size: 14.5px;
            font-weight: 700;
            color: #374151;
            margin-bottom: 8px;
            display: block;
        }

        .preview-container {
            position: relative;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.1);
        }
        .preview-img {
            width: 100%;
            height: 290px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        .preview-container:hover .preview-img {
            transform: scale(1.05);
        }

        .btn-main {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            padding: 14px 40px;
            color: #fff;
            border-radius: 16px;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 12px 30px rgba(99, 102, 241, 0.35);
        }
        .btn-main:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 40px rgba(99, 102, 241, 0.45);
        }

        .color-row {
            background: #f8fafc;
            padding: 14px 18px;
            border-radius: 16px;
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }
        .color-row:hover {
            background: #f0f4ff;
            border-color: #c7d2fe;
        }

        /* Improved Size Selector */
        .size-box {
            border: 2px solid #e2e8f0;
            padding: 11px 20px;
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 15.5px;
            min-width: 54px;
            text-align: center;
            background: #f9fafb;
            position: relative;
        }
        .size-box:hover {
            border-color: #a5b4fc;
            background: #f0f4ff;
        }
        .size-box input {
            display: none;
        }
        .size-box input:checked + span {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(99, 102, 241, 0.45);
            padding: 9px 22px;
        }

        .add-btn {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: white;
            padding: 11px 22px;
            border-radius: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .add-btn:hover {
            transform: translateY(-2px);
        }

        .section-title {
            font-size: 17px;
            font-weight: 700;
            color: #1e2937;
            margin-bottom: 10px;
        }
    </style>
</head>

<body class="min-h-screen py-10 px-4">

@php
$Edit->color_name = json_decode($Edit->color_name, true) ?? [];
$Edit->color_code = json_decode($Edit->color_code, true) ?? [];
$Edit->size = is_string($Edit->size) ? explode(',', trim($Edit->size)) : (array)$Edit->size;
$Edit->size = array_map('trim', $Edit->size);
@endphp

<div class="max-w-6xl mx-auto">

    <!-- Header -->
    <div class="page-header flex justify-between items-center">
        <a href="{{route('Admin.Product')}}" 
           class="flex items-center gap-2 text-indigo-600 hover:text-indigo-700 font-semibold transition-colors">
            <i class="fa fa-arrow-left"></i>
            <span>Back to Products</span>
        </a>
        <h1 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-violet-600 bg-clip-text text-transparent">
            Update Product
        </h1>
    </div>

    <div class="form-card">

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid lg:grid-cols-12 gap-10">

                <!-- LEFT: IMAGE -->
                <div class="lg:col-span-5 space-y-4">
                    <div class="section-title">Product Image</div>
                    <div class="preview-container">
                        <img id="preview" 
                             src="{{ asset($Edit->image) }}" 
                             class="preview-img">
                    </div>
                    <input type="file" name="image" id="imageUpload" class="input mt-3">
                </div>

                <!-- RIGHT: FORM -->
                <div class="lg:col-span-7 space-y-7">

                    <div>
                        <label class="label">Product Name</label>
                        <input type="text" name="product_name" value="{{$Edit->product_name}}" class="input">
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="label">Price (₹)</label>
                            <input type="number" name="price" value="{{$Edit->price}}" class="input">
                        </div>
                        <div>
                            <label class="label">Stock Quantity</label>
                            <input type="number" name="stock" value="{{$Edit->stock}}" class="input">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="label">Brand Name</label>
                            <input type="text" name="brand" value="{{$Edit->brand}}" class="input">
                        </div>
                        <div>
                            <label class="label">SKU</label>
                            <input type="text" name="sku" value="{{$Edit->sku}}" class="input">
                        </div>
                    </div>

                    <!-- Colors -->
                    <div>
                        <div class="section-title">Available Colors</div>
                        <div id="color-wrapper" class="space-y-3">
                            @if(!empty($Edit->color_name))
                                @foreach($Edit->color_name as $key => $name)
                                <div class="flex gap-3 items-center color-row">
                                    <input type="text" name="color_name[]" value="{{$name}}" class="input flex-1">
                                    <input type="color" name="color_code[]" 
                                           value="{{$Edit->color_code[$key] ?? '#000000'}}" 
                                           onchange="updatePreview(this)" 
                                           class="w-12 h-12 p-1 rounded-2xl cursor-pointer border border-gray-200">
                                    <div style="width:44px;height:44px;border-radius:12px;background:{{$Edit->color_code[$key] ?? '#000000'}};box-shadow:0 4px 15px rgba(0,0,0,0.2);" 
                                         class="color-preview"></div>
                                    <button type="button" onclick="removeColor(this)" 
                                            class="text-red-500 hover:text-red-600 text-2xl transition-colors px-2">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <button type="button" onclick="addColor()" 
                                class="add-btn mt-4 flex items-center gap-2 text-sm">
                            <i class="fa fa-plus"></i> Add Color
                        </button>
                    </div>

                    <!-- Sizes -->
                    <div>
                        <div class="section-title">Available Sizes</div>
                        <p class="text-xs text-gray-500 mb-3">Selected sizes will show with indigo background</p>
                        
                        <div class="flex gap-3 flex-wrap" id="size-container">
                            @php 
                            $available_sizes = ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']; 
                            @endphp
                            @foreach($available_sizes as $s)
                            <label class="size-box">
                                <input type="checkbox" 
                                       name="size[]" 
                                       value="{{$s}}"
                                       {{ in_array($s, $Edit->size) ? 'checked' : '' }}>
                                <span>{{$s}}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <label class="label">Tags (comma separated)</label>
                        <input type="text" name="tags" value="{{$Edit->tags}}" 
                               class="input" placeholder="summer, cotton, casual">
                    </div>

                </div>
            </div>

            <!-- Description -->
            <div class="mt-9">
                <label class="label">Full Description</label>
                <textarea name="description" rows="4" class="input">{{$Edit->description}}</textarea>
            </div>

            <!-- Submit -->
            <div class="flex justify-end mt-10">
                <button type="submit" class="btn-main flex items-center gap-3">
                    <i class="fa fa-save"></i>
                    Update Product
                </button>
            </div>

        </form>
    </div>
</div>

<script>
// Image Preview
document.getElementById('imageUpload').addEventListener('change', function(e) {
    if (e.target.files[0]) {
        const reader = new FileReader();
        reader.onload = function(ev) {
            document.getElementById('preview').src = ev.target.result;
        };
        reader.readAsDataURL(e.target.files[0]);
    }
});

// Add Color
function addColor() {
    const html = `
        <div class="flex gap-3 items-center color-row">
            <input type="text" name="color_name[]" class="input flex-1" placeholder="Color Name">
            <input type="color" name="color_code[]" value="#3b82f6" 
                   onchange="updatePreview(this)" 
                   class="w-12 h-12 p-1 rounded-2xl cursor-pointer border border-gray-200">
            <div style="width:44px;height:44px;border-radius:12px;background:#3b82f6;box-shadow:0 4px 15px rgba(0,0,0,0.2);" 
                 class="color-preview"></div>
            <button type="button" onclick="removeColor(this)" 
                    class="text-red-500 hover:text-red-600 text-2xl transition-colors px-2">
                <i class="fa fa-times"></i>
            </button>
        </div>
    `;
    document.getElementById('color-wrapper').insertAdjacentHTML('beforeend', html);
}

// Remove Color
function removeColor(btn) {
    btn.parentElement.remove();
}

// Update Color Preview
function updatePreview(input) {
    const preview = input.nextElementSibling;
    if (preview) preview.style.background = input.value;
}
</script>

</body>
</html>