<?php
ob_start();


    session_start();   
  if (isset($_SESSION['nombre'])) 
  {
include("conexion.php"); 

$titulo = $_POST['titulo'];
$familia = $_POST['familia'];
$titulo_ok = $titulo;
$articulo = $_POST['articulo'];

if(isset($_GET['id']))
{
  $numero=$_GET['id'];
  $sql = "UPDATE table_trucos SET f_codigo_truco='".$articulo."',f_titulo_trucos='".$titulo_ok."', f_familia_trucos='".$familia."' , fecha='".date("Y/m/d ")."' WHERE f_id_trucos='".$numero."'";
   $query = mysql_query($sql);

if ($query){
   header('location:../../index.php?id='.$numero);
 }

 else
 {
   echo("No se pudo Editar <gr>");
   echo($sql);
 }


}
  


   }

  else{
    echo "no tienes privilegios";
  }

  ob_end_flush();
?>