<link rel="stylesheet" href="./views/assets/css/layout.css">
<!-- Main Content -->
<div class="main-content">

  <!-- main -->
  <div class="main">
    <div class="topbar">
      <div class="toggle">
        <ion-icon name="menu-outline"></ion-icon>
      </div>
      <form class="search" method="post" action="">
        <label>
          <input type="text" placeholder="Search here" name="kyw" />
       
        </label>
      </form>
      <div class="user">
        <img src="../public/upload/imgs/Banner_Logo/2handstore/auraglam.png" />
      </div>
    </div>
    <div class="cardBox">
      <div class="card">
        <div>
          <div class="numbers"><?= number_format($dashboard_data['total_users'], 0, ',', '.') ?></div>
          <div class="cardName">Người dùng</div>
        </div>
        <div class="iconBx">
          <ion-icon name="eye-outline"></ion-icon>
        </div>
      </div>
      <div class="card">
        <div>
          <div class="numbers"><?= number_format($dashboard_data['total_products'], 0, ',', '.') ?></div>
          <div class="cardName">Sản phẩm</div>
        </div>
        <div class="iconBx">
          <ion-icon name="cart-outline"></ion-icon>
        </div>
      </div>
      <div class="card">
        <div>
          <?php
          // Lấy tháng hiện tại
          $current_month = date('m'); // Lấy tháng hiện tại theo định dạng mm
          
          // Gọi hàm để lấy dữ liệu các đơn hàng trong tháng hiện tại
          $orders = total_month(); // Hàm sẽ trả về doanh thu tháng hiện tại
          $total_revenue = 0; // Biến lưu tổng doanh thu của tháng hiện tại
          
          // Duyệt qua các đơn hàng và tính tổng doanh thu
          if ($orders) {
            foreach ($orders as $order) {
              // Lấy tổng doanh thu cho mỗi đơn hàng
              $revenue = $order['total_revenue'];

              // Cộng dồn doanh thu
              $total_revenue += $revenue;
            }
          }

          // Hiển thị tổng doanh thu tháng hiện tại
          echo '<div class="numbers">' . number_format($total_revenue, 0, ',', '.') . 'đ</div>';
          echo '<div class="cardName">Doanh thu tháng ' . $current_month . '</div>';
          ?>







        </div>
        <div class="iconBx">
          <ion-icon name="cash-outline"></ion-icon>
        </div>
      </div>
      <div class="card">
        <div>
          <?php
          // Lấy tất cả các đơn hàng
          $products = total_proce();

          // Khai báo mảng để lưu tổng doanh thu cho từng order_id
          $total_revenue_per_order = [];

          if ($products) {
            foreach ($products as $value) {
              extract($value);

              // Kiểm tra giá trị giảm giá
              $discount = isset($discount) ? $discount : 0;

              // Tính tổng giá trị từng sản phẩm với chiết khấu
              $product_total = $quantity * $price * (1 - $discount / 100);

              // Cộng dồn vào tổng doanh thu cho từng order_id
              $total_revenue_per_order[$order_id] =
                isset($total_revenue_per_order[$order_id])
                ? $total_revenue_per_order[$order_id] + $product_total
                : $product_total;
            }
          }

          // Tổng doanh thu
          $total = array_sum($total_revenue_per_order);

          // Hiển thị kết quả
          echo '<div class="numbers">' . number_format($total, 0, ',', '.') . 'đ</div>';
          echo '<div class="cardName">Tổng doanh thu</div>';

          for ($month = 1; $month <= 12; $month++) {
            $total_revenue_per_month[$month] = 0; // Khởi tạo doanh thu tháng đó là 0
          }
          $results = fetchRevenuePerMonth();
          // Duyệt qua các kết quả trả về và tính tổng doanh thu cho từng tháng
          if ($results) {
            foreach ($results as $row) {
              $year = $row['order_year'];// năm
              $month = $row['order_month'];  // Tháng
              $revenue = $row['total_revenue'];  // Doanh thu
              $total_revenue_per_month[$month] = $revenue;  // Lưu doanh thu cho tháng
            }
          }
          // $current_month = date('m');
          $data_for_chart = json_encode([
            ["month" => "Tháng 1 ", "revenue" => $total_revenue_per_month[1]],
            ["month" => "Tháng 2 ", "revenue" => $total_revenue_per_month[2]],
            ["month" => "Tháng 3 ", "revenue" => $total_revenue_per_month[3]],
            ["month" => "Tháng 4 ", "revenue" => $total_revenue_per_month[4]],
            ["month" => "Tháng 5 ", "revenue" => $total_revenue_per_month[5]],
            ["month" => "Tháng 6 ", "revenue" => $total_revenue_per_month[6]],
            ["month" => "Tháng 7 ", "revenue" => $total_revenue_per_month[7]],
            ["month" => "Tháng 8 ", "revenue" => $total_revenue_per_month[8]],
            ["month" => "Tháng 9 ", "revenue" => $total_revenue_per_month[9]],
            ["month" => "Tháng 10", "revenue" => $total_revenue_per_month[10]],
            ["month" => "Tháng 11", "revenue" => $total_revenue_per_month[11]],
            ["month" => "Tháng 12 ", "revenue" => $total_revenue_per_month[12]],


          ]);

          ?>


          <?php
          // Chuyển mảng $total_revenue_per_order sang JSON
          
          ?>
        </div>
        <div class="iconBx">
          <ion-icon name="cash-outline"></ion-icon>
        </div>
      </div>

    </div>
    <div class="graphBox">
      <div class="box">
        <canvas id="myChart" style="width: 100%; height: 520px;"></canvas>
      </div>
      <div class="box">
        <canvas id="earning"></canvas>
      </div>
    </div>

    <div class="details">
      <!-- Bảng Đơn đặt hàng gần đây -->
      <div class="left">
        <div class="recentCustomers">
          <div class="cardHeader">
            <h2>Khách hàng gần đây</h2>
          </div>
          <table>
           
            <?php foreach ($recent_users as $user): ?>
              <tr>
                <td width="60px">
                  <div class="imgBx">
                    <img src="../public/upload/<?= $user['avatar']; ?>" alt="Avatar" />
                  </div>
                </td>
                <td>
                  <h4><?= $user['username']; ?><br /></h4>
                </td>
                <td><h4><?= $user['address']; ?></h4></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
      <div class="box">
        <canvas id="myChart1" style="width: 100%; height: 560px;"></canvas>
      </div>
    </div>
    <div class="recentOrders">
      <div class="cardHeader">
        <h2>Đơn đặt hàng gần đây</h2>
        <a href="#" class="btn">Xem tất cả</a>
      </div>
      <table>
        <thead>
          <tr>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng sản phẩm</th>
            <th>Trạng thái</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($recent_orders as $order): ?>
            <tr>
              <td><?= $order['name_pro']; ?></td>
              <td><?= number_format($order['price'], 0, ',', '.'); ?> VND</td>
              <td><?= $order['quantity']; ?></td>
              <td>
                <?php
                // Hiển thị trạng thái của đơn hàng với các màu sắc khác nhau
                switch ($order['order_status']) {
                  case 0:
                    echo "<span class='status pending'>Chờ xử lý</span>";
                    break;
                  case 1:
                    echo "<span class='status shipped'>Đang giao hàng</span>";
                    break;
                  case 2:
                    echo "<span class='status delivered'>Đã hủy</span>";
                    break;
                  case 3:
                    echo "<span class='status hidden'>Đã Ẩn</span>";
                    break;
                  case 4:
                    echo "<span class='status completed'>Hoàn Thành</span>";
                    break;
                  default:
                    echo "<span class='status unknown'>Đơn Hàng Đang Gặp Lỗi</span>";
                }
                ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
