<?php
require_once './model/products/product.php';

function productsController($action) {
   //! Show mục lục
   $brand = showBrand();
   $category_2 = showCate_2();
   
   //! Số lượng từng mục lục
   $categoryProductCounts = countProductsByCategory();
   $brandProductCounts = brandProductCounts();

   //! Lấy các giá trị lọc từ URL hoặc POST
   // $categoriesSelected = isset($_POST['categories']) ? $_POST['categories'] : [];
   $categoriesSelected = isset($_POST['categories']) && is_array($_POST['categories']) ? $_POST['categories'] : [];

   $brandsSelected = isset($_POST['brands']) ? $_POST['brands'] : [];
   $sortPrice = isset($_POST['sort_price']) ? $_POST['sort_price'] : '';
   $kyw = isset($_POST['kyw']) ? $_POST['kyw'] : '';
   $categoryId = isset($_GET['category_id']) ? $_GET['category_id'] : '';

   $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
   $start = ($page - 1) * 8;
   $limit = 8;
   
   $filteredProducts = filterProducts($categoryId, $categoriesSelected, $brandsSelected, $sortPrice, $start, $limit, $kyw);
   $totalProducts = countProductsByFilter($categoriesSelected, $brandsSelected);
   $totalPages = ceil($totalProducts / $limit);

   
   require_once './views/pages/product/products.php';
}
?>