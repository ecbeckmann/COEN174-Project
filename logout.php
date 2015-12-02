<?php
session_save_path('/var/tmp'); 
session_start();
unset($_SESSION);
session_destroy();
include('login.php');
?>
