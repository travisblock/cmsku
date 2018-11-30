
<?php
function quote($value){
	if(get_magic_quotes_gpc()){
		$value = stripslashes($value);
	}
	if(!is_numeric($value)){
		$value = "".mysql_real_escape_string($value)."";
	}
	return $value;
}

if(isset($_GET['id'])){

	//tampilkan detail berita
	$sqlbrt = mysql_query("select berita.*, kategori.nm_kategori, user.nama_lengkap from berita inner join kategori on berita.id_kategori = kategori.id inner join user on berita.id_user = user.id where berita.id='$_GET[id]'");
    $brt = mysql_fetch_array($sqlbrt);
      	?>

    <div class="panel panel-custom">
	    <div class="panel panel-heading">
	      	<h1 class="panel-title"><?php echo $brt['judul']; ?></h1>
	    </div>

	    <div class="panel-body">
	      	<?php echo $brt['isi']; ?>
	    </div>

      	<div class="panel-footer">
		      <span>By : <b><?php echo $brt['nama_lengkap']; ?></b></span>
		      <span class="pull-right">Pada : <?php echo $brt['tgl']; ?></span>
      	</div>
    </div>
<!--Panel Tampil Komentar -->
	<div class="panel panel-info">
      	<div class="panel panel-heading">
      		<h3 class="panel-title">Semua Komentar</h3>
      	</div>
      	<div class="panel panel-body">
      	<ul class="media-list">
      	<?php
      	 $sqlkomen = mysql_query("select * from komentar where id_berita='$brt[id]' order by id DESC");
		    while($k=mysql_fetch_array($sqlkomen)){
      	?>
      		<li class="media" style="border-bottom:1px solid #ebebeb;">
      		<div class="media-body">
      			<h4><a href="mailto:<?php echo $k['email']; ?>"><?php echo $k['nama']; ?></a></h4>
      			<div style="font-size:20px;"><?php echo $k['komentar']; ?></div>
      			<p><p><div style="font-size:11px; color:#A8A8A8;"><?php echo $k['tgl']; ?></div></p></p>
      		</div>
      		</li>
      		
      	<?php
      	}
      	?>
      	</ul>
      	</div>
    </div>
<!--AKHIR Panel Tampil Komentar -->

<!--Panel Komentarr -->
    <div class="panel panel-custom">
      	<div class="panel panel-heading">
      		<h3 class="panel-title">Tinggalkan Komentar</h3>
      	</div>
      	<div class="panel panel-body">
      		<form method="post" action="simpan_komentar.php">
      		<input type="hidden" name="idberita" value="<?php echo $brt['id']; ?>">
      		<div class="form-group">
      			<label>Nama Anda:</label>
      			<input type="text" required="required" name="nama" class="form-control">
      		</div>
      		<div class="form-group">
      			<label>Email Anda:</label>
      			<input type="email" required="required" name="email" class="form-control">
      		</div>
      		<div class="form-group">
      			<label>Isi Komentar:</label>
      			<textarea class="form-control" required="required" style="height:100px;" name="isi"></textarea>
      		</div>
      		<div class="form-group">
      			<input type="submit" name="simpan" class="btn btn-custom" value="Kirim Komentar">
      		</div>
      		</form>
      		</div>
    </div>

<!--AKHIR Panel Komentarr -->
<?php
}elseif(isset($_GET['ktg'])){

	//tampilkan berita berdasarkan kategori
	$sqlktg = mysql_query("select * from kategori where id='$_GET[ktg]'");
	$ktg = mysql_fetch_array($sqlktg);
?>
	<div class="panel panel-custom">
	    <div class="panel panel-heading">
	     	<h3 class="panel-title">Berita <b><?php echo $ktg['nm_kategori'] ?></b></h3>
	    </div>

	    <div class="panel-body">	      
	      	<ul><?php
			      $sqlbrt = mysql_query("select * from berita where id_kategori='$_GET[ktg]' order by id DESC");
			      while($brt = mysql_fetch_array($sqlbrt)){
			      echo "
			      <li>
			      		<a href='./?hal=berita&id=$brt[id]'>$brt[judul]</a>
			      </li>";}
?>
			</ul>
	    </div>
	</div>     

<?php

}else{

	//tampilkan semua berita
?>
	<div class="panel panel-custom">
	    <div class="panel panel-heading">
	      <h3 class="panel-title">Berita Terkini</h3>
	    </div>

	    <div class="panel-body">	      
	      	<ul><?php
			      $sqlbrt = mysql_query("select * from berita order by id DESC");
			      while($brt = mysql_fetch_array($sqlbrt)){
			      	echo "<li>
			      	<a href='./?hal=berita&id=$brt[id]'>$brt[judul]</a>

			      	</li>
			      	";

			      }
?>
	      	</ul>
	    </div>
	</div>     

	<?php
}
?>