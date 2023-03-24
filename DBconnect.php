<?php 
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="hosteldb";

	echo "*********************";

	try{

		$con=new PDO("mysql:host=$servername;port=4306;dbname=$dbname",$username,$password);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if($con){
			echo "connected";
		}
		// ----------For User Login------------
		if(isset($_POST['adminlogin'])){
			$username= $_POST['username'];
			$password= $_POST['password'];
			echo "***************";
			if(($username=='admin') && ($password=='123000')){
				header('location:admin_dashboard.php');
				
			}
			else{
				echo "<script type='text/javascript'>alert('Login Fail');</script>";
				header('location: admin_login.php');
			}
			
		}



		// ------------For Admin login-----------
		if(isset($_POST['agentLogin'])){
			$email = $_POST["email"];
			$password = $_POST["password"];

			session_start();
			$sql="SELECT * FROM agent WHERE agent_status='Active'";
			$stmt=$con->query($sql);
			$status=0;
			while($result = $stmt->fetch()){
				if(($email==$result['email']) && ($result['password']==$password)){
					echo "found";
					$status=1;
					$_SESSION['agentId']=$result['agent_id'];

					header('location:agent.php');
					break;
				}
			}
			if($status==0){
				echo "not founded";
				header('location:agentLogin.php');
			}
		}
		// echo $_SESSION['agentId'];

		// ----------For Agent Add Post------------
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
			echo "<br> -----------------------";
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
			echo "<br> --------*****-----------";
			$sql = "INSERT INTO property(title, location, status, area, price, agent_id, floor, photo, property_status, description) VALUES(:title, :location, :status, :area, :price, :agent_id, :floor, :photo, :property_status, :description)";
			$stmt=$con->prepare($sql);
			$stmt->execute($data);

			echo "<br> -----------AA------------";
			if(!file_exists($folder)){
				move_uploaded_file($tempname, $folder);
			}
			header("location:pendingPost.php");
		}

		if(isset($_POST['update_property'])){
			$property_id=$_POST['property_id'];
			$title= $_POST['title'];
			$location = $_POST['location'];
			$status = $_POST['status'];
			$area = $_POST['area'];
			$floor = $_POST['floor'];
			$price =$_POST['price'];
			// $filename = $_FILES['image']['name'];
			$property_status = 'P';
			$description =$_POST['description'];

			// $tempname = $_FILES['image']['tmp_name'];
			// $folder ="images/".$filename;
			echo "<br> -----------------------";
			$data=[
				'property_id' => $property_id,
				'title' => $title,
				'location' => $location,
				'status' =>$status,
				'area' =>$area,
				'floor' =>$floor,
				'price'=>$price,
				'property_status' =>$property_status,
				'description' =>$description,
			];
			echo "<br> --------*****-----------";
			$sql ="UPDATE property SET title=:title, location=:location, status=:status, area=:area, floor=:floor, price=:price, property_status=:property_status, description=:description WHERE property_id=:property_id";
			$stmt=$con->prepare($sql);
			$stmt->execute($data);
			echo "<br> --------*****-----------";
			// if(!file_exists($folder)){
			// 	move_uploaded_file($tempname, $folder);
			// }
			header("location:pendingPost.php");

		}

		if(isset($_POST['deleteProperty'])){
			$property_id=$_POST['property_id'];
			$data=[
				'property_id' =>$property_id,
			];
			$sql="UPDATE property SET property_status='D' WHERE property_id=:property_id";
			$stmt=$con->prepare($sql);
			$stmt->execute($data);
			header("location:pendingPost.php");
		}

		

		if(isset($_POST['deleteAgent'])){
			$agent_id=$_POST['agent_id'];
			$data=[
				'agent_id'=>$agent_id,
			];
			$sql="UPDATE agent SET agent_status='Delete' WHERE agent_id=:agent_id";
			$stmt=$con->prepare($sql);
			$stmt->execute($data);

			$sql1="UPDATE property SET property_status='D' WHERE agent_id=:agent_id";
			$stmt1=$con->prepare($sql1);
			$stmt1->execute($data);

			header('location:agentList.php');
		}

		if(isset($_POST['acceptProperty'])){
			$property_id=$_POST['property_id'];
			$data=[
				'property_id'=>$property_id,
			];
			$sql="UPDATE property SET property_status='A' WHERE property_id=:property_id";
			$stmt=$con->prepare($sql);
			$stmt->execute($data);
			header('location:admin_acceptedPost.php');
		}

		if(isset($_POST['update_acceptedproperty'])){
			$property_id=$_POST['property_id'];
			$title= $_POST['title'];
			$location = $_POST['location'];
			$status = $_POST['status'];
			$area = $_POST['area'];
			$floor = $_POST['floor'];
			$price = $_POST['price'];
			// $filename = $_FILES['image']['name'];
			$description =$_POST['description'];

			// $tempname = $_FILES['image']['tmp_name'];
			// $folder ="images/".$filename;
			echo "<br> -----------------------";
			$data=[
				'property_id' => $property_id,
				'title' => $title,
				'location' => $location,
				'status' =>$status,
				'area' =>$area,
				'floor' =>$floor,
				'price' => $price,
				
				'description' =>$description,
			];
			echo "<br> --------*****-----------";
			$sql ="UPDATE property SET title=:title, location=:location, status=:status, area=:area, floor=:floor, price=:price, description=:description WHERE property_id=:property_id";
			$stmt=$con->prepare($sql);
			$stmt->execute($data);
			echo "<br> --------*****-----------";
			// if(!file_exists($folder)){
			// 	move_uploaded_file($tempname, $folder);
			// }
			header("location:acceptedPost.php");
		}
		if(isset($_POST['update_agent'])){
			$agent_id=$_POST['agent_id'];
			$name=$_POST['name'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$address=$_POST['address'];
			$phone=$_POST['phone'];
			$description=$_POST['description'];

			$data=[
				'agent_id'=>$agent_id,
				'name'=>$name,
				'email'=>$email,
				'password'=>$password,
				'address'=>$address,
				'phone' => $phone,
				'description'=>$description,
			];
			$sql="UPDATE agent SET name=:name, email=:email, password=:password, address=:address, phone=:phone, description=:description WHERE agent_id=:agent_id";
			$stmt=$con->prepare($sql);
			$stmt->execute($data);
			header('location:agentList.php');


		}
		if(isset($_POST['rentProperty'])){
			$property_id=$_POST['property_id'];
			$data=[
				'property_id'=>$property_id,
			];
			$sql="UPDATE property SET property_status='R' WHERE property_id=:property_id";
			$stmt=$con->prepare($sql);
			$stmt->execute($data);
			header('location:acceptedPost.php');
		}

		
	}catch(PDOException $e){

	}

 ?>