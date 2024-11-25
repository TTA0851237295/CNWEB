<?php include 'data.php'; // Tệp chứa mảng $flowers ?>


<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách hoa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
        }

        h1 {
            text-align: center;
            font-size: 28px;
            color: #444;
            margin-bottom: 20px;
        }

        .flower {
            margin-bottom: 40px;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .flower-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .flower-description {
            color: #555;
            margin-bottom: 15px;
        }

        .flower-image img {
            width: 100%;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>14 loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè</h1>

        <?php if (empty($flowers)): ?>
        <p>Hiện chưa có loài hoa nào trong danh sách.</p>
        <?php else: ?>
        <?php foreach ($flowers as $index => $flower): ?>
        <div class="flower">
            <div class="flower-title"><?= $index + 1 ?>. <?= htmlspecialchars($flower['name']) ?></div>
            <div class="flower-description"><?= nl2br(htmlspecialchars($flower['description'])) ?></div>
            <div class="flower-image">
                <img src="<?= htmlspecialchars($flower['image']) ?>" alt="<?= htmlspecialchars($flower['name']) ?>">
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>

</html>
