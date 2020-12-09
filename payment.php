 <script src="shop/js/jquery-1.12.3.min.js"></script> 
<?php
require_once('shop/header.php');

if (isset($_GET["delete"])){
$id = $_GET["delete"] ;
    $sql="delete from cart where adid='$id'";
    if (mysqli_query($conn, $sql)) {
        echo'<script> window.location="cart.php?deleted=yes";</script>';
    }
    
   
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
              ?>  <!-- Bread Crumb STRAT -->
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
              <li> 
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
              <li class="active"> 
                <a href="payment.php">
                  <div class="step">
                    <div class="line"></div>
                    <div class="circle">3</div>
                  </div>
                  <span>Payment</span> 
                </a> 
              </li>
              <li> 
                <a href="order-complete.php">
                  <div class="step">
                    <div class="line"></div>
                    <div class="circle">4</div>
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
          <div class="checkout-content">
            <div class="row">
              <div class="col-12">
                <div class="heading-part align-center">
                  <h2 class="heading">Select a payment method</h2>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-xl-6 col-lg-8 col-md-8 ">
                <div class="payment-option-box mb-30">
                  <div class="payment-option-box-inner gray-bg">
                    <div class="payment-top-box">
                      <div class="radio-box left-side"> <span>
                        <input type="radio" id="cash" checked name="cash" name="payment_type">
                        </span>
                        <label for="cash">Would you like to pay by Cash on Delivery?</label>
                      </div>
                    </div>
                    <p>Vestibulum semper accumsan nisi, at blandit tortor maxi'mus in phasellus malesuada sodales odio, at dapibus libero malesuada quis.</p>
                  </div>
                </div>
                  
                <div class="payment-option-box disabled mb-30">
                  <div class="payment-option-box-inner gray-bg">
                    <div class="payment-top-box">
                      <div class="radio-box left-side"> <span>
                        <input type="radio" id="paypal" disabled value="paypal" name="payment_type">
                        </span>
                        <label for="paypal">PayPal</label>
                      </div>
                      <div class="paypal-box">
                        <div class="paypal-top"> <img src="shop/images/paypal-img.png" alt="Stylexpo"> </div>
                        <div class="paypal-img"> <img src="shop/images/payment-method.png" alt="Stylexpo"> </div>
                      </div>
                    </div>
                    <p>If you Don't have CCAvenue Account, it doesn,t matter. You can also pay via CCAvenue with you credit card or bank debit card</p>
                    <p>Payment can be submitted in any currency.</p>
                  </div>
                </div>
                <div class="right-side float-none-xs"><form method="post" id="formorder">
                    <input type="hidden" name="page" value="checkout">
                    <input type="hidden" name="id" value="<?php
                                                          echo $userid;
                                                          ?>">
                    <button class="btn btn-color"  type="submit">Place Order<span><i class="fa fa-angle-right"></i></span></button>
                    </form>  </div>
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
<?php
include 'shop/footer.php';
?>
<script>
						jQuery(document).ready(function(){
                         
						jQuery("#formorder").submit(function(e){
                            $('#ent').html('<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-ban"></i> Processing <br></h7><h10>Please wait while your request is processing<h10></div>');
								e.preventDefault();
								var formData = jQuery(this).serialize();
                                      
                       $.ajax({
									type:"POST",
									url:"process.php",
									data:formData,
									success: function(response){
									if(response.indexOf('True')>-1)
									{
                                          //alert(response);
									
							
								var delay = 1000;
										 $('#ent').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-check"></i> You order  has been successfully placed<br></h7></div>');
                                        
               setTimeout((function(){ window.location = 'order-complete.php'  }), delay);
									  
									}else
									{
                                        //alert(response);
									
									 $('#ent').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-ban"></i> Oops !!! An error occured while processing your request<br></h7><h10><h10></div>');
                                      
									 }
									
                      }
								});
								return false;
							});
									
							
						});							
							
				
						</script>