<?php
include 'header.php';
?>    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Register</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Register</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== PROVACY PART START ======-->

    <section class="signup pt-105 pb-120 gray-bg">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title pb-20">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your Full Name"  required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="address" id="name" placeholder="Your Address" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="phone" id="name" placeholder="Your Phone Number" required/>
                        </div>
                        
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input pass1" name="password" id="password" placeholder="Password" required/>
                            <input type="hidden" class="form-input" name="page" value="register" required/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input pass2" name="re_password" id="re_password" placeholder="Repeat your password" required/>
                        </div><div class="form-group">
                            <input type="text" class="form-input" name="education" id="name" placeholder="Highest level of Education(Solar Academy)" />
                        <input type="hidden" name="ip" value="<?php echo $_SERVER["REMOTE_ADDR"];?>">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term"  required/>
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="main-btn register-submit" value="Sign up" />
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="login.html" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!--====== FAQ PART ENDS ======-->
   <?php
include 'footer.php';
?>

    <script>
						jQuery(document).ready(function(){
                            
						jQuery("#signup-form").submit(function(e){
                            if($('.pass1').val()==$('.pass2').val()){
                            $('#ent').html('<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fas fa-ban"></i> Processing <br></h7><h10>Please wait while your request is processing<h10></div>');
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
									
							
								var delay = 1000;
										 $('#ent').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-check"></i> You have successfully signed up<br></h7></div>');
                                        
               setTimeout((function(){ 
    window.location="cart.php";   }), delay);
									  
									}else
									{
                                        //alert(response);
                                        $('#ent').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-ban"></i> Email or Phone already exists!<br></h7><h10><h10></div>'); 
									
									 
									 }
									
                      }
								});
								return false;}else{
                                    e.preventDefault();
                                   $('#ent').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-ban"></i> Error!!!<br></h7><h10> Passwords do not match<h10></div>');  
                                    
                                }
							});
                        
							
						});							
							
				
						</script>