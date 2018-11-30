<?php
include "../../../inc/config.php";
if(!empty($_POST['judul'])){
	//proses update
	mysql_query("update berita set id_kategori='$_POST[kategori]',judul='$_POST[judul]',isi='$_POST[isi]'
		where id='$_POST[id]'");
	header('location:../../home.php?m=berita');
}else{
	header('location:../../home.php?m=berita');
}
?>