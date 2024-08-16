<?php include "./header.php"; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">View Categories</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Sub-Category</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "./data.php";
                            $query = "SELECT c1.id as category_id, c2.Cat_name Category_name, c1.Cat_name Subcategory_name FROM category c1, category c2 WHERE c2.Id = c1.Parent_id;";
                            $result = mysqli_query($con, $query);
                            foreach ($result as $item) { ?>
                                <tr class="table-active">
                                     <td><?php echo $item['Category_name'] ?></td>
                                     <td><?php echo $item['Subcategory_name'] ?></td>
                                     <td><a href="./dcategory.php?id=<?php echo $item['category_id']?>">
                                        <button type="button" class="btn btn-outline-danger">Delete</button></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <?php include "./footer.php"; ?>