<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Online Appointment System</title>
      <link rel="stylesheet" href="assetss/homepage/css/bootstrap.min.css">
      <link rel="stylesheet" href="assetss/homepage/css/style.css">
      <link rel="stylesheet" href="assetss/homepage/css/responsive.css">
      <link rel="icon" href="assetss/homepage/images/fevicon.png" type="image/gif" />
      <link rel="stylesheet" href="assetss/homepage/css/jquery.mCustomScrollbar.min.css">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link href="assetss/img/2.png" rel="icon">
    
   </head>

   <style>
      .img1{
 
  border: 2px solid WHITE;
  padding: 0px; 
  
}
   </style>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="assetss/homepage/images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo text-white text-bold">
                              <a href="index.html"><img src="assets/img/2.png" alt="#" width="50px;" height="50px;"/></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="index.html"> Home  </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.html">About Us</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="furnitures.html">Contact Us</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="testimonial.html">Developers</a>
                              </li>
                              
                              <li class="nav-item d_none">
                                 <a class="nav-link" href="#"><i class="fa fa-user-circle padd_right" aria-hidden="true"></i>Login/Register</a>
                              </li>
                              <li class="nav-item d_none">
                                 <a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      
      <section class="banner_main">
         <div id="banner1" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#banner1" data-slide-to="0" class="active"></li>
               <li data-target="#banner1" data-slide-to="1"></li>
               <li data-target="#banner1" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container-fluid">
                     <div class="carousel-caption">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="text-bg">
                                 <center><img src="assets/img/2.png" alt="#" width="200px;" height="200px;"/></center>
                                 <span><center>EVSU APPOINTMENT SYSTEM</center> </span>
                                 <center><p class="text-dark"><i class="fa fa-solid fa-arrow-down"></i><b class="text-dark">Please click or tap the appropriate button.</b> </p></center>
                                 <center><a href="appointee/login.php" class="bg-primary"><b>Student</b></a> <a href="appointee/login1.php" class="bg-success"><b>Client</b> </a><a href="staff/login.php" class="bg-warning"><b>ADMINISTRATOR</b></a></center>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="text_img">
                                 <img class="img1" src="assetss/img/qr.png" alt="#" width="500px;" height="500px;"/>
                                 <h1><b>Please scan this Qr-Code to be redireted to registration form.</b></h1>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               
            </div>
         </div>
      </section>
<!-- 
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Type:</h5>
      </div>
      <div class="modal-body">
         <center> <a href="appointee/login.php"><button type="button" class="btn btn-danger"><b>Student</b></button></a>
        <a href="appointee/login1.php"><button type="button" class="btn btn-primary"><b>Client</b></button></a></center>
         
       
      </div>
     
    </div>
  </div>
</div> -->
      
      <!--  footer -->
      <footer id="contact">
         <div class="footer">
               <div class="container">
                  <div class="row">
                     <hr class="text-white">
                     <div class="col-md-12">
                        <p><strong>Copyright &copy; 2022-2023 <a href="#" class="text-primary">Eastern Visayas State University Online Appointement System .</strong></p>
                     </div>
                  </div>
               </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="assetss/homepage/js/jquery.min.js"></script>
      <script src="assetss/homepage/js/popper.min.js"></script>
      <script src="assetss/homepage/js/bootstrap.bundle.min.js"></script>
      <script src="assetss/homepage/js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="assetss/homepage/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="assetss/homepage/js/custom.js"></script>
   </body>
</html>