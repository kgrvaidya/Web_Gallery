<?php
session_start();



    $servername="localhost";
    $username="root";
    $password="";
    $dbname="gallery";



$conn=new mysqli($servername,$username,$password,$dbname);
$id=(int)$_SESSION["uid"];

$target_dir = "musics/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

$name=basename( $_FILES["fileToUpload"]["name"]);



$time = date("d-m-Y")."-".time() ;
$Name=mysqli_real_escape_string($conn,$_POST["Name"]);
$Genre=mysqli_real_escape_string($conn,$_POST["Genre"]);
$Artist=mysqli_real_escape_string($conn,$_POST["Artist"]);
$Album=mysqli_real_escape_string($conn,$_POST["Album"]);
$Year=(int)mysqli_real_escape_string($conn,$_POST["Year"]);
$BitRate=(int)mysqli_real_escape_string($conn,$_POST["BitRate"]);
$bid = mysqli_real_escape_string($conn,$_POST["id"]);




		if(!empty($Name))
		{
			
			$sql = "UPDATE music2 SET Name ='$Name' WHERE id = $bid ";
			$conn->query($sql) ;
			echo $sql;
		}
		if(!empty($Genre))
		{
			$sql = "UPDATE music2 SET Genre ='$Genre' WHERE id =$bid ";
			$conn->query($sql) ;
			echo $sql;
		}
		if(!empty($Artist))
		{
			$sql = "UPDATE music2 SET Artist = '$Artist' WHERE id =$bid ";
			$conn->query($sql) ;
			echo $sql;
		}
		if(!empty($Album))
		{
			$sql = "UPDATE music2 SET Album = '$Album' WHERE id =$bid ";
			$conn->query($sql) ;
			echo $sql;
		}
		if(!empty($Year))
		{
			$sql = "UPDATE music2 SET Year = '$Year' WHERE id =$bid ";
			
			$conn->query($sql) ;
			echo $sql;
		}
		if(!empty($BitRate))
		{
			$sql = "UPDATE music2 SET BitRate = '$BitRate' WHERE id =$bid ";
			
			$conn->query($sql) ;
			echo $sql;
		}
	
		if(!empty($_FILES["fileToUpload"]["name"]))
		{
			$sql = "UPDATE music2 SET url = '$target_file' WHERE id = $bid ";
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
			$conn->query($sql); 
			echo $sql;
			$sql = "UPDATE music2 SET UploadedAt = '$time' WHERE id = $bid ";
			$conn->query($sql) ;
			echo $sql;
			
		}
	
				header("location: Music.php");
		
	
		
				
		
		
	 
		


		

$conn->close();
?> 
