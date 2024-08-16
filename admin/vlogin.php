<?php include "./header.php"; ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Login Customer</h1>
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="">Category</a></li>
                            <li class="breadcrumb-item active">View Categories</li>
                        </ol> -->
                        <!-- <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div> -->
                        <div class="card mb-4">
                            <!-- <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div> -->
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Email</th> 
                                            <th>Password</th> 
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                    <?php 
                                        include "./data.php";
                                        $query = "SELECT * FROM users";
                                        $result = mysqli_query($con, $query);
                                        foreach($result as $item){
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $item['email']?></td>
                                            <td><?php echo $item['password']?></td>
                                            <td><a href="./dlogin.php?id=<?php echo $item['id'] ?>">
                                            <button type="button" class="btn btn-outline-danger">Delete</button>
                                        </a></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php include "./footer.php"; ?>