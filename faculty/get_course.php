<?php 
require_once("../includes/db.php");
if(!empty($_POST["program_id"])) {
  $program_id= $_POST["program_id"];
 
    $sql = "SELECT * from courses WHERE program_id='$program_id' ";
    $run=mysqli_query($conn,$sql);
    if(mysqli_num_rows($run)>0){
        while($row=mysqli_fetch_array($run)){
            $id=$row['id'];
            $course=$row['course'];
            ?>
            <option value="<?php echo htmlentities($id);?>"><?php echo htmlentities($course);?></option>
            <?php
            echo "<script>$('#result_course').prop('disabled',false);</script>";
        }
    } 

}



?>
