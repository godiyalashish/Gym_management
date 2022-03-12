<?php
	session_start();

	if (array_key_exists('Assign', $_POST)) {
		include "../connection/connection.php";
		$error = "";
		$message = "";
		$memberId = $_POST['userId'];
		$trainerId = $_POST['trainer'];
		$name='';

	if($_POST['trainer'] < 0){
 			$error = "Please select trainer";
 	}else{

 		$query = "INSERT INTO `assigned_trainer` (trainer_id,member_id) VALUES ('$trainerId','$memberId')";
 		if(mysqli_query($link,$query)){
					$message = "success";
				}else{
					$error = "Try again later";
				}

		$query2 = "SELECT name FROM `trainers` WHERE id = $trainerId";
		$result = mysqli_query($link,$query2);
		$row = mysqli_fetch_array($result);
		$name = $row['name'];
 	}

	$updatedArray = array('error'=>$error, 'message' =>$message, 'to' => $memberId, 'trainer_name'=> $name);

   print_r(json_encode($updatedArray));
}
?>