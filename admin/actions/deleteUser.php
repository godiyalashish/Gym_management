<?php

	session_start();
	if (array_key_exists('id', $_POST)) {
		include "../connection/connection.php";

		$id = $_POST['id'];
		$message = "";
		$error = "";

		$query = "DELETE FROM `members` WHERE id = $id";
		if(mysqli_query($link,$query)){
					$message = "success";
				}else{
					$error = "Try again later";
				}

		$result = array('error' => $error, 'message'=>$message);
		print_r(json_encode($result));
	}else{
		print_r('error');
	}

?>