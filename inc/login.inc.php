<?php
include_once "header.inc.php";

$userView->tryLoginUser($_POST['username'], $_POST['password']);
