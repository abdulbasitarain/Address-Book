<?php include './header.php'; ?>
<?php
if (isset($_POST['order'])) {
    $Firstname = $_POST['f_name'];
    $Lastname = $_POST['l_name'];
    $Address = $_POST['add'];
    $Email = $_POST['mail'];
    $Wphone = $_POST['phone'];
    $Cphone = $_POST['cell'];
    $Date = $_POST['date'];
    $Category = $_POST['cat'];
    $Remark = $_POST['remark'];

    $cart_query = mysqli_query($con, "SELECT * FROM product JOIN cart WHERE product.idd = cart.pid");
    $price_total = 0;
    if(mysqli_num_rows($cart_query) > 0){
       while($product_item = mysqli_fetch_assoc($cart_query)){
        $product_name[] = $product_item['product_name'] .' ('. $product_item['pqyt'] .') ';
        $total_product = implode(', ',$product_name);
        $product_price = number_format($product_item['pprice'] * $product_item['pqyt']);
        $total = $price_total += $product_price;   
       };
    };
    $query = "INSERT INTO orders (fname, lname, address, email, workphone, cellphone, birthdate, category, remarks, orderproduct, orderprice) VALUES ('$Firstname','$Lastname','$Address','$Email','$Wphone','$Cphone','$Date', '$Category','$Remark','$total_product','$total')";
    $result = mysqli_query($con, $query);
}
?>
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.php"><i class="fa fa-home"></i>Home</a>
                    <span>CheckOut</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <form action="#" class="checkout__form" method="POST">
            <div class="row">
                <div class="col-lg-8">
                    <h5>Billing detail</h5>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>First Name <span>*</span></p>
                                <input type="text" name="f_name" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Last Name <span>*</span></p>
                                <input type="text" name="l_name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Address <span>*</span></p>
                                <input type="text" placeholder="Street Address" name="add">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Email <span>*</span></p>
                                <input type="email" name="mail">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Work Phone No.<span>*</span></p>
                                <input type="text" name="phone">
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Cell No. <span>*</span></p>
                                <input type="text" name="cell">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Date Of Birth<span>*</span></p>
                                <input type="date" name="date">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Category<span>*</span></p>
                                <input type="text" name="cat">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="checkout__form__input">
                                <p>Remarks <span>*</span></p>
                                <input type="text" name="remark">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout__order">
                        <h5>Your order</h5>
                        <div class="checkout__order__product">
                            <ul>
                                <li>
                                    <span class="top__text">Product</span>
                                    <span class="top__text__right">Price</span>
                                </li>
                                <?php
                                $query = "SELECT * FROM product JOIN cart WHERE product.idd = cart.pid";
                                $result = mysqli_query($con, $query);
                                foreach ($result as $item) {
                                ?>
                                    <li><?php echo $item['product_name'] ?> <span>$ <?php echo $item['product_price'] ?> (x<?php echo $item["pqyt"] ?>)</span></li>

                                <?php } ?>
                            </ul>

                        </div>
                        <div class="checkout__order__total">
                            <ul>
                                <li>Total <span>
                                        <?php
                                        $ipaddress = $_SERVER['REMOTE_ADDR'];
                                        $query = "SELECT sum(pprice*pqyt) as subtotal FROM cart WHERE ipaddress = '$ipaddress'";
                                        $result = mysqli_query($con, $query);
                                        $total = mysqli_fetch_assoc($result)['subtotal'];
                                        ?>
                                        <a>$ <?php echo $total ?></a>
                            </ul>
                        </div>
                        <input type="submit" class="site-btn" name="order" value="Place Order">
                    </div>
                </div>

            </div>
        </form>
    </div>
</section>
<!-- Checkout Section End -->

<?php include './footer.php'; ?>