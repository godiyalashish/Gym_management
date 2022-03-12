<?php


	session_start();

	if(array_key_exists('Signup', $_POST)){   //checking if there submit inside $_POST array

		$error = '';

	include('../connection/connection.php');

	$password = $_POST['password'];

	$email = $_POST['email'];

	$name = $_POST['name'];

	$url = '';

	$agree = $_POST['agree'];

	if(!$name){  //checking if user has not enterd name and redirect to signup page with error

			$url = $url."&error=please enter name";

		
		}

	if(!$email){  //checking if user has not enterd name and redirect to signup page with error

			$url = $url."&error=please enter email";

		
		}

	if(!$password){  //checking if user has not enterd name and redirect to signup page with error

			$url = $url."&error=please enter password";

		
		}

	if($agree != 'on'){

		$url = $url."&error=please agree terms and conditions";

	}

	if($url != ''){ //checking if url varible is not empty and redirecting to signup page

			header('location:../pages/signup.php?'.$url);


		}else {

			$reg_email = mysqli_real_escape_string($link,$email);
			$reg_name = mysqli_real_escape_string($link,$name);
			$reg_password = mysqli_real_escape_string($link,$password);

			$query = "SELECT id from `users` WHERE email = '$reg_email' LIMIT 1";

			$result = mysqli_query($link,$query);

			//if no. of rows returned is > 0 then email is already registered

			if(mysqli_num_rows($result) > 0){  


				header("location:/gym/pages/signup.php?error=This email is alredy registered");
			
			}else{

				//inserting user information in users table using insert query

				$query = "INSERT INTO `users` (email,name,password,type) VALUES('$reg_email','$reg_name','$reg_password','3')";

				if(mysqli_query($link,$query)){

					//updating user password to md5 hashed form

					$query = "UPDATE `users` SET password = '".md5(md5(mysqli_insert_id($link)).$reg_password)."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";

					mysqli_query($link,$query);

					header('location:/gym/pages/login.php?signup_success=t');


				}else{

					//redirect to signup.php if there is error in signing up the user

					$url = $url.'error=Cannot sign you up - please try again later.';

					header('location: /gym/pages/signup.php?'.$url);

					exit();
					
				}
	}}}else{


echo "<script type='text/javascript>
	alert('error');
</script>";
	}

?>
