<?php 
$con = mysqli_connect("dbserver.engr.scu.edu","crohacz","00000896245","sdb_crohacz");
// Check connection


if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$result = mysqli_query($con, "SELECT DISTINCT(university) AS university FROM courses");

echo "<div>";
echo "University: <select class='dropdown' id='university' name='university'>";
echo "<option> </option>";

while($row = mysqli_fetch_array($result))
{
	//print_r($row);
	echo "<option>" . $row['university'] . "</option>";
}
echo "</select>";
echo "</div>";

echo "<div>";
echo "Course Name: <select class='dropdown' id='course_name' name='course_name'>";
echo "<option> </option>";
$result = mysqli_query($con, "SELECT DISTINCT(course_name) AS course_name FROM courses");
while($row = mysqli_fetch_array($result))
{
	//print_r($row);
	echo "<option>" . $row['course_name'] . "</option>";
}
echo "</select>";
echo "</div>";

echo "<div>";
echo "Course Number: <select class='dropdown' id='course_number' name='course_number'>";
echo "<option> </option>";

$result = mysqli_query($con, "SELECT DISTINCT(course_number) AS course_number FROM courses");
while($row = mysqli_fetch_array($result))
{
	//print_r($row);
	echo "<option>" . $row['course_number'] . "</option>";
}
echo "</select>";
echo "</div>";

echo "<div>";
echo "SCU Foundations Equivalent: <select class='dropdown' id='scu_equivalent' name='scu_equivalent'>";
echo "<option> </option>";
$result = mysqli_query($con, "SELECT DISTINCT(scu_equivalent) AS scu_equivalent FROM courses");
while($row = mysqli_fetch_array($result))
{
	//print_r($row);
	echo "<option>" . $row['scu_equivalent'] . "</option>";
}
echo "</select>";
echo "</div>";


mysqli_close($con);
?>
