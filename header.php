<?php
include 'Conn.php';
$current_page=basename($_SERVER['PHP_SELF']);
$page_url=$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/';                      
if (isset($_SESSION["userid"])){
$userid = $_SESSION["userid"] ;
   
}else{
    $userid = $_SERVER['REMOTE_ADDR'];
    
    
}

?>
<!doctype html>
<html lang="en">
<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Lilovat solar Technology is a Nigeria based solar energy provider, We provide energy solution to people all over west Africa.<br>
                            Our range of services includes Solar training in Lagos, and other par of Nigeria, solar energy installation, Inverter installation, inverter repairs, Renewable energy consultancy, Sales of Inverter, Solar equipments and support services.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>Solar training center in lagos, other part of Nigeria.</title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="css/slick.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="css/animate.css">
    
    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="css/nice-select.css">
    
    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="css/jquery.nice-number.min.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="css/default.css">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="css/style.css">
    
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="css/responsive.css">
  
  
</head>

<body>
    
    <!--====== HEADER PART START ======-->
    
    <header id="header-part">
        <div class="header-top d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="header-contact">
                            <ul>
                                <li><i class="fa fa-envelope"></i><a href="#">info@lilovatsolar.ng</a></li>
                                <li><i class="fa fa-phone"></i><span>+234 810 773 66301</span></li>
                            </ul>
                        </div> <!-- header contact -->
                    </div>
                    <div class="col-md-6">
                        <div class="header-right d-flex justify-content-end">
                            <div class="social d-flex">
                                <span class="follow-us">Follow Us :</span>
                                <ul>
                                    <li><a href="https://web.facebook.com/Lilovatsolar"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="http://www.youtube.com/lilovat"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="http://www.twitter.com/lilovat"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.instagram.com/lilovatsolar"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="https://www.linkedin.com/company/lilovat-solar-technology/"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div> <!-- social -->
                            <div class="login-register">
                                <ul><?php
                                    if ($userid==$_SERVER['REMOTE_ADDR']){

   echo '<li><a href="login.php">Login</a></li>
                                    <li><a href="register.php">Register</a></li>';
}else{
 echo '<li><a href="?logout=1">Logout</a></li>
                                    ';
}
                                    ?>
                                    
                                </ul>
                            </div>
                        </div> <!-- header right -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header top -->
        
        <div class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.php">
                                <img src="images/logo.png" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a <?php
                                           if($current_page=='index.php')
                                           echo 'class="active"';
                                           
                                           ?> href="index.php">Home</a></li>
                                    <li class="nav-item">
                                        <a <?php
                                           if($current_page=='about.php'||$current_page=='gallery.php'||$current_page=='policy')
                                           echo 'class="active"';
                                           ?> >About </a>
                                        <ul class="sub-menu">
                                            <li><a href="about.php">About Us</a></li>
                                            <li><a href="#">Gallery</a></li>
                                            <li><a href="policy.php">Privacy Policy</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a
                                           <?php
                                           if($current_page=='shop.php')
                                           echo 'class="active"';
                                           ?> href="shop.php">Shop</a>
                                    <li class="nav-item">
                                        <a <?php
                                           if($current_page=='installation.php')
                                           echo 'class="active"';
                                           ?> href="#">Research</a>
                                    </li>
                                    <li class="nav-item">
                                        <a <?php
                                           if($current_page=='courses.php')
                                           echo 'class="active"';
                                           ?> >Solar Academy</a>
                                        <ul class="sub-menu">
                                            <li><a href="courses.php">Courses</a></li>
                                            <li><a <?php
                                    if($current_page=='login.php'||$current_page=='pay.php'||$current_page=='testi.php')
                                           echo 'class="active"';
                                           ?> href="register.php">Student Registration</a></li>
                                            <li><a  href="login.php">student login</a></li>
                                            <li><a href="#">Pay for my course</a></li>
                                            <li><a href="testi.php">Testimonial</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a <?php
                                           if($current_page=='contact.php')
                                           echo 'class="active"';
                                           ?> href="contact.php">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a <?php
                                           if($current_page=='faq.php')
                                           echo 'class="active"';
                                           ?> href="#">FAQ</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="right-icon text-right">
                                <ul> <?php
                                    if ($userid==$_SERVER['REMOTE_ADDR']){

   echo '<li><a href="login.php" ><i class="fa fa-user"></i></a></li>';
}else{
 echo '<li><a href="?logout=1" ><i class="fa fa-sign-out"></i></a></li>
                                    ';
}
                                    ?>
                                    <li><a href="javascript:void(0)" id="search"><i class="fa fa-search"></i></a></li>
                                   <li><a href="cart.php"><i class="fa fa-shopping-bag"></i><span id="cartico"><?php
                      $sql = "SELECT * FROM cart where userid='$userid'";
           $qry = $conn->query($sql);
                            echo $qry -> num_rows;
                    ?></span></a></li>
                                </ul>
                            </div> <!-- right icon -->
                        </nav> <!-- nav -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
    </header>
    
    <!--====== HEADER PART ENDS ======-->
   
    <!--====== SEARCH BOX PART START ======-->
    
    <div class="search-box">
        <div class="search-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="shop.php">
                <input type="text" name="search" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- search form -->
    </div>
    
    <!--====== SEARCH BOX PART ENDS ======-->
   
    <!--====== SLIDER PART START ======-->
           <div  id="ent" style="position:fixed;background:transparent; top:10%;right:0;width:auto;z-index:1000;" ></div> <?php
    if(isset($_GET['logout'])){
    echo "<div id='ens' style='position:fixed;background:transparent; top:10%;right:0;width:auto;z-index:1000;' ><div class=".'"alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-check"></i>You have successfully logged out <br></h7><h10> <h10></div></div>';
   
    session_destroy();
}
    ?>