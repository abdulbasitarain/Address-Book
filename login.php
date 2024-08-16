<?php include './header.php'; ?>
<?php
// include "./db.php";
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    $row = mysqli_fetch_assoc($result);
    $total = mysqli_num_rows($result);
    if($total > 0)
    {
        $msg = "Successfull";
        $type = "success";

        if($row["role"] > 1){
            // User
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_name"] = $row["name"];
            echo "<script> window.location.href='index.php' </script>";
        }else{
              // Admin
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_name"] = $row["name"];
            echo "<script> window.location.href='./admin/acategory.php' </script>";
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
                        <span>Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

<!--================Login Box Area =================-->
<section class="login_box_area section_gap mt-3 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="Cos.png" alt="">
                    <div class="hover">
                        <h4>New to our website?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                        <a class="primary-btn" href="registration.html">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Log In To Enter</h3>
                    <form class="row login_form" action="#" method="POST" id="contactForm" novalidate="novalidate">
                        <div class="col-md-12 form-group">
                            <input type="Email" class="form-control" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                        </div>
                        <div class="col-md-12 form-group mt-3">
                            <button type="submit" value="submit" class="primary-btn" name="login">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->

    <?php include './footer.php'; ?>