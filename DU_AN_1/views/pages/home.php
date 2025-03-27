<div class="scroll-to-top">
    <a href=""><i class="fa-solid fa-arrow-up"></i></a>
</div>
<div class="banner">
    <img src="./public/upload/imgs/Banner_Logo/1.png" id="slider" alt="?">
</div>
<section class="New-Products">
    <div class="new-products">
        <div class="text-section">
            <h2 class="mt-3">Sản phẩm mới</h2>
            <img class="heart-1" src="./public/upload/imgs/Tym.jpg" alt="">
        </div>
        <div id="product-list">
            <div class="product-box">
                <?php
        $newProductShow = ''; 
        foreach ($newProduct as $newProductHome) {
            extract($newProductHome);
            $saleoff = ($price - ($price * $discount / 100));
            if ($discount > 0) {
                $newProductShow .= '
                <div class="products flex flex-col relative" data-product-id="'. $product_id .'"
                onclick="home_Detail(this)">
                <img src="./public/upload/imgs/Products/'. $img .'" alt="">
                <h3 class="pro-brand">' . htmlspecialchars($name_br) . '</h3>
                <h4 class="pro-name-2">
                    <p>' . htmlspecialchars($name_pro) . '</p>
                </h4>
                <div class="cost">
                    <span class="cost-pro"><del>' . number_format($price,0,',','.') . '</del>đ</span>
                    <span class="sale-off">' . number_format($saleoff,0,',','.') . 'đ</span>
                </div>
                <div class="button">
                    <a id="a-buyNow" href="index.php?page=Cart&action=cart&id='. $product_id .'"><button class="buy-now button-text">Mua ngay</button></a>
                    <i onclick="addWishList()" class="fa-regular fa-heart"></i>
                </div>
                <div class="discount-pro absolute text-white bg-red-400">
                    <p>' . htmlspecialchars($discount) . '%</p>
                </div>
                <form action="" method="post">
                    <input type="hidden" name="id" value="'. $product_id .'">
                    <input type="hidden" name="price" value="' . number_format($price) . '">
                    <input type="hidden" name="saleoff" value="' . $saleoff . '">
                    <input type="hidden" name="img" value="'. $img_url .'">
                    <input type="hidden" name="name" value="' . htmlspecialchars($name_pro) . '">
                    <input type="hidden" name="discount" value="' . htmlspecialchars($discount) . '">
                    <input type="hidden" name="brand" value="' . htmlspecialchars($name_br) . '">
                    <button type="submit" name="btn_addToCart" class="CartBtn">
                        <span class="IconContainer">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"
                                fill="rgb(17, 17, 17)" class="cart">
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
            </div>
            ';
            } else {
            $newProductShow .= '
            <div id="product-list-3" class="products flex flex-col relative" data-product-id="'. $product_id .'"
                onclick="home_Detail(this)">
                <img style="border-radius: 5px;" src="./public/upload/imgs/Products/'. $img .'" alt="">
                <h3 class="pro-brand">' . htmlspecialchars($name_br) . '</h3>
                <h4 class="pro-name-2">
                    <p>' . htmlspecialchars($name_pro) . '</p>
                </h4>
                <div class="cost">
                    <span class="sale-off">' . number_format($saleoff,0,',','.') . 'đ</span>
                </div>
                <div class="button">
                    <a id="a-buyNow" href="index.php?page=Cart&action=cart&id='. $product_id .'""><button class="buy-now button-text">Mua ngay</button></a>
                    <i onclick="addWishList()" class="fa-regular fa-heart"></i>
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
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"
                                fill="rgb(17, 17, 17)" class="cart">
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
            </div>
            ';
            }
            }
            echo $newProductShow;
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
        </div>
</section>
<section class="Categories">
    <div class="text-section">
        <h2 class="mt-3">Danh mục</h2>
        <img class="heart-5" src="./public/upload/imgs/Tym.jpg" alt="">
    </div>
    <div class="cate">
        <div class="cate-box mt-8">
            <div class="flex justify-between gap-4 cate-list">
                <?php
                $categoryShow = '';
                foreach ($category as $value ) {
                extract($value);
                $categoryShow .='
                    <div class="col-1 cates">
                        <a href="index.php?page=Product&category_id=' . $category_id . '">
                        <img src="./public/upload/imgs/Products/' . $img_cate . '" alt="">
                        <p>' . htmlspecialchars($name_cate) . '</p>
                        </a>
                    </div>';
                }
                echo $categoryShow;
                ?>
            </div>
        </div>
    </div>
