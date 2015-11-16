<?php 
session_save_path('/var/tmp');
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
		<input type="button" class="btn btn-default" value="Back Home" onclick="history.back(-1)"/>
		<form class="input-form col-md-12 col-md-offset-1" method="post">
                        <label for="universy">University</label>
                        <p> (i.e. IIT BANGALORE) </p>
                        <input type="text" name="university" class="form-control" id="university">
                        <label for="country">Country</label>
                        <p> (i.e. INDIA) </p>
                        <input type="text" name="country" class="form-control" id="country">
                        <label for="city">City</label>
                        <p> (i.e. BANGALORE) </p>
                        <input type="text" name="city" class="form-control" id="city">
                        <label for="course-title">External Course Number</label>
                        <p> (i.e. CSE112) </p>
                        <input type="text" name="course_number" class="form-control" id="course_number">
                        <label for="course-name">External Course Name</label>
                        <p> (i.e. LOGIC DESIGN) </p>
                        <input type="text" name="course_name" class="form-control" id="course_name">
                        <label for="equivalent">SCU Equivalent Course Number</label>
                        <p> (i.e. COEN21) </p>
                                <select class='dropdown form-control' id='equivalent' name='equivalent' onchange="numberChange()">
                                        <option></option>
                                        <option>COEN 21</option>
                                        <option>COEN 12</option>
                                        <option>COEN 20</option>
                                        <option>ELEN 33</option>
                                        <option>AMTH 240</option>
                                        <option>AMTH 210</option>
                                        <option>AMTH 106</option>
                                        <option>AMTH 220</option>
                                        <option>AMTH 221</option>
                                        <option>AMTH 245</option>
                                        <option>AMTH 246</option>
                                </select>
                                <label for"equivalent_name">SCU Equivalent Course Name </label>
                                <p> (i.e. LOGIC DESIGN) </p>
                                <input type="text" name="equivalent_name" class="form-control" id="equivalent_name" readonly>
                                <input type="submit" class="btn btn-default" style="float:left;" name = "submit" value="Submit">
                </form>
		<?php include 'addCourse.php'; ?> 
	</div>
	</body> 
	<script type="text/javascript">
	function goHome() { 
                        window.location.href = "http://students.engr.scu.edu/~crohacz/COEN174";
        } 
	function numberChange(){
			var opt = document.getElementById("equivalent");
			var res = document.getElementById("equivalent_name");
			if(opt.value == "COEN 21"){
				res.value = "LOGIC DESIGN";
			}else if(opt.value == "COEN 12"){
				res.value = "DATA STRUCTURES";
			}else if(opt.value == "COEN 20"){
				res.value = "EMBEDDED SYSTEMS";
			}else if(opt.value == "ELEN 33"){
				res.value = "DIGITAL SYSTEMS";
			}else if(opt.value == "AMTH 240"){
				res.value = "DISCRETE MATH";
			}else if(opt.value == "AMTH 210"){
				res.value = "PROBABILITY 1";
			}else if(opt.value == "AMTH 106"){
				res.value = "DIFFERENTIAL EQUATIONS";
			}else if(opt.value == "AMTH 220"){
				res.value = "NUMERICAL ANALYSIS 1";
			}else if(opt.value == "AMTH 221"){
				res.value = "NUMERICAL ANALYSIS 2";
			}else if(opt.value == "AMTH 245"){
				res.value = "LINEAR ALGEBRA 1";
			}else if(opt.value == "AMTH 246"){
				res.value = "LINEAR ALGEBRA 2";
			}else{
				res.value = "";
			}
	}
	</script>
</html>
