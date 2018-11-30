<?php
if(isset($_GET['tipe'])){
	if($_GET['tipe']=='edit'){
		$sql=mysql_query("select * from halaman where id='$_GET[id]'");
		$de=mysql_fetch_array($sql);
		echo "
		<h3>Edit Data Halaman</h3>
		<form method='post' action='module/halaman/proses_edit.php'>
		<input type='hidden' name='id' value='$de[id]' />
		<table>
			<ul>
			<li><b>Judul Halaman</b></li>
			<input type='text' style='width: 500px; border:none; border-bottom:2px solid #464646; padding:10px;' name='judul' value='$de[judul]'/>
			</ul>

			<ul>
			<li><b>Isi</b></li>
			<li valign='top'><textarea name='isi' id='editor1'>$de[isi]</textarea></li>
			</ul>

			<ul>
			<li><input type='submit' value='Simpan' />
			<input type='button' value='Batal'  onClick='history.back();' /></li>
			</ul>
		</table>
		</form>";
	}
}else{
?>
	<h3>Manajemen halaman</h3>
	<table style="border:2px solid #464646;" width="100%" cellspacing="0">
	<tr>
	<th style="text-align:center;">No.</th>
	<th style="text-align:center;">Nama Halaman</th>
	<th style="text-align:center;">Aksi</th>
	</tr>
	<?php
	$sql=mysql_query("select * from halaman order by id asc");
	$no=1;
	while($k=mysql_fetch_array($sql)){
		echo "
			<tr>
			<td align='center'>$no</td>
			<td>$k[judul]</td>
			<td align='center'>
				<a href='?m=halaman&tipe=edit&id=$k[id]'>Edit</a>
				
		";
		$no++;
	} 

	?>
<?php
}
?>