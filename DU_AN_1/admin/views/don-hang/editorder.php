<link rel="stylesheet" href="../../DU_AN_1/admin/views/assets/css/addsanpham.css">
<?php if (!empty($errors)): ?>
    <div class="errors">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<div class="main-content">
    <div class="form-container">
        <h2>Cập nhật đơn hàng</h2>
        <form action="index.php?page=orders&action=update" method="POST" enctype="multipart/form-data">
            <!-- Product Name -->

            <div class="form-group">
                <label for="ordertStatus">Trạng thái</label>
                <select name="ordertStatus">
                    <option value="0" <?= $donhang['order_status'] == 0 ? 'selected' : '' ?>>Chờ xử lý</option>
                    <option value="1" <?= $donhang['order_status'] == 1 ? 'selected' : '' ?>>Đang giao hàng</option>
                    <option value="2" <?= $donhang['order_status'] == 2 ? 'selected' : '' ?>>Đã hủy</option>
                    <option value="3" <?= $donhang['order_status'] == 3 ? 'selected' : '' ?>>Đã ẩn</option>
                    <option value="4" <?= $donhang['order_status'] == 4 ? 'selected' : '' ?>>Hoàn thành</option>
                </select>
            </div>




            <!-- Submit Button -->
            <input type="hidden" name="order_id" value="<?= $donhang['order_id'] ?>">
            <button type="submit" class="btn" name="capnhatdonhang">Cập nhật đơn hàng</button>
            <button type="reset" class="btn btn-danger"
                onclick="location.href='index.php?page=<?= $_GET['page'] ?>'">Hủy</button>
        </form>
    </div>
</div>
</div>
</body>

</html>
<script>
document.querySelector('form').addEventListener('submit', function (event) {
    const currentStatus = <?= json_encode($donhang['order_status']) ?>; // Dùng json_encode để đưa giá trị PHP vào JavaScript
    const newStatus = document.querySelector('select[name="ordertStatus"]').value;

    // Kiểm tra nếu trạng thái hiện tại là 4 (Hoàn Thành) và muốn chuyển về trạng thái khác ngoài 3
    if (currentStatus == 4 && newStatus != 3 && newStatus != 4) {
        event.preventDefault();
        alert("Đơn hàng đã hoàn thành. Không thể thay đổi trạng thái.");
    } else if (newStatus < currentStatus && !(currentStatus == 4 && newStatus == 3)) {
        // Kiểm tra không cho phép quay lại trạng thái trước đó, trừ khi từ 4 về 3
        event.preventDefault();
        alert("Không thể quay lại trạng thái trước đó.");
    }
});

</script>