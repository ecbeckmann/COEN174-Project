<?php 
include 'config.php';


$result = mysqli_query($con, "SELECT DISTINCT(university) AS university FROM courses");

echo "<div>";
echo "University: <select class='dropdown' id='university' name='university'>";
echo "<option>ALL</option>";

while($row = mysqli_fetch_array($result))
{
	//print_r($row);
	echo "<option>" . $row['university'] . "</option>";
}
echo "</select>";
echo "</div>";

echo "<div>";
echo "External Course Name: <select class='dropdown' id='course_name' name='course_name'>";
echo "<option>ALL</option>";
$result = mysqli_query($con, "SELECT DISTINCT(course_name) AS course_name FROM courses");
while($row = mysqli_fetch_array($result))
{
	//print_r($row);
	echo "<option>" . $row['course_name'] . "</option>";
}
echo "</select>";
echo "</div>";

echo "<div>";
echo "External Course Number: <select class='dropdown' id='course_number' name='course_number'>";
echo "<option>ALL</option>";

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
echo "<option>ALL</option>";
echo "<option>LOGIC DESIGN</option>";
echo "<option>DATA STRUCTURES </option>";
echo "<option>COMPUTER ORGANIZATION AND ASSEMBLY LANGUAGE</option>";
echo "<option>DISCRETE MATH</option>";
echo "<option>PROBABILITY</option>";
echo "<option>DIFFERENTIAL EQUATIONS</option>";
echo "<option>NUMERICAL ANALYSIS</option>";
echo "<option>LINEAR ALGEBRA</option>";
echo "</select>";
echo "</div>";


mysqli_close($con);
?>
