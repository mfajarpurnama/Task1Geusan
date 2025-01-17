<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product Variant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fc;
            margin-bottom: 60px; /* Memberikan ruang untuk footer */
            animation: fadeInBody 1s ease-out; /* Animasi untuk body */
        }

        @keyframes fadeInBody {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .container {
            margin-top: 50px;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px; /* Ukuran card disesuaikan */
            animation: slideInCard 0.6s ease-out; /* Animasi untuk card */
        }

        @keyframes slideInCard {
            0% { transform: translateY(30px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .form-label {
            font-size: 14px;
            color: #555;
        }
        .form-control {
            font-size: 14px;
            padding: 10px 15px;
            border-radius: 6px;
            border: 1px solid #ddd;
            transition: border-color 0.3s;
        }
        .form-control:focus {
            
            box-shadow: 0 0 5px rgba(102, 187, 106, 0.5);
        }
        .btn-primary {
            background-color: #343a40;
            
            background-color: #343a40;
            
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #388e3c;
        }
        .btn-primary:active {
            background-color: #2c6e2f;
        }
        .back-btn {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #66bb6a;
            text-decoration: none;
            font-weight: 600;
        }
        .back-btn:hover {
            color: #388e3c;
        }

        .footer {
            background-color: #343a40;
             /* Warna footer disesuaikan */
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
            animation: fadeInFooter 1s ease-out; /* Animasi untuk footer */
        }

        @keyframes fadeInFooter {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .footer p {
            margin: 0;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Product Variant</h2>
        <form action="{{ route('product_variants.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="product_id" class="form-label">Product</label>
                <select id="product_id" name="product_id" class="form-control" required>
                    <option value="">-- Select Product --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="variant_name" class="form-label">Variant Name</label>
                <input type="text" id="variant_name" name="variant_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" id="stock" name="stock" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        <a href="/" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Products</a>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 Product Management System</p>
    </div>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
