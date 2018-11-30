<?php
session_start();
include "../../../inc/config.php";
if(!empty($_POST['judul'])){
	//proses simpan
	$tgl = date("Y-m-d");
	$iduser = $_SESSION['id'];
	mysql_query("INSERT INTO berita (id_kategori,judul,isi,tgl,id_user) values ('$_POST[kategori]','$_POST[judul]','$_POST[isi]','$tgl','$iduser')");

	header('location:../../home.php?m=berita');
} else{
	header('location:../../home.php?m=berita');
}
?>