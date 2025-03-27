<?php
require_once './model/users/account.php';
function  forgotPasswordController($action) {
    
    require_once './views/pages/users/forgot-password.php';
};

function  changePasswordController($action) {
    
    require_once './views/pages/users/change-password.php';
};

function   accountController($action) {
    
    require_once './views/pages/users/account.php';
};
?>