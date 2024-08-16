<?php include "./header.php"; ?>
<?php
include "./data.php";
if (isset($_POST['submit'])) {
    $catname = $_POST['cname'];
    $selectname = $_POST['sname'];
    $query = "INSERT INTO category(cat_name,parent_id) VALUES ('$catname','$selectname')";
    $result = mysqli_query($con, $query);
    $msg = "Add SuccessFully";
   
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Categories</h1>
        </div>
    </main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-body">
                        <form action="" method="POST">
                        <?php
                if (isset($msg)) {
                ?>
                    <div class="alert alert-dismissible alert-success">
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> -->
                        <strong><?php echo $msg ?></strong>
                    </div>
                <?php } ?>

                            <div class="row mb-3"></div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="text" placeholder="Enter Category name" name="cname" />
                                <label for="inputEmail">Enter Category</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1" class="form-label mt-1 ms-1">Select Sub-Category</label>
                                <select class="form-select" id="exampleSelect1" name="sname">
                                    <option value="0">None</option>
                                    <?php
                                    // include ".db.php";
                                    $query = 'SELECT * FROM category WHERE parent_id < 2';
                                    $result = mysqli_query($con, $query);
                                    foreach ($result as $item) { ?>
                                        <option value="<?php echo $item['id'] ?>"><?php echo $item['cat_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>       
                                <input type="Submit" value="Add Category" class="btn btn-danger w-100 mt-4" name="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./footer.php"; ?>