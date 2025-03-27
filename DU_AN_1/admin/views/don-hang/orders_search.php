<style>
    /* General Styling */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fa;
    }

    /* Search Form */
    .search {
        display: flex;
        justify-content: center;
        /* Center the form horizontally */
        padding: 10px;
    }

    .search form {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        max-width: 1200px;
        /* Limit the form width */
        background-color: #fff;
        /* White background for the form */
        padding: 10px;
        border-radius: 8px;
        /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */
    }

    .search input[type="text"] {
        padding: 15px 20px;
        border: 2px solid #b17457;
        border-radius: 4px;
        font-size: 18px;
        /* Increased font size */
        width: 100%;
        /* Make the input take up 70% of the form width */
        margin-right: 10px;
        transition: all 0.3s ease-in-out;
        /* Smooth transition */
    }

    .search input[type="text"]:focus {
        border-color: #0056b3;
        /* Dark blue on focus */
        box-shadow: 0 0 10px rgba(0, 86, 179, 0.5);
        /* Glowing effect on focus */
        outline: none;
    }

    .search input[type="submit"] {
        padding: 15px 20px;
        border: 2px solid #007bff;
        background-color: #007bff;
        color: white;
        border-radius: 4px;
        font-size: 18px;
        /* Increased font size */
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s ease-in-out;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */
    }

    .search input[type="submit"]:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
        /* Slight lift effect on hover */
    }

    .search input[type="submit"]:active {
        transform: translateY(2px);
        /* Slight push effect when clicked */
    }

    /* Pagination */
    #pagination {
        margin-top: 20px;
        text-align: center;
    }

    #pagination ul {
        display: inline-flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    #pagination ul li {
        margin: 0 5px;
    }

    #pagination ul li a {
        padding: 10px 15px;
        text-decoration: none;
        border: 1px solid #ccc;
        color: #007bff;
        font-weight: bold;
        border-radius: 4px;
        transition: background-color 0.3s, color 0.3s;
    }

    #pagination ul li a:hover {
        background-color: #007bff;
        color: white;
    }

    #pagination ul li a.active {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    #pagination ul li a:focus {
        outline: none;
    }

    /* Responsive Layout */
    @media (max-width: 768px) {
        .search_content {
            flex-direction: column;
            align-items: flex-start;
        }

        .search input[type="text"],
        .search input[type="submit"] {
            width: 100%;
            margin: 10px 0;
        }
    }
</style>



