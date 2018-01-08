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


move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
$time = date("d-m-Y")."-".time() ;

$Name=mysqli_real_escape_string($conn,$_POST["Name"]);
$Latitude=mysqli_real_escape_string($conn,$_POST["Latitude"]);
$Longitude=mysqli_real_escape_string($conn,$_POST["Longitude"]);
$Category=mysqli_real_escape_string($conn,$_POST["Category"]);
$Description=mysqli_real_escape_string($conn,$_POST["Description"]);
$size = filesize($target_file);

$uid=(int)$_SESSION["uid"];



$sql= "INSERT INTO  image2 (uid,Name, Lat, Longi, Size, Category, Description, url,  UploadedAt)  VALUES ($uid,'$Name', '$Latitude', '$Longitude' , $size, '$Category', '$Description','$target_file', '$time')";

if($conn->query($sql)===TRUE) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " couldn't be uploaded.";
    } else {
        
		header("location: images.php");
exit();
    }
}

$conn->close();
?> 
