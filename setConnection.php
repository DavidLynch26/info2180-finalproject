<?php
    $host = 'localhost';
    $email = 'admin@project2.com';
    $password = 'password123';
    $dbname = 'dolphin_crm';
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $email, $password);
?>