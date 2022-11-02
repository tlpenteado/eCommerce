<?php

include 'connect.php';

$g="SELECT * FROM `products` WHERE 1";
$qg= mysqli_query($con, $g);
$h=mysqli_fetch_assoc($qg);


if(isset($_POST['Cadastrar'])){
  $pcode=$_POST['product_code'];
  $pname=$_POST['product_name'];
  $pdesc=$_POST['product_desc'];
  $pimg=$_POST['product_img_name'];
  $pqty=$_POST['qty'];
  $pprice=$_POST['price'];


  if($pcode == null || $pname == null || $pdesc == null || $pimg == null || $pqty == null || $pprice == null){
      echo "<script language='javascript' type='text/javascript'>
      alert('Algum dado não foi preenchido');window.location
      .href='indexreg.php';</script>";    
  }else{
      $i="insert into products (product_code, product_name, product_desc, product_img_name, qty, price) values ('$pcode', '$pname', '$pdesc', '$pimg', '$qty', '$pprice')";
      mysqli_query($con, $i);
      echo "<script language='javascript' type='text/javascript'>
      alert('Cadastrado com sucesso');window.location
      .href='index.php';</script>";  
      header ('location:index.php');
  }

}

if(isset($_POST['Alterar'])){
  $pcode=$_POST['product_code'];
  $pname=$_POST['product_name'];
  $pdesc=$_POST['product_desc'];
  $pimg=$_POST['product_img_name'];
  $pqty=$_POST['qty'];
  $pprice=$_POST['price'];

  if($pname == null || $pcode == null){
    echo "<script language='javascript' type='text/javascript'>
    alert('Algum dado não foi preenchido');window.location
    .href='index.php';</script>";    
  }else{
    $i="UPDATE `products` SET `product_name` = '$pname' WHERE `products`.`product_code` = '$pcode'";
    mysqli_query($con, $i);
    echo "<script language='javascript' type='text/javascript'>
    alert('Cadastrado com sucesso');window.location
    .href='index.php';</script>";  
    header ('location:index.php');
}

}

if(isset($_POST['Excluir'])){
  $pcode=$_POST['product_code'];
  $pname=$_POST['product_name'];
  $pdesc=$_POST['product_desc'];
  $pimg=$_POST['product_img_name'];
  $pqty=$_POST['qty'];
  $pprice=$_POST['price'];

  if($pcode== null){
      echo "<script language='javascript' type='text/javascript'>
      alert('Algum dado não foi preenchido');window.location
      .href='indexexc.php';</script>";    
  }else{
      $i="DELETE FROM `products` WHERE `products`.`product_code` = '$pcode'";
      mysqli_query($con, $i);
      echo "<script language='javascript' type='text/javascript'>
      alert('Excluido com sucesso');window.location
      .href='index.php';</script>";  
      header ('location:index.php');
  }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Alterar Produtos</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

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
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <span class="brand-text font-weight-light">GATE Sneakers</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>
              Voltar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="indexreg.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              <strong>Cadastrar Produtos</strong>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="indexalt.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              <strong>Alterar Produtos</strong>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="indexexc.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              <strong>Excluir Produtos</strong>
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


    <!-- Main content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

            <div class="row align-items-center">
          <div class="col">
            <div class="d-flex justify-content-center" style="padding-top: 30px;">
            <br>
            <br>
            <br>            
            
           
            <br>
            <br>
            <div class="d-flex justify-content-center" style="padding-top: 30px;">
             <h1 class="m-0">Alterar Produto</h1>
            <form style="width: 500px;" method="POST" enctype="multipart/form-data">
            <br>
            <br>
            <br>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Código do Produto</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="product_code">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Novo nome do Produto</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="product_name">
                  </div>
                  <br>
                  <input type="submit" class="btn btn-primary" id="Alterar" value="Alterar" name="Alterar"></input> 
                  <br>              
             </form>
            </div>
          </div>
          </div>
          
          
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>

  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
