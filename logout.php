<?php
session_save_path('/webpages/ebeckman/COEN174/sessions');
session_start();
unset($_SESSION);
session_destroy();
include('login.php');
?>
