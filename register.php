<?php
require('connection.inc.php');
require('functions.inc.php');

$username = '';
$password = '';
$email = '';
$mobile = '';

$msg = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $image_required = '';
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "select * from admin_users where id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $username = $row['username'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $password = $row['password'];
    } else {
        header('location:admin/');
        die();
    }
}

if (isset($_POST['submit'])) {
    $username = get_safe_value($con, $_POST['username']);
    $email = get_safe_value($con, $_POST['email']);
    $mobile = get_safe_value($con, $_POST['mobile']);
    $password = get_safe_value($con, $_POST['password']);

    $res = mysqli_query($con, "select * from admin_users where username='$username'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                $msg = "Username already exist";
            }
        } else {
            $msg = "Username already exist";
        }
    }


    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $update_sql = "update admin_users set username='$username',password='$password',email='$email',mobile='$mobile' where id='$id'";
            mysqli_query($con, $update_sql);
        } else {
            mysqli_query($con, "insert into admin_users(username,password,email,mobile,role,status) values('$username','$password','$email','$mobile',1,1)");
        }
        header('location:admin/');
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- index.html  30 Nov 2019 03:15:44 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Doraemon - All-In-One ToolHub</title>
    <!-- fontawesome css link -->
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <!-- flaticon css -->
    <link rel="stylesheet" href="assets/font/flaticon.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- nice-select css -->
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- swipper css link -->
    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <!-- animate.css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- main style css link -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- responsive css link -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <style>
        .placeholder {
            color: black;
            position: relative;
            top: -30px;
            right: 260px
        }

        .placeholder:after {
            content: '*';
            color: red
        }


        .place:focus+.placeholder {
            display: none;
        }
    </style>
</head>

<body>


    <!-- preloader -->
    <div class="preloader" id="preloader">
        <div class="preloader-thumb">
            <img src="assets/images/propeller.png" alt="image">
        </div>
    </div>

    <!-- header-section start -->
    <header class="header-section">
        <div class="header-bottom">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <a class="site-logo site-title" href="index.html"><img src="assets/images/logo.png" alt="site-logo"></a>
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fas fa-bars"></span>
                    </button>
                    <nav class="navbar navbar-expand-lg p-0">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav main-menu ml-auto">
                                <li><a href="index.php">Home</a>
                                </li>
                                <li><a href="about.html">About</a></li>
                                <li class="menu_has_children"><a href="#0">Explore Our Tools<i class="fas fa-caret-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="">JPG to PDF Converter</a></li>
                                        <li><a href="">PNG to PDF Converter</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                            <div class="header-action d-flex flex-wrap align-items-center">
                                <a href="register.php" class="cmn-btn">Use All Tools</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header-section end -->



    <a href="#" class="scrollToTop"><img src="assets/images/aeroplane.png" alt="image"></a>

    <!-- breadcrumb-section start -->
    <div class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Account</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb-section end -->


    <!-- register-section start -->
    <section class="register-section pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="register-form-area account-area change-form">
                        <a href="admin/" class="cmn-btn-active">Login</a>
                        <a href="#" class="cmn-btn ml-3">Registration</a>
                        <h3 class="title">well come to Flio</h3>
                        <form class="create-account-form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="place" name="username" value="<?php echo $username ?>">
                                <span class="placeholder">Username</span>
                            </div>
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                                <input type="text" class="place" name="email" value="<?php echo $email ?>" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" required>
                                <span class="placeholder">Email</span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="place" id="myInput" required name="mobile" value="<?php echo $mobile ?>" pattern="[0-9]{10}" required>
                                <span class="placeholder">Mobile</span>
                            </div>
                            <div class="form-group">
                                <input type="password"  class="place" id="myInputTwo" name="password" value="<?php echo $password ?>" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                <span class="placeholder">Password</span>
                                <a href="#0" id="show-pass-two" class="show-pass"><i class="fas fa-eye"></i></a>
                            </div>
                            <div class="form-group">
                                <input name="submit" type="submit" value="create Doremon account">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- register-section end -->

    <div class="privacy-area wow fadeIn" data-wow-duration="0.5" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p><a href="#">GSS BCA Students</a> </p>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-section end -->





    <!-- jquery -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- migarate-jquery -->
    <script src="assets/js/jquery-migrate-3.0.0.js"></script>
    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- magnific-popup js -->
    <script src="assets/js/jquery.magnific-popup.js"></script>
    <!-- isotope -->
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!-- nice-select js-->
    <script src="assets/js/jquery.nice-select.js"></script>
    <!-- swipper js -->
    <script src="assets/js/swiper.min.js"></script>
    <!-- waypoints js link -->
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <!-- counterup js -->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- paroller js -->
    <script src="assets/js/jquery.paroller.min.js"></script>
    <!-- main -->
    <script src="assets/js/main.js"></script>


</body>

<!-- index.html  30 Nov 2019 03:18:45 GMT -->

</html>
<!-- pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"
pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
pattern="[0-9]{10}" -->