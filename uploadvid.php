<?php

session_start();


    $servername="localhost";
    $username="root";
    $password="";
    $dbname="gallery";



$conn=new mysqli($servername,$username,$password,$dbname);

$uid=(int)$_SESSION["uid"];
$target_dir = "videos/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

$name=basename( $_FILES["fileToUpload"]["name"]);


move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
$time = date("d-m-Y")."-".time() ;

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


echo $uid;

$sql = "INSERT INTO  video2 (uid, Name, Type, Quality, length, url,  UploadedAt)  VALUES ($uid,'$Name', '$Type', '$Quality' ,'$endtime' ,'$target_file', '$time')";

if($conn->query($sql)===TRUE) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " couldn't be uploaded.";
    } else {
        
		header("location: video.php");
exit();
    }
}

$conn->close();
?> 
