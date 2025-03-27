<?php
require_once './model/blog.php';
function  blogController($action) {

   $limit = isset($_POST['limit']) ? intval($_POST['limit']) : 8;
   $blog = blog_2($limit);
   
   require_once './views/pages/blog.php';
};
?>