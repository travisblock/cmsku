<?php
include "../../../inc/config.php";
if(!empty($_POST['judul'])){
	//proses update
	mysql_query("update halaman set judul='$_POST[judul]',isi='$_POST[isi]'
		where id='$_POST[id]'");
	header('location:../../home.php?m=halaman');
}else{
	header('location:../../home.php?m=halaman');
}
?>