<?php
include "../../../inc/config.php";
if(!empty($_POST['kategori'])){
	mysqli_query($con, "update kategori set nm_kategori='$_POST[kategori]' where id='$_POST[id]'");
	header('location:../../home.php?m=kategori');
}else{
	header('location:../../home.php?m=kategori');
}
?>