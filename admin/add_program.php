<?php include 'includes/session.php';?>
 <?php
if(isset($_POST['add']))
{
$program_name=ucfirst($_POST['program_name']);
$sql = "INSERT INTO `programs` (`program_name`) VALUES ('$program_name')";
if(mysqli_query($conn,$sql)){
                    $_SESSION['addmsg']="Succesfully Added Program";
                    header('location:manage_program.php');
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
                <h5><i class="fa fa-bars"></i>Programs</h5>
            </div>
            <!-- /page title -->

                
            <!-- Simple chart -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title">Add New Program</h6>
                </div>
                <div class="panel-body">
                    <div class="graph-standard" id="simple_graph">
                        
            <form class="form-horizontal" method="post" style="width: 400px; margin: auto;  " >
              <br>
              <br>
              <br>
                
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Program Name: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="program_name" required="required" onkeyup="lettersOnly(this)">
                            </div>
                        </div>                        
                          
                        <div class="text-right">
                            <input type="submit" name="add" value="ADD PROGRAM" class="btn btn-primary">
                        </div>
            </form>
                    </div>
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
