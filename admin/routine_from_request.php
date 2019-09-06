<?php
require_once("../includes/db.php");
 if(isset($_POST["request_id"]))  
 {  
        
        
      $query = "SELECT * FROM requests WHERE id = '".$_POST["request_id"]."'";  
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_array($result);
     $trimester_id=$row['trimester_id'];
     $faculty_id=$row['faculty_id'];
         
     $main_query="SELECT routine.id,batches.batch,courses.course,programs.program_name,rooms.room_no from routine join courses on courses.id=routine.course_id join programs on programs.id=routine.p_id join batches on batches.id=routine.batch_id join rooms on rooms.id=routine.room_no WHERE trimester_id='$trimester_id' AND course_teacher_id='$faculty_id' ";
     
     
        
 }  
 ?>
 
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