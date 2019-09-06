<?php include 'includes/session.php';?>
<?php
if(isset($_GET['delete_id'])){
    $delete_id=$_GET['delete_id'];
    $delete_query="DELETE FROM `courses` WHERE `courses`.`id` = $delete_id";
    if(mysqli_query($conn,$delete_query)){
        $_SESSION['delmsg']="Course deleted Successfully";
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
                <h5><i class="fa fa-bars"></i>Courses</h5>
            </div>
            <!-- /page title -->

                
            <!-- Simple chart -->
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title">Manage Courses</h6>
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
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th>Under Program</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $count=1;
                            $query="SELECT courses.id,courses.course,programs.program_name from courses join programs on programs.id=courses.program_id";
                            $run=mysqli_query($conn,$query);              
                                if(mysqli_num_rows($run)>0){
                                    while($row=mysqli_fetch_array($run)){
                                        $course=explode(",",$row['course']);
                                        $course_code=$course[0];
                                        $course_name=$course[1];
                            ?>  
                            <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo $course_code;?></td>
                                <td><?php echo $course_name;?></td>
                                <td><?php echo $row['program_name'];?></td>
                                <td>
                                <a href="edit_course.php?edit_id=<?php echo $row['id'];?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="manage_course.php?delete_id=<?php echo $row['id'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this course?');">Delete</a>
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
