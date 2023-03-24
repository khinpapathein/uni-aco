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
              <input type="text" name="location" class="form-control form-control-lg form-control-a" placeholder="enter location">
            </div>
          </div>

          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="bathrooms">Status</label>
              <select class="form-control form-select form-control-a" name="status" id="bathrooms" required="">
                <option selected="" value="BG">Any</option>
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
  </div><!-- End Property Search Section -->

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
            <a class="nav-link active" href="index.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="about.php">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="property-grid.php">Property</a>
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

      <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
        <i class="bi bi-search"></i>
      </button>

    </div>
  </nav><!-- End Header/Navbar -->

  <!-- ======= Intro Section ======= -->
  <div class="intro intro-carousel swiper position-relative">

    <div class="swiper-wrapper">

      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide-1.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <h1 class="intro-title mb-4 ">
                      <span class="color-b">find </span> your best
                      <br>choice
                    </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="property-grid.php"><span class="price-a">Properties</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide-2.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <h1 class="intro-title mb-4">
                      <span class="color-b">find </span> your best
                      <br>choice
                    </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="property-grid.php"><span class="price-a">Properties</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide-3.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <h1 class="intro-title mb-4">
                      <span class="color-b">find </span> your best
                      <br>choice
                    </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="property-grid.php"><span class="price-a">Properties</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper-pagination"></div>
  </div><!-- End Intro Section -->

  <main id="main">

    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Properties</h2>
              </div>
              <div class="title-link">
                <a href="property-grid.php">All Property
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div id="property-carousel" class="swiper">
          <div class="swiper-wrapper">

            <?php 
              $servername="localhost";
              $username="root";
              $password="";
              $dbname="hosteldb";

        
                $con=new PDO("mysql:host=$servername;port=4306;dbname=$dbname",$username,$password);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                $sql="SELECT * FROM property WHERE property_status='A'";
                $stmt=$con->query($sql);
                
                while($result=$stmt->fetch()){
                  ?>
                  <div class="carousel-item-b swiper-slide">
                    <div class="card-box-a card-shadow">
                      <div class="img-box-a">
                        <img src="images/<?php echo $result['photo'];?>" style="height: 350px;" alt="" class="img-a img-fluid">
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
                              <span class="price-a">rent | <?php echo $result['price']; ?></span>
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
                  </div><!-- End carousel item -->
            <?php
                }
            ?>

            

            
          </div>
        </div>
        
    </section><!-- End Latest Properties Section -->

    <!-- ======= Agents Section ======= -->
    <section class="section-agents section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Best Agents</h2>
              </div>
              <div class="title-link">
                <a href="agents-grid.php">All Agents
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <?php 
            $sql1="SELECT * FROM agent";
            $stmt1=$con->query($sql1);
            $count=1;
            while($result1=$stmt1->fetch()){
             if($count>3){
              break;
             }
          ?>
          <div class="col-md-4">
            <div class="card-box-d">
              <div class="card-img-d">
                <img src="images/<?php echo $result1['photo']; ?>" style="height: 400px; width: 100%;" alt="" class="img-d img-fluid">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h3 class="title-d">
                      <form action="agent-single.php" method="post">
                        <input type="hidden" name="agent_id" value="<?php echo $result1['agent_id'];?>">
                        <button id="detail" type="submit" name="agent_details" class="link-two"><?php echo $result1['name']; ?></button>
                      </form>
                      
                    </h3>
                  </div>
                </div>
                <div class="card-body-d">
                  <p class="content-d color-text-a">
                    <?php echo $result1['description']; ?>
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Phone: </strong><?php echo $result1['phone'] ?>
                    </p>
                    <p>
                      <strong>Email: </strong><?php echo $result1['email'] ?>
                    </p>
                  </div>
                </div>
                <div class="card-footer-d">
                  <div class="socials-footer d-flex justify-content-center">
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
         $count++;
       }
         ?>
        </div>
      </div>
    </section><!-- End Agents Section -->


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