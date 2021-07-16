<title>Admin - Edit Course</title>
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
   <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
<?php

$courses='active';

if(isset($_GET['uniqueid'])){
    $id=$_GET['uniqueid'];
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

  
  <div class="content-wrapper">
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Course Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Course Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <?php
                     
                       if(isset($_POST['name'])){                                
$target_dir = "../images/course/";
      $name=mysqli_real_escape_string($conn, $_POST['name']);
      
          $price=mysqli_real_escape_string($conn, $_POST['price']);
          $price=mysqli_real_escape_string($conn, $_POST['price']);
          $overview=mysqli_real_escape_string($conn, $_POST['overview']);
          $courseproject=mysqli_real_escape_string($conn, $_POST['courseproject']);
          $review=mysqli_real_escape_string($conn, $_POST['review']);
          $teacher=mysqli_real_escape_string($conn, $_POST['teacher']);
          $category=mysqli_real_escape_string($conn, $_POST['category']);
                    $duration=mysqli_real_escape_string($conn, $_POST['duration']);
          $hoursperday=mysqli_real_escape_string($conn, $_POST['hoursperday']);
          $lectures=mysqli_real_escape_string($conn, $_POST['lectures']);
          $studentstrained=mysqli_real_escape_string($conn, $_POST['studentstrained']);
                           $uniqueid=$_POST['uniqueid'];
                           $id=$_POST['uniqueid'];
                           
                             
   $sqlt = "update courses set name='$name', price='$price', overview='$overview', courseproject='$courseproject', review='$review', teacher='$teacher', category='$category', duration='$duration', hoursperday='$hoursperday', lectures='$lectures', studentstrained='$studentstrained' where uniqueid='$uniqueid'";
                            
                              
                           
        
                           
                    if (mysqli_query($conn, $sqlt)) {                         
                        
           
         
        $varis =array();
              $sql = "SELECT * FROM curriculum where courseid='$id'";
           $qryd = $conn->query($sql);
         
                      
           while($row = $qryd->fetch_assoc()){
               if(isset($_POST['curriculumdescription'.$row['adid']])){
        $adid=$row['adid'];
       $desc=mysqli_real_escape_string($conn, $_POST['curriculumdescription'.$row['adid']]);
                  $name=mysqli_real_escape_string($conn, $_POST['curriculumname'.$row['adid']]);
        
        
        $sqlsi = "update curriculum set name='$name',description='$desc' where adid='$adid'";
       
            
        if (mysqli_query($conn, $sqlsi)) {}
               }
    }   
                    }else{
                           echo $sqlt;}
             $sql = "SELECT * FROM instructor where courseid='$id'";
           $qryd = $conn->query($sql);
         
//                      Start Instructor
           while($row = $qryd->fetch_assoc()){
               $adid=$row['adid'];
                 $name=mysqli_real_escape_string($conn, $_POST['instructorsname'.$adid]);
  $job=mysqli_real_escape_string($conn, $_POST['instructorsjob'.$adid]);
    $description=mysqli_real_escape_string($conn, $_POST['instructorsdescription'.$adid]);
    
    $facebook=mysqli_real_escape_string($conn, $_POST['instructorsfacebook'.$adid]);
    $instagram=mysqli_real_escape_string($conn, $_POST['instructorsinstagram'.$adid]);
    $twitter=mysqli_real_escape_string($conn, $_POST['instructorstwitter'.$adid]);
            
                
         
              $e=$adid;
               
        $target_dire = "../images/instructor/";
             $target_file = $target_dire. basename($_FILES['instructorsimage'.$e]["name"]);
                        
        
        
            $sqls = "update instructor set name='$name', job='$job',description='$description',facebook='$facebook',instagram='$instagram',twitter='$twitter' where adid='$e'";
                              
        
        
            if (mysqli_query($conn, $sqls)) {}
                      
                      if($_FILES['instructorsimage'.$e]["error"]==0){  

                                                       

               $del='../'.$row['image'];
          
                           $image = 'images/instructor/'. basename($_FILES['instructorsimage'.$e]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                            
    $check = getimagesize($_FILES['instructorsimage'.$e]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

                            $yes=0;
// Check if file already exists

// Check file size
if ($_FILES['instructorsimage'.$e]["size"] > 500000) {
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
    if (move_uploaded_file($_FILES['instructorsimage'.$e]["tmp_name"], $target_file)) {
          if($image==$row['image']){
                  
               }else{
                 $sqls = "update instructor set image='$image' where adid='$e'";
                              if (mysqli_query($conn, $sqls)) {
                                  
                              unlink($del);     
                              
                       
                       
                    
    }
       }
                       }
                                    } 
                      
                               
                      }  
            
           }
                           
//                    end    intructor    
                           
                           
                           
                           
                           
                           
                           
                if($_FILES["file"]["error"]==0){  
                    $target_dir = "../images/course/";
$target_file = $target_dir. basename($_FILES["file"]["name"]);
                                                       
$sql = "SELECT * FROM courses where uniqueid='$id'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               $del='../'.$row['image'];
          
                           $image = 'images/course/'. basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                            
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
          if($image==$row['image']){
                  
               }else{
                unlink($del);   
                 $sqls = "update courses set image='$image' where uniqueid='$id'";
                              if (mysqli_query($conn, $sqls)) {
                                  
                              
                              }
                       
                       
                    
    }
       }
                       }
                                    } 
//                           echo '<script>
//              window.location="completed.php?link=movie.php?uniqueid='.$uniqueid.'&name='.$name.'&type=edit";
//                </script>';
//                               
                }
                     echo '<script>
              window.location="edit-course.php?uniqueid='.$uniqueid.'&type=completed";
                </script>'; }
                
                             
      ?>
    <!-- Main content -->
      <form action="edit-course.php" enctype="multipart/form-data" method="post">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
             <div class="col-md-12">
          <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Edit course</h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
          <!-- /.col --><div class="row">
          <div class="col-md-6">
           
                
                <div class="form-group">
                      <label>Name *</label>
                     <input type="hidden" name="uniqueid" value="<?php
$sql = "SELECT * FROM courses where uniqueid='$id'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo $row['uniqueid']; } ?>" >
                  <input class="form-control name" name="name" value="<?php
$sql = "SELECT * FROM courses where uniqueid='$id'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo $row['name']; } ?>"  required>
                </div>
              
                        </div>
                        <div class="col-md-6">
        
                
                <div class="form-group">
                      <label>Price *</label>
                  <input type="number" class="form-control" value="<?php
$sql = "SELECT * FROM courses where uniqueid='$id'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo $row['price']; } ?>" name="price"  required>
                </div>
              
                        </div>
                        <div class="col-md-6">
                <div class="form-group">
                    <label>Overview *</label>
                    <textarea class="compose-textarea" class="form-control" name="overview" style="height: 500px" ><?php
$sql = "SELECT * FROM courses where uniqueid='$id'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo $row['overview']; } ?></textarea>
                </div></div>
                        <div class="col-md-6">
                <div class="form-group">
                    <label>Course project *</label>
                    <textarea class="compose-textarea" class="form-control" name="courseproject" style="height: 500px" ><?php
$sql = "SELECT * FROM courses where uniqueid='$id'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo $row['courseproject']; } ?></textarea>
                </div></div>
                        <div class="col-md-12" style="display:none;">
                <div class="form-group">
                    <label>Review *</label>
                    <textarea class="compose-textarea" class="form-control" name="review" style="height: 500px" ><?php
$sql = "SELECT * FROM courses where uniqueid='$id'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo $row['review']; } ?></textarea>
                </div></div>
                        <div class="col-md-6">
                <div class="form-group">
                    <label>Teacher *</label>
                    <input class="form-control" value="<?php
$sql = "SELECT * FROM courses where uniqueid='$id'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo $row['teacher']; } ?>" name="teacher"  >
                   
                </div></div>
                        <div class="col-md-6">
                <div class="form-group">
                    <label>Category *</label>
                    <input class="form-control" value="<?php
$sql = "SELECT * FROM courses where uniqueid='$id'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo $row['category']; } ?>" name="category"  >
                      
                </div></div>
                        <div class="col-md-6">
                <div class="form-group">
                    <label>Duration *</label>
                    <input class="form-control" value="<?php
$sql = "SELECT * FROM courses where uniqueid='$id'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo $row['duration']; } ?>" name="duration"  >
                      
                    
                </div></div>
                        <div class="col-md-6">
                <div class="form-group">
                    <label>Hours Per Day *</label>
                    <input class="form-control" value="<?php
$sql = "SELECT * FROM courses where uniqueid='$id'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo $row['hoursperday']; } ?>" name="hoursperday"  >
                      
                    
                </div></div>
                        <div class="col-md-6">
                <div class="form-group">
                    <label>Lectures *</label>
                    <input class="form-control" value="<?php
$sql = "SELECT * FROM courses where uniqueid='$id'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo $row['lectures']; } ?>" name="lectures"  >
                      
                    
                </div></div>
                         <div class="col-md-6">
                <div class="form-group">
                    <label>Students Trained *</label>
                    <input class="form-control" value="<?php
$sql = "SELECT * FROM courses where uniqueid='$id'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo $row['studentstrained']; } ?>" name="studentstrained"  >
                      
                    
                </div></div>
                         
                        
                <div class="col-md-12" >
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Instructors</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
                   <div class="col-md-6"><div class="form-group">
                  
                     <a href="add-instructor-1.php?id=<?php 
                           echo $id;?>" class="btn btn-info">Add Instructor</a>
                </div></div>  
                
             <div class="row" id="cinem">
                 
                         <?php 
                            
      $sql = "SELECT * FROM instructor where courseid='$id'";
           $qryd = $conn->query($sql);
         
                      
           while($row = $qryd->fetch_assoc()){
               
    echo '  <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">'.$row['name'].'</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus" style="color:#adb5bd;"></i></button>
                  
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-trash" style="color:#adb5bd;"  id="instructor'.$row['adid'].'"></i></button>
              </div>
              </div>
              <!-- /.card-head1er -->
              <div class="card-body">
                  <div class="row">
                  <div class="col-md-12">
                  <div class="form-group">
                    <label>Description *</label>
                    <textarea class="compose-textarea"  name="instructorsdescription'.$row['adid'].'" style="height: 500px" >'.$row['description'].'</textarea><input  type="hidden" value="'.$row['name'].'"  name="instructors[]"  >
                </div></div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Name </label> *
                    <input class="form-control"  type="text" value="'.$row['name'].'"   name="instructorsname'.$row['adid'].'"  >
                </div></div>
                
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Job </label> (e.g Engineer)*
                    <input class="form-control"  type="text" value="'.$row['job'].'"  name="instructorsjob'.$row['adid'].'"   >
                </div></div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Facebook </label> (e.g https://facebook.com/username)*
                    <input class="form-control"  type="text" value="'.$row['facebook'].'" name="instructorsfacebook'.$row['adid'].'"    >
                </div></div><div class="col-md-6">
                  <div class="form-group">
                    <label>Instagram </label>(e.g https://instagram.com/username) *
                    <input class="form-control"  type="text" value="'.$row['instagram'].'"  name="instructorsinstagram'.$row['adid'].'"   >
                </div></div><div class="col-md-6">
                  <div class="form-group">
                    <label>Twitter </label>(e.g https://twitter.com/username)*
                    <input  class="form-control" type="text" value="'.$row['twitter'].'"  name="instructorstwitter'.$row['adid'].'"   >
                </div></div>
                <div class="col-sm-6">
                      <ul class=" d-flex ">
               
              
                  <span class="has-img"><img class="img-thumbnail" src="../'.$row['image'].'"></span>
</ul>
                    </div>
                     <div class="col-sm-12">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="instructorsimage'.$row['adid'].'" >
                        <label class="custom-file-label" for="exampleInputFile">Update Image</label> 
                      </div>
                  </div>
                  </div></div>';}
                 
                            ?></div>
            </div>
              
              
              
              
              
              
              
              
              
              
              
              
              
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          
          <!-- /.card -->
        </div>         
                                  <div class="col-md-12" id="casta">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Curriculum</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
                   <div class="col-md-6"><div class="form-group">
                  
                     <a href="add-curriculum-1.php?id=<?php 
                           echo $id;?>" class="btn btn-info">Add Curriculum</a>
                </div></div>  
                
             <div class="row" id="cinem">
                 
                         <?php 
                            
      $sql = "SELECT * FROM curriculum where courseid='$id'";
           $qryd = $conn->query($sql);
         
                      
           while($row = $qryd->fetch_assoc()){
               
    echo '  <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">'.$row['name'].'</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus" style="color:#adb5bd;"></i></button>
                  
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-trash" style="color:#adb5bd;"  id="curriculum'.$row['adid'].'"></i></button>
              </div>
              </div>
              <!-- /.card-head1er -->
              <div class="card-body">
                  <div class="row">
                  <div class="col-md-12">
                  <div class="form-group">
                    <label>Description *</label>
                    <textarea class="compose-textarea" class="form-control" name="curriculumdescription'.$row['adid'].'" style="height: 500px" >'.$row['description'].'</textarea><input  type="hidden" value="'.$row['adid'].'"  name="curricullum[]"  >
                </div>
                
                     
                  </div>  <div class="col-md-12">
                  <div class="form-group">
                    <label>Name *</label>
                    <input  class="form-control" type="text" value="'.$row['name'].'" name="curriculumname'.$row['adid'].'" >
                </div>
                
                     
                  </div></div></div></div></div>';}
                            ?></div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          
          <!-- /.card -->
        </div>   
                        
                         
                       
            
              </div>
                  
                    
                  <div class="row">
                  
                  </div>
              </div>
              
                <div class="card-footer">
              </div>
              
            </div>
                 </div>
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
          
    <section class="content">
          <div class="container-fluid">
      <div class="row">
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
               
              
                  <span class="has-img"><img class="img-thumbnail" src="../<?php
$sql = "SELECT * FROM courses where uniqueid='$id'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
             echo $row['image']; } ?>" alt=""></span>

                 
              
                
              </ul>
           </div><div class="col-md-12">
               <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file">
                        <label class="custom-file-label" for="exampleInputFile">Update Image</label> 
                      </div>
                     
                        
                    </div></div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
            
          <input type="submit" value="Save Changes" class="btn btn-success float-right">
        </div>
              </div></div>
    </section>
          </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!--

-->
 <?php 
                      
      $sql = "SELECT * FROM instructor where courseid='$id'";
           $qry = $conn->query($sql);
         
                      
           while($row = $qry->fetch_assoc()){
               echo'
        
<form method="post" class="delinstructor'.$row['adid'].' de">
                  <input name="page" type="hidden" value="deleteins">
                    <input name="id" type="hidden" value="'.$row['adid'].'">
              
                       </form>';}
                 
      $sql = "SELECT * FROM curriculum where courseid='$id'";
           $qry = $conn->query($sql);
         
                      
           while($row = $qry->fetch_assoc()){
               echo'
        
<form method="post" class="delcurriculum'.$row['adid'].' de">
                  <input name="page" type="hidden" value="deletecur">
                    <input name="id" type="hidden" value="'.$row['adid'].'">
              
                       </form>';}
?>
<?php
include 'footer.php';
?>
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Page Script -->
   <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="plugins/toastr/toastr.min.js"></script>

<!-- Summernote -->

<!-- Page Script -->
<script src="plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<script>
  $(function () {
    //Add text editor
        $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    $('#compose-textarea').summernote()
    $('.compose-textarea').summernote()
    bsCustomFileInput.init();
   
  
                 

  })
</script>


<script>
  $(function () {
    //Add text editor
        $('.select2').select2();
      
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
$('#datemask').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
    //Initialize Select2 Elements
      
    $('.range_5').ionRangeSlider({
      min     : 0,
      max     : 10,
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


<script>
    
jQuery(document).ready(function(){
     <?php 
                         
      $sql = "SELECT * FROM instructor where courseid='$id'";
           $qry = $conn->query($sql);
         
                      
           while($row = $qry->fetch_assoc()){echo ' jQuery("#instructor'.$row['adid'].'").click(function(){
        $(".delinstructor'.$row['adid'].'").submit(); });';
           }
 
    
    
      $sql = "SELECT * FROM curriculum where courseid='$id'";
           $qry = $conn->query($sql);
          while($row = $qry->fetch_assoc()){
           echo ' jQuery("#curriculum'.$row['adid'].'").click(function(){
        $(".delcurriculum'.$row['adid'].'").submit(); });';
           }
    
    
    ?>
  
    
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
        title: "Request Successful"
      })';
        }
    }
    ?>
    
						jQuery(".de").submit(function(e){
                            				
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
        title: 'Item deleted'
      })
  
										 
                                        
             
									  
									}else
									{

						 				
                                      //alert(response);  
                                 
Toast.fire({
        type: 'error',
        title: 'Please try again'
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