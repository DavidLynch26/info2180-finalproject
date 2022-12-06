<?php include "generateSession.php";?>

<form id = "loginForm" action="verifyUser.php" method="POST">
<h1>LOGIN</h1>
    <input type="text" id = "email" name="email" placeholder="Email address"><br>
    <input type="password" id = "password" name="password" placeholder="Password"><br>
    <button type = "button" id = "loginButton"><img src="lockIcon.png" alt="Black lock icon"> Login</button>
</form>