<title>Admin - Orders</title>
<?php

$orders='active';
include 'header.php';
if(isset($_GET['id'])){
    $id =$_GET['id'];
 
                     
                 }else{
    
}?>

    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Order #<?php
                echo $id;
                ?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total Price</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php
                          $sql = "SELECT * FROM transaction where orderno='$id'";
           $qry = $conn->query($sql);
         $qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               echo '₦'.$row['total'];
           }
                          ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">No of items</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php
                          $sql = "SELECT * FROM transaction where orderno='$id'";
           $qry = $conn->query($sql);
         
           while($row = $qry->fetch_assoc()){
               $idt=$row['adid'];
                $sql = "SELECT * FROM transactiondetails where transactionid='$idt'";
           
         $qr = $conn->query($sql);
           echo $qr->num_rows;
               
           }
                          ?></span>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="row">
                
                  <div class="col-md-12"><h4>All Items</h4><br></div>
                    <?php
                          $sql = "SELECT * FROM transaction where orderno='$id'";
           $qry = $conn->query($sql);
         
           while($row = $qry->fetch_assoc()){
               $idt=$row['adid'];
               $useid=$row['userid'];
               $sql = "SELECT * FROM transactiondetails where transactionid='$idt'";
           
         $qrya = $conn->query($sql);
           while($rowa = $qrya->fetch_assoc()){
                $sql = "SELECT * FROM user where adid='$useid'";
           
         $qryu = $conn->query($sql);
           while($rowu = $qryu->fetch_assoc()){
               $produc=$rowa['product'];
                 $sqls = "SELECT * FROM courses where name='$produc'";
           $qrys = $conn->query($sqls);
                                if ($qrys -> num_rows >0){while($ro = $qrys->fetch_assoc()){
                                    if($rowa['quantity']==''){
                                        $quan=1;
                                    }else{$quan=$rowa['quantity'];}
                              echo '<div class="col-md-6"><div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../'.$ro['image'].'" alt="user image">
                        <span class="username">
                          <a href="edit-product.php?id='.$row['adid'].'">'.$ro['name'].'</a>
                        </span>
                        <span class="description">Course</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Price - ₦'.$ro['price'].'<br>
                        Quantity - x'.$quan.'<br>
                        Total - ₦'.$rowa['price'].'<br>
                      </p>
                      

                      <p>
                       <a href="users.php" class="link-black text-sm"><i class="fas fa-cart mr-1"></i> Ordered by - '.$rowu['name'].' </a>
                      </p>
                    </div></div>';   
                                    
                                }}
                $sqls = "SELECT * FROM products where name='$produc'";
           $qrys = $conn->query($sqls);
                                if ($qrys -> num_rows >0){while($ro = $qrys->fetch_assoc()){
                                    if($rowa['quantity']==''){
                                        $quan=1;
                                    }else{$quan=$rowa['quantity'];}
                                    echo '<div class="col-md-6"><div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../shop/'.$ro['image'].'" alt="user image">
                        <span class="username">
                          <a href="edit-product.php?id='.$row['adid'].'">'.$ro['name'].'</a>
                        </span>
                        <span class="description">Product</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Price - ₦'.$ro['price'].'<br>
                        Quantity - x'.$quan.'<br>
                        Total - ₦'.$rowa['price'].'<br>
                      </p>
                      

                      <p>
                       <a href="users.php" class="link-black text-sm"><i class="fas fa-cart mr-1"></i> Ordered by - '.$rowu['name'].' </a>
                      </p>
                    </div></div>';   
                                    
                                }}
           }}
               
           }
                          ?>
                   
                    
               
              </div>
                 <form id="formsc" method="post"> <div class="form-check">
                          <input class="form-check-input" <?php
                                 $sql = "SELECT * FROM transaction where orderno='$id'";
           $qry = $conn->query($sql);
         $qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
                    if($row['status']=='processing'){
                   
               }else if($row['status']=='success'){
                   echo 'checked';
               }else{
                           $status='<span class="badge badge-info float-right">Processing</span>';        
           }
           } ?> name="check" type="checkbox">
                     <input  name="orderno" type="hidden" value="<?php
                                                                                         echo $id;
                                                                                         ?>">
                     <input name="page" value="status" type="hidden">
                          <label class="form-check-label">Complete?</label>
                        </div></form>
            </div>
            
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include 'footer.php';
?>

<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="plugins/toastr/toastr.min.js"></script>
<script>
      
           
						jQuery(document).ready(function(){
						
                     const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
                       jQuery(".form-check-input").click(function(){
                           jQuery("#formsc").submit();
                       });
                            
                       jQuery("#formsc").submit(function(e){
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
                                         Toast.fire({
        type: 'success',
        title: 'Status Updated'
      })
									 var delay= 3000;
									  setTimeout((function(){ 
   $("#click").click();  }), delay);
									}else
									{
                                        alert(response);
                                        Toast.fire({
        type: 'error',
        title: response
      })
                                        //alert(response);
                                        var delay= 3000;
									  setTimeout((function(){ 
   $("#click").click();  }), delay);
									 
                                      
									 }
									
                      }
								});
								return false;
							});
									
							
									
							
						});
                          
						</script>