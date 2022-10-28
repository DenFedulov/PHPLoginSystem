<?php
include_once "header.inc.php";

$userView->tryRegisterUser($_POST['email'], $_POST['username'], $_POST['password'], $_POST['passwordRepeat']);
