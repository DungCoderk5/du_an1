<?php 
    session_start();
    ob_start();
     
//! Connect database
require_once 'model/connectdb.php';
require_once 'model/users/sign.php';

//! HEADER
include './views/blocks/header.php';

//! CONTENT
$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? '';

if ($page == 'home') {
    include './controller/homeController.php';
    homeController();
} else {
    include './views/blocks/header-2.php';
    switch ($page) {
        case 'myaccount':
            include_once './views/pages/users/account.php';
            break;
        case 'Sign-In':
            if (isset($_POST['login'])) {
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $user = user_login($username,$password);
                echo var_dump($user);
                if (is_array($user)) {
                    $_SESSION['user'] = $user;
                    header( "location: index.php?page=myaccount");                   
                } else {
                    header( "location: index.php?page=Sign-In");
                }
            }
            include_once './views/pages/users/signin.php';
            break;
        case 'Sign-Up':
            if(isset($_POST['register'])){
                $username= $_POST['username'];
                $password= md5($_POST['password']);
                $phone= $_POST['phone'];
                user_insert($username, $password, $phone);               
                header("location: index.php?page=Sign-In");
            }
            include './views/pages/users/signup.php';
            break; 
            case 'logout':
                session_unset();
                session_destroy();
                header("Location: index.php?page=home");
                exit();
        case 'Product':
            include './controller/product/productController.php';
            productsController($action);
            break;
        case 'Contact':
            include './controller/contactController.php';
            contactController($action);
            break;
        case 'Blog':
            include './controller/blogController.php';
            blogController($action);
            break;
        case 'About':
            include './views/pages/about.php';
            break;
        case 'Detail':
            include './controller/product/detailController.php';
            break;        
        case 'Change-Password':
            include './controller/users/accountController.php';  
            break;
        case 'Forgot-Password':
            include './controller/users/accountController.php';             
            break;
        case 'Cart':
            include './controller/product/cartController.php';
            break;
        case 'Pay':
            include './controller/product/payController.php';
            payController($action);
            break;
        case 'Pay-Complete':
            include './controller/product/payCompleteController.php';
            pay_completeController($action);
            break;
            case 'Wishlist':
                include './views/pages/product/wishlist.php';
                break;
        default:
            break;
    }
}

//! FOOTER
require_once './views/blocks/footer.php';