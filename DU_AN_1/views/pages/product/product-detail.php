<div class="site-map">
    <div class="row-1">
        <a href="./">Trang chủ</a>
        <p>/</p>
        <a href="./">Sản phẩm</a>
        <p>/</p>
        <a id="sign-in" href="index.php?page=Details">Chi tiết sản phẩm</a>
    </div>
</div>
<script src="../DU_AN_1/views/assets/js/main.js"></script>
<?php
extract($detail);
$saleoff = ($price - ($price * $discount / 100));
$detailShow = '
<div class="product-page">
    <div class="product-gallery">
        <div class="main-image">
            <img src="./public/upload/imgs/Products/' . htmlspecialchars($img_url) . '" alt="' . htmlspecialchars($description_img) . '" id="main-image">
        </div>
    </div>
    <div class="product-details">
        <h1 style="font-weight: bold; font-size:24px;">' . htmlspecialchars($name_pro) . '</h1>
        <p class="product-price">' . number_format($saleoff) . 'đ</p>
        <p class="product-description-content">
            ' . htmlspecialchars($description_pro) . '
        </p>
        <div class="product-options">
            <p><strong>Tùy Chọn Có Sẵn</strong></p>
            <div class="tuychon">
                <i class="fa-regular fa-circle-check"></i>
                <span class="in-stock">Còn ' . htmlspecialchars($quantity) . ' sản phẩm</span>
            </div>
            <div class="color-options">
                <p>Màu:</p>
                <span class="color-swatch" style="background-color: red;"><i class="fa-solid fa-check" style="display: none;"></i></span>
                <span class="color-swatch" style="background-color: orange;"><i class="fa-solid fa-check" style="display: none;"></i></span>
                <span class="color-swatch" style="background-color: green;"><i class="fa-solid fa-check" style="display: none;"></i></span>
                <span class="color-swatch" style="background-color: blue;"><i class="fa-solid fa-check" style="display: none;"></i></span>
            </div>
            <div class="size-options">
                <p>Kích Thước:</p>
                <select style="border:1px solid black">
                    <option>Kích thước tùy chọn</option>
                    <option>M</option>
                    <option>L</option>
                    <option>XL</option>
                    <option>XXL</option>
                </select>
            </div>
            <div class="quantity">
                <p style="padding: 0;margin: 0;">Số Lượng:</p>
                <input style="padding: 13px;background-color: #fff;width: 20%;height: 10px;border:1px solid black;" type="number" value="1" min="1">
                <a href="index.php?page=Cart"><button class="add-to-cart">+ Thêm Vào Giỏ Hàng</button></a>
            </div>
        </div>
        <div class="danhmuc">
            <p>Danh mục:</p>
            <div class="tag">
                <a href="#">' . htmlspecialchars($name_cate) . '</a>
            </div>
        </div>
    </div>
</div>    
    <div class="mota">
        <div class="mota-details">
            <div class="button" id="toggle-description-content" onclick="toggleContent(\'description-content\')">Mô tả sản phẩm</div>
            <div class="button" id="toggle-prototype" onclick="toggleContent(\'prototype\')">Đặc điểm</div>
            <div class="button" id="toggle-review" onclick="toggleContent(\'review\')">Đánh giá</div>
        </div>
        <div id="description-content" class="content ">
            <p style="text-align: justify;">' . htmlspecialchars($description_pro) . '</p>
        </div>
   ';
echo $detailShow;
?>


<div id="review" class="content hidden">
    <?php 
    $comment = '';
    foreach ($detail2 as $value2) {
        extract($value2);
        if ($content != '' && $username != '') {
        if ($img == '') {
            $comment .= '
            <div class="review-item">
                <div class="review-avatar">
                    <img src="./public/upload/imgs/Friends/avatar-none.jpg" alt="Avatar của người dùng">
                </div>
                <div class="review-content">
                    <div class="review-name">'. htmlspecialchars($username) .'</div>
                    <div class="review-text" style="text-align: justify;">'. nl2br(htmlspecialchars($content)) .'</div>
                    <div class="reply-button"><i class="fa-solid fa-reply"></i>Trả lời</div>
                </div>
            </div>';
        } else {
            // Nếu có ảnh, hiển thị ảnh của người dùng
            $comment .= '
            <div class="review-item">
                <div class="review-avatar">
                    <img src="./public/upload/imgs/Friends/'. htmlspecialchars($img) .'" alt="Avatar của người dùng">
                </div>
                <div class="review-content">
                    <div class="review-name">'. htmlspecialchars($username) .'</div>
                    <div class="review-text" style="text-align: justify;">'. nl2br(htmlspecialchars($content)) .'</div>
                    <div class="reply-button"><i class="fa-solid fa-reply"></i>Trả lời</div>
                </div>
            </div>';
        }
    }
    }
    echo $comment;
