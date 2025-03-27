<?php
function get_product($id) {
    $sql = "SELECT product.*, brand.name_br, img.img_url, category.name_cate, img.description_img, comment.content, users.img, users.username
             FROM product 
             INNER JOIN category ON product.category_id = category.category_id
             LEFT JOIN img ON product.product_id = img.product_id
             LEFT JOIN brand ON product.brand_id = brand.brand_id
             LEFT JOIN comment ON product.product_id = comment.product_id
             LEFT JOIN users ON comment.user_id = users.user_id
             WHERE product.product_id = $id";
    return pdo_query_one($sql);
}

function get_product2() {
    $sql = "SELECT product.*, brand.name_br, img.img_url, category.name_cate, img.description_img, comment.content, users.img, users.username
             FROM product 
             INNER JOIN category ON product.category_id = category.category_id
             LEFT JOIN img ON product.product_id = img.product_id
             LEFT JOIN brand ON product.brand_id = brand.brand_id
             LEFT JOIN comment ON product.product_id = comment.product_id
             LEFT JOIN users ON comment.user_id = users.user_id";
    return pdo_query($sql);
    }
?>