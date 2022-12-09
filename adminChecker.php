<?php 
    include "setConnection.php";

    $stmt = $conn->query("SELECT * FROM users");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(count($results) < 1){
        $hashedPass = password_hash("password123", PASSWORD_DEFAULT);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("ALTER TABLE users AUTO_INCREMENT = 1");
        $admin = "INSERT INTO users (title, firstname, lastname, password, email, role, created_at)
                VALUES ('Mr.', 'Admin', 'Project', '$hashedPass', 'admin@project2.com', 'Admin', NOW())";
        $conn->exec($admin);
    }
    unset($conn);
?>