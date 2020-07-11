<?php
$user_db = "mysql";
$password_db = "mysql";
$host = "localhost";
$database = "dtstealer";

try
{
	$db = new PDO("mysql:host=$host;dbname=$database;charset=utf8",$user_db,$password_db);
}
catch(PDOException $e)
{
	echo "Error: ".$e->getMessage();
}
?>