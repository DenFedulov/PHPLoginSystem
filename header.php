<?php

declare(strict_types=1);
session_start();

include_once "inc/autoloader.inc.php";
$userView = new UsersView();
$userView->initSession();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/phpCallFuncs.js"></script>
</head>

<body>
    <h1>This is a login system</h1>
    <a href='./?page=home.php' onclick='return loadPHPOnClick(`bodies/home.php`);'>Home</a><br>
    <?php
    if (!isset($_SESSION['uid'])) {
        echo "<a href='./?page=login.php' onclick='return loadPHPOnClick(`bodies/login.php`);'>Login</a><br>";
        echo "<a href='./?page=register.php' onclick='return loadPHPOnClick(`bodies/register.php`);'>Register</a>";
    } else {
        echo "<a href='./?page=home.php' onclick='return loadPHPOnClick(`bodies/logout.php`, ``, ``);'>Log out</a>";
    }
    ?>
    <div class="log"></div>