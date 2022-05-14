<?php 
session_start();session_destroy();
$_SESSION = array();
session_destroy();
header("Location: index.php");
?>