</section>
<section class="Products-Sale">
    <div class="products-sale">
        <div class="text-section">
            <h2 class="mt-3">Khuyến mãi</h2>
            <img class="heart-2" src="./public/upload/imgs/Tym.jpg" alt="">
        </div>
        <div id="product-list-2">
            <div class="product-box">
                <?php
                $count = 0;
                $saleProductShow = ''; 
                foreach ($saleProduct as $saleProductHome){
                    $count ++;
                    extract($saleProductHome);
                    $saleoff = ($price - ($price * $discount / 100));
                            $saleProductShow .= '
                            <div class="products flex flex-col relative">
    <img src="./public/upload/imgs/Products/'. $img_url .'" alt="">
    <h3 class="pro-brand">' . htmlspecialchars($name_br) . '</h3>
    <h4 class="pro-name-2">
        <p>' . htmlspecialchars($name_pro) . '</p>
    </h4>
    <div class="cost">
        <span class="cost-pro"><del>' . number_format($price, 0, ',', '.') . '</del>đ</span>
        <span class="sale-off">' . number_format($saleoff, 0, ',', '.') . 'đ</span>
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
        <input type="hidden" name="price" value="' . number_format($price, 0, ',', '.') . '">
        <input type="hidden" name="saleoff" value="' . number_format($saleoff, 0, ',', '.') . '">
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
                };
                echo $saleProductShow;
                ?>
            </div>
        </div>
        <div id="box-read-more">
            <form method="POST" action="">
                <input type="hidden" name="limit2" value="<?= isset($_POST['limit2']) ? $_POST['limit2'] + 4 : 12; ?>">
                <button id="button-read-more" type="submit" class="read-more">Xem thêm</button>
            </form>
            <form method="POST" action="" id="button-read-less" class="button-read-less">
                <input type="hidden" name="limit2" value="8">
                <button type="submit"><i class="fa-solid fa-arrow-up"></i> Thu gọn</button>
            </form>
        </div>
    </div>
</section>
<section class="Banner-2">
    <banner2>
        <img class="mt-8" src="./public/upload/imgs/Banner_Logo/2.png" alt="">
    </banner2>
