<?php
// include "./header.php";
session_start();
$_SESSION["user_id"] = 1;

echo "<script> window.location.href='../login.php' </script>";
?>