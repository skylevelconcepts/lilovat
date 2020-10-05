<title>Admin - Courses</title>

    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<?php

$coursess='active';
include 'header.php';
if(isset($_GET['delete'])){
    $delete =$_GET['delete'];
 
                     
                 if (mysqli_query($conn, $sql)) {
                                  
                              }
               
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Courses</h1>
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

 <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Courses</h3>

          <div class="card-tools">
               <input type="text" id="search" placeholder="Search"    name="search-highlight" placeholder="Search" type="text" data-list="#itemContaine2"  style="
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #ffffff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    box-shadow: inset 0 0 0 rgba(0, 0, 0, 0);
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
             
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                     
                      <th style="width: 20%">
                           Name
                      </th>
                      <th style="width: 30%">
                      
                      </th>
                      
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody id="itemContaine2">
                 
                   <?php
                                    $sql = "SELECT * FROM courses order by adid desc";
           $qry = $conn->query($sql);
         $qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
             
               echo '  <tr>
                      
                      <td>
                          <a>
                              '.$row['name'].'
                          </a>
                          <br/>
                          <small>
                              
                          </small>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar" src="../'.$row['image'].'">
                              </li>
                              
                          </ul>
                      </td>
                      
                      
                      <td class="project-actions text-right">
                         
                          <a class="btn btn-info btn-sm" href="edit-course.php?uniqueid='.$row['uniqueid'].'">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                           
                            <input name="delete" type="hidden" value="'.$row['adid'].'">
                
                          <button class="btn btn-danger btn-sm" data-target="#delete'.$row['adid'].'" data-toggle="modal">
                          
                              <i class="fas fa-trash">
                              </i>
                              
                              Delete
                          </button>
                                                      </form>

                      </td>
                  </tr>
                  <div class="modal fade" id="delete'.$row['adid'].'">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete?</h4>
                
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
             
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete Course <b>'.$row['name'].'</b>&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <form method="post" class="del">
                  <input name="page" type="hidden" value="deletec">
                    <input name="id" type="hidden" value="'.$row['uniqueid'].'">
              <button type="submit" class="btn btn-primary">Delete</button>
                       </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>';
               
           }   ?>
                
             
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
include'footer.php';
?>

<!-- page script -->


       <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="plugins/toastr/toastr.min.js"></script>
<script>
						jQuery(document).ready(function(){
                            const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
					
						jQuery(".del").submit(function(e){
                            
                                          
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
      });
    setTimeout(function(){
        window.location.reload();
    }, 2000);
						
										 
                                        
             
									  
									}else
									{
                                       //alert(response);
									
									
									 }
									
                      }
								});
								return false;
							});
									
							
						});							
							
				
						</script>
</body>
</html>