</section>
<section class="Hot-Products">
    <div class="hot-products">
        <div class="text-section">
            <h2 class="mt-3">Sản phẩm nổi bật</h2>
            <img class="heart-1" src="./public/upload/imgs/Tym.jpg" alt="">
        </div>
        <div id="product-list">
            <div class="product-box">
                <?php
                $hotProductShow = ''; 
                foreach ($hotProduct as $value){
                    extract($value);
                    $saleoff = ($price - ($price * $discount / 100));
                        if ( $discount > 0 ){
                            $hotProductShow .= '
                            <div class="products flex flex-col relative">
    <img src="./public/upload/imgs/Products/'. $img_url .'" alt="">
    <h3 class="pro-brand">' . htmlspecialchars($name_br) . '</h3>
    <h4 class="pro-name-2">
        <p>' . htmlspecialchars($name_pro) . '</p>
    </h4>
    <div class="cost">
        <span class="cost-pro"><del>' . number_format($price, 0, ',', '.') . '</del>đ</span>
        <span class="sale-off">' . number_format($saleoff, 0, ',', '.') . 'đ</span>
    </div>
    <div class="button">
        <a id="a-buyNow" href="index.php?page=Detail&action=detail&id='. $product_id .'"><button
                class="buy-now button-text">Mua ngay</button></a>
        <i onclick="addWishList()" class="fa-regular fa-heart"></i>
    </div>
    <div class="discount-pro absolute text-white bg-red-400">
        <p>' . htmlspecialchars($discount) . '%</p>
    </div>
    <form action="" method="post">
        <input type="hidden" name="id" value="'. $product_id .'">
        <input type="hidden" name="price" value="' . number_format($price, 0, ',', '.') . '">
        <input type="hidden" name="saleoff" value="' . number_format($saleoff, 0, ',', '.') . '">
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
    <div class="pro-inf-hot">
    <p><i class="fa-solid fa-fire"></i></p>
    </div>
    </div>
    ';
                        } else {
                            $hotProductShow .= '
                            <div id="product-list-3" class="products flex flex-col relative">
    <img style="border-radius: 5px;" src="./public/upload/imgs/Products/'. $img_url .'" alt="">
    <h3 class="pro-brand">' . htmlspecialchars($name_br) . '</h3>
    <h4 class="pro-name-2">
        <p>' . htmlspecialchars($name_pro) . '</p>
    </h4>
    <div class="cost">
        <span class="sale-off">' . number_format($saleoff, 0, ',', '.') . 'đ</span>
    </div>
    <div class="button">
        <a id="a-buyNow" href="index.php?page=Detail&action=detail&id='. $product_id .'"><button
                class="buy-now button-text">Mua ngay</button></a>
        <i onclick="addWishList()" class="fa-regular fa-heart"></i>
    </div>
    <form action="" method="post">
        <input type="hidden" name="id" value="'. $product_id .'">
        <input type="hidden" name="price" value="' . number_format($price, 0, ',', '.') . '">
        <input type="hidden" name="saleoff" value="' . number_format($saleoff, 0, ',', '.') . '">
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
    <div class="pro-inf-hot">
    <p><i class="fa-solid fa-fire"></i></p>
    </div>
    </div>
    ';
                        }
                    }                                        
                echo $hotProductShow;
                ?>

            </div>
        </div>
        <div id="box-read-more">
            <form method="POST" action="">
                <input type="hidden" name="limit3" value="<?= isset($_POST['limit3']) ? $_POST['limit3'] + 4 : 12; ?>">
                <button id="button-read-more" type="submit" class="read-more">Xem thêm</button>
            </form>
            <form method="POST" action="" id="button-read-less" class="button-read-less">
                <input type="hidden" name="limit3" value="8">
                <button type="submit"><i class="fa-solid fa-arrow-up"></i> Thu gọn</button>
            </form>
        </div>
    </div>
</section>
<section class="My-Products">
    <div class="my-products">
        <div class="text-section">
            <h2 class="mt-3">Sản phẩm của chúng tôi</h2>
            <img class="heart-3" src="./public/upload/imgs/Tym.jpg" alt="">
        </div>
        <div id="product-list">
            <div class="product-box">
                <?php
                $allProductShow = ''; 
                foreach ($allProduct as $value2){
                    extract($value2);
                    $saleoff = ($price - ($price * $discount / 100));
                        if ( $discount > 0 ){
                            $allProductShow .= '
                            <div class="products flex flex-col relative">
    <img src="./public/upload/imgs/Products/'. $img_url .'" alt="">
    <h3 class="pro-brand">' . htmlspecialchars($name_br) . '</h3>
    <h4 class="pro-name-2">
        <p>' . htmlspecialchars($name_pro) . '</p>
    </h4>
    <div class="cost">
        <span class="cost-pro"><del>' . number_format($price, 0, ',', '.') . '</del>đ</span>
        <span class="sale-off">' . number_format($saleoff, 0, ',', '.') . 'đ</span>
    </div>
    <div class="button">
        <a id="a-buyNow" href="index.php?page=Detail&action=detail&id='. $product_id .'"><button
                class="buy-now button-text">Mua ngay</button></a>
        <i onclick="addWishList()" class="fa-regular fa-heart"></i>
    </div>
    <div class="discount-pro absolute text-white bg-red-400">
        <p>' . htmlspecialchars($discount) . '%</p>
    </div>
    <form action="" method="post">
        <input type="hidden" name="id" value="'. $product_id .'">
        <input type="hidden" name="price" value="' . number_format($price, 0, ',', '.') . '">
        <input type="hidden" name="saleoff" value="' . number_format($saleoff, 0, ',', '.') . '">
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
        <span class="sale-off">' . number_format($saleoff, 0, ',', '.') . 'đ</span>
    </div>
    <div class="button">
        <a id="a-buyNow" href="index.php?page=Detail&action=detail&id='. $product_id .'"><button
                class="buy-now button-text">Mua ngay</button></a>
        <i onclick="addWishList()" class="fa-regular fa-heart"></i>
    </div>
    <form action="" method="post">
        <input type="hidden" name="id" value="'. $product_id .'">
        <input type="hidden" name="price" value="' . number_format($price, 0, ',', '.') . '">
        <input type="hidden" name="saleoff" value="' . number_format($saleoff, 0, ',', '.') . '">
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
                        }
                    }                                        
                echo $allProductShow;
                ?>
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
    </div>
