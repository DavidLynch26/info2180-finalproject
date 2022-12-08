<?php
    session_start();

    try{
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!isset($_SESSION['csfrToken']) ||
                $_SESSION['csfrToken'] !== $_POST['csfrToken']){
                throw new Exception('CSRF attack');
            }
            if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['company']) && isset($_POST['tel']) && isset($_POST['title']) && isset($_POST['type']) && isset($_POST['assignedTo'])){
                include "setConnection.php";

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $queryString = "SELECT MAX(id) AS maxId FROM contacts";
                $stmt = $conn->query($queryString);
                $maxId = $stmt->fetch(PDO::FETCH_ASSOC)['maxId'];

                if(!isset($maxId)){
                    $conn->exec("ALTER TABLE contacts AUTO_INCREMENT = 1");
                }

                $firstName = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
                echo "$firstName";
                $lastName = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
                echo "$lastName";
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                echo "$email";
                $company = filter_input(INPUT_POST, 'company', FILTER_SANITIZE_STRING);
                echo "$company";
                $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
                echo "$tel";
                $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
                echo "$type";
                $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
                echo "$type";
                $assignedTo = filter_input(INPUT_POST, 'assignedTo', FILTER_SANITIZE_STRING);
                echo "$assignedTo";
                $createdBy = $_SESSION['id'];
                echo "$createdBy";

                $queryString = "INSERT INTO contacts (title, firstname, lastname, email, telephone, company, type, assigned_to, created_by, created_at, updated_at) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
                $stmt = $conn->prepare($queryString);
                $stmt->execute([$title, $firstName, $lastName, $email, $tel, $company, $type, $assignedTo, $createdBy]);
                unset($conn);
            }
        }
    }catch(Exception $e){
        echo 'Message: ' . $e->getMessage();
    }
?>