<?php
    ob_start();
    session_start();   
  if (isset($_SESSION['nombre'])) 
  {

   require("conexion.php"); 
   
   $titulo = $_POST['titulo'];
   $familia = $_POST['familia'];
   $titulo_ok = $titulo;
   $articulo = addslashes($_POST['articulo']);
   $sql="INSERT INTO table_trucos (f_titulo_trucos,f_familia_trucos,f_codigo_truco,fecha) VALUES ('".$titulo_ok."','".$familia."','".$articulo."','".date("Y/m/d ")."')";


 $query = mysql_query($sql);  
 

 if ($query){
   header('location:../../index.php');
 }

 else
 {
   echo("No se pudo insertar <gr>");
   echo($sql);
 }


  }

  else{
    echo "no tienes privilegios";
  }

  

ob_end_flush();
?>
