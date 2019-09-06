<?php include 'includes/session.php';?>
<?php
$main_query="SELECT routine.id,batches.batch,courses.course,programs.program_name,rooms.room_no from routine join courses on courses.id=routine.course_id join programs on programs.id=routine.p_id join batches on batches.id=routine.batch_id join rooms on rooms.id=routine.room_no WHERE trimester_id='$trimester_id' AND batch_id='$batch_id' ";
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
                <caption>
                            <h2>ROUTINE</h2>
                        </caption>
                <table class="table table-bordered">
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
                                    
                                </div>
                                
                            </td>
                            <?php
                    }
                else{
                    echo "<td></td>";
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
                                    
                                </div>
                                
                            </td>
                            <?php
                    }
                else{
                    echo "<td></td>";
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
                                    
                                </div>
                                
                            </td>
                            <?php
                    }
                else{
                    echo "<td></td>";
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
                                    
                                </div>
                                
                            </td>
                            <?php
                    }
                else{
                    echo "<td></td>";
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
                                    
                                </div>
                                
                            </td>
                            <?php
                    }
                else{
                    echo "<td></td>";
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
                                    
                                </div>
                                
                            </td>
                            <?php
                    }
                else{
                    echo "<td></td>";
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
                                    
                                </div>
                                
                            </td>
                            <?php
                    }
                else{
                    echo "<td></td>";
                }
                
                $sql="";
            }
        ?>


                        </tr>
                        

                    </table>
            </div>
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