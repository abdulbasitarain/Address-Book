<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
            <!-- <div class="shop__sidebar">
                    <div class="sidebar__categories">
                        <div class="section-title">
                            <h4>Categories</h4>
                        </div>
                        <div class="categories__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Jewellery</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul>
                                                <li><a href="#">Ring</a></li>
                                                <li><a href="#">Ear Rings</a></li>
                                                <li><a href="#">Necklace</a></li>
                                                <li><a href="#">Bracelet</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFive">Cosmetic</a>
                                    </div>
                                    <div id="collapseFive" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul>
                                                <li><a href="#">Eyes</a></li>
                                                <li><a href="#">Lips</a></li>
                                                <li><a href="#">Nails</a></li>
                                                <li><a href="#">Makeup Tools</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar__sizes">
                    </div>
                </div> -->
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="row">
                    <?php
                    include './admin/data.php';

                    if (isset($_POST['value'])) {
                        $input = $_POST['value'];
                        $searchQuery = "SELECT * FROM `product` WHERE product_name LIKE '%$input%'";
                        $result = mysqli_query($con, $searchQuery);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <div class="col-md-4 col-sm-6 mix women shadow mb-5">
                                    <div class="product__item">
                                    

                                        <img class="product__item__pic set-bg "  src="./admin/upload/<?php echo $row['product_img'] ?>" alt="Card image cap">
                                        <ul class="product__hover">
                                            <li><a href="./addtocart.php?pid=<?php echo $row['idd'] ?>"><span class="arrow_expand"></span></a></li>
                                            <li><a href="./index.php?pid=<?php echo $row['idd'] ?>&pprice=<?php echo $row['product_price'] ?>"><span class="icon_bag_alt"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="#"><?php echo $row['product_name'] ?></a></h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product__price">$<?php echo $row['product_price'] ?></div>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <div class="col-md-12">
                                <p>No results found.</p>
                            </div>
                        <?php }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
