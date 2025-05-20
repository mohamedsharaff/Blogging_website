<?php

session_start();

$_SESSION['session_username'] = null;
$_SESSION['session_user_role'] = null;

header('location:login.php')


?>