<?php
session_start();
include './libs/util.php';
include './libs/db_connect.php';
$user= $_SESSION['username'];
$_SESSION["currentPage"] = "modificaCorso.php";

include './pages/modificaCorso.php';
?>