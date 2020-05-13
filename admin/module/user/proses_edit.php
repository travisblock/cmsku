<?php
include "../../../inc/config.php";
if(!empty($_POST['username'])){
	//proses update
	mysql_query("update user set username='$_POST[username]', password=md5('$_POST[password]') where id='$_POST[id]'");
	header('location:../../home.php?m=user');

}else{
	header('location:../../home.php?m=user');
}
?>