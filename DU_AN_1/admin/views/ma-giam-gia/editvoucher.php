<link rel="stylesheet" href="./views/assets/css/voucher.css">

<div class="main-content">
    <h1>Cập Nhật Voucher</h1>
    <form action="index.php?page=voucher&action=editvoucher" method="POST">
        <div class="form-group">
            <label for="code">Mã Voucher</label>
            <input type="text" id="code" name="code" value="<?= $voucher['code'] ?? null ?>" required />
        </div>
        <div class="form-group">
            <label for="discount">Giảm Giá (%)</label>
            <input type="number" id="discount" name="discount" min="0" value="<?= $voucher['discount'] ?? null ?>"
                required />
        </div>
        <div class="form-group">
            <label for="expiration_date">Hạn Sử Dụng</label>
            <input type="date" id="expiration_date" name="expiration_date"
                value="<?= $voucher['expiration_date'] ?? null ?>" required />
        </div>
        <div class="actions">
           <input type="hidden" name="voucher_id" value="<?= $voucher['voucher_id'] ?? null ?>">
            <button type="submit" class="btn" name="capnhatsale">Cập Nhật Voucher</button>
            <a href="index.php?page=voucher" class="btn">Quay Lại</a>
     

        </div>
    </form>

</div>
</div>
</body>

</html>