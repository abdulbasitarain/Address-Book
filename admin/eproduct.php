<?php
include "./header.php";
?>
<?php
include "./data.php";
$product = null;
if (isset($_GET['id'])) {
    $query = "SELECT * FROM product where idd = '" . $_GET['id'] . "' LIMIT 1";
    $result = mysqli_query($con, $query);
    $product = mysqli_fetch_assoc($result);
}

if (isset($_POST['submit'])) {
    $ProductName = $_POST['Product_name'];
    $ProductDescription = $_POST['Product_des'];
    $ProductPrice = $_POST['Product_Price'];
    $ProductQuantity = $_POST['Product_Qty'];
    $ProductStatus = $_POST['Product_status'];
    $id = $_GET['id'];

    // Handle file upload
    $Productimage = $_FILES['Product_img']['name'];
    $Productimagetemp = $_FILES['Product_img']['tmp_name'];
    $folder = "upload/" . $Productimage;

    // Check if a new file is uploaded
    if (!empty($Productimage)) {
        // Move the uploaded file to the destination folder
        if (move_uploaded_file($Productimagetemp, $folder)) {
            // Update the product image in the database
            $query = "UPDATE product SET product_img = '$Productimage' WHERE idd = '$id'";
            mysqli_query($con, $query);
        }

    }

    // Update other product details
    $query = "UPDATE product SET product_name = '$ProductName', product_des = '$ProductDescription', product_price = '$ProductPrice', product_quantity = '$ProductQuantity', product_status = '$ProductStatus' WHERE idd = '$id'";

    if (mysqli_query($con, $query)) {
        echo "done";
    }
    echo "<script> window.location.assign('vproduct.php')</script>";    

}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Product</h1>
        </div>
    </main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body">
                        <?php if (isset($msg)) { ?>
                            <div class="alert alert-dismissible alert-success">
                                <strong><?php echo $msg ?></strong>
                            </div>
                        <?php } ?>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="form-group">
                                    <label class="form-label mt-4">Product Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Product" name="Product_name" value='<?= $product["product_name"] ?>'>
                                </div>
                                <div class="form-group">
                                    <label class="form-label mt-4">Product Description</label>
                                    <input type="text" class="form-control" placeholder="Enter Description" name="Product_des" value='<?= $product["product_des"] ?>'>
                                </div>
                                <div class="form-group">
                                    <label class="form-label mt-4">Product Price</label>
                                    <input type="text" class="form-control" placeholder="Enter Price" name="Product_Price" value="<?= $product["product_price"] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label mt-4">Product Quantity</label>
                                    <input type="text" class="form-control" placeholder="EnterQuantity" name="Product_Qty" value="<?= $product["product_quantity"] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label mt-4">Product Image</label>
                                    <input type="file" class="form-control" placeholder="Enter Image" name="Product_img" accept="image/*">
                                    <?php if (!empty($product["product_img"])) : ?>
                                        <img src="upload/<?= $product["product_img"] ?>" alt="Product Image" style="max-width: 200px; margin-top: 10px;">
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelect1" class="form-label mt-4">Select Status</label>
                                    <select class="form-select" id="exampleSelect1" name="Product_status">
                                        <option value="In stock" <?= ($product["product_status"] == "In stock") ? "selected" : "" ?>>In stock</option>
                                        <option value="Out of stock" <?= ($product["product_status"] == "Out of stock") ? "selected" : "" ?>>Out of stock</option>
                                    </select>
                                </div>
                            </div>
                           
                         <input type="submit" value="Edit Product" class="btn btn-danger w-100 mt-4" name="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./footer.php"; ?>