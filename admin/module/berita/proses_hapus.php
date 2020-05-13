<?php
include "../../../inc/config.php";
//Hapus
mysqli_query($con, "delete from berita where id='$_GET[id]'");
header('location:../../home.php?m=berita');
?>