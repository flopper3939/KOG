<?php
require_once('constants.php');
$config = array
(
	'sql' => array 
	(
		'host' => '192.168.112.124', // Hostname or Ip of sql server
		'port' => 3306,  // port of sql server
		'username' => 'MASuser', // Username of sql server
		'password' => 'g-9V]jRS<T7dP3Fb', // Password of sql server
		'dbname' => 'kog'
	),
	'CSRF' => array 
	(
		// Timeout for hver form i sekunder
		'Token_timeout' => 1200
	),
	'lists' => array
	(
		'per_page' => 50
	),
	'debug' => true,
);

?>