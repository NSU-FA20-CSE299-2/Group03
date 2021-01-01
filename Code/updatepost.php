<?php
session_start();
if (isset($_SESSION['email'])) {
   $email=$_SESSION['email'];
}elseif (isset($_SESSION['user_email_address'])) {
    $email=$_SESSION['user_email_address'];
}
$carId = $_GET['id'];
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM car_table where carId = $carId");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>UPDATE CAR</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
                                             <li><a href="browse_car.php">Browse Cars</a></li>
                                            <li><a href="policy.php">privacy & policy</a></li>
                                            <li><a href="mypost.php">View my cars</a></li>

                                             <li><a href="contact.html">Contact</a></li>
                                             <li><a href="post_review.php">List a car</a></li>
                                             <li><a href="logout.php">Logout</a></li>
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
                         <h3>Update Car</h3>


                            <?php
                             include_once 'database.php';
                             $query = "SELECT COUNT( *) as Number
                            FROM car_table";
                             $result6 = mysqli_query($conn,$query);
                             while ($row = $result6->fetch_assoc()) {
                                 $rxx = $row["Number"];

                             }
                             ?>

                             <h3 style="color: #485460" class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s"> <?php echo $rxx;?>+ Cars listed</h3>


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

                          <h4>Update your car</h4>
               <?php
                      $i=0;
                      while($row = mysqli_fetch_array($result)) {
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

                      ?>

                          <form method="post" name = "reviewform" onsubmit="return validateform()" action="updateReview.php?id=<?php echo $row["carId"];?>" >

                              <div class="row">

                                  <div class="col-md-2">

                    <select class="form-control" name="catagory" placeholder="Car Category">
                      <option>Sedan</option>
                      <option>COUPE</option>
                      <option>SPORTS CAR</option>
                      <option>STATION WAGON</option>
                      <option>SUV</option>
                      <option>Minivan</option>
                      <option>Micro</option>
                      <option>Pickup Truck</option>
                      <option>Big Truck</option>
                      <option>Others</option>
                              </select>

                                  </div>



                                  <div class="col-md-4">
                                      <div class="input_field">
                                             <input value='<?php echo $row["companyName"];?>' type="text" name="company_name" placeholder="Company name" onkeypress="return isChar(event)">
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="input_field">
                                              <input value='<?php echo $row["model"];?>' type="text" name="model" placeholder="Car model">
                                      </div>
                                  </div>
                                   <div class="col-md-2">
                                      <div class="input_field">
                                              <input  value='<?php echo $row["seats"];?>' min="0" type="number" name="seats" placeholder="Seats" onkeypress="return isNumber(event)">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="input_field">
                                             <input  value='<?php echo $row["cost"];?>' min="0" type="number" name="cost" placeholder="Cost per day" onkeypress="return isNumber(event)">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="input_field">
                                             <input  value='<?php echo $row["number"];?>' type="number" name="number" placeholder="Phone Number">
                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="input_field">
                                          <input  value='<?php echo $row["address"];?>' type="text" name="address" placeholder="Car location">
                                      </div>
                                  </div>

                                  <div class="col-md-2">

                                        <select class="form-control" name="status" placeholder="Car status">
                                          <option>Available for rent</option>
                                          <option>Booked</option>

                                                  </select>

                                  </div>
                                  <div class="col-md-3">

                                        <select class="form-control" name="rating" placeholder="Car rating">
                                                      <option>Excellent</option>
                                                      <option>Good</option>
                                                      <option>Average</option>
                                                      <option>Bellow Average</option>
                                                      <option>Bad</option>


                                                  </select>


                                  </div>








                                  <div class="col-md-12">
                                      <div class="submit_btn">
                                          <button id="spost"  class="btn btn-outline-success w-100" name = "submit" type="submit">Update Car</button>

                                      </div>
                                  </div>

                              </div>

                          </form>

           </div>
           <?php
                          $i++;
                          }
                          ?>

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

    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
<script src="js/nice-select.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/main.js"></script>
</html>
