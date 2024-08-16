<?php include './header.php'; ?>
<?php
if(isset($_GET['cid'])){
    $cid = $_GET['cid'];
    $query = mysqli_query($con, "DELETE FROM cart WHERE cid = '$cid'");
}

if(isset($_POST["update"])){
    for ($i=0; $i < count($_POST["cid"]); $i++) {
        $query = "UPDATE cart SET pqyt = '". $_POST["pqyt"][$i] ."' where cid = '". $_POST["cid"][$i] ."';";
        mysqli_query($con,$query);
    }
}
?>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i>Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <form class="container" action="#" method="POST">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query = "SELECT * FROM product JOIN cart WHERE product.idd = cart.pid";
                            $result = mysqli_query($con, $query);
                            foreach($result as $item){
                            ?>
                                <tr>

                                    <td class="cart__product__item">
                                        <input type="number" name="cid[]" style="display:none" value="<?php echo $item['cid'] ?>">
                                        <input type="number" name="pid[]" style="display:none" value="<?php echo $item['pid'] ?>">

                                        <img src="./admin/upload/<?php echo $item['product_img']?>" alt="" height="80px">
                                        <div class="cart__product__item__title">
                                            <h6><?php echo $item['product_name']?></h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">$ <?php echo $item['product_price']?>
                                        <input type="number" class="iprice" name="pprice[]" style="display:none" value="<?php echo $item['product_price'] ?>">
                                    </td>
                                    <td class="cart__quantity" >
                                        <div class="pro-qty">
                                            <input type="text" class="iqty" value="<?php echo $item['pqyt'] ?>" name="pqyt[]" onchange="subtotal()">
                                        </div>
                                    </td>
                                    <td class="cart__total itotal">$ 0</td>
                                    <td class="cart__close"><a class="icon_close" href="./cart.php?cid=<?php echo $item['cid']?>"></a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="./shop.php">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <input type="submit" name="update" value="Update cart"></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6"></div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>
                                <a>$ <span id="sub_total"> </span> </a>
                            </span>
                        </li>
                        </ul>
                        <a href="./checkout.php" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- Shop Cart Section End -->

    <?php include './footer.php'; ?>
<script>

var iprice = document.getElementsByClassName('iprice');
var iqty = document.getElementsByClassName('iqty');
var itotal = document.getElementsByClassName('itotal');

function subtotal()
{
    let sum = 0;
    for(i=0;i<iprice.length;i++)
    {
        let product_total = (iprice[i].value)*($(iqty[i]).val());
        sum += product_total;
        itotal[i].innerText = "$ " + product_total;
    }


    document.getElementById("sub_total").innerText = sum ;
}
        subtotal();

</script>