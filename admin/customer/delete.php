<?php
require_once ('../../db/dbhelper.php');
require_once ('../../session/session.php');
if(!isset($_SESSION['user'])){
    header("location: ../../login.php");
}

if (isset($_GET['id'])) {
	$id       = $_GET['id'];
	$sql      = 'delete from customer where id = '.$id;
    execute($sql);

    header('Location: index.php');
    die();
}