<?php
//! Connect database
require_once 'model/connectdb.php';
// show header
// $sitemap = '';
// $actived = '';
// if (isset($_GET['page'])) {
//     switch ($_GET['page']) {
//         case 'about':
//             $sitemap = 'About us';
//             $actived = 'about';
//             break;
//         case 'blog':
//             $sitemap = 'Blog';
//             $actived = 'blog';
//             break;
//         case 'contact':
//             $sitemap = 'Contact us';
//             $actived = 'contact';
//             break;
//         case 'specials':
//             $sitemap = 'Special Product';
//             $actived = 'specials';
//             break;
//         case 'new-product':
//             $sitemap = 'New product';
//             $actived = 'new-product';
//             break;     
//         case 'products':
//             $sitemap = 'All Product';
//             $actived = 'products';
//             break;
//         default:
//             $actived = '';
//             break;
//     }
//     include '../DU_AN_1/view/blocks/header-detail.php';
// } else {
//     include '../DU_AN_1/view/blocks/header.php';
// }

//! HEADER
include '../DU_AN_1/views/blocks/header.php';

//! CONTENT
if (!isset($_GET['page'])) {
    
    include '../DU_AN_1/controller/products.php';
    include '../DU_AN_1/views/pages/home.php';
} else {
    switch ($_GET['page']) {
        case 'Sign-In':
            include '../DU_AN_1/views/pages/users/signin.php';
            break;
        case 'Sign-Up':
            include '../DU_AN_1/views/pages/users/signup.php';
            break; 
        case 'Product':
            include '../DU_AN_1/controller/products.php';
            include '../DU_AN_1/views/pages/product/products.php';
            break;
        case 'Contact':
            include '../DU_AN_1/views/pages/contact.php';
            break;
        case 'Blog':
            include '../DU_AN_1/views/pages/blog.php';
            break;
        case 'About':
            include '../DU_AN_1/views/pages/about.php';
            break;
        case 'Products-Details':
            include '../DU_AN_1/views/pages/product/product-detail.php';
            break;  
        case 'Account':
            include '../DU_AN_1/views/pages/users/account.php';
            break;
        case 'ChangePassword':
            include '../DU_AN_1/views/pages/users/change-password.php';
            break;
        case 'Forgot-Password':
            include '../DU_AN_1/views/pages/users/forgot-password.php';  
            break;
        case 'Cart':
        include '../DU_AN_1/views/pages/cart.php';
            break;
        default:
            break;
    }
}

//! FOOTER
require_once '../DU_AN_1/views/blocks/footer.php';