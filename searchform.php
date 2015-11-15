<!doctype html>
<html>

<head>
<SCRIPT language=JavaScript>
function reloadUniversity(form)
{
	var val=form.university.options[form.university.options.selectedIndex].value;
	if(val == 'ALL') self.location='index.php';
	else self.location='index.php?university=' + val;
}

</script>
</head>

<?php 
@$university=$_GET['university'];

session_save_path('/var/tmp');
include 'config.php';


$result = mysqli_query($con, "SELECT DISTINCT(university) AS university FROM courses");

echo "<div>";

echo "University: <select class='dropdown' id='university' name='university' onchange=\"reloadUniversity(this.form)\">";

echo "<option>ALL</option>";

/*foreach($result as $noticia2){
	if($noticia2['university']==@$university){
		echo "<option selected>" . $noticia['university'] . "</option>";
	}
	else{
		echo "<option>" . $noticia['university'] . "</option>";
	}
}*/

while($row = mysqli_fetch_array($result))
{
	//print_r($row);
	if($row['university'] == $university){
		echo "<option selected>" . $row['university'] . "</option>";
	}else{
		echo "<option>" . $row['university'] . "</option>";
	}
}
echo "</select>";
echo "</div>";

echo "<div>";
echo "External Course Name: <select class='dropdown' id='course_name' name='course_name'>";
echo "<option>ALL</option>";
if(isset($university) and strlen($university) > 0){
	$result = mysqli_query($con, "SELECT DISTINCT(course_name) AS course_name FROM courses where university='$university'");
}
else{
	$result = mysqli_query($con, "SELECT DISTINCT(course_name) AS course_name FROM courses");
}
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
echo "<option>EMBEDDED SYSTEMS</option>";
echo "<option>DIGITAL SYSTEMS</option>";
echo "<option>DISCRETE MATH</option>";
echo "<option>PROBABILITY 1</option>";
echo "<option>DIFFERENTIAL EQUATIONS</option>";
echo "<option>NUMERICAL ANALYSIS 1</option>";
echo "<option>NUMERICAL ANALYSIS 2</option>";
echo "<option>LINEAR ALGEBRA 1</option>";
echo "<option>LINEAR ALGEBRA 2</option>";

echo "</select>";
echo "</div>";


mysqli_close($con);
?>
