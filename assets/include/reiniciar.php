<?php
ob_start();
 
 session_start();   
  if (isset($_SESSION['nombre'])) 
  {
$file = fopen("reg.txt", "w");
fwrite($file, "0" . PHP_EOL);
fclose($file);
header('location:../../index.php');

  }

  else{
  	echo "no tienes privilegios";
  }
 ob_end_flush(); 
?>