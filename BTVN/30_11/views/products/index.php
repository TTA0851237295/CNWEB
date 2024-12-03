<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-light py-5">

<div class="container">
    <h1 class="text-center mb-4">Product List</h1>

    <!-- Nút thêm mới -->
    <div class="text-end mb-3">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="fas fa-plus"></i> Thêm mới
        </button>
    </div>

    <!-- Danh sách sản phẩm -->
    <?php
    if (isset($products) && !empty($products)) {
        echo '<table class="table table-hover table-bordered bg-white shadow-sm">';
        echo '<thead class="table-primary text-center">';
        echo '<tr>';
        echo '<th scope="col">Sản phẩm</th>';
        echo '<th scope="col">Giá Thành</th>';
        echo '<th scope="col">Chức năng</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($products as $product) {
            echo '<tr>';
            echo '<td class="text-center">' . htmlspecialchars($product['name']) . '</td>';
            echo '<td class="text-center">' . htmlspecialchars(number_format($product['price'])) . ' VND</td>';
            echo '<td class="text-center">';
            echo '<a href="?action=update&id=' . $product['id'] . '" class="text-warning me-3"><i class="fas fa-edit"></i></a>';
            echo '<a href="?action=delete&id=' . $product['id'] . '" class="text-danger" onclick="return confirm(\'Are you sure you want to delete this product?\')"><i class="fas fa-trash"></i></a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p class="text-center text-muted">No products found.</p>';
    }
    ?>
</div>

<!-- Modal Thêm -->
<div id="addModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addProductForm" method="POST" action="?action=create" class="mb-5 p-4 bg-white rounded shadow-sm">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm sản phẩm</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên sản phẩm:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Giá thành:</label>
                        <input type="number" step="1000" id="price" name="price" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success w-100">Thêm sản phẩm</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Link Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
