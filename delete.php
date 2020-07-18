<?php
//MulaiSession
session_start();

include("koneksi.php");

if($_SESSION['akses'] == ""){
	header("location:index.php?pesan=belumLogin");
}

$id = $_GET['id'];
$result = mysqli_query($con, "DELETE FROM pemesanan WHERE id='$id' ");

echo "<script> alert('Data berhasil dihapus');window.location.href='dashboard.php'; </script>";
?>