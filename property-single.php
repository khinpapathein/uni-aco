<?php 
  if(isset($_POST['property_details'])){
    $propertyId=$_POST['property_id'];
    echo $propertyId;
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
</head>

<body>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>

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

  <main id="main">

      <?php 
          $servername="localhost";
          $username="root";
          $password="";
          $dbname="hosteldb";

          try{
            $con=new PDO("mysql:host=$servername;port=4306;dbname=$dbname",$username,$password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            
            ?>


        <!-- ======= Intro Single ======= -->
        <section class="intro-single">
          <div class="container">
            <?php 
              $sql="SELECT * FROM property WHERE property_id=$propertyId";
              $stmt=$con->query($sql);
              $result=$stmt->fetch();
            ?>

            <div class="row">
              <div class="col-md-12 col-lg-8">
                <div class="title-single-box">
                  <h1 class="title-single"><?php echo $result['title']; ?></h1>
                  <span class="color-text-a"><?php echo $result['location'] ?></span>
                </div>
              </div>
              <div class="col-md-12 col-lg-4">
                <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="property-grid.php">Properties</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      <?php echo $result['title']; ?>
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section><!-- End Intro Single-->

        <!-- ======= Property Single ======= -->
        <section class="property-single nav-arrow-b">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <div id="property-single-carousel" class="swiper">
                  <div class="swiper-wrapper">
                    <div class="carousel-item-b swiper-slide">
                      <img style="width: 100%;" src="images/<?php echo $result['photo']; ?>" alt="">
                    </div>
                  </div>
                </div>
                <div class="property-single-carousel-pagination carousel-pagination"></div>
              </div>
            </div>

            <div class="row my-4 mt-5">
              <div class="col-sm-12">

                <div class="row justify-content-between">
                  <div class="col-md-5 col-lg-4">
                    
                    <div class="property-summary">
                      <div class="row">
                      </div>
                      <div class="summary-list mt-5 pt-5">
                        <ul class="list">
                          <li class="d-flex justify-content-between">
                            <strong>Location:</strong>
                            <span><?php echo $result['location']; ?></span>
                          </li>
                          
                          <li class="d-flex justify-content-between">
                            <strong>Status:</strong>
                            <span><?php echo $result['status']; ?></span>
                          </li>
                          <li class="d-flex justify-content-between">
                            <strong>Area:</strong>
                            <span>
                              <?php echo $result['area']; ?>
                            </span>
                          </li>
                          <li class="d-flex justify-content-between">
                            <strong>Floor</strong>
                            <span><?php echo $result['floor']; ?></span>
                          </li>
                          <li class="d-flex justify-content-between">
                            <strong>Price</strong>
                            <span><?php echo $result['price']; ?>&nbsp;Ks</span>
                          </li>
                      
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-7 col-lg-7 section-md-t3">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="title-box-d">
                          <h3 class="title-d">Property Description</h3>
                        </div>
                      </div>
                    </div>
                    <div class="property-description">
                      <p class="description color-text-a">
                       <?php echo $result['description']; ?>
                      </p>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 pt-5 mt-5">
                <div class="row section-t3">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Contact Agent</h3>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <?php
                  $agentId=$result['agent_id'] ;
                    $sql1="SELECT * FROM agent WHERE agent_id=$agentId";
                    $stmt1=$con->query($sql1);
                    $result1=$stmt1->fetch();
                   ?>
                  <div class="col-md-6 col-lg-5 px-5">
                    <img src="images/<?php echo $result1['photo']; ?>" style="height: 300px;" alt="" class="img-fluid">
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="property-agent">
                      <h4 class="title-agent"><?php echo $result1['name'] ?></h4>
                      <p class="color-text-a">
                        <?php echo $result1['description']; ?>
                      </p>
                      <ul class="list-unstyled">
                        <li class="d-flex justify-content-between">
                          <strong>Phone:</strong>
                          <span class="color-text-a"><?php echo $result1['phone']; ?></span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Email:</strong>
                          <span class="color-text-a"><?php echo $result1['email']; ?></span>
                        </li>
                        
                      </ul>
                      <div class="socials-a mt-5">
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section><!-- End Property Single-->


      <?php
                
        }catch(PDOException $e){

        }

      ?>

  <!-- ======= Footer ======= -->
 
               
  </main><!-- End #main -->
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