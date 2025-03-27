<?php
function comment_selectall($start = 0, $limit = 0) {
    $sql = "SELECT 
            comment.*, 
           users.username, 
            product.name_pro AS product_name 
        FROM 
            comment
        JOIN users ON comment.user_id = users.user_id  
        JOIN product ON comment.product_id = product.product_id 
        ORDER BY comment.comment_id DESC
    ";
     if ($limit!=0){
                $sql .= " LIMIT ".$start.",".$limit;
            }
    return pdo_query($sql);
}


function comment_selectone($comment_id)
{
    $sql = "SELECT 
            comment.*, 
            users.username, 
            product.name_pro AS product_name  
        FROM 
            comment
        JOIN users ON comment.user_id = users.user_id 
        JOIN product ON comment.product_id = product.product_id  
        WHERE comment.comment_id = ?
    ";
    return pdo_query_one($sql, $comment_id);
}
function comment_update( $status ,$product_id, $comment_id) {
if ($status == 0) {
    $sql = "UPDATE comment SET status = ? WHERE product_id = ? AND comment_id = ?";
        return pdo_execute($sql, 1, $product_id, $comment_id);
} elseif ($status == 1) {
    $sql = "UPDATE comment SET status = ? WHERE product_id = ? AND comment_id = ?";
        return pdo_execute($sql, 2, $product_id, $comment_id);
} elseif ($status == 2) {
    $sql = "UPDATE comment SET status = ? WHERE product_id = ? AND comment_id = ?";
        return pdo_execute($sql, 1, $product_id, $comment_id);
}
}

function comment_delete($comment_id) {
    $sql = "DELETE FROM comment WHERE comment_id = ?";
    return pdo_execute($sql, $comment_id);
}
function count_comment() {
    $sql = "SELECT COUNT(*) as soluong FROM comment";
     $result = pdo_query($sql);  // Trả về mảng chứa kết quả
    return $result[0]['soluong'];  // Trả về số lượng sản phẩm từ mảng
}
function comment_search($keyword, $start = 0, $limit = 0) {
    $sql = "SELECT 
                comment.*, 
                users.username, 
                product.name_pro AS product_name 
            FROM 
                comment
            JOIN users ON comment.user_id = users.user_id  
            JOIN product ON comment.product_id = product.product_id
            WHERE comment.content LIKE ? 
            ORDER BY comment.comment_id DESC";
    
    // Check if pagination is needed
    if ($limit != 0) {
        $sql .= " LIMIT ?, ?";
        return pdo_query($sql, ["%" . $keyword . "%", $start, $limit]);
    } else {
        return pdo_query($sql, ["%" . $keyword . "%"]);
    }
}