</section>
<section class="Banner-3">
    <banner2>
        <img class="mt-8" src="./public/upload/imgs/Banner_Logo/4.png" alt="">
    </banner2>
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
            $blogShow .= '
           <div class="card-hover" onclick="Blog()">
    <img src="./public/upload/imgs/Blog/' . htmlspecialchars($img) . '">
    <div class="content-hover">
        <h4>' . htmlspecialchars($title) . '</h4>
        <p>' . htmlspecialchars($content) . '<a href="">Xem thêm</a></p>
    </div>
    </div>';
        }
        echo $blogShow;
        ?>
    </div>
</section>
<section class="partner">
    <div class="partners">
        <div class="text-section">
            <h2 class="mt-3">Đối tác</h2>
            <img class="heart-4" class="heart-3" src="./public/upload/imgs/Tym.jpg" alt="">
        </div>
        <div class="partner-list">
            <div class="partner-item">
                <img src="./public/upload/imgs/Friends/Bao.jpg" alt="">
                <p>Lê Chí Bảo</p>
                <div class="social flex gap-3">
                    <ul class="example-2">
                        <li class="icon-content">
                            <a href="https://discord.com/" aria-label="Discord" data-social="discord">
                                <div class="filled"></div>
                                <svg viewBox="0 0 16 16" class="bi bi-discord" fill="currentColor" height="16"
                                    width="16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.545 2.907a13.2 13.2 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.2 12.2 0 0 0-3.658 0 8 8 0 0 0-.412-.833.05.05 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.04.04 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032q.003.022.021.037a13.3 13.3 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019q.463-.63.818-1.329a.05.05 0 0 0-.01-.059l-.018-.011a9 9 0 0 1-1.248-.595.05.05 0 0 1-.02-.066l.015-.019q.127-.095.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.05.05 0 0 1 .053.007q.121.1.248.195a.05.05 0 0 1-.004.085 8 8 0 0 1-1.249.594.05.05 0 0 0-.03.03.05.05 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.2 13.2 0 0 0 4.001-2.02.05.05 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.03.03 0 0 0-.02-.019m-8.198 7.307c-.789 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612m5.316 0c-.788 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612">
                                    </path>
                                </svg>
                            </a>
                            <div class="tooltip">Discord</div>
                        </li>
                        <li class="icon-content">
                            <a href="https://store.steampowered.com/" aria-label="Steam" data-social="steam">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-steam" viewBox="0 0 16 16">
                                    <path
                                        d="M.329 10.333A8.01 8.01 0 0 0 7.99 16C12.414 16 16 12.418 16 8s-3.586-8-8.009-8A8.006 8.006 0 0 0 0 7.468l.003.006 4.304 1.769A2.2 2.2 0 0 1 5.62 8.88l1.96-2.844-.001-.04a3.046 3.046 0 0 1 3.042-3.043 3.046 3.046 0 0 1 3.042 3.043 3.047 3.047 0 0 1-3.111 3.044l-2.804 2a2.223 2.223 0 0 1-3.075 2.11 2.22 2.22 0 0 1-1.312-1.568L.33 10.333Z">
                                    </path>
                                    <path
                                        d="M4.868 12.683a1.715 1.715 0 0 0 1.318-3.165 1.7 1.7 0 0 0-1.263-.02l1.023.424a1.261 1.261 0 1 1-.97 2.33l-.99-.41a1.7 1.7 0 0 0 .882.84Zm3.726-6.687a2.03 2.03 0 0 0 2.027 2.029 2.03 2.03 0 0 0 2.027-2.029 2.03 2.03 0 0 0-2.027-2.027 2.03 2.03 0 0 0-2.027 2.027m2.03-1.527a1.524 1.524 0 1 1-.002 3.048 1.524 1.524 0 0 1 .002-3.048">
                                    </path>
                                </svg>
                            </a>
                            <div class="tooltip">Steam</div>
                        </li>
                        <li class="icon-content">
                            <a href="https://www.instagram.com/" aria-label="Instagram" data-social="instagram">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-instagram" viewBox="0 0 16 16" xml:space="preserve">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"
                                        fill="currentColor"></path>
                                </svg>
                            </a>
                            <div class="tooltip">Instagram</div>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="partner-item">
                <img src="./public/upload/imgs/Friends/Thai.jpg" alt="">
                <p>Danh Thái</p>
                <div class="social flex gap-3">
                    <ul class="example-2">
                        <li class="icon-content">
                            <a href="https://discord.com/" aria-label="Discord" data-social="discord">
                                <div class="filled"></div>
                                <svg viewBox="0 0 16 16" class="bi bi-discord" fill="currentColor" height="16"
                                    width="16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.545 2.907a13.2 13.2 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.2 12.2 0 0 0-3.658 0 8 8 0 0 0-.412-.833.05.05 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.04.04 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032q.003.022.021.037a13.3 13.3 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019q.463-.63.818-1.329a.05.05 0 0 0-.01-.059l-.018-.011a9 9 0 0 1-1.248-.595.05.05 0 0 1-.02-.066l.015-.019q.127-.095.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.05.05 0 0 1 .053.007q.121.1.248.195a.05.05 0 0 1-.004.085 8 8 0 0 1-1.249.594.05.05 0 0 0-.03.03.05.05 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.2 13.2 0 0 0 4.001-2.02.05.05 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.03.03 0 0 0-.02-.019m-8.198 7.307c-.789 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612m5.316 0c-.788 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612">
                                    </path>
                                </svg>
                            </a>
                            <div class="tooltip">Discord</div>
                        </li>
                        <li class="icon-content">
                            <a href="https://store.steampowered.com/" aria-label="Steam" data-social="steam">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-steam" viewBox="0 0 16 16">
                                    <path
                                        d="M.329 10.333A8.01 8.01 0 0 0 7.99 16C12.414 16 16 12.418 16 8s-3.586-8-8.009-8A8.006 8.006 0 0 0 0 7.468l.003.006 4.304 1.769A2.2 2.2 0 0 1 5.62 8.88l1.96-2.844-.001-.04a3.046 3.046 0 0 1 3.042-3.043 3.046 3.046 0 0 1 3.042 3.043 3.047 3.047 0 0 1-3.111 3.044l-2.804 2a2.223 2.223 0 0 1-3.075 2.11 2.22 2.22 0 0 1-1.312-1.568L.33 10.333Z">
                                    </path>
                                    <path
                                        d="M4.868 12.683a1.715 1.715 0 0 0 1.318-3.165 1.7 1.7 0 0 0-1.263-.02l1.023.424a1.261 1.261 0 1 1-.97 2.33l-.99-.41a1.7 1.7 0 0 0 .882.84Zm3.726-6.687a2.03 2.03 0 0 0 2.027 2.029 2.03 2.03 0 0 0 2.027-2.029 2.03 2.03 0 0 0-2.027-2.027 2.03 2.03 0 0 0-2.027 2.027m2.03-1.527a1.524 1.524 0 1 1-.002 3.048 1.524 1.524 0 0 1 .002-3.048">
                                    </path>
                                </svg>
                            </a>
                            <div class="tooltip">Steam</div>
                        </li>
                        <li class="icon-content">
                            <a href="https://www.instagram.com/" aria-label="Instagram" data-social="instagram">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-instagram" viewBox="0 0 16 16" xml:space="preserve">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"
                                        fill="currentColor"></path>
                                </svg>
                            </a>
                            <div class="tooltip">Instagram</div>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="partner-item">
                <img src="./public/upload/imgs/Friends/Cu.jpg" alt="">
                <p>Nguyễn Kế Cư</p>
                <div class="social flex gap-3">
                    <ul class="example-2">
                        <li class="icon-content">
                            <a href="https://discord.com/" aria-label="Discord" data-social="discord">
                                <div class="filled"></div>
                                <svg viewBox="0 0 16 16" class="bi bi-discord" fill="currentColor" height="16"
                                    width="16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.545 2.907a13.2 13.2 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.2 12.2 0 0 0-3.658 0 8 8 0 0 0-.412-.833.05.05 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.04.04 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032q.003.022.021.037a13.3 13.3 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019q.463-.63.818-1.329a.05.05 0 0 0-.01-.059l-.018-.011a9 9 0 0 1-1.248-.595.05.05 0 0 1-.02-.066l.015-.019q.127-.095.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.05.05 0 0 1 .053.007q.121.1.248.195a.05.05 0 0 1-.004.085 8 8 0 0 1-1.249.594.05.05 0 0 0-.03.03.05.05 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.2 13.2 0 0 0 4.001-2.02.05.05 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.03.03 0 0 0-.02-.019m-8.198 7.307c-.789 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612m5.316 0c-.788 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612">
                                    </path>
                                </svg>
                            </a>
                            <div class="tooltip">Discord</div>
                        </li>
                        <li class="icon-content">
                            <a href="https://store.steampowered.com/" aria-label="Steam" data-social="steam">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-steam" viewBox="0 0 16 16">
                                    <path
                                        d="M.329 10.333A8.01 8.01 0 0 0 7.99 16C12.414 16 16 12.418 16 8s-3.586-8-8.009-8A8.006 8.006 0 0 0 0 7.468l.003.006 4.304 1.769A2.2 2.2 0 0 1 5.62 8.88l1.96-2.844-.001-.04a3.046 3.046 0 0 1 3.042-3.043 3.046 3.046 0 0 1 3.042 3.043 3.047 3.047 0 0 1-3.111 3.044l-2.804 2a2.223 2.223 0 0 1-3.075 2.11 2.22 2.22 0 0 1-1.312-1.568L.33 10.333Z">
                                    </path>
                                    <path
                                        d="M4.868 12.683a1.715 1.715 0 0 0 1.318-3.165 1.7 1.7 0 0 0-1.263-.02l1.023.424a1.261 1.261 0 1 1-.97 2.33l-.99-.41a1.7 1.7 0 0 0 .882.84Zm3.726-6.687a2.03 2.03 0 0 0 2.027 2.029 2.03 2.03 0 0 0 2.027-2.029 2.03 2.03 0 0 0-2.027-2.027 2.03 2.03 0 0 0-2.027 2.027m2.03-1.527a1.524 1.524 0 1 1-.002 3.048 1.524 1.524 0 0 1 .002-3.048">
                                    </path>
                                </svg>
                            </a>
                            <div class="tooltip">Steam</div>
                        </li>
                        <li class="icon-content">
                            <a href="https://www.instagram.com/" aria-label="Instagram" data-social="instagram">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-instagram" viewBox="0 0 16 16" xml:space="preserve">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"
                                        fill="currentColor"></path>
                                </svg>
                            </a>
                            <div class="tooltip">Instagram</div>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="partner-item">
                <img src="./public/upload/imgs/Friends/Hoang.jpg" alt="">
                <p>DJ Thái Hoàng</p>
                <div class="social flex gap-3">
                    <ul class="example-2">
                        <li class="icon-content">
                            <a href="https://discord.com/" aria-label="Discord" data-social="discord">
                                <div class="filled"></div>
                                <svg viewBox="0 0 16 16" class="bi bi-discord" fill="currentColor" height="16"
                                    width="16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.545 2.907a13.2 13.2 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.2 12.2 0 0 0-3.658 0 8 8 0 0 0-.412-.833.05.05 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.04.04 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032q.003.022.021.037a13.3 13.3 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019q.463-.63.818-1.329a.05.05 0 0 0-.01-.059l-.018-.011a9 9 0 0 1-1.248-.595.05.05 0 0 1-.02-.066l.015-.019q.127-.095.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.05.05 0 0 1 .053.007q.121.1.248.195a.05.05 0 0 1-.004.085 8 8 0 0 1-1.249.594.05.05 0 0 0-.03.03.05.05 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.2 13.2 0 0 0 4.001-2.02.05.05 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.03.03 0 0 0-.02-.019m-8.198 7.307c-.789 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612m5.316 0c-.788 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612">
                                    </path>
                                </svg>
                            </a>
                            <div class="tooltip">Discord</div>
                        </li>
                        <li class="icon-content">
                            <a href="https://store.steampowered.com/" aria-label="Steam" data-social="steam">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-steam" viewBox="0 0 16 16">
                                    <path
                                        d="M.329 10.333A8.01 8.01 0 0 0 7.99 16C12.414 16 16 12.418 16 8s-3.586-8-8.009-8A8.006 8.006 0 0 0 0 7.468l.003.006 4.304 1.769A2.2 2.2 0 0 1 5.62 8.88l1.96-2.844-.001-.04a3.046 3.046 0 0 1 3.042-3.043 3.046 3.046 0 0 1 3.042 3.043 3.047 3.047 0 0 1-3.111 3.044l-2.804 2a2.223 2.223 0 0 1-3.075 2.11 2.22 2.22 0 0 1-1.312-1.568L.33 10.333Z">
                                    </path>
                                    <path
                                        d="M4.868 12.683a1.715 1.715 0 0 0 1.318-3.165 1.7 1.7 0 0 0-1.263-.02l1.023.424a1.261 1.261 0 1 1-.97 2.33l-.99-.41a1.7 1.7 0 0 0 .882.84Zm3.726-6.687a2.03 2.03 0 0 0 2.027 2.029 2.03 2.03 0 0 0 2.027-2.029 2.03 2.03 0 0 0-2.027-2.027 2.03 2.03 0 0 0-2.027 2.027m2.03-1.527a1.524 1.524 0 1 1-.002 3.048 1.524 1.524 0 0 1 .002-3.048">
                                    </path>
                                </svg>
                            </a>
                            <div class="tooltip">Steam</div>
                        </li>
                        <li class="icon-content">
                            <a href="https://www.instagram.com/" aria-label="Instagram" data-social="instagram">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-instagram" viewBox="0 0 16 16" xml:space="preserve">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"
                                        fill="currentColor"></path>
                                </svg>
                            </a>
                            <div class="tooltip">Instagram</div>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="partner-item">
                <img src="./public/upload/imgs/Friends/Dung.jpg" alt="">
                <p>Lưu Đức Dũng</p>
                <div class="social flex gap-3">
                    <ul class="example-2">
                        <li class="icon-content">
                            <a href="https://discord.com/" aria-label="Discord" data-social="discord">
                                <div class="filled"></div>
                                <svg viewBox="0 0 16 16" class="bi bi-discord" fill="currentColor" height="16"
                                    width="16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.545 2.907a13.2 13.2 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.2 12.2 0 0 0-3.658 0 8 8 0 0 0-.412-.833.05.05 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.04.04 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032q.003.022.021.037a13.3 13.3 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019q.463-.63.818-1.329a.05.05 0 0 0-.01-.059l-.018-.011a9 9 0 0 1-1.248-.595.05.05 0 0 1-.02-.066l.015-.019q.127-.095.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.05.05 0 0 1 .053.007q.121.1.248.195a.05.05 0 0 1-.004.085 8 8 0 0 1-1.249.594.05.05 0 0 0-.03.03.05.05 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.2 13.2 0 0 0 4.001-2.02.05.05 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.03.03 0 0 0-.02-.019m-8.198 7.307c-.789 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612m5.316 0c-.788 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612">
                                    </path>
                                </svg>
                            </a>
                            <div class="tooltip">Discord</div>
                        </li>
                        <li class="icon-content">
                            <a href="https://store.steampowered.com/" aria-label="Steam" data-social="steam">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-steam" viewBox="0 0 16 16">
                                    <path
                                        d="M.329 10.333A8.01 8.01 0 0 0 7.99 16C12.414 16 16 12.418 16 8s-3.586-8-8.009-8A8.006 8.006 0 0 0 0 7.468l.003.006 4.304 1.769A2.2 2.2 0 0 1 5.62 8.88l1.96-2.844-.001-.04a3.046 3.046 0 0 1 3.042-3.043 3.046 3.046 0 0 1 3.042 3.043 3.047 3.047 0 0 1-3.111 3.044l-2.804 2a2.223 2.223 0 0 1-3.075 2.11 2.22 2.22 0 0 1-1.312-1.568L.33 10.333Z">
                                    </path>
                                    <path
                                        d="M4.868 12.683a1.715 1.715 0 0 0 1.318-3.165 1.7 1.7 0 0 0-1.263-.02l1.023.424a1.261 1.261 0 1 1-.97 2.33l-.99-.41a1.7 1.7 0 0 0 .882.84Zm3.726-6.687a2.03 2.03 0 0 0 2.027 2.029 2.03 2.03 0 0 0 2.027-2.029 2.03 2.03 0 0 0-2.027-2.027 2.03 2.03 0 0 0-2.027 2.027m2.03-1.527a1.524 1.524 0 1 1-.002 3.048 1.524 1.524 0 0 1 .002-3.048">
                                    </path>
                                </svg>
                            </a>
                            <div class="tooltip">Steam</div>
                        </li>
                        <li class="icon-content">
                            <a href="https://www.instagram.com/" aria-label="Instagram" data-social="instagram">
                                <div class="filled"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-instagram" viewBox="0 0 16 16" xml:space="preserve">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"
                                        fill="currentColor"></path>
                                </svg>
                            </a>
                            <div class="tooltip">Instagram</div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>
