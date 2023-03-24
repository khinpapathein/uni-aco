<?php 
  if(isset($_POST['editProperty'])){
      $property_id=$_POST['property_id'];
    }
?>


<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> UniAco </title>
    <link href="assets/css/agent-style.css" rel="stylesheet">
    <script src="assets/js/jquery.min.js"></script>
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
          <a href="agent.php" class="active">
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
          <a href="agent_uploadPost.php">
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
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="hosteldb";

        $con=new PDO("mysql:host=$servername;port=4306;dbname=$dbname",$username,$password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql2= "SELECT * FROM property WHERE property_id=$property_id";
        $stmt2=$con->query($sql2);
        $result2=$stmt2->fetch();

        $agentId=$result2['agent_id'];

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
      

      $sql = "SELECT * FROM property where property_id=$property_id";
      $stmt= $con->query($sql);
      $result= $stmt->fetch();
      // var_dump($result['photo']);
      ?>
        <form action="DBconnect.php" method="post" enctype="multipart/form-data">

          <input type="hidden" name="property_id" value="<?php echo $property_id; ?>">
          Title: <input type="text" name="title" required="" class="form-control" value="<?php echo $result['title'];?>"><br>
          Location: <input type="text" name="location" required="" class="form-control" value="<?php echo $result['location'];?>"><br>

          Area: <input type="text" name="area" required="" class="form-control" value="<?php echo $result['area'];?>"><br>

          Status: <input type="text" name="status" required="" class="form-control" value="<?php echo $result['status'];?>"><br>

          Price: <input type="number" name="price" required="" class="form-control" value="<?php echo $result['price'];?>"><br>

          Description:<textarea cols="20" rows="5" name="description" class="form-control"><?php echo $result['description'];?></textarea><br>

          Floor: <input type="text" name="floor" class="form-control" required value="<?php echo $result['floor'];?>"><br>
         
          <input type="submit" name="update_property" value="Update">
          
        </form>

          

        </tbody>
      </table>




    </div>
  </section>

  <script>
    $(document).ready(function(){
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
