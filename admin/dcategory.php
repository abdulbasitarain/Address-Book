<?php 
include "./data.php";
$itemid = $_GET['id'];
$query = "DELETE FROM category WHERE id = '$itemid'";
$result = mysqli_query($con, $query);
$dmsg = "Delete Succesfully";
?>
<script>window.location.href="./vcategory.php"</script>
                <?php
                if (isset($dmsg)) {
                ?>
                    <div class="alert alert-dismissible alert-success">
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> -->
                        <strong><?php echo $dmsg ?></strong>
                    </div>
                <?php } ?>