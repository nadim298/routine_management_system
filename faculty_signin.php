<?php
	include 'includes/db.php';
	ob_start();
	session_start();
	
	if(isset($_POST['signin'])){
			$email=$_POST['email'];
			$password=md5($_POST['password']);
			
			$query="SELECT * FROM faculty WHERE email='$email' AND password='$password'";
            $run=mysqli_query($conn,$query);
            if(mysqli_num_rows($run)>0){
							$row=mysqli_fetch_array($run);
								
                
                $_SESSION['email']=$email;
				header('location:faculty/dashboard.php');
			}
			else{
				echo '<script language="javascript">';
                        echo 'alert("Invalid details!")';
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
                    <div class="panel-heading"><h6 class="panel-title">Faculty Sign In</h6></div>
                    <br>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Emal: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>">
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password: </label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" >
                            </div>
                        </div>   
                        <div class="text-right">
                            <input type="submit" name="signin" value="SIGN IN" class="btn btn-primary">
                        </div>
                        <br>
                    </div>                    
                </div>
            </form>
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
