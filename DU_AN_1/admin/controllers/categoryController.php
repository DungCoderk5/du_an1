<?php
require_once '../model/category.php';

if (isset($_GET['action']) && $_GET['action'] != "") {
    switch ($_GET['action']) {
        case 'adddanhmuc':
            if (isset($_POST['themdanhmuc'])) {
                // Process image upload
                $img = $_FILES['categoryImage']['name'];
                if ($img != "") {
                    move_uploaded_file($_FILES['categoryImage']['tmp_name'], "../public/upload/" . $img);
                } else {
                    $img = null; // No image uploaded
                }

                // Insert category into database
                danhmuc_insert($_POST['categoryName'], $img);

                // Redirect to category list page
                header('Location: index.php?page=category');
                exit();
            }

            // Get all categories (to display on add form)
            $category = danhmuc_selectall();
            require_once 'views/danh-muc/adddanhmuc.php';
            break;

        case 'update':
            if (isset($_POST['capnhatdanhmuc'])) {
                $category_id = $_POST['category_id'];
                $categoryName = $_POST['categoryName'];

                // Process image upload
                $img_cate = $_FILES['categoryImage']['name'];
                if ($img_cate != "") {
                    move_uploaded_file($_FILES['categoryImage']['tmp_name'], "../public/upload/" . $img_cate);
                } else {
                    $img_cate = null; // Do not update image
                }

                // Update category
                danhmuc_update($category_id, $categoryName, $img_cate);

                // Redirect to category list page
                header('Location: index.php?page=category');
                exit();
            }

            if (isset($_GET['maDanhMuc']) && is_numeric($_GET['maDanhMuc'])) {
                $danhmuc = danhmuc_selectone($_GET['maDanhMuc']);
            } else {
                header('Location: index.php?page=category'); // Redirect if invalid ID
                exit();
            }

            require_once 'views/danh-muc/editdanhmuc.php';
            break;

        case 'deletedanhmuc':
            if (isset($_GET['category_id']) && is_numeric($_GET['category_id'])) {
                $category_id = $_GET['category_id'];
                danhmuc_delete($category_id); // Delete category
                header("Location: index.php?page=category");
                exit();
            } else {
                echo "<p style='color: red;'>ID danh mục không hợp lệ!</p>";
            }
            break;

        case 'search':
         if (isset($_GET['action']) && $_GET['action'] == 'search') {
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
            if ($keyword) {
              $listdanhmuc = danhmuc_search($keyword);  // Perform the search query
            } else {
              $listdanhmuc = [];  // Empty result if no keyword is provided
           }
            require_once './views/danh-muc/danhmucsearch.php';  // Show search results
          } else {
            // Default case for displaying all products with pagination
            $page = isset($_GET['pagedm']) && is_numeric($_GET['pagedm']) ? (int) $_GET['pagedm'] : 1;
            $limit = 5;
            $start = ($page - 1) * $limit;
            $listdanhmuc= danhmuc_selectall($start, $limit);  // Display paginated products
            $soluongdm = count_category();
            $sotrang = ceil($soluongdm / $limit);// Calculate total number of pages
            require_once 'views/danh-muc/danhmuc.php';
          }
            break;
          
        default:
            $page = isset($_GET['pagedm']) && is_numeric($_GET['pagedm']) ? (int) $_GET['pagedm'] : 1;
            $limit = 5;
            $start = ($page - 1) * $limit;

            // Get category list with pagination
            $listdanhmuc = danhmuc_selectall($start, $limit);

            $soluongdm = count_category(); // Total categories
            $sotrang = ceil($soluongdm / $limit); // Calculate total number of pages
            require_once 'views/danh-muc/danhmuc.php';
            break;
    }
} else {
    $page = isset($_GET['pagedm']) && is_numeric($_GET['pagedm']) ? (int) $_GET['pagedm'] : 1;
    $limit = 5;
    $start = ($page - 1) * $limit;

    // Default category listing
    $listdanhmuc = danhmuc_selectall($start, $limit);

    $soluongdm = count_category(); // Count total categories
    $sotrang = ceil($soluongdm / $limit); // Total number of pages

    require_once 'views/danh-muc/danhmuc.php';
}
?>
