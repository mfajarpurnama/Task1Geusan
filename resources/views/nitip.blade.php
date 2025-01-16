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
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        .content-wrapper {
            flex: 1;
            padding-top: 70px;
            overflow-y: auto;
        }
        .footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Product Management</a>
        </div>
    </nav>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <div class="container mt-4">
            <h1 class="h3 mb-4">Product Management</h1>
            <div class="table-responsive">
                <table id="productTable" class="table table-striped table-bordered">
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
                                <td>
                                    <!-- Buttons for Product -->
                                    <div class="mb-2">
                                        <a href="/product_variants/create" class="btn btn-secondary btn-sm">
                                            <i class="bi bi-plus-circle"></i> Add Variant
                                        </a>
                                        <a href="/products/edit/{{ $product->id }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="/products/delete/{{ $product->id }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Buttons for Variants -->
                                    @if($product->variants->count() > 0)
                                        @foreach ($product->variants as $variant)
                                            <div class="d-flex justify-content-start mb-2">
                                                <a href="/product_variants/edit/{{ $variant->id }}" class="btn btn-secondary btn-sm me-2">
                                                    <i class="bi bi-pencil"></i> Edit Variant
                                                </a>
                                                <form action="/products_variants/delete/{{ $variant->id }}" method="post" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash"></i> Delete Variant
                                                    </button>
                                                </form>
                                            </div>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No products available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        &copy; 2025 Product Management. All rights reserved.
    </footer>

    <!-- DataTables Initialization -->
    <script>
        $(document).ready(function () {
            $('#productTable').DataTable({
                pageLength: 5,
                lengthMenu: [5, 10, 15],
                order: [[0, 'asc']], // Order by the first column (Product Name)
                columnDefs: [
                    { orderable: false, targets: 3 } // Disable sorting on the Actions column
                ]
            });
        });
    </script>
</body>
</html>
