<?php
session_start();



    $servername="localhost";
    $username="root";
    $password="";
    $dbname="gallery";



$conn=new mysqli($servername,$username,$password,$dbname);

$id=(int)$_SESSION["uid"];
$target_dir = "videos/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;


$time = date("d-m-Y")."-".time() ;
$bid = mysqli_real_escape_string($conn,$_POST["id"]);
$Name=mysqli_real_escape_string($conn,$_POST["Name"]);
$Type=mysqli_real_escape_string($conn,$_POST["Type"]);
$Quality=mysqli_real_escape_string($conn,$_POST["Quality"]);

$size = filesize($target_file);


$durasi = getDuration($target_file);
$endtime = date('H:i', strtotime($durasi));
echo $endtime;

function getDuration($file){
include_once("getid3/getid3.php");
$getID3 = new getID3;
$file = $getID3->analyze($file);
return $file['playtime_string'];

}





		if(!empty($Name))
		{
			
			$sql = "UPDATE video2 SET Name ='$Name' WHERE id = $bid ";
			$conn->query($sql) ;
			echo $sql;
		}
		if(!empty($Type))
		{
			$sql = "UPDATE video2 SET Type ='$Type' WHERE id =$bid ";
			$conn->query($sql) ;
			echo $sql;
		}
		if(!empty($Quality))
		{
			$sql = "UPDATE video2 SET Quality = '$Quality' WHERE id =$bid ";
			$conn->query($sql) ;
			echo $sql;
		}
		
		
		
	
		if(!empty($_FILES["fileToUpload"]["name"]))
		{
			$sql = "UPDATE video2 SET url = '$target_file' WHERE id = $bid ";
			$conn->query($sql); 
			echo $sql;
			
			$sql = "UPDATE video2 SET UploadedAt = '$time' WHERE id = $bid ";
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
			$conn->query($sql) ;
			echo $sql;
			
			$sql2 = "UPDATE video2 SET Length ='$endtime' WHERE id = $bid ";
			$conn->query($sql2) ;
			echo $sql2;
		}
	
				
		header("location: Video.php");
	
		
				
		
		
	 
		


		

$conn->close();
?> 
