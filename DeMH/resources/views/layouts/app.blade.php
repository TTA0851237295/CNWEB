
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Quản lý vấn đề</title>

<!-- Fonts -->
<link rel="stylesheet" href="{{ asset('fonts/roboto-varela.css') }}">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

<!-- Material Icons -->
<link rel="stylesheet" href="{{ asset('css/material-icons.css') }}">

<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

<!-- Bootstrap JS -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<style>
/* CSS (tương tự như đã cung cấp trước đây) */
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Varela Round', sans-serif;
    font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    background: #fff;
    padding: 20px 25px;
    border-radius: 3px;
    min-width: 1000px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
}
.table-title {
    padding-bottom: 15px;
    background: #435d7d;
    color: #fff;
    padding: 16px 30px;
    min-width: 100%;
    margin: -20px -25px 10px;
    border-radius: 3px 3px 0 0;
}
.table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
}
.table-title .btn {
    color: #fff;
    float: right;
    font-size: 13px;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    margin-left: 10px;
}
.table-title .btn i {
    float: left;
    font-size: 21px;
    margin-right: 5px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table td a {
    font-weight: bold;
    color: #566787;
    text-decoration: none;
}
table.table td a:hover {
    color: #2196F3;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #F44336;
}
.pagination li.active a {
    background: #03A9F4;
    color: #fff;
}
</style>
</head>
<body>

<div class="container-xl">
    <div class="table-responsive">
        @yield('content')
    </div>        
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Lấy tất cả các nút xóa
    const deleteButtons = document.querySelectorAll('.delete');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định

            const issueId = button.getAttribute('data-id'); // Lấy ID vấn đề
            const modalId = `deleteModal${issueId}`; // Xác định modal tương ứng

            // Hiển thị modal
            const modal = document.getElementById(modalId);
            if (modal) {
                const bootstrapModal = new bootstrap.Modal(modal);
                bootstrapModal.show();
            }
        });
    });
});

$('.modal').on('hidden.bs.modal', function () {
    $('.modal-backdrop').remove();
    $('body').removeClass('modal-open');
});
</script>

</body>
</html>
