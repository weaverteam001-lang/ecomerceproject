<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Address</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
            min-height: 100vh;
            padding: 20px 0;
        }

        .form-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            padding: 30px;
            max-width: 900px;
            margin: 20px auto;
        }

        h4 {
            font-weight: 600;
            color: #1e2937;
            margin-bottom: 25px;
            text-align: center;
        }

        .form-label {
            font-weight: 500;
            color: #374151;
            margin-bottom: 6px;
            font-size: 0.95rem;
        }

        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
        }

        .theme-btn {
            background: linear-gradient(90deg, #6366f1, #8b5cf6);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 1.05rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
        }

        .theme-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
        }
    </style>
</head>
<body>

<div class="form-container">
    <h4>✏️ Edit Address</h4>

    <form action="{{route('User.AddressUpdate')}}" method="POST">
        @csrf

   
 <input type="hidden" name="id" value="{{ $Edit->id }}">


        <div class="row g-3">

            <!-- Row 1: 3 Columns -->
            <div class="col-md-4">
                <label class="form-label">First Name</label>
                <input type="text" name="f_name" value="{{ $Edit->f_name }}" class="form-control" placeholder="First name">
            </div>

            <div class="col-md-4">
                <label class="form-label">Last Name</label>
                <input type="text" name="l_name" value="{{ $Edit->l_name }}" class="form-control" placeholder="Last name">
            </div>

            <div class="col-md-4">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" value="{{ $Edit->phone }}" class="form-control" placeholder="+91 9876543210">
            </div>

            <!-- Row 2: 3 Columns -->
            <div class="col-md-4">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ $Edit->email }}" class="form-control" placeholder="your@email.com">
            </div>

            <div class="col-md-4">
                <label class="form-label">City</label>
                <input type="text" name="city" value="{{ $Edit->city }}" class="form-control" placeholder="Jaipur">
            </div>

            <div class="col-md-4">
                <label class="form-label">State</label>
                <input type="text" name="state" value="{{ $Edit->state }}" class="form-control" placeholder="Rajasthan">
            </div>

            <!-- Row 3: 3 Columns -->
            <div class="col-md-4">
                <label class="form-label">Post Code</label>
                <input type="text" name="post_code" value="{{ $Edit->post_code }}" class="form-control" placeholder="302001">
            </div>

            <div class="col-md-8">
                <label class="form-label">Address Line 1</label>
                <input type="text" name="first_Address" value="{{ $Edit->first_Address }}" class="form-control" placeholder="House no., Street, Area">
            </div>

            <!-- Row 4: Full Width -->
            <div class="col-12">
                <label class="form-label">Address Line 2 (Optional)</label>
                <input type="text" name="second_Address" value="{{ $Edit->second_Address }}" class="form-control" placeholder="Apartment, Landmark, etc.">
            </div>

            <!-- Submit Button -->
            <div class="col-12 mt-4">
                <button type="submit" class="theme-btn w-100">
                    Update Address
                </button>
            </div>

        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>