<?php
ob_start();

session_start();   
  if (isset($_SESSION['nombre'])) 
  {


   // {1} Inicializamos las variables
   include("../config.php");
   // {2} Limpiamos la base de datos 2
   $con2 = mysql_connect(DB_SERVER2,DB_USER2,DB_PASS2);
              if(!$con2){
                         die("Error al conectarse:".mysql_error());
                        }
              else{
                    echo "1 - Conecto al servidor: ".DB_SERVER2;
                    echo "<br>";                    
                 }    
          $tempDB = DB_NAME2;
          $tempTAB = DB_TABLE2;
          mysql_select_db($tempDB,$con2); 
          mysql_select_db($tempDB,$con2);
          $sql="DELETE FROM $tempTAB WHERE 1";
          $query = mysql_query($sql);
          if ($query){
                      $temp3 = "2- Se limpio la base de datos: ".$tempTAB;
                     }
              else
                     {
                      echo("No se pudo Borrar");
                      echo "<br>";
                      echo($sql). "\n";
                      echo "<br>";
                      echo mysql_errno($con2) . ": " . mysql_error($con2) . "\n";
                    }

       // {2} Limpiamos la base de datos 2


       // set_time_limit(0);


set_time_limit(0);

$conexion = mysql_connect(DB_SERVER2,DB_USER2,DB_PASS2);

// De que base de datos vamos a tomar las tablas
$db_from = DB_NAME1;
// A que base de datos vamos a migrar las tablas
$db_to = DB_NAME2;
// Con los datos o no
$data = true;

// Nombre de las tablas a Migrar
$table_from = DB_TABLE1;
$table_to = DB_TABLE2;

// Leemos todas las tablas de db_from
$sql = "SHOW TABLES FROM $db_from";

$result = mysql_query($sql);

$list_tables = array();
while ($row = mysql_fetch_assoc($result))
{
   $list_tables[] = current($row);
}


// Si data es true pasamos los datos de cada tabla vieja a la nueva
if ($data)
{
   foreach ($list_tables as $tbname)
   {
      $sql = "INSERT INTO $db_to.$table_to SELECT * FROM $db_from.$table_from";
      $result = mysql_query($sql);
      if ($result)
      {
         $k = "Migrados datos de la tabla $db_from.$table_from a $db_to.$table_to";
      }
   }
}            
header('location:../../../index.php');

  }

  else{
    echo "no tienes privilegios";
  }

  
ob_end_flush();
?>