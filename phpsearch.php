<?php
$con=mysqli_connect("dbserver.engr.scu.edu","crohacz","00000896245","sdb_crohacz");
// Check connection

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_POST['submit'])) { 
	
	if(empty($_POST['university']) && empty($_POST['course_name']) && empty($_POST['course_number']) && empty($_POST['scu_equivalent'])) { 
		$result = mysqli_query($con, "SELECT * FROM courses"); 
	} 

	else { 

		$university = $_POST["university"];  
		$course_name = $_POST["course_name"];
		$course_number = $_POST["course_number"];
		$equivalent = $_POST["scu_equivalent"];

		if(empty($_POST['course_name']) and empty($_POST['course_number']) and empty($_POST['scu_equivalent'])) { 
			$result = mysqli_query($con, "SELECT * FROM courses  WHERE university='$university'");
		}
 
		else if(empty($_POST['university']) and empty($_POST['course_number']) and empty($_POST['scu_equivalent'])) { 
			$result = mysqli_query($con, "SELECT * FROM courses WHERE course_name='$course_name'");
		}
 
		else if(empty($_POST['university']) and empty($_POST['course_name']) and empty($_POST['scu_equivalent'])) { 
			$result = mysqli_query($con, "SELECT * FROM courses WHERE course_number='$course_number'");
		} 

		else if(empty($_POST['university']) and empty($_POST['course_name']) and empty($_POST['course_number'])) { 
			$result = mysqli_query($con, "SELECT * FROM courses WHERE scu_equivalent='$equivalent'");
		}
 
		else if(empty($_POST['university']) and empty($_POST['course_name'])) { 
			$result = mysqli_query($con, "SELECT * FROM courses WHERE course_number = '$course_number' AND scu_equivalent = '$equivalent'");
		}

		else if(empty($_POST['university']) and empty($_POST['course_number'])) { 
			$result = mysqli_query($con,"SELECT * FROM courses WHERE course_name= '$course_name' AND scu_equivalent = '$equivalent'");
		}

		else if(empty($_POST['university']) and empty($_POST['scu_equivalent'])) { 
			$result = mysqli_query($con, "SELECT * FROM courses WHERE course_name = '$course_name' AND course_number = '$course_number'");
		}

		else if(empty($_POST['course_name']) and empty($_POST['course_number'])) { 
			$result = mysqli_query($con, "SELECT * FROM courses WHERE university = '$university' AND scu_equivalent = '$equivalent'");
		}

		else if(empty($_POST['course_name']) and empty($_POST['scu_equivalent'])) { 
			$result = mysqli_query($con, "SELECT * FROM courses WHERE university = '$university' AND course_number = '$course_number'");
		}

		else if(empty($_POST['course_number']) and empty($_POST['scu_equivalent'])) { 
			$result = mysqli_query($con, "SELECT * FROM courses WHERE university = '$university' AND course_name = '$course_name'");
		}

		else if(empty($_POST['university'])) { 
			$result = mysqli_query($con, "SELECT * FROM courses WHERE course_name = '$course_name' AND course_number = '$course_number' AND scu_equivalent = '$equivalent'");
		}

		else if(empty($_POST['course_name'])) { 
			$result = mysqli_query($con, "SELECT * FROM courses WHERE university = '$university' AND course_number = '$course_number' AND scu_equivalent = '$equivalent'");
		}

		else if(empty($_POST['course_number'])) { 
			$result = mysqli_query($con, "SELECT * FROM courses WHERE course_name = '$course_name' AND university = '$university' AND scu_equivalent = '$equivalent'");
		}

		else if(empty($_POST['scu_equivalent'])) { 
			$result = mysqli_query($con, "SELECT * FROM courses WHERE course_name = '$course_name' AND course_number = '$course_number' AND university = '$university'");
		}

		else { 
			$result = mysqli_query($con, "SELECT * FROM courses WHERE university = '$university' AND course_number = '$course_number' AND course_name = '$course_name' AND scu_equivalent = '$equivalent'"); 
		}

	}
}
else { 
	$result = mysqli_query($con, "SELECT * FROM courses"); 
} 


$row_cnt = $result->num_rows; 
echo "<div style='margin-top: 8px'>"; 
echo "Displaying " . $row_cnt . " results. ";
echo "</div>"; 
 

echo "<div> 
<table class='table table-striped'>
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
?>
