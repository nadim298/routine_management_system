<?php
	include 'includes/db.php';
	ob_start();
	session_start();
	
	if(isset($_POST['change_password'])){
			$email=$_SESSION['email'];

			$new_password=md5($_POST['new_password']);
      $confirm_password=md5($_POST['confirm_password']);

      if($new_password==$confirm_password){
        $user=$_SESSION['user'];
        if($user=="faculty"){
          $update_sql="UPDATE `faculty` SET `password` = '$new_password' WHERE `faculty`.`email` = '$email'";
        }
        else if($user=="student"){
          $update_sql="UPDATE `batches` SET `password` = '$new_password' WHERE `batches`.`cr_email` = '$email'";
        }
            
            if(mysqli_query($conn,$update_sql)){
                echo '<script language="javascript">';
                        echo 'alert("Password successfully changed!")';
                        echo '</script>';
                        header('location:index.php');
            }
        }
        else{
            echo '<script language="javascript">';
                        echo 'alert("New password and confirm password doesnt match!")';
                        echo '</script>';
        }
			
			
		}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/itsbrain/liquid/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2019 12:02:47 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<?php include 'includes/head.php';?>

<body >
    <!-- Page header -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="logo"><a href="index-2.html" title=""><img src="images/logo.png" alt=""></a></div>
        </div>
    </div>
    <!-- /page header -->
    

    <!-- Page container -->
    <div class="page-container container-fluid" >    
        <!-- Page content -->
        <div class="row">            
           <div class="row" style="background-image:url(images/signin.jpg); background-size: cover;">
               
            <form class="form-horizontal" method="post" style="width: 400px; margin: auto;  " >
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
                <div class="panel panel-default">
                    <div class="panel-heading"><h6 class="panel-title">Faculty Change Password</h6></div>
                    <br>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">New Password: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="new_password" value="">
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Confirm Password: </label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="confirm_password" >
                            </div>
                        </div>   
                        <div class="text-right">
                            <input type="submit" name="change_password" value="Change Password" class="btn btn-primary">
                        </div>
                        <br>
                    </div>                    
                </div>
            </form>
            <a class="btn btn-block" href="forget_password.php">Forget Password</a>
              <br>
               <br>
               <br>
               <br>
               <br>
           </div>

            <!-- Footer -->
            <div class="footer">
                &copy; Copyright 2019. All rights reserved.
            </div>
            <!-- /footer -->

        </div>
    </div>

</body>

<!-- Mirrored from demo.interface.club/itsbrain/liquid/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2019 12:05:31 GMT -->
</html>
