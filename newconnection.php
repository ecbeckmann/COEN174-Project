<?php
$con=mysqli_connect("dbserver.engr.scu.edu","crohacz","00000896245","courses");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM sdb_crohacz");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>University</th>
<th>Country</th>
<th>City</th>
<th>Course Name</th>
<th>Course Number</th>
<th>Equivalent</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
//print_r($row);
	echo "<tr>";
	echo "<td>" . $row['id'] . "</td>";
	echo "<td>" . $row['university'] . "</td>";
	echo "<td>" . $row['country'] . "</td>";
	echo "<td>" . $row['city'] . "</td>";
	echo "<td>" . $row['courseName'] . "</td>";
	echo "<td>" . $row['courseNumber'] . "</td>";
	echo "<td>" . $row['equivalent'] . "</td>";
	echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
