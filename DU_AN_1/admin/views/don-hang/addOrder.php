<link rel="stylesheet" href="../../DU_AN_1/admin/views/assets/css/addsanpham.css">

    <h2>Sửa Đơn Hàng</h2>
    <div class="main-content">
    <form action="index.php?action=addOrder" method="POST">
        <label for="user_id">ID Người Dùng:</label>
        <input type="number" id="user_id" name="user_id" required>

        <label for="voucher_id">ID Voucher:</label>
        <input type="number" id="voucher_id" name="voucher_id">

        <label for="total_amount">Tổng Tiền:</label>
        <input type="number" id="total_amount" name="total_amount" required>

        <h3>Chi Tiết Sản Phẩm:</h3>
        <div id="productDetails">
            <div class="product">
                <label for="product_id">ID Sản Phẩm:</label>
                <input type="number" name="products[0][product_id]" required>
                <label for="quantity">Số Lượng:</label>
                <input type="number" name="products[0][quantity]" required>
                <label for="price">Giá:</label>
                <input type="number" name="products[0][price]" required>
            </div>
        </div>

        <button type="button" >Thêm Sản Phẩm</button>
        <button type="submit" name="themdonhang">Tạo Đơn Hàng</button>
    </form>

    </div>
</body>
</html>
<style>
    /* Thiết lập các thuộc tính cơ bản cho trang */


/* Bố cục chính của form */
form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 600px;
}

/* Tiêu đề của form */
h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

/* Các label trong form */
label {
    font-size: 14px;
    color: #555;
    margin-bottom: 6px;
    display: inline-block;
}

/* Các input trong form */
input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
}

/* Tạo hiệu ứng border khi focus vào input */
input[type="number"]:focus {
    border-color: #4CAF50;
    outline: none;
}

/* Cách hiển thị các sản phẩm */
#productDetails {
    margin-bottom: 20px;
}

/* Mỗi sản phẩm sẽ có định dạng riêng */
.product {
    border: 1px solid #ddd;
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 6px;
    background-color: #f9f9f9;
}

/* Nút bấm thêm sản phẩm */
button[type="button"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
    display: inline-block;
    margin-bottom: 20px;
}

/* Hiệu ứng hover cho nút thêm sản phẩm */
button[type="button"]:hover {
    background-color: #45a049;
}

/* Nút tạo đơn hàng */
button[type="submit"] {
    background-color: #007BFF;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
    width: 100%;
}

/* Hiệu ứng hover cho nút tạo đơn hàng */
button[type="submit"]:hover {
    background-color: #0056b3;
}

/* Đảm bảo các nút được căn chỉnh đẹp */
button {
    width: 100%;
}

/* Đảm bảo form có khoảng cách giữa các phần tử */
form > * {
    margin-bottom: 15px;
}

/* Thiết kế các input fields khi thêm sản phẩm */
.product input {
    margin-bottom: 8px;
}

</style>
