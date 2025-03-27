<?php
function showCate_2() {
   $sql = "SELECT * FROM category";
   return pdo_query($sql);
}
function showBrand(){
   $sql = "SELECT * FROM brand";
   return pdo_query($sql);
};

function countProductsByCategory() {
    $sql = "SELECT category_id, COUNT(*) as product_count
            FROM product
            GROUP BY category_id";
    return pdo_query($sql);
}

function brandProductCounts() {
    $sql = "SELECT brand_id, COUNT(*) as product_count
            FROM product
            GROUP BY brand_id";
    return pdo_query($sql);
}

function filterProducts($categoryId, $categories, $brands, $sortPrice, $start = 0, $limit = 0, $kyw = '') {
    $sql = "SELECT product.*, brand.name_br, img.img_url, category.name_cate,
                   (product.price - (product.price * product.discount / 100)) AS saleoff
            FROM product
            INNER JOIN category ON product.category_id = category.category_id
            LEFT JOIN img ON product.product_id = img.product_id
            LEFT JOIN brand ON product.brand_id = brand.brand_id";
    
    if ($categoryId > 0) {
        $sql .= " WHERE product.category_id = " . $categoryId;
    } elseif (!empty($categoryId) && !in_array('all', $categoryId)) {
        $sql .= " WHERE product.category_id IN (" . implode(",", $categoryId) . ")";
    }
    
    // Filter by category if not 'all'
    if (!empty($categories) && !in_array('all', $categories)) {
        $sql .= " WHERE product.category_id IN (" . implode(",", $categories) . ")";
    }

    // Filter by brand
    if (!empty($brands)) {
        $sql .= empty($categories) ? " WHERE product.brand_id IN (" . implode(",", $brands) . ")" : 
            " AND product.brand_id IN (" . implode(",", $brands) . ")";
    }

    // Filter by keyword (product name)
    if (!empty($kyw)) {
        $sql .= (empty($categories) && empty($brands)) ? " WHERE product.name_pro LIKE '%" . $kyw . "%'" :
            " AND product.name_pro LIKE '%" . $kyw . "%'";
    }

    // Sort price if specified
    if ($sortPrice == 'asc') {
        $sql .= " ORDER BY saleoff ASC";
    } elseif ($sortPrice == 'desc') {
        $sql .= " ORDER BY saleoff DESC";
    }

    // Pagination (limit)
    if ($limit > 0) {
        $sql .= " LIMIT " . $start . ", " . $limit;
    }

    return pdo_query($sql);
}


function countProductsByFilter($categories, $brands) {
    
    if (is_string($categories)) {
        $categories = explode(',', $categories);
    }
    
    $sql = "SELECT COUNT(*) as total
            FROM product
            INNER JOIN category ON product.category_id = category.category_id
            LEFT JOIN img ON product.product_id = img.product_id
            LEFT JOIN brand ON product.brand_id = brand.brand_id";
    
    if (!empty($categories) && !in_array('all', $categories)) {
        $sql .= " WHERE product.category_id IN (" . implode(",", $categories) . ")";
    }

    if (!empty($brands)) {
        if (!empty($categories) || in_array('all', $categories)) {
            $sql .= " AND product.brand_id IN (" . implode(",", $brands) . ")";
        } else {
            $sql .= " WHERE product.brand_id IN (" . implode(",", $brands) . ")";
        }
    }

    $result = pdo_query($sql);
    return $result[0]['total'];
}
?>