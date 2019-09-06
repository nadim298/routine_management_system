<?php include 'includes/session.php';?>
<?php
if(isset($_GET['delete_id'])){
    $delete_id=$_GET['delete_id'];
    $delete_query="DELETE FROM `rooms` WHERE `rooms`.`id` = $delete_id";
    if(mysqli_query($conn,$delete_query)){
        $_SESSION['delmsg']="Room deleted Successfully";
    }
else
    $_SESSION['delmsg']="Failed to delete";
				
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
                <div class="panel-heading"><h6 class="panel-title">Manage Rooms</h6>
                <?php if(isset($_SESSION['delmsg'])&& !empty($_SESSION['delmsg']))
                    {?>
                    <span class="pull-right" style="color:red; margin-top:7px;"><b>* * * <?php echo htmlentities($_SESSION['delmsg']);?> * * *</b></span>
                    <?php echo htmlentities($_SESSION['delmsg']="");
                    }
                ?>
                <?php if(isset($_SESSION['addmsg'])&& !empty($_SESSION['addmsg']))
                    {?>
                    <span class="pull-right" style="color:green; margin-top:7px;"><b>* * * <?php echo htmlentities($_SESSION['addmsg']);?> * * *</b></span>
                    <?php echo htmlentities($_SESSION['addmsg']="");
                    }
                ?>
                <?php if(isset($_SESSION['updatemsg'])&& !empty($_SESSION['updatemsg']))
                    {?>
                    <span class="pull-right" style="color:green; margin-top:7px;"><b>* * * <?php echo htmlentities($_SESSION['updatemsg']);?> * * *</b></span>
                    <?php echo htmlentities($_SESSION['updatemsg']="");
                    }
                ?>
                </div>
                <div class="datatable">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Room No</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $count=1;
                            $query="SELECT * FROM rooms";
                            $run=mysqli_query($conn,$query);              
                                if(mysqli_num_rows($run)>0){
                                    while($row=mysqli_fetch_array($run)){
                            ?>  
                            <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo $row['room_no'];?></td>
                                <td>
                                <a href="edit_room.php?edit_id=<?php echo $row['id'];?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="manage_room.php?delete_id=<?php echo $row['id'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to remove this room?');">Delete</a>
                                </td>
                            </tr>
                            <?php
                                    $count++;
                                    }
                                }
    
                            ?>
                        </tbody>
                    </table>
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
