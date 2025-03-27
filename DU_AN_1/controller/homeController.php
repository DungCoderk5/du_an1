<?php
require_once './model/home.php';

function homeController() {
    //! Thêm sản phẩm vào Cart
    if (isset($_POST['btn_addToCart'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = floatval($_POST['price']);
        $img = $_POST['img'];
        $saleoff = floatval($_POST['saleoff']);
        $discount = $_POST['discount'];
        $brand = $_POST['brand'];

        $item = array(
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'img' => $img,
            'saleoff' => $saleoff,
            'discount' => $discount,
            'brand' => $brand,
            'quantity' => 1
        );

        if (!isset($_SESSION['giohang'])) {
            $_SESSION['giohang'] = array();
        }

        $found = false;
        foreach ($_SESSION['giohang'] as &$cart_item) {
            if ($cart_item['id'] == $id) {
                $cart_item['quantity'] += 1;
                $found = true;
                break;
            }
        }

        if (!$found) {
            array_push($_SESSION['giohang'], $item);
        }

        header('Location: index.php');
        exit();
    }

    //! Xóa sản phẩm trong Cart
    if (isset($_POST['remove_item'])) {
        $id_to_remove = $_POST['id'];
        foreach ($_SESSION['giohang'] as $key => $item) {
            if ($item['id'] == $id_to_remove) {
                unset($_SESSION['giohang'][$key]);
                $_SESSION['giohang'] = array_values($_SESSION['giohang']);
                break;
            }
        }
        header('Location: index.php');
    }

    //! Show sản phẩm
    $limit = isset($_POST['limit']) ? intval($_POST['limit']) : 8;
    $limit2 = isset($_POST['limit2']) ? intval($_POST['limit2']) : 8;
    $limit3 = isset($_POST['limit3']) ? intval($_POST['limit3']) : 8;
    $limit4 = isset($_POST['limit4']) ? intval($_POST['limit4']) : 8;

    $newProduct = newProduct($limit);
    $saleProduct = saleProduct($limit2);
    $hotProduct = hotProduct($limit3);
    $allProduct = allProduct($limit4);
    $category = showCate();
    $blog = blog();
    $rate = rate();
    $totalRate = totalRate();

    require_once './views/pages/home.php';
}
?>