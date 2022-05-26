<?php
require_once ('../../db/dbhelper.php');

if (isset($_GET['id'])) {
	$id       = $_GET['id'];
	$sql      = 'delete from employee where id = '.$id;
    execute($sql);

    header('Location: index.php');
    die();
}