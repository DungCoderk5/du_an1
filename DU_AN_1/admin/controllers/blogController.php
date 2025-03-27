<?php
require_once './model/blog.php';
require_once './model/customer.php';
require_once './model/category.php';

if (isset($_GET['action']) && ($_GET['action'] != "")) {
    switch ($_GET['action']) {
        case 'addblog':

            if (isset($_POST['themblog'])) {
                // Lấy dữ liệu từ form
                $title = $_POST['postTitle'];
                $content = $_POST['postContent'];
                $author_id = $_POST['postautho'];

                // Kiểm tra và xử lý ảnh nếu có
                // Kiểm tra và xử lý ảnh nếu có
                if (isset($_FILES['postImage']) && $_FILES['postImage']['error'] == 0) {
                    $img = $_FILES['postImage']['name'];
                    move_uploaded_file($_FILES['postImage']['tmp_name'], "../public/upload/" . $img);
                } else {
                    $img = null;  // Nếu không có ảnh, gán là null
                }

                // Thêm bài viết vào database
                blog_insert($title, $content, $author_id, $img);

                // Sau khi thêm xong, quay lại danh sách bài viết
                header('Location: index.php?page=blog');
            }
            $author_name = nguoidung_selectall();

            // Truyền dữ liệu vào view
            require_once './views/bai-viet/addblog.php';
            break;
        // Controller
        case 'updeteblog':
            if (isset($_POST['capnhatblog'])) {
                $blog_id = $_POST['postID'];
                $title = $_POST['postTitle'];
                $content = $_POST['postContent'];
                $author_id = $_POST['postautho'];

                // Kiểm tra nếu có hình ảnh mới
                if (isset($_FILES['postImage']) && $_FILES['postImage']['error'] == 0) {
                    $img = $_FILES['postImage']['name'];
                    move_uploaded_file($_FILES['postImage']['tmp_name'], "../public/upload/" . $img);
                } else {
                    $img = $blog['img']; // Giữ nguyên ảnh cũ nếu không có ảnh mới
                }


                // Cập nhật bài viết
                blog_update($blog_id, $title, $content, $author_id, $img);

                // Sau khi cập nhật, quay lại trang quản lý blog
                header('Location: index.php?page=blog');
            }

            // Lấy thông tin bài viết từ database để hiển thị trong form
            if (isset($_GET['blog_id']) && $_GET['blog_id'] > 0) {
                $blog_id = $_GET['blog_id']; // Lấy giá trị blog_id từ URL
                $blog = blog_selectone($blog_id); // Lấy thông tin bài viết

                if (!$blog) {
                    die("Bài viết không tồn tại!"); // Báo lỗi nếu không tìm thấy bài viết
                }

                $author_name = nguoidung_selectall(); // Lấy danh sách tác giả
            }



            require_once './views/bai-viet/updeteblog.php'; // Hiển thị form cập nhật
            break;

        case 'deleteblog':
            if (isset($_GET['blog_id']) && $_GET['blog_id'] > 0) {
                $blog_id = $_GET['blog_id'];
                // Gọi hàm voucher_delete để xóa voucher
                blog_delete($blog_id);
                // Sau khi xóa, chuyển hướng về trang danh sách voucher
                header('Location: index.php?page=blog');
            }
            break;
        case 'search':
            if (isset($_GET['action']) && $_GET['action'] == 'search') {
                $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
                if ($keyword) {
                    $blog= blog_search($keyword);  // Perform the search query
                } else {
                    $blog = [];  // Empty result if no keyword is provided
                }
                require_once './views/bai-viet/blog_search.php';  // Show search results
            } else {
                // Default case for displaying all products with pagination
                $page = isset($_GET['pagebl']) && is_numeric($_GET['pagebl']) ? (int) $_GET['pagebl'] : 1;
                $limit = 4;
                $start = ($page - 1) * $limit;
                $blog = blog_selectall($start, $limit);  // Display paginated products
                $soluongbl = count_blog();
                $sotrang = ceil($soluongbl / $limit);
                require_once './views/bai-viet/blog.php';  // Show product list view
            }
            break;
        default:

            // Lấy danh sách bài viết
            $page = isset($_GET['pagebl']) && is_numeric($_GET['pagebl']) ? (int) $_GET['pagebl'] : 1;
            $limit = 4;

            $start = ($page - 1) * $limit;
            $blog = blog_selectall($start, $limit);
            $soluongbl = count_blog();
            $sotrang = ceil($soluongbl / $limit);

            // Truyền dữ liệu vào view
            require_once './views/bai-viet/blog.php';
            break;

    }
} else {
    // Lấy danh sách bài viết
    $page = isset($_GET['pagebl']) && is_numeric($_GET['pagebl']) ? (int) $_GET['pagebl'] : 1;
    $limit = 4;

    $start = ($page - 1) * $limit;
    $blog = blog_selectall($start, $limit);
    $soluongbl = count_blog();
    $sotrang = ceil($soluongbl / $limit);

    // Truyền dữ liệu vào view
    require_once './views/bai-viet/blog.php';
}
?>