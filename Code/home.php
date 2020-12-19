<?php

session_start();
if (isset($_SESSION['email'])) {
   $email=$_SESSION['email'];
}elseif (isset($_SESSION['user_email_address'])) {
    $email=$_SESSION['user_email_address'];
}else{
   header("location: login.php");
}

?>

<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM car_table");

$result2 = mysqli_query($conn,"SELECT * FROM feedback");

$result3 = mysqli_query($conn,"SELECT * FROM car_table group by carCatagory order by COUNT(carCatagory) desc");

$result5 = mysqli_query($conn,"SELECT * FROM car_table group by companyName order by COUNT(companyName) desc");
$result10 = mysqli_query($conn,"SELECT COUNT(*) FROM car_table WHERE status = 'Booked'");

?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>THE RIGHT car</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/owl.carousel.min.css">
     <link rel="stylesheet" href="css/magnific-popup.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/themify-icons.css">
     <link rel="stylesheet" href="css/nice-select.css">
     <link rel="stylesheet" href="css/flaticon.css">
     <link rel="stylesheet" href="css/gijgo.css">
     <link rel="stylesheet" href="css/animate.min.css">
     <link rel="stylesheet" href="css/slicknav.css">

     <link rel="stylesheet" href="css/style.css">

     <link rel="stylesheet" href="css/custom.css">


</head>

<body>


  <!-- header-start -->
  <header>
      <div class="header-area ">
          <div id="sticky-header" class="main-header-area">
              <div class="container-fluid ">
                  <div class="header_bottom_border">
                      <div class="row align-items-center">
                          <div class="col-xl-3 col-lg-2">
                              <div class="logo">

                              </div>
                          </div>
                          <div class="col-xl-6 col-lg-7">
                              <div class="main-menu  d-none d-lg-block">
                                  <nav>
                                      <ul id="navigation">
                                          <li><a href="home.php">home</a></li>
                                          <li><a href="browse_cars.php">Browse Cars</a></li>
                                         <li><a href="policy.php">privacy & policy</a></li>

                                          <li><a href="mypost.php">View my posts</a></li>
                                          <li><a href="contact.html">Contact</a></li>
                                          <li><a  href="post_review.php">List a car</a></li>
                                           <li><a  href="logout.php">Logout</a></li>

                                      </ul>
                                  </nav>
                              </div>
                          </div>

                          <div class="col-12">
                              <div class="mobile_menu d-block d-lg-none"></div>
                          </div>
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </header>
  <!-- header-end -->

  <!-- link that opens popup -->
  <!-- JS here -->

  <script src="js/vendor/modernizr-3.5.0.min.js"></script>
  <script src="js/vendor/jquery-1.12.4.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/imagesloaded.pkgd.min.js"></script>
  <script src="js/scrollIt.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/wow.min.js"></script>

  <script src="js/jquery.slicknav.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/plugins.js"></script>
<script src="js/nice-select.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/main.js"></script>






</html>
