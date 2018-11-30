<?php 
include "inc/config.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Index Attacker">
    <link rel="icon" href="images/ia.png">

    <title>Index Attacker</title>

    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
    <div id="header">
    <img src="images/header.png" class="img-responsive" width="300" height="90">
   
    </div>

      <!-- Static navbar -->
      <nav class="navbar navbar-custom">
        <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="./">Home</a></li>
              <li><a href="./?hal=profile">Profile</a></li>
              <li><a href="./?hal=berita">Berita</a></li>
              <li><a href="#">Tutorial</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Layanan <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="./?hal=layanan-pembuatan-web">Pembuatan Web</a></li>
                  <li><a href="#">Pembuatan program</a></li>
                  <li><a href="#">Pembuatan Facebook</a></li>
                </ul>
              </li>
            </ul>
	            
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

      <!-- Main component for a primary marketing message or call to action -->
<div class="row">
 <div class="col-md-9">
      <?php
      if (isset($_GET['hal'])){
      	if($_GET['hal']=='profile'){
	      	$sqlhal = mysql_query("select * from halaman where id='2'");
	      	$hal = mysql_fetch_array($sqlhal);
	      	?>
	      <div class="panel panel-custom">
	      <div class="panel panel-heading">
	      <h3 class="panel-title"><?php echo $hal['judul']; ?></h3>
	      </div>
	      <div class="panel-body">
	      <?php echo $hal['isi']; ?>
	      </div>
	      </div>     
	      <?php


      	}elseif($_GET['hal']=='layanan-pembuatan-web'){
      		$sqlhal = mysql_query("select * from halaman where id='3'");
	      	$hal = mysql_fetch_array($sqlhal);
	      	?>
	      <div class="panel panel-custom">
	      <div class="panel panel-heading">
	      <h3 class="panel-title"><?php echo $hal['judul']; ?></h3>
	      </div>
	      <div class="panel-body">
	      <?php echo $hal['isi']; ?>
	      </div>
	      </div>     
	      <?php

      	}elseif($_GET['hal']=='berita'){
      		include "admin/module/berita/hal_berita.php";
      	}

      }else{
      	$sqlhal = mysql_query("select * from halaman where id='1'");
      	$hal = mysql_fetch_array($sqlhal);
      	?>

      <div class="panel panel-custom">
      <div class="panel panel-heading">
      <h3 class="panel-title"><?php echo $hal['judul']; ?></h3>

      </div>
      <div class="panel-body">
      <?php echo $hal['isi']; ?>
      </div>
      </div>
     
      <?php
      }

      ?>
      
</div>
<div class="col-md-3">
      <div class="panel panel-custom">
      <div class="panel panel-heading">
      <h3 class="panel-title">Kategori</h3>

      </div>
      <div class="panel-kategori-custom">
		    <?php 
		    $sqlktg = mysql_query("select * from kategori");
		    while($k=mysql_fetch_array($sqlktg)){
		    ?>
				    	<a class="panel-kategori-custom" href="./?hal=berita&ktg=<?php echo $k['id']; ?>">
				      	<?php echo $k['nm_kategori']; ?></a><br>
	      	<?php
	      }
	      ?>
      </div>
      </div>
  </div>
</div>
    <div id="footer">
      <center><a href="www.indexattacker.tech">Copyright &copy; 2018 Ajid -CMS</a></center>
      </div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/jquery.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
     </body>
</html>
