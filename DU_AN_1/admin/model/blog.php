<?php
function blog_selectall($start = 0, $limit = 0)
{
    $sql = "
       SELECT 
            blog.*, 
            users.username AS author_name
        FROM blog
        JOIN users ON blog.user_id = users.user_id
    ";
    if ($limit != 0) {
        $sql .= " LIMIT " . $start . "," . $limit;
    }
    return pdo_query($sql);
}
function blog_insert($title, $content, $author_id, $img)
{
    // Lấy thời gian hiện tại
    $create_at = date('Y-m-d H:i:s');  // Format thời gian (YYYY-MM-DD HH:MM:SS)

    // Thêm bài viết vào cơ sở dữ liệu
    $sql = "INSERT INTO blog (title, content, user_id, create_at, img) 
            VALUES (?, ?, ?, ?, ?)";
    pdo_execute($sql, $title, $content, $author_id, $create_at, $img);
}

// Model
function blog_update($blog_id, $title, $content, $author_id, $img)
{
    if ($img != "") {
        $sql = "UPDATE blog SET title = ?, content = ?, user_id = ?, img = ? WHERE blog_id = ?";
        echo $sql; // Kiểm tra câu SQL
        pdo_execute($sql, $title, $content, $author_id, $img, $blog_id);
    } else {
        $sql = "UPDATE blog SET title = ?, content = ?, user_id = ? WHERE blog_id = ?";
        echo $sql; // Kiểm tra câu SQL
        pdo_execute($sql, $title, $content, $author_id, $blog_id);
    }
}

function blog_selectone($id)
{
    $sql = "SELECT * FROM blog WHERE blog_id = ?";
    $result = pdo_query_one($sql, $id);
    if (!$result) {
        die("Không tìm thấy bài viết với ID: $id");
    }
    return $result;
}


function blog_delete($blog_id)
{
    // Chuẩn bị truy vấn SQL để xóa blog
    $sql = "DELETE FROM blog WHERE blog_id = ?";
    // Sử dụng hàm pdo_execute để thực thi truy vấn
    return pdo_execute($sql, $blog_id);
}
function count_blog() {
    $sql = "SELECT COUNT(*) as soluong FROM blog";
     $result = pdo_query($sql);  // Trả về mảng chứa kết quả
    return $result[0]['soluong'];  // Trả về số lượng sản phẩm từ mảng
}
function blog_search($keyword, $start = 0, $limit = 0) {
    $sql = "SELECT 
                blog.*, 
                users.username AS author_name 
            FROM blog
            JOIN users ON blog.user_id = users.user_id
            WHERE blog.title LIKE ? OR blog.content LIKE ?
            ORDER BY blog.blog_id DESC";
    
    // Check if pagination is needed
    if ($limit != 0) {
        $sql .= " LIMIT ?, ?";
        return pdo_query($sql, ["%" . $keyword . "%", "%" . $keyword . "%", $start, $limit]);
    } else {
        return pdo_query($sql, ["%" . $keyword . "%", "%" . $keyword . "%"]);
    }
}

?>