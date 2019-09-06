<?php include 'includes/session.php';?>
<?php		
$edit_id=$_GET['edit_id'];
$query="SELECT batches.id, batches.batch,batches.cr_email, programs.program_name FROM batches join programs on programs.id=batches.program_id where batches.id=$edit_id";
$run=mysqli_query($conn,$query);
$row=mysqli_fetch_array($run);		
?>
		
 <?php
if(isset($_POST['update']))
{
$batch=$_POST['batch'];
$program_id=$_POST['program_id'];
$cr_email=$_POST['cr_email'];
$sql = "UPDATE `batches` SET `batch` = '$batch', `program_id` = '$program_id', `cr_email` = '$cr_email' WHERE `batches`.`id` = $edit_id";
if(mysqli_query($conn,$sql)){
                    $_SESSION['updatemsg']="Succesfully Updated Batch";
                    header('location:manage_batch.php');
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
                    <div class="" id="simple_graph">
                        
            <form class="form-horizontal" method="post" style="width: 400px; margin: auto;  " >
              <br>
              <br>
              <br>
                
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Batch: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="batch" value="<?php echo $row['batch'];?>" required="required">
                            </div>
                        </div> 
                         <div class="form-group">
                            <label class="col-sm-2 control-label">Program: </label>
                            <div class="col-sm-10">
                            <select  name="program_id"  class="form-control select-search" tabindex="2" required >
                                <option value=""><?php echo $row['program_name'];?></option>
                                <?php 
                                    $sql = "SELECT * from programs ";
                                    $run=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($run)>0){
                                                                while($program_row=mysqli_fetch_array($run)){
                                                                    $id=$program_row['id'];
                                                                    $program_name=$program_row['program_name'];
                                                                    
                                                ?>
                                                <option selected value="<?php echo htmlentities($id);?>"><?php echo htmlentities($program_name);?></option>
                                                <?php
                                            }
                                        }
                                ?>  
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">CR's Email: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="cr_email" value="<?php echo $row['cr_email'];?>" required="required">
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
