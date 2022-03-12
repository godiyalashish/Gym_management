<?php


	session_start();

	if(array_key_exists('submit', $_POST)){   //checking if there submit inside $_POST array

		$error = '';

		if($_POST['user'] == 'customer'){
			login_customer($_POST);
		}else{
			login_trainer($_POST);
		}
	}


 function login_customer($DATA){

 	include('../connection/connection.php');
 	$user_email = mysqli_real_escape_string($link,$DATA['email']);

	$user_password = mysqli_real_escape_string($link,$DATA['password']);

	if(!$user_email){  //checking if there is no email entered

			header('location:../pages/login.php?error=Please enter email');
			exit();
		}

		if(!$user_password){  //checking if there is no password entered

			header('location:../pages/login.php?error=Please enter the password');
		
		}else{
			//query selecting everything from users table where email id is eual to email entered by user

		$query = "SELECT * from `users` WHERE email = '$user_email' LIMIT 1";

			$result = mysqli_query($link,$query); //running above query

			$row = mysqli_fetch_array($result); //fetching response from DB

			if(isset($row)){  //checking if there is array returned by DB

				$hashedPassword = md5(md5($row['id']).$user_password);

				//comparing password entered by user and that stored in DB

				if($hashedPassword == $row['password'] && $user_email == $row['email']){

					$_SESSION['id'] = $row['id'];  //creating session id

					$_SESSION['email'] = $row['email'];

					$_SESSION['user'] = 'customer';

					header('location:../pages/dashboard.php');  //logging user in

				}else{

					//redirect user to login page if password/email combination is not found

					header('location:../pages/login.php?error=password and email combination not found!');
				}

			}else{

				header('location:../pages/login.php?error=password and email combination not found!');
			}
 }}


 function login_trainer($DATA){}

	?>