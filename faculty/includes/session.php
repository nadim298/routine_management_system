<?php
	require_once('../includes/db.php');
	ob_start();
	session_start();
	if(!isset($_SESSION['email'])){
		header("location:../index.php");
	}
else{
    $trimester_validity=0;
    $routine_request=0;
    $email=$_SESSION['email'];
    $faculty_sql="select id from faculty where email='$email'";
    $trimester_sql="select * from trimester where status='1'";
    $faculty_run=mysqli_query($conn,$faculty_sql);
    $trimester_run=mysqli_query($conn,$trimester_sql);
    $faculty_row=mysqli_fetch_array($faculty_run);
    $trimester_row=mysqli_fetch_array($trimester_run);
    
    $faculty_id=$faculty_row['id'];
    $trimester_id=$trimester_row['id'];
    $trimester_start_date=$trimester_row['start_date'];
    $trimesterr_end_date=$trimester_row['end_date'];
    
    $today = date("Y-m-d");
    if($today>=$trimester_start_date && $today<=$trimesterr_end_date){
        $trimester_validity=1;
    }
    $routine_request_sql="select * from requests where trimester_id='$trimester_id' AND faculty_id='$faculty_id'";
    $routine_request_run=mysqli_query($conn,$routine_request_sql);
                                        if(mysqli_num_rows($routine_request_run)>0){
                                            $routine_request_row=mysqli_fetch_array($routine_request_run);
                                            if($routine_request_row['status']==0){
                                                $routine_request=1;
                                            }
                                            else{
                                                $routine_request=2;
                                            }
                                            
                                            
                                        }
}
$dashboard=0;

					

?>