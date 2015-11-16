<?php
session_save_path('/var/tmp');
include 'config.php';
if(isset($_POST['submit']) || isset($_POST['first'])) {
        $all = "ALL";
		
		
		@$uni=$_GET['university'];
		@$course_n=$_GET['course_name'];
		@$course_num=$_GET['course_number'];
		@$equivalent=$_GET['scu_equivalent'];

        if(!isset($_POST["university"])){
			if(strlen($uni) == 0) $uni = 'ALL';
		}else{
			$uni = $_POST["university"];
		}
		if(!isset($_POST["course_name"])){
			if(strlen($course_n) == 0)$course_n = 'ALL';
		}else{
			$course_n = $_POST["course_name"];
		}
		if(!isset($_POST["course_number"])){
			if(strlen($course_num) == 0)$course_num = 'ALL';
		}
		else{
			$course_num = $_POST["course_number"];
		}
		if(!isset($_POST["scu_equivalent"])){
			if(strlen($equivalent) == 0)$equivalent = 'ALL';
		}else{
			$equivalent = $_POST["scu_equivalent"];
		}

        if($uni == $all and $course_n == $all and  $course_num == $all and $equivalent == $all) {
                $result = mysqli_query($con, "SELECT * FROM courses ORDER BY university asc");
        }

        else if($course_n == $all and $course_num == $all and $equivalent == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses  WHERE university='$uni'");
        }

        else if($uni == $all and $course_num == $all and $equivalent == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses WHERE course_name='$course_n' ORDER BY university asc");
        }

        else if($uni == $all and $course_n == $all and $equivalent == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses WHERE course_number='$course_num' ORDER BY university asc");
        }       
                
        else if($uni == $all and $course_n == $all and $course_num == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses WHERE scu_equivalent_name='$equivalent' ORDER BY university asc");
        }
        else if ($uni == $all and $course_n == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses WHERE course_number = '$course_num' AND scu_equivalent_name = '$equivalent' ORDER BY university asc");
        }
        else if ($uni == $all and $course_num == $all) { 
                $result = mysqli_query($con,"SELECT * FROM courses WHERE course_name= '$course_n' AND scu_equivalent_name = '$equivalent' ORDER BY university asc");
        }

        else if ($uni == $all and $equivalent == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses WHERE course_name = '$course_n' AND course_number = '$course_num' ORDER BY university asc");
        }
        else if ($course_n == $all and $course_num == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses WHERE university = '$uni' AND scu_equivalent_name = '$equivalent'");
        }
                
        else if($course_n == $all and $equivalent == $all) {  
                $result = mysqli_query($con, "SELECT * FROM courses WHERE university = '$uni' AND course_number = '$course_num'");
        }

        else if ($course_num == $all and $equivalent == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses WHERE university = '$uni' AND course_name = '$course_n'");
        }
                                                                                                                                                                                     
        else if ($uni == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses WHERE course_name = '$course_n' AND course_number = '$course_num' AND scu_equivalent_name = '$equivalent' ORDER BY university asc");
        }
                                                                                                                                                                                     
        else if ($course_n == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses WHERE university = '$uni' AND course_number = '$course_num' AND scu_equivalent_name = '$equivalent'");
        }
		else if ($course_num == $all) {                                                                                                                                           
                $result = mysqli_query($con, "SELECT * FROM courses WHERE course_name = '$course_n' AND university = '$uni' AND scu_equivalent_name = '$equivalent'");     
        }                                                                                                                                                                            
                                                                                                                                                                                     
        else if ($equivalent == $all) {                                                                                                                                              
                $result = mysqli_query($con, "SELECT * FROM courses WHERE course_name = '$course_n' AND course_number = '$course_num' AND university = '$uni'");        
        }                                                                                                                                                                            
                                                                                                                                                                                     
        else {                                                                                                                                                                       
                $result = mysqli_query($con, "SELECT * FROM courses WHERE university = '$uni' AND course_number = '$course_num' AND course_name = '$course_n' AND scu_equivalent_name = '$
equivalent'");
        }                                                                                                                                                                            
                                                                                                                                                                                     
}                                                                                                                                                                                    
                                                                                                                                                                                     
                                                                                                                                                                                     
$row_cnt = $result->num_rows;                                                                                                                                                        
echo "<div style='margin-top: 8px'>";                                                                                                                                                
echo "Displaying " . $row_cnt . " results. ";                                                                                                                                        
echo "</div>";                                                                                                                                                                       
                                                                                                                                                                                     
                                                                                                                                                                                     
echo "<div>                                                                                                                                                                          
<table id='#table' class='table table-striped'>                                                                                                                                      
<tr>                                                                                                                                                                                 
<th>University</th>                                                                                                                                                                  
<th>Country</th>                                                                                                                                                                     
<th>City</th>                                                                                                                                                                        
<th>Course Name</th>                                                                                                                                                                 
<th>Course Number</th>                                                                                                                                                               
<th>Equivalent Number </th>                                                                                                                                                          
<th>Equivalent Name </th>                                                                                                                                                            
</tr>";                                                                                                                                                                              
                                                                                                                                                                                     
while($row = mysqli_fetch_array($result))                                                                                                                                            
{                                                                                                                                                                                    
        echo "<tr>";                                                                                                                                                                 
        echo "<td>" . $row['university'] . "</td>";                                                                                                                                  
        echo "<td>" . $row['country'] . "</td>";                                                                                                                                     
        echo "<td>" . $row['city'] . "</td>";                                                                                                                                        
        echo "<td>" . $row['course_name'] . "</td>";                                                                                                                                 
        echo "<td>" . $row['course_number'] . "</td>";                                                                                                                               
        echo "<td>" . $row['scu_equivalent'] . "</td>";                                                                                                                              
        echo "<td>" . $row['scu_equivalent_name'] . "</td>";                                                                                                                         
        echo "</tr>";                                                                                                                                                                
}                                                                                                                                                                                    
echo "</table>                                                                                                                                                                       
</div>";                                                                                                                                                                             
                                                                                                                                                                                     
$row_cnt = 0;                                                                                                                                                                        
                                                                                                                                                                                     
mysqli_close($con); 

unset($_POST['submit']);
                                                                                                                                                                 
?>                                                                                                                                                                                   
    
