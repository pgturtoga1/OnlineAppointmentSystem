<?php
include('../process/session.php');
if(!isset($_SESSION['login_user'])){
  header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <link href="../assetss/img/2.png" rel="icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<style>
  <style>
.pending{
    color:green;
}
.accepted{
    color:red;
}
.rejected{
    color:yellow;
}
</style>
</style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-red navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
      </li>

      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><p class="fas fa-wrench"></p> Change Password</a>
      </li> -->
      <li class="nav-item d-none d-sm-inline-block">
      <div class="image">
          <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image" style="height: 35px;">
        </div>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../process/logout.php" class="nav-link text-white"><p class="fas fa-sign-out-alt text-white"></p> Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-secondary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../assets/img/2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"> APPOINTMENT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php 
              require("../db_connection/dbconn.php");
              $username = ($_SESSION['login_user']);
              $name=mysqli_query($connection,"SELECT firstname, lastname FROM `admin` WHERE username = '$username'");
              while ($showData = mysqli_fetch_array($name))
              {
              ?>
                <b><?php echo ucwords($showData['firstname'] . " " . $showData['lastname']);?></b>
            <?php }?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="student.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Students
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="client.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Clients
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="calendar.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="schedulesetting.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Edit Appointment
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="report.php" class="nav-link">
              <i class="nav-icon fas fa-bug"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a >Home</a></li>
              <li class="breadcrumb-item text-primary">Dashboard</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <hr>

    <div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
      <img src="../assets/img/evsu.jpg" alt="Simply Easy Learning" width="100%" height="200">
    </div>

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php 
                    $name=mysqli_query($connection,"SELECT office FROM `admin` WHERE username = '$username'");
                    while ($showData = mysqli_fetch_array($name))
                    {
                      $office=$showData['office'];
                    }
                    $name=mysqli_query($connection,"SELECT count(*) FROM `appointmentrequest` where office='$office'");
                    while ($showData = mysqli_fetch_array($name))
                    {
                    ?>                
                <h3 class="text-dark"><?php echo $showData['count(*)'];?></h3>
                  <?php }?>
                <p><b> Total Registered Appointments</b></p>
              </div>
              <div class="icon">
                <i class="fas fa-folder text-dark"></i>
              </div>
              <a href="appointments.php" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                  <?php 
                    $name=mysqli_query($connection,"SELECT office FROM `admin` WHERE username = '$username'");
                    while ($showData = mysqli_fetch_array($name))
                    {
                      $office=$showData['office'];
                    }
                    $name=mysqli_query($connection,"SELECT count(*) FROM `appointmentrequest` where office='$office' and type='1'");
                    while ($showData = mysqli_fetch_array($name))
                    {
                    
                  ?>                
                       <h3 class="text-dark"><?php echo $showData['count(*)'];?><sup style="font-size: 20px"></sup></h3>
                  <?php }?>
              
                <p><b>Student Appointments</b></p>
              </div>
              <div class="icon">
                <i class="fas fa-user text-dark"></i>
              </div>
              <a href="student.php" class="small-box-footer">View Students<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php 
                    $name=mysqli_query($connection,"SELECT office FROM `admin` WHERE username = '$username'");
                    while ($showData = mysqli_fetch_array($name))
                    {
                      $office=$showData['office'];
                    }
                    $name=mysqli_query($connection,"SELECT count(*) FROM `appointmentrequest` where office='$office' and type='2'");
                    while ($showData = mysqli_fetch_array($name))
                    {
                    
                  ?>                
                       <h3 class="text-dark"><?php echo $showData['count(*)'];?><sup style="font-size: 20px"></sup></h3>
                  <?php }?>

                <p class="text-white"><b>Clients</b></p>
              </div>
              <div class="icon">
                <i class="fas fa-users text-dark"></i>
              </div>
              <a href="client.php" class="small-box-footer text-white">View Clients <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php 
                    $name=mysqli_query($connection,"SELECT office FROM `admin` WHERE username = '$username'");
                    while ($showData = mysqli_fetch_array($name))
                    {
                      $office=$showData['office'];
                    }
                    $name=mysqli_query($connection,"SELECT count(*) FROM `appointmentrequest` where office='$office' and date = '10000'");
                    while ($showData = mysqli_fetch_array($name))
                    {
                    
                  ?>                
                       <h3 class="text-dark"><?php echo $showData['count(*)'];?><sup style="font-size: 20px"></sup></h3>
                  <?php }?>

                <p><b>Todays Appointment</b></p>
              </div>
              <div class="icon">
                <i class="fas fa-calendar-alt text-dark"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> 
        </div>
        </div>
      </div>
      </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">   
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of all appointments</h3>
              </div>
              <div class="card-body">
              <table id="table1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><input type="checkbox"></th>
                            <th>Name</th>
                            <th>Appointment</th>
                            <th>Schedule</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th hidden></th>
                            <th hidden></th>
                            <th hidden></th>
                            <th hidden></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $name=mysqli_query($connection,"SELECT office FROM `admin` WHERE username = '$username'");
                    while ($showData = mysqli_fetch_array($name))
                    {
                      $office=$showData['office'];
                     
                    }

                    $selectData = mysqli_query($con, "SELECT * FROM appointmentrequest where office = '$office'");
                    while($showData = mysqli_fetch_array($selectData)){
                   ?> 
                        <tr>
                            <td><input type="checkbox"></td>
                            <td id="name<?php echo $showData['id_appointmentrequest'];?>"><?php echo ucwords($showData['firstname'] . " " . $showData['middlename'] . " " . $showData['lastname']);?></td>
                            <td id="purpose<?php echo $showData['id_appointmentrequest'];?>"><?php echo ucfirst($showData['purpose']);?></td>
                            <td><?php echo date("F d, Y", strtotime($showData ['date']))?><br><?php echo $showData ['starttime']; ?>-<?php echo $showData ['endtime']; ?></td>
                            <td>
                              <?php 
                                if($showData['type']==1){
                                  echo "<p class='text-info'><b>Student</b></p>";
                                }elseif($showData['type']==2){
                                  echo "<p class='text-warning'><b>Client</b></p>";
                                }

                                ?>
                            </td>
                            <center>
                              <td>
                                <?php 
                                if($showData['status']==1){
                                  echo "<span class='badge badge-primary'>PENDING</span>";
                                }elseif($showData['status']==2){
                                  echo "<span class='badge badge-success'>ACCEPTED</span>";
                                }elseif($showData['status']==3){
                                  echo "<span class='badge badge-danger'>REJECTED</span>";
                                }elseif($showData['status']==4){
                                  echo  "<span class='badge badge-secondary'>Cancelled</span>";
                                }
                                ?>
                                <!-- <td id="status<?php echo $showData['id_appointmentrequest'];?>"><small><b><?php echo strtoupper($showData ['status']); ?></b></small></td> -->
                              </td>
                            </center>
                            
                            

                          
                            <td class="d-none" id="contactnumber<?php echo $showData['id_appointmentrequest'];?>"><?php echo $showData ['contactnumber'] ?></td>
                            <td class="d-none" id="email<?php echo $showData['id_appointmentrequest'];?>"><?php echo $showData ['email'] ?></td>
                            <td class="d-none" id="office<?php echo $showData['id_appointmentrequest'];?>"><?php echo $showData ['office'] ?></td>
                            <td class="d-none" id="date<?php echo $showData['id_appointmentrequest'];?>"><?php echo $showData ['date']; ?></td>
                        </tr>
                        <?php } ?> 
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>




<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h4 class="modal-title" id="myModalLabel">View Information</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <div class="form-group input-group">
                      <span class="input-group-addon" style="width:150px;">Name:</span>
                      <input type="text" style="width:350px;" class="form-control" id="name" readonly>
                    </div>
                    <div class="form-group input-group">
                      <span class="input-group-addon" style="width:150px;">Date:</span>
                      <input type="text" style="width:350px;" class="form-control" id="date" readonly>
                    </div>
                    <div class="form-group input-group">
                      <span class="input-group-addon" style="width:150px;">Type:</span>
                      <input type="text" style="width:350px;" class="form-control" id="type" readonly>
                    </div>	
                    <div class="form-group input-group">
                      <span class="input-group-addon" style="width:150px;">Status:</span>
                      <input type="text" style="width:350px;" class="form-control" id="status" readonly>
                    </div>
                    <div class="form-group input-group">
                      <span class="input-group-addon" style="width:150px;">Contact Number:</span>
                      <input type="text" style="width:350px;" class="form-control" id="contactnumber" readonly>
                    </div>		
                    <div class="form-group input-group">
                      <span class="input-group-addon" style="width:150px;">Email:</span>
                      <input type="text" style="width:350px;" class="form-control" id="email" readonly>
                    </div>	
                    <div class="form-group input-group">
                      <span class="input-group-addon" style="width:150px;">Office:</span>
                      <input type="text" style="width:350px;" class="form-control" id="office" readonly>
                    </div>
                    <div class="form-group input-group">
                      <span class="input-group-addon" style="width:150px;">Purpose:</span>
                      <input type="text" style="width:350px;" class="form-control" id="purpose" readonly>
                    </div>				
                  </div>
                  </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button> -->
                    <button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-remove"><span class="glyphicon glyphicon-edit"></span> </i> Cancel</button>
                </div>
            </div>
        </div>
    </div>


  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022-2023 <a href="https://adminlte.io">Online Appointement System For the Diferrent Offices in Eastern Visayas State University</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="dist/jquery.simple-checkbox-table.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- Page specific script -->

<script>
    $(document).ready(function () {
        $('#table1').DataTable();
    });
</script>
<script>
  $(document).ready(function(){
    $("table").simpleCheckboxTable();
  });
</script>

<script>
  $(document).ready(function(){
  $("table").simpleCheckboxTable({
    onCheckedStateChanged: function($checkbox) {
      // Do something
    }
  });
});
</script>

<script>
  $(document).ready(function(){
  $(document).on('click', '.edit', function(){
    var id=$(this).val();
    var name=$('#name'+id).text();
    var date=$('#date'+id).text();
    var type=$('#type'+id).text();
    var status=$('#status'+id).text();
    var contactnumber=$('#contactnumber'+id).text();
    var email=$('#email'+id).text();
    var office=$('#office'+id).text();
    var purpose=$('#purpose'+id).text();

    $('#edit').modal('show');
    $('#name').val(name);
    $('#date').val(date);
    $('#type').val(type);
    $('#status').val(status);
    $('#contactnumber').val(contactnumber);
    $('#email').val(email);
    $('#office').val(office);
    $('#purpose').val(purpose);

  });
});
</script>

</body>
</html>
