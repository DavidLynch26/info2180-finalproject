<?php 
    include "setConnection.php";

    $stmt = $conn->query("SELECT * FROM users");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(count($results) < 1){
        $hashedPass = password_hash("password123", PASSWORD_DEFAULT);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("ALTER TABLE users AUTO_INCREMENT = 1");
        $admin = "INSERT INTO users (firstname, lastname, password, email, role, created_at)
                    VALUES ('admin', 'admin', '$hashedPass', 'admin@project2.com', 'ADMIN', NOW())";
        $conn->exec($admin);
    }
    $conn = null;
?>