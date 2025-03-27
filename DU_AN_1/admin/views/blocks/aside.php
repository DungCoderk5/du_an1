<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
      <link rel="stylesheet" href="./views/assets/css/block.css">
   
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h1>Quản lý</h1>
                <a href="index.php?page=home"><img style="filter: brightness(500%);" src="../public/upload/imgs/Banner_Logo/2handstore/auraglam.png"
                            alt="Logo" width="150px 150px"></a>
            </div>
            <ul class="sidebar-menu">
                <li style="padding:0;"><a href="index.php?page=home"><i class="fa-solid fa-house"></i> Trang chủ</a></li>
                <li style="padding:0;"><a href="index.php?page=customer"><i class="fa-solid fa-user"></i> Người dùng</a></li>
                <li style="padding:0;"><a href="index.php?page=category"><i class="fa-solid fa-list"></i> Danh mục</a></li>
                <li style="padding:0;"><a href="index.php?page=product"><i class="fa-brands fa-product-hunt"></i> Sản phẩm</a></li>
                <li style="padding:0;"><a href="index.php?page=orders"><i class="fa-solid fa-truck-fast"></i> Đơn hàng</a></li>
                <li style="padding:0;"><a href="index.php?page=voucher"><i class="fa-solid fa-ticket"></i> Voucher</a></li>
                <li style="padding:0;"><a href="index.php?page=blog"><i class="fa-solid fa-blog"></i> Bài viết</a></li>
                <li style="padding:0;"><a href="index.php?page=comment"><i class="fa-solid fa-comment"></i> Đánh giá</a></li>
                <li style="padding:0;"><a href="index.php?page=goback"><i class="fa-solid fa-rotate-left"></i> Quay về trang web</a></li>
            </ul>
        </div>
     <style>
        .sidebar-menu {
    list-style: none; /* Loại bỏ dấu chấm đầu dòng */
    padding: 0;
    margin: 0;
    /* background-color: #2c3e50; Màu nền sidebar */
    width: 250px; /* Độ rộng sidebar */
    border-radius: 8px; /* Bo góc */
}

.sidebar-menu li {
    border-bottom: 1px solid #34495e; /* Đường kẻ ngăn giữa các mục */
}

.sidebar-menu li:last-child {
    border-bottom: none; /* Bỏ đường kẻ cuối cùng */
}

.sidebar-menu a {
    display: flex; /* Căn chỉnh icon và text theo hàng ngang */
    align-items: center;
    padding: 15px 20px;
    text-decoration: none; /* Xóa gạch chân */
    color: #ecf0f1; /* Màu chữ */
    font-size: 16px;
    font-weight: 500;
    transition: all 0.3s ease-in-out; /* Hiệu ứng chuyển đổi */
}

.sidebar-menu a i {
    margin-right: 10px; /* Khoảng cách giữa icon và text */
    /* font-size: 18px; */
}

.sidebar-menu a:hover {
    background-color: #34495e; /* Màu nền khi hover */
    color: #1abc9c; /* Màu chữ khi hover */
    transform: scale(1.05); /* Tăng nhẹ kích thước */
}

.sidebar-menu a:hover i {
    color: #1abc9c; /* Màu icon khi hover */
}

.sidebar-menu li:first-child a {
    border-radius: 8px 8px 0 0; /* Bo góc phần đầu */
}

.sidebar-menu li:last-child a {
    border-radius: 0 0 8px 8px; /* Bo góc phần cuối */
}

     </style>