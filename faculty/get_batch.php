<?php 
require_once("includes/session.php");
if(!empty($_POST["program_id"])) {
  $get_day= $_POST["day"];
  $get_period= $_POST["period"];
  $program_id= $_POST["program_id"];
 
    $sql = "SELECT * FROM batches WHERE program_id='$program_id' AND id NOT IN (SELECT batch_id from routine where day='$get_day' AND period='$get_period' AND p_id='$program_id' AND trimester_id='$trimester_id') ";
    $run=mysqli_query($conn,$sql);
    if(mysqli_num_rows($run)>0){
        while($row=mysqli_fetch_array($run)){
            $id=$row['id'];
            $batch=$row['batch'];
            ?>
            <option value="<?php echo htmlentities($id);?>"><?php echo htmlentities($batch);?></option>
            <?php
            
        }
        echo "<script>$('#result_batch').prop('disabled',false);</script>";
    }
    else{
        echo "<script>$('#result_batch').prop('disabled',false);</script>";
        echo "<option value=''>No batch available!</option>";
    }

}



?>
