<link rel="stylesheet" href="./views/assets/css/voucher.css">

<div class="main-content">
        <h1>Thêm Voucher</h1>
        <form action="index.php?page=voucher&action=addvoucher" method="POST">
            <div class="form-group">
                <label for="code">Mã Voucher</label>
                <input type="text" id="code" name="code" required />
            </div>
            <div class="form-group">
                <label for="discount">Giảm Giá (%)</label>
                <input type="number" id="discount" name="discount" required />
            </div>
            <div class="form-group">
                <label for="expiration_date">Hạn Sử Dụng</label>
                <input type="date" id="expiration_date" name="expiration_date" required />
            </div>
            <div class="actions">
                <button type="submit" class="btn" name="themvoucher">Thêm Voucher</button>
                <a href="manage_vouchers.php" class="btn">Quay Lại</a>
            </div>
        </form>
    </div>
    </div>
</body>
</html>