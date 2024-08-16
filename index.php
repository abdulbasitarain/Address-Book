<?php include './header.php'; ?>

<?php
if (isset($_GET['pid']) && isset($_GET['pprice'])) {
    $pid = $_GET['pid'];
    $pprice = $_GET['pprice'];
    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $query = "INSERT INTO cart (pid,pprice,ipaddress) VALUES ('$pid','$pprice','$ipaddress')";
    $result = mysqli_query($con, $query);
    echo '<script>window.location.assign(./index.php)</script>';
}
?>
<!-- Categories Section Begin -->
<section class="categories">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="categories__item categories_large_item">
                    <div class="categories__text">
                        <h1>Branded Cosmetics</h1>
                        <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                            edolore magna aliquapendisse ultrices gravida.</p>
                        <a href="./shop.php">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="categories__item categories_large_item1">
                    <div class="categories__text">
                        <h1>Branded Jewellery</h1>
                        <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                            edolore magna aliquapendisse ultrices gravida.</p>
                        <a href="./shop.php">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>Best Selling product</h4>
                </div>
            </div>
        </div>
        <div class="row property__gallery">
            <?php
            $result = mysqli_query($con, "SELECT * FROM product where idd IN (3,7,8,12,16,19,20,24) ");
            foreach ($result as $item) {
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix cosmetic">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="./admin/upload/<?php echo $item['product_img'] ?>">
                            <div class="label new">New</div>
                            <ul class="product__hover">
                                <li><a href="./addtocart.php?pid=<?php echo $item['idd'] ?>"><span class="arrow_expand"></span></a></li>
                                <li><a href="./index.php?pid=<?php echo $item['idd'] ?>&pprice=<?php echo $item['product_price'] ?>"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#"><?php echo $item['product_name'] ?></a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ <?php echo $item['product_price'] ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Free Shipping</h6>
                    <p>For all oder over $99</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Money Back Guarantee</h6>
                    <p>If good have Problems</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Online Support 24/7</h6>
                    <p>Dedicated support</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Payment Secure</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->
<section class="trend spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-6">

                <div class="trend__content">
                    <div class="section-title">
                        <h4>Hot Trend</h4>
                    </div>
                    <div class="trend__item">
                        <?php
                        $result = mysqli_query($con, "SELECT * FROM product where idd IN (7,12,16) ");
                        foreach ($result as $item) {
                        ?>
                            <div class="trend__item__pic">
                                <img src="./admin/upload/<?php echo $item['product_img'] ?>" alt="" height="80px">
                            </div>
                            <div class="trend__item__text">
                                <h6><?php echo $item['product_name'] ?></h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">$ <?php echo $item['product_price'] ?></div>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Best seller</h4>
                    </div>
                    <div class="trend__item">
                        <?php
                        $result = mysqli_query($con, "SELECT * FROM product where idd IN (7,9,12) ");
                        foreach ($result as $item) {
                        ?>
                            <div class="trend__item__pic">
                                <img src="./admin/upload/<?php echo $item['product_img'] ?>" alt="" height="80px">
                            </div>
                            <div class="trend__item__text">
                                <h6><?php echo $item['product_name'] ?></h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">$ <?php echo $item['product_price'] ?></div>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Feature</h4>
                    </div>
                    <div class="trend__item">
                        <?php
                        $result = mysqli_query($con, "SELECT * FROM product where idd IN (7,9,12) ");
                        foreach ($result as $item) {
                        ?>
                            <div class="trend__item__pic">
                                <img src="./admin/upload/<?php echo $item['product_img'] ?>" alt="" height="80px">
                            </div>
                            <div class="trend__item__text">
                                <h6><?php echo $item['product_name'] ?></h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">$ <?php echo $item['product_price'] ?></div>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<?php include './footer.php'; ?>