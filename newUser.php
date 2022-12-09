<?php
    session_start();

    try{
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (!isset($_SESSION['csfrToken']) ||
                $_SESSION['csfrToken'] !== $_POST['csfrToken']){
                throw new Exception('CSRF attack');
            }
            if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role']) && isset($_POST['title'])){
                include "setConnection.php";
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                $queryString = "SELECT MAX(id) AS maxId FROM users";
                $stmt = $conn->query($queryString);
                $maxId = $stmt->fetch(PDO::FETCH_ASSOC)['maxId'];
        
                $queryString = "ALTER TABLE users AUTO_INCREMENT = $maxId";
                $conn->exec($queryString);
        
                $firstName = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
                $lastName = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                $password = password_hash(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
                $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
                $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);

                $queryString = "INSERT INTO users (title, firstname, lastname, password, email, role, created_at) 
                    VALUES (?, ?, ?, ?, ?, ?, NOW())";
                $stmt = $conn->prepare($queryString);
                $stmt->execute([$title, $firstName, $lastName, $password, $email, $role]);
                unset($conn);
            }
        }
    }catch(Exception $e){
        echo 'Message: ' . $e->getMessage();
    }
?>