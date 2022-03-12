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
		$name="";
		$weight=0;
		$contact="";
		$fee = 0;

		$id = $_POST['id'];

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
 		}elseif (empty($_POST['weight'])) {
 			$error = "Enter weight also";
 		}elseif (empty($_POST['fee'])) {
 			$error = "Enter fee";
 		}elseif (empty($_POST['name'])) {
 			$error = "Enter name";
 		}else{

		$contact = mysqli_real_escape_string($link,$_POST['contact']);

		$weight = mysqli_real_escape_string($link,$_POST['weight']);

		$fee = mysqli_real_escape_string($link,$_POST['fee']);

		$name = mysqli_real_escape_string($link,$_POST['name']);

		if (!empty($_POST['email'])) {
 			$email = mysqli_real_escape_string($link,$_POST['email']);
 			if($email == $_POST['lastEmail']){
 				$email = $_POST['lastEmail'];
 			
 		}else{

 			$query = "SELECT id from `members` WHERE email = '$email' LIMIT 1";

			$result = mysqli_query($link,$query);

			if(mysqli_num_rows($result) > 0){  

				$error = "Email already exist";
			
			}}
			if(empty($error)){

				$query = "UPDATE `members` SET `name`='$name',`fathername`='$fatherName',`fee`='$fee',`contact`='$contact',`address`='$address',`email`='$email',`date_created`='$joinDate',`weight`='$weight' WHERE id = $id";

				if(mysqli_query($link,$query)){
					$message = "success";
				}else{
					$error = "Try again later";
				}
			}

 		
	}
}

	$updatedArray = array('error'=>$error, 'message' =>$message, 'name'=>$_POST['name'],'fathername'=>$_POST['fatherName'],'fee'=>$_POST['fee'],'contact'=>$_POST['contact'],'address'=>$address,'email'=>$_POST['email'],'date_created'=>$joinDate,'weight'=>$weight, 'id'=> $id, 'trainer'=>$_POST['trainer'], 'gender'=>$_POST['gender'],'status'=>$_POST['status']);

   print_r(json_encode($updatedArray));
}

?>