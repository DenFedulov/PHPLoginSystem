<?php
include_once "header.inc.php";

$userView->tryUpdateUserPassword($_POST['username'], $_POST['passwordO'], $_POST['passwordN']);
