<div class="site-map">
    <div class="row-1">
        <a href="./">Trang chủ</a>
        <p>/</p>
        <a id="sign-in" href="index.php?page=Product">Sản phẩm</a>
    </div>
</div>

<section class="product">
    <aside>
        <form action="index.php?page=Product" method="POST">
            <div class="check-box-list">
                <h3>Danh mục</h3>
                <!-- Checkbox "Tất cả sản phẩm" -->
                <div class="check-box">
                    <input type="checkbox" name="categories[]" id="category_all" value="all"
                        <?php echo (is_array($categoriesSelected) && in_array('all', $categoriesSelected)) ? 'checked' : ''; ?>>
                    <label for="category_all">Tất cả sản phẩm</label>
                </div>
                <?php
            // Hiển thị danh sách danh mục với số lượng sản phẩm
                $categoryShow = '';
                foreach ($category_2 as $value) {
                extract($value);

                // Lấy số lượng sản phẩm trong mỗi danh mục
                $productCount = 0;
                foreach ($categoryProductCounts as $count) {
                    if ($count['category_id'] == $category_id) {
                        $productCount = $count['product_count'];
                        break;
                    }
                }

                $categoryShow .= '
                    <div class="check-box">
                        <input type="checkbox" name="categories[]" id="category_' . $category_id . '" value="' . $category_id . '">
                        <label for="category_' . $category_id . '">' . htmlspecialchars($name_cate) . ' (' . $productCount . ')</label>
                    </div>';
            }
            echo $categoryShow;
            ?>

                <h3>Nhãn hàng</h3>
                <?php
            // Hiển thị các thương hiệu
            $brandShow = '';
            foreach ($brand as $value) {
                extract($value);
            
                // Lấy số lượng sản phẩm của từng thương hiệu
                $productCount = 0;
                foreach ($brandProductCounts as $count) {
                    if ($count['brand_id'] == $brand_id) {
                        $productCount = $count['product_count'];
                        break;
                    }
                }
            
                $brandShow .= '
                    <div class="check-box">
                        <input type="checkbox" name="brands[]" id="brand_' . $brand_id . '" value="' . $brand_id . '">
                        <label for="brand_' . $brand_id . '">' . htmlspecialchars($name_br) . ' (' . $productCount . ')</label>
                    </div>';
            }
            echo $brandShow;
            ?>
                <h3>Giá tiền</h3>

                <div class="check-box">
                    <input type="checkbox" name="sort_price" id="sort_price_asc" value="asc">
                    <label for="sort_price_asc">Giá tăng dần</label>
                </div>

                <div class="check-box">
                    <input type="checkbox" name="sort_price" id="sort_price_desc" value="desc">
                    <label for="sort_price_desc">Giá giảm dần</label>
                </div>

            </div>

            <button id="button-filter" type="submit">Lọc sản phẩm</button>
        </form>
    </aside>
    <article>
        <div class="products-page">
            <div class="text-section">
                <h2 class="mt-3">Sản phẩm</h2>
                <img class="heart-1" src="./public/upload/imgs/Tym.jpg" alt="">
            </div>
            <div class="bar-drop">
                <i id="bar-icon-product" class="fa-solid fa-bars"></i>
                <div id="bar-drop-product" class="bar-drop-menu">
                    <form action="index.php?page=Product" method="POST">
                        <div class="check-box-list">
                            <div class="check-box-list-cate">
                                <h3>Danh mục</h3>

                                <!-- Checkbox "Tất cả sản phẩm" -->
                                <div class="check-box">
                                    <input type="checkbox" name="categories[]" id="category_all" value="all">
                                    <label for="category_all">Tất cả sản phẩm</label>
                                </div>


                                <?php
                                    // Hiển thị danh sách danh mục với số lượng sản phẩm
                                        $categoryShow = '';
                                        foreach ($category_2 as $value) {
                                        extract($value);
                                        
                                        // Lấy số lượng sản phẩm trong mỗi danh mục
                                        $productCount = 0;
                                        foreach ($categoryProductCounts as $count) {
                                            if ($count['category_id'] == $category_id) {
                                                $productCount = $count['product_count'];
                                                break;
                                            }
                                        }
                                    
                                        $categoryShow .= '
                                            <div class="check-box">
                                                <input type="checkbox" name="categories[]" id="category_' . $category_id . '" value="' . $category_id . '">
                                                <label for="category_' . $category_id . '">' . htmlspecialchars($name_cate) . ' (' . $productCount . ')</label>
                                            </div>';
                                    }
                                    echo $categoryShow;
                                    ?>
                            </div>
                            <div class="check-box-list-brand">
                                <h3>Nhãn hàng</h3>
                                <?php
                                    // Hiển thị các thương hiệu
                                    $brandShow = '';
                                    foreach ($brand as $value) {
                                        extract($value);
                                    
                                        // Lấy số lượng sản phẩm của từng thương hiệu
                                        $productCount = 0;
                                        foreach ($brandProductCounts as $count) {
                                            if ($count['brand_id'] == $brand_id) {
                                                $productCount = $count['product_count'];
                                                break;
                                            }
                                        }
                                    
                                        $brandShow .= '
                                            <div class="check-box">
                                                <input type="checkbox" name="brands[]" id="brand_' . $brand_id . '" value="' . $brand_id . '">
                                                <label for="brand_' . $brand_id . '">' . htmlspecialchars($name_br) . ' (' . $productCount . ')</label>
                                            </div>';
                                    }
                                    echo $brandShow;
                                    ?>
                            </div>
                            <div class="check-box-list-price">
                                <h3>Giá tiền</h3>

                                <div class="check-box">
                                    <input type="checkbox" name="sort_price" id="sort_price_asc" value="asc">
                                    <label for="sort_price_asc">Giá tăng dần</label>
                                </div>

                                <div class="check-box">
                                    <input type="checkbox" name="sort_price" id="sort_price_desc" value="desc">
                                    <label for="sort_price_desc">Giá giảm dần</label>
                                </div>

                            </div>
                        </div>
                        <button id="button-filter" type="submit">Lọc sản phẩm</button>
                    </form>
                </div>
            </div>

            <div id="product-list-2">
                <div class="product-box">
                    <?php
        $allProductShow = '';
        foreach ($filteredProducts as $value) {
            extract($value);
            $saleoff = ($price - ($price * $discount / 100));
            if ($discount > 0) {
                $allProductShow .= '
                <div class="products flex flex-col relative">
    <img src="./public/upload/imgs/Products/'. $img_url .'" alt="">
    <h3 class="pro-brand">' . htmlspecialchars($name_br) . '</h3>
    <h4 class="pro-name-2">
        <p>' . htmlspecialchars($name_pro) . '</p>
    </h4>
    <div class="cost">
        <span class="cost-pro"><del>' . number_format($price) . '</del>đ</span>
        <span class="sale-off">' . number_format($saleoff) . 'đ</span>
    </div>
    <div class="button">
        <a id="a-buyNow" href="index.php?page=Detail&action=detail&id='. $product_id .'"><button
                class="buy-now button-text">Mua ngay</button></a>
        <i onclick="addWishList()"class="fa-regular fa-heart"></i>
    </div>
    <div class="discount-pro absolute text-white bg-red-400">
        <p>' . htmlspecialchars($discount) . '%</p>
    </div>
    <form action="" method="post">
        <input type="hidden" name="id" value="'. $product_id .'">
        <input type="hidden" name="price" value="' . number_format($price) . '">
        <input type="hidden" name="saleoff" value="' . $saleoff. '">
        <input type="hidden" name="img" value="'. $img_url .'">
        <input type="hidden" name="name" value="' . htmlspecialchars($name_pro) . '">
        <input type="hidden" name="discount" value="' . htmlspecialchars($discount) . '">
        <input type="hidden" name="brand" value="' . htmlspecialchars($name_br) . '">
        <button type="submit" name="btn_addToCart" class="CartBtn">
            <span class="IconContainer">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" fill="rgb(17, 17, 17)"
                    class="cart">
                    <path
                        d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z">
                    </path>
                </svg>
            </span>
            <p class="text"> + Giỏ hàng</p>
        </button>
    </form>
    <div class="CartBtn2">
        <i class="fa-solid fa-cart-plus"></i>
    </div>
    </div>';
            } else {
                $allProductShow .= '
                <div id="product-list-3" class="products flex flex-col relative">
    <img style="border-radius: 5px;" src="./public/upload/imgs/Products/'. $img_url .'" alt="">
    <h3 class="pro-brand">' . htmlspecialchars($name_br) . '</h3>
    <h4 class="pro-name-2">
        <p>' . htmlspecialchars($name_pro) . '</p>
    </h4>
    <div class="cost">
        <span class="sale-off">' . number_format($saleoff) . 'đ</span>
    </div>
    <div class="button">
        <a id="a-buyNow" href="index.php?page=Detail&action=detail&id='. $product_id .'"><button
                class="buy-now button-text">Mua ngay</button></a>
        <i onclick="addWishList()"class="fa-regular fa-heart"></i>
    </div>
    <form action="" method="post">
        <input type="hidden" name="id" value="'. $product_id .'">
        <input type="hidden" name="price" value="' . number_format($price) . '">
        <input type="hidden" name="saleoff" value="' . number_format($saleoff) . '">
        <input type="hidden" name="img" value="'. $img_url .'">
        <input type="hidden" name="name" value="' . htmlspecialchars($name_pro) . '">
        <input type="hidden" name="discount" value="' . htmlspecialchars($discount) . '">
        <input type="hidden" name="brand" value="' . htmlspecialchars($name_br) . '">
        <button type="submit" name="btn_addToCart" class="CartBtn">
            <span class="IconContainer">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" fill="rgb(17, 17, 17)"
                    class="cart">
                    <path
                        d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z">
                    </path>
                </svg>
            </span>
            <p class="text"> + Giỏ hàng</p>
        </button>
    </form>
    <div class="CartBtn2">
        <i class="fa-solid fa-cart-plus"></i>
    </div>
    <div class="pro-inf-new">
    <p>Mới</p>
    </div>
    </div>';
            }
        }
        echo $allProductShow;
        ?>
                </div>
            </div>
            <div class="button-box">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <form action="" method="POST">

                    <button type="submit" name="page" value="<?= $i ?>"><?= $i ?></button>
                </form>
                <?php endfor; ?>
            </div>

        </div>
    </article>
</section>
<script src=" ./views/assets/js/products.js"></script>