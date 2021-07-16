
  <div class="footer">
    <div class="container">
      <div class="footer-inner">
        <div class="footer-middle">
          <div class="row">
            <div class="col-xl-3 f-col">
              <div class="footer-static-block"> <span class="opener plus"></span>
                <h3 class="title">address<span></span></h3>
                <ul class="footer-block-contant address-footer">
                  <li class="item"> <i class="fa fa-map-marker"> </i>
                    <p>36 Ipodo street, off Toyin St, 100001, Ikeja</p>
                  </li>
                  <li class="item"> <i class="fa fa-envelope"> </i>
                    <p> <a href="#">info@lilovatsolar.ng</a> </p>
                  </li>
                  <li class="item"> <i class="fa fa-phone"> </i>
                    <p>+ 234 (0) 810 773 6631</p>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xl-3 f-col">
              <div class="footer-static-block"> <span class="opener plus"></span>
                <h3 class="title">Site map<span></span></h3>
                <ul class="footer-block-contant link">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="about.php">About us</a></li>
                  <li><a href="courses.php">Courses</a></li>
                  <li><a href="#">Projects</a></li>
                  <li><a href="shop.php">shop</a></li>
                </ul>
              </div>
            </div>
            <div class="col-xl-3 f-col">
              <div class="footer-static-block"> <span class="opener plus"></span>
                <ul class="footer-block-contant link">
                  <li><a href="#"> Gallery</a></li>
                  <li><a href="policy.php"> Privacy Policy</a></li>
                  <li><a href="testi.php"> Testimonials</a></li>
                  <li><a href="#"> Installation</a></li>
                  <li><a href="login.php"> Login</a></li>
                </ul>
              </div>
            </div>
            <div class="col-xl-3 f-col">
              <div class="footer-static-block"> <span class="opener plus"></span>
                <h3 class="title">Support<span></span></h3>
                <ul class="footer-block-contant link">
                  <li><a href="#">FAQS</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Free Shipping</a></li>
                  <li><a href="contact.php">Support</a></li>
                  <li><a href="courses.php">Trainings</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="footer-bottom ">
          <div class="row mtb-30">
            <div class="col-lg-6 ">
              <div class="copy-right ">© 2020 Lilovat Solar Technology.</div>
            </div>
            <div class="col-lg-6 ">
              <div class="footer_social pt-xs-15 center-sm">
                <ul class="social-icon">
                  <li><div class="title">Follow us on :</div></li>
                  <li><a title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
                  <li><a title="Twitter" class="twitter"><i class="fa fa-twitter"> </i></a></li>
                  <li><a title="Linkedin" class="linkedin"><i class="fa fa-linkedin"> </i></a></li>
                  <li><a title="RSS" class="rss"><i class="fa fa-rss"> </i></a></li>
                  <li><a title="Pinterest" class="pinterest"><i class="fa fa-pinterest"> </i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <hr>
          <div class="row align-center mtb-30 ">
            <div class="col-12 ">
              <div class="site-link">
                <ul>
                </ul>
              </div>
            </div>
          </div>
          <div class="row align-center">
            <div class="col-12 ">
              <div class="payment">
                <ul class="payment_icon">
                  <li class="visa"><a href="#"><img src="shop/images/pay1.png" alt="Stylexpo"></a></li>
                  <li class="discover"><a href="#"><img src="shop/images/pay2.png" alt="Stylexpo"></a></li>
                  <li class="paypal"><a href="#"><img src="shop/images/pay3.png" alt="Stylexpo"></a></li>
                  <li class="vindicia"><a href="#"><img src="shop/images/pay4.png" alt="Stylexpo"></a></li>
                  <li class="atos"><a href="#"><img src="shop/images/pay5.png" alt="Stylexpo"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-211fdba5-41d9-4515-8fc6-a578d1dca255"></div>

  <div class="scroll-top">
    <div class="scrollup"></div>
  </div>
  <!-- FOOTER END -->  
</div>
<script src="shop/js/jquery-1.12.3.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="shop/js/bootstrap.min.js"></script>  
<script src="shop/js/jquery.downCount.js"></script>
<script src="shop/js/jquery-ui.min.js"></script> 
<script src="shop/js/fotorama.js"></script>
<script src="shop/js/jquery.magnific-popup.js"></script> 
<script src="shop/js/owl.carousel.min.js"></script>  
<script src="shop/js/custom.js"></script>
<script>
           
						jQuery(document).ready(function(){
						
		jQuery(".form").change(function(){
                            
                           
                              $(this).submit(); 
                           
                 });
//                            setTimeout(function(){
//                            
//                           
//                              $(".form").submit(); 
//                           
//                 },10);
                       jQuery(".form").submit(function(e){
                            
								e.preventDefault();
								var formData = jQuery(this).serialize();
                                      
                       $.ajax({
									type:"POST",
									url:"process.php",
									data:formData,
									success: function(response){
									if(response =='True')
									{
                                        
									  //alert(response);
									}else
									{
                                        //alert(response);
									$("#tots").text(response);
									 $('#ent').html('<div class="alert alert-success alert-dismissible"><button type="button" id="click" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-check"></i> Cart Updated <br></h7></div>'); 
                                        var delay= 3000;
									  setTimeout((function(){ 
   $("#click").click(); 
                                      }), delay);
                                      
									 }
									
                      }
								});
								return false;
							});
									
							
									
							
						});
                          
						</script>
 <script>
           
						jQuery(document).ready(function(){
						
		
                            
                       jQuery(".formdelete").submit(function(e){
                            
								e.preventDefault();
								var formData = jQuery(this).serialize();
                                      
                       $.ajax({
									type:"POST",
									url:"process.php",
									data:formData,
									success: function(response){
									if(response =='True')
									{
                                       $(this).hide();
									
									 $('#ent').html('<div class="alert alert-success alert-dismissible"><button type="button" id="click" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-check"></i>Item Deleted <br></h7></div>'); 
                                        var delay= 3000;
									  setTimeout((function(){ 
   $("#click").click();
                                      }), delay);   
									  //alert(response);
									}else
									{
                                         $('#ent').html('<div class="alert alert-danger alert-dismissible"><button type="button" id="click" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-check"></i>Item NOT Deleted <br></h7>'+response+'</div>'); 
                                        var delay= 3000;
									  setTimeout((function(){ 
   $("#click").click();
                                      }), delay);   
                                        //alert(response);
                                      
                                      
									 }
									
                      }
								});
								return false;
							});
									
							
									
							
						});
                          
						</script><script>
    <?php
if(isset($_GET['logout'])){
    echo "$('#ens').fadeOut(2000,function(){window.location='".$current_page."';})";}
?></script>