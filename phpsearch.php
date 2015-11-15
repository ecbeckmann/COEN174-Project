<?php
session_save_path('/var/tmp');
include 'config.php';
if(isset($_POST['submit']) || isset($_POST['first'])) {
        $all = "ALL";

        if(!isset($_POST["university"])){
			$university = 'ALL';
		}else{
			$university = $_POST["university"];
		}
		if(!isset($_POST["course_name"])){
			$course_name = 'ALL';
		}else{
			$course_name = $_POST["course_name"];
		}
		if(!isset($_POST["course_number"])){
			$course_number = 'ALL';
		}
		else{
			$course_number = $_POST["course_number"];
		}
		if(!isset($_POST["scu_equivalent"])){
			$equivalent = 'ALL';
		}else{
			$equivalent = $_POST["scu_equivalent"];
		}

        if($university == $all and $course_name == $all and  $course_number == $all and $equivalent == $all) {
                $result = mysqli_query($con, "SELECT * FROM courses");
        }

        else if($course_name == $all and $course_number == $all and $equivalent == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses  WHERE university='$university'");
        }

        else if($university == $all and $course_number == $all and $equivalent == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses WHERE course_name='$course_name'");
        }

        else if($university == $all and $course_name == $all and $equivalent == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses WHERE course_number='$course_number'");
        }       
                
        else if($university == $all and $course_name == $all and $course_number == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses WHERE scu_equivalent_name='$equivalent'");
        }
        else if ($university == $all and $course_name == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses WHERE course_number = '$course_number' AND scu_equivalent_name = '$equivalent'");
        }
        else if ($university == $all and $course_number == $all) { 
                $result = mysqli_query($con,"SELECT * FROM courses WHERE course_name= '$course_name' AND scu_equivalent_name = '$equivalent'");
        }

        else if ($university == $all and $equivalent == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses WHERE course_name = '$course_name' AND course_number = '$course_number'");
        }
        else if ($course_name == $all and $course_number == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses WHERE university = '$university' AND scu_equivalent_name = '$equivalent'");
        }
                
        else if($course_name == $all and $equivalent == $all) {  
                $result = mysqli_query($con, "SELECT * FROM courses WHERE university = '$university' AND course_number = '$course_number'");
        }

        else if ($course_number == $all and $equivalent == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses WHERE university = '$university' AND course_name = '$course_name'");
        }
                                                                                                                                                                                     
        else if ($university == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses WHERE course_name = '$course_name' AND course_number = '$course_number' AND scu_equivalent_name = '$equivalent'");
        }
                                                                                                                                                                                     
        else if ($course_name == $all) { 
                $result = mysqli_query($con, "SELECT * FROM courses WHERE university = '$university' AND course_number = '$course_number' AND scu_equivalent_name = '$equivalent'");
        }
		else if ($course_number == $all) {                                                                                                                                           
                $result = mysqli_query($con, "SELECT * FROM courses WHERE course_name = '$course_name' AND university = '$university' AND scu_equivalent_name = '$equivalent'");     
        }                                                                                                                                                                            
                                                                                                                                                                                     
        else if ($equivalent == $all) {                                                                                                                                              
                $result = mysqli_query($con, "SELECT * FROM courses WHERE course_name = '$course_name' AND course_number = '$course_number' AND university = '$university'");        
        }                                                                                                                                                                            
                                                                                                                                                                                     
        else {                                                                                                                                                                       
                $result = mysqli_query($con, "SELECT * FROM courses WHERE university = '$university' AND course_number = '$course_number' AND course_name = '$course_name' AND scu_equivalent_name = '$
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
    
