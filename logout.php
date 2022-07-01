<?php
include_once("./session/session.php");
unset($_SESSION['user']);
unset($_SESSION['customer']);
unset($_SESSION['cart']);
header('location: login.php');