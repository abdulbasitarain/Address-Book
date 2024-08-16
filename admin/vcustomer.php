<?php include "./header.php"; ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">View Top 10 Customer</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Review</th>
                                            <th>Total Shopping</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            include "./data.php";
                            $query = "SELECT * FROM orders";
                            $result = mysqli_query($con, $query);
                            foreach ($result as $item) { 
                                ?>
                                        <tr>
                                            <td><?php echo $item['fname'] ?> <?php echo $item['lname'] ?></td>
                                            <td><?php echo $item['remarks'] ?></td>
                                            <td>$ <?php echo $item['orderprice'] ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php include "./footer.php"; ?>