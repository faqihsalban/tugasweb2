<?php


    $_SESSION['is_logged'] = FALSE;
    $_SESSION['role'] = '';
    $_SESSION['id_user'] = '';
    $_SESSION['createTransac'] = '';
    $login_result = FALSE;
    session_unset();
    session_destroy();
    header("location:index.php");
 ?>
