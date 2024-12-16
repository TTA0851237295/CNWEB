<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
          crossorigin="anonymous">
    <title>Quản lý Vấn Đề</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            text-align: center;
            color: #495057;
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: bold;
            color: #495057;
        }
        button {
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="form-container">
        <h1 class="form-title">Thêm Vấn Đề Mới</h1>

        <form action="{{ route('issues.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="computer_id" class="form-label">Máy tính</label>
                <select class="form-select" id="computer_id" name="computer_id" required>
                    @foreach($computers as $computer)
                        <option value="{{ $computer->id }}">{{ $computer->computer_name }} ({{ $computer->model }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="reported_by" class="form-label">Người báo cáo</label>
                <input type="text" class="form-control" id="reported_by" name="reported_by" required placeholder="Nhập tên người báo cáo">
            </div>

            <div class="mb-4">
                <label for="reported_date" class="form-label">Thời gian báo cáo</label>
                <input type="datetime-local" class="form-control" id="reported_date" name="reported_date" required>
            </div>

            <div class="mb-4">
                <label for="description" class="form-label">Mô tả vấn đề</label>
                <textarea class="form-control" id="description" name="description" rows="3" required placeholder="Nhập mô tả chi tiết về vấn đề"></textarea>
            </div>

            <div class="mb-4">
                <label for="urgency" class="form-label">Mức độ</label>
                <select class="form-select" id="urgency" name="urgency" required>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="status" class="form-label">Trạng thái</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Open">Mở</option>
                    <option value="In Progress">Đang xử lý</option>
                    <option value="Resolved">Đã giải quyết</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Thêm Vấn Đề</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
