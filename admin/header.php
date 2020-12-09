<?php
include '../Conn.php';


if(isset($_SESSION['loginas'])){
     
            
                    $sql ="select * from attempt";
                    $qry=$conn->query($sql);
    
    
      if($qry->num_rows>0){
            $sqls = "update attempt set id='".date('Y:m:D')."' where adid='0' or adid='1'";
          if (mysqli_query($conn, $sqls)) {  }
    }else{$sqls = "Insert INTO attempt (id) VALUES ('".date('Y:m:D')."')";if (mysqli_query($conn, $sqls)) {  }}
    if($qry->num_rows>0){
        
    while($row=$qry->fetch_assoc()){
        
    if($_SESSION['loginas']==$row['id']){}else{
    echo '<script>window.location="login.php";</script>';
    }}   }else{echo '<script>window.location="login.php";</script>';}
    
                    
                    
    
}else{
    echo '<script>window.location="login.php";</script>';
}
if(isset($_GET['logout'])){
    if($_GET['logout']==1){
        session_destroy();
    echo '<script>window.location="login.php";</script>';
}}?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">



  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed ">
<div class="wrapper" >
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">Go to website</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
   

    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="../images/logo-2.png" alt="Dash me Discount Logo" class="brand-image img-thumbnail"
           style="opacity: .9 ;margin: 0;margin-right: 10px;">
      <span class="brand-text font-weight-light">Lilovat</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php if(isset($dashboard)){echo $dashboard;}?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
            
          </li>
  <li class="nav-item">
                <a href="users.php" class="nav-link <?php if(isset($users)){echo $users;}?>">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Users
                     <span class="badge badge-info right"><?php
                    $sql ="select * from user";
                    $qry=$conn->query($sql);
                    echo $qry->num_rows;
                    ?></span></p>
                </a>
              </li>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if(isset($products)){echo $products;}?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Products
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"><?php
                    $sql ="select * from products";
                    $qry=$conn->query($sql);
                    echo $qry->num_rows;
                    ?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="create-product.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="products.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View all</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if(isset($courses)){echo $courses;}?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Courses
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"><?php
                    $sql ="select * from courses";
                    $qry=$conn->query($sql);
                    echo $qry->num_rows;
                    ?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="create-course.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="courses.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View all</p>
                </a>
              </li>
            </ul>
          </li>
               <li class="nav-item">
                <a href="orders.php" class="nav-link <?php if(isset($orders)){echo $orders;}?>">
                  <i class="fa fa-shopping-cart nav-icon"></i>
                  <p>Orders
                     <span class="badge badge-info right"><?php
                    $sql ="select * from transaction";
                    $qry=$conn->query($sql);
                    echo $qry->num_rows;
                    ?></span></p>
                </a>
              </li>
          <li class="nav-item">
                <a href="enrolled.php" class="nav-link <?php if(isset($enrolls)){echo $enrolls;}?>">
                  <i class="fa fa-certificate nav-icon"></i>
                  <p>Enrolls
                     <span class="badge badge-info right"><?php
                    $sql ="select * from enrolled";
                    $qry=$conn->query($sql);
                    echo $qry->num_rows;
                    ?></span></p>
                </a>
              </li>
            <li class="nav-item">
                <a href="contact.php" class="nav-link <?php if(isset($contact)){echo $contact;}?>">
                  <i class="fa fa-phone nav-icon"></i>
                  <p>Contact
                     <span class="badge badge-info right"><?php
                    $sql ="select * from contact";
                    $qry=$conn->query($sql);
                    echo $qry->num_rows;
                    ?></span></p>
                </a>
              </li>
          
            
           
              <li class="nav-item">
                <a href="?logout=1" class="nav-link">
                  <i class="fa fa-sign-out-alt nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  
