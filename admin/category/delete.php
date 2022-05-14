<?php
require_once ('../../db/dbhelper.php');

if (isset($_GET['id'])) {
	$id       = $_GET['id'];
	$sql      = 'delete from category where id = '.$id;
    execute($sql);

    header('Location: index.php');
    die();
}