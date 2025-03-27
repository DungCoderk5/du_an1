<?php
require_once './model/products/detail.php';
   if (isset($_GET['action'])) {
      switch ($_GET['action']) {
         case 'detail':
            if (isset($_GET['id'])) {
               $id = $_GET['id'];
               $detail = get_product($id);
               $detail2 = get_product2($id);
               include_once './views/pages/product/product-detail.php';
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