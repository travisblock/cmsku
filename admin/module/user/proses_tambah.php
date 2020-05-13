<?php
include "../../../inc/config.php";
if(!empty($_POST['username'])){
	//proses simpan

	mysql_query("INSERT into user (username,password,nama_lengkap,email,level,aktif) values ('$_POST[username]',md5('$_POST[password]'),'$_POST[nama_lengkap]','cms@mail','administrator','Y')");

	header('location:../../home.php?m=user');
} else{
	header('location:../../home.php?m=user');
}
?>