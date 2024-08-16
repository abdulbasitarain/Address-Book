<?php 
include "./data.php";
$itemid = $_GET['id'];
$query = "DELETE FROM users WHERE id = '$itemid'";
$result = mysqli_query($con, $query);
?>
<script>window.location.href="./vlogin.php"</script>