<?php include 'includes/session.php';?>
<?php		
$edit_id=$_GET['edit_id'];
$query="SELECT * FROM programs where id=$edit_id";
$run=mysqli_query($conn,$query);
$row=mysqli_fetch_array($run);		
?>
		
 <?php
if(isset($_POST['update']))
{
$program_name=$_POST['program_name'];
$sql = "UPDATE `programs` SET `program_name` = '$program_name' WHERE `programs`.`id` = $edit_id";
if(mysqli_query($conn,$sql)){
                    $_SESSION['updatemsg']="Succesfully Updated Program";
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
                <h5><i class="fa fa-bars"></i>Faculty</h5>
            </div>
            <!-- /page title -->

                
            <!-- Simple chart -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title">Update Faculty</h6>
                </div>
                <div class="panel-body">
                    <div class="graph-standard" id="simple_graph">
                        
            <form class="form-horizontal" method="post" style="width: 400px; margin: auto;  " >
              <br>
              <br>
              <br>
                
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="program_name" value="<?php echo $row['program_name'];?>" required="required">
                            </div>
                        </div>                        
                          
                        <div class="text-right">
                            <input type="submit" name="update" value="UPDATE" class="btn btn-primary">
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
