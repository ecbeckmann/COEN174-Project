
<?php
$host_name = "dbserver.engr.scu.edu"; 
$database = "sdb_crohacz"; 
$username = "crohacz";
$password = "00000896245";
$con = mysqli_connect($host_name, $username, $password, $database); 
 
if (mysqli_connect_errno()) { 

	echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
}

?>
