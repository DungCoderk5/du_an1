<?php
function sanpham_selectall($start = 0, $limit = 0) {
    $sql = "SELECT 
                product.*, 
                category.category_id,   
                img.img_url,
                category.name_cate
            FROM    
                product 
            INNER JOIN category 
                ON product.category_id = category.category_id
            LEFT JOIN img 
                ON product.product_id = img.product_id
            ORDER BY product.product_id DESC";
            if ($limit!=0){
                $sql .= " LIMIT ".$start.",".$limit;
            }
    return pdo_query($sql);
}
function namecate($product_id){
$sql = "SELECT name_cate FROM category INNER JOIN product ON category.category_id = product.category_id WHERE product_id= $product_id";
return pdo_query($sql); 
} 
function sanpham_insert($name_pro, $price, $category_id, $quantity, $description_pro, $img) {
    // Corrected SQL query (removed the extra comma)
    $sql = "INSERT INTO product (name_pro, price, category_id, quantity, description_pro, img) VALUES (?, ?, ?, ?, ?, ?)";
    
    // Calling pdo_execute function to execute the query
    return pdo_execute($sql, $name_pro, $price, $category_id, $quantity, $description_pro, $img);
}

function sanpham_delete($product_id) {
    $sql = "DELETE FROM product WHERE product_id = ?";
    return pdo_execute($sql, $product_id);
}





function sanpham_selectone($product_id) {
    $sql = "SELECT * FROM product WHERE product_id = ?";
    $result = pdo_query_one($sql, $product_id);
    return $result ? $result : false;
}

function sanpham_update($product_id, $name_pro, $price, $quantity, $category_id, $description_pro,$img) {
    if($img!=""){
        $sql = "UPDATE product SET name_pro = ?, price = ?, quantity = ?, category_id = ?, description_pro = ?, img = ? WHERE product_id = ?";
        return pdo_execute($sql, $name_pro, $price, $quantity, $category_id, $description_pro, $img, $product_id);
    }else{
        $sql = "UPDATE product SET name_pro = ?, price = ?, quantity = ?, category_id = ?, description_pro = ? WHERE product_id = ?";
        return pdo_execute($sql, $name_pro, $price, $quantity, $category_id, $description_pro, $product_id);
    }
    
}

function count_products() {
    $sql = "SELECT COUNT(*) as soluong FROM product";
     $result = pdo_query($sql);  // Trả về mảng chứa kết quả
    return $result[0]['soluong'];  // Trả về số lượng sản phẩm từ mảng
}

function sanpham_search($keyword, $start = 0, $limit = 0) {
    $sql = "SELECT p.*, c.name_cate FROM product p
            LEFT JOIN category c ON p.category_id = c.category_id
            WHERE p.name_pro LIKE ? 
            ORDER BY p.product_id DESC";
    
    if ($limit != 0) {
        $sql .= " LIMIT ?, ?";
        return pdo_query($sql, ["%" . $keyword . "%", $start, $limit]);
    } else {
        return pdo_query($sql, ["%" . $keyword . "%"]);
    }
}
function sanphamimg_get(){
    $sql = "SELECT 
                product.*,  
                img.img_url
            FROM    
                product 
            INNER JOIN img 
                ON product.product_id = img.product_id
            ORDER BY product.product_id DESC";
    return pdo_query($sql);
}


 
