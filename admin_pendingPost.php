
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

    <link rel="stylesheet" href="assets/css/templatemo-style.css">    
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/w3.css">
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
          <a href="agentList.php">
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
          <a href="admin_pendingPost.php"  class="active">
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

      $sql = "SELECT * FROM property WHERE property_status='P'";
      $stmt= $con->query($sql);
      ?>
      <table id="view">
        <thead>
          <tr>
            <th>id</th>
            <th>title</th>
            <th>location</th>
            <th>agent name</th>
            <th>area</th>
            <th>photo</th>
            <th>floor</th>
            <th>status</th>
            <th>price</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $count=0;
          while ($result= $stmt->fetch()){
            $count++;
              ?>
                <tr>
                  <td><?php echo $count;?></td>
                  <td><?php echo $result['title'];?></td>
                  <td><?php echo $result['location'];?></td>
                  <?php 
                     $agent_id=$result['agent_id'];
                     $sql1 = "SELECT * FROM agent WHERE agent_id=$agent_id";
                     $stmt1= $con->query($sql1);
                     while($result1= $stmt1->fetch()){
                      ?>
                        <td><?php echo $result1['name'];?></td>
                      <?php
                     }
                   ?>
                  
                  <td><?php echo $result['area'];?></td>
                   <td><img style="width: 100px;" src="images/<?php echo $result['photo'];?>"></td>
                  <td><?php echo $result['floor'];?></td>
                  <td><?php echo $result['status'];?></td>
                  <td><?php echo $result['price'];?></td>
                  <td style="width: 200px;">
                    <button onclick="document.getElementById('id<?php echo $result['property_id'];?>').style.display='block'"  style="display: inline; float: left; margin-right: 5px; border: 0.5px solid black; border-radius: 2px; height: 34px; padding: 0 5px; font-size: 13px;">Details</button>

                      <form action="DBconnect.php" method="post" style="display: inline; float: left; margin-right: 5px;">
                        <input type="hidden" name="property_id" value="<?php echo $result['property_id'];?>">
                        <input type="submit" name="acceptProperty" value="Accept" style=" font-size: 13px;">
                      </form>
                      <form action="DBconnect.php" method="post">
                        <input type="hidden" name="property_id" value="<?php echo $result['property_id'];?>">
                        <input type="submit" name="deleteProperty" value="Delete" style="font-size: 13px;">
                      </form>
                  </td>
                </tr>


                <div id='id<?php echo $result['property_id'];?>' class="w3-modal">
                  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:90%; border-radius: 10px;">

                    <div class="w3-center">
                      <span onclick="document.getElementById('id<?php echo $result['property_id'];?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" style="background-color:#24C3F6;height:50px;color:#fff;border-radius:10px;" title="Close Modal">&times;</span>
                    </div>
                    <div id="doctor_details">
                      <div class="row">
                        <div class="col col-md-6" style="margin: 10px;">
                          <img src="images/<?php echo $result['photo'];?>">
                        </div>
                        <div class="col col-md-5" style="margin-left: 10px;">
                          <h4 id="text" style="font-size: 19pt; font-weight: 600; margin-left: 10px;"><?php echo $result['title'];?></h4>
                          <p id="text"><span style="font-weight: 600;">Location:&nbsp;&nbsp;</span><?php echo $result['location'];?></p>
                          <p id="text"><span style="font-weight: 600;">Area:&nbsp;&nbsp;</span> <?php echo $result['area'];?></p>
                          <p id="text"><span style="font-weight: 600;">Floor:&nbsp;&nbsp;</span><?php echo $result['floor'];?></p>
                          <p id="text"><span style="font-weight: 600;">Price:&nbsp;&nbsp;</span><?php echo $result['price'];?>&nbsp;Ks</p>
                        </div>
                      </div>
                      <div class="row" style="padding: 20px;">
                        <p id="text"><?php echo $result['description'];?></p>
                        
                      </div>
                    </div>
                  </div>
                   
                  </div>
                    
                  </div>
                  
                </div>


              

              <?php
          } ?>
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
