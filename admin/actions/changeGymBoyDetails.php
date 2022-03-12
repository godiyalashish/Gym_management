<?php
$message ='';
$error ='';
$s=0;

$id = $_POST['info'][0];
$status = $_POST['info'][1];

if($status == 1){
	include "../connection/connection.php";
	$query = "UPDATE `members` SET `status`=0 WHERE id=$id";
	if(mysqli_query($link,$query)){
					$message = "success";
					$s = 0;
				}else{
					$error = "Try again later";
				}
}else{
	include "../connection/connection.php";
	$query = "UPDATE `members` SET `status`=1 WHERE id=$id";
	if(mysqli_query($link,$query)){
					$message = "success";
					$s = 1;
				}else{
					$error = "Try again later";
				}

}

$updatedArray = array('message' =>$message, 'error'=>$error, 's'=>$s);
print_r(json_encode($updatedArray));


?>