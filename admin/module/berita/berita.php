<?php
if(isset($_GET['tipe'])){
	if($_GET['tipe']=='tambah'){
		echo "
		<h3>Tambah Post</h3>
		<form method='POST' action='module/berita/proses_tambah.php'>
			<table>
				<ul>
					<li><b>Judul Berita</b></li>
					<input type='text' class='judul' name='judul'/>
				</ul>
				<ul>
					<li><b>Kategori</b></li>
					<li><select name='kategori'>";
					$sql=mysqli_query($con, "select * from kategori order by nm_kategori asc");
					while($k=mysqli_fetch_array($sql)){
						echo "<option value='$k[id]'>$k[nm_kategori]</option>";			}

					echo "
					</select>
					</li>
				</ul>
				<ul>
					<li valign='top'><textarea name='isi' id='editor1' ></textarea></li>
				</ul>
				<ul>
					<li valign='top'><input type='submit' value='Simpan' />&nbsp;
					<input type='button' value='Batal'  onClick='history.back();' /></li>
				</ul>
			</table>
		</form>";
	}elseif($_GET['tipe']=='edit'){
		$sql=mysqli_query($con, "select berita.*, kategori.nm_kategori, user.nama_lengkap from berita inner join kategori on 
		berita.id_kategori = kategori.id inner join user on berita.id_user = user.id where berita.id='$_GET[id]'");
		$de=mysqli_fetch_array($sql);
		echo "
		<h3>Edit Post</h3>
		<form method='post' action='module/berita/proses_edit.php'>
			<input type='hidden' name='id' value='$de[id]' />
			<table>
				<ul>
					<li><b>Edit Judul Post</b></li>
					<input type='text' class='judul' name='judul' value='$de[judul]'/>
				</ul>
				<ul>
					<li><b>Edit Kategori</b></li>
					<li><select name='kategori'>";
					$sql=mysqli_query($con, "select * from kategori order by nm_kategori ASC");
					while($k=mysqli_fetch_array($sql)){
						echo "<option value='$k[id]'>$k[nm_kategori]</option>
						";			}

					echo "
					</select>
					 Kategori Saat ini : <b>$de[nm_kategori]</b>
					</li>
				</ul>
				<ul>
					<li valign='top'><textarea name='isi' id='editor1'>$de[isi]</textarea></li>
				</ul>
				<ul>
					<li valign='top'><input type='submit' value='Update' />&nbsp;
					<input type='button' value='Batal'  onClick='history.back();' /></li>
				</ul>
			</table>
		</form>";
	}
}else{
?>
	<h3>Manajemen Post</h3>
	<br><a href="?m=berita&tipe=tambah">+ Tambah Data</a><br>
	<table style="border:2px solid #464646;" width="100%" cellspacing="0">
	<tr>
	<th style="text-align:center;">No.</th>
	<th style="text-align:center;">Judul berita</th>
	<th style="text-align:center;">Kategori</th>
	<th style="text-align:center;">Aksi</th>
	</tr>
	<?php
	$sql=mysqli_query($con, "select berita.*, kategori.nm_kategori, user.nama_lengkap from berita inner join kategori on berita.id_kategori = kategori.id inner join user on berita.id_user = user.id order by id DESC");
	$no=1;
	while($k=mysqli_fetch_array($sql)){
		echo "
			
			<tr>
			<td align='center'>$no</td>
			<td>$k[judul]</td>
			<td align='center'>$k[nm_kategori]</td>
			<td align='center'>
				<a href='?m=berita&tipe=edit&id=$k[id]'>Edit</a> | 
				<a href='module/berita/proses_hapus.php?id=$k[id]' onClick='return confirm(\"Anda Yakin Akan Menghafus?\")'>Hapus</a>
				
		";
		$no++;
	} 

	?>
<?php
}
?>