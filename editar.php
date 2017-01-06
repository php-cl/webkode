<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	<title>webkodes | Marlon Falcon</title>	
	<link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="assets/css/style.css">
	<script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

  <!-- HELLO  -->
  
  </head>
  <body >

 	<?php
  	session_start();
  	if (!isset($_SESSION['nombre'])) {
  		header('Location: index.php');
  	}

  	include("assets/include/conexion.php");

  	if(isset($_GET['id']))
  	{
  		$temp=$_GET['id'];
  		$q = "SELECT * FROM table_trucos WHERE f_id_trucos= $temp";
  		$query = mysql_query($q);

  		if($row =  mysql_fetch_assoc($query))
  		{
  			$etitulo = $row['f_titulo_trucos'];
  			$etruco = $row['f_codigo_truco'];
  			$efamilia = $row['f_familia_trucos'];
  		} 
  	}

  	include("assets/include/config.php");
  	?>

  	<a href="http://www.marlonfalcon.cl/">
  		<img alt="marlon" src="assets/img/right_orange.png" style="position: fixed; top: 0; right: 0; border: 0;z-index:9999;"  id="marlon" >
  	</a>
  	<div class="webkoder-slider">
  		<h3><?php echo TEXT_NAME ?></h3>	
  		<p><?php echo TEXT_DESC ?></p>
  	</div> <!-- webkoder-slider -->
  </div> <!-- webkoder-slider -->
  <div class="webkoder-main">
  	<div class="container">
  		<ul class="nav nav-pills">
  			<li role="presentation"><a href="index.php">INICIO</a></li>
  			<li role="presentation" class="active"><a href="assets/include/logout.php">CERRAR</a></li>
  		</ul>
  		<hr>
  		<div class="row">
  			<div class="col-lg-12">
  				<div class="panel panel-danger">
  					<div class="panel-heading">
  						<h3 class="panel-title">Editar Articulo</h3>
  					</div>
  					<div class="panel-body"> 
  						<form action="assets/include/feditar.php?id=<?php echo $temp ?>" role="form" method="post">

  							<div class="form-group">
  								<input type="text" class="form-control" id="exampleInputName2" placeholder="titulo" name="titulo" value="<?php echo $etitulo?>">
  							</div>

  							<div class="form-group">
  								<input type="text" class="form-control" id="exampleInputName3" placeholder="titulo" name="familia" value="<?php echo $efamilia?>">
  							</div>
  							<div class="form-group">
  								<textarea class="form-control" rows="23" name="articulo" placeholder="Articulo" value="Clear"><?php echo $etruco?></textarea>
  							</div>
  							<div class="form-group">
  								<button type="submit" class="btn btn-primary">Actualizar</button>
  							</div>						
  						</form>
  					</div>
  				</div>
  			</div>	
  		</div>
  		<hr>
  	</div> <!-- container -->
  </div> <!-- webkoder-main -->
  <div class="webkoder-footer">
  	<p> By Marlon Falcon</p>
  	<p>falconsoft.3d@gmail.com</p>
  </div> <!--  -->
  </html>
