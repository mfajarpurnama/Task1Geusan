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
            height: 100vh;
        }
        .navbar-custom {
            background-color: #343a40;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #fff;
        }
        .navbar-custom .nav-link:hover {
            color:rgb(255, 0, 200);
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
            z-index: 999;
            transition: left 0.3s ease;
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
        /* Content Wrapper */
        .content-wrapper {
            margin-left: 0;
            padding-top: 70px;
            flex: 1;
            overflow-y: auto;
            padding-bottom: 60px;
            transition: margin-left 0.3s ease;
        }
        .table-responsive {
            margin-left: 0;
            opacity: 0;
        }
        .table-responsive.show {
            opacity: 1;
            animation: fadeIn 1s ease-out;
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
        .footer {
            background-color: #343a40;
            color: #fff;
            font-size: 0.8rem;
            text-align: center;
            padding: 10px 0;
            width: 100%;
            position: absolute;
            bottom: 0;
        }
        #searchInput {
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 25px;

            width: 250px;
            margin-right: 10px;
            outline: none;
        }
        #searchInput:focus {
            border-color: #2196F3;
            box-shadow: 0 0 5px rgba(33, 150, 243, 0.7);
        }
        .search-btn {
            padding: 10px 15px;
            background-color: #343a40;

            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            display: inline-block;
            vertical-align: middle;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
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
                  <div>
                    <input type="text" id="searchInput" placeholder="Search products...">
                    <button onclick="searchTask()">Search</button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="example" class="display" style="width:100%">
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
                                        <a class="btn btn-secondary btn-sm btn-custom btn-icon" href="/product_variants/create">
                                            <i class="bi bi-plus-circle"></i> Create Variant
                                        </a>

                                        <a href="/products/edit/{{ $product->id }}" class="btn btn-warning btn-sm btn-custom btn-icon">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        
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
                                                <a href="/product_variants/edit/{{ $variant->id }}" class="btn btn-secondary btn-sm btn-custom btn-icon">
                                                    <i class="bi bi-pencil"></i> Edit Variant
                                                </a>
                                                 
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
                                <td colspan="4">No products found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Product Management. All Rights Reserved.</p>
    </footer>

    <button class="btn-add-product" onclick="window.location.href='/products/create'">
        <i class="bi bi-plus"></i>
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const table = document.querySelector('.table-responsive');
            table.classList.add('fade-in', 'show');
        });

        // Toggle sidebar
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const contentWrapper = document.querySelector('.content-wrapper');

            if (sidebar.style.left === '0px') {
                sidebar.style.left = '-250px';
                contentWrapper.style.marginLeft = '0';  // Reset margin when sidebar closes
            } else {
                sidebar.style.left = '0';
                contentWrapper.style.marginLeft = '250px';  // Shift content when sidebar opens
            }
        });
    </script>
</body>
</html>
