<?php session_start(); 
  $agentId=$_SESSION['agentId'];

  $servername="localhost";
          $username="root";
          $password="";
          $dbname="hosteldb";
          $con=new PDO("mysql:host=$servername;port=4306;dbname=$dbname",$username,$password);
          $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> UniAco </title>
    <link href="assets/css/agent-style.css" rel="stylesheet">
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
          $sql1= "SELECT * FROM agent WHERE agent_id=$agentId";
          $stmt1=$con->query($sql1);
          $result1=$stmt1->fetch(PDO::FETCH_OBJ);
         ?>
      <div class="profile-details">
        <span class="admin_name">Hi <?php 
        // echo $result1['name'];
        echo $result1->name; ?></span>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">

        <?php 
          

          $psql="SELECT COUNT(property_id) FROM property WHERE property_status='P' AND agent_id=$agentId";
          $pstmt=$con->query($psql);
          $pcount=$pstmt->fetchColumn();

          $dsql="SELECT COUNT(property_id) FROM property WHERE property_status='D' AND agent_id=$agentId";
          $dstmt=$con->query($dsql);
          $dcount=$dstmt->fetchColumn();

          $rsql="SELECT COUNT(property_id) FROM property WHERE property_status='R' AND agent_id=$agentId";
          $rstmt=$con->query($rsql);
          $rcount=$rstmt->fetchColumn();

          $asql="SELECT COUNT(property_id) FROM property WHERE property_status='A' AND agent_id=$agentId";
          $astmt=$con->query($asql);
          $acount=$astmt->fetchColumn();

          
        ?>

        <div class="box" style="border-left: 4px solid #f6e10a;">
          <div class="right-side">
            <div class="box-topic">Pending Ads</div>
              <div class="number"><?php echo $pcount;?></div>
                <!-- <div class="indicator">
                  <i class='bx bx-up-arrow-alt'></i>
                  <span class="text">Up from yesterday</span>
                </div> -->
              </div>
           
        </div>

        <div class="box" style="border-left: 4px solid #50b707;">
          <div class="right-side">
            <div class="box-topic">Accepted Ads</div>
            <div class="number"><?php echo $acount;?></div>
            <!-- <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div> -->
          </div>
         
        </div>
        <div class="box" style="border-left: 4px solid #0d65f2;">
          <div class="right-side">
            <div class="box-topic">Rented Ads</div>
            <div class="number"><?php echo $rcount;?></div>
            <!-- <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div> -->
          </div>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Deleting Ads</div>
            <div class="number"><?php echo $dcount;?></div>
            <!-- <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
              <span class="text">Down From Today</span>
            </div> -->
          </div>
         
        </div>
      </div>

      <div class="sales-boxes">
        
      </div>
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
