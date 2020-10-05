<?php
include 'header.php';
?>    <!--====== CONTACT PART START ======-->
    
    <section id="contact-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="contact-from mt-30">
                        <div class="section-title">
                            <h5>Contact Us</h5>
                            <h2>Keep in touch</h2>
                        </div> <!-- section title -->
                        <div class="main-form pt-45">
                            <form id="contact-for" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single-form form-group">
                                            <input name="name" type="text" placeholder="Your name" data-error="Name is required." required>
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-group">
                                            <input name="email" type="email" placeholder="Email" data-error="Valid email is required." required>
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-group">
                                            <input name="subject" type="text" placeholder="Subject" data-error="Subject is required." required>
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form --> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-group">
                                            <input name="phone" type="text" placeholder="Phone" data-error="Phone is required." required>
                                            <input name="page" type="hidden" value="contact" >
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form form-group">
                                            <textarea name="message" placeholder="Message" data-error="Please,leave us a message." required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form -->
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="single-form">
                                            <button type="submit" class="main-btn">Send</button>
                                        </div> <!-- single form -->
                                    </div> 
                                </div> <!-- row -->
                            </form>
                        </div> <!-- main form -->
                    </div> <!--  contact from -->
                </div>
                <div class="col-lg-5">
                    <div class="contact-address mt-30">
                        <ul>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p>18, Obokun Close, Allen Avenue, Ikeja, Lagos</p>
                                    </div>
                                </div> <!-- single address -->
                            </li><li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p>1, Aduragbemi Street, River Valley Estate, Omole Lagos.</p>
                                    </div>
                                </div> <!-- single address -->
                            </li>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p>+ 234 (0) 810 773 6631</p>
                                        <p>+ 234 (0) 802 956 3481</p>
                                    </div>
                                </div> <!-- single address -->
                            </li>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p>info@lilovatsolartechnology.com</p>
                                        <p>support@lilovatsolartechnology.com</p>
                                    </div>
                                </div> <!-- single address -->
                            </li>
                        </ul>
                    </div> <!-- contact address -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== CONTACT PART ENDS ======-->
   <?php
include 'footer.php';
?>
<script>
						jQuery(document).ready(function(){
						jQuery("#contact-for").submit(function(e){
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
									
							
								var delay = 2000;
										 $('#ent').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-check"></i> Your message has been sent<br></h7></div>');
                                        
               setTimeout((function(){ 
     $('#close').click();  }), delay);
									  
									}else
									{
                                        //alert(response);
									
									 $('#ent').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-ban"></i> An error occured while sending your message<br></h7><h10> <h10></div>');
                                      setTimeout((function(){ 
     $('#close').click();  }), 3000);
									 }
									
                      }
								});
								return false;
							});
									
							
						});							
							
				
						</script>