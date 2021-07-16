<?php
include 'header.php';
?>
<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-1.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Register</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Training</li>
                        </ol>
                    </nav>
                </div> <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>


<section class="signup pt-105 pb-120 gray-bg">
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <div class="signup-content">
                <form method="POST" id="signup-form" class="signup-form">
                    <h2 class="form-title pb-20">Register for Training</h2>
                    <div class="form-group">
                        <input type="text" class="form-input" name="name" id="name" placeholder="Your Full Name" required />
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-input" name="phone" id="name" placeholder="Your Whatsapp Number" required />
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-input" name="email" id="email" placeholder="Your Email" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="location" id="email" placeholder="Your Location" required />
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-input" name="page" value="training" required />
                        <input type="hidden" name="ip" value="<?php echo $_SERVER["REMOTE_ADDR"]; ?>">
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="main-btn register-submit" value="Register" />
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>


<!--====== FAQ PART ENDS ======-->
<?php
include 'footer.php';
?>

<script>
    jQuery(document).ready(function() {

        jQuery("#signup-form").submit(function(e) {
            if ($('.pass1').val() == $('.pass2').val()) {
                $('#ent').html('<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fas fa-ban"></i> Processing <br></h7><h10>Please wait while your request is processing<h10></div>');
                e.preventDefault();
                var formData = jQuery(this).serialize();

                $.ajax({
                    type: "POST",
                    url: "process.php",
                    data: formData,
                    success: function(response) {
                        if (response == 'True') {
                            //alert(response);


                            var delay = 1000;
                            $('#ent').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-check"></i> You have successfully registered<br></h7></div>');
                            setTimeout((function() {
                                window.location = "index.php";
                            }), delay);

                        } else {
                            // alert(response);
                            $('#ent').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-ban"></i> Email or Phone already exists!<br></h7><h10><h10></div>');


                        }

                    }
                });
                return false;
            } else {
                e.preventDefault();
                $('#ent').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-ban"></i> Error!!!<br></h7><h10> Passwords do not match<h10></div>');

            }
        });


    });
</script>