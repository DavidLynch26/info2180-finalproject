<?php 
    include "setConnection.php";

    $stmt = $conn->query("SELECT * FROM users");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(count($results) < 1){
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("ALTER TABLE users AUTO_INCREMENT = 1");
        $admin = "INSERT INTO users (firstname, lastname, password, email, role, created_at)
                    VALUES ('admin', 'admin', 'Group1', 'admin@project2.com', 'ADMIN', NOW())";
        $conn->exec($admin);
    }
    $conn = null;
?>