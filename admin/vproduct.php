<?php include "./header.php"; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">View Products</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Product Image</th>
                                <th>Product Status</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "./data.php";
                            $query = "SElECT * FROM product";
                            $result = mysqli_query($con, $query);
                            foreach ($result as $item) { 
                                
                                ?>
                                <tr class="table-active">
                                    <td><?php echo $item['product_name'] ?></td>
                                    <td><?php echo $item['product_des'] ?></td>
                                    <td>$<?php echo $item['product_price'] ?></td>
                                    <td><?php echo $item['product_quantity'] ?></td>
                                    <td><img src="<?php echo "upload/".$item['product_img'] ?>" width="100px" alt="img"></td>
                                    <td><?php echo $item['product_status'] ?></td>
                                    <td>
                                        <a href="./dproduct.php?id=<?php echo $item['idd'] ?>">
                                            <button type="button" class="btn btn-outline-danger">Delete</button>
                                        </a>
                                    </td>
                                    <td><a href="./eproduct.php?id=<?php echo $item['idd'] ?>"><button type="button" class="btn btn-outline-success">Edit</button></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <?php include "./footer.php"; ?>