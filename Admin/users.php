  <title>Admin - Users</title>
<?php
$users='active';

include 'header.php';

?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
          
        <div class="card-body pb-0">
             <div class="card-header">
                <h3 class="card-title">All Users</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" placeholder="Enter keywords"   class="form-control float-right" id="search-highlight2" name="search-highlight" placeholder="Search" type="text" data-list="#itemContainer2">
                      

                   
                  </div>
                </div>
              </div>
          <div class="row d-flex align-items-stretch" id="itemContainer2">
              
                      <?php
                                    $sql = "SELECT * FROM user order by adid desc";
           $qry = $conn->query($sql);
 
           while($row = $qry->fetch_assoc()){
      $userid=$row['adid'];
$sqls = "SELECT * FROM billing order by adid desc where userid='$userid'";
           $qrys = $conn->query($sqls);
            if(isset($qrys->num_rows)){if($qrys->num_rows>0){
           do{
                  
        $bil='<p class="text-muted text-sm"><b>Billing / Shipping: </b> Name - '.$rows['name'].' / Email - '.$rows['email'].'  / Company -'.$rows['company'].'  / Phone -'.$row['phone'].'  / Address -'.$rows['address'].' / Landmark -'.$rows['landmark'].' /  Billing Email -'.$rows['billingemail'].' </p>';
               echo '<div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  @'.$row['email'].'
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
                      <h2 class="lead"><b>'.$row['name'].'</b></h2>
                      <p class="text-muted text-sm"><b>Details: </b> Address - '.$row['address'].' / Phone - '.$row['phone'].'  / Education -'.$row['education'].'  </p>
                      '.$bil.'
                     
                    </div>
                    <div class="col-12 text-center">
                      <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    
                    <a href="orders.php?user='.$row['adid'].'" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Orders
                    </a>
                  </div>
                </div>
              </div>
            </div>';
           }
               while($rows = $qrys->fetch_assoc());
            }}else{
                 $bil='<p class="text-muted text-sm"><b>Billing / Shipping: </b> Name - Not set / Email - Not set  / Company - Not set  / Phone - Not set  / Address - Not set / Landmark - Not set /  Billing Email - Not set </p>';   
                 echo '<div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  @'.$row['email'].'
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
                      <h2 class="lead"><b>'.$row['name'].'</b></h2>
                      <p class="text-muted text-sm"><b>Details: </b> Address - '.$row['address'].' / Phone - '.$row['phone'].'  / Education -'.$row['education'].'  </p>
                      '.$bil.'
                     
                    </div>
                    <div class="col-12 text-center">
                      <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    
                    <a href="orders.php?user='.$row['adid'].'" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Orders
                    </a>
                  </div>
                </div>
              </div>
            </div>';
               }}?>
            
           
            
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include 'footer.php';
?>
<script  src="../js/jquery.hideseek.min.js"></script>
<script>
    $('#search-highlight2').hideseek({
  highlight: true,
    nodata: 'No results found',
        
});
    
    
   
    
 
  </script>
</body>
</html>
