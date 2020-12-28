
<?php

session_start();
if (isset($_SESSION['email'])) {
   $email=$_SESSION['email'];
}elseif (isset($_SESSION['user_email_address'])) {
    $email=$_SESSION['user_email_address'];
}

include_once 'database.php';

$result3 = mysqli_query($conn,"SELECT * FROM car_table WHERE author LIKE '$email'");





?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>My posts</title>
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
    <link rel="stylesheet" type="text/css" href="css/custom.css">

    <link rel="stylesheet" href="css/style.css">


</head>
<body>
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

                                          <li><a href="mypost.php">View my cars</a></li>
                                          <li><a href="contact.html">Contact</a></li>
                                          <li><a  href="post_review.php">List your car</a></li>
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





       <div class="bradcam_area_2 bradcam_bg_2">
        <div class="container">

            <div class="row">
                <div class="col-xl-5">
                    <div class="bradcam_text">

  <h3 style="color: #485460" class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s"> View my cars </h3>
                    </div>
                </div>


            </div>
        </div>
          </div>


  <div class="container-fluid">

        <div class="job_listing_area ">
        <div class="container">

             <div class="job_lists">
                <div class="row" >
                        <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result3)) {
                      $id = $row['carId'];
                                                    $cata = $row['carCatagory'];
                                                    $cname = $row['companyName'];
                                                     $seats = $row['seats'];
                                                      $cost = $row['cost'];
                                                         $address = $row['address'];
                                                         $status = $row['status'];
                                                          $rating = $row['rating'];
                                                          $author = $row['author'];
  $model = $row['model'];

                   echo "<div class='col-lg-11 col-md-12'>
                        <a  href='car_details.php?id=$id'><h4 style='margin-top: 50px;'>$cata</h4></a>
                        <div class='single_jobs white-bg d-flex justify-content-between'>
                            <div class='jobs_left d-flex align-items-center'>";
                                echo '<div class="thumb" >
                                <a href="car_details.php?id='.$row['carId'].'"><img class="card-img-top" src="data:image/png;base64,'.base64_encode($row['picFile']).'" alt="Card image">
                                </div>';
                              echo  "<div class='jobs_conetent'>
                                    <a href='car_details.php?id=$id'><h4>{$cname}</h4></a>
                                    <div class='links_locat d-flex align-items-center'>
                                        <div class='location'>
                                            <p> <i class='fa fa-car'></i><span class='badge badge-secondary'> {$model}</span></p>
                                        </div>

                                        <div class='location'>
                                                    <p> <i class='fa fa-check-circle' aria-hidden='true'></i> Status :<span class='badge badge-warning'>{$status}</span></p>
                                                </div>
                                                <div class='location'>
                                                    <p> <i class='fa fa-user' aria-hidden='true'></i> Posted by :<span class='badge badge-pill'>{$author}</span></p>
                                                </div>
                                                <div class='location'>

                  <form action='del_mypost.php?id=$id' method='post'>

                   <input  class='btn btn-danger' type='submit' name='submit' value='Delete'>
                 </form>

                 <form action='updatepost.php?id=$id' method='post'>

                   <input  class='btn btn-success' type='submit' name='submit' value='Update'>
                 </form>
                                </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>";
                      }

                                    ?>


                </div>
            </div>
        </div>
    </div>

      </div>
    </div>

  </body>





        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/ajax-form.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/scrollIt.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/wow.min.js"></script>
<script src="js/nice-select.min.js"></script>
        <script src="js/jquery.slicknav.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/plugins.js"></script>

        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/main.js"></script>






</html>
car_table
