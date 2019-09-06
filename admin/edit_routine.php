<?php include 'includes/session.php';?>
<?php		
$edit_id=$_GET['edit_id'];
$query="SELECT * FROM routine where id=$edit_id";
$routine_run=mysqli_query($conn,$query);
$routine_row=mysqli_fetch_array($routine_run);
$t_id=$routine_row['course_teacher_id'];
?>
		
 <?php
if(isset($_POST['update']))
{
$session_name=$_POST['session_name'];
$session_year=$_POST['session_year'];
$batch_id=$_POST['batch_id'];
$program_id=$_POST['program_id'];
$course_id=$_POST['course_id'];
$course_teacher_id=$_POST['course_teacher_id'];
$day=$_POST['day'];
$start_time=$_POST['start_time'];
$end_time=$_POST['end_time'];
$room_no=$_POST['room_no'];
    
$sql = "UPDATE `routine` SET `session_name` = '$session_name', `session_year` = '$session_year', `batch_id` = '$batch_id', `course_id` = '$course_id', `course_teacher_id` = '$course_teacher_id', `day` = '$day', `start_time` = '$start_time', `end_time` = '$end_time', `room_no` = '$room_no', `p_id` = '$program_id' WHERE `routine`.`id` = $edit_id";
if(mysqli_query($conn,$sql)){
                    $_SESSION['updatemsg']="Succesfully Updated Routine";
                    header('location:manage_routine.php');
                }
                
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/itsbrain/liquid/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2019 12:02:47 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<?php include 'includes/head.php';?>

<body>
    <!-- Page header -->
    <?php include 'includes/header.php';?>
    <!-- /page header -->


    <!-- Page container -->
    <div class="page-container container-fluid">
    	
    	<!-- Sidebar -->
        <?php include 'includes/sidebar.php';?>
        <!-- /sidebar -->

    
        <!-- Page content -->
        <div class="page-content">

            <!-- Page title -->
        	<div class="page-title">
                <h5><i class="fa fa-bars"></i>Faculty</h5>
            </div>
            <!-- /page title -->

                
            <!-- Simple chart -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title">Update Faculty</h6>
                </div>
                <div class="panel-body">                        
                    <form class="form-horizontal" method="post" style="width: 500px; margin: auto;  " >
                      <br>
                      <br>
                      <br>
                
                        <div class="form-group">
                        <label class="col-sm-2 control-label">Trimester: </label>
                        <div class="col-sm-10">
                            <select data-placeholder="Choose a Country..." name="session_name" id="session_name" onChange="" class="select" tabindex="2" required>
                               
                                <option value="<?php echo htmlentities($routine_row['session_name']);?>"><?php echo htmlentities($routine_row['session_name']);?></option>
                                <option value="Spring">Spring</option>
                                <option value="Summer">Summer</option>
                                <option value="Fall">Fall</option>
                            </select>
                            
                            <select data-placeholder="Choose a Country..." name="session_year" id="session_year" onChange="" class="select" tabindex="2" required>
                               
                                <option value="<?php echo htmlentities($routine_row['session_year']);?>"><?php echo htmlentities($routine_row['session_year']);?></option>
                                   <?php
                                        $end= 1900;
                                        $start = date("Y");
                                       for( $year = $start ; $year >=$end; $year--){
                                          echo "<option value='$year'>$year</option>";
                                        }
                                       ?> 
                            </select>
                    </div>
                </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Batch: </label>
                            <div class="col-sm-10">
                            <select data-placeholder="Choose a Batch..." name="batch_id" id="batch_id" onChange="" class="select-search" tabindex="2" required >
                               
                                
                                <?php 
                                    $sql = "SELECT * from batches ";
                                    $run=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($run)>0){
                                                                while($row=mysqli_fetch_array($run)){
                                                                    $id=$row['id'];
                                                                    $batch=$row['batch'];
                                                                    if($routine_row['batch_id']==$id)
                                                                    {
                                                                    echo '<option selected value="'.$id.'">'.$batch.'</option>';
                                                                    continue;
                                                                     }
                                                                    else
                                                                    {
                                                                    ?>
                                       
                                 
                                    <option value="<?php echo htmlentities($id);?>"><?php echo htmlentities($batch);?></option>
                                <?php }} }?> 
                            </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Program: </label>
                            <div class="col-sm-10">
                            <select data-placeholder="Choose a Batch..." name="program_id" id="program_id" onChange="get_course();"  class="select-search" tabindex="2" required >
                                
                                <?php 
                                    $sql = "SELECT * from programs ";
                                    $run=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($run)>0){
                                                                while($row=mysqli_fetch_array($run)){
                                                                    $id=$row['id'];
                                                                    $program_name=$row['program_name'];
                                           
                                                                    if($routine_row['p_id']==$id)
                                                                        {
                                                                        echo '<option selected value="'.$id.'">'.$program_name.'</option>';
                                                                        continue;
                                                                         }
                                                                        else
                                                                        {
                                                                        ?>  
                                    <option value="<?php echo htmlentities($id);?>"><?php echo htmlentities($program_name);?></option>
                                <?php }}} ?> 
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Course: </label>
                            <div class="col-sm-10">
                            <select data-placeholder="Choose a Batch..." name="course_id" id="result_course"  class="select-search" tabindex="2" required>
                                
                                 <?php 
                                    $fetch_program_id=$routine_row['p_id'];
                                    $sql = "SELECT * from courses WHERE program_id='$fetch_program_id' ";
                                    $run=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($run)>0){
                                            while($row=mysqli_fetch_array($run)){
                                            $id=$row['id'];
                                            $course=$row['course'];
                                if($routine_row['course_id']==$id)
                                                                        {
                                                                        echo '<option selected value="'.$id.'">'.$course.'</option>';
                                                                        continue;
                                                                         }
                                                                        else
                                                                        {
                                                                        ?>  
                                    <option value="<?php echo htmlentities($id);?>"><?php echo htmlentities($course);?></option>
                                <?php }}} ?>
                            </select>
                            </div>
                        </div>
                         
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Course Teacher: </label> 
                            <div class="col-sm-10">
                                <select data-placeholder="Choose a Faculty..." name="course_teacher_id" id="course_teacher_id" 
                                  onChange="check_teacher_availablity();" class="select-search" tabindex="2" required>
                                   
                                    <?php 
                                    $sql = "SELECT * from faculty ";
                                    $run=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($run)>0){
                                            while($row=mysqli_fetch_array($run)){
                                            $id=$row['id'];
                                            $name=$row['name'];
                                if($routine_row['course_teacher_id']==$id)
                                                                        {
                                                                        echo '<option selected value="'.$id.'">'.$name.'</option>';
                                                                        continue;
                                                                         }
                                                                        else
                                                                        {
                                                                        ?>  
                                    <option value="<?php echo htmlentities($id);?>"><?php echo htmlentities($name);?></option>
                                <?php }}} ?>
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-2 control-label">Day: </label>
                            <div class="col-sm-10">
                                <select class="select" name="day" id="day" onChange="check_teacher_availablity();" tabindex="2" required>
                                    
                                   <option value="<?php echo htmlentities($routine_row['day']);?>"><?php echo htmlentities($routine_row['day']);?></option>
                                   <option value="Saturday">Saturday</option>
                                   <option value="Sunday">Sunday</option>
                                   <option value="Monday">Monday</option>
                                   <option value="Tuesday">Tuesday</option>
                                   <option value="Wednesday">Wednesday</option>
                                   <option value="Thursday">Thursday</option>
                                   <option value="Friday">Friday</option>
                                    
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-2 control-label">Start Time: </label>
                            <div class="col-sm-4">
                                <input class="form-control" type="time" name="start_time" id="start_time" onChange="check_teacher_availablity();" value="<?php echo htmlentities($routine_row['start_time']);?>" required>
                            </div>
                            <label class="col-sm-2 control-label">End Time: </label>
                            <div class="col-sm-4">
                                <input class="form-control" type="time" name="end_time" id="end_time" onChange="check_teacher_availablity();" value="<?php echo htmlentities($routine_row['end_time']);?>" required>
                            </div>
                        </div>
                         
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Room No: </label>
                            <div class="col-sm-10">
                                <input type="text" name="room_no" id="room_no" onChange="check_room()" class="form-control" value="<?php echo htmlentities($routine_row['room_no']);?>" required>
                            </div>
                        </div>                        
                        
                        <div class="text-right">
                           <div class="col-md-6">
                               <span id="restriction_msg" style="font-size:12px; color:red"></span><br>
                            <span id="restriction_msg2" style="font-size:12px; color:red"></span>
                            <span id="restriction_msg3" style="font-size:12px; color:red"></span>
                           </div>
                           <div class="col-md-6">
                               <input type="button" value="check" onclick="check_warning(this);">
                            <input type="submit" name="update" id="add" disabled value="UPDATE" class="btn btn-primary" >
                           </div>
                            
                            
                        </div>
            </form>
                </div>
            </div>
            <!-- /simple chart -->

            <!-- Footer -->
            <?php include 'includes/footer.php';?>
            <!-- /footer -->

        </div>
    </div>

