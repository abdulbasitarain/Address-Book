<?php include './header.php'; ?>
<?php
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = "INSERT INTO users (name,email,password,role) VALUES ('$username','$email','$password',1)";
    $result = mysqli_query($con, $query);
    $msg = "Sign Up Successfully";
    $type = "success";
    echo "<script> window.location.href='index.php'</script>";
}
?>
<?php
if(isset($_POST['signup'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    $row = mysqli_fetch_assoc($result);
    $total = mysqli_num_rows($result);
    if($total > 0)
    {

        $msg = "Successfull";
        $type = "success";

        if($row["role"] == 1){
            // User
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_name"] = $row["name"];
            echo "<script> window.location.href='index.php' </script>";

        }else{
            // admin

        }
    }else{
        $msg  = "Invalid Email or Password";
        $type = "error";
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
                        <a href="./signup.php">Signup</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!--================Start Login Box Area =================-->
    <section class="login_box_area section_gap mt-4 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="Cos.png" alt="">
                        <div class="hover">
                            <h4>New to our website?</h4>
                            <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                            <a class="primary-btn" href="./signup.php">Get More Discount</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Signup Here</h3>
                        <form class="row login_form" action="#" method="POST" id="contactForm" novalidate="novalidate">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required>
                            </div>
                            <div class="col-md-12 form-group mt-2">
                                <button type="submit" class="primary-btn" name="signup">Signup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->



    <?php include './footer.php'; ?>