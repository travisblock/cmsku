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

	}elseif($_GET['m']=='user'){
		include "module/user/user.php";

	}else{
		echo "<h3>Module Not Found</h3>";
	}
}else{
	echo"
	<h2>-- Selamat Datang $_SESSION[nama] --</h2>";
}

?>