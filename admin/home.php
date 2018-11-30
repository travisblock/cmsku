<?php
session_start();
if(!isset($_SESSION['login'])){
	header('location:index.php');
}
include "../inc/config.php";
?>
<html>
<head>
<script src="../assets/ckeditor/ckeditor.js"></script>
<title>WELcome Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>

<style>
body{
	
	font-family:Ubuntu;

}
th{
	background:#0078FF;
	color:#fff;
	border:1px solid #464646;

}
a{
	text-decoration:none;
	color:#0078FF;
	font-weight:bold;
}
a:hover{
	color:orange;
}
#header{
	
	background-color:#2e2e2e;
	border-radius:3px;
	padding:20px;
	margin-top:10px;
	margin-bottom:5px;

}

.content{
	margin-top:5px;
	padding:10px;
	
}
.content h3{
	padding-bottom:5px;
	display:block;
	font-family:calibri;
	margin-top:0px;
	border-bottom:3px solid #000;
	margin-bottom:8px;
	
}
.content form{
	border:1px solid #ebebeb;
	line-height:200%;
	padding:5px;
}
.content tr:hover{
	background:#939393;
}
.content ul li{
	list-style:none;
}
</style>
</head>
<body>
<div class="container">
<div id="header">
<img src="../images/header.png" class="img-responsive" width="300px" height="90px"> 
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
			<li><a href="?m=berita">Manajemen Berita</a></li>
			<li><a href="?m=halaman">Manajemen Halaman</a></li>
			<li><a href="?m=komentar">Manajemen Komentar</a></li>
			<li><a href="?m=pegawai">Manajemen User</a></li><br><br>
			<li><a href="logout.php" style='color:red'><b>KELUAR</b></a></li>
            </ul>

</div></div></nav>
	<td valign="top">
		<div class="content">
		<?php include "content.php"; ?>
		</div>
	</td>
</tr>
</div>
<script>CKEDITOR.replace('editor1',{filebrowserImageBrowseUrl:'../assets/kcfinder'});</script>
<script src="../assets/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/jquery.js"><\/script>')</script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>