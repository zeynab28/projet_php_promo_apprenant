<?php
$bonjour=fopen("promo.txt","a+");
fwrite($bonjour,'comment ca va');
fread($bonjour);
fclose($bonjour);
?>