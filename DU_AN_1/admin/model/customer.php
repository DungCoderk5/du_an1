<?php 
function nguoidung_selectall($start = 0, $limit = 0){
    $sql = "SELECT * FROM users";
    if ($limit!= 0) {
            $sql .= " LIMIT ".$start.",".$limit;
    }
    return pdo_query($sql);
}
function nguoidung_insert($username, $email, $password, $address, $phone, $account_status = 1, $role) {
    // Mã hóa mật khẩu
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password, address, phone, account_status, role) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    return pdo_execute($sql, $username, $email, $hashed_password, $address, $phone, $account_status, $role);
}

function nguoidung_update($user_id, $username, $email, $password, $address, $phone, $role, $account_status) {
    $sql = "UPDATE users SET username = ?, email = ?, password = ?, address = ?, phone = ?, role = ?, account_status = ? WHERE user_id = ?";
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    return pdo_execute($sql, $username, $email, $hashed_password, $address, $phone, $role, $account_status, $user_id);
}

function nguoidung_hide($user_id) {
    $sql = "UPDATE users SET account_status = 0 WHERE user_id = ?";
    return pdo_execute($sql, $user_id);
}

function nguoidung_selectone($user_id) {
    $sql = "SELECT * FROM users WHERE user_id = ?";
    $result = pdo_query_one($sql, $user_id);
    return $result ? $result : false;
}
function count_users() {
    $sql = "SELECT COUNT(*) as total FROM users";  // Count the total number of users
    $result = pdo_query($sql);  // Execute the query
    return $result[0]['total'];  // Return the count of users
}


function nguoidung_search($keyword, $start = 0, $limit = 0) {
    $sql = "SELECT * FROM users WHERE username LIKE ? OR email LIKE ?";  // Search for users by username or email
    if ($limit > 0) {
        $sql .= " LIMIT ?, ?";  // Add pagination if limit is specified
        return pdo_query($sql, ["%" . $keyword . "%", "%" . $keyword . "%", $start, $limit]);
    } else {
        return pdo_query($sql, ["%" . $keyword . "%", "%" . $keyword . "%"]);  // Return all results if no pagination
    }
}


?>