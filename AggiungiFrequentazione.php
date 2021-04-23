<?php
session_start();
include './libs/util.php';
include './libs/db_connect.php';
$user= $_SESSION['username'];
$_SESSION["currentPage"] = "aggiungiFrequentazione.php";

include './pages/aggiungiFrequentazione.php';
?>