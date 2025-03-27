<?php

    function user_login($username,$password) {
        $sql = "SELECT * FROM users WHERE username = ? AND password= ?";
        return pdo_query_one($sql, $username,$password);
        //return $sql;
    }

    function user_insert($username, $password, $phone) {
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT); 
        $sql = "INSERT INTO users (username, password, phone) VALUES (?, ?, ?)";
        return pdo_execute($sql, $username, $password, $phone);
    }
    

?>