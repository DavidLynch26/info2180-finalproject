<?php include "generateSession.php";?>

<form id = "loginForm" action="verifyUser.php" method="POST">
<h1>LOGIN</h1>
    <input type="text" id = "username" name="username" placeholder="User Name"><br>
    <input type="password" id = "password" name="password" placeholder="Password">
    <br><br>
    <button type = "button" id = "loginButton">Login</button>
</form>