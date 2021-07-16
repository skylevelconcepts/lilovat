<?php
include 'header.php';
?>
    <!--====== PROVACY PART START ======-->

    <section class="signup pt-105 pb-120 gray-bg">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <div class="signup-content">
                    <form method="POST" id="login" class="signup-form">
                        <h2 class="form-title pb-20">Welcome Back!</h2>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <input type="hidden" class="form-input" name="page" value="login" required/>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="ip" value="<?php echo $_SERVER["REMOTE_ADDR"];?>">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term"  required/>
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="main-btn register-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        I don't have an account ? <a href="register.php" class="loginhere-link">Register here</a>
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
						jQuery("#login").submit(function(e){
                            $('#ent').html('<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-ban"></i> Processing <br></h7><h10>Please wait while your request is processing<h10></div>');
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
										 $('#ent').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-check"></i> You have successfully signed in<br></h7></div>');
                                        
               setTimeout((function(){ 
    window.location="cart.php";   }), delay);
									  
									}else
									{
                                        //alert(response);
									
									 $('#ent').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-ban"></i> Email or Password incorrect <br></h7><h10> <h10></div>');
                                      
									 }
									
                      }
								});
								return false;
							});
									
							
						});							
							
				
						</script>