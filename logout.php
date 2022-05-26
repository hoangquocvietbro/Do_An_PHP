<?php
include_once("./session/session.php");
unset($_SESSION['user']);
header('location: login.php');