<?php
if(isset($_GET['tipe'])){
	if($_GET['tipe']=='tambah'){
		echo "
		<h3>Tambah Katrgori</h3>
		<form method='post' action='module/kategori/proses_tambah.php'>
			<label>Nama Kategori</label>
			<input type='text' name='kategori' size='40' /><br/>
			<label>&nbsp;</label>
			<input type='submit' value='Simpan' />&nbsp;
			<input type='button' value='Batal'  onClick='history.back();' />
		</form>";
	}elseif($_GET['tipe']=='edit'){
		$sql=mysqli_query($con, "select * from kategori where id='$_GET[id]'");
		$de=mysqli_fetch_array($sql);
		echo "
		<h3>Edit Katrgori</h3>
		<form method='post' action='module/kategori/proses_edit.php'>
			<input type='hidden' name='id' value='$de[id]' />
			<label>Nama Kategori</label>
			<input type='text' name='kategori' size='40' value='$de[nm_kategori]' /><br/>
			<label>&nbsp;</label>
			<input type='submit' value='Update' />&nbsp;
			<input type='button' value='Batal'  onClick='history.back();' />
		</form>";
	}
}else{
?>
	<h3>Manajemen Kategori</h3>
	<br><a href="?m=kategori&tipe=tambah">+ Tambah Kategori</a><br>
	<table style="border:2px solid #464646;" width="100%" cellspacing="0">
	<tr>
	<th style="text-align:center;">No.</th>
	<th style="text-align:center;">Nama Kategori</th>
	<th style="text-align:center;">Aksi</th>
	</tr>
	<?php
	$sql=mysqli_query($con, "select * from kategori order by id DESC");
	$no=1;
	while($k=mysqli_fetch_array($sql)){
		echo "
			<tr>
			<td align='center'>$no</td>
			<td align='center'>$k[nm_kategori]</td>
			<td align='center'>
				<a href='?m=kategori&tipe=edit&id=$k[id]'>Edit</a> | 
				<a href='module/kategori/proses_hapus.php?id=$k[id]' onClick='return confirm(\"Anda Yakin Akan Menghafus?\")'>Hapus</a>
		";
		$no++;
	} 

	?>
<?php
}
?>