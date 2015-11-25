<?php


    $_SESSION['is_logged'] = FALSE;
    $_SESSION['id'] = '';
    $login_result = FALSE;
    session_unset();
    session_destroy();
    header("location:index.php");
 ?>
