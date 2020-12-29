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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Post a car</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/owl.carousel.min.css">
     <link rel="stylesheet" href="css/magnific-popup.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/themify-icons.css">
     <link rel="stylesheet" href="css/nice-select.css">
     <link rel="stylesheet" href="css/flaticon.css">
     <link rel="stylesheet" href="css/animate.min.css">
     <link rel="stylesheet" href="css/slicknav.css">

     <link rel="stylesheet" href="css/style.css">

     <link rel="stylesheet" href="css/custom.css">



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


                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                        <a href="logout.php">Log out</a>
                                    </div>
                                    <div class="d-none d-lg-block">
                                        <a class="boxed-btn3" href="post_review.php">List a car</a>
                                    </div>
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
                         <h3>Post A Car</h3>


                            <?php
                             include_once 'database.php';
                             $query = "SELECT COUNT( *) as Number
                            FROM car_table";
                             $result6 = mysqli_query($conn,$query);
                             while ($row = $result6->fetch_assoc()) {
                                 $rxx = $row["Number"];

                             }
                             ?>

                             <?php
                 include_once 'database.php';
                 $query = "SELECT COUNT(*) as NUM FROM car_table WHERE status = 'Booked'";
                 $result10 = mysqli_query($conn,$query);
                 while ($row = $result10->fetch_assoc()) {
                   $st = $row["NUM"];

                 }
                 ?>

                             <h3 style="color: #485460" class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s"> <?php echo $rxx;?>+ Cars listed</h3>
<h3 style="color: #485460" class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s"> <?php echo $st;?>+ Cars booked</h3>

                     </div>
                 </div>

                 <div class="col-xl-6 d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">

       			 <img class="wave3 wow shake" data-wow-duration="1s" data-wow-delay=".2s" src="img/3.svg">

       					 </div>


             </div>
         </div>
           </div>



         <div class="review_details_area">
        <div class="container">
          <div class="review_form white-bg">
  <img class="wave" src="img/7.svg">

                        <h4>List your car</h4>
                        <form method="post" name = "reviewform" onsubmit="return validateform()" action="postReview.php" enctype="multipart/form-data" >
                            <div class="row">

                                <div class="col-md-2">









                                  <div class="input_field">

                                    <input type="file" name="picFile">
                                      </div>

                                <div class="col-md-12">
                                    <div class="submit_btn">
                                        <button id="spost"  class="btn btn-outline-success w-100" name = "submit" type="submit">Save Car</button>

                                    </div>
                                </div>

                            </div>

                        </form>

</div>

                    </div>

        </div>
      </div>
    </div>

  </body>


    </script>

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
