
<title>Admin - Add Cast</title>
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
<?php

$courses='active';
if(isset($_GET['id'])){
    $id=$_GET['id'];
}else{
    echo '<script>window.location="404.php";</script>';
}
include 'header.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Curriculum </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Curriculum</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
                                                                
    <!-- Main content -->
      <form action="add-curriculum-2.php" method="post">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
             <div class="col-md-12">
          <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Add Curriculum</h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
          <!-- /.col -->
                    <div class="row">
                        
          <div class="col-md-12">
           <input type="hidden" name="id" value="<?php echo $id?>">
                
              
              <div class="form-group">
                  <label>Curriculum *</label>
                  <div class="select2-purple">
                      <input name="curriculum" class="form-control" id="choices-text-preset-values" type="text" placeholder="Type to add..." required/>
                    
                        
                  </div>
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
