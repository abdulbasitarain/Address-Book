<?php include "./header.php"; ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">View Top 10 Selling Product</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Product Description</th>
                                            <!-- <th>Delete</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            include "./data.php";
                            $query = "SELECT * FROM product Where idd IN (2,4,8,19,20,26,27,28,29,30)";
                            $result = mysqli_query($con, $query);
                            foreach ($result as $item) { 
                                ?>
                                        <tr>
                                        <td><img src="<?php echo "upload/".$item['product_img'] ?>" width="100px" alt="img"></td>
                                            <td><?php echo $item['product_name'] ?></td>
                                            <td><?php echo $item['product_des'] ?></td>
                                            <!-- <td>
                                        <a href="./dsell.php?id=<?php echo $item['id'] ?>">
                                            <button type="button" class="btn btn-outline-danger">Delete</button>
                                        </a>
                                    </td> -->
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php include "./footer.php"; ?>