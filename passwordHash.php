<?php 
    $host = 'localhost';
    $email = 'admin@project2.com';
    $password = password_hash('password123', PASSWORD_DEFAULT);
    $dbname = 'dolpin_crm';
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $email, $password);

   $conn->query("INSERT INTO users VALUES (0, admin, admin, $password, $email, ADMIN, getdate()");
?>