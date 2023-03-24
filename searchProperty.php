<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="hosteldb";

    $con=new PDO("mysql:host=$servername;port=4306;dbname=$dbname",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_POST['search'])){
      $location=$_POST['location'];
      $status=$_POST['status'];
      $miniprice=$_POST['miniprice'];
      $maxprice=$_POST['maxprice'];
    
      
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UniAco</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: EstateAgency - v4.10.0
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  
  
  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.php">Uni<span class="color-b">Aco</span></a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="about.php">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="property-grid.php">Property</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link " href="agents-grid.php">Agent</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="contact.php">Contact</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="agentLogin.php">Login</a>
          </li>
        </ul>
      </div>
      
    </div>
  </nav><!-- End Header/Navbar -->

  <main id="main mt-5">

    

    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid mt-5 pt-5">
      <div class="container mt-5 pt-5">
        <div class="row">
          <?php 

          if($location==null && $status=='BG'){
            $sql="SELECT * FROM property WHERE property_status='A' AND (price>=$miniprice AND price<=$maxprice)";
          }
          elseif($status=='BG'){
            $sql="SELECT * FROM property WHERE property_status='A' AND (price>=$miniprice AND price<=$maxprice) AND location LIKE '%".$location."%'";
          }
          else{
            $sql="SELECT * FROM property WHERE property_status='A' AND status='$status' AND (price>=$miniprice AND price<=$maxprice) AND location LIKE '%".$location."%'";
          }
           $stmt=$con->query($sql);
            while ($result=$stmt->fetch()) {
              ?>
              <div class="col-md-4">
                <div class="card-box-a card-shadow">
                  <div class="img-box-a">
                    <img src="images/<?php echo $result['photo']; ?>" style="height: 400px;" alt="" class="img-a img-fluid">
                  </div>
                  <div class="card-overlay">
                    <div class="card-overlay-a-content">
                      <div class="card-header-a">
                        <h2 class="card-title-a">
                          <a href="#"><?php echo $result['title'] ?></a>
                        </h2>
                      </div>
                      <div class="card-body-a">
                        <div class="price-box d-flex">
                          <span class="price-a">rent | <?php echo $result['price']; ?> Ks</span>
                        </div>
                        <form action="property-single.php" method="post">
                            <input type="hidden" name="property_id" value="<?php echo $result['property_id']; ?>">
                            <button id="details" type="submit" name="property_details">Click here to details
                              <span class="bi bi-chevron-right"></span>
                            </button>
                          </form>
                      </div>
                      <div class="card-footer-a">
                        <ul class="card-info d-flex justify-content-around">
                          <li>
                            <h4 class="card-info-title">Area</h4>
                            <span>
                              <?php echo $result['area']; ?>
                            </span>
                          </li>
                          <li>
                            <h4 class="card-info-title">Status</h4>
                            <span><?php echo $result['status']; ?></span>
                          </li>
                          <li>
                            <h4 class="card-info-title">Floor</h4>
                            <span><?php echo $result['floor']; ?></span>
                          </li>
                          
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
          ?>

          
         
        </div>
      </div>
    </section><!-- End Property Grid Single-->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
  <footer class="mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">Home</a>
              </li>
              <li class="list-inline-item">
                <a href="#">About</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Property</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Blog</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Contact</a>
              </li>
            </ul>
          </nav>
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-linkedin" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">EstateAgency</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
          -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>