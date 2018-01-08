<?php
session_start();



    $servername="localhost";
    $username="root";
    $password="";
    $dbname="gallery";



$conn=new mysqli($servername,$username,$password,$dbname);


$target_dir = "pictures/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

$name=basename( $_FILES["fileToUpload"]["name"]);



$time = date("d-m-Y")."-".time() ;
$bid = mysqli_real_escape_string($conn,$_POST["id"]);
$Name=mysqli_real_escape_string($conn,$_POST["Name"]);
$Latitude=mysqli_real_escape_string($conn,$_POST["Latitude"]);
$Longitude=mysqli_real_escape_string($conn,$_POST["Longitude"]);
$Category=mysqli_real_escape_string($conn,$_POST["Category"]);
$Description=mysqli_real_escape_string($conn,$_POST["Description"]);
$size = filesize($target_file);





		if(!empty($Name))
		{
			
			$sql = "UPDATE image2 SET Name ='$Name' WHERE id = $bid ";
			$conn->query($sql) ;
			echo $sql;
		}
		if(!empty($Latitude))
		{
			$sql = "UPDATE image2 SET Lat ='$Latitude' WHERE id =$bid ";
			$conn->query($sql) ;
			echo $sql;
		}
		if(!empty($Longitude))
		{
			$sql = "UPDATE image2 SET Longi = '$Longitude' WHERE id =$bid ";
			$conn->query($sql) ;
			echo $sql;
		}
		if(!empty($Category))
		{
			$sql = "UPDATE image2 SET Category = '$Category' WHERE id =$bid ";
			$conn->query($sql) ;
			echo $sql;
		}
		if(!empty($Description))
		{
			$sql = "UPDATE image2 SET Description = '$Description' WHERE id =$bid ";
			
			$conn->query($sql) ;
			echo $sql;
		}
	
		if(!empty($_FILES["fileToUpload"]["name"]))
		{
			$sql = "UPDATE image2 SET url = '$target_file' WHERE id = $bid ";
			$conn->query($sql); 
			echo $sql;
			$sql = "UPDATE image2 SET UploadedAt = '$time' WHERE id = $bid ";
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
			$conn->query($sql) ;
			echo $sql;
			$sql2 = "UPDATE image2 SET Size =$size WHERE id = $bid ";
			$conn->query($sql2) ;
			echo $sql;
		}
	
				
		header("location: images.php");
	
		
				
		
		
	 
		


		

$conn->close();
?> 
