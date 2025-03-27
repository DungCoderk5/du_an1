<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Danh Mục</title>
    <link rel="stylesheet" href="../../DU_AN_1/admin/views/assets/css/adddanhmuc.css">
</head>

<body>
    <div class="main-content">
        <div class="form-container">
            <h2>Cập nhật Danh Mục</h2>
            <form action="index.php?page=category&action=update" method="POST" enctype="multipart/form-data">
                <!-- Tên Danh Mục -->
                <div class="form-group">
                    <label for="categoryName">Tên Danh Mục</label>
                    <input type="text" id="categoryName" name="categoryName"
                        value="<?= $danhmuc['name_cate'] ?? null ?>" placeholder="Nhập tên danh mục" required>
                </div>

                <!-- Hình ảnh -->
                <div class="form-group">
                    <label for="categoryImage">Hình Ảnh</label>
                    <input type="file" id="categoryImage" name="categoryImage" accept="image/*">
                    <?php if (!empty($danhmuc['img_cate'])): ?>
                    <img src="../public/upload/imgs/Products/<?= $danhmuc['img_cate'] ?>" width="100"
                        alt="Ảnh danh mục">
                    <?php endif; ?>
                </div>

                <!-- Hidden ID -->
                <input type="hidden" name="category_id" value="<?= $danhmuc['category_id'] ?>">

                <!-- Nút Cập Nhật -->
                <button type="submit" class="btn" name="capnhatdanhmuc">Cập Nhật</button>
                <!-- Nút Danh Sách -->
                <a href="index.php?page=category" class="btn">Danh Sách</a>
            </form>
        </div>
    </div>
</body>

</html>