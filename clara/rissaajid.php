<!doctype html>
<html>
	<head>
	<title>Welcome Ajid</title>
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
body
{
	
	background-image: url(../images/s.png);
	background-size: cover;
	background-repeat:no-repeat;
	background-attachment:fixed;
	font-family: Ubuntu;
} 

.loginbox
{
position: absolute;
top: 50%;
left: 50%; 
transform: translate(-50%, -50%);
width: 360px;
height: 420px;
padding: 40px 40px;
box-sizing: border-box;
background:rgba(0, 5, 5, .5);
}


.user
{
width: 100px;
height:100px;
position: absolute;
margin-top:-100px;
margin-left:90px;

}

h2
{
padding: 0 0 30px;
color: #efed40;
text-align: center;
}

.loginbox input
{
width: 100%;
margin-bottom: 20px;
}

form
{
color: black;
}

.loginbox input[type="text"],
.loginbox input[type="password"]
{
border: none;
border-bottom: 2px solid gold;
background: transparent;
color:white;
}
.loginbox input[type="submit"]
{

border: none;
outline: none;
height: 30px;
width: 200px;
color: black;
font-size: 16px;
background: #efed40;
cursor: pointer;
border-radius: 100px;
margin-left: 30px;
}
.loginbox input[type="submit"]:hover
{
background: yellow;
color: black;
}
.loginbox a
{
color:gold;
text-decoration: none;
}
.ajid{
color:white;
font-size:15px;
}
.login_msg{
	color:blue;

}
</style>
</head>
<body>
<div class="loginbox">
<div class="login_msg">
	<?php
	include"../inc/config.php";
	function antiinjection($data){
		$filter=mysql_real_escape_string(htmlspecialchars(stripslashes(strip_tags($data,ENT_QUOTES))));
		return $filter;
	} 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$pass= antiinjection(md5($_POST['password']));
		$usr = antiinjection($_POST['username']);
		$sqlcek=mysql_query("select * from user where username='$usr' AND password='$pass' AND aktif='Y'");
		$jml=mysql_num_rows($sqlcek);
		$d=mysql_fetch_array($sqlcek);

		if($jml > 0) {
			session_start();
			$_SESSION['login']			= TRUE;
			$_SESSION['username']		= $d['username'];
			$_SESSION['id']				= $d['id'];
			$_SESSION['nama']			= $d['nama_lengkap'];
			$_SESSION['upload_gbr']		= TRUE;

			header('location:home.php');
		}else{
			echo "Gagal";
		}
	}
	?>
</div>
<img src= "../images/ia.png" class="user" alt="ajid">
<h2>Login | Ajid-CMS</h2>
<form method="post">
<p class="ajid">Username</p>
<input type="text" name="username" placeholder="YusufAl_Majid">
<P class="ajid">Password</p>
<input type="password" name="password" placeholder="********">
<input type="submit"  name="" value="Gass !!!">
</P></form>
</div>
</body>
</html>
