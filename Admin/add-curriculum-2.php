
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
        
    foreach($_POST['curriculumi'] as $c){
        
        $f=mysqli_real_escape_string($conn, $c);
       $cdesc=mysqli_real_escape_string($conn, $_POST['curriculumi'.$i]);
        
        $sd=$i+1;
        $sqlsi = "INSERT INTO curriculum(name,id,description,courseid) VALUES ('$f','$sd','$cdesc','$unique')";
       
            
        if (mysqli_query($conn, $sqlsi)) {}
    $i++;}
           echo '<script>
              window.location="edit-course.php?uniqueid='.$unique.'&type=completed";
                </script>'; 
        
                       }
      
    ?>
         
    <!-- Main content -->
        <form role="form" method="post"  action="add-curriculum-2.php" enctype="multipart/form-data">
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
                <h3 class="card-title">Curriculum</h3>
              </div>
              <!-- /.card-head1er -->
              <div class="card-body">
              <div class="row">
              <?php
    $var =array();
              if(isset($_POST['curriculum']))  {   
    
             $i=0;
                  $var=explode(',',$_POST['curriculum']);
    foreach($var as $c){
     
               
             
    echo ' <div class="col-md-6">
                <div class="form-group">
                    <label>'.$c.' *</label>
                    <textarea class="compose-textarea" class="form-control" name="curriculumi'.$i.'" style="height: 500px" required></textarea><input  type="hidden" value="'.$c.'"  name="curriculumi[]"  required>
                </div></div>';
    $i++;}}
              ?></div>
                </div></div>
                   </div>               
                    
            <!-- /.card -->
            <!-- general form elements disabled -->
            
            <!-- /.card --> <div class="card-footer">
                <div class="float-right">
                  
                  <button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Create Curriculum</button>
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