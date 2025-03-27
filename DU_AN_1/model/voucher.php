<?php

// Chức năng lấy tất cả các dòng dữ liệu từ bảng voucher
function magiamgia_selectall($start = 0, $limit = 0)
{
    $sql = "SELECT * FROM voucher
    ORDER BY voucher.voucher_id DESC"; // Truy vấn lấy tất cả dữ liệu từ bảng voucher
    if ($limit != 0) {
        $sql .= " LIMIT " . $start . "," . $limit;
    }
    return pdo_query($sql); // Thực hiện truy vấn và trả về kết quả
}

// Chức năng thêm một voucher mới vào cơ sở dữ liệu
function voucher_insert($code, $discount, $expiration_date)
{
    // Chuẩn bị truy vấn SQL để chèn dữ liệu vào bảng voucher
    $sql = "INSERT INTO voucher (code, discount, expiration_date) VALUES (?, ?, ?)";
    // Sử dụng hàm pdo_execute để thực thi truy vấn
    return pdo_execute($sql, $code, $discount, $expiration_date);
}

// Chức năng cập nhật thông tin một voucher hiện có trong cơ sở dữ liệu
function voucher_update($voucher_id, $code, $discount, $expiration_date)
{
    // Chuẩn bị truy vấn SQL để cập nhật dữ liệu trong bảng voucher
    $sql = "UPDATE voucher SET code = ?, discount = ?, expiration_date = ? WHERE voucher_id = ?";


    // Sử dụng hàm pdo_execute để thực thi truy vấn
    return pdo_execute($sql, $code, $discount, $expiration_date, $voucher_id);
}

// Chức năng lấy thông tin chi tiết của một voucher dựa trên id của nó
function voucher_selectone($voucher_id)
{
    $sql = "SELECT * FROM voucher WHERE voucher_id = ?";

    $result = pdo_query_one($sql, $voucher_id);
    return $result ? $result : false;
}
// Chức năng xóa một voucher từ cơ sở dữ liệu
function voucher_delete($voucher_id)
{
    // Chuẩn bị truy vấn SQL để xóa voucher
    $sql = "DELETE FROM voucher WHERE voucher_id = ?";
    // Sử dụng hàm pdo_execute để thực thi truy vấn
    return pdo_execute($sql, $voucher_id);
}
function count_voucher() {
    $sql = "SELECT COUNT(*) as soluong FROM voucher";
     $result = pdo_query($sql);  // Trả về mảng chứa kết quả
    return $result[0]['soluong'];  // Trả về số lượng sản phẩm từ mảng
}
function voucher_search($keyword, $start = 0, $limit = 0) {
    $sql = "SELECT * FROM voucher 
            WHERE code LIKE ? OR voucher_id LIKE ? 
            ORDER BY voucher_id DESC";
    
    // Check if pagination limit is provided
    if ($limit != 0) {
        $sql .= " LIMIT ?, ?";
        return pdo_query($sql, ["%" . $keyword . "%", "%" . $keyword . "%", $start, $limit]);
    } else {
        return pdo_query($sql, ["%" . $keyword . "%", "%" . $keyword . "%"]);
    }
}


?>