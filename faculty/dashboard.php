<?php include 'includes/session.php';?>

<?php 
$main_query="SELECT routine.id,batches.batch,courses.course,programs.program_name,rooms.room_no from routine join courses on courses.id=routine.course_id join programs on programs.id=routine.p_id join batches on batches.id=routine.batch_id join rooms on rooms.id=routine.room_no WHERE trimester_id='$trimester_id' AND course_teacher_id='$faculty_id' ";
?>
<?php
    if(isset($_POST['submit']))
{
    
        $sql = "INSERT INTO `requests` (`faculty_id`, `trimester_id`, `status`) VALUES ('$faculty_id', '$trimester_id', '0')";
if(mysqli_query($conn,$sql)){
                    
                    header('location:dashboard.php');
                }
    }
?>
<?php
if(isset($_GET['delete_id'])){
    $delete_id=$_GET['delete_id'];
    $delete_query="DELETE FROM `routine` WHERE `routine`.`id` = $delete_id";
    if(mysqli_query($conn,$delete_query)){
        $_SESSION['delmsg']="Deleted Successfully";
    }
else
    $_SESSION['delmsg']="Failed to delete";
				
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/itsbrain/liquid/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 May 2019 12:02:47 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
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

                <div align="center">
                    <table class="table table-bordered">
                       <br>
                       <?php
                        if($trimester_validity==1){
                            echo "<span style='font-weight: bold; color: green;'>New Trimester has been started.You can submit your routine till 10/15/2019</span>";
                        }
                        ?>
                    
                        <caption>
                            <h2>ROUTINE</h2>
                        </caption>
                        <tr style="border-bottom:1px #DDDDDD solid;">
                            <th></th>
                            <th>
                                <div align="center">8:30-9:15</div>
                            </th>
                            <th>
                                <div align="center">9:15-10:30</div>
                            </th>
                            <th>
                                <div align="center">10:30-11:45</div>
                            </th>
                            <th>
                                <div align="center">11:45-1:00</div>
                            </th>
                            <th>
                                <div align="center">1:00-2:15</div>
                            </th>
                            <th>
                                <div align="center">2:15-3:30</div>
                            </th>
                            <th>
                                <div align="center">3:30-4:45</div>
                            </th>
                            <th>
                                <div align="center">4:45-6:00</div>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <div align="center">Saturday</div>
                            </th>
                            <?php
        $query_add_day=$main_query."AND day='Saturday' ";
        ?>
                            <?php
            
            for($i=1;$i<9;$i++){
                    $sql=$query_add_day."AND period='$i'";
                    $run=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($run)>0){
                        $row=mysqli_fetch_array($run);
                        ?>
                            <td>
                                <div align="center">
                                    <span style="color:brown"><?php echo $row['course'];?> <br> </span>
                                    <span style="color:blue"><?php echo $row['program_name'];?> <br></span>
                                    <b>Batch: </b><span style="color:blue"><?php echo $row['batch'];?> <br></span>
                                    <b>Room: </b><span style="color:blue"><?php echo $row['room_no'];?> <br></span>
                                    <?php
                                    if($trimester_validity==1){
                                        if($routine_request==0){
                                        ?>
                                        <div class="btn-group">
                                        <a href="dashboard.php?delete_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this?');"><i title="Delete" style="cursor:pointer; color:red;" class="fa fa-times form-control-feedback"></i></a>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                
                            </td>
                            <?php
                    }
                else{
                ?>
                            <td>
                                <?php
                                if($trimester_validity==1){
                                    if($routine_request==0){
                                ?>
                                <div align="center"> <a href="add_routine.php?day=Saturday&period=<?php echo $i;?>"><img style="height:30x; width:30px;" src="images/add-icon.png" alt=""></a>
                                </div>
                                    <?php
                                    }
                                }
                                ?>
                            </td>
                            <?php
                }
                $sql="";
            }
        ?>


                        </tr>
                        <tr>
                            <th>
                                <div align="center">Sunday</div>
                            </th>
                            <?php
        $query_add_day=$main_query."AND day='Sunday' ";
        ?>
                            <?php
            
            for($i=1;$i<9;$i++){
                    $sql=$query_add_day."AND period='$i'";
                    $run=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($run)>0){
                        $row=mysqli_fetch_array($run);
                        ?>
                            <td>
                                <div align="center">
                                    <span style="color:brown"><?php echo $row['course'];?> <br> </span>
                                    <span style="color:blue"><?php echo $row['program_name'];?> <br></span>
                                    <b>Batch: </b><span style="color:blue"><?php echo $row['batch'];?> <br></span>
                                    <b>Room: </b><span style="color:blue"><?php echo $row['room_no'];?> <br></span>
                                    <?php
                                    if($trimester_validity==1){
                                        if($routine_request==0){
                                        ?>
                                        <div class="btn-group">
                                        <a href="dashboard.php?delete_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this?');"><i title="Delete" style="cursor:pointer; color:red;" class="fa fa-times form-control-feedback"></i></a>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                
                            </td>
                            <?php
                    }
                else{
                ?>
                            <td>
                                <?php
                                if($trimester_validity==1){
                                    if($routine_request==0){
                                ?>
                                <div align="center"> <a href="add_routine.php?day=Sunday&period=<?php echo $i;?>"><img style="height:30x; width:30px;" src="images/add-icon.png" alt=""></a>
                                </div>
                                    <?php
                                    }
                                }
                                ?>
                            </td>
                            <?php
                }
                $sql="";
            }
        ?>


                        </tr>
                        <tr>
                            <th>
                                <div align="center">Monday</div>
                            </th>
                            <?php
        $query_add_day=$main_query."AND day='Monday' ";
        ?>
                            <?php
            
            for($i=1;$i<9;$i++){
                    $sql=$query_add_day."AND period='$i'";
                    $run=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($run)>0){
                        $row=mysqli_fetch_array($run);
                        ?>
                            <td>
                                <div align="center">
                                    <span style="color:brown"><?php echo $row['course'];?> <br> </span>
                                    <span style="color:blue"><?php echo $row['program_name'];?> <br></span>
                                    <b>Batch: </b><span style="color:blue"><?php echo $row['batch'];?> <br></span>
                                    <b>Room: </b><span style="color:blue"><?php echo $row['room_no'];?> <br></span>
                                    <?php
                                    if($trimester_validity==1){
                                        if($routine_request==0){
                                        ?>
                                        <div class="btn-group">
                                        <a href="dashboard.php?delete_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this?');"><i title="Delete" style="cursor:pointer; color:red;" class="fa fa-times form-control-feedback"></i></a>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                
                            </td>
                            <?php
                    }
                else{
                ?>
                            <td>
                                <?php
                                if($trimester_validity==1){
                                    if($routine_request==0){
                                ?>
                                <div align="center"> <a href="add_routine.php?day=Monday&period=<?php echo $i;?>"><img style="height:30x; width:30px;" src="images/add-icon.png" alt=""></a>
                                </div>
                                    <?php
                                    }
                                }
                                ?>
                            </td>
                            <?php
                }
                $sql="";
            }
        ?>


                        </tr>
                        <tr>
                            <th>
                                <div align="center">Tuesday</div>
                            </th>
                            <?php
        $query_add_day=$main_query."AND day='Tuesday' ";
        ?>
                            <?php
            
            for($i=1;$i<9;$i++){
                    $sql=$query_add_day."AND period='$i'";
                    $run=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($run)>0){
                        $row=mysqli_fetch_array($run);
                        ?>
                            <td>
                                <div align="center">
                                    <span style="color:brown"><?php echo $row['course'];?> <br> </span>
                                    <span style="color:blue"><?php echo $row['program_name'];?> <br></span>
                                    <b>Batch: </b><span style="color:blue"><?php echo $row['batch'];?> <br></span>
                                    <b>Room: </b><span style="color:blue"><?php echo $row['room_no'];?> <br></span>
                                    <?php
                                    if($trimester_validity==1){
                                        if($routine_request==0){
                                        ?>
                                        <div class="btn-group">
                                        <a href="dashboard.php?delete_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this?');"><i title="Delete" style="cursor:pointer; color:red;" class="fa fa-times form-control-feedback"></i></a>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                
                            </td>
                            <?php
                    }
                else{
                ?>
                            <td>
                                <?php
                                if($trimester_validity==1){
                                    if($routine_request==0){
                                ?>
                                <div align="center"> <a href="add_routine.php?day=Tuesday&period=<?php echo $i;?>"><img style="height:30x; width:30px;" src="images/add-icon.png" alt=""></a>
                                </div>
                                    <?php
                                    }
                                }
                                ?>
                            </td>
                            <?php
                }
                $sql="";
            }
        ?>


                        </tr>
                        <tr>
                            <th>
                                <div align="center">Wednesday</div>
                            </th>
                            <?php
        $query_add_day=$main_query."AND day='Wednesday' ";
        ?>
                            <?php
            
            for($i=1;$i<9;$i++){
                    $sql=$query_add_day."AND period='$i'";
                    $run=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($run)>0){
                        $row=mysqli_fetch_array($run);
                        ?>
                            <td>
                                <div align="center">
                                    <span style="color:brown"><?php echo $row['course'];?> <br> </span>
                                    <span style="color:blue"><?php echo $row['program_name'];?> <br></span>
                                    <b>Batch: </b><span style="color:blue"><?php echo $row['batch'];?> <br></span>
                                    <b>Room: </b><span style="color:blue"><?php echo $row['room_no'];?> <br></span>
                                    <?php
                                    if($trimester_validity==1){
                                        if($routine_request==0){
                                        ?>
                                        <div class="btn-group">
                                        <a href="dashboard.php?delete_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this?');"><i title="Delete" style="cursor:pointer; color:red;" class="fa fa-times form-control-feedback"></i></a>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                
                            </td>
                            <?php
                    }
                else{
                ?>
                            <td>
                                <?php
                                if($trimester_validity==1){
                                    if($routine_request==0){
                                ?>
                                <div align="center"> <a href="add_routine.php?day=Wednesday&period=<?php echo $i;?>"><img style="height:30x; width:30px;" src="images/add-icon.png" alt=""></a>
                                </div>
                                    <?php
                                    }
                                }
                                ?>
                            </td>
                            <?php
                }
                $sql="";
            }
        ?>


                        </tr>
                        <tr>
                            <th>
                                <div align="center">Thursday</div>
                            </th>
                            <?php
        $query_add_day=$main_query."AND day='Thursday' ";
        ?>
                            <?php
            
            for($i=1;$i<9;$i++){
                    $sql=$query_add_day."AND period='$i'";
                    $run=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($run)>0){
                        $row=mysqli_fetch_array($run);
                        ?>
                            <td>
                                <div align="center">
                                    <span style="color:brown"><?php echo $row['course'];?> <br> </span>
                                    <span style="color:blue"><?php echo $row['program_name'];?> <br></span>
                                    <b>Batch: </b><span style="color:blue"><?php echo $row['batch'];?> <br></span>
                                    <b>Room: </b><span style="color:blue"><?php echo $row['room_no'];?> <br></span>
                                    <?php
                                    if($trimester_validity==1){
                                        if($routine_request==0){
                                        ?>
                                        <div class="btn-group">
                                        <a href="dashboard.php?delete_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this?');"><i title="Delete" style="cursor:pointer; color:red;" class="fa fa-times form-control-feedback"></i></a>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                
                            </td>
                            <?php
                    }
                else{
                ?>
                            <td>
                                <?php
                                if($trimester_validity==1){
                                    if($routine_request==0){
                                ?>
                                <div align="center"> <a href="add_routine.php?day=Thursday&period=<?php echo $i;?>"><img style="height:30x; width:30px;" src="images/add-icon.png" alt=""></a>
                                </div>
                                    <?php
                                    }
                                }
                                ?>
                            </td>
                            <?php
                }
                $sql="";
            }
        ?>


                        </tr>
                        <tr>
                            <th>
                                <div align="center">Friday</div>
                            </th>
                            <?php
        $query_add_day=$main_query."AND day='Friday' ";
        ?>
                            <?php
            
            for($i=1;$i<9;$i++){
                    $sql=$query_add_day."AND period='$i'";
                    $run=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($run)>0){
                        $row=mysqli_fetch_array($run);
                        ?>
                            <td>
                                <div align="center">
                                    <span style="color:brown"><?php echo $row['course'];?> <br> </span>
                                    <span style="color:blue"><?php echo $row['program_name'];?> <br></span>
                                    <b>Batch: </b><span style="color:blue"><?php echo $row['batch'];?> <br></span>
                                    <b>Room: </b><span style="color:blue"><?php echo $row['room_no'];?> <br></span>
                                    <?php
                                    if($trimester_validity==1){
                                        if($routine_request==0){
                                        ?>
                                        <div class="btn-group">
                                        <a href="dashboard.php?delete_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this?');"><i title="Delete" style="cursor:pointer; color:red;" class="fa fa-times form-control-feedback"></i></a>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                
                            </td>
                            <?php
                    }
                else{
                ?>
                            <td>
                                <?php
                                if($trimester_validity==1){
                                    if($routine_request==0){
                                ?>
                                <div align="center"> <a href="add_routine.php?day=Friday&period=<?php echo $i;?>"><img style="height:30x; width:30px;" src="images/add-icon.png" alt=""></a>
                                </div>
                                    <?php
                                    }
                                }
                                ?>
                            </td>
                            <?php
                }
                $sql="";
            }
        ?>


                        </tr>

                    </table>

                </div>

            </div>

            <div>
                <?php
                if($trimester_validity==1){
                    if($routine_request==0){
                    ?>
                    <form action="" method="post">
                    <input type="submit" name="submit" class="btn btn-success btn-md" value="Submit">
                </form>
                   <?php
                    }
                    else if($routine_request==1){
                        echo "<span style='color:red; font-weight:bold;'>You have submitted routine! Not been accepted yet.</span>";
                    }
                
                else if($routine_request==2){
                    echo "<img style='height:30x; width:30px;' src='images/right_green.jpg' alt=''";
                }
                    }
                ?>

                

            </div>
            <br>
            <!-- /simple chart -->

            <!-- Footer -->
            <?php include 'includes/footer.php';?>
            <!-- /footer -->

        </div>
    </div>

</body>

</html>