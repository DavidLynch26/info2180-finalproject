<?php 
    include "setConnection.php";

    if(isset($_POST['username']) and isset($_POST['password'])):
        $login = false;
        $userName = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
        $passWord = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        $queryString = "SELECT * FROM users";

        $stmt = $conn->query($queryString);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $result):
            if($result['email'] == $userName and password_verify($passWord, $result['password'])): 
                $login = true;?>
                <p>Successfull Login</p>
                <?php break;
            endif; 
        endforeach; 
        if(!$login): ?>
            <p>Unsuccessful Login</p>
        <?php endif;
    endif;
    $conn = null;?>