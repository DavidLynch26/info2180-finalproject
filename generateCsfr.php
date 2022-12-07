<?php 
    $key = hash("sha512", microtime());
    $_SESSION['csfrToken'] = $key;
?>