?>


    <!-- Thêm phần thêm đánh giá -->
    <div class="add-review">
        <h3>Thêm đánh giá</h3>
        <label for="name">Họ và tên *</label>
        <input type="text" id="name" placeholder="Enter your name">

        <label for="email">Email *</label>
        <input type="email" id="email" placeholder="Enter your email">

        <label for="review">Đánh giá của bạn *</label>
        <textarea id="review" rows="4" placeholder="Write a review"></textarea>
        <br>
        <button class="submit-button">Gửi đánh giá</button>
    </div>
</div>


<div id="prototype" class="content hidden">
    <table>
        <tr>
            <th>Chất liệu</th>
            <td>Polyester</td>
        </tr>
        <tr>
            <th>Phong cách</th>
            <td>Girly</td>
        </tr>
        <tr>
            <th>Tính chất</th>
            <td>Short Dress</td>
        </tr>
    </table>
    <div class="description-content">
        Fashion has been creating well-designed collections since 2010. The brand offers feminine designs
        delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear
        collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks
        with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and
        manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes,
        hats, belts and more!
    </div>
</div>


</div>
<div class="similar-product">
    <h3>Sản phẩm tương tự</h3>
    <p>Duyệt qua sản phẩm liên quan của chúng tôi</p>
</div>

<div class="product-section-footer">
    <div class="box">
        <img style="position:relative;" class="img" src="../DU_AN_1/public/upload/imgs/Products/YB1.jpg" alt="">
        <h2>Epicuri per lobortis</h2>
        <div style="position: absolute;" class="themsanpham">
            <a href="#">Xem chi tiết</a>
            <div class="icon">
                <i class="fa-solid fa-heart"></i>
                <i class="fa-solid fa-sliders"></i>
            </div>
        </div>
    </div>
    <div class="box">
        <img class="img" src="../DU_AN_1/public/upload/imgs/Products/YB1.jpg" alt="">
        <h2>Epicuri per lobortis</h2>
        <div class="themsanpham">
            <a href="#">Xem chi tiết</a>
            <div class="icon">
                <i class="fa-solid fa-heart"></i>
                <i class="fa-solid fa-sliders"></i>
            </div>
        </div>
    </div>
    <div class="box">
        <img class="img" src="../DU_AN_1/public/upload/imgs/Products/YB1.jpg" alt="">
        <h2>Epicuri per lobortis</h2>
        <div class="themsanpham">
            <a href="#">Xem chi tiết</a>
            <div class="icon">
                <i class="fa-solid fa-heart"></i>
                <i class="fa-solid fa-sliders"></i>
            </div>
        </div>
    </div>
    <div class="box">
        <img class="img" src="../DU_AN_1/public/upload/imgs/Products/YB1.jpg" alt="">
        <h2>Epicuri per lobortis</h2>
        <div class="themsanpham">
            <a href="#">Xem chi tiết</a>
            <div class="icon">
                <i class="fa-solid fa-heart"></i>
                <i class="fa-solid fa-sliders"></i>
            </div>
        </div>
    </div>

</div>
<div id="box-read-more">
    <form method="POST" action="">
        <input type="hidden" name="limit4" value="<?= isset($_POST['limit4']) ? $_POST['limit4'] + 4 : 12; ?>">
        <button id="button-read-more" type="submit" class="read-more">Xem thêm</button>
    </form>
    <form method="POST" action="" id="button-read-less" class="button-read-less">
        <input type="hidden" name="limit4" value="8">
        <button type="submit"><i class="fa-solid fa-arrow-up"></i> Thu gọn</button>
    </form>
</div>