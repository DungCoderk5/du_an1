<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật Người Dùng</title>
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
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        button.btn-submit {
            background-color: #28a745;
            color: white;
        }

        button.btn-cancel {
            background-color: #dc3545;
            color: white;
        }

        button:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <div class="main-content">
        <div class="form-container">
            <h2>Cập nhật Người Dùng</h2>
            <form action="index.php?page=customer&action=update" method="post" enctype="multipart/form-data">
                <!-- ID Ẩn -->
                <input type="hidden" name="user_id" value="<?= $nguoidung['user_id'] ?>">

                <!-- Tên người dùng -->
                <div class="form-group">
                    <label for="customerName">Tên người dùng:</label>
                    <input type="text" name="customerName" value="<?= $nguoidung['username'] ?>" required>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="customerEmail">Email:</label>
                    <input type="email" name="customerEmail" value="<?= $nguoidung['email'] ?>" required>
                </div>

                <!-- Mật khẩu -->
                <div class="form-group">
                    <label for="customerPassword">Mật khẩu:</label>
                    <input type="password" name="customerPassword" value="<?= $nguoidung['password'] ?> " required>
                </div>

                <!-- Địa chỉ -->
                <div class="form-group">
                    <label for="customerAddress">Địa chỉ:</label>
                    <input type="text" name="customerAddress" value="<?= $nguoidung['address'] ?>">
                </div>

                <!-- Số điện thoại -->
                <div class="form-group">
                    <label for="customerPhone">Số điện thoại:</label>
                    <input type="text" name="customerPhone" value="<?= $nguoidung['phone'] ?>">
                </div>

                <!-- Vai trò -->
                <div class="form-group">
                    <label for="customerRole">Vai trò:</label>
                    <select name="customerRole">
                        <option value="1" <?= $nguoidung['role'] == 1 ? 'selected' : '' ?>>Admin</option>
                        <option value="0" <?= $nguoidung['role'] == 0 ? 'selected' : '' ?>>User</option>
                    </select>
                </div>
                <!-- Avatar -->
                <div class="form-group">
                    <label for="customerAvatar">Avatar</label>
                    <input type="file" id="customerAvatar" name="customerAvatar" accept="image/*">
                    <img src="<?= "../public/upload/" .$nguoidung['avatar'] ?>" width=100 alt="">
                </div>
                <!-- Trạng thái -->
                <div class="form-group">
                    <label for="account_status">Trạng thái:</label>
                    <select name="account_status">
                        <option value="1" <?= $nguoidung['account_status'] == 1 ? 'selected' : '' ?>>Hoạt động</option>
                        <option value="0" <?= $nguoidung['account_status'] == 0 ? 'selected' : '' ?>>Không hoạt động
                        </option>
                    </select>
                </div>

                <!-- Nút hành động -->
                <button type="submit" name="capnhatnguoidung" class="btn-submit">Cập nhật</button>
                <button type="button" class="btn-cancel"
                    onclick="window.location.href='index.php?page=customer'">Hủy</button>
            </form>
        </div>
    </div>
</body>

</html>