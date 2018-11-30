<?php
include "../../../inc/config.php";
//Hapus
mysql_query("delete from kategori where id='$_GET[id]'");
header('location:../../home.php?m=kategori');
?>