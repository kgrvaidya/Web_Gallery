<?php


    $servername="localhost";
    $username="root";
    $password="";
    $dbname="gallery";



$conn=new mysqli($servername,$username,$password,$dbname);


$email=mysqli_real_escape_string($conn,$_POST["Uname"]);
$password=mysqli_real_escape_string($conn,$_POST["Pswd"]);


$sql= "select * from user where Email='$email' and Pswd='$password'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$uid=(int)$row[0];

if(mysqli_num_rows($result)==1)
{

session_start();

$_SESSION["uid"]=$uid;

header("location: Music.php");
exit();
}
else
{
header("location: index-f.php");
exit();
}
?>