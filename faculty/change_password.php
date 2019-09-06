<?php include 'includes/session.php';?>

 <?php
    
if(isset($_POST['update']))
{
$old_password=md5($_POST['old_password']);
$new_password=md5($_POST['new_password']);
$confirm_password=md5($_POST['confirm_password']);
    $check_pass_sql="select password from faculty where id='$faculty_id'";
    $run=mysqli_query($conn,$check_pass_sql);
    $row=mysqli_fetch_array($run);
    $get_password=$row['password'];
    if($old_password==$get_password){
        if($new_password==$confirm_password){
            $update_sql="UPDATE `faculty` SET `password` = '$new_password' WHERE `faculty`.`id` = '$faculty_id'";
            if(mysqli_query($conn,$update_sql)){
                echo '<script language="javascript">';
                        echo 'alert("Password successfully changed!")';
                        echo '</script>';
            }
        }
        else{
            echo '<script language="javascript">';
                        echo 'alert("New password and confirm password doesnt match!")';
                        echo '</script>';
        }
    }
    else{
        echo '<script language="javascript">';
                        echo 'alert("Wrong Old Password!")';
                        echo '</script>';
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
                <h5><i class="fa fa-bars"></i>Setting</h5>
            </div>
            <!-- /page title -->

                
            <!-- Simple chart -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title">Change Password</h6>
                    
                </div>
                <div class="panel-body">                        
                    <form class="form-horizontal" method="post" style="width: 400px; margin: auto;  " >
               
               <br>
                <div class="panel panel-default">
                    <div class="panel-heading"><h6 class="panel-title">Fill all fields</h6></div>
                    <br>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Old Password: </label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="old_password" value="<?php if(isset($_POST['old_password'])){echo $_POST['old_password'];}?>" required>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">New Password: </label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="new_password" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Confirm Password: </label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="confirm_password" required>
                            </div>
                        </div>   
                        <div class="text-right">
                            <input type="submit" name="update" value="UPDATE" class="btn btn-primary">
                        </div>
                        <br>
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
 
