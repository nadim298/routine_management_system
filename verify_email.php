
<?php
    include 'includes/db.php';
    ob_start();
  session_start();
    $email=$_SESSION['email'];
    if(isset($_POST['submit']))
{
  $otp=$_POST['otp'];
  $search_on_email_verification = "SELECT * from email_verification WHERE email='$email' AND otp='$otp'";
  $run=mysqli_query($conn,$search_on_email_verification);
    if(mysqli_num_rows($run)>0){
      //change pass
      header('location:change_password.php');
    }
    else{
      echo '<script language="javascript">';
      echo 'alert("OTP doesnt matched")';
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
                            <label class="col-sm-2 control-label">OTP Code: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="otp" required>
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
