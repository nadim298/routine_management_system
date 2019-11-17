
<?php
    include 'includes/db.php';
ob_start();
  session_start();
if(isset($_POST['submit']))
{

$length = 4;
$randomletter = substr(str_shuffle("123456789"), 0, $length);
$_SESSION['randomletter']=$randomletter;


$email=$_POST['email'];

$user=$_GET['user'];
$_SESSION['user']=$user;

$search_on_user_table="";
if($user=="faculty"){
  $search_on_user_table = "SELECT * from faculty WHERE email='$email' ";
}
else if ($user=="student") {
  $search_on_user_table = "SELECT * from batches WHERE cr_email='$email' ";
}


$search_on_user_table_run=mysqli_query($conn,$search_on_user_table);
                                        if(mysqli_num_rows($search_on_user_table_run)>0){
                                          $_SESSION['email']=$email;
                                          //send email
                                          header('location:send_email.php');

                                          $search_on_email_verification = "SELECT * from email_verification WHERE email='$email' ";
                                          $run=mysqli_query($conn,$search_on_email_verification);
                                        if(mysqli_num_rows($run)>0){
                                          //update
                                          $update_sql="UPDATE `email_verification` SET  `otp` = '$randomletter' WHERE `email_verification`.`email` = '$email'";
                                            if(mysqli_query($conn,$update_sql)){
                                                echo '<script language="javascript">';
                                                        echo 'alert("otp updated")';
                                                        echo '</script>';

                                                        
                                                
                                            }
                                      }
                                      else{
                                        //insert
                                        $insert_sql="INSERT INTO `email_verification` (`email`,`otp`) VALUES ('$email','$randomletter')";
                                        if(mysqli_query($conn,$insert_sql)){
                                                echo '<script language="javascript">';
                                                        echo 'alert("otp inserted")';
                                                        echo '</script>';

                                                    
                                      }
                                      $_SESSION['send_status']="OTP has been sent";
                                        }
                                      }
                                        else{
                                          echo '<script language="javascript">';
                                                        echo 'alert("This email address doesnt exist")';
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
               
            <div  style="width: 400px; margin: auto;  " >
               <form class="form-horizontal" method="post" style="width: 400px; margin: auto;  " >
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
                <div class="panel panel-default">
                    <div class="panel-heading"><h6 class="panel-title">Fill all fields</h6></div>
                    <br>
                    <div class="panel-body">
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email Address: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" required>
                            </div>
                        </div>   
                        <div class="text-right">
                            <input type="submit" name="submit" value="SUBMIT" class="btn btn-primary">
                        </div>
                        <br>
                    </div>                    
                </div>
            </form>
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
