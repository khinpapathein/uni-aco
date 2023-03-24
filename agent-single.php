<?php 
if(isset($_POST['agent_details'])){

  $agentId=$_POST['agent_id'];
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

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed bi bi-x"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a" action="searchProperty.php" method="post">
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label class="pb-2" for="Type">Location</label>
              <input type="text" name="location" class="form-control form-control-lg form-control-a" placeholder="enter location" required="">
            </div>
          </div>

          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="bathrooms">Status</label>
              <select class="form-control form-select form-control-a" name="status" id="bathrooms" required="">
                <option selected="" value="Boy">Any</option>
                <option value="Boy">Boy</option>
                <option value="Girl">Girl</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="price">Min Price</label>
              <select class="form-control form-select form-control-a" name="miniprice" id="price" required="">
                <option selected value="10000">Unlimite</option>
                <option value="30000">30,000 Ks</option>
                <option value="40000">40,000 Ks</option>
                <option value="50000">50,000 Ks</option>
                <option value="60000">60,000 Ks</option>
                <option value="70000">70,000 Ks</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="price">Max Price</label>
              <select class="form-control form-select form-control-a" name="maxprice" id="price" required="">
                <option selected="" value="500000">Unlimite</option>
                <option value="50000">50,000 Ks</option>
                <option value="50000">60,000 Ks</option>
                <option value="70000">70,000 Ks</option>
                <option value="50000">80,000 Ks</option>
                <option value="50000">90,000 Ks</option>
                <option value="100000">100,000 Ks</option>
                <option value="50000">150,000 Ks</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" name="search" class="btn btn-b">Search Property</button>
          </div>
        </div>
      </form>
    </div>
  </div><!-- End Property Search Section -->>

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
            <a class="nav-link " href="property-grid.php">Property</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="agents-grid.php">Agent</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="contact.php">Contact</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="agentLogin.php">Login</a>
          </li>
        </ul>
      </div>

      <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
        <i class="bi bi-search"></i>
      </button>

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
    
                $sql="SELECT * FROM agent WHERE agent_id=$agentId";
                $stmt=$con->query($sql);
                $result=$stmt->fetch();

                
                ?>

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"><?php echo $result['name']; ?></h1>
              <span class="color-text-a"><?php echo $result['address']; ?></span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="agent-grid.php">Agents</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?php echo $result['name']; ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single -->

    <!-- ======= Agent Single ======= -->
    <section class="agent-single">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-4">
                <div class="agent-avatar-box">
                  <img src="images/<?php echo $result['photo'];?>" alt="" class="agent-avatar img-fluid" style="height: 500px; width: 100%;">
                </div>
              </div>
              <div class="col-md-5 section-md-t3">
                <div class="agent-info-box">
                
                  <div class="agent-content mb-3">
                    <p class="content-d color-text-a">
                      <?php echo $result['description']; ?>
                    </p>
                    <div class="info-agents color-a">
                      <p>
                        <strong>Phone: </strong>
                        <span class="color-text-a"> <?php echo $result['phone']; ?> </span>
                      </p>
                      <p>
                        <strong>Email: </strong>
                        <span class="color-text-a"> <?php echo $result['email']; ?></span>
                      </p>
                    </div>
                  </div>
                  <div class="socials-footer">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-linkedin" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
  
              $sql1="SELECT * FROM property WHERE agent_id=$agentId AND property_status='A'";
              $stmt1=$con->query($sql1);
              $count=0;
              while( $result1=$stmt1->fetch()){
                $count++;
              }
            ?>

          <div class="col-md-12 section-t8">
            <div class="title-box-d">
              <h3 class="title-d">My Properties (<?php echo $count;?>)</h3>
            </div>
          </div>
          <div class="row property-grid grid">

            <?php 
              $sql2="SELECT * FROM property WHERE agent_id=$agentId AND property_status='A'";
              $stmt2=$con->query($sql2);
              while($result2=$stmt2->fetch()){
                ?>
                <div class="col-md-4">
                  <div class="card-box-a card-shadow">
                    <div class="img-box-a">
                      <img src="images/<?php echo $result2['photo']; ?>" alt="" class="img-a img-fluid" style="height: 450px;">
                    </div>
                    <div class="card-overlay">
                      <div class="card-overlay-a-content">
                        <div class="card-header-a">
                          <h2 class="card-title-a">
                            <a href="#"><?php echo $result2['title'];?></a>
                          </h2>
                        </div>
                        <div class="card-body-a">
                          <div class="price-box d-flex">
                            <span class="price-a">rent | <?php echo $result2['price']; ?> Ks</span>
                          </div>
                          <form action="property-single.php" method="post">
                            <input type="hidden" name="property_id" value="<?php echo $result2['property_id']; ?>">
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
                                <?php echo $result2['area']; ?>
                              </span>
                            </li>
                            <li>
                              <h4 class="card-info-title">Status</h4>
                              <span><?php echo $result2['status']; ?></span>
                            </li>
                            <li>
                              <h4 class="card-info-title">Floor</h4>
                              <span><?php echo $result2['floor']; ?></span>
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
      </div>
    </section><!-- End Agent Single -->

    <?php
                
              }catch(PDOException $e){

              }

            ?>

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