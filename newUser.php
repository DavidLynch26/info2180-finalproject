<?php
    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])){
        $firstName = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_EMAIL);
        $password = password_hash(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
        $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
        
        include "setConnection.php";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $queryString = "INSERT INTO users (title, firstname, lastname, password, email, role, created_at)
        VALUES ('', '?', '?', '?', '?', '?', NOW())";
        $stmt = $conn->prepare($queryString);
        $stmt->execute([$firstName, $lastName, $password, $email, $role]);
        unset($conn);
    }
?>