<?php


	function countAdmissions()
    {
    	$startDate = $_POST['startDate'];
		$endDate = $_POST['endDate'];
        include "../connection/connection.php";
       $query =  "SELECT COUNT(*) from `members` where CAST(date_created as DATE) BETWEEN '$startDate' AND '$endDate'";
       $result = mysqli_query($link,$query); //running above query
	 	$row = mysqli_fetch_array($result);

            return $row[0];
    }

    function feeCount(){

    	$startDate = $_POST['startDate'];
		$endDate = $_POST['endDate'];
        include "../connection/connection.php";
        $query = "SELECT count(*) from `payments` where CAST(date_created as DATE) BETWEEN '$startDate' AND '$endDate' ";
       $result = mysqli_query($link,$query); //running above query

            $row = mysqli_fetch_array($result);

            return $row[0];

    }

    function totalFeeAmount() {
    	$startDate = $_POST['startDate'];
		$endDate = $_POST['endDate'];
        include "../connection/connection.php";
        $query = "SELECT SUM(amount) from `payments` where CAST(date_created as DATE) BETWEEN '$startDate' AND '$endDate' ";
       $result = mysqli_query($link,$query); //running above query

            $row = mysqli_fetch_array($result);

            return $row[0];
    }

   $updatedTotalFee = totalFeeAmount();
   $updatedFeeCount = feeCount();
   $updatedAdmissionsCount  = countAdmissions();

   if(!$updatedTotalFee){
   	$updatedTotalFee = 0;
   }

   $updatedArray = array($updatedAdmissionsCount, $updatedFeeCount, $updatedTotalFee);

   print_r(json_encode($updatedArray));

?>