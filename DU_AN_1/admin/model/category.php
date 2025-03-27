<?php
// Insert a new category
function danhmuc_insert($name_cate, $img_cate)
{
    $sql = "INSERT INTO category (name_cate, img_cate) VALUES (?, ?)";
    return pdo_execute($sql, $name_cate, $img_cate);
}

// Select a single category by ID
function danhmuc_selectone($category_id)
{
    $sql = "SELECT * FROM category WHERE category_id = ?";
    return pdo_query_one($sql, $category_id);
}

// Update category information
function danhmuc_update($category_id, $name_cate, $img_cate)
{
    if ($img_cate !== null) { // Check if $img_cate is not null
        $sql = "UPDATE category SET name_cate = ?, img_cate = ? WHERE category_id = ?";
        return pdo_execute($sql, $name_cate, $img_cate, $category_id);
    } else {
        $sql = "UPDATE category SET name_cate = ? WHERE category_id = ?";
        return pdo_execute($sql, $name_cate, $category_id);
    }
}

// Delete a category by ID
function danhmuc_delete($category_id)
{
    $sql = "DELETE FROM category WHERE category_id = ?";
    return pdo_execute($sql, $category_id);
}

// Select all categories with optional pagination
function danhmuc_selectall($start = 0, $limit = 0)
{
    $sql = "SELECT c.category_id, c.name_cate, c.img_cate, COUNT(p.product_id) AS total_products
            FROM category c 
            LEFT JOIN product p ON c.category_id = p.category_id 
            GROUP BY c.category_id, c.name_cate, c.img_cate
            ORDER BY c.category_id DESC";

    if ($limit != 0) {
        $sql .= " LIMIT " . $start . "," . $limit;
    }
    return pdo_query($sql);
}

// Search categories with optional pagination
function danhmuc_search($keyword, $start = 0, $limit = 0)
{
    $sql = "SELECT c.category_id, c.name_cate, c.img_cate, COUNT(p.product_id) AS total_products
            FROM category c
            LEFT JOIN product p ON c.category_id = p.category_id
            WHERE c.name_cate LIKE ?
            GROUP BY c.category_id, c.name_cate, c.img_cate
            ORDER BY c.category_id DESC";
    if ($limit != 0) {
        $sql .= " LIMIT ?, ?";
        return pdo_query($sql, ["%" . $keyword . "%", $start, $limit]);
    } else {
        return pdo_query($sql, ["%" . $keyword . "%"]);
    }
}

// Count total number of categories
function count_category()
{
    $sql = "SELECT COUNT(*) AS soluong FROM category";
    $result = pdo_query($sql);
    return $result[0]['soluong'] ?? 0; // Always return an integer
}
?>