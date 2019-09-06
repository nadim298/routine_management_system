<?php include 'includes/session.php';?>
<?php
if(isset($_GET['edit_id'])){
$edit_id=$_GET['edit_id'];
$select_query="SELECT * FROM trimester where id=$edit_id";
$select_run=mysqli_query($conn,$select_query);
$select_row=mysqli_fetch_array($select_run);
}
?>
		
 <?php
if(isset($_POST['update_trimester']))
{
$session=$_POST['session'];
    
$start_date=$_POST['start_date'];
 
    
$end_date=$_POST['end_date'];
$sql = "UPDATE `trimester` SET `session` = '$session', `start_date` = '$start_date', `end_date` = '$end_date' WHERE `trimester`.`id` = $edit_id";
if(mysqli_query($conn,$sql)){
                    $_SESSION['updatemsg']="Succesfully Updated Trimester";
                    
                }
                
}
?>
<?php
if(isset($_GET['delete_id'])){
    $delete_id=$_GET['delete_id'];
    $delete_query="DELETE FROM `trimester` WHERE `trimester`.`id` = $delete_id";
    if(mysqli_query($conn,$delete_query)){
        $_SESSION['delmsg']="Trimester deleted Successfully";
    }
else
    $_SESSION['delmsg']="Failed to delete";
				
}
?>
 <?php
if(isset($_POST['start_trimester']))
{
    
$session=$_POST['session'];
    
$start_date=$_POST['start_date'];
 
    
$end_date=$_POST['end_date'];
    $update_sql="UPDATE `trimester` SET `status` = '0' WHERE `trimester`.`status` = 1";
    mysqli_query($conn,$update_sql);
        $sql = "INSERT INTO `trimester` (`session`, `start_date`, `end_date`, `status`) VALUES ('$session', '$start_date', '$end_date', '1')";
if(mysqli_query($conn,$sql)){
                    
                    $_SESSION['addtrimestermsg']="New trimester started";
                    
                    
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
                    <h6 class="panel-title">Trimester</h6>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="form-horizontal" method="post"  >
                     
                      <?php
                        if(isset($_SESSION['addtrimestermsg']) && !empty($_SESSION['addtrimestermsg'])){
                            ?>
                            <div class="alert alert-success">
                            <?php echo $_SESSION['addtrimestermsg'];?>
                        </div>
                            <?php
                            $_SESSION['addtrimestermsg']="";
                        }
                        ?>
                        <?php
                        if(isset($_SESSION['updatemsg']) && !empty($_SESSION['updatemsg'])){
                            ?>
                            <div class="alert alert-success">
                            <?php echo $_SESSION['updatemsg'];?>
                        </div>
                            <?php
                            $_SESSION['updatemsg']="";
                        }
                        ?>
                      <br>
                        
                        <div class="form-group">
                        <label class="col-sm-2 control-label">Trimester: </label>
                        <div class="col-sm-5">
                            <select data-placeholder="Choose a Country..." name="session" class="form-control select" tabindex="2" required>
                               <?php if(isset($_GET['edit_id'])){
                                echo '<option value="'.$select_row['id'].'">'.$select_row['session'].'</option>';
                                    }
                                else{
                                    
                                ?>
                                <option value="">--Select Session--</option>
                                <?php
                                
                                }
                                    ?>
                                
                                    <?php
                                        $end= 1900;
                                        $start = date("Y");
                                       for( $year = $start ; $year >=$end; $year--){
                                          echo "<option value='Spring $year'>Spring $year</option>";
                                          echo "<option value='Summer $year'>Summer $year</option>";
                                          echo "<option value='Fall $year'>Fall $year</option>";
                                        }
                                       ?>
                                
                                
                            </select>
                            
                            
                    </div>
                </div>
                        
                        <div class="form-group" id="dateformat">
                            <label class="col-sm-2 control-label">Trimester Start Date: </label>
                            <div class="col-sm-5">
                                <input class="form-control" type="date" name="start_date" id="startingdate" data-date-format="DD MMMM YYYY" value="<?php if(isset($_GET['edit_id'])){
                                echo date($select_row['start_date']);
}
    else
    echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="form-group" id="dateformat">
                            <label class="col-sm-2 control-label">Trimester End Date: </label>
                            <div class="col-sm-5">
                                <input class="form-control" type="date" name="end_date" required value="<?php if(isset($_GET['edit_id'])){
                                echo date($select_row['end_date']);
} ?>">
                            </div>
                        </div>
                                               
                        
                        <div class="text-right">
                           <div class="col-md-6">
                               
                            <input type="submit" name="<?php if(isset($_GET['edit_id'])){echo "update_trimester";} else echo "start_trimester";?>" id="add" value="<?php if(isset($_GET['edit_id'])){echo "Update Trimester";} else echo "Start Trimester";?>" class="btn btn-primary" >
                           </div>
                            
                            
                        </div>
            </form>
                        </div>
                        <div class="col-md-6">
                           <center><h3><u>Running Trimester</u></h3></center>
                            <div class="datatable">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Trimester</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $count=1;
                            $query="SELECT * FROM trimester where status=1";
                            $run=mysqli_query($conn,$query);              
                                if(mysqli_num_rows($run)>0){
                                    while($row=mysqli_fetch_array($run)){
                            ?>  
                            <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo $row['session'];?></td>
                                <td><?php echo $row['start_date'];?></td>
                                <td><?php echo $row['end_date'];?></td>
                                <td>
                                <a href="start_trimester.php?edit_id=<?php echo $row['id'];?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="start_trimester.php?delete_id=<?php echo $row['id'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this trimester?');">Delete</a>
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

