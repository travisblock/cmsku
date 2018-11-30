<?php
include "../../../inc/config.php";
if(!empty($_POST['kategori'])){
	//proses simpan

	mysql_query("insert into kategori (nm_kategori) values ('$_POST[kategori]')");

	header('location:../../home.php?m=kategori');
} else{
	header('location:../../home.php?m=kategori');
}
?>