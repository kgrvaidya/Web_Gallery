<?php




    $servername="localhost";
    $username="root";
    $password="";
    $dbname="gallery";



$conn=new mysqli($servername,$username,$password,$dbname);


$name=mysqli_real_escape_string($conn,$_POST["name"]);
$emailid=mysqli_real_escape_string($conn,$_POST["email"]);
$password=mysqli_real_escape_string($conn,$_POST["pswd"]);


$sql= "INSERT INTO  user (Name, Email, Pswd)  VALUES ('$name','$emailid', '$password')";


echo"$sql";
if($conn->query($sql)===TRUE)
{
header("location: index.html");
}
else
{
header("location: index-f.php");
}

$conn->close();
?> 
