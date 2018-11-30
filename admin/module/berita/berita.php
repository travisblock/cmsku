<?php
if(isset($_GET['tipe'])){
	if($_GET['tipe']=='tambah'){
		echo "
		<h3>Tambah Data berita</h3>
		<form method='POST' action='module/berita/proses_tambah.php'>
		<table>
			<ul>
			<li><b>Judul Berita</b></li>
			<input type='text' style='width: 500px; border:none; border-bottom:2px solid #464646; padding:5px;' name='judul'/>
			</ul>

			<ul>
			<li><b>Kategori</b></li>
			<li><select name='kategori'>";
			$sql=mysql_query("select * from kategori order by nm_kategori asc");
			while($k=mysql_fetch_array($sql)){
				echo "<option value='$k[id]'>$k[nm_kategori]</option>";			}

			echo "
			</select>
			</li>
			</ul>

			<ul>
			<li><b>Isi</b></li>
			<li valign='top'><textarea name='isi' id='editor1' ></textarea></li>
			</ul>
			<ul>
			<li valign='top'><input type='submit' value='Simpan' /><input type='button' value='Batal'  onClick='history.back();' /></li>
			</ul>
		</table>
		</form>";
	}elseif($_GET['tipe']=='edit'){
		$sql=mysql_query("select berita.*, kategori.nm_kategori, user.nama_lengkap from berita inner join kategori on berita.id_kategori = kategori.id inner join user on berita.id_user = user.id where berita.id='$_GET[id]'");
		$de=mysql_fetch_array($sql);
		echo "
		<h3>Edit Data berita</h3>
		<form method='post' action='module/berita/proses_edit.php'>
		<input type='hidden' name='id' value='$de[id]' />
		<table>
			<ul>
			<li><b>Edit Judul Berita</b></li>
			<input type='text' style='width: 500px; border:none; border-bottom:2px solid #464646; padding:10px;' name='judul' value='$de[judul]'/>
			</ul>

			<ul>
			<li><b>Edit Kategori</b></li>
			<li><select name='kategori'>";
			$sql=mysql_query("select * from kategori order by nm_kategori ASC");
			while($k=mysql_fetch_array($sql)){
				echo "<option value='$k[id]'>$k[nm_kategori]</option>
				";			}

			echo "
			</select>
			 Kategori Saat ini :<b>$de[nm_kategori]</b>
			</li>
			</ul>

			<ul>
			<li><b>Edit Isi</b></li>
			<li valign='top'><textarea name='isi' id='editor1'>$de[isi]</textarea></li>

			</ul>
			<ul>
			<li valign='top'><input type='submit' value='Update' /><input type='button' value='Batal'  onClick='history.back();' /></li>
			</ul>
		</table>
		</form>";
	}
}else{
?>
	<h3>Manajemen berita</h3>
	<br><a href="?m=berita&tipe=tambah">+ Tambah Data</a><br>
	<table style="border:2px solid #464646;" width="100%" cellspacing="0">
	<tr>
	<th style="text-align:center;">No.</th>
	<th style="text-align:center;">Judul berita</th>
	<th style="text-align:center;">Kategori</th>
	<th style="text-align:center;">Aksi</th>
	</tr>
	<?php
	$sql=mysql_query("select berita.*, kategori.nm_kategori, user.nama_lengkap from berita inner join kategori on berita.id_kategori = kategori.id inner join user on berita.id_user = user.id order by id DESC");
	$no=1;
	while($k=mysql_fetch_array($sql)){
		echo "
			
			<tr>
			<td align='center'>$no</td>
			<td>$k[judul]</td>
			<td>$k[nm_kategori]</td>
			<td align='center'>
				<a href='?m=berita&tipe=edit&id=$k[id]'>Edit</a>
				<a href='module/berita/proses_hapus.php?id=$k[id]' onClick='return confirm(\"Anda Yakin Akan Menghafus?\")'>Hapus</a>
				
		";
		$no++;
	} 

	?>
<?php
}
?>