<?php
    session_start();

    try{
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_SESSION['csfrToken']) ||
                $_SESSION['csfrToken'] !== $_POST['csfrToken']){
                throw new Exception('CSRF attack');
            }
            if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['company']) && isset($_POST['tel']) && isset($_POST['title']) && isset($_POST['type'])){
                include "setConnection.php";
                
            }
        }
    }catch(Exception $e){
        echo 'Message: ' . $e->getMessage();
    }
?>