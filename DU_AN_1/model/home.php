<?php
function showCate() {
   $sql = "SELECT * FROM category";
   return pdo_query($sql);
}

function newProduct($limit) {
    $sql = "SELECT product.*, brand.name_br, img.img_url, category.name_cate
            FROM product 
            INNER JOIN category ON product.category_id = category.category_id
            LEFT JOIN img ON product.product_id = img.product_id
            LEFT JOIN brand ON product.brand_id = brand.brand_id
            ORDER BY product_id DESC
            LIMIT :limit";

    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function hotProduct($limit3) {
    $sql = "SELECT product.*, brand.name_br, img.img_url, category.name_cate
            FROM product 
            INNER JOIN category ON product.category_id = category.category_id
            LEFT JOIN img ON product.product_id = img.product_id
            LEFT JOIN brand ON product.brand_id = brand.brand_id
            ORDER BY sold 
            DESC
            LIMIT :limit";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':limit', $limit3, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function saleProduct($limit2) {
    $sql = "SELECT product.*, brand.name_br, img.img_url, category.name_cate
            FROM product 
            INNER JOIN category ON product.category_id = category.category_id
            LEFT JOIN img ON product.product_id = img.product_id
            LEFT JOIN brand ON product.brand_id = brand.brand_id
            WHERE discount > 0
            LIMIT :limit";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':limit', $limit2, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function allProduct($limit4) {
    $sql = "SELECT product.*, brand.name_br, img.img_url, category.name_cate
            FROM product 
            INNER JOIN category ON product.category_id = category.category_id
            LEFT JOIN img ON product.product_id = img.product_id
            LEFT JOIN brand ON product.brand_id = brand.brand_id
            LIMIT :limit";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':limit', $limit4, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function blog() {
    $sql = "SELECT * FROM blog ORDER BY updates DESC LIMIT 8";
    return pdo_query($sql);
}

function totalRate() {
    $sql = "SELECT * FROM comment";
    return pdo_query($sql);
}

function rate() {
    $sql = "SELECT comment.*, users.username, users.avatar
            FROM comment 
            INNER JOIN users ON comment.user_id = users.user_id
            ORDER BY comment_id 
            DESC
            LIMIT 4";
    return pdo_query($sql);
}
?>