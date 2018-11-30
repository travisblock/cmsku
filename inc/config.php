<?php
//variabel
$host		= "sql205.unaux.com";
$user		= "unaux_22367612";
$password 	= "tnhn6cikzw";
$db_name 	= "unaux_22367612_db_cms";

mysql_connect($host, $user, $password) or die ("Koneksi Gagal");

mysql_select_db($db_name) or die ("Databas Not Fond");
?>