<section class="rate">
    <?php
    $rateShow = '';
    $totalRateCount = 0;
    $rateShow .= '
    <div class="rates">
        <div class="total">
                <h3>Tổng lượt đánh giá</h3>
                <div class="total-1-co"> ';
                    foreach ($totalRate as $totalRateHome) {
                        $totalRateCount++;
                    }
                    $rateShow .= '<p>'. $totalRateCount . ' lượt đánh giá</p>
            </div>
        </div>
    <hr>
    <div class="rate-list">';
        foreach ($rate as $rateHome) {
        extract($rateHome);
        if ($avatar == '') {
            $rateShow .= '
        <div class="rate-item">
            <div class="user">
                <img src="./public/upload/imgs/Friends/avatar-none.jpg" alt="">
                <p>' . htmlspecialchars($username) . '</p>
            </div>
            <div class="cmt">
                <p>' . htmlspecialchars($date) . '</p>
                <p class="cmt-text">"' . htmlspecialchars($content) . '"</p>
            </div>
        </div>';
        } else {
        $rateShow .= '
        <div class="rate-item">
            <div class="user">
                <img src="./public/upload/imgs/Friends/' . htmlspecialchars($avatar) . '" alt="">
                <p>' . htmlspecialchars($username) . '</p>
            </div>
            <div class="cmt">          
                <p>' . htmlspecialchars($date) . '</p>
                <p class="cmt-text">"' . htmlspecialchars($content) . '"</p>
            </div>
        </div>';
        }
        }
        echo $rateShow;
        $rateShow .= '
    </div>
    </div>'
    ?>
</section>
<section class="device">
    <div class="devices">
        <div class="col">
            <i class="fa-solid fa-truck"></i>
            <div class="text">
                <h3>Free Delivery</h3>
                <p>Miễn phí vận chuyển</p>
            </div>
        </div>
        <div class="col">
            <i class="fa-solid fa-truck-fast"></i>
            <div class="text">
                <h3>Track Order</h3>
                <p>Theo dõi kiện hàng</p>
            </div>
        </div>
        <div class="col">
            <i class="fa-solid fa-credit-card"></i>
            <div class="text">
                <h3>Ease Payment</h3>
                <p>Thanh toán dễ dàng</p>
            </div>
        </div>
        <div class="col">
            <i class="fa-solid fa-question"></i>
            <div class="text">
                <h3>Have Question?</h3>
                <p>Có câu hỏi thắc mắc</p>
            </div>
        </div>
    </div>
</section>
<script src="./views/assets/js/home.js"></script>