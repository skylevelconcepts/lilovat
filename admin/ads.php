<title>Admin - Edit Ads</title>
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
<?php
$dashboard='';
$events='';
$users='';
$movies='';
$ads='active';
include 'header.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Ad</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ads</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
                    <?php
                     
                       if(isset($_POST['yes'])){  
                           $target_dir = "../images/uploads/";
                           
                                    $sql = "SELECT distinct page FROM ads";
                
           $qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               $page=mysqli_real_escape_string($conn, $row['page']);
              
               $sqla = "SELECT * FROM ads where page='$page'";
                    $qrya = $conn->query($sqla);
                 while($rowa = $qrya->fetch_assoc()){
                      $link=mysqli_real_escape_string($conn, $_POST['link'.$rowa['adid']]);
                     $adid=$rowa['adid'];
                      $sqlt = "update ads set link='$link' where adid='$adid'";
                    if (mysqli_query($conn, $sqlt)) {
                    }
                    if($_FILES[$rowa['adid']]["error"]==0){  
$target_file = $target_dir. basename($_FILES[$rowa['adid']]["name"]);
                                                       
$sql = "SELECT * FROM ads where adid='$adid'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               $del='../'.$row['image'];
          
                           $image = 'images/uploads/'. basename($_FILES[$rowa['adid']]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                            
    $check = getimagesize($_FILES[$rowa['adid']]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

                            $yes=0;
// Check if file already exists

// Check file size
if ($_FILES[$rowa['adid']]["size"] > 500000) {
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
    if (move_uploaded_file($_FILES[$rowa['adid']]["tmp_name"], $target_file)) {
      
                         $sqls = "update ads set image='$image' where adid='$adid'";
                              if (mysqli_query($conn, $sqls)) {
                                  
                              }
                       
                    
    }
       }
                       }
                                    unlink($del); }
                     
                 }}
                                 echo '<script>
              alert("Changes Saved!")
                </script>'; 

 

  
                           
                             
                                             }
      ?>
                                             
    <!-- Main content -->
      <form action="ads.php" method="post" enctype="multipart/form-data">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="yes" name="yes">
                  <?php
                                    $sql = "SELECT distinct page FROM ads";
                
           $qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               $page=$row['page'];
                
                
             echo '<div class="card card-primary card-outline collapsed collapsed-card">
            <div class="card-header">
              <h3 class="card-title">'.$row['page'].' Page</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-plus"></i></button>
              </div>
            </div>
             <div class="card-body">
                 <div class="row">';
               $sqla = "SELECT * FROM ads where page='$page'";
                    $qrya = $conn->query($sqla);
                 while($rowa = $qrya->fetch_assoc()){
                     echo'
            <div class="col-md-6">
            <div class="card card-primary">
            <div class="card-header">
               
              <h3 class="card-title">('.$rowa['type'].')</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
             <div class="card-body">
            
              <ul class=" d-flex ">
               
              
                  <span class="has-img"><img class="img-thumbnail" src="../'.$rowa['image'].'"></span>

                 
              
                
              </ul>
           <div class="col-md-12">
           
               <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="'.$rowa['adid'].'" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Upload Image</label> 
                      </div>
                      <br>
                      <br>
                      <br>
                      
                     <div class="input-group">
                      
                  <input class="form-control" value="'.$rowa['link'].'" placeholder="Back link" name="link'.$rowa['adid'].'" >
                </div>
                        
                    </div></div>
            </div>
            </div>
            </div>';}
               echo'
                     </div>
                </div></div>';
               
                
           }?>
            
            </div>
          </div><!-- /.row -->
          <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Save Changes" class="btn btn-success float-right">
        </div>
              </div>
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
<script>
  $(function () {
    //Add text editor
        $('.select2').select2()

    //Initialize Select2 Elements
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
