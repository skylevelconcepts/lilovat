<title>Admin - Enrols</title>
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<?php

$enrolls = 'active';
include 'header.php';
if (isset($_GET['delete'])) {
  $delete = $_GET['delete'];


  if (mysqli_query($conn, $sql)) {
  }
}
if (isset($_GET['user'])) {
  $userid = $_GET['user'];

  $us = 'where userid =' . $userid;
} else {
  $us = '';
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Enrolls</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Enrolls</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Enrolls</h3>


          </div>
          <div class="card-body ">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>

                  <th>
                    #Name
                  </th>
                  <th>
                    Email | Phone
                  </th>
                  <th>
                    Location
                  </th>

                  <th>

                  </th>

                </tr>
              </thead>
              <tbody id="itemContaine2">





                <?php




                $sq = "SELECT * FROM training " . $us . 'order by adid desc ';
                $qr = $conn->query($sq);
                if ($qr->num_rows > 0) {
                  while ($row = $qr->fetch_assoc()) {
                    $name = $row['name'];
                    $email = $row['email'];
                    $location = $row['location'];
                    $phone = $row['phone'];





                    echo '  <tr>
                      
                      <td>' . $name . '
                      </td>';

                    echo '<td>' . $email . ' | ' . $phone . '</td>';
                    echo '<td>' . $location . '</td>';
                    echo '<td class="project-actions text-right">
                         
                          
                           
                           
                
                          <button class="btn btn-danger btn-sm" data-target="#delete' . $row['adid'] . '" data-toggle="modal">
                          
                              <i class="fas fa-trash">
                              </i>
                              
                              
                          </button>
                                                      

                      </td>
                  </tr>
                  <div class="modal fade" id="delete' . $row['adid'] . '">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete?</h4>
                
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
             
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete this &hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <form method="post" class="del">
                  <input name="page" type="hidden" value="del">
                    <input name="id" type="hidden" value="' . $row['adid'] . '">
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
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>

<!-- page script -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->

<!-- page script -->
<script>
  jQuery(document).ready(function() {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    jQuery(".del").submit(function(e) {


      e.preventDefault();
      var formData = jQuery(this).serialize();

      $.ajax({
        type: "POST",
        url: "../process.php",
        data: formData,
        success: function(response) {
          if (response == 'True') {
            //alert(response);


            window.location.reload();




          } else {
            // alert(response);

          }

        }
      });
      return false;
    });


  });
</script>