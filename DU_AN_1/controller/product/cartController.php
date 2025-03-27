<?php
require_once './model/products/cart.php';

   if (isset($_GET['action'])) {
      switch ($_GET['action']) {
         case 'cart':
            if (isset($_GET['id'])) {
               $id = $_GET['id'];
               $cart = get_product($id);
               include_once './views/pages/product/cart.php';
            } else {
               header ('location: index.php');
            }
            break;
         default:
            break;
      }
   } else {
      header ('location: index.php');
   }
?>