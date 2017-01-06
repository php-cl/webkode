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
      

    </head>

    <body >

     <!-- Si usas redes sociales -->
     <div id="social-sidebar">
       <ul>
         <li><a class="entypo-twitter" target="_blank" href="https://twitter.com/marlonfalcon4"> <img src="assets/img/social/tw.png" alt=""> </a></li>
         <li><a class="entypo-facebook" target="_blank" href="https://www.facebook.com/falconsoftsa"><img src="assets/img/social/fa.png" alt=""> </a></li>
         <li><a class="entypo-youtube" target="_blank" href="https://www.youtube.com/channel/UCM93kgnjXu393jgKjjSkUjQ"><img src="assets/img/social/yo.png" alt=""> </a></li>
       </ul>
     </div>
     <!-- Si usas redes sociales -->




     <?php
     $estalogeando = false;
     session_start();   
     if (isset($_SESSION['nombre'])) 
     {
       $estalogeando = true;
     }
     ?>

     <?php
     include("assets/include/conexion.php");

     if(isset($_GET['id']))
     {
      $temp=$_GET['id'];
    }

    else{
     $temp='1';
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


   <div class="webkoder-main">
    <div class="container">

      <ul class="nav nav-pills">
        <li role="presentation"><a href="index.php">INICIO</a></li>
        <?php
        if($estalogeando){
         
         echo "<li role=\"presentation\"><a href=\"editar.php?id=".$temp."\">EDITAR</a></li>";
       } 
       else
       {
        echo "<li role=\"presentation\"><a href=\"login.php\">INICIAR SECCION</a></li>";
      }
      
      ?>

    </ul>

    <hr>


    <?php
    $query = mysql_query("SELECT * FROM table_trucos WHERE f_id_trucos= $temp"); 


    if($row =  mysql_fetch_assoc($query))
    {
     
     $etitulo = $row['f_titulo_trucos'];
     $etruco = $row['f_codigo_truco'];
     $efamilia = $row['f_familia_trucos'];
   }

   else{
     header('location:index.php');
   }
   ?>


   <div class="row">
    <div class="col-lg-12">
     <div class="panel panel-primary">
      <div class="panel-heading">
       <h3 class="panel-title">Ver Articulo</h3>
     </div>
     <div class="panel-body"> 
       <form role="form" method="post">

        <div class="form-group">
         <input type="text" class="form-control" id="exampleInputName2" placeholder="titulo" name="titulo" value="<?php echo $etitulo?>">
       </div>

       <div class="form-group">
         <input type="text" class="form-control" id="exampleInputName3" placeholder="titulo" name="familia" value="<?php echo $efamilia?>">
       </div>
       <div class="form-group">
        <textarea class="form-control" rows="25" name="articulo" placeholder="Articulo" value="Clear" ><?php echo $etruco?></textarea>
      </div>
      
    </form>
  </div>
</div>
</div>	
</div>








</div>
</div><!-- webkoder-main -->
<div class="webkoder-footer">
	<p> By Marlon Falcon</p>
	<p>falconsoft.3d@gmail.com</p>
  <?php 
  if($con) { echo "Conectado a BD";}
  else{ echo "No Conectado a BD"; }
  ?>
</div> <!--  -->


</html>
