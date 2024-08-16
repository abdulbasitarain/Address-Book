<?php
session_start();
$_SESSION["user_id"] = 0;
header("Location: index.php");
?>
