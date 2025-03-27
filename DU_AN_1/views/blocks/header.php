<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./views/assets/css/style.css">
    <script defer src="./views/assets/js/style.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="row-1">
                <div class="col-1">
                    <a href="./">
                        <img style="filter: brightness(500%);" src="./public/upload/imgs/Banner_Logo/2handstore/3.png"
                            alt="Logo">
                    </a>
                </div>
                <div class="col-2">
                    <div class="search">
                        <form action="index.php?page=Product" method="post">
                            <input class=" px-2 py-1" name="kyw" type="text" placeholder="Search ...">
                            <button name="timkiem" value="Tìm kiếm" class="button-text"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-3">
                    <div class="nav-bars">
                        <i id="bar-icon" class="fa-solid fa-bars"></i>
                        <ul class="menu-url" id="drop-bar">
                            <a href="./"><img src="./public/upload/imgs/Banner_Logo/2handstore/3.png" alt=""></a>
                            <li><a href="index.php?page=About">Giới thiệu</a></li>
                            <li><a href="index.php?page=Product">Sản phẩm</a></li>
                            <li><a href="index.php?page=Contact">Liên hệ</a></li>
                            <li><a href="index.php?page=Blog">Bài viết</a></li>
                        </ul>
                    </div>
                    <ul class="flex">
                        <li><a href=" index.php?page=About">Giới thiệu</a></li>
                        <li><a href="index.php?page=Product">Sản phẩm</a></li>
                        <li><a href="index.php?page=Contact">Liên hệ</a></li>
                        <li><a href="index.php?page=Blog">Bài viết</a></li>
                    </ul>
                </div>
                <div class="col-4">
                    <div class="cart menu-url">
                        <a><i style="cursor: pointer;" id="cart-icon" class="fa-solid fa-cart-shopping"></i></a>
                        <div class="quantity-cart">
                            <span id="quantity-cart">
                                <?php
                                   $totalCart = 0;
                                   if (!empty($_SESSION['giohang'])) {
                                       foreach ($_SESSION['giohang'] as $item) {
                                           $totalCart += 1;
                                       }
                                   }
                                   echo $totalCart;                               
                                ?>
                            </span>
                        </div>
                    </div>
                    <div id="cart-container">
                        <h3>Giỏ Hàng</h3>
                        <table class="cart-table" id="giohang">
                            <thead>
                                <tr>
                                    <th>Sản Phẩm</th>
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
    $html_cart = '';

    if (!empty($_SESSION['giohang'])) {
    foreach ($_SESSION['giohang'] as $key => $item) {
        extract($item);   
        $quantity = isset($item['quantity']) ? $item['quantity'] : 1;
        $saleoff = isset($item['saleoff']) ? $item['saleoff'] : 0;
        $id = isset($item['id']) ? $item['id'] : null;
        $img = isset($item['img']) ? $item['img'] : 'default.jpg';

        $total_price = $saleoff * $quantity;
        $formatted_saleoff = number_format($saleoff,0,',','.');
        $formatted_total_price = number_format($total_price,0,',','.');

        $html_cart .= '
        <tr data-id="' . htmlspecialchars($id) . '">
            <td>
                <img src="./public/upload/imgs/Products/' . htmlspecialchars($img) . '" alt="Product">
            </td>
            <td>' . $formatted_saleoff . 'đ</td>
            <td>
                 <li> 
                    <button class="down">-</button>
                    <input class="inputs" name="soluong" size="4" value="'.$quantity.'" maxlength="3" type="text">
                    <input type="hidden" value="'.$key.'">
                    <button class="up">+</button>
                </li>

            </td>
            <td class="total_price">' . $formatted_total_price . 'đ</td>
            <td>
                <form method="post" class="remove-form">
                    <input type="hidden" name="id" value="' . htmlspecialchars($id) . '">
                    <button type="submit" name="remove_item">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>';
    }
    }

    echo $html_cart;
    ?>

                            </tbody>
                        </table>
                        <div class="cart-summary">
                            <p>Tổng cộng: <span class="total-price">
                                    <?php
                                    $total = 0;
                                    if (!empty($_SESSION['giohang'])) {
                                        foreach ($_SESSION['giohang'] as $item) {
                                            $total += $item['saleoff'] * $item['quantity'];
                                        }
                                    }
                                    echo number_format($total,0,',','.') . 'đ';
                                    ?>
                                </span></p>
                            <a href="index.php?page=Cart"><button id="checkout-btn">Thanh Toán</button></a>
                        </div>
                    </div>

                    <div class="account menu-url">
                        <?php if (isset($_SESSION['user'])): ?>
                        <a href="#"><i id="user-icon" class="fa-regular fa-user"></i></a>
                        <div class="dropdown" id="dropdown-menu">
                            <h3>Tài khoản</h3>
                            <ul>
                                <p style="color:orange"><span style="color:black">Xin chào,
                                    </span><?=$_SESSION['user']['username']?></p>
                                <li><a href="index.php?page=myaccount">Tài khoản</a></li>
                                <li><a href="index.php?page=myorders">Lịch sử đơn hàng</a></li>
                                <li><a href="index.php?page=Wishlist">Sản phẩm Yêu thích</a></li>
                                <li><a href="index.php?page=logout">Đăng xuất</a></li>
                            </ul>
                        </div>
                        <?php else: ?>
                        <a href="#"><i id="user-icon" class="fa-regular fa-user"></i></a>
                        <div class="dropdown" id="dropdown-menu">
                            <h3>Tài khoản</h3>
                            <ul>
                                <li><a href="index.php?page=Sign-Up">Đăng ký</a></li>
                                <li><a href="index.php?page=Sign-In">Đăng nhập</a></li>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
        </header>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
        $(document).ready(function() {
            $("#giohang").on("click", ".up, .down", function() {
                var row = $(this).closest('tr');
                var quantityInput = row.find('input[name="soluong"]');
                var quantity = $(this).hasClass('up') ?
                    parseInt(quantityInput.val()) + 1 :
                    Math.max(1, parseInt(quantityInput.val()) - 1);
                var key = row.find('input[type="hidden"]').val();
                $.post("./controller/product/changesoluong.php", {
                        key: key,
                        soluong: quantity
                    },
                    function(data) {
                        row.find('td.total_price').html(data.total_price.toLocaleString('vi-VN') +
                            'đ');
                        quantityInput.val(quantity);
                        // updateTotalPrice();
                    }, 'json');
            });

            // function updateTotalPrice() {
            //     var total = 0;
            //     $("#giohang tr").each(function() {
            //         var priceText = $(this).find('.total_price').text().replace('đ', '').replace(',',
            //             '').trim();
            //         var price = parseInt(priceText);
            //         if (!isNaN(price)) {
            //             total += price;
            //         }
            //     });

            //     if (!isNaN(total)) {
            //         $('.total-price').text(total + 'đ');
            //     }
            // }
        });
        </script>