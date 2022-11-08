<?php
include('../process/session.php');
if(!isset($_SESSION['login_user'])){
  header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Calendar</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/main.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="../assetss/img/2.png" rel="icon">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-red navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
      </li>
      
    </ul>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
      <div class="image">
          <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image" style="height: 35px;">
        </div>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link text-white"><p class="fas fa-sign-out-alt text-white"></p> Logout</a>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-secondary elevation-4">
    <a href="../index3.html" class="brand-link">
      <img src="../assets/img/2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">APPOINTMENT</span>
    </a>

    <div class="sidebar">
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
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
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
            <a href="calendar.php" class="nav-link active">
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
          <!-- <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Calendar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a>Home</a></li>
              <li class="breadcrumb-item text-primary">Calendar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-1">
            <div class="sticky-top mb-3">
              <div class="card">
                  <div id="external-events"></div>
              </div>
              <!-- <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><p class="fas fa-calendar"> &nbsp; Calendar Legend</p></h3>
                </div>
                <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <ul class="fc-color-picker" id="color-chooser">
                      <p></p>
                      <li><a class="text-primary" href="#"><i class="fas fa-square"></i>Reserved</a></li>
                      <br>
                      <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a>Done Transaction</li>
                    </ul>
                  </div>
                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                    <div class="input-group-append">
                      <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                    </div>          
                  </div>                
                </div>
              </div> -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-10">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2022-2023 <a href="#">Online Appointement System For the Diferrent Offices in Eastern Visayas State University</a>.</strong>
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
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/fullcalendar/main.js"></script>

<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: [
        <?php
          $name=mysqli_query($connection,"SELECT office FROM `admin` WHERE username = '$username'");
          while ($showData = mysqli_fetch_array($name))
          {
            $office=$showData['office'];
           
          }
          $query = mysqli_query($connection, "SELECT * FROM `appointmentrequest` where office='$office'");
          while($c = mysqli_fetch_array($query))
          {
            $fname = $c['firstname'];
            $lname = $c['lastname'];
            $office = $c['office'];
            $date = date("Y, m, d,", strtotime($c['date'] . '-1 months'));
            $conv_stime  = date("H, i", strtotime($c['starttime']));
            $date_stime = $date . " " . $conv_stime;
            $conv_etime = date("H, i", strtotime($c['endtime']));
            $date_etime = $date . " " . $conv_etime;
          ?>
            {
              title          : '<?php echo $fname . " " . $lname?>',
              start          : new Date(<?php echo $date_stime?>),
              end            : new Date(<?php echo $date_etime?>),
              backgroundColor: '#f39c12', 
              borderColor    : '#f39c12' 
            },
          <?php }?>
            
        // {
        //   title          : 'All Day Event',
        //   start          : new Date(y, m, 1),
        //   backgroundColor: '#f56954', 
        //   borderColor    : '#f56954', 
        //   allDay         : true
        // },
        // {
        //   title          : 'Long Event',
        //   start          : new Date(y, m, d - 5),
        //   end            : new Date(y, m, d - 2),
        //   backgroundColor: '#f39c12', 
        //   borderColor    : '#f39c12' 
        // },
        // {
        //   title          : 'Meeting',
        //   start          : new Date(y, m, d, 10, 30),
        //   allDay         : false,
        //   backgroundColor: '#0073b7',
        //   borderColor    : '#0073b7' 
        // },
        // {
        //   title          : 'Lunch',
        //   start          : new Date(y, m, d, 12, 0),
        //   end            : new Date(y, m, d, 14, 0),
        //   allDay         : false,
        //   backgroundColor: '#00c0ef', 
        //   borderColor    : '#00c0ef' 
        // },
        // {
        //   title          : 'Birthday Party',
        //   start          : new Date(y, m, d + 1, 19, 0),
        //   end            : new Date(y, m, d + 1, 22, 30),
        //   allDay         : false,
        //   backgroundColor: '#00a65a',
        //   borderColor    : '#00a65a' 
        // },
        // {
        //   title          : 'Click for Google',
        //   start          : new Date(y, m, 28),
        //   end            : new Date(y, m, 29),
        //   url            : 'https://www.google.com/',
        //   backgroundColor: '#3c8dbc', 
        //   borderColor    : '#3c8dbc' 
        // },
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
</body>
</html>
