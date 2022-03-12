<?php
	session_start();

	if (array_key_exists('submit', $_POST)) {
		include "../connection/connection.php";

		$error = "";
		$message = "";
		$fatherName ="";
		$address = "";
		$joinDate="";
		$email = "";

 		if (!empty($_POST['fatherName'])) {
 			$fatherName = mysqli_real_escape_string($link,$_POST['fatherName']);
 		}

 		if (!empty($_POST['address'])) {
 			$address = mysqli_real_escape_string($link,$_POST['address']);
 		}

 		if (!empty($_POST['joinDate'])) {
 			$joinDate = mysqli_real_escape_string($link,$_POST['joinDate']);
 		}else{
 			$joinDate = date('Y-m-d H:i:s');
 		}

 		if(empty($_POST['contact'])){
 			$error = "Enter contact number";
 			return $error;
 		}elseif (empty($_POST['weight'])) {
 			$error = "Enter weight also";
 			return $error;

 		}elseif (empty($_POST['fee'])) {
 			$error = "Enter fee";
 			return $error;
 				
 		}elseif (empty($_POST['name'])) {
 			$error = "Enter name";
 			return $error;
 				
 		}else{

		$contact = mysqli_real_escape_string($link,$_POST['contact']);

		$weight = mysqli_real_escape_string($link,$_POST['weight']);

		$fee = mysqli_real_escape_string($link,$_POST['fee']);

		if($_POST['gender'] == 1){
			$gender = "Male";
		}else{
			$gender = "Female";
		}

		$name = mysqli_real_escape_string($link,$_POST['name']);

		

		if (!empty($_POST['email'])) {
 			$email = mysqli_real_escape_string($link,$_POST['email']);

 			$query = "SELECT id from `members` WHERE email = '$email' LIMIT 1";

			$result = mysqli_query($link,$query);

			if(mysqli_num_rows($result) > 0){  

				$error = "Email already exist";
			
			}else{

				$query = "INSERT INTO `members` (name, fathername, fee, gender, contact, address, email, date_created, weight) VALUES ('$name','$fatherName','$fee','$gender','$contact','$address','$email','$joinDate','$weight')";

				if(mysqli_query($link,$query)){
					$message = "success";
				}else{
					$error = "Try again later";
				}


			}
 		}
	}

	$updatedArray = array('error'=>$error, 'message' =>$message);

   print_r(json_encode($updatedArray));
}

?>