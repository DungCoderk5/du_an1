<div class="main-content">
    <?php if (!empty($order_details)): ?>

        <h2>Chi tiết đơn hàng</h2>
        <table class="order-info">
            <tbody>
                <tr>
                    <th>Mã đơn hàng:</th>
                    <td><?= htmlspecialchars($order_details[0]['order_id']) ?></td>
                </tr>
                <tr>
                    <th>Tên khách hàng:</th>
                    <td><?= htmlspecialchars($order_details[0]['username']) ?></td>
                </tr>
                <tr>
                    <th>Số điện thoại:</th>
                    <td><?= "+84" . htmlspecialchars($order_details[0]['phone']) ?></td>
                </tr>
                <tr>
                    <th>Địa chỉ giao hàng:</th>
                    <td><?= htmlspecialchars($order_details[0]['address']) ?></td>
                </tr>
                <tr>
                    <th>Phương thức thanh toán:</th>
                    <td><?= htmlspecialchars($order_details[0]['method']) ?></td>
                </tr>
                <tr>
                    <th>Trạng thái đơn hàng:</th>
                    <td>
                        <?php
                        $status_text = '';
                        if ($order_details[0]['order_status'] == 0) {
                            $status_text = 'Chờ Xử Lý';
                        } elseif ($order_details[0]['order_status'] == 1) {
                            $status_text = 'Đã xử lý';
                        } elseif ($order_details[0]['order_status'] == 2) {
                            $status_text = 'Đang giao hàng';
                        } elseif ($order_details[0]['order_status'] == 3) {
                            $status_text = 'Hoàn thành';
                        } elseif ($order_details[0]['order_status'] == 4) {
                            $status_text = 'Đã ẩn';
                        } elseif ($order_details[0]['order_status'] == 5) {
                            $status_text = 'Đã hủy';
                        } else {
                            $status_text = 'Trạng thái không xác định';
                        }
                        echo htmlspecialchars($status_text);
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Ngày đặt hàng</th>
                    <td>
                        <?= htmlspecialchars(date('d/m/Y', strtotime($order_details[0]['order_date']))) ?>
                    </td>
                </tr>

                <tr>
                    <th>Voucher giảm giá</th>
                    <td>
                        <?php
                        if (!empty($order_details[0]['discount'])) {
                            echo htmlspecialchars($order_details[0]['discount']) . "%";
                        } else {
                            echo "Không áp dụng";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Tổng tiền trước giảm giá:</th>
                    <?php
                    $total_price = 0;
                    foreach ($order_details as $item) {
                        $total_price += $item['total_item_price'];
                    }
                    ?>
                    <td><?= number_format($total_price, 0, ',', '.') ?> VND</td>
                </tr>
                <tr>
                    <th>Tổng tiền sau giảm giá:</th>
                    <?php
                    $total_price = 0;
                    foreach ($order_details as $item) {
                        $total_price += $item['total_item_price'];
                    }
                    $voucher_discount = $order_details[0]['discount'] ?? 0; // Lấy giá trị giảm giá hoặc mặc định là 0
                    $final_price = $total_price * (1 - $voucher_discount / 100); // Tính tổng sau khi giảm giá
                    ?>
                    <td><?= number_format($final_price, 0, ',', '.') ?> VND</td>
                </tr>
            </tbody>
        </table>

        <h3>Sản phẩm trong đơn hàng</h3>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order_details as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name_pro']) ?></td>
                        <td><?= htmlspecialchars($item['quantity']) ?></td>
                        <td><?= number_format($item['price'], 0, ',', '.') ?> VND</td>
                        <td><?= number_format($item['total_item_price'], 0, ',', '.') ?> VND</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="reset" class="btn btn-danger" onclick="location.href='index.php?page=<?= $_GET['page'] ?>'">Quay
            lại</button>
    <?php else: ?>
        <p>Không có thông tin đơn hàng để hiển thị.</p>
    <?php endif; ?>
</div>
<style>
    .order-info {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        background-color: #fff;
        border: 1px solid #ddd;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .order-info th {
        background-color: #3498db;
        color: #fff;
        text-align: left;
        padding: 10px;
        font-weight: bold;
        text-transform: uppercase;
        border: 1px solid #ddd;
        width: 30%;
    }

    .order-info td {
        padding: 10px;
        border: 1px solid #ddd;
        background-color: #f9f9f9;
        font-size: 15px;
    }

    .order-info tr:nth-child(even) td {
        background-color: #f2f2f2;
    }

    .order-info td:first-child {
        font-weight: bold;
        color: #34495e;
    }

    .order-info tr:hover td {
        background-color: #e9f5ff;
        transition: background-color 0.3s ease-in-out;
    }


    h2 {
        color: #2c3e50;
        font-size: 24px;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    p {
        font-size: 16px;
        margin: 5px 0;
    }

    p strong {
        color: #34495e;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    table thead {
        background-color: #3498db;
        color: #fff;
        text-transform: uppercase;
    }

    table th,
    table td {
        padding: 12px 15px;
        text-align: left;
        border: 1px solid #ddd;
    }

    table th {
        font-weight: bold;
    }

    table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tbody tr:hover {
        background-color: #e9f5ff;
        transition: background-color 0.3s ease-in-out;
    }

    table td {
        font-size: 15px;
    }

    .total-price {
        font-size: 18px;
        font-weight: bold;
        color: #e74c3c;
        text-align: right;
        margin-top: 10px;
    }
</style>