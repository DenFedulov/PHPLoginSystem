<?php
include_once "header.inc.php";

$userView->tryDeleteUser($_POST['username'], $_POST['password']);
