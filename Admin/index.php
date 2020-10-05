
  <title>Admin - Dashboard</title>
<?php
$dashboard='active';

include 'header.php';

?>    <!-- /.content-header -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="movies.php">Products</a></span>
                <span class="info-box-number">
                     <?php
                                    $sql = "SELECT * FROM products";
           $qry = $conn->query($sql);
          echo $qry->num_rows;   ?>
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
              <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-edit"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="movies.php">Courses</a></span>
                <span class="info-box-number">
                     <?php
                                    $sql = "SELECT * FROM courses";
           $qry = $conn->query($sql);
          echo $qry->num_rows;   ?>
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
            <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-edit"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="orders.php">Orders</a></span>
                <span class="info-box-number">
                     <?php
                                    $sql = "SELECT * FROM transactiondetails";
           $qry = $conn->query($sql);
          echo $qry->num_rows;   ?>
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
            <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box">
              <span class="info-box-icon bg-ewarning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="users.php">Users</a></span>
                <span class="info-box-number">
                     <?php
                                    $sql = "SELECT * FROM user";
           $qry = $conn->query($sql);
          echo $qry->num_rows;   ?>
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
          <!-- /.col -->

              
           
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

         
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->

        
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            
        <div class="col-md-12">
            <!-- /.info-box -->

            
            <!-- /.card -->

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                
                      <?php
                                    $sql = "SELECT * FROM transaction order by adid desc limit 6";
           $qry = $conn->query($sql);
         $qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
                    if($row['status']=='processing'){
                   $status='<span class="badge badge-info float-right">Processing</span>';
               }else if($row['status']=='success'){
                   $status='<span class="badge badge-success float-right">Completed</span>';
               }else{
                           $status='<span class="badge badge-info float-right">Processing</span>';        
           }
                                
                                echo '<li class="item">
                    <div class="product-img">
                      
                    </div>
                    <div class="product-info">
                      <a href="order.php?id='.$row['orderno'].'" class="product-title">#'.$row['orderno'].'
                      </a>'.$status.'
                      <span class="product-description">
                         Total : ₦'.$row['total'].'  &nbsp;&nbsp;   &nbsp;&nbsp; Date : '.$row['date'].'
                      </span>
                    </div>
                  </li>';    
                                    
                                
             
               
           }   ?>
                </ul>
              </div>
              <!-- /.card-body -->
            <div class="card-footer clearfix">
                
                <a href="orders.php" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
            <div class="col-md-12">
            <!-- /.info-box -->

            
            <!-- /.card -->

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                
                      <?php
                                    $sql = "SELECT * FROM user order by adid desc limit 6";
           $qry = $conn->query($sql);
         
           while($row = $qry->fetch_assoc()){
                
               echo '<li class="item">
                   
                    <div class="product-info">
                      <a href="orders.php?user='.$row['adid'].'" class="product-title">'.$row['name'].'
                        <span class="badge badge-danger float-right">User</span></a>
                      <span class="product-description">
                        Email : '.$row['email'].' | Phone : '.$row['phone'].' 
                      </span>
                    </div>
                  </li>';
               
           }   ?>
                </ul>
              </div>
              <!-- /.card-body -->
            <div class="card-footer clearfix">
                
                
                <a href="users.php" class="btn btn-sm btn-secondary float-right">View All Users</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <!-- /.info-box -->

            
            <!-- /.card -->

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Products</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                
                      <?php
                                    $sql = "SELECT * FROM products order by adid desc limit 6";
           $qry = $conn->query($sql);
         $qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
                
               echo '<li class="item">
                    <div class="product-img">
                      <img src="../shop/'.$row['image'].'" alt="Movie Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="edit-product.php?id='.$row['adid'].'" class="product-title">'.$row['name'].'
                      <span class="badge badge-warning float-right">Product</span></a>
                      <span class="product-description">
                        Price :  &nbsp;&nbsp;  ₦'.$row['price'].'
                      </span>
                    </div>
                  </li>';
               
           }   ?>
                </ul>
              </div>
              <!-- /.card-body -->
            <div class="card-footer clearfix">
                <a href="create-product.php" class="btn btn-sm btn-warning float-left">Create New Product</a>
                <a href="products.php" class="btn btn-sm btn-secondary float-right">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
            <div class="col-md-6">
            <!-- /.info-box -->

            
            <!-- /.card -->

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Courses</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                
                      <?php
                                    $sql = "SELECT * FROM courses order by adid desc limit 6";
           $qry = $conn->query($sql);
         $qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
                
               echo '<li class="item">
                    <div class="product-img">
                      
                    </div>
                    <div class="product-info">
                      <a href="edit-course.php?uniqueid='.$row['uniqueid'].'" class="product-title">'.$row['name'].'
                        <span class="badge badge-success float-right">Courses</span></a>
                      <span class="product-description">
                        Price : ₦'.$row['price'].' 
                      </span>
                    </div>
                  </li>';
               
           }   ?>
                </ul>
              </div>
              <!-- /.card-body -->
            <div class="card-footer clearfix">
                <a href="create-course.php" class="btn btn-sm btn-success float-left">Create New Course</a>
                
                <a href="courses.php" class="btn btn-sm btn-secondary float-right">View All Courses</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include 'footer.php';
?>