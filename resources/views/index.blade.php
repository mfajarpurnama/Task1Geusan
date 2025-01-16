<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            margin-left: 0;
            padding-left: 0;
            display: flex;
            flex-direction: column;
            height: 100vh; /* Set body height to fill the viewport */
        }
        .navbar-custom {
            background-color: #343a40;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #fff;
        }
        .navbar-custom .nav-link:hover {
            color: #ffd700;
        }
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: -250px; /* Initially hidden offscreen */
            width: 250px;
            height: 100%;
            background-color: #343a40;
            padding-top: 60px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            display: block;
            z-index: 999; /* Make sure it's above content */
            transition: left 0.3s ease; /* Animasi ketika sidebar muncul */
        }
        .sidebar a {
            color: #fff;
            padding: 15px;
            text-decoration: none;
            display: block;
            font-weight: bold;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        /* Content Wrapper to prevent overlap with sidebar */
        .content-wrapper {
            margin-left: 0;
            padding-top: 70px; /* Adjust for navbar */
            flex: 1; /* Allow content to grow and fill remaining space */
            overflow-y: auto; /* Enable scrolling */
            padding-bottom: 60px; /* Space for footer */
        }
        .table-responsive {
            margin-left: 0;
        }
        .btn-add-product {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #000;
            color: #fff;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            font-size: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
        .btn-add-product:hover {
            background-color: #444;
        }
        /* Button to show sidebar */
        .btn-sidebar-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: #343a40;
            color: white;
            border-radius: 50%;
            padding: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        .btn-custom {
            margin-right: 5px;
            padding: 10px 15px;
        }
        .btn-icon i {
            margin-right: 5px;
        }
        /* Footer Style */
        .footer {
            background-color: #343a40;
            color: #fff;
            font-size: 0.8rem;
            text-align: center;
            padding: 10px 0;
            width: 100%;
            position: absolute; /* Keep footer at the bottom */
            bottom: 0;
        }
    </style>
</head>
<body>

    <!-- Button to toggle Sidebar -->
    <button class="btn-sidebar-toggle" id="sidebarToggle">
        <i class="bi bi-list"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <a href="#">Dashboard</a>
        <a href="#">Products</a>
        <a href="#">Categories</a>
        <a href="#">Orders</a>
        <a href="#">Customers</a>
        <a href="#">Reports</a>
        <a href="#">Settings</a>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Product Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Product Management</h1>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover"id="example" class="display" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Variants</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    <ul>
                                        @foreach ($product->variants as $variant)
                                            <li>{{ $variant->variant_name }} - RP.{{ $variant->price }} (Stock: {{ $variant->stock }})</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="actions-column">
                                    <div>
                                        <!-- Create Variant Button -->
                                        <a class="btn btn-secondary btn-sm btn-custom btn-icon" href="/product_variants/create">
                                            <i class="bi bi-plus-circle"></i> Create Variant
                                        </a>

                                        <!-- Edit Product Button -->
                                        <a href="/products/edit/{{ $product->id }}" class="btn btn-warning btn-sm btn-custom btn-icon">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        
                                        <!-- Delete Product Button -->
                                        <form action="/products/delete/{{ $product->id }}" method="get" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-custom btn-icon">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            @if($product->variants->count() > 0)
                                @foreach ($product->variants as $variant)
                                    <tr class="variant-row">
                                        <td colspan="2">
                                            <strong>{{ $variant->variant_name }}</strong><br>
                                            Price: RP.{{ $variant->price }}<br>
                                            Stock: {{ $variant->stock }}
                                        </td>
                                        <td colspan="2" class="variant-actions">
                                            <div class="d-flex justify-content-end">
                                                <!-- Edit Variant Button -->
                                                <a href="/product_variants/edit/{{ $variant->id }}" class="btn btn-secondary btn-sm btn-custom btn-icon">
                                                    <i class="bi bi-pencil"></i> Edit Variant
                                                </a>
                                                 
                                                <!-- Delete Variant Button -->
                                                <form action="/products_variants/delete/{{ $variant->id }}" method="get" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm btn-custom btn-icon">
                                                        <i class="bi bi-trash"></i> Delete Variant
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    <div class="alert alert-warning">
                                        No products available. <a href="/products/create" class="alert-link">Add a product</a> to get started!
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Fixed Add New Product Button -->
    <a href="/products/create" class="btn-add-product">
        <i class="bi bi-plus-circle"></i>
    </a>

    <!-- Footer -->
    <footer class="footer">
        <p class="mb-0" style="font-size: 0.8rem;">&copy; 2025 Product Management. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            var contentWrapper = document.querySelector('.content-wrapper');
            if (sidebar.style.left === '0px') {
                sidebar.style.left = '-250px';
                contentWrapper.style.marginLeft = '0';
            } else {
                sidebar.style.left = '0';
                contentWrapper.style.marginLeft = '250px';
            }
        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('form[action*="delete"]');
        
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Mencegah form langsung submit
                const confirmation = confirm('Apakah Anda yakin ingin menghapus data ini?');
                if (confirmation) {
                    form.submit(); // Submit form jika dikonfirmasi
                }
            });
        });
    });
</script>

   
</body>
</html>
