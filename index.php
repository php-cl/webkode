<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta charset="encoding">
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon"/>
  <title>webkode | Trucos Web</title>  
  <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="assets/css/style.css">
  <script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

  <meta name="robots" content="all"/>
  <meta name="keywords" content="Front Chile, Programador PHP, webs, Frontend, diseño grafico, programacion, freelance, HTML5, CSS3,CSS, jQuery, Javascript, estandares web, Photoshop, Diseñador Wordpress"/>
  <meta name="description" content="Ideas y trucos de programación web para Front-End, Back-End y Webmaster en Chile."/>
  <meta name="author" content="Marlon Falcón Hernández"/>
  <meta name="rating" content="general"/>
  
  <!-- Integramos con Facebook -->
  <meta property="og:site_name" content="Example">
  <meta property="og:url" content="http://www.marlonfalcon.cl/webkode/">
  <meta property="og:title" content="Trucos de programación Web para Front-End y Back-End">
  <meta property="og:description" content="Este software reúne más de 150 códigos para usar en la Programación WEB">
  <meta property="og:image" content="http://www.marlonfalcon.cl/webkode/imagenSocial.jpg">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

      

    </head>
    <body >
      <?php

      $estalogeando = false;
      session_start();   
      if (isset($_SESSION['nombre'])) 
      {
       $estalogeando = true;
       echo("<style>#social-sidebar{display:none;}</style>");
     }
     

 $limit_end = 50;


  if($_POST) 
    {
           $limit_end = $_POST['numero3'];               
    }

/* capturar variable por método GET */
  if (isset($_GET['pos']))
  $ini=$_GET['pos'];
  else
  $ini=1;    

  $init = ($ini-1) * $limit_end;
  $select = " LIMIT $init, $limit_end";
  $url = basename($_SERVER ["PHP_SELF"]);
  ?>


     

     <?php
     $usuarios = 0;
