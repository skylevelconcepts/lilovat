<title>Admin - Create Product</title>
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
<link rel="stylesheet" href="plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
<?php

$product='active';
include 'header.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create report </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Report</li>
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
          $category=mysqli_real_escape_string($conn, $_POST['category']);
          
         $unique=uniqid('product');
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
           
         $sqlsi = "INSERT INTO products(name,oldprice,price,image,category) VALUES ('$name','$oldprice','$price','$image','$category')";
        if (mysqli_query($conn, $sqlsi)) {}
        $var =array();
              
                  if(isset($_POST['category'])){
    foreach($_POST['category'] as $c){
         $sqlsi = "INSERT INTO distributioncompanies(name,uniqueid) VALUES ('$c','$uniqueid')";
        if (mysqli_query($conn, $sqlsi)) {}
        
   }}
         $sql = "SELECT * FROM products where name='$name'";
$qry = $conn->query($sql);
    while($row=$qry->fetch_assoc()){
        echo "<script>window.location='edit-product.php?id=".$row['adid']."';</script>";
    }
  
       
    }}
      }}
      ?>   
      
    <!-- Main content -->
      <form id="form" action="create-product.php" method="post" enctype="multipart/form-data">
          
    <section class="content">
      <div class="container-fluid">
        <div class="row">
             <div class="col-md-12">
          <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Create new product</h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
          <!-- /.col -->
                    <div class="row">
          <div class="col-md-12">
           
                
                <div class="form-group">
                      <label>Name *</label>
                  <input class="form-control name" name="name"  required>
                </div>
              <div class="form-group">
                      <label>Current Price</label>
                  <input type="number" class="form-control" name="price"  required>
                </div>
              <div class="form-group">
                      <label>Old Price (If any)</label>
                  <input type="number" class="form-control" name="oldprice"  >
                </div>
                        </div>
                         
                         <div class="col-md-12">
              <div class="form-group">
                  <label>Category *</label>
                  <div class="select2-purple">
                    <input name="category" class="form-control" id="choices-text-preset-values" type="text" placeholder="Type to add..." required/>
                  </div>
                </div>
                    
                    

          </div>  
                         
                  <div class="col-md-12">
          <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title"> Cover image</h3>
              </div>
              
              <div class="card-body">
          <!-- /.col -->
                   <div class="col-md-12">
           
                
               
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="exampleInputFile" required>
                        <label class="custom-file-label" for="exampleInputFile">Choose Image</label> 
                      </div>
                     
                        
                    </div>
              <p class="help-block">Blurry and irregularly sized images affect website quality</p>
            
            <!-- /.card -->
          </div>
              </div>
              
                
              
            </div>
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
<script src="dist/js/choices.js"></script>
    <script>
        
      var textPresetVal = new Choices('#choices-text-preset-values',
      {
        removeItemButton: true
      });

    </script>

<script>
  $(function () {
    //Add text editor
$('form').change(function(){
    
    
     <?php 
    $sql = "SELECT * FROM products";
$qry = $conn->query($sql);
    while($row=$qry->fetch_assoc()){
        echo "if($('.name').val()=='".$row['name']."'){
        $('.name').val(' ');
        alert('Name already in use');
        }";
    }?>
    
});
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
  })
</script>

</body>
</html>
