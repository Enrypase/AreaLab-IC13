<?php
session_start();
include './libs/util.php';
include './libs/db_connect.php';
$user= $_SESSION['username'];
$id= $_SESSION['id'];
$_SESSION["currentPage"] = "homepage.php";

include './pages/homepage.php';
?>