<div class="main-content">
    <header>
        <h1>Quản lý đơn hàng <?php echo $keyword ?></h1>
    </header>
    <div class="content">
        <div class="search_content">
            <div class="search">
                <form action="index.php" method="get" id="search">
                    <input name="page" type="hidden" value="orders" /> <!-- Keep the page parameter -->
                    <input name="action" type="hidden" value="search" /> <!-- Keep action as search -->
                    <input name="keyword" type="text"
                        value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>"
                        placeholder="Tìm đơn hàng ..." />
                    <input type="submit" value="Tìm"> <!-- Submit button without name="submit" -->
                </form>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID đơn hàng</th>
                    <th>Tổng Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Hình thức thanh toán</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <?php
                    extract($order);
                    // Xử lý trạng thái đơn hàng trực tiếp
                    if ($order_status == 0) {
                        $status_text = 'Chờ Xử Lý';
                    } elseif ($order_status == 1) {
                        $status_text = 'Đã xử lý';
                    } elseif ($order_status == 2) {
                        $status_text = 'Đang giao hàng';
                    } elseif ($order_status == 3) {
                        $status_text = 'Hoàn Thành';
                    } elseif ($order_status == 4) {
                        $status_text = 'Đã ẩn';
                    } elseif ($order_status == 5) {
                        $status_text = 'Đã hủy';
                    } else {
                        $status_text = 'Trạng thái không xác định';
                    }
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($order_id) ?></td>
                        <td><?= htmlspecialchars($total_products) ?></td>
                        <td><?= number_format($total_price, 0, ',', '.') ?>₫</td>
                        <td>
                            <div class="order-status">
                                <button class="prev-status" data-order-id="<?= $order_id ?>"><i
                                        class="fa-solid fa-angle-left"></i></button>
                                <span class="status-text" data-order-id="<?= $order_id ?>"
                                    data-status="<?= $order_status ?>"><?= htmlspecialchars($status_text) ?></span>
                                <button class="next-status" data-order-id="<?= $order_id ?>"><i
                                        class="fa-solid fa-angle-right"></i></button>
                            </div>
                        </td>
                        <td><?= htmlspecialchars($method) ?></td>

                        <td>
                            <?php if ($order_status != 5): ?>
                                <form action="index.php?page=orders&action=huydonhang" method="POST" style="display:inline;">
                                    <input type="hidden" name="order_id" value="<?= htmlspecialchars($order_id) ?>">
                                    <button type="submit" class="btn" style="background-color:gray;color:black;">Hủy</button>
                                </form>


                            <?php else: ?>
                                <form action="index.php?page=orders&action=hidedonhang" method="POST" style="display:inline;">
                                    <input type="hidden" name="order_id" value="<?= htmlspecialchars($order_id) ?>">
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Bạn có chắc chắn muốn ẩn đơn hàng này?');">Ẩn</button>
                                </form>
                            <?php endif; ?>
                            <button class="btn">
                                <a
                                    href="index.php?page=orders&action=viewOrder&order_id=<?= htmlspecialchars($order_id) ?>">Xem
                                    chi tiết</a>
                            </button>
                        </td>

                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Handle "Next" button click
        $(".next-status").click(function () {
            var orderId = $(this).data("order-id");
            var currentStatus = $(".status-text[data-order-id='" + orderId + "']").data("status");

            // If the current status is 4 (hidden), prevent next status update
            if (currentStatus == 3) {
                alert('Không thể tiến tới trạng thái tiếp theo vì đơn hàng đã ở trạng thái "Hoàn thành".');
                return;
            } else if (currentStatus === 4 || currentStatus === 5) {
                alert('Không thể thay đổi trạng thái vì đơn hàng đã bị ẩn hoặc đã hủy.');
                return;
            }

            var nextStatus = currentStatus + 1 > 3 ? 0 : currentStatus + 1; // Cycle between 0 and 4

            // Update the status on the interface
            var statusText = getStatusText(nextStatus);
            $(".status-text[data-order-id='" + orderId + "']").text(statusText).data("status", nextStatus);

            // Send AJAX request to update the status in the database
            $.ajax({
                url: './views/don-hang/updateorder.php',
                type: 'POST',
                data: { order_id: orderId, order_status: nextStatus },
                success: function (response) {
                    try {
                        var responseData = JSON.parse(response); // Phân tích dữ liệu JSON từ server
                        console.log(responseData); // In phản hồi từ server ra console
                        if (responseData.success) {
                            // alert('Cập nhật trạng thái thành công!');
                        } else {
                            alert('Lỗi khi cập nhật trạng thái.');
                        }
                    } catch (e) {
                        console.log("Lỗi khi phân tích phản hồi JSON: ", e);
                        alert('Có lỗi xảy ra khi phân tích phản hồi từ server.');
                    }
                },
                error: function (xhr, status, error) {
                    console.log("Error: " + error); // In lỗi nếu có
                    alert('Có lỗi xảy ra khi gửi yêu cầu.');
                }
            });
        });

        // Handle "Prev" button click
        $(".prev-status").click(function () {
            var orderId = $(this).data("order-id");
            var currentStatus = $(".status-text[data-order-id='" + orderId + "']").data("status");
            var prevStatus = currentStatus - 1 < 0 ? 3 : currentStatus - 1; // Cycle between 0 and 4

            // Prevent going back to the previous status in some cases
            if ((currentStatus == 1 && prevStatus == 0) ||
                (currentStatus == 2 && prevStatus == 1) ||
                (currentStatus == 3 && prevStatus == 2) ||
                (currentStatus == 0)) {
                return;
            }
            else if (currentStatus === 4 || currentStatus === 5) {
                return;
            }



            // Update the status on the interface
            var statusText = getStatusText(prevStatus);
            $(".status-text[data-order-id='" + orderId + "']").text(statusText).data("status", prevStatus);

            // Send AJAX request to update the status in the database
            $.ajax({
                url: './views/don-hang/updateorder.php',
                type: 'POST',
                data: { order_id: orderId, order_status: prevStatus },
                success: function (response) {
                    try {
                        var responseData = JSON.parse(response); // Phân tích dữ liệu JSON từ server
                        if (responseData.success) {
                            // alert('Cập nhật trạng thái thành công!');
                        } else {
                            alert('Lỗi khi cập nhật trạng thái.');
                        }
                    } catch (e) {
                        console.log("Lỗi khi phân tích phản hồi JSON: ", e);
                        alert('Có lỗi xảy ra khi phân tích phản hồi từ server.');
                    }
                },
                error: function (xhr, status, error) {
                    console.log("Error: " + error); // In lỗi nếu có
                    alert('Có lỗi xảy ra khi gửi yêu cầu.');
                }
            });
        });


        // Helper function to get the status text
        function getStatusText(status) {
            switch (status) {
                case 0: return 'Chờ Xử Lý';
                case 1: return 'Đã xử lý';
                case 2: return 'Đang giao hàng';
                case 3: return 'Hoàn thành';
                case 4: return 'Đã ẩn';
                case 5: return 'Đã hủy';
                default: return 'Chưa xác định';
            }
        }
    });


</script>
<style>
    .order-status {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Định dạng nút */
    button.prev-status,
    button.next-status {
        background: none;
        /* Loại bỏ nền */
        border: none;
        /* Loại bỏ viền */
        color: #4CAF50;
        /* Màu icon */
        font-size: 24px;
        /* Cỡ icon */
        cursor: pointer;
        /* Con trỏ dạng nhấp */
        transition: all 0.3s ease;
        /* Hiệu ứng chuyển đổi */
    }

    /* Hiệu ứng hover */
    button.prev-status:hover,
    button.next-status:hover {
        color: #45a049;
        /* Đổi màu icon */
        transform: scale(1.2);
        /* Phóng to icon */
    }

    /* Hiệu ứng nhấn */
    button.prev-status:active,
    button.next-status:active {
        transform: scale(0.9);
        /* Nhỏ lại khi nhấn */
        color: #388E3C;
        /* Màu đậm hơn */
    }

    /* Định dạng văn bản trạng thái */
    span.status-text {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        /* Màu chữ */
        margin: 0 15px;
        /* Khoảng cách */
        transition: color 0.3s ease, transform 0.3s ease;
        /* Hiệu ứng màu và vị trí */
    }

    /* Hiệu ứng khi văn bản thay đổi trạng thái */
    span.status-text[data-status="completed"] {
        color: #4CAF50;
        /* Màu xanh lá khi hoàn thành */
        transform: scale(1.1);
        /* Phóng to nhẹ */
    }

    span.status-text[data-status="pending"] {
        color: #FFC107;
        /* Màu vàng khi đang chờ */
        transform: rotate(5deg);
        /* Nghiêng nhẹ */
    }

    span.status-text[data-status="cancelled"] {
        color: #F44336;
        /* Màu đỏ khi hủy */
        transform: scale(0.9);
        /* Nhỏ lại */
    }
</style>