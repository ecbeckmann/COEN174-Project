<?php 
session_start(); 
?>
<!DOCTYPE HTML> 
<html> 
	<head> 
		<title> SCU Equivalents </title> 
		<!-- Latest compiled and minified CSS -->
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/styles.css"> 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	</head> 
	
	<body> 
	<nav class="navbar navbar-default"> 
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">
					<img id="logo" alt="Brand" src="https://cloud.githubusercontent.com/assets/4735087/10567984/20b70294-75c6-11e5-941f-efffff4745bb.png"> 
					<?php
					include('loginbutton.php');
					?>
				</a>
			</div>
	</nav>
	<div class="content" style="clear:both;"> 
		<form class="input-form col-md-12 col-md-offset-1" method="post">
    			<label for="universy">University</label>
    			<input type="text" name="university" class="form-control" id="university">
    			<label for="country">Country</label>
    			<input type="text" name="country" class="form-control" id="country">
    			<label for="city">City</label>
    			<input type="text" name="city" class="form-control" id="city">
    			<label for="course-title">Course Number</label>
    			<input type="text" name="course_number" class="form-control" id="course_number">
    			<label for="course-name">Course Name</label>
    			<input type="text" name="course_name" class="form-control" id="course_name">
    			<label for="equivalent">Equivalent</label>
    			<input type="text" name="equivalent" class="form-control" id="equivalent">
			<label for"equivalent_name"> Equivalent Name </label>
			<input type="text" name="equivalent_name" class="form-control" id="equivalent_name"> 
  			<input type="submit" class="btn btn-default" style="float:left;" name = "submit" value="Submit">
		</form>
		<?php include 'addCourse.php'; ?> 
	</div>
	</body> 
</html>
