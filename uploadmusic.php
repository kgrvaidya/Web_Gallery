<?php

session_start();


    $servername="localhost";
    $username="root";
    $password="";
    $dbname="gallery";



$conn=new mysqli($servername,$username,$password,$dbname);
$uid=(int)$_SESSION["uid"];


$target_dir = "musics/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

$name=basename( $_FILES["fileToUpload"]["name"]);


move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
$time = date("d-m-Y")."-".time() ;
$Name=mysqli_real_escape_string($conn,$_POST["Name"]);
$Genre=mysqli_real_escape_string($conn,$_POST["Genre"]);
$Artist=mysqli_real_escape_string($conn,$_POST["Artist"]);
$Album=mysqli_real_escape_string($conn,$_POST["Album"]);
$Year=(int)mysqli_real_escape_string($conn,$_POST["Year"]);
$BitRate=(int)mysqli_real_escape_string($conn,$_POST["BitRate"]);


$sql= "INSERT INTO  music2 (uid, Name, Genre, Artist, Album, Year, BitRate, UploadedAt,url)  VALUES ($uid, '$Name', '$Genre', '$Artist' , '$Album', $Year, $BitRate, '$time','$target_file')";

if($conn->query($sql)===TRUE) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " couldn't be uploaded.";
    } else {
        
		header("location: Music.php");
exit();
    }
}

$conn->close();
?> 
