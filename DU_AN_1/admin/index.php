<?php
require_once 'views/blocks/aside.php';
require_once '../model/connectdb.php';
require_once '../model/products.php';

$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? '';

switch ($page) {
    case 'home':
        include 'controllers/homeController.php';
       
        break;
    case 'category':
        include 'controllers/categoryController.php';
    
        break;
    case 'product':
    include 'controllers/productController.php';

        break;
    case 'orders':
        include 'controllers/orderController.php';
    
        break;
    case 'customer':
        include 'controllers/customerController.php';
   
        break;
    case 'comment':
        include 'controllers/commentController.php';

       break;
    case 'blog':
        include 'controllers/blogController.php';
        
        break;
    case 'voucher':
        include 'controllers/voucherController.php';
       
        break;
    case 'statistics':
        include 'controllers/statisticsController.php';
        statisticsController();
        break;
    case 'goback':
        header("Location: ../index.php");
        break;
    case 'logout':
    default:
        include 'controllers/homeController.php';
       
        break;
}



?>