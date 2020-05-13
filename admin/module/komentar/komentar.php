	<h3>Manajemen Kategori</h3>
	<br><br>
	<table style="border:2px solid #464646;" width="100%" cellspacing="0">
	<tr>
	<th style="text-align:center;">No.</th>
	<th style="text-align:center;">Nama</th>
	<th style="text-align:center;">Komentar</th>
	<th style="text-align:center;">Berita</th>
	<th style="text-align:center;">Aksi</th>
	</tr>
	<?php
	$sql=mysql_query("select komentar.*, berita.judul from komentar inner join berita on komentar.id_berita = berita.id order by komentar.id DESC");
	$no=1;
	while($k=mysql_fetch_array($sql)){
		echo "
			<tr>
			<td align='center'>$no</td>
			<td>$k[nama]</td>
			<td>$k[komentar]</td>
			<td><a href='http://localhost/ajd_cms/?hal=berita&id=$k[id_berita]' target='_blank'>$k[id_berita]</a></td>
			<td align='center'>
				<a href='module/komentar/proses_hapus.php?id=$k[id]' onClick='return confirm(\"Anda Yakin Akan Menghafus?\")'>Hapus</a>
		";
		$no++;
	} 

	?>

