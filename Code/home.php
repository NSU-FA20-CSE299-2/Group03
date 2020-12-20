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

  <!-- slider_area_start -->
  <div class="slider_area">
      <div class="single_slider  d-flex align-items-center slider_bg_1">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-lg-7 col-md-6">
                      <div class="slider_text">

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
                          <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s"><?php echo $rxx;?>+ Cars listed</h5>
                        <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">  <?php echo $st;?>+ Cars booked</h5>
                           <p>logged in as <br><?php echo $email;?></p>
                          <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Book Now an Affordable Car With Excellent Value For Money</h3>

                          <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                              <a href="browse_cars.php" class="boxed-btn3">View all Cars</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

  </div>
  <!-- slider_area_end -->
  <div class="container">
      <br />
      <br />
      <br />
      <h2 align="center">Search</h2><br />
      <div class="form-group">
        <div class="input-group">
          <input type="text" name="search_text" id="search_text" placeholder="Search by Company Details" class="form-control" />
        </div>
      </div>
      <br />
      <div id="result"></div>
    </div>
    <div style="clear:both"></div>
    <br />

    <br />
    <br />
    <br />

    <!-- popular_catagory_area_start  -->
    <div class="popular_catagory_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title mb-40">
                        <h3>Popolar Categories</h3>
                    </div>
                </div>
            </div>

            <div class="row">
      <?php
          $i=0;
          while($row = mysqli_fetch_array($result3)) {
          ?>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="browse_cars.php"><h4><?php echo $row["carCatagory"]; $jc = $row["carCatagory"]; ?></h4></a>

              <?php
              include_once 'database.php';
              $query = "SELECT COUNT(carCatagory) FROM car_table where `carCatagory` ='$jc'";
              $result4 = mysqli_query($conn,$query);
              while ($row = $result4->fetch_assoc()) {
                $rx = $row["COUNT(carCatagory)"];

              }
              ?>

                        <p> <span><?php echo $rx;?></span> Available Cars</p>
                    </div>
                </div>
                 <?php
            $i++;
            }
            ?>
            </div>

        </div>
    </div>
    <!-- popular_catagory_area_end  -->

    <div class="job_listing_area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section_title">
                            <h3>Cars Listing</h3>
                        </div>
                    </div>

                </div>
                <div class="job_lists">
                    <div class="row" >
                            <?php
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                             $id = $row['carId'];
                               $cata = $row['carCatagory'];
                               $cname = $row['companyName'];
                                $seats = $row['seats'];    $cost = $row['cost'];
                                    $address = $row['address'];
                                    $status = $row['status'];
                                     $rating = $row['rating'];
                                     $author = $row['author'];
                                     $model = $row['model'];




                                     echo '<div class="col-lg-11 col-md-12">
                              <a href="car_details.php?id='.$row['carId'].'"><h4 style="margin-top: 50px;">'.$row['model'].'</h4></a>
                                          <div class="single_jobs white-bg d-flex justify-content-between">
                                              <div class="jobs_left d-flex align-items-center">
                                                  <div class="thumb" >
                                                  <a href="car_details.php?id='.$row['carId'].'"><img class="card-img-top" src="data:image/png;base64,'.base64_encode($row['picFile']).'" alt="Card image">
                                                  </div>
                                                  <div class="card-body">

                                                  </div>
                                                  <div class="jobs_conetent">
                                                  <a href="car_details.php?id='.$row['carId'].'"><h4>'.$row['companyName'].'</h4></a>
                                                      <div class="links_locat d-flex align-items-center">
                                                          <div class="location">
                                                              <p> <i class="fa fa-map-marker"></i><span class="badge badge-secondary"> '.$row['address'].'</span></p>
                                                          </div>

                                                          <div class="location">
                                                                      <p> <i class="fa fa-star" aria-hidden="true"></i> Rating :<span class="badge badge-warning">'.$row['rating'].'</span></p>
                                                                  </div>
                                                                  <div class="location">
                                                                      <p> <i class="fa fa-user" aria-hidden="true"></i> Posted by :<span class="badge badge-pill">'.$row['author'].'</span></p>
                                                                  </div>
                                                                  <div class="location">
                                                                   <a href="car_details.php?id='.$row['carId'].'" class="btn btn-success">Book Now</a>

                                                  </div>
                                                      </div>
                                                  </div>
                                              </div>

                                          </div>
                                      </div>';
                                        }

                                                      ?>


                    </div>
                </div>
            </div>
        </div>



        <div class="top_companies_area">
            <div class="container">
                <div class="row align-items-center mb-40">
                    <div class="col-lg-6 col-md-6">
                        <div class="section_title">
                            <h3>Top cars</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="brouse_job text-right">
                            <a href="browse_cars.php" class="boxed-btn4">Browse More cars</a>
                        </div>
                    </div>
                </div>
                <div class="row"><?php
    					$i=0;
    					while($row = mysqli_fetch_array($result5)) {
    						$cn = $row["companyName"];
    					?>
                    <div class="col-lg-4 col-xl-3 col-md-6">



                        <div class="single_company">
                            <div class="thumb">
                                <img src="img/svg_icon/5.svg" alt="">
                            </div>


    						<?php
    							include_once 'database.php';
    							$query = "SELECT COUNT(carCatagory) FROM car_table where `companyName` ='$cn'";
    							$result4 = mysqli_query($conn,$query);
    							while ($row = $result4->fetch_assoc()) {
    								$rx = $row["COUNT(carCatagory)"];

    							}
    							?>


                            <a href="browse_cars.php"><h3><?php echo $cn?></h3></a>
                            <p> <span><?php echo $rx;?></span> Available cars</p>
                        </div>


                    </div>
    				<?php
    						$i++;
    						}
    						?>
                </div>
            </div>
        </div>


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
