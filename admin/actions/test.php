<?php

	include "../connection/connection.php";

	$email = '';

	$query = "INSERT INTO `members` (email) VALUES ('$email')";

	if(mysqli_query($link,$query)){
		echo "s";
	}else
	{
		echo "err";
	}

?>