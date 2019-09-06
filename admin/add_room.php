<?php include 'includes/session.php';?>
 <?php
if(isset($_POST['add']))
{
$room_no=ucfirst($_POST['room_no']);
$sql = "INSERT INTO `rooms` (`room_no`) VALUES ('$room_no')";
if(mysqli_query($conn,$sql)){
                    $_SESSION['addmsg']="Succesfully Added Room";
                    header('location:manage_room.php');
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
                <h5><i class="fa fa-bars"></i>Rooms</h5>
            </div>
            <!-- /page title -->

                
            <!-- Simple chart -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title">Add New Room</h6>
                </div>
                <div class="panel-body">
                    <div class="graph-standard" id="simple_graph">
                        
            <form class="form-horizontal" method="post" style="width: 400px; margin: auto;  " >
              <br>
              <br>
              <br>
                
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Room No: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="room_no" required="required" >
                            </div>
                        </div>                        
                          
                        <div class="text-right">
                            <input type="submit" name="add" value="ADD ROOM" class="btn btn-primary">
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
