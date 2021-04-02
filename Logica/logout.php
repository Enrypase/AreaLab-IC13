<?php
session_start();
include '../libs/util.php';
$_SESSION["username"] = '';
$_SESSION["id"] = '';
$currentPage=$_SESSION["currentPage"];
header("Location: ../{$currentPage}");
?>