<?php 

//start sessions
session_start();

//if the session variable is not set, redirect to login.php
if (!isset ($_SESSION['login_user'])) {
    header('Location: login.php');
}

?>