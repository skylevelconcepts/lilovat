<?php
session_start();
if(isset($_SESSION['login'])){
     
    
}else{
    
}
date_default_timezone_set('Africa/Lagos');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin - Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<!--
      <div class="login-logo">
    
      <img src="../images/logo3.png">
  </div>
-->
<div class="login-box">

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Enter in your unique id</p>

      <form id="log" method="post">
        <div class="input-group mb-3">
          <input type="text" name="id" class="form-control">
            <input type="hidden" name="date" value="<?php
                                                  echo date('Y:m:D');
                                                  ?>" class="form-control">
                      <input type="hidden" name="page" value="login" class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
       <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="plugins/toastr/toastr.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
 
    
<script>
						jQuery(document).ready(function(){
                            const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
						jQuery("#log").submit(function(e){
                            				
      Toast.fire({
        type: 'info',
        title: 'Processing ...'
      })
                                          
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
								
						
      Toast.fire({
        type: 'success',
        title: 'You will be redirected to the dashboard soon'
      })
    setTimeout(function(){
        window.location="index.php";
    }, 2000);
										 
                                        
             
									  
									}else
									{

						 				
                                        
                                 
Toast.fire({
        type: 'error',
        title: 'Please enter in yours unique id again'
      })
                  
									
									
									 }
									
                      }
								});
								return false;
							});
									
							
						});							
							
				
						</script>
</body>
</html>
