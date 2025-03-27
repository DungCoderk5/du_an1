<?php
require_once '../model/products.php';

// $product = new Products();
// $products = $product->getProducts();
// Dùng cho thêm sửa 
function pdo_execute($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return true;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    } finally {
        $conn = null;
    }
}
