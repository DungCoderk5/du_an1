<?php
function pdo_get_connection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=shopduan", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Kết nối thất bại: " . $e->getMessage();
    }
}

// Dùng cho thêm sửa 
function pdo_execute($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $stmt->rowCount(); // Trả về số dòng bị ảnh hưởng
    } catch (PDOException $e) {
        error_log("PDO Error: " . $e->getMessage(), 3, 'error_log.txt'); // Ghi log lỗi
        return false;
    } finally {
        $conn = null; // Đóng kết nối
    }
}


// Lấy tất cả dữ liệu

function pdo_query($sql, $params = []) {
    $pdo = pdo_get_connection();
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Lỗi truy vấn: " . $e->getMessage());
    }
}


// Lấy một sản phẩm
function pdo_query_one($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch(PDOException $e) {
        throw $e;
    } finally {
        $conn = null;
    }
}