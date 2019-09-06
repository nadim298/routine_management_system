<?php include 'includes/session.php';?>
 <?php
if(isset($_POST['add']))
{
$course=$_POST['course_code'].",".ucwords($_POST['course_name']);
$program_id=$_POST['program_id'];
$sql = "INSERT INTO `courses` (`course`,`program_id`) VALUES ('$course','$program_id')";
if(mysqli_query($conn,$sql)){
                    $_SESSION['addmsg']="Succesfully Added Course";
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
                <h5><i class="fa fa-bars"></i>Courses</h5>
            </div>
            <!-- /page title -->

                
            <!-- Simple chart -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title">Add New Course</h6>
                </div>
                <div class="panel-body">
                        
            <form class="form-horizontal" method="post" style="width: 400px; margin: auto;" >
              <br>
              <br>
              <br>
                
                       <div class="form-group">
                            <label class="col-sm-2 control-label">Course Code: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="course_code" required="required" >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Course Name: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="course_name" required="required" onkeyup="lettersOnly(this)">
                            </div>
                        </div>
                         
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Program: </label>
                            <div class="col-sm-10">
                            <select data-placeholder="Choose a Program..." name="program_id" class="select-search" tabindex="2" required="required">
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
                          
                        <div class="text-right">
                            <input type="submit" name="add" value="ADD COURSE" class="btn btn-primary">
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

