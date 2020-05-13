<?php
//variabel
$host		= "localhost";
$user		= "root";
$password 	= "root";
$db_name 	= "db_mycms";

$con 		= mysqli_connect($host, $user, $password, $db_name);
if(!$con) die(mysqli_connect_error());
?>