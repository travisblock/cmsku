<?php
include "../../../inc/config.php";
//Hapus
mysql_query("delete from komentar where id='$_GET[id]'");
header('location:../../home.php?m=komentar');
?>