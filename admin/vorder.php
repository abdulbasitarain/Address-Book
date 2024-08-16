<?php include "./header.php"; ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">View Orders</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>First Name </th>
                                            <th>Last Name </th>
                                            <th>Address</th>
                                            <th>Email </th>
                                            <th>WorkPhone</th>
                                            <th>Cell No.</th> 
                                            <th>Date Of Birth</th> 
                                            <th>Category</th> 
                                            <th>Remarks</th> 
                                            <th>Product/Quantity</th> 
                                            <th>Total Price</th> 
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            include "./data.php";
                            $query = "SElECT * FROM orders";
                            $result = mysqli_query($con, $query);
                            foreach ($result as $item) { 
                                
                                ?>
                                        <tr>
                                            <td><?php echo $item['fname'] ?></td>
                                            <td><?php echo $item['lname'] ?></td>
                                            <td><?php echo $item['address'] ?></td>
                                            <td><?php echo $item['email'] ?></td>
                                            <td><?php echo $item['workphone'] ?></td>
                                            <td><?php echo $item['cellphone'] ?></td>
                                            <td><?php echo $item['birthdate'] ?></td>
                                            <td><?php echo $item['category'] ?></td>
                                            <td><?php echo $item['remarks'] ?></td>
                                            <td><?php echo $item['orderproduct'] ?></td>
                                            <td><?php echo $item['orderprice'] ?></td>
                                            <td>
                                        <a href="./dorder.php?id=<?php echo $item['id'] ?>">
                                            <button type="button" class="btn btn-outline-danger">Delete</button>
                                        </a>
                                    </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php include "./footer.php"; ?>