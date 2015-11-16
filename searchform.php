<!doctype html>
<html>

<head>
<SCRIPT language=JavaScript>

function reloadUniversity(form)
{
	var val1=form.university.options[form.university.options.selectedIndex].value;
	if(val1 == 'ALL') val1 = '';
	val2 = '';
	val3 = '';
	var val4=form.scu_equivalent.options[form.scu_equivalent.options.selectedIndex].value;
	if(val4 == 'ALL') val4 = '';
	
	self.location='index.php?university=' + val1 + '&course_name=' + val2 + '&course_number=' + val3 + '&scu_equivalent=' + val4;
}

function reload(form)
{
	var val1=form.university.options[form.university.options.selectedIndex].value;
	if(val1 == 'ALL') val1 = '';
	var val2=form.course_name.options[form.course_name.options.selectedIndex].value;
	if(val2 == 'ALL') val2 = '';
	var val3=form.course_number.options[form.course_number.options.selectedIndex].value;
	if(val3 == 'ALL') val3 = '';
	var val4=form.scu_equivalent.options[form.scu_equivalent.options.selectedIndex].value;
	if(val4 == 'ALL') val4 = '';
	
	self.location='index.php?university=' + val1 + '&course_name=' + val2 + '&course_number=' + val3 + '&scu_equivalent=' + val4;
}

/*function reloadUniversity(form)
{
	var val=form.university.options[form.university.options.selectedIndex].value;
	if(val == 'ALL') self.location='index.php';
	else self.location='index.php?university=' + val;
}/*
function reloadCourseName(form)
{
	var val=form.course_name.options[form.course_name.options.selectedIndex].value;
	if(val == 'ALL') self.location='index.php';
	else self.location='index.php?course_name=' + val;
}
function reloadCourseNumber(form){
	var val=form.course_number.options[form.course_number.options.selectedIndex].value;
	if(val == 'ALL') self.location='index.php';
	else self.location='index.php?course_number=' + val;
}
function reloadScuEquivalent(form){
	var val=form.scu_equivalent.options[form.scu_equivalent.options.selectedIndex].value;
	if(val == 'ALL') self.location='index.php';
	else self.location='index.php?scu_equivalent=' + val;
}*/
</script>
</head>
</html>

<?php 
@$university=$_GET['university'];
@$course_name=$_GET['course_name'];
@$course_number=$_GET['course_number'];
@$scu_equivalent=$_GET['scu_equivalent'];

session_save_path('/var/tmp');
include 'config.php';


$result = mysqli_query($con, "SELECT DISTINCT(university) AS university FROM courses ORDER BY university asc");

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
	//echo strlen($university);
	if(strlen($university) > 0 && $row['university'] == $university){
		echo "<option selected>" . $row['university'] . "</option>";
	}else{
		echo "<option>" . $row['university'] . "</option>";
	}
}
echo "</select>";
echo "</div>";

echo "<div>";
echo "External Course Name: <select class='dropdown' id='course_name' name='course_name' onchange=\"reload(this.form)\">";
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
	
	if(strlen($course_name) > 0 && $row['course_name'] == $course_name){
		
		echo "<option selected>" . $row['course_name'] . "</option>";
	}else{
		
		echo "<option>" . $row['course_name'] . "</option>";
	}
}
echo "</select>";
echo "</div>";

echo "<div>";
echo "External Course Number: <select class='dropdown' id='course_number' name='course_number' onchange=\"reload(this.form)\">";
echo "<option>ALL</option>";

if(isset($university) and strlen($university) > 0){
	$result =  mysqli_query($con, "SELECT DISTINCT(course_number) AS course_number FROM courses where university='$university'");
}
else{
	$result = mysqli_query($con, "SELECT DISTINCT(course_number) AS course_number FROM courses");
}
while($row = mysqli_fetch_array($result))
{
	//print_r($row);

	
	if(strlen($course_number) > 0 && $row['course_number'] == $course_number){
		echo "<option selected>" . $row['course_number'] . "</option>";
	}else{
		
		echo "<option>" . $row['course_number'] . "</option>";
	}
}
echo "</select>";
echo "</div>";

echo "<div>";
echo "SCU Foundations Equivalent: <select class='dropdown' id='scu_equivalent' name='scu_equivalent' onchange=\"reload(this.form)\">";
if($scu_equivalent == 'ALL'){
	echo "<option selected>ALL</option>";
}else{
	echo "<option>ALL</option>";	
}

if($scu_equivalent == 'LOGIC DESIGN'){
	echo "<option selected>LOGIC DESIGN</option>";
}else{
	echo "<option>LOGIC DESIGN</option>";
}
if($scu_equivalent == 'DATA STRUCTURES'){
	echo "<option selected>DATA STRUCTURES</option>";
}else{
	echo "<option>DATA STRUCTURES</option>";
}
if($scu_equivalent == 'EMBEDDED SYSTEMS'){
	echo "<option selected>EMBEDDED SYSTEMS</option>";
}else{
	echo "<option>EMBEDDED SYSTEMS</option>";
}
if($scu_equivalent == 'DIGITAL SYSTEMS'){
	echo "<option selected>DIGITAL SYSTEMS</option>";
}else{
	echo "<option>DIGITAL SYSTEMS</option>";
}
if($scu_equivalent == 'DISCRETE MATH'){
	echo "<option selected>DISCRETE MATH</option>";
}else{
	echo "<option>DISCRETE MATH</option>";
}
if($scu_equivalent == 'PROBABILITY 1'){
	echo "<option selected>PROBABILITY 1</option>";
}else{
	echo "<option>PROBABILITY 1</option>";
}
if($scu_equivalent == 'DIFFERENTIAL EQUATIONS'){
	echo "<option selected>DIFFERENTIAL EQUATIONS</option>";
}else{
	echo "<option>DIFFERENTIAL EQUATIONS</option>";
}
if($scu_equivalent == 'NUMERICAL ANALYSIS 1'){
	echo "<option selected>NUMERICAL ANALYSIS 1</option>";
}else{
	echo "<option>NUMERICAL ANALYSIS 1</option>";
}if($scu_equivalent == 'NUMERICAL ANALYSIS 2'){
	echo "<option selected>NUMERICAL ANALYSIS 2</option>";
}else{
	echo "<option>NUMERICAL ANALYSIS 2</option>";
}if($scu_equivalent == 'LINEAR ALGEBRA 1'){
	echo "<option selected>LINEAR ALGEBRA 1</option>";
}else{
	echo "<option>LINEAR ALGEBRA 1</option>";
}if($scu_equivalent == 'LINEAR ALGEBRA 2'){
	echo "<option selected>LINEAR ALGEBRA 2</option>";
}else{
	echo "<option>LINEAR ALGEBRA 2</option>";
}

echo "</select>";
echo "</div>";


mysqli_close($con);
?>
