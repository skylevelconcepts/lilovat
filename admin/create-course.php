<title>Admin - Create Course</title>
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
<link rel="stylesheet" href="plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
<?php

$courses='active';
include 'header.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Course </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Course</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
            
      
    <!-- Main content -->
      <form id="form" action="complete-edit.php" method="post" enctype="multipart/form-data">
          
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
          <div class="col-md-6">
           
                
                <div class="form-group">
                      <label>Name *</label>
                  <input class="form-control name" name="name"  required>
                </div>
              
                        </div>
                        <div class="col-md-6">
        
                
                <div class="form-group">
                      <label>Price *</label>
                  <input type="number" class="form-control" name="price"  required>
                </div>
              
                        </div>
                        <div class="col-md-6">
                <div class="form-group">
                    <label>Overview *</label>
                    <textarea class="compose-textarea" class="form-control" name="overview" style="height: 500px" required>
                      
                    </textarea>
                </div></div>
                        <div class="col-md-6">
                <div class="form-group">
                    <label>Course project *</label>
                    <textarea class="compose-textarea" class="form-control" name="courseproject" style="height: 500px" required>
                      
                    </textarea>
                </div></div>
                        <div class="col-md-12" style="display:none;">
                <div class="form-group">
                    <label>Review *</label>
                    <textarea class="compose-textarea" class="form-control" name="review" style="height: 500px" required>
                      
                    </textarea>
                </div></div>
                        <div class="col-md-6">
                <div class="form-group">
                    <label>Teacher *</label>
                    <input class="form-control" name="teacher"  required>
                   
                </div></div>
                        <div class="col-md-6">
                <div class="form-group">
                    <label>Category *</label>
                    <input class="form-control" name="category"  required>
                      
                </div></div>
                        <div class="col-md-6">
                <div class="form-group">
                    <label>Duration *</label>
                    <input class="form-control" name="duration"  required>
                      
                    
                </div></div>
                        <div class="col-md-6">
                <div class="form-group">
                    <label>Hours Per Day *</label>
                    <input class="form-control" name="hours-per-day"  required>
                      
                    
                </div></div>
                        <div class="col-md-6">
                <div class="form-group">
                    <label>Lectures *</label>
                    <input class="form-control" name="lectures"  required>
                      
                    
                </div></div>
                         <div class="col-md-6">
                <div class="form-group">
                    <label>Students Trained *</label>
                    <input class="form-control" name="studentstrained"  required>
                      
                    
                </div></div>
                          <div class="col-md-12">
              <div class="form-group">
                  <label>Curriculum *</label>
                  <div class="select2-purple">
                      <input name="curriculum" class="form-control" id="choices-text-preset-values" type="text" placeholder="Type to add..." required/>
                    
                        
                  </div>
                </div>
                    
                    

          </div> 
                 <div class="col-md-12">
              <div class="form-group">
                  <label>Instructors *</label>
                  <div class="select2-purple">
                      <input name="instructors" class="form-control" id="choices-text-preset-values" type="text" placeholder="Type to add..." required/>
                    
                        
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
        removeItemButton: true,
      });

    </script>

<script>
    
  $(function () {
      
    //Add text editor
$('form').change(function(){
    
    
     <?php 
    $sql = "SELECT * FROM courses";
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
    $('.compose-textarea').summernote()
    bsCustomFileInput.init();
  })
</script>
</body>
</html>
