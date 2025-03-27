<div class="site-map">
    <div class="row-1">
        <a href="./">Trang chủ</a>
        <p>/</p>
        <a id="sign-in" href="index.php?page=Blog">Bài viết</a>
    </div>
</div>
<section article-blog>
    <div class="article-blog">
        <div class="content">
            <h2>Bật mí các phong cách thời trang nữ hot nhất đầu năm 2024</h2>
            <i>28 Tháng Chín, 2024</i>
            <p>Phong cách thời trang 2024 dành cho nữ luôn là một quỹ đạo xoay vòng theo thời gian, các nhà thiết
                kế...
            </p>
        </div>
        <img src="../DU_AN_1/public/upload/imgs/Blog/anh1.jpg">
    </div>
    <div class="article-blog">
        <img src="../DU_AN_1/public/upload/imgs/Blog/anh2.jpg">
        <div class="content">
            <h2>Tìm kiếm nét đẹp quần áo tại AURA - GLAM</h2>
            <i>28 Tháng Chín, 2024</i>
            <p> Bạn có thể tìm thấy những sản phẩm còn mới với mức giá rất hợp lý, từ đó không chỉ tiết kiệm mà còn
                góp phần vào lối sống bền vững...
            </p>
        </div>

    </div>
</section>
<section class="blog">
    <div class="title">
        <h2 class="ml-2">Bài viết mới</h2>
        <p class="ml-2">Bài viết mới nhất sẽ được cập nhật tại đây</p>
    </div>
    <div class="blog-hover">
        <?php
        $blogShow = '';
        foreach ($blog as $blogHome){
            extract($blogHome);
            $blogShow .= ' <div class="card-hover">
            <img src="./public/upload/imgs/Blog/' . htmlspecialchars($image_url) . '">
            <div class="content-hover">
                <h4>' . htmlspecialchars($title) . '</h4>
                <p>' . htmlspecialchars($content) . '<a href="">Xem thêm</a></p>
            </div>
        </div>';
        }
        echo $blogShow;
        ?>
    </div>
    <div id="box-read-more">
        <form method="POST" action="">
            <input type="hidden" name="limit" value="<?= isset($_POST['limit']) ? $_POST['limit'] + 4 : 12; ?>">
            <button id="button-read-more" type="submit" class="read-more">Xem thêm</button>
        </form>
        <form method="POST" action="" id="button-read-less" class="button-read-less">
            <input type="hidden" name="limit" value="8">
            <button type="submit"><i class="fa-solid fa-arrow-up"></i> Thu gọn</button>
        </form>
    </div>
</section>
<script src="../DU_AN_1/views/assets/js/blog.js"></script>