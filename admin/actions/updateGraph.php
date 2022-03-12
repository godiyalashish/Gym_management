<?php 

	$type = $_POST['type'];

	if($type == "Fee"){

	include "../connection/connection.php";

	$year = date("Y");
	$arrayMonth = Array();
	$arrayAmount = Array();

	$query =  "SELECT MONTHNAME(date_created) AS month, sum(amount) AS amu FROM `payments` WHERE YEAR(date_created)= $year GROUP BY MONTHNAME(date_created)";
	// $query = "SELECT firstname FROM `members`";
       $result = mysqli_query($link,$query); //running above query

       while ($row = mysqli_fetch_array($result)) {
    	$arrayMonth[] =  $row['month'];
    	$arrayAmount[] = $row['amu'];  
}
echo json_encode(array('months'=>$arrayMonth,'amount'=>$arrayAmount));


}
else if($type = "Admissions"){
	include "../connection/connection.php";

	$year = date("Y");
	$arrayMonth = Array();
	$arrayCount = Array();

	$query = "SELECT MONTHNAME(date_created) AS month, count(id) AS num FROM `members` WHERE YEAR(date_created)= $year GROUP BY MONTHNAME(date_created)";
       $result = mysqli_query($link,$query); //running above query

       while ($row = mysqli_fetch_array($result)) {
    	$arrayMonth[] =  $row['month'];
    	$arrayCount[] = $row['num'];  	

}
	echo json_encode(array('months'=>$arrayMonth,'count'=>$arrayCount));

}


?>