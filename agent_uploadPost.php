<?php session_start(); 
  $agentId=$_SESSION['agentId'];
  
   $servername="localhost";
      $username="root";
      $password="";
      $dbname="hosteldb";

      $con=new PDO("mysql:host=$servername;port=4306;dbname=$dbname",$username,$password);
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if (isset($_POST['agentAddPost'])) {
      $title = $_POST['title'];
      $location = $_POST['location'];
      $status = $_POST['status'];
      $area = $_POST['area'];
      $price = $_POST['price'];
      $agent_id = $_POST['agent_id'];
      $floor = $_POST['floor'];
      $filename = $_FILES['image']['name'];
      $property_status = 'P';
      $description = $_POST['description'];
      
      
      $tempname = $_FILES['image']['tmp_name'];
      $folder ="images/".$filename;
      // echo "<br> -----------------------";

      $allowedExts=array("jpg","jpeg","gif","png");
      $extension=end(explode(".", $_FILES["image"]["name"]));
        if((($_FILES["image"]["type"] == "image/gif")||($_FILES["image"]["type"] == "image/jpeg")||
        ($_FILES["image"]["type"]=="image/png")||($_FILES["image"]["type"] == "image/pjpeg")) && in_array($extension,$allowedExts))
        { 
          if($_FILES["image"]["error"] > 0){
            echo "<script type='text/javascript'>";
            echo "alert('Error image upload file')";
            echo "</script>";
              // header('location: agentSignup.php');
          }
          else{

            $data=[
              'title' => $title,
              'location' => $location,
              'status' =>$status,
              'area' =>$area,
              'price' => $price,
              'agent_id' =>$agent_id,
              'floor' =>$floor,
              'photo' =>$filename,
              'property_status' =>$property_status,
              'description' =>$description,
            ];
          // echo "<br> --------*****-----------";
              $sql = "INSERT INTO property(title, location, status, area, price, agent_id, floor, photo, property_status, description) VALUES(:title, :location, :status, :area, :price, :agent_id, :floor, :photo, :property_status, :description)";
              $stmt=$con->prepare($sql);
              $stmt->execute($data);

              echo "<br> -----------AA------------";
              if(!file_exists($folder)){
                move_uploaded_file($tempname, $folder);
              }
              header("location:pendingPost.php");
            }
      }
        else{
        echo "<script type='text/javascript'>alert('Error upload file');</script>";
      }
    }
?>


<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> UniAco </title>
    <link href="assets/css/agent-style.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">UniAco</span>
    </div>
      <ul class="nav-links">

        <li>
          <a href="agent.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="acceptedPost.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Accepted Posts</span>
          </a>
        </li>
        <li>
          <a href="pendingPost.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Pending Posts</span>
          </a>
        </li>
        <li>
          <a href="rentedPost.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Rented Posts</span>
          </a>
        </li>
        <li>
          <a href="agent_uploadPost.php" class="active">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Add Post</span>
          </a>
        </li>

        <li class="log_out">
          <a href="index.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      
      <?php 
          $sql1= "SELECT * FROM agent WHERE agent_id=$agentId";
          $stmt1=$con->query($sql1);
          $result1=$stmt1->fetch();
         ?>
      <div class="profile-details">
        <span class="admin_name">Hi <?php echo $result1['name']; ?></span>
      </div>
    </nav>

    <div class="home-content">
    <?php
      // echo $agentId;
     ?>
      <form action="agent_uploadPost.php" method="post" enctype="multipart/form-data">

        <input type="hidden" name="agent_id" value="<?php echo $agentId; ?>">
        Title: <input type="text" name="title" required="" class="form-control"><br>
        Location: <input type="text" name="location" required="" class="form-control"><br>

        Area: <input type="text" name="area" required="" class="form-control"><br>
        Status: 
        <select name="status" style="width: 100%; height: 35px; border-radius: 5px;">
          <option selected="" disabled="">Select</option>
          <option value="Boy">Boy</option>
          <option value="Girl">Girl</option>
        </select><br>
        <br>
        Price: <input type="number" name="price" class="form-control" placeholder="Kyats" required><br>
        Description:<textarea cols="20" rows="5" name="description" class="form-control"></textarea><br>

        Floor: 
        <select name="floor" style="width: 100%; height: 35px; border-radius: 5px;">
          <option selected="" disabled="">Select</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
        </select><br>
        <br>
        Photo:<input type="file" name="image" class="form-control" required><br>
        <input type="hidden" name="property-status" value="0">
        <input type="submit" name="agentAddPost" value="Upload" style="background: #88c79a; border-radius: 5px; border: none;">
        
      </form>

      <br><br>
    </div>
  </section>

  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if(sidebar.classList.contains("active")){
      sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
      sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
 </script>

</body>
</html>
