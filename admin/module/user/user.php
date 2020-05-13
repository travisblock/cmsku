<?php
if(isset($_GET['tipe'])){
	if($_GET['tipe']=='tambah'){
		echo "
		<h3>Tambah Data User</h3>
		<form method='post' action='module/user/proses_tambah.php'>
		<label>User Login </label>
		<input type='text' name='username' size='40' placeholder='username' /><br/>
		<label>&nbsp;</label>
		<label>Password </label>
		<input type='text' name='password' size='40' value='' placeholder='password' /><br/>
		<label>&nbsp;</label>
		<label>Nama user</label>
		<input type='text' name='nama_lengkap' size='40' placeholder='Nama Lengkap' /><br/>
		<label>&nbsp;</label>

		<input type='submit' value='Simpan' /><input type='button' value='Batal'  onClick='history.back();' />
		</form>";
	}elseif($_GET['tipe']=='edit'){
		$sql=mysql_query("select * from user where id='$_GET[id]'");
		$de=mysql_fetch_array($sql);
		echo "
		<h3>Edit Data User</h3>
		<form method='post' action='module/user/proses_edit.php'>
		<input type='hidden' name='id' value='$de[id]' />
		<label>Nama user</label>
		<input type='text' name='username' size='40' value='$de[username]' /><br/>
		<label>&nbsp;</label>
		<label>Password</label>
		<input type='text' name='password' size='40' value='' placeholder='password' /><br/>
		<label>&nbsp;</label>
		<input type='submit' value='Update' /><input type='button' value='Batal'  onClick='history.back();' />
		</form>";
	}
}else{
?>
	<h3>Manajemen user</h3>
	<br><a href="?m=user&tipe=tambah">+ Tambah Data</a><br>
	<table style="border:2px solid #464646;" width="100%" cellspacing="0">
	<tr>
	<th style="text-align:center;">No.</th>
	<th style="text-align:center;">Nama user</th>
	<th style="text-align:center;">Aksi</th>
	</tr>
	<?php
	$sql=mysql_query("select * from user order by id ASC");
	$no=1;
	while($k=mysql_fetch_array($sql)){
		echo "
			<tr>
			<td align='center'>$no</td>
			<td>$k[username]</td>
			<td align='center'>
				<a href='?m=user&tipe=edit&id=$k[id]'>Edit</a>
				<a href='module/user/proses_hapus.php?id=$k[id]' onClick='return confirm(\"Anda Yakin Akan Menghafus?\")'>Hapus</a>
		";
		$no++;
	} 

	?>
<?php
}
?>