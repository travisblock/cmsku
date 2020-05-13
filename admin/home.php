<?php
session_start();
if(!isset($_SESSION['login'])){
	header('location:index.php');
}
include "../inc/config.php";
?>
<html>
<head>
	<title>Welcome Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="../assets/style.css" rel="stylesheet">
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="../assets/ckeditor/ckeditor.js"></script>
</head>
<body>
	<div class="container">
		<div class="header">
			<h1>MyCMS</h1>
		</div>

		<nav class="navbar navbar-custom">
	        <div class="container-fluid">
		        <div class="navbar-header">
		            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		              <span class="sr-only">Toggle navigation</span>
		              <span class="icon-bar"></span>
		              <span class="icon-bar"></span>
		              <span class="icon-bar"></span>
		            </button>
		        </div>

		        <div id="navbar" class="navbar-collapse collapse">
		            <ul class="nav navbar-nav">
			            <li><a href="home.php">Home</a></li>
						<li><a href="?m=kategori">Manajemen Kategori</a></li>
						<li><a href="?m=berita">Manajemen Post</a></li>
						<li><a href="?m=halaman">Manajemen Halaman</a></li>
						<li><a href="?m=komentar">Manajemen Komentar</a></li>
						<li><a href="?m=user">Manajemen User</a></li><br><br>
						<li><a href="logout.php" style='color:red'><b>KELUAR</b></a></li>
		            </ul>
				</div>
			</div>
		</nav>
		<td valign="top">
			<div class="content">
				<?php include "content.php"; ?>
			</div>
		</td>
	</div>

	<script>CKEDITOR.replace('editor1',{filebrowserImageBrowseUrl:'../assets/kcfinder'});</script>
	<script src="../assets/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/jquery.js"><\/script>')</script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>