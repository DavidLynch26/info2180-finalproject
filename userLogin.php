<?php 
    include "setConnection.php";

    if(isset($_POST['email']) and isset($_POST['password'])):
        $login = false;
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $passWord = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        $queryString = "SELECT * FROM users";

        $stmt = $conn->query($queryString);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $result):
            if($result['email'] == $email and password_verify($passWord, $result['password'])): 
                $login = true;
                if($result['role'] == "Member"){
                    echo json_encode([1, 0]);
                }elseif($result['role'] == "Admin"){
                    echo json_encode([1, 1]);
                }
                break;
            endif; 
        endforeach;
        if (!$login):
            echo json_encode([0,0]);
            endif;
        endif;
        unset($conn);?>