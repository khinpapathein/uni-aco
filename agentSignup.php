<?php 

  $servername="localhost";
  $username="root";
  $password="";
  $dbname="hosteldb";
  $con=new PDO("mysql:host=$servername;port=4306;dbname=$dbname",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_POST['agentSignup'])){
      echo "*********************************";
      $name=$_POST['userName'];
      $email=$_POST['email'];
      $password=$_POST['password'];
      $repass=$_POST['retypepassword'];
      $passValid=0;
      if($password==$repass){
        $passValid=1;
      }
      $address=$_POST['address'];
      $agent_status='Active';
      // var_dump($_FILES["image"]);
      $filename = $_FILES["image"]["name"];
      $tempname=$_FILES["image"]["tmp_name"];
      $folder = "images/".$filename;

      $phone=$_POST['phone'];

      $pattern = "/[0-9]{11}/i";
      $test=preg_match($pattern, $phone);

      $description=$_POST['description'];

      $allowedExts=array("jpg","jpeg","gif","png");
        $extension=end(explode(".", $_FILES["image"]["name"]));
        if((($_FILES["image"]["type"] == "image/gif")||($_FILES["image"]["type"] == "image/jpeg")||
        ($_FILES["image"]["type"]=="image/png")||($_FILES["image"]["type"] == "image/pjpeg")) && in_array($extension,$allowedExts) && $test==1 && $passValid==1)
        { 
          if($_FILES["image"]["error"] > 0){
            echo "<script type='text/javascript'>";
            echo "alert('Error image upload file')";
            echo "</script>";
              // header('location: agentSignup.php');
          }
        else{

          $data=[
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'address' => $address,
            'agent_status' =>$agent_status,
            'filename' => $filename,
            'phone' => $phone,
            'description' => $description,

          ];
          $sql = "INSERT INTO agent(name, email, password, address,agent_status, photo, phone, description) VALUES (:name, :email, :password, :address, :agent_status, :filename, :phone, :description)";
          $stmt = $con->prepare($sql);
          $stmt->execute($data);

          if(!file_exists($folder)){
            move_uploaded_file($tempname, $folder);
            }
          echo "<br>------------";
          header('location:agentLogin.php');
        }
      }
      elseif ($passValid==0) {
        echo "<script type='text/javascript'>alert('Password is invalid!');</script>";
      }
      elseif($test==0){
        echo "<script type='text/javascript'>alert('Phone number is invalid!');</script>";
      }
      else{
        echo "<script type='text/javascript'>alert('Error upload file');</script>";
      }
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
  <link href="assets/css/signupStyle.css" rel="stylesheet">

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
            <a class="nav-link" href="about.php">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="property-grid.php">Property</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="agents-grid.php">Agent</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="agentLogin.php">Login</a>
          </li>
        </ul>
      </div>

      <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
        <i class="bi bi-search"></i>
      </button>

    </div>
  </nav><!-- End Header/Navbar -->

  <main id="main" style="margin: 120px 700px;">
    <div id="signup">
      <form action="agentSignup.php" method="post" enctype="multipart/form-data">
        Name: <input type="text" name="userName" required="" class="form-control"><br>
        Email: <input type="text" name="email" required="" class="form-control"><br>
        Password: <input type="password" name="password" required="" class="form-control"><br>
        Retype password: <input type="password" name="retypepassword" required="" class="form-control"><br>
        Address:<textarea cols="20" rows="5" name="address" class="form-control" required=""></textarea><br>
        Phone: <input type="text" name="phone" class="form-control" required=""><br>
        Photo:<input type="file" name="image" class="form-control" required=""><br>
        Description: <textarea cols="20" rows="6" name="description" class="form-control" required=""></textarea><br>
        <input type="submit" name="agentSignup" value="Signup Form">
        
      </form>
    </div>
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