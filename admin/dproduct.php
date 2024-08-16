<?php 
include "./data.php";
$itemid = $_GET['id'];
$query = "DELETE FROM product WHERE idd = '$itemid'";
$result = mysqli_query($con, $query);
echo "";
?><script>window.location.href="./vproduct.php"</script>