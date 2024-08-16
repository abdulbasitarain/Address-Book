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
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="breadcrumb__links">
                    <a href="./index.php"><i class="fa fa-home"></i>Home</a>
                    <span>Shop</span>
                </div>
            </div>
            <div class="col-lg-4">
                <form class="search-form" method="GET" action="search.php">
                    <div class="input-group">
                        <input type="text" name="Title" id="search" class="form-control mb-3" placeholder="Search Product">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<div id="Searchresult" style="display: none;"></div>

<!-- Shop Section Begin -->
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
                <div class="row" id="olddata">
                    <?php
                    $querry = "SELECT * FROM `product`";
                    $results = mysqli_query($con, $querry);
                    while ($row = mysqli_fetch_assoc($results)) { ?>
                        <div class="col-md-4 col-sm-6 mix women shadow mb-5">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="./admin/upload/<?php echo $row['product_img'] ?>">
                                    <div class="label new">New</div>
                                    <ul class="product__hover">
                                        <li><a href="./addtocart.php?pid=<?php echo $row['idd'] ?>"><span class="arrow_expand"></span></a></li>
                                        <li><a href="./shop.php?pid=<?php echo $row['idd'] ?>&pprice=<?php echo $row['product_price'] ?>"><span class="icon_bag_alt"></span></a></li>
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
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-12 text-center">
                    <div class="pagination__option">
                        <a href="#">1</a>
                        <a href="./shop.php">2</a>
                        <a href="./shop.php">3</a>
                        <a href="#"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->

<?php include './footer.php'; ?>

<script>
    $(document).ready(function() {
        $("#search").keyup(function() {
            var value = $(this).val();

            if (value != "") {
                $.ajax({
                    url: "search.php",
                    method: "post",
                    data: {
                        value: value
                    },
                    success: function(data) {
                        $("#Searchresult").html(data);
                        $("#Searchresult").show();
                        $("#olddata").hide();
                    }
                });
            } else {
                $("#Searchresult").hide();
                $("#olddata").show();
            }
        });
    });
</script>
