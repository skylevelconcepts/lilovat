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
<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta charset="utf-8">
<title>Cart</title>
<!-- SEO Meta
  ================================================== -->
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="distribution" content="global">
<meta name="revisit-after" content="2 Days">
<meta name="robots" content="ALL">
<meta name="rating" content="8 YEARS">
<meta name="Language" content="en-us">
<meta name="GOOGLEBOT" content="NOARCHIVE">
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- CSS
  ================================================== -->
<link rel="stylesheet" type="text/css" href="shop/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="shop/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="shop/css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="shop/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="shop/css/fotorama.css">
<link rel="stylesheet" type="text/css" href="shop/css/magnific-popup.css">
<link rel="stylesheet" type="text/css" href="shop/css/custom.css">
<link rel="stylesheet" type="text/css" href="shop/css/responsive.css">
<link rel="shortcut icon" href="shop/images/favicon.png">
<link rel="apple-touch-icon" href="shop/images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="shop/images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="shop/images/apple-touch-icon-114x114.png">
</head>
<body >
<div class="se-pre-con"></div>
<div class="main">                           

<!-- HEADER START -->
  <header class="navbar navbar-custom container-full-sm" id="header">
    <div class="header-middle">`
      <div class="container">
        <div class="row">
          <div class="col-xl-3 col-md-3 col-lgmd-20per">
            <div class="header-middle-left">
              <div class="navbar-header float-none-sm">
                <a class="navbar-brand page-scroll" href="index.php">
                  <img alt="Lilovat" src="images/logo.png">
                </a> 
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-6 col-lgmd-60per">
            <div class="header-right-part">
              
              <div class="main-search">
                <div class="header_search_toggle desktop-view">
                  <form action="shop.php">
                    <div class="search-box">
                      <input class="input-text" type="text" name="search" <?php
             if(isset($_GET['search'])){
                    echo'value="'.$_GET['search'].'"';}else{}
            ?>placeholder="Search entire store here...">
                      <button class="search-btn"></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-3 col-lgmd-20per">
            <div class="right-side float-left-xs header-right-link">
                 <script>
                var cars = new Array();</script>
              <ul><?php
                   if ($userid==$_SERVER['REMOTE_ADDR']){

   echo '<li class=" login"><a href="login.php"><span></span></a></li>';
                       
}else{
echo '<li ><a href="?logout=1"><i class="fa fa-sign-out" style="font-size:20px;margin-top:11px; color:#07294d"></i></a></li>';
}
                  ?>
                    
                <li class="cart-icon"><a href="cart.php"><span><small class="cart-notification" id="count"><?php
                      $sql = "SELECT * FROM cart where userid='$userid'";
           $qry = $conn->query($sql);
                            echo $qry -> num_rows;
                    ?></small></span></a>
<!--
                  <div class="cart-dropdown header-link-dropdown">
                    <ul class="cart-list link-dropdown-list">
                         <?php
                
           $sql = "SELECT * FROM cart where userid='$userid' order by adid desc  ";
           $qry = $conn->query($sql);
                        $pro=0;
                            if ($qry -> num_rows >0){
                                $count=0;
                                
           while($row = $qry->fetch_assoc()){
               $total = $row['price'];
               
       $quantity = 1; 
               
if ($row['quantity']!=''){
    $quantity = $row['quantity'];
    
}
               $produc=$row['product'];
               $sqls = "SELECT * FROM products where name='$produc'";
           $qrys = $conn->query($sqls);
                            if ($qrys -> num_rows >0){
                                
           while($ro = $qrys->fetch_assoc()){
               $pric=$ro['price'];
               if($row['price']!=''){
                $pr=str_replace(',','',$row['price']);  
               }else{
                   $pr=$pric;
               }
               
               echo '<li class="row'.$row['adid'].'"> <form method="post" class="formdelete formdelete'.$row['adid'].'">
                
                <input type="hidden"  name="id" value="'.$row['adid'].'">
                <input type="hidden"  name="page" value="deletecart"></form>
                <a class="close-cart "id="del'.$row['adid'].'"><i class="fa fa-times-circle"></i></a>
              
                        <div class="media"> <a class="pull-left"> <img alt="Stylexpo" src="shop/'.$ro['image'].'"></a>
                          <div class="media-body"> <span><a href="#">'.$ro['name'].'</a></span>
                            <p class="cart-price ">₦<span id="r'.$row['adid'].'">'.$pr.'</span></p>
                            <form method="post" class="form">
                <input type="hidden" name="price" id="pis'.$row['adid'].'" >
                <input type="hidden"  name="id" value="'.$row['adid'].'">
                <input type="hidden"  name="page" value="cart">
                <input type="hidden"  name="type" value="cart">
                  
                  
                      <div class="product-qty">
                              <label>Qty:</label>
                              <div class="custom-qty" id="'.$row['adid'].'a">'.$quantity.'</div>
                            </div>
                    </form>
                    
                            
                          </div>
                        </div>
                      </li>
                      
                      ';
               echo '<script>setInterval(function(){
                   var x'.$count.' = $("#r'.$row['adid'].'");
                 
                 cars['.$count.']=parseInt(x'.$count.'.text(), 10);
                 }, 10);
                 
                </script>
                  <script>$("#del'.$row['adid'].'").click(function(){
                $(".formdelete'.$row['adid'].'").submit();
                
                });
               
                 
                </script>';
               if(is_string($pr)){
                     $pro=$pro;
                   
               }else{
                   echo $pro;
               $pro=$pro+$pr; 
           }
               
            $count++; 
           }}}}?>
                    
                    </ul>
                    <p class="cart-sub-totle"> <span class="pull-left">Cart Subtotal</span> <span class="pull-right"><strong class="price-box" id="totsi">$29.98</strong></span>  <script>
  	
							
                          setInterval(function(){
    
    var totali=0;
    for(var i=0; i < cars.length; i++ ){
    totali += cars[i];
    }
                              
$("#totsi").text(totali);
                             
    
                          },50);</script></p>
                    <div class="clearfix"></div>
                    <div class="mt-20"> <a href="cart.php" class="btn-color btn">Cart</a> <a href="checkout.html" class="btn-color btn right-side">Checkout</a> </div>
                  </div>
-->
                </li>
                <li class="side-toggle">
                  <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"><i class="fa fa-bars"></i></button>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-bottom"> 
      <div class="container position-s">
        <div class="row">
          <div class="col-lg-8 col-md-7 position-initial">
            <div id="menu" class="navbar-collapse collapse" >
              <ul class="nav navbar-nav">
                  <li class="level"><a href="index.php"><i class="fa fa-arrow-left"></i> Go back to Home page</a>
                    </li>
                
                   
              </ul>
              <div class="header-top mobile">
                <div class="">
                  <div class="row">
                    <div class="col-12">
                      <div class="top-link top-link-left select-dropdown">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="top-link right-side">
                        <div class="help-num" ><i class="fa fa-phone"> </i> Need Help? : +234 810 773 66301</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-5 ">
            <div class="right-side float-left-xs header-right-link">
            <div class="right-side">
              <div class="help-num" ><i class="fa fa-phone"> </i> Need Help? : +234 810 773 66301</div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="popup-links ">
      <div class="popup-links-inner">
        <ul>
          <li class="scroll scrollup">
            <a href="#"><span class="icon"></span><span class="icon-text">Scroll-top</span></a>
          </li>
        </ul>
      </div>
    </div>
  </header><div  id="ent" style="position:fixed;background:transparent; top:10%;right:0;width:auto;z-index:1000;" ></div>  <?php
    if(isset($_GET['logout'])){
    echo "<div id='ens' style='position:fixed;background:transparent; top:10%;right:0;width:auto;z-index:1000;' ><div class=".'"alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-check"></i>You have successfully logged out <br></h7><h10> <h10></div></div>';
   
    session_destroy();
}
    ?>