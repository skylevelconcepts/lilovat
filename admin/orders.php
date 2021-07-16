<title>Admin - Orders</title>
<?php

$orders='active';
include 'header.php';
if(isset($_GET['delete'])){
    $delete =$_GET['delete'];
 
                     
                 if (mysqli_query($conn, $sql)) {
                                  
                              }}
    if(isset($_GET['user'])){
    $userid =$_GET['user'];
 
                     $us='where userid ='.$userid;
                
               
}else{
        $us='';
    }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

 <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Orders</h3>

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
                     
                      <th >
                           #Order No
                      </th>
                      <th >
                      Status
                      </th>
                      
                      <th >
                          
                      </th>
                      
                  </tr>
              </thead>
              <tbody id="itemContaine2">
                 
                  
                  
                  
                  
                   <?php
           
                  
    
            
               $sq = "SELECT * FROM transaction ".$us.'order by adid desc ';
           $qr = $conn->query($sq);
                                if ($qr -> num_rows >0){
                                    while($row = $qr->fetch_assoc()){
                               if($row['status']=='processing'){
                   $status='<span class="badge badge-info">Processing</span>';
               }else if($row['status']=='processing'){
                   $status='<span class="badge badge-success">Success</span>';
               }else{
                           $status='<span class="badge badge-info">Processing</span>';        
           }     
                                    
               
                                    
                                 echo '  <tr>
                      
                      <td>
                          <a href="order.php?id='.$row['orderno'].'">
                              #'.$row['orderno'].'
                          </a>
                          <br/>
                          <small>
                              '.$row['date'].' | ₦'.$row['total'].' 
                          </small>
                      </td>
                      
                      
                        <td class="project-state">
                          '.$status.'
                      </td>
                      <td class="project-actions text-right">
                         
                          <a class="btn btn-info btn-sm" href="order.php?id='.$row['orderno'].'">
                              <i class="fas fa-television-alt">
                              </i>
                              View
                          </a>
                           
                            <input name="delete" type="hidden" value="'.$row['adid'].'">
                
                          <button class="btn btn-danger btn-sm" data-target="#delete'.$row['adid'].'" data-toggle="modal">
                          
                              <i class="fas fa-trash">
                              </i>
                              
                              
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
              <p>Are you sure you want to delete Product <b>'.$row['orderno'].'</b>&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <form method="post" class="del">
                  <input name="page" type="hidden" value="deleteo">
                    <input name="id" type="hidden" value="'.$row['adid'].'">
              <button type="submit" class="btn btn-primary">Delete</button>
                       </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>';   
                                    
                               
           
                                    }
                                }
              
               
              ?>
                
             
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


<script>
						jQuery(document).ready(function(){
                            
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
									
							
						window.location.reload();
										 
                                        
             
									  
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
<script  src="../js/jquery.hideseek.min.js"></script>
<script>
    $('#search').hideseek({
  highlight: true,
    nodata: 'No results found',
        
});
    
    
   
    
 
  </script>
</body>
</html>
