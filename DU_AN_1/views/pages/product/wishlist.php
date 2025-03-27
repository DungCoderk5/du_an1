<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách yêu thích</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
}

.wishlist-container {
    width: 100%;
    margin: 20px auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.wishlist-container h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #444;
}

.wishlist-table {
    width: 100%;
    border-collapse: collapse;
}
.wishlist-container h1{
    font-size: 26px;
    font-weight: bold;
}
.wishlist-container i{
    color: #ff0062;
}
.wishlist-table th,
.wishlist-table td {
    text-align: center;
    padding: 10px;
    border: 1px solid #ddd;
}

.wishlist-table th {
    background-color: #ff0062;
    color: white;
}

.wishlist-table img {
    width: 100px;
    height: 100px;
    border-radius: 8px;
    margin:0 auto;
}

.order-btn {
    background: orange;
    color: #fff;
    padding: 12px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    margin-right: 5px;
}

.order-btn:hover {
    background: orangered;
}

.remove-btn {
    background:  #ff0062;
    color: #fff;
    padding: 12px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}

.remove-btn:hover {
    background:red;
}
#viewWishList{
    padding:9px 13px;
    border-radius: 5px;
    color:white;
    border: 2px solid #ff0062;
    margin-right: 3px;
}
@media (max-width: 600px) {
    .wishlist-table th,
    .wishlist-table td {
        font-size: 14px;
        padding: 8px;
    }

    .wishlist-table img {
        width: 60px;
        height: 60px;
    }

    .order-btn,
    .remove-btn {
        font-size: 12px;
        padding: 6px 8px;
    }
}
    </style>
</head>
<body>
    <div class="wishlist-container">
        <h1>Danh sách yêu thích <i class="fa-solid fa-heart"></i></h1>
        <table class="wishlist-table">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Brand</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="./public/upload/imgs/Products/YB1.jpg" alt="Sản phẩm 2"></td>
                    <td>Sản phẩm 2</td>
                    <td>OWEN</td>
                    <td>Sp 17</td>
                    <td>300.000 VNĐ</td>
                    <td>
                        <button class="order-btn">Thêm vào giỏ hàng</button>
                        <button id="viewWishList"><i class="fa-solid fa-eye"></i></button>
                        <button class="remove-btn">Xóa</button>
                        
                    </td>
                </tr>
                <tr>
                <td><img src="./public/upload/imgs/Products/YB2.jpg" alt="Sản phẩm 2"></td>
                    <td>Sản phẩm 3</td>
                    <td>OWEN</td>
                    <td>Sp 17</td>
                    <td>700.000 VNĐ</td>
                    <td>
                        <button class="order-btn">Thêm vào giỏ hàng</button>
                        <button id="viewWishList"><i class="fa-solid fa-eye"></i></button>
                        <button class="remove-btn">Xóa</button>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
