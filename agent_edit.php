<?php 
  if(isset($_POST['editAgent'])){
      $agent_id=$_POST['agent_id'];
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
          <a href="admin_dashboard.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="agentList.php" class="active">
            <i class='bx bx-box' ></i>
            <span class="links_name">Agent Lists</span>
          </a>
        </li>
        <li>
          <a href="admin_acceptedPost.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Accepted Posts</span>
          </a>
        </li>
        <li>
          <a href="admin_pendingPost.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Pending Posts</span>
          </a>
        </li>
        <li>
          <a href="admin_rentedPost.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Rented Posts</span>
          </a>
        </li>
        

        <li class="log_out">
          <a href="admin_login.php">
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
      
      <div class="profile-details">
        <span class="admin_name">Admin</span>
      </div>
    </nav>

    <div class="home-content">
    <?php
      $servername="localhost";
      $username="root";
      $password="";
      $dbname="hosteldb";

      $con=new PDO("mysql:host=$servername;port=4306;dbname=$dbname",$username,$password);
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "SELECT * FROM agent where agent_id=$agent_id";
      $stmt= $con->query($sql);
      $result= $stmt->fetch();
      ?>
        <form action="DBconnect.php" method="post" enctype="multipart/form-data">

          <input type="hidden" name="agent_id" value="<?php echo $agent_id; ?>">
          Name: <input type="text" name="name" required="" class="form-control" value="<?php echo $result['name'];?>"><br>
          Email: <input type="email" name="email" required="" class="form-control" value="<?php echo $result['email'];?>"><br>

          Password: <input type="text" name="password" required="" class="form-control" value="<?php echo $result['password'];?>"><br>

          Address: <input type="text" name="address" required="" class="form-control" value="<?php echo $result['address'];?>"><br>
          
          Phone: <input type="text" name="phone" class="form-control" required value="<?php echo $result['phone'];?>"><br>

          Description:<textarea cols="20" rows="5" name="description" class="form-control"><?php echo $result['description'];?></textarea><br>

          <input type="submit" name="update_agent" value="Update">
          
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