// Actulizamos los usuarios
     $file = fopen("assets/include/reg.txt", "r");
     $b = fgets($file);
     fclose($file);

     $usuarios = $b + 1;

     $file = fopen("assets/include/reg.txt", "w");
     fwrite($file, $usuarios . PHP_EOL);
     fclose($file);


     if($estalogeando){
      function get_real_ip()
      {

        if (isset($_SERVER["HTTP_CLIENT_IP"]))
        {
          return $_SERVER["HTTP_CLIENT_IP"];
        }
        elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
        {
          return $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
        {
          return $_SERVER["HTTP_X_FORWARDED"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
        {
          return $_SERVER["HTTP_FORWARDED_FOR"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED"]))
        {
          return $_SERVER["HTTP_FORWARDED"];
        }
        else
        {
          return $_SERVER["REMOTE_ADDR"];
        }
      }


      echo "<div class=\"cuadro-usuarios\">";
      echo "  <p id=\"pusuario\">Cantidad:".$usuarios."</p>";
      echo "  <p>IP:".get_real_ip()."</p>";
      echo "</div>";
    }

    include("assets/include/config.php");

    ?>
    <!-- Si usas redes sociales -->
    <div id="social-sidebar">
     <ul>
       <li><a class="entypo-twitter" target="_blank" href="https://twitter.com/marlonfalcon4"> <img src="assets/img/social/tw.png" alt=""> </a></li>
       <li><a class="entypo-youtube" target="_blank" href="https://www.youtube.com/channel/UCM93kgnjXu393jgKjjSkUjQ"><img src="assets/img/social/yo.png" alt=""> </a></li>
     </ul>
   </div>
   <!-- Si usas redes sociales -->





   <a class="orange_mar" href="http://www.marlonfalcon.cl/">
     <img alt="marlon" src="assets/img/right_orange.png" style="position: fixed; top: 0; right: 0; border: 0;z-index:9999;"  id="marlon" >
   </a>
   <div class="webkoder-slider">
     <div class="container">
       <h3><?php echo TEXT_NAME ?></h3>	
       <div class="separador"></div>
       <p class="descsite"><?php echo TEXT_DESC ?></p>
     </div>
   </div> <!-- webkoder-slider -->

   <div class="webkoder-main">
     <div class="container">

      <ul class="nav nav-pills">
        <li role="presentation" class="active"><a href="index.php">INICIO</a></li>

        <?php
        if($estalogeando){
         echo "<li role=\"presentation\"><a href=\"assets/include/logout.php\">CERRAR</a></li>";
         echo "<li role=\"presentation\"><a href=\"insertar.php\">INSERTAR</a></li>";
         echo "<li role=\"presentation\"><a href=\"assets/include/reiniciar.php\" class=\"rq\" onclick=\"return confirm('¿Quieres reiniciar el contador usuario?');\">REINICIAR CONT USUARIO</a></li>";
       } 
       else
       {
        echo "<li role=\"presentation\"><a href=\"login.php\">ADMINISTRAR</a></li>";
      }

      ?>
    </ul>
    <hr>

    
    <div class="col-sm-12 my-nav">
      <div class="tab-header">
       <form action="index.php" method="POST" class="forma form-inline">
        
        <div class="form-group ">          
          <input class="form-control inputfill center-block botonsup" type="text" name="numero1" placeholder="Buscar por título..." autofocus>
          <input class="form-control inputfill center-block" type="text" name="numero2" placeholder="Buscar en artículo...">
        </div>
        
        <div class="form-group">
          <input class="botones btn btn-primary center-block" type="submit" value=" Buscar ">
        </div>
       
        <div class="form-group">
          <select class="form-control" name="numero3">
            <option><?php echo $limit_end ?></option>
            <option>50</option>
            <option>100</option>
            <option>200</option>
            <option>300</option>
            <option>1000</option>
          </select> 
        </div>
        
        </form>
    </div>
  </div> 



  <div class="row">


    <?php
    include("assets/include/conexion.php"); 
    $temp ="";
    $temp2 ="";

    if($_POST)
    {
     $temp = $_POST['numero1'];
     $temp2 = $_POST['numero2'];
   }
   ?>


   <div class="col-sm-12">
     <div class="contenido">
      <div class="row">

       <hr/>

       <?php 
       
       if($temp !=""){
        echo "<div class=\"alert alert-danger alert-dismissible fade in\" role=\"alert\">";
        echo "<button class=\"close\" aria-label=\"Close\" data-dismiss=\"alert\" type=\"button\">";
        echo "<span aria-hidden=\"true\">×</span>";
        echo "</button>";
        echo "<h4>El valor buscado es:".$temp."</h4>";
        echo "</div>";
      }
      
      ?>

      



      <div class="tabla">
       <table class="table table-hover table-bordered">
         <thead>
           <tr>
             <th>COD</th>
             <th>TITULO</th>
             <th>FECHA</th>
             <?php
             if($estalogeando){
              echo "<th>Editar</th>";
              echo "<th>Eliminar</th>"; 
            }
            ?>

          </tr>
        </thead>
        <tbody>



          <?php 

         // Calculamos el total de registros
         
       
         $sqltemp = "SELECT * FROM table_trucos";  // sentencia sql
         $resultemp = mysql_query($sqltemp);
         $total_registros = mysql_num_rows($resultemp);

         if ($temp != "" or $temp != "")
         {
          $total_registros = 0;
         }

          $n = 1;
          $que = "";

          $dt_Ayer= date('Y-m-d', strtotime('-2 day')) ;
          
          if ($temp2 == "" ){
           $sql="SELECT * FROM table_trucos WHERE f_titulo_trucos like '%".$temp."%' or f_familia_trucos like '%".$temp."%'  ORDER BY f_familia_trucos ".$select;
         } 
         else {
           $sql="SELECT * FROM table_trucos WHERE f_codigo_truco like '%".$temp2."%'  ORDER BY f_familia_trucos ".$select;
         }
         
         

         $result = mysql_query($sql,$con);
         while($row = mysql_fetch_assoc($result))
         { 

          if ( $row['fecha'] > $dt_Ayer ) {
           $minueva_fecha = $row['fecha']." (New)";
           $que = 'danger';
         }

         else{
          $minueva_fecha = $row['fecha'];
          $que = '';
        }


        echo '<tr class="'.$que.'">';
        echo '<th scope="row">'.$row['f_id_trucos'].'</th>';
        echo '<td><a href="truco.php?id='.$row['f_id_trucos'].'">'.'('.$row['f_familia_trucos'].') '.$row['f_titulo_trucos'].'</a></td>';



        echo '<td>'.$minueva_fecha.'</td>';
        if($estalogeando){

          echo '<td  width="50" align="center"  scope="row">'.'<a href="editar.php?id='.$row['f_id_trucos'].'"><img src="assets/img/bedit.png"></a>'.'</td>';
          echo "<td width=\"50\"  align=\"center\" class=\"img_class\"><a onclick=\"return confirm('¿Quieres eliminar el Registro?');\" href=\"assets/include/eliminar.php?id=".$row['f_id_trucos']."\"><img src=\"assets/img/bdelete.png\"></a></td>";


        }
        echo '</tr>';
        $n++;
      }

      ?>
    </tbody> 
  </table>
</div>







</div>
</div>
</div> 


</div></div>

<div class="container">
   <div class="paginacion">
     <?php

    $c = $n;
    $total = ceil($total_registros/$limit_end);

    if($total != 0){

  /* numeración de registros [importante]*/
  echo "<ul class='pagination'>";
  /****************************************/
  if(($ini - 1) == 0)
  {
    echo "<li><a href='#'>«</a><li>";
  }
  else
  {
    echo "<li><a href='$url?pos=".($ini-1)."'><b>«</b></a></li>";
  }
  /*********************************** *****/
  for($k=1; $k <= $total; $k++)
  {
    if($ini == $k)
    {
      echo "<li><a href='#'><b>".$k."</b></a></li>";
    }
    else
    {
      echo "<li><a href='$url?pos=$k'>".$k."</a></li>";
    }
  }
  /****************************************/
  if($ini == $total)
  {
    echo "<li><a href='#'>»</a></li>";
  }
  else
  {
    echo "<li><a href='$url?pos=".($ini+1)."'><b>»</b></a></li>";
  }
  /*******************END*******************/
  echo "</ul>";
}


?>
   </div>
</div>



</div><!-- container -->
</div><!-- webkoder-main -->


<div class="webkoder-footer">
	
  <div class="container">
    <p> Marlon Falcón Hernández</p>
    <div class="separador"></div>
    <a href="mailto:falconsoft.3d@gmail.com"><p>falconsoft.3d@gmail.com</p></a>
    <?php 
    $n--;
    if($con) { 
      echo "Conectado a BD con (".$total_registros." Trucos)";
    }
    else{ echo "No Conectado a BD";}
    ?>
  </div>

</div> <!--  -->



<div id="toTop" class="back-to-top" style="display: block;"></div>
<script>            
$(document).ready(function() {
  
  var offset = 220;
  var duration = 500;
  $(window).scroll(function() {
    if ($(this).scrollTop() > offset) {
      $('.back-to-top').fadeIn(duration);
    } else {
      $('.back-to-top').fadeOut(duration);
    }
  });
  
  $('.back-to-top').click(function(event) {
    event.preventDefault();
    $('html, body').animate({scrollTop: 0}, duration);
    return false;
  })

  
  function actualizausuarios(){
    
    $.ajax({
      url : 'assets/include/leer.php',
      type : 'POST',
      dataType : 'json',
      beforeSend: function () {
        $('#pusuario').html("Cargando.."); 
      },

      success : function (result) {
       $('#pusuario').html("Cantidad:"+result['ajax']);          
     },
     error : function () {
       alert("error");
     }
   })


    
  }

  <?php 
  if($estalogeando)
  {
    echo("setInterval(actualizausuarios, 11000);");

  }
  ?>
  


});
</script>






</body>
</html>
