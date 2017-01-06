<?php
   session_start();
   include("config.php");

   $user = $_POST['usuario'];
   $pass = $_POST['pass']; 

   if($user == DB_MYUSER and $pass == DB_MYPASS)
   {
   	 $_SESSION['nombre'] = DB_MYUSER;
   	 header('location:../../index.php');
       echo "$user"."----".DB_MYUSER;
   }

   else{
   	echo "no"; 
      header('location:../../login.php');
   }

?>