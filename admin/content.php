<html><head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head></html>
<?php
if(isset($_GET['m'])){
	if($_GET['m']=='kategori'){
		include "module/kategori/kategori.php";

	}elseif($_GET['m']=='berita'){
		include "module/berita/berita.php";

	}elseif($_GET['m']=='komentar'){
		include "module/komentar/komentar.php";

	}elseif($_GET['m']=='halaman'){
		include "module/halaman/halaman.php";

	}else{
		echo "<h3>Module Not Found</h3><p>Pilih Yang Lain Goblokk!</p>";
	}
}else{
	echo"<html>
	<head>
	<style>
	body{
		
		background-image:url('../images/wp.jpg');
		background-size:cover;
		background-repeat:no-repeat;
		background-attachment:fixed;
	}
	h4{
		color:gold;
		font-size:30px;
		padding:0px;
		margin-top:-10px
	}
	</style>
	</head>
	<h4><font color='#00c5fe'>[</font>Selamat Datang $_SESSION[nama]</font><font color='#00c5fe'>]</font></h4>
	</html>
		";
}

?>