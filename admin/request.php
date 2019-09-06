<?php include 'includes/session.php';?>
<?php
    if(isset($_POST['accept_all']))
{
        $accept_all_sql = "UPDATE `requests` SET `status` = '1' WHERE `requests`.`trimester_id` = $trimester_id";
mysqli_query($conn,$accept_all_sql);
    }
?>
<?php
if(isset($_GET['delete_id'])){
    $delete_id=$_GET['delete_id'];
    $delete_query="DELETE FROM `requests` WHERE `requests`.`id` = $delete_id";
    if(mysqli_query($conn,$delete_query)){
        $_SESSION['delmsg']="Routine request deleted Successfully";
    }
else
    $_SESSION['delmsg']="Failed to delete";
				
}
?> 
<?php
    if(isset($_POST['accept']))
{
    $request_id=$_POST['request_id'];
    $faculty_id=$_POST['faculty_id'];
    $trimester_id=$_POST['trimester_id'];
        $sql = "UPDATE `requests` SET `status` = '1' WHERE `requests`.`id` = $request_id";
        $sql_routine_update = "UPDATE `routine` SET `status` = '1' WHERE `course_teacher_id` = $faculty_id AND `trimester_id` = $trimester_id";
mysqli_query($conn,$sql);
mysqli_query($conn,$sql_routine_update);
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
                <h5><i class="fa fa-bars"></i>Routine</h5>
            </div>
            <!-- /page title -->

                
            <!-- Simple chart -->
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title">Routine Request From Faculty</h6>
                <?php if(isset($_SESSION['delmsg'])&& !empty($_SESSION['delmsg']))
                    {?>
                    <span class="pull-right" style="color:green; margin-top:7px;"><b>* * * <?php echo htmlentities($_SESSION['delmsg']);?> * * *</b></span>
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
                                <th>Faculty Name</th>
                                <th>Trimester</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $count=1;
                            $query="SELECT requests.id,requests.status,faculty.id as faculty_id,faculty.name,trimester.id as trimester_id,trimester.session from requests join faculty on faculty.id=requests.faculty_id join trimester on trimester.id=requests.trimester_id where trimester_id='$trimester_id'";
                            $run=mysqli_query($conn,$query);              
                                if(mysqli_num_rows($run)>0){
                                    while($row=mysqli_fetch_array($run)){
                            ?>  
                            <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['session'];?></td>
                                <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                <input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" />
                                
                                <a href="request.php?delete_id=<?php echo $row['id'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this faculty?');">Delete</a>
                                    </div>
                                </td>
                                <td>
                                    <?php
                                    if($row['status']==1){echo "<span style='color:green; font-weight:bold'>Accepted<span>";}
                                        else{
                                    ?>
                                <form action="" method="post">
                                    <input type="hidden" name="request_id" class="btn btn-sm btn-success" value="<?php echo $row['id'];?>">
                                    <input type="hidden" name="faculty_id" class="btn btn-sm btn-success" value="<?php echo $row['faculty_id'];?>">
                                    <input type="hidden" name="trimester_id" class="btn btn-sm btn-success" value="<?php echo $row['trimester_id'];?>">
                                    <input type="submit" name="accept" class="btn btn-sm btn-success" value="Accept">
                                </form>
                                <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php
                                    $count++;
                                    }
                                    ?>
                                    <?php
                                }
    
                            ?>
                            
                        </tbody>
                    </table>
                    
                </div>
                
                
            </div>
            <div >
                       <span id="email_result"></span>
                        <div class="btn-group pull-right" style="margin-right:10px;">
                            
                            <form action="" method="post">
                                <input type="submit" name="accept_all" class="btn btn-sm btn-success " value="Accept All">
                            </form>
                            
                        </div>
                        
                        
                    </div>
                    <br>
                    <br>
                    
            <!-- /simple chart -->

           

        </div>
    </div>
    <br>
<div style="margin: auto; text-align: center">
                       <p><button type="submit" style="border-radius: 10px;" id="send_email" class="btn btn-lg btn-primary send" value=""><i class="fa fa-envelope"></i>Send email to all CR</button></p>
                        <p><a href="javascript:void(0);" onclick="fb_share('google.com', 'Test')" ><img style="height:70px; width:300px;" src="../images/fb_share_btn.gif" alt=""></a></p>
                    </div>
</body>
</html>
<div id="large_modal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h5 class="modal-title">Routine</h5>
                        </div>

                        <div class="modal-body has-padding" id="routine_details">
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-warning" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

 <script>  
 $(document).ready(function(){  
      $(document).on('click', '.view_data', function(){  
           var request_id = $(this).attr("id");  
           if(request_id != '')  
           {  
                $.ajax({  
                     url:"routine_from_request.php",  
                     method:"POST",  
                     data:{request_id:request_id},  
                     success:function(data){  
                          $('#routine_details').html(data);  
                          $('#large_modal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>
  <script>  
 $(document).ready(function(){  
      $('.send').click(function(){  
          $(this).attr('disabled', 'disabled');
          var id = $(this).attr("id");
                $.ajax({  
                     url:"send_mail_to_cr.php", 
                    beforeSend:function(){
                    $('#'+id).html('Sending...');
                    $('#'+id).addClass('btn-danger');
                   },
                     success:function(data){  
                          $('#email_result').html(data);
                         $('#'+id).html('Success');
                         $('#'+id).removeClass('btn-danger');
                         $('#'+id).removeClass('btn-info');
                         $('#'+id).addClass('btn-success');
                     }  
                });  
                       
      });  
 });  
 </script>
 <script>
(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
 
function fb_share(dynamic_link,dynamic_title) {
    var app_id = '';
    var pageURL="https://www.facebook.com/dialog/feed?app_id=" + app_id + "&link=" + dynamic_link;
    var w = 600;
    var h = 400;
    var left = (screen.width / 2) - (w / 2);
    var top = (screen.height / 2) - (h / 2);
    window.open(pageURL, dynamic_title, 'toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=no, resizable=no, copyhistory=no, width=' + 800 + ', height=' + 650 + ', top=' + top + ', left=' + left)
    return false;
}
</script>
