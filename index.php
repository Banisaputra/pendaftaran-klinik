<?php
session_start();
include 'include/functions.php';

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

header("Location: halaman/index.php");
?>