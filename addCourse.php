<?php 
session_save_path('/var/tmp');
if(!(isset($_SESSION['login_user']))){
        echo 'trying to redirect';
        header(  'Location: login.php');
}

include 'config.php';

if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


if(isset($_POST['submit'])) {
                if(empty($_POST['university']) || empty($_POST['country']) || empty($_POST['city']) || empty($_POST['course_number']) || empty($_POST['course_name']) || empty($_POST['equivalent']) || empty($_POST['equivalent_name'])) 			{ 
			echo "<h4 class='message'> Please fill out all the fields </h4>"; 
		} 
		else { 
			$university = $_POST["university"];
                	$country = $_POST["country"];
                	$city = $_POST["city"];
                	$course_number = $_POST["course_number"];
               		$course_name = $_POST["course_name"];
                	$equivalent = $_POST["equivalent"];
			$equivalent_name = $_POST["equivalent_name"]; 
			$result = mysqli_query($conn, "SELECT * FROM courses WHERE university='$university' AND country='$country' AND city='$city' AND course_name='$course_name' AND course_number='$course_number' AND scu_equivalent='$equivalent'"); 
			$row_cnt = $result->num_rows; 
			//Check to see if entry already exists 
			if($row_cnt == 0) {                 		

				//Insert data into table
                		$sql = "INSERT INTO courses (university, country, city, course_number, course_name, scu_equivalent, scu_equivalent_name) VALUES ('$university', '$country', '$city', '$course_number', '$course_name', '$equivalent', '$equivalent_name')";

				if($con->query($sql) === TRUE) {
                			echo "<h4 class='message'> New Record created successfully!</h4>";
        			}
        			else {
                			echo "Error: " . $sql ."<br>" . $con->error;
        			}
			}
			else { 

				echo "<h4 class='message'> Entry Already Exists </h4>"; 
			} 
		}
}


//Close Connection
$con->close();

?>
