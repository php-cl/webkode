      <?php 
      
      // datos para la coneccion a mysql
      define('DB_SERVER','localhost');
      define('DB_NAME','webkodes');
      define('DB_USER','superuser');
      define('DB_PASS','dvt@12as12');

      $con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);

      if(!$con){
        die("Error al conectarse:".mysql_error());
      }
      mysql_select_db(DB_NAME,$con); 

      mysql_query("SET NAMES 'utf8'",$con);

      ?>