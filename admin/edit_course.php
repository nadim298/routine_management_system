<?php include 'includes/session.php';?>
<?php		
$edit_id=$_GET['edit_id'];
$query="SELECT courses.id,courses.course,programs.id as program_id,programs.program_name from courses join programs on programs.id=courses.program_id where courses.id=$edit_id";
$run=mysqli_query($conn,$query);
$row=mysqli_fetch_array($run);
$course=explode(",",$row['course']);
$course_code=$course[0];
$course_name=$course[1];
?>
		
 <?php
if(isset($_POST['update']))
{
$course=$_POST['course_code'].",".ucwords($_POST['course_name']);
$program_id=$_POST['program_id'];
$sql = "UPDATE `courses` SET `course` = '$course', `program_id` = '$program_id' WHERE `courses`.`id` = $edit_id";
if(mysqli_query($conn,$sql)){
                    $_SESSION['updatemsg']="Succesfully Updated Course";
                    header('location:manage_course.php');
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
                        
            <form class="form-horizontal" method="post" style="width: 400px; margin: auto;  " >
              <br>
              <br>
              <br>
                
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Course Code: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="course_code" value="<?php echo $course_code;?>" required="required" >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Course Name: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="course_name" required="required" value="<?php echo $course_name;?>" onkeyup="lettersOnly(this)">
                            </div>
                        </div>
                         
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Program: </label>
                            <div class="col-sm-10">
                            <select data-placeholder="Choose a Program..." name="program_id" class="select-search" tabindex="2" required="required">
                                <option value="<?php echo htmlentities($row['program_id']);?>"> <?php echo htmlentities($selected_program_name=$row['program_name']);?></option>
                                    <?php 
                                    $sql = "SELECT * from programs";
                                    $run=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($run)>0){
                                                                while($row=mysqli_fetch_array($run)){
                                                                    $program_id=$row['id'];
                                                                    $program_name=$row['program_name'];
                                       if($selected_program_name==$program_name)
                                    {
                                    continue;
                                    }
                                    else
                                    {
                                        ?>  
                                    <option value="<?php echo htmlentities($program_id);?>"><?php echo htmlentities($program_name);?></option>
                                     <?php }}} ?> 
                            </select>
                            </div>
                        </div>                        
                          
                        <div class="text-right">
                            <input type="submit" name="update" value="UPDATE" class="btn btn-primary">
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
