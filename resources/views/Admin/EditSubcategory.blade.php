<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            background: #EDF0F7;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .add-card {
            background: #fff;
            padding: 35px 30px;
            border-radius: 18px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.25);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
            position: relative;
        }

        .add-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 5px;
            width: 100%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-top-left-radius: 18px;
            border-top-right-radius: 18px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .title {
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: 600;
            color: #333;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input {
            padding: 13px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: 0.3s;
        }

        input:focus {
            border-color: #667eea;
            box-shadow: 0 0 8px rgba(102,126,234,0.5);
            outline: none;
        }

        .submit-btn {
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #ffc107, #e0a800);
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.25);
        }

        .back-btn {
            margin-top: 12px;
            padding: 11px;
            border-radius: 10px;
            border: 2px solid #667eea;
            background: transparent;
            color: #667eea;
            font-weight: 500;
            cursor: pointer;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: #667eea;
            color: #fff;
            transform: translateY(-2px);
        }

        .buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

    </style>
</head>

<body>

    <div class="add-card">
        <div class="title">Update Category</div>

        <form action="javascript:void(0)" id="Update" method="post">
            @csrf

            <div class="form-group">
                 <input type="hidden"  name="id" value="{{$Edit->id}}">
                <input type="text"  name="subcategory"  value="{{$Edit->subcategory}}">

                <div class="buttons">
                    <button type="submit" class="submit-btn">Update Category</button>

                    <!-- Back Button -->
                    <button type="button" class="back-btn" onclick="history.back()">⬅ Back</button>
                </div>
            </div>
        </form>
    </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

      <script>
        $(document).ready(function() {
            $('#Update').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission
        
                var url = "{{route('Admin.UpdateSubcategory')}}";
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
                            $('#Update').trigger("reset");
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
</body>
</html>