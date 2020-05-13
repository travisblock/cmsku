<?php
include "./inc/config.php";

$tgl = date("Y-m-d");
$idb = $_POST['idberita'];

$simpan = mysql_query("INSERT INTO komentar(nama,email,komentar,tgl,id_berita)
						VALUES('$_POST[nama]',
						'$_POST[email]',
						'$_POST[isi]',
						'$tgl',
						'$idb')");

if($simpan){
	header("location:./?hal=berita&id=$idb");
}

?>