<?php 

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'color_switch');


function getDB() {
	$dbhost = DB_SERVER;
	$dbuser = DB_USERNAME;
	$dbpass = DB_PASSWORD;
	$dbname = DB_DATABASE;
	try {
		$dbConn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
		$dbConn->exec("set names utf8");
		$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $dbConn;
	} catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}
}
?>