<?php include 'includes/session.php';?>
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
<?php
if(isset($_POST['see_routine']))
{
    $session_name=$_POST['session_name'];
    $session_year=$_POST['session_year'];
    $batch_id=$_POST['batch_id'];
    $program_id=$_POST['program_id'];
    
    $_SESSION['session_name']=$session_name;
    $_SESSION['session_year']=$session_year;
    $_SESSION['batch_id']=$batch_id;
    $_SESSION['program_id']=$program_id;
    
    $main_query="SELECT routine.id,routine.start_time,routine.end_time,routine.room_no,courses.course,faculty.name from routine join courses on courses.id=routine.course_id join faculty on faculty.id=routine.course_teacher_id WHERE batch_id='$batch_id' AND session_name='$session_name' AND session_year='$session_year' AND p_id='$program_id' AND";
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
                <div class="panel-heading"><h6 class="panel-title">Manage Routines</h6>
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
                <div align="center">
                <form action="" method="post">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Trimester: </label>
                        <div class="col-sm-10">
                            <select data-placeholder="Choose a Country..." name="session_name" class="select" tabindex="2" required>
                                <option value="">--Select Session--</option>
                                <option value="Spring">Spring</option>
                                <option value="Summer">Summer</option>
                                <option value="Fall">Fall</option>
                            </select>
                            
                            <select data-placeholder="Choose a Country..." name="session_year" class="select" tabindex="2" required>
                                <option value="">--Select Year--</option>
                                   <?php
                                        $end= 1900;
                                        $start = date("Y");
                                       for( $year = $start ; $year >=$end; $year--){
                                          echo "<option value='$year'>$year</option>";
                                        }
                                       ?> 
                            </select>
                    </div>
                </div>
                        
                <div class="form-group">
                            <label class="col-sm-2 control-label">Batch: </label>
                            <div class="col-sm-10">
                            <select data-placeholder="Choose a Batch..." name="batch_id" class="select-search" tabindex="2" required>
                                <option value="">--Select Batch--</option>
                                <?php 
                                    $sql = "SELECT * from batches ";
                                    $run=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($run)>0){
                                                                while($row=mysqli_fetch_array($run)){
                                                                    $id=$row['id'];
                                                                    $batch=$row['batch'];
                                ?>  
                                    <option value="<?php echo htmlentities($id);?>"><?php echo htmlentities($batch);?></option>
                                <?php }} ?> 
                            </select>
                            </div>
                        </div>
                        
                <div class="form-group">
                            <label class="col-sm-2 control-label">Program: </label>
                            <div class="col-sm-10">
                            <select data-placeholder="Choose a Batch..." name="program_id" class="select-search" tabindex="2" required>
                                <option value="">--Select Program--</option>
                                <?php 
                                    $sql = "SELECT * from programs ";
                                    $run=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($run)>0){
                                                                while($row=mysqli_fetch_array($run)){
                                                                    $id=$row['id'];
                                                                    $program_name=$row['program_name'];
                                ?>  
                                    <option value="<?php echo htmlentities($id);?>"><?php echo htmlentities($program_name);?></option>
                                <?php }} ?> 
                            </select>
                            </div>
                        </div>
                        <div class="text-right">
                            <input type="submit" name="see_routine" value="SEE ROUTINE" class="btn btn-primary" >
                        </div>
                </form>
  <table class="table table-bordered">
    <caption><h2>ROUTINE</h2></caption>
    <tr style="border-bottom:1px #DDDDDD solid;">
        <th></th>
        <th><div align="center">1</div></th>
        <th><div align="center">2</div></th>
        <th><div align="center">3</div></th>
        <th><div align="center">4</div></th>
        <th><div align="center">5</div></th>
        <th><div align="center">6</div></th>
        <th><div align="center">7</div></th>
    </tr>
    <tr>
      <th><div align="center">Saturday</div></th>
      <?php
        if(isset($_POST['see_routine']))
{
        $sql=$main_query." day='Saturday'";
        $run=mysqli_query($conn,$sql);
        if(mysqli_num_rows($run)>0){
            while($row=mysqli_fetch_array($run)){
                
        ?> 
      <td><div align="center">
    <span><?php echo $row['start_time']." - ".$row['end_time'];?> <br></span>
    <span style="color:brown"><?php echo $row['course'];?> <br> </span>   
      <span style="color:blue"><?php echo $row['name'];?> <br></span>
      <span style="color:black">Room No: <?php echo $row['room_no'];?> <br></span>
      <div class="btn-group">
                               <button class="btn btn-xs btn-danger dropdown-toggle" data-toggle="dropdown"><span class="caret caret-split"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="edit_routine.php?edit_id=<?php echo $row['id'];?>">Edit</a></li>
                                    <li><a href="manage_routine.php?delete_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this?');">Delete</a></li>
                                </ul>
                                </div>
      </div></td>
      <?php
            }
        }
        }
        ?>
      <td><div align="center"> <a href="add_routine.php?day=Saturday"><img style="height:30x; width:30px;" src="images/add-icon.png" alt=""></a> </div></td>
    </tr>
    <tr>
      <th><div align="center">Sunday</div></th>
      <?php
        if(isset($_POST['see_routine']))
{
        $sql=$main_query." day='Sunday'";
        $run=mysqli_query($conn,$sql);
        if(mysqli_num_rows($run)>0){
            while($row=mysqli_fetch_array($run)){
                
        ?> 
      <td><div align="center">
    <span><?php echo $row['start_time']." - ".$row['end_time'];?> <br></span>
    <span style="color:brown"><?php echo $row['course'];?> <br> </span>   
      <span style="color:blue"><?php echo $row['name'];?> <br></span>
      <span style="color:black">Room No: <?php echo $row['room_no'];?> <br></span>
      <div class="btn-group">
                               <button class="btn btn-xs btn-danger dropdown-toggle" data-toggle="dropdown"><span class="caret caret-split"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="edit_routine.php?edit_id=<?php echo $row['id'];?>">Edit</a></li>
                                    <li><a href="manage_routine.php?delete_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this?');">Delete</a></li>
                                </ul>
                                </div>
      </div></td>
      <?php
            }
        }
        }
        ?>
        <td><div align="center"> <a href="add_routine.php?day=Sunday"><img style="height:30x; width:30px;" src="images/add-icon.png" alt=""></a> </div></td>
    </tr>
    <tr>
      <th><div align="center">Monday</div></th>
      <?php
        if(isset($_POST['see_routine']))
{
        $sql=$main_query." day='Monday'";
        $run=mysqli_query($conn,$sql);
        if(mysqli_num_rows($run)>0){
            while($row=mysqli_fetch_array($run)){
                
        ?> 
      <td><div align="center">
    <span><?php echo $row['start_time']." - ".$row['end_time'];?> <br></span>
    <span style="color:brown"><?php echo $row['course'];?> <br> </span>   
      <span style="color:blue"><?php echo $row['name'];?> <br></span>
      <span style="color:black">Room No: <?php echo $row['room_no'];?> <br></span>
      <div class="btn-group">
                               <button class="btn btn-xs btn-danger dropdown-toggle" data-toggle="dropdown"><span class="caret caret-split"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="edit_routine.php?edit_id=<?php echo $row['id'];?>">Edit</a></li>
                                    <li><a href="manage_routine.php?delete_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this?');">Delete</a></li>
                                </ul>
                                </div>
      </div></td>
      <?php
            }
        }
        }
        ?>
        <td><div align="center"> <a href="add_routine.php?day=Monday"><img style="height:30x; width:30px;" src="images/add-icon.png" alt=""></a> </div></td>
    </tr>
    <tr>
      <th><div align="center">Tuesday</div></th>
      <?php
        if(isset($_POST['see_routine']))
{
        $sql=$main_query." day='Tuesday'";
        $run=mysqli_query($conn,$sql);
        if(mysqli_num_rows($run)>0){
            while($row=mysqli_fetch_array($run)){
                
        ?> 
      <td><div align="center">
    <span><?php echo $row['start_time']." - ".$row['end_time'];?> <br></span>
    <span style="color:brown"><?php echo $row['course'];?> <br> </span>   
      <span style="color:blue"><?php echo $row['name'];?> <br></span>
      <span style="color:black">Room No: <?php echo $row['room_no'];?> <br></span>
      <div class="btn-group">
                               <button class="btn btn-xs btn-danger dropdown-toggle" data-toggle="dropdown"><span class="caret caret-split"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="edit_routine.php?edit_id=<?php echo $row['id'];?>">Edit</a></li>
                                    <li><a href="manage_routine.php?delete_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this?');">Delete</a></li>
                                </ul>
                                </div>
      </div></td>
      <?php
            }
        }
        }
        ?>
        <td><div align="center"> <a href="add_routine.php?day=Tuesday"><img style="height:30x; width:30px;" src="images/add-icon.png" alt=""></a> </div></td>
    </tr>
    <tr>
      <th><div align="center">Wednesday</div></th>
      <?php
        if(isset($_POST['see_routine']))
{
        $sql=$main_query." day='Wednesday'";
        $run=mysqli_query($conn,$sql);
        if(mysqli_num_rows($run)>0){
            while($row=mysqli_fetch_array($run)){
                
        ?> 
      <td><div align="center">
    <span><?php echo $row['start_time']." - ".$row['end_time'];?> <br></span>
    <span style="color:brown"><?php echo $row['course'];?> <br> </span>   
      <span style="color:blue"><?php echo $row['name'];?> <br></span>
      <span style="color:black">Room No: <?php echo $row['room_no'];?> <br></span>
      <div class="btn-group">
                               <button class="btn btn-xs btn-danger dropdown-toggle" data-toggle="dropdown"><span class="caret caret-split"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="edit_routine.php?edit_id=<?php echo $row['id'];?>">Edit</a></li>
                                    <li><a href="manage_routine.php?delete_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this?');">Delete</a></li>
                                </ul>
                                </div>
      </div></td>
      <?php
            }
        }
        }
        ?>
        <td><div align="center"> <a href="add_routine.php?day=Wednesday"><img style="height:30x; width:30px;" src="images/add-icon.png" alt=""></a> </div></td>
    </tr>
    <tr>
      <th><div align="center">Thursday</div></th>
      <?php
        if(isset($_POST['see_routine']))
{
        $sql=$main_query." day='Thursday'";
        $run=mysqli_query($conn,$sql);
        if(mysqli_num_rows($run)>0){
            while($row=mysqli_fetch_array($run)){
                
        ?> 
      <td><div align="center">
    <span><?php echo $row['start_time']." - ".$row['end_time'];?> <br></span>
    <span style="color:brown"><?php echo $row['course'];?> <br> </span>   
      <span style="color:blue"><?php echo $row['name'];?> <br></span>
      <span style="color:black">Room No: <?php echo $row['room_no'];?> <br></span>
      </div></td>
      <?php
            }
        }
        }
        ?>
        <td><div align="center"> <a href="add_routine.php?day=Thursday"><img style="height:30x; width:30px;" src="images/add-icon.png" alt=""></a> </div></td>
    </tr>
    
    <tr>
      <th><div align="center">Friday</div></th>
      <?php
        if(isset($_POST['see_routine']))
{
        $sql=$main_query." day='Friday'";
        $run=mysqli_query($conn,$sql);
        if(mysqli_num_rows($run)>0){
            while($row=mysqli_fetch_array($run)){
                
        ?> 
      <td><div align="center">
    <span><?php echo $row['start_time']." - ".$row['end_time'];?> <br></span>
    <span style="color:brown"><?php echo $row['course'];?> <br> </span>   
      <span style="color:blue"><?php echo $row['name'];?> <br></span>
      <span style="color:black">Room No: <?php echo $row['room_no'];?> <br></span>
      <div class="btn-group">
                               <button class="btn btn-xs btn-danger dropdown-toggle" data-toggle="dropdown"><span class="caret caret-split"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="edit_routine.php?edit_id=<?php echo $row['id'];?>">Edit</a></li>
                                    <li><a href="manage_routine.php?delete_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this?');">Delete</a></li>
                                </ul>
                                </div>
      </div></td>
      <?php
            }
        }
        }
        ?>
        <td><div align="center"> <a href="add_routine.php?day=Friday"><img style="height:30x; width:30px;" src="images/add-icon.png" alt=""></a> </div></td>
    </tr>
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
