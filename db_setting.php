<?php
define("DB_USERNAME","root");
define("DB_PASSWORD","");
define("DB_NAME","ashesiclinic");
$dbh = new PDO('mysql:host=localhost; dbname='.DB_NAME,DB_USERNAME,DB_PASSWORD);
?>
