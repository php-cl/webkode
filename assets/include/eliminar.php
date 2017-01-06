<?php
ob_start();

    session_start();   
  if (isset($_SESSION['nombre'])) 
  {

include("conexion.php"); 

if(isset($_GET['id']))
{
  $numero=$_GET['id'];
  $sql = "DELETE FROM table_trucos WHERE f_id_trucos = '$numero'";
  mysql_query($sql);
}
  header('location:../../index.php');

  }

  else{
    echo "no tienes privilegios";
  }

  ob_end_flush();
?>