<?php
//Initialize php form variables
$university = $_POST["university"];
$country = $_POST["country"];
$city = $_POST["city"];
$course_title = $_POST["course-title"];
$course_name = $_POST["course-name"];
$equivalent = $_POST["equivalent"];

//Initialize server variables
$servername = "localhost";
$username = "root";
$password = "sprl2923";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

//Insert data into table
$sql ="INSERT INTO TEST3.Classes (university, country, city, course_title, course_name, equivalent) 
	VALUES ('$university', '$country', '$city', '$course_title', '$course_name', '$equivalent')"; 


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//Close Connection
$conn->close();

?>
