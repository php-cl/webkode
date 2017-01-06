<?php
$file = fopen("reg.txt", "r");
$b = fgets($file);
fclose($file);
$advert = array(
        'ajax' => $b
     );
echo json_encode($advert);
?>