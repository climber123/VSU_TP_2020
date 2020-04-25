<?php
	$host = 'localhost'; // адрес сервера 
	$database = 'SmartExpenses'; // имя базы данных
	$user = 'root'; // имя пользователя
	$password='1234';	// пароль
	$mysqli=new mysqli($host, $user, $password, $database);
	if($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}

?>