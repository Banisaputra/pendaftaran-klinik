<?php
session_start();
include "../include/functions.php";

if (!isset($_SESSION["login"])) {
	header("Location: ../login.php");
	exit;
}

$id = $_GET["id"];

if( delete_jadwal($id) > 0 ) {
	echo "
			<script>
			alert('data berhasil dihapus!');
			document.location.href = 'jadwal.php';
			</script>
		";
	} else {
		echo "
			<script>
			alert('data gagal dihapus!');
			document.location.href = 'jadwal_delete.php?id=".$id."';
			</script>
		";
	}

?>