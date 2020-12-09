
<title>Admin - Create Movie</title>
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
<link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<?php

$courses='active';
    include 'header.php';
    ?>  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Complete info</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Courses</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

                    <?php
                     
                       
                
                     
                       if(isset($_POST['submitted'])){ 
                       
  $unique=$_POST['id'];
        
        $i=0;
        
     foreach($_POST['instructors'] as $c){
         
         $target_dir = "../images/instructor/";
         $target_file = $target_dir. basename($_FILES['instructorsimage'.$i]["name"]);
                           $imager = 'images/instructor/'. basename($_FILES['instructorsimage'.$i]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                            
    $check = getimagesize($_FILES['instructorsimage'.$i]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

                            $yes=0;
// Check if file already exists

// Check file size
if ($_FILES['instructorsimage'.$i]["size"] > 500000) {
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
    if (move_uploaded_file($_FILES['instructorsimage'.$i]["tmp_name"], $target_file)) {
        
   
    if($yes==1){
         $name=mysqli_real_escape_string($conn, $_POST['instructorsname'.$i]);
  $job=mysqli_real_escape_string($conn, $_POST['instructorsjob'.$i]);
    $description=mysqli_real_escape_string($conn, $_POST['instructorsdescription'.$i]);
    $courseid=mysqli_real_escape_string($conn, $unique);
    $facebook=mysqli_real_escape_string($conn, $_POST['instructorsfacebook'.$i]);
    $instagram=mysqli_real_escape_string($conn, $_POST['instructorsinstagram'.$i]);
    $twitter=mysqli_real_escape_string($conn, $_POST['instructorstwitter'.$i]);
    

        $sqlsi = "INSERT INTO instructor(name,job,description,courseid,facebook,instagram,twitter,image) VALUES ('$name','$job','$description','$courseid','$facebook','$instagram','$twitter','$imager')";
       
            
        if (mysqli_query($conn, $sqlsi)) {} 
        
    }}}
        
        
        
       
    $i++;}
                          
           echo '<script>
              window.location="edit-course.php?uniqueid='.$unique.'&type=completed";
                </script>'; }
        
                       
      
    ?>
         
    <!-- Main content -->
        <form role="form" method="post"  action="add-instructor-2.php" enctype="multipart/form-data">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          
          <!--/.col (left) -->
      
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
               
              <input type="hidden" name="submitted" value="1">  
            <input type="hidden" name="id" value="<?php echo $_POST['id']?>">   
           
           
             
              
        
         <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Instructors</h3>
              </div>
              <!-- /.card-head1er -->
              <div class="card-body">
              <div class="row">
              <?php
    $var =array();
              if(isset($_POST['instructorsi']))  {   
    
             $i=0;
                  $var=explode(',',$_POST['instructorsi']);
    foreach($var as $c){
     
               
             
    echo '
                
               <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">'.$c.'</h3>
              </div>
              <!-- /.card-head1er -->
              <div class="card-body">
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label>Description *</label>
                    <textarea class="compose-textarea" class="form-control" name="instructorsdescription'.$i.'" style="height: 500px" required></textarea><input  type="hidden" value="'.$c.'"  name="instructors[]"  required>
                </div>
                <input  type="hidden" value="'.$c.'"  name="instructorsname'.$i.'"  required>
                </div><div class="col-md-6">
                  <div class="form-group">
                    <label>Image *</label>
                   <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="instructorsimage'.$i.'"  required>
                        <label class="custom-file-label" for="exampleInputFile">Choose Image</label> 
                      </div></div>
                </div></div> <div class="col-md-6">
                  <div class="form-group">
                    <label>Job </label> (e.g Engineer)*
                    <input class="form-control"  type="text" value=""  name="instructorsjob'.$i.'" name="faceboook"  required>
                </div></div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Facebook </label> (e.g https://facebook.com/username)*
                    <input class="form-control"  type="text" value="" name="instructorsfacebook'.$i.'"  name="faceboook"  required>
                </div></div><div class="col-md-6">
                  <div class="form-group">
                    <label>Instagram </label>(e.g https://instagram.com/username) *
                    <input class="form-control"  type="text" value=""  name="instructorsinstagram'.$i.'" name="instagram"  required>
                </div></div><div class="col-md-6">
                  <div class="form-group">
                    <label>Twitter </label>(e.g https://twitter.com/username)*
                    <input  class="form-control" type="text" value=""  name="instructorstwitter'.$i.'" name="twitter"  required>
                </div></div>
                
                  </div></div></div></div>
                ';
    $i++;}}
              ?></div>
                </div></div>
                   </div>            
                    
            <!-- /.card -->
            <!-- general form elements disabled -->
            
            <!-- /.card --> <div class="card-footer">
                <div class="float-right">
                  
                  <button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Create Instructor</button>
                </div>
                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
              </div>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
      </form>
  </div>
  <!-- /.content-wrapper -->

    <?php
    include 'footer.php';
    ?>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
      $(function () {
          
          $('.compose-textarea').summernote()
          $('.duallistbox').bootstrapDualListbox()
                     bsCustomFileInput.init();
                    })</script>