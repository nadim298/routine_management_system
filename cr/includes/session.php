<?php
	require_once('../includes/db.php');
	ob_start();
	session_start();
	if(!isset($_SESSION['batch_id'])){
		header("location:../index.php");
	}
else{
    $batch_id=$_SESSION['batch_id'];
    
    $trimester_sql="select * from trimester where status='1'";
$trimester_run=mysqli_query($conn,$trimester_sql);
$trimester_row=mysqli_fetch_array($trimester_run);
$trimester_id=$trimester_row['id'];
}


					

?>