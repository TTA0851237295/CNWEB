<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
          crossorigin="anonymous">
    <title>Cập nhật thông tin vấn đề</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            margin-bottom: 30px;
            font-size: 2rem;
            color: #343a40;
        }
        form {
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: 600;
            color: #495057;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Cập nhật thông tin vấn đề</h1>

    <form action="{{ route('issues.update', $issues->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="computer_id" class="form-label">Máy tính</label>
            <select class="form-select" id="computer_id" name="computer_id" required>
                @foreach($computers as $computer)
                    <option value="{{ $computer->id }}" {{ $computer->id == $issues->computer_id ? 'selected' : '' }}>
                        {{ $computer->computer_name }} ({{ $computer->model }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="reported_by" class="form-label">Người báo cáo</label>
            <input type="text" class="form-control" id="reported_by" name="reported_by" value="{{ $issues->reported_by }}" required>
        </div>

        <div class="mb-3">
            <label for="reported_date" class="form-label">Thời gian báo cáo</label>
            <input type="datetime-local" class="form-control" id="reported_date" name="reported_date" value="{{ $issues->reported_date }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả vấn đề</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ $issues->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="urgency" class="form-label">Mức độ</label>
            <select class="form-select" id="urgency" name="urgency" required>
                <option value="Low" {{ $issues->urgency == 'Low' ? 'selected' : '' }}>Thấp</option>
                <option value="Medium" {{ $issues->urgency == 'Medium' ? 'selected' : '' }}>Trung bình</option>
                <option value="High" {{ $issues->urgency == 'High' ? 'selected' : '' }}>Cao</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái</label>
            <select class="form-select" id="status" name="status" required>
                <option value="Open" {{ $issues->status == 'Open' ? 'selected' : '' }}>Mở</option>
                <option value="In Progress" {{ $issues->status == 'In Progress' ? 'selected' : '' }}>Đang xử lý</option>
                <option value="Resolved" {{ $issues->status == 'Resolved' ? 'selected' : '' }}>Đã giải quyết</option>
            </select>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Cập nhật</button>
        </div>
    </form>
</div>

</body>
</html>
