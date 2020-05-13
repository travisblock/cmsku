<!doctype html>
<html>
<head>
	<title>Welcome Ajid</title>
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../assets/style.css" />
</head>
<body class="bodylogin">
<div class="loginbox">
	<?php
	include"../inc/config.php";
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$pass 	= md5($_POST['password']);
		$usr 	= $_POST['username'];
		$sqlcek = mysqli_query($con, "select * from user where username='$usr' AND password='$pass'");
		$jml	= mysqli_num_rows($sqlcek);
		$d 		= mysqli_fetch_array($sqlcek);

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
	<img src= "../images/ia.png" class="user" alt="textx">
	<h2>Login | MyCMS</h2>
	<form method="POST">
			<p class="textx">Username</p>
		<input type="text" name="username" placeholder="Username">
			<P class="textx">Password</p>
		<input type="password" name="password" placeholder="********">
		<input type="submit" value="Login">
	</form>
</div>
</body>
</html>
