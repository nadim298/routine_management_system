<?php 
require_once("../includes/db.php");
// code user email availablity
if(!empty($_POST["room_no"]) && !empty($_POST["start_time"]) && !empty($_POST["end_time"])) {
	$room_no= $_POST["room_no"];
	$start_time= $_POST["start_time"];
    $new_start_time=date('H:i',strtotime('+1 minutes',strtotime($start_time)));
	$end_time= $_POST["end_time"];
    $new_end_time=date('H:i',strtotime('-1 minutes',strtotime($end_time)));
	
		$sql ="SELECT * FROM routine WHERE room_no='$room_no' AND ((start_time<='$new_start_time' AND end_time>='$new_start_time')OR(start_time<='$new_end_time' AND end_time>='$new_end_time')) ";
        $run=mysqli_query($conn,$sql);
if(mysqli_num_rows($run)>0)
{
echo "<span style='color:red'> Selected room is not available!</span>";
    echo "<script>$('#add').prop('disabled',true);</script>";
    
}
    else{
        echo "<span></span>";
    }

}


?>
