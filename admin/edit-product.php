<title>Admin - Edit Product</title>
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">

   <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
<?php

$product='active';


if(isset($_GET['id'])){
    $id=$_GET['id'];
//    if($_GET['fail']=='yes'){
//         echo '<script>alert("Please enter cinema details");
//         window.location="#cinem";
//         </script>';
//    }
}else  if(isset($_POST['name'])){}
else{
   echo '<script>window.location="404.php";</script>';
}
include 'header.php';

         
?>
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Product </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
              <?php
      if(isset($_POST['name'])){
          $target_dir = "../shop/images/";
      $name=mysqli_real_escape_string($conn, $_POST['name']);
      $oldprice=mysqli_real_escape_string($conn, $_POST['oldprice']);
          $price=mysqli_real_escape_string($conn, $_POST['price']);
          $id=mysqli_real_escape_string($conn, $_POST['id']);
          $category=mysqli_real_escape_string($conn, $_POST['category']);
          
           $sqlsi = "update products set name='$name',oldprice='$oldprice',price='$price',category='$category' where adid='$id'";
        if (mysqli_query($conn, $sqlsi)) {}
        $var =array();
              
                  
         $unique=uniqid('product');
          if($_FILES["file"]["error"]==0){  
$target_file = $target_dir. $unique;
                           $image = 'images/'. $unique;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_dir.basename($_FILES["file"]["name"]),PATHINFO_EXTENSION));
                            
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

                            $yes=0;
// Check if file already exists

// Check file size
if ($_FILES["file"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    echo "Sorry, only JPG, JPEG & PNG  files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {$yes=1;
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        
   
    if($yes==1){
            $sqlsi = "update products set image='$image' where adid='$id'";
        if (mysqli_query($conn, $sqlsi)) {}
        
        
                
  
       
    }}
      }}echo "<script>window.location='edit-product.php?id=".$id."&type=completed';</script>";}
      ?>   
      
    <!-- Main content -->
      <form action="edit-product.php" method="post" enctype="multipart/form-data">
          
    <section class="content">
      <div class="container-fluid">
        <div class="row">
             <div class="col-md-12">
          <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
          <!-- /.col -->
                    <div class="row">
          <div class="col-md-12">
           
                
                <div class="form-group">
                      <label>Name *</label>
                     <input  type="hidden" class="form-control" name="id" value="<?php
echo $id; ?>" required>
                  <input class="form-control name" name="name" value="<?php
$sql = "SELECT * FROM products where adid='$id'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo $row['name']; } ?>" required>
                </div>
              <div class="form-group">
                      <label>Current Price</label>
                  <input type="number" class="form-control" name="price" value="<?php
$sql = "SELECT * FROM products where adid='$id'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo str_replace(',','',$row['price']);}?>" required>
                </div>
              <div class="form-group">
                      <label>Old Price (If any)</label>
                  <input type="number" class="form-control" name="oldprice" value="<?php
$sql = "SELECT * FROM products where adid='$id'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo str_replace(',','',$row['oldprice']); } ?>" >
                </div>
                        </div>
                         
                         <div class="col-md-12">
              <div class="form-group">
                  <label>Category*</label>
                  <div class="select2-purple">
                    <input name="category" class="form-control" id="choices-text-preset-values" value="<?php
$sql = "SELECT * FROM products where adid='$id'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
             echo $row['category']; } ?>" type="text" placeholder="Type to add..." />
                  </div>
                </div>
                    
                    

          </div>  
                         
                  <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Cover Image</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <div class="col-md-6">
              <ul class=" d-flex ">
               
              
                  <span class="has-img"><img class="img-thumbnail" src="../shop/<?php
$sql = "SELECT * FROM products where adid='$id'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
             echo $row['image']; } ?>" alt=""></span>

                 
              
                
              </ul>
           </div><div class="col-md-12">
               <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Update Image</label> 
                      </div>
                     
                        
                    </div></div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
                        
                         
                       
            
              </div>
              </div>
              
                <div class="card-footer">
                <div class="float-right">
                  
                  <button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Proceed</button>
                </div>
                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
              </div>
              
            </div>
                 </div>
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
          </form>
    <!-- /.content -->
  </div>
<?php
include 'footer.php';
?>
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Summernote -->

<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Page Script -->
<script src="plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="plugins/toastr/toastr.min.js"></script>
<script src="dist/js/choices.js"></script>
    <script>
      var textPresetVal = new Choices('#choices-text-preset-values',
      {
        removeItemButton: true,
      });

    </script>
<script>
  $(function () {
       var store=$('.name').val();
      $('form').change(function(){
    
    
     <?php 
    $sql = "SELECT * FROM products where adid<>'$id'";
$qry = $conn->query($sql);
    while($row=$qry->fetch_assoc()){
        echo "if($('.name').val()=='".$row['name']."'){
        $('.name').val(store);
        alert('Name already in use');
        }";
    }?>
    
});
     
    //Add text editor
        $('.select2').select2();
      
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
$('#datemask').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
    //Initialize Select2 Elements
      
    $('.range_5').ionRangeSlider({
      min     : 0,
      max     : 10,
         from    : 0,
      to      : 10,
      type    : 'single',
      step    : 0.1,
      prettify: false,
      hasGrid : true
    })
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    $('#compose-textarea').summernote()
    $('.compose-textarea1').summernote()
    bsCustomFileInput.init();
      
    
                            const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    <?php
    if(isset($_GET['type'])){
        if($_GET['type']=='completed'){
            echo'					
      Toast.fire({
        type: "success",
        title: "Request Completed"
      })';
        }
    }
    ?>
  })
</script>
</body>
</html>
