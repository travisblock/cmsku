<?php
include "../../../inc/config.php";
mysqli_query($con, "delete from kategori where id='$_GET[id]'");
header('location:../../home.php?m=kategori');
?>