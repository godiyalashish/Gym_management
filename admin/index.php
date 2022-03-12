<?php

session_start();

if((array_key_exists('id', $_SESSION) && array_key_exists('email',$_SESSION)) &&  $_SESSION['user'] == 'admin'){
  
		header("location:./pages/dashboard.php");


	}else{
				header('location:./pages/login.php');


	}

?>