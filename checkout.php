<?php
include 'shop/header.php';
?>  <!-- HEADER END -->    
   
  <!-- Bread Crumb STRAT -->
<?php
if ($userid==$_SERVER['REMOTE_ADDR']){
echo "<script>window.location='login.php';</script>";
   
}else{
   
    
    
    
}
?>
<?php
                $sql = "SELECT * FROM cart where userid='$userid'";
           $qry = $conn->query($sql);
              if($qry->num_rows>0){
                                
                                
                            }else{
                                echo "<script>window.location='shop.php';</script>";
                            }
              ?>
  <div class="banner inner-banner1 ">
    <div class="container">
      <section class="banner-detail center-xs">
        <h1 class="banner-title">Checkout</h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="index.php">Home</a>/</li>
            <li><a href="cart.php">Cart</a>/</li>
            <li><span>Checkout</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- Bread Crumb END -->
  
  <!-- CONTAIN START -->
  <section class="checkout-section ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="checkout-step mb-40">
            <ul>
              <li class="active"> 
                <a href="checkout.php">
                  <div class="step">
                    <div class="line"></div>
                    <div class="circle">1</div>
                  </div>
                  <span>Shipping</span> 
                </a> 
              </li>
              <li> 
                <a href="order-overview.php">
                  <div class="step">
                    <div class="line"></div>
                    <div class="circle">2</div>
                  </div>
                  <span>Order Overview</span> 
                </a> 
              </li>
              <li> 
                <a href="order-complete.php">
                  <div class="step">
                    <div class="line"></div>
                    <div class="circle">3</div>
                  </div>
                  <span>Order Complete</span> 
                </a> 
              </li>
              <li>
                <div class="step">
                  <div class="line"></div>
                </div>
              </li>
            </ul>
            <hr>
          </div>
          <div class="checkout-content" >
            <div class="row">
              <div class="col-12">
                <div class="heading-part align-center">
                  <h2 class="heading">Please fill up your Shipping details</h2>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-xl-6 col-lg-8 col-md-8">
                <form action="order-overview.php" method="post" class="main-form full">
                  
                                      <div class="row mb-20">

                     <?php
                                          $sq = "SELECT * FROM user where adid='$userid'";
           $qr = $conn->query($sq);
                             if ($qr -> num_rows >0){
                        while($ro = $qr->fetch_assoc()){
                                          $sql = "SELECT * FROM billing where userid='$userid'";
           $qry = $conn->query($sql);
                            if ($qry -> num_rows >0){
                        while($row = $qry->fetch_assoc()){
                            if(isset($row['name'])){
                                $name=$row['name'];
                            }else{
                                $name=$ro['name'];
                            }
                             if(isset($row['email'])){
                                $email=$row['email'];
                            }else{
                                $email=$ro['email'];
                            }
                             if(isset($row['phone'])){
                                $phone=$row['phone'];
                            }else{
                                $phone=$ro['phone'];
                            } 
                            if(isset($row['address'])){
                                $address=$row['address'];
                            }else{
                                $address=$ro['address'];
                            }
               echo '
               
              
              <div class="col-12 mb-20">
                      <div class="heading-part">
                        <h3 class="sub-heading">Shipping Address</h3>
                      </div>
                      <hr>
                    </div>
                    <div class="col-md-6">
                      <div class="input-box">
                        <input type="text" required placeholder="Full Name" value="'.$name.'" name="name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-box">
                        <input type="email" required placeholder="Email Address" value="'.$email.'"  name="email">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-box">
                        <input type="text" required placeholder="Company"  value="'.$row['company'].'" name="company">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-box">
                        <input type="text" required placeholder="Contact Number" value="'.$phone.'" name="phone">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="input-box">
                        <input type="text" required placeholder="Shipping Address" value="'.$address.'"  name="address">
                        <span>Please provide the number and street.</span> 
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="input-box">
                        <input type="text" required placeholder="Shipping Landmark"  value="'.$row['landmark'].'" name="landmark">
                        <span>Please include landmark (e.g : Opposite Bank) as the carrier service may find it easier to locate your address.</span> 
                      </div>
                    </div><div class="row">
                    <div class="col-12 mb-20">
                      <div class="heading-part">
                        <h3 class="sub-heading">Billing Address</h3>
                      </div>
                      <hr>
                    </div>
                    <div class="col-md-12">
                      <div class="input-box">
                        <input type="text" required placeholder="Email Address" value="'.$row['billingemail'].'"  name="billingemail">
                      </div>
                    </div>
                    <div class="col-md-12"> 
                      <button type="submit" class="btn btn-color right-side">Next</a> 
                    </div>
                  </div>
              ';
           }  }else{
                           echo '
               
              
              <div class="col-12 mb-20">
                      <div class="heading-part">
                        <h3 class="sub-heading">Shipping Address</h3>
                      </div>
                      <hr>
                    </div>
                    <div class="col-md-6">
                      <div class="input-box">
                        <input type="text" required placeholder="Full Name" value="'.$ro['name'].'" name="name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-box">
                        <input type="email" required placeholder="Email Address" value="'.$ro['email'].'"  name="email">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-box">
                        <input type="text" required placeholder="Company"  value="'.$row['company'].'" name="company">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-box">
                        <input type="text" required placeholder="Contact Number" value="'.$ro['phone'].'" name="phone">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="input-box">
                        <input type="text" required placeholder="Shipping Address" value="'.$ro['address'].'"  name="address">
                        <span>Please provide the number and street.</span> 
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="input-box">
                        <input type="text" required placeholder="Shipping Landmark"  value="'.$row['landmark'].'" name="landmark">
                        <span>Please include landmark (e.g : Opposite Bank) as the carrier service may find it easier to locate your address.</span> 
                      </div>
                    </div><div class="row">
                    <div class="col-12 mb-20">
                      <div class="heading-part">
                        <h3 class="sub-heading">Billing Address</h3>
                      </div>
                      <hr>
                    </div>
                    <div class="col-md-12">
                      <div class="input-box">
                        <input type="text" required placeholder="Email Address" value="'.$row['billingemail'].'"  name="billingemail">
                      </div>
                    </div>
                    <div class="col-md-12"> 
                      <button type="submit" class="btn btn-color right-side">Next</a> 
                    </div>
                  </div>
              ';      
                            }}}else{      
           
               echo '
               <div class="col-12 mb-20">
                      <div class="heading-part">
                        <h3 class="sub-heading">Shipping Address</h3>
                      </div>
                      <hr>
                    </div>
                    <div class="col-md-6">
                      <div class="input-box">
                        <input type="text" required placeholder="Full Name" name="name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-box">
                        <input type="email" required placeholder="Email Address" name="email">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-box">
                        <input type="text" required placeholder="Company" name="company">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-box">
                        <input type="text" required placeholder="Contact Number" name="phone">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="input-box">
                        <input type="text" required placeholder="Shipping Address" name="address">
                        <span>Please provide the number and street.</span> 
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="input-box">
                        <input type="text" required placeholder="Shipping Landmark" name="landmark">
                        <span>Please include landmark (e.g : Opposite Bank) as the carrier service may find it easier to locate your address.</span> 
                      </div>
                    </div><div class="row">
                    <div class="col-12 mb-20">
                      <div class="heading-part">
                        <h3 class="sub-heading">Billing Address</h3>
                      </div>
                      <hr>
                    </div>
                    <div class="col-md-12">
                      <div class="input-box">
                        <input type="text" required placeholder="Email Address" name="billingemail">
                      </div>
                    </div>
                    <div class="col-md-12"> 
                      <button type="submit" class="btn btn-color right-side">Next</a> 
                    </div>
                  </div>';
           }
                                          ?></div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 
  
  <!-- News Letter Start -->
  <section>
    <div class="newsletter">
      <div class="container">
        <div class="newsletter-inner center-sm">
          <div class="row">
            <div class=" col-xl-12 col-md-12">
              <div class="newsletter-bg">
                <div class="row">
                  <div class="col-lg-5">
                    <div class="newsletter-title">
                      <h2 class="main_title">Subscribe to our newsletter</h2>
                      <div class="sub-title">Sign up for newsletter and Get upto 50% off</div>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <form>
                      <div class="newsletter-box">
                        <input type="email" placeholder="Email Here...">
                        <button title="Subscribe" class="btn-color">Subscribe</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- News Letter End --> 

  <!-- FOOTER START --><?php
include 'shop/footer.php';
?>