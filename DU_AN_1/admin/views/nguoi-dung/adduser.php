<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Người Dùng</title>
    <!-- <link rel="stylesheet" href="../../DU_AN_1/admin/views/assets/css/add_user.css"> -->
</head>

<body>
    <!-- Nội dung chính -->
    <div class="main-content">
        <?php if (!empty($errors)): ?>
            <div class="error-messages">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="form-container">
            <h2>Thêm Mới Khách Hàng</h2>
            <form action="index.php?page=customer&action=adduser" method="POST" enctype="multipart/form-data">
                <!-- Tên Khách Hàng -->
                <div class="form-group">
                    <label for="customerName">Tên Khách Hàng</label>
                    <input type="text" id="customerName" name="customerName" placeholder="Nhập tên khách hàng" required>
                </div>
                <!-- Email -->
                <div class="form-group">
                    <label for="customerEmail">Email</label>
                    <input type="email" id="customerEmail" name="customerEmail" placeholder="Nhập email" required>
                </div>
                <!-- Số Điện Thoại -->
                <div class="form-group">
                    <label for="customerPhone">Số Điện Thoại</label>
                    <input type="text" id="customerPhone" name="customerPhone" placeholder="Nhập số điện thoại"
                        required>
                </div>
                <!-- Địa chỉ -->
                <div class="form-group">
                    <label for="customerAddress">Địa Chỉ</label>
                    <textarea id="customerAddress" name="customerAddress" placeholder="Nhập địa chỉ"
                        required></textarea>
                </div>
                <!-- Mật khẩu -->
                <div class="form-group">
                    <label for="customerPassword">Mật Khẩu</label>
                    <input type="password" id="customerPassword" name="customerPassword" placeholder="Nhập mật khẩu"
                        required>
                </div>
                <div class="form-group">
                    <label for="customerAvatar">Avatar</label>
                    <input type="file" id="customerAvatar" name="customerAvatar" accept="image/*">
                </div>
                <!-- Vai trò -->
                <div class="form-group">
                    <label for="customerRole">Vai Trò</label>
                    <select id="customerRole" name="customerRole" required>
                        <option value="0">Người Dùng</option>
                        <option value="1">Quản Trị Viên</option>
                    </select>
                </div>
                <!-- Nút Submit -->
                <button type="submit" class="btn" name="themnguoidung">Thêm Mới</button>
                <button type="reset" class="btn btn-danger"><a href="index.php?page=customer">Hủy</a></button>
            </form>
        </div>
    </div>
</body>

</html>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }

    .main-content {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f4f4f9;
    }

    .form-container {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 400px;
    }

    .form-container h2 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
        text-align: center;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
    }

    textarea {
        resize: none;
    }

    button {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button.btn {
        background-color: #28a745;
        color: white;
        margin-top: 10px;
    }

    button.btn-danger {
        background-color: #dc3545;
        color: white;
    }
</style>