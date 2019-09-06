<?php 
require_once("../includes/db.php");
// code user email availablity
if(!empty($_POST["session_year"]) && !empty($_POST["session_name"]) && !empty($_POST["program_id"]) && !empty($_POST["batch_id"]) && !empty($_POST["day"])&& !empty($_POST["start_time"]) && !empty($_POST["end_time"])) {
	$session_year= $_POST["session_year"];
	$session_name= $_POST["session_name"];
	$program_id= $_POST["program_id"];
	$batch_id= $_POST["batch_id"];
	$day= $_POST["day"];
	$start_time= $_POST["start_time"];
    $new_start_time=date('H:i',strtotime('+1 minutes',strtotime($start_time)));
	$end_time= $_POST["end_time"];
    $new_end_time=date('H:i',strtotime('-1 minutes',strtotime($end_time)));
	
		$sql ="SELECT * FROM routine WHERE session_year='$session_year' AND session_name='$session_name' AND p_id='$program_id' AND batch_id='$batch_id' AND day='$day' AND ((start_time<='$new_start_time' AND end_time>='$new_start_time')OR(start_time<='$new_end_time' AND end_time>='$new_end_time')) ";
        $run=mysqli_query($conn,$sql);
if(mysqli_num_rows($run)>0)
{
echo "<span style='color:red'> Duplicate routine has been found !</span>";
    echo "<script>$('#add').prop('disabled',true);</script>";
    
}
    else{
        echo "<span></span>";
    }

}


?>
