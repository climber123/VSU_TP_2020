<?php
	session_start();
	$dbh = new PDO("mysql:host=localhost;dbname=SmartExpenses;charset=utf8", "root","1234");
	$login = "";
	require_once("../query.php");
	$query='SELECT * FROM user where user_login ="'. $_POST['user_login']. '" and user_password = "'.$_POST['user_password'].'"' ;
	$user=exec_select_query($query,$result_array);

	if (count($user) == 0)
	{
		$logon_message = 'Неправильное имя пользователя или пароль';
		echo '<h1>' . $logon_message . '<h1>';
	}
	else
	{
		$user = $user[0];
		$_SESSION['user_id'] = $user['user_id'];
		$_SESSION['user_login'] = $user['user_login'];
		$_SESSION['user_name'] = $user['user_name'];
		header("Location: ../categories.html");
		die('');
	}

	
?>

<!--<html>
	<head>
		<title>Новости</title>
	</head>
	<body>		
		<h2>Вход в систему</h2>
		<form method="post">
			<table>
				<tr>
					<th>Пользователь</th>
					<td><input type="text" name="user_login" value="/></td>
				</tr>
				<tr>
					<th>Пароль</th>
					<td>
						<input type="password" name="user_password"/>
					</td>					
				</tr>

				<tr>
					<td colspan="2">
						<input type="submit" name="cmd" value="Вход" />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>