<!-- <script src="../../aura/admin/views/assets/js/my_chart.js"></script> -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script>
  // Toggle menu
  let toggle = document.querySelector(".toggle");
  let navigation = document.querySelector(".navigation");
  let main = document.querySelector(".main");

  toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
  };

  // Active link in navigation
  let list = document.querySelectorAll(".navigation li");
  function activeLink() {
    list.forEach((item) => item.classList.remove("hovered"));
    this.classList.add("hovered");
  }
  list.forEach((item) => item.addEventListener("mouseover", activeLink));

  // Data preparation for charts
  const revenueData = <?php echo $data_for_chart; ?>;

  // Process revenue data
  const totalRevenue = revenueData.map(item => {
    const total = Object.values(item.revenue).reduce((sum, value) => sum + value, 0); // Tổng doanh thu
    return {
      month: item.month,
      totalRevenue: total,
    };
  });

  // Prepare labels and data for chart
  const labels = totalRevenue.map(item => item.month); // ["Tháng 1", "Tháng 2", ...]
  const data = totalRevenue.map(item => item.totalRevenue);

  console.log(totalRevenue); // Log để kiểm tra dữ liệu
  // Pass the low stock products from PHP to JavaScript
  var lowStockProducts = <?php echo json_encode($low_stock_products); ?>;

  if (lowStockProducts.length === 0) {
    document.getElementById("myChart").outerHTML =
      "<p style='color: green; font-size: 25px; font-weight: bold; text-align: center; padding: 20px; background-color: #f0f9f0; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);'>Không có sản phẩm nào sắp hết hàng.</p>";

  } else {
    // Create the data for the chart
    var productNames = lowStockProducts.map(function (product) {
      return product.name_pro;  // Product names
    });
    var stockCounts = lowStockProducts.map(function (product) {
      return product.quantity;  // Product stock counts
    });

    // Get the canvas context
    var ctx = document.getElementById("myChart").getContext("2d");

    // Create the chart
    var myChart = new Chart(ctx, {
      type: "bar", // Bar chart
      data: {
        labels: productNames, // Product names as labels
        datasets: [
          {
            label: "Số lượng hàng hết",
            data: stockCounts, // Stock counts
            backgroundColor: "rgba(255, 99, 132, 0.8)", // Bar color
            borderColor: "rgba(255, 99, 132, 1)", // Border color
            borderWidth: 1,
          },
        ],
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: "Biểu đồ sản phẩm sắp hết"
          },
        },
        scales: {
          y: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'Số lượng sản phẩm'
            },
            ticks: {
              stepSize: 1
            },
          },
          x: {
            title: {
              display: true,
              text: 'Tên sản phẩm'
            },
          },
        },
      },
    });
  }
  // Giữ nguyên Bar Chart for Earnings
  var earning = document.getElementById("earning").getContext("2d");
  var earningChart = new Chart(earning, {
    type: "bar",
    data: {
      labels: labels,
      datasets: [
        {
          label: "Doanh thu 2024",
          data: data,
          backgroundColor: [
            "rgba(75, 192, 192, 0.8)",
            "rgba(153, 102, 255, 0.8)",
            "rgba(255, 159, 64, 0.8)",
            "rgba(255, 99, 132, 0.8)",
            "rgba(54, 162, 235, 0.8)",
            "rgba(255, 206, 86, 0.8)",
          ],
          fill: false,
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.1
        },
      ],
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
      },
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
  var lowStockProducts = <?php echo json_encode($low_stock_products); ?>;

  if (lowStockProducts.length === 0) {
    document.getElementById("myChart").outerHTML =
      "<p style='color: green; font-size: 25px; font-weight: bold; text-align: center; padding: 20px; background-color: #f0f9f0; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);'>Không có sản phẩm tồn kho nào sắp hết hàng.</p>";

  } else {
    // Create the data for the chart
    var productNames = lowStockProducts.map(function (product) {
      return product.name_pro;  // Product names
    });
    var stockCounts = lowStockProducts.map(function (product) {
      return product.quantity;  // Product stock counts
    });

    // Get the canvas context
    var ctx = document.getElementById("myChart1").getContext("2d");

    // Create the chart
    var myChart = new Chart(ctx, {
      type: "bar", // Bar chart
      data: {
        labels: productNames, // Product names as labels
        datasets: [
          {
            label: "Số lượng tồn kho",
            data: stockCounts, // Stock counts
            backgroundColor: "rgba(153, 102, 255, 0.8)", // Màu mới cho thanh
            borderColor: "rgba(153, 102, 255, 1)", // Màu mới cho viền

            borderWidth: 1,
          },
        ],
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: "Biểu đồ sản phẩm tồn kho"
          },
        },
        scales: {
          y: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'Số lượng sản phẩm tồn kho'
            },
            ticks: {
              stepSize: 1
            },
          },
          x: {
            title: {
              display: true,
              text: 'Tên sản phẩm tồn kho'
            },
          },
        },
      },
    });
  }
</script>
<style>
  /* Các lớp cho trạng thái đơn hàng */
  .status {
    padding: 5px 10px;
    border-radius: 5px;
    color: white;
    /* Chữ màu trắng cho tất cả các trạng thái */
    font-weight: bold;
  }

  .status.pending {
    background-color: #f39c12;
    /* Màu vàng cho trạng thái chờ xử lý */
  }

  .status.shipped {
    background-color: #6db1de;
    /* Màu xanh dương cho trạng thái đang giao */
  }

  .status.delivered {
    background-color: #0f3ed7;
    /* Màu xanh lá cây cho trạng thái đã giao */
  }

  .status.cancelled {
    background-color: #e74c3c;
    /* Màu đỏ cho trạng thái đã hủy */
  }

  .status.hidden {
    background-color: #95a5a6;
    /* Màu xám cho trạng thái đã ẩn */
  }

  .status.completed {
    background-color: #2ecc71;
    /* Màu tím cho trạng thái hoàn thành */
  }

  .status.unknown {
    background-color: #7f8c8d;
    /* Màu xám cho trạng thái chưa xác định */
  }
</style>