</body>
</html>
<script>
// function for get student name
function get_course() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_course.php",
data:'program_id='+$("#program_id").val(),
type: "POST",
success:function(data){
$("#result_course").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<script>
function check_routine() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_routine.php",
data:{session_year: $("#session_year").val(), session_name: $("#session_name").val(), batch_id: $("#batch_id").val(), program_id: $("#program_id").val(), day: $("#day").val(), start_time: $("#start_time").val(), end_time: $("#end_time").val()},
type: "POST",
success:function(data){
$("#restriction_msg").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<script>
function check_teacher_availablity() {
$("#loaderIcon").show();
    var selected_t_id = document.getElementById("course_teacher_id").value;
    var fetch_t_id= <?php echo $t_id;?>;
    
    if(selected_t_id!=fetch_t_id){
        jQuery.ajax({
url: "check_teacher_availablity.php",
data:{course_teacher_id: $("#course_teacher_id").val(), day: $("#day").val(), start_time: $("#start_time").val(), end_time: $("#end_time").val()},
type: "POST",
success:function(data){
$("#restriction_msg2").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
    }

}
</script> 

<script>
function check_warning(target) {
    if(document.getElementById("restriction_msg").innerText != "" || document.getElementById("restriction_msg2").innerText != "") {
        
        $('#add').prop('disabled',true); 
    }
    else {
        
        $('#add').prop('disabled',false);
    }
}
</script>

<script>
function check_room() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_room.php",
data:{room_no: $("#room_no").val(), start_time: $("#start_time").val(), end_time: $("#end_time").val()},
type: "POST",
success:function(data){
$("#restriction_msg3").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script> 
