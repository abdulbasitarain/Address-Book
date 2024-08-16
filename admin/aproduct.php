<?php include "./header.php"; ?>
<?php
include "./data.php";
if (isset($_POST['submit'])) {
    $ProductName = $_POST['Product_name'];
    $ProductDescription = $_POST['Product_des'];
    $ProductPrice = $_POST['Product_Price'];
    $ProductQuantity = $_POST['Product_Qty'];
    $Productimage = $_FILES['Product_img']['name'];
    $Productimagetemp = $_FILES['Product_img']['tmp_name'];
    $folder = "upload/" . $Productimage;
    $ProductStatus = $_POST['Product_status'];
    $catname = $_POST['cat'];
    $query = "INSERT INTO product(product_name, product_des, product_price, product_quantity, product_img, product_status, cat_id) VALUES ('$ProductName','$ProductDescription','$ProductPrice','$ProductQuantity','$Productimage','$ProductStatus','$catname')";
    $result = mysqli_query($con, $query);
    if (move_uploaded_file($Productimagetemp, $folder)) {
        $msg = "Add SuccessFully";
    }
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Product</h1>
        </div>
    </main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body">
                    <?php
            if (isset($msg)) {
            ?>
                <div class="alert alert-dismissible alert-success">
                    <strong><?php echo $msg ?></strong>
                </div>
            <?php } ?>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="form-group">
                                    <label class="form-label mt-4">Product Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Product" name="Product_name">
                                </div>
                                <div class="form-group">
                                    <label class="form-label mt-4">Product Description</label>
                                    <input type="text" class="form-control" placeholder="Enter Description" name="Product_des">
                                </div>
                                <div class="form-group">
                                    <label class="form-label mt-4">Product Price</label>
                                    <input type="text" class="form-control" placeholder="Enter Price" name="Product_Price">
                                </div>
                                <div class="form-group">
                                    <label class="form-label mt-4">Product Quantity</label>
                                    <input type="text" class="form-control" placeholder="Enter Quantity" name="Product_Qty">
                                </div>
                                <div class="form-group">
                                    <label class="form-label mt-4">Product Image</label>
                                    <input type="file" class="form-control" placeholder="Enter Image" name="Product_img" accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelect1" class="form-label mt-4">Select Status</label>
                                    <select class="form-select" id="exampleSelect1" name="Product_status">
                                        <option value="In stock">In stock</option>
                                        <option value="Out of stock">Out of stock</option>
                                    </select>
                                </div>
                                <!-- Start Category -->
                                <div class="form-group">
                    <label for="exampleSelect1" class="form-label mt-4">Select Category</label>
                    <select class="form-select" id="exampleSelect1" name="cat">
                        <option value="0">None</option>
                        <?php
                        $query = 'SELECT * FROM category WHERE parent_id < 2';
                        $result = mysqli_query($con, $query);
                        foreach ($result as $item) { ?>
                            <option value="<?php echo $item['id'] ?>"><?php echo $item['cat_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                            </div>
                            <input type="Submit" value="Add Category" class="btn btn-danger w-100 mt-4" name="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./footer.php"; ?>