<?php
    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])){
        $firstName = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
        
        include "setConnection.php";

        $queryString = "INSERT INTO users (title, firstname, lastname, password, email, role, created_at)
        VALUES ('Mr', '?', '?', '?', '?', '?', NOW())";

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($queryString);
        $stmt->execute([$firstName, $lastName, $password, $email, $role]);
    }
?>