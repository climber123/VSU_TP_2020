<?php
	function exec_select_query($query)
	{
		require 'database_connection.php';
		$stmt=$mysqli->stmt_init();
		
		if(
		($stmt->prepare($query)===FALSE)
		
		//or ($stmt->bind_param('ii',$user_login,$user_password)===FALSE)
		or ($stmt->execute()===FALSE)
		or (($result = $stmt->get_result()) === FALSE)
		
		//or ($stmt->bind_result($user)===FALSE)
		//or ($stmt->store_result() === FALSE)
		//or ($stmt->fetch() === FALSE)
		or ($stmt->close() === FALSE)
		) {
		die('Select Error (' . $stmt->errno . ') ' . $stmt->error);
		}
		$rows_count=$result->num_rows;
		for($i=0;$i<$rows_count;$i++)
		{
			$result_array[$i]=$result->fetch_array(MYSQLI_BOTH);
		}
		return $result_array;
	}
	function exec_query($query)
	{
		require 'database_connection.php';
		$stmt=$mysqli->stmt_init();
		//echo $query;
		if(
		($stmt->prepare($query)===FALSE)
		//or ($stmt->bind_param('ii',$user_login,$user_password)===FALSE)
		or ($stmt->execute()===FALSE)
		//or ($stmt->bind_result($user)===FALSE)
		//or ($stmt->store_result() === FALSE)
		//or ($stmt->fetch() === FALSE)
		or ($stmt->close() === FALSE)
		) {
		die('Select Error (' . $stmt->errno . ') ' . $stmt->error);
		}
	}