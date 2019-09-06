<?php include 'includes/session.php';?>

 <?php
$get_day=$_GET['day'];
$get_period=$_GET['period'];
    
if(isset($_POST['add']))
{
$batch_id=$_POST['batch_id'];
$program_id=$_POST['program_id'];
$course_id=$_POST['course_id'];
$day=$_POST['day'];
$period=$_POST['period'];
$room_no=$_POST['room_no'];
    
        $sql = "INSERT INTO `routine` (`batch_id`, `p_id`, `course_id`, `day`, `period`, `room_no`, `course_teacher_id`, `trimester_id`, `status`) VALUES ('$batch_id', '$program_id', '$course_id', '$day', '$period', '$room_no', '$faculty_id', '$trimester_id', '0')";
if(mysqli_query($conn,$sql)){
                    $_SESSION['addmsg']="Succesfully Added Routine";
                    header('location:dashboard.php');
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
                <h5><i class="fa fa-bars"></i>Routines</h5>
            </div>
            <!-- /page title -->

                
            <!-- Simple chart -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title">Add New Routine</h6>
                    
                </div>
                <div class="panel-body">                        
                    <form class="form-horizontal" method="post" style="width: 500px; margin: auto;" >
                      <br>
                      <br>
                      <br>
                
                       <div class="form-group">
                            <label class="col-sm-2 control-label">Program: </label>
                            <div class="col-sm-10">
                            <select data-placeholder="Choose a Batch..." name="program_id" id="program_id" onChange="get_course(); get_batch();"  class="select-search" tabindex="2" required >
                                <option value="">--Select Program--</option>
                                <?php 
                                    $sql = "SELECT * from programs ";
                                    $run=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($run)>0){
                                                                while($row=mysqli_fetch_array($run)){
                                                                    $id=$row['id'];
                                                                    $program_name=$row['program_name'];
                                                                    
                                ?>  
                                    <option value="<?php echo htmlentities($id);?>"><?php echo htmlentities($program_name);?></option>
                                <?php }} ?> 
                            </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Available Batch: </label>
                            <div class="col-sm-10">
                            <select data-placeholder="Choose a Batch..." name="batch_id" id="result_batch" disabled class="select-search" tabindex="2" required >
                               
                                <option value="">--Select Batch--</option>
                                
                            </select>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Course: </label>
                            <div class="col-sm-10">
                            <select data-placeholder="Choose a Batch..." name="course_id" id="result_course" disabled  class="select-search" tabindex="2" required>
                                <option value="">--Select Course--</option>
                                 
                            </select>
                            </div>
                        </div>
                         
                        
                         <div class="form-group">
                            <label class="col-sm-2 control-label">Day: </label>
                            <div class="col-sm-10">
                                <select class="select" name="day" id="day" onChange="" tabindex="2" required>
                                    <?php
                                    if(isset($_GET['day'])){
                                        $day=$_GET['day'];
                                        echo '<option selected value="'.$day.'">'.$day.'</option>';
                                        }
                                    
                                    ?>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Class Time: </label>
                            <div class="col-sm-10">
                                <select class="select" name="period" id="period" onChange="" tabindex="2" required>
                                    <?php
                                    if(isset($_GET['period'])){
                                        $period=intval($_GET['period']);
                                        
                                        switch($period){
                                            case 1:
                                                {
                                                    echo '<option selected value="1">8:30-9:15</option>';
                                                    break;
                                                }
                                                case 2:
                                                {
                                                    echo '<option selected value="2">9:15-10:30</option>';
                                                    break;
                                                }
                                                case 3:
                                                {
                                                    echo '<option selected value="3">10:30-11:45</option>';
                                                    break;
                                                }
                                                case 4:
                                                {
                                                    echo '<option selected value="4">11:45-1:00</option>';
                                                    break;
                                                }
                                                case 5:
                                                {
                                                    echo '<option selected value="5">1:00-2:15</option>';
                                                    break;
                                                }
                                                case 6:
                                                {
                                                    echo '<option selected value="6">2:15-3:30</option>';
                                                    break;
                                                }
                                                case 7:
                                                {
                                                    echo '<option selected value="7">3:30-4:45</option>';
                                                    break;
                                                }
                                                case 8:
                                                {
                                                    echo '<option selected value="8">4:45-6:00</option>';
                                                    break;
                                                }
                                        }
                                        
                                        }
                                    
                                    ?>
                                    
                                </select>
                            </div>
                        </div>
                         
                         
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Available Rooms: </label>
                            <div class="col-sm-10">
                            <select name="room_no" class="select-search" tabindex="2" required >
                               
                                <option value="">--Select Room--</option>
                                <?php 
                                    $sql = "SELECT * from rooms WHERE id NOT IN (SELECT room_no from routine where period='$get_period' AND day='$get_day') ";
                                    $run=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($run)>0){
                                                                while($row=mysqli_fetch_array($run)){
                                                                    $id=$row['id'];
                                                                    $room_no=$row['room_no'];
                                ?>  
                                    <option value="<?php echo htmlentities($id);?>"><?php echo htmlentities($room_no);?></option>
                                <?php }}
                                else{
                                    echo "<option value=''>No room available!</option>";
                                }
                                ?> 
                            </select>
                            </div>
                        </div>                        
                        
                        <div class="text-right">
                           <div class="col-md-6">
                           </div>
                           <div class="col-md-6">
                            <input type="submit" name="add" id="add" value="ADD BATCH" class="btn btn-primary" >
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
// function for get student name
function get_batch() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_batch.php",
data:{day: $("#day").val(), period: $("#period").val(), program_id: $("#program_id").val()},
type: "POST",
success:function(data){
$("#result_batch").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
 
