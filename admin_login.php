<?php 
      $servername="localhost";
      $username="root";
      $password="";
      $dbname="hosteldb";

      $con=new PDO("mysql:host=$servername;port=4306;dbname=$dbname",$username,$password);
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_POST['adminlogin'])){
      $username= $_POST['username'];
      $password= $_POST['password'];
  
      if(($username=='admin') && ($password=='123000')){
        session_start();
        $_SESSION["successful"]="Login successful";
        header('location:admin_dashboard.php');
        
      }
      else{
        echo "<script type='text/javascript'>alert('Login Fail');</script>";
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


  <main id="main container" class="adminlogin">
    <h3 id="title">Admin Login</h3>
    <div id="login" style="width: 30%;
    margin: 0 35%;">

      <form action="admin_login.php" method="post">
        Username: <input type="text" name="username" required="" class="form-control"><br><br>
        Password: <input type="password" name="password" required="" class="form-control"><br><br>
        <input type="submit" name="adminlogin" value="login" class="loginBtn">
        <input type="reset" value="clear" class="loginBtn">
        
      </form>
    </div>

  </main><!-- End #main -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>