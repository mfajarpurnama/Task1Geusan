<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e8f5e9;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 30px;
            font-size: 28px;
            font-weight: 600;
        }

        .container {
            width: 70%;
            max-width: 400px;
            margin: 40px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transform: translateY(0);
            animation: slideIn 0.6s ease-out;
        }

        @keyframes slideIn {
            0% { transform: translateY(30px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #333;
            margin-bottom: 8px;
            display: block;
            font-weight: 500;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 12px 18px;
            font-size: 14px;
            border: 2px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, textarea:focus {
            border-color: #66bb6a;
            box-shadow: 0 0 5px rgba(102, 187, 106, 0.7);
        }

        textarea {
            height: 130px;
            resize: vertical;
        }

        button {
            background-color: #343a40;
            color: white;
            border: none;
            padding: 12px 18px;
            font-size: 16px;
            border-radius: 50px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 5px 15px rgba(102, 187, 106, 0.3);
        }

        button:hover {
            background-color: #343a40;
            transform: translateY(-3px);
        }

        button:active {
            transform: translateY(2px);
        }

        .back-btn {
            display: inline-block;
            text-align: center;
            font-size: 14px;
            color: #66bb6a;
            margin-top: 15px;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .back-btn:hover {
            color: #388e3c;
        }

        .icon {
            margin-right: 8px;
        }

        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 8px;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 12px;
            font-weight: 400;
        }
    </style>
</head>
<body>
    <h1>Create New Product</h1>

    <div class="container">
        <!-- Form untuk membuat produk baru -->
        <form action="/products/create" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" name="name" id="name" placeholder="Enter product name" required>
            </div>
            <div class="form-group">
                <label for="description">Product Description:</label>
                <textarea name="description" id="description" placeholder="Enter product description" required></textarea>
            </div>
            <button type="submit">Create Product</button>
        </form>

        <a href="/index" class="back-btn"><i class="fas fa-arrow-left icon"></i> Back to Products List</a>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>&copy; 2025 Product Management System</p>
    </div>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
