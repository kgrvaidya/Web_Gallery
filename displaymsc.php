<?php
session_start();
if(!isset($_SESSION["uid"])       )
{
header('Location: index.html');
}
?><html>
<head> <title> display music </title>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
th {
    text-align: left;
}
</style>
</head>	
<body>
<?php

    $servername="localhost";
    $username="root";
    $password="";
    $dbname="gallery";

	$conn=new mysqli($servername,$username,$password,$dbname);

	
	$sql = "select * from music2";
	$result=mysqli_query($conn,$sql);
	
?> 
<table style="width:100%">
<tr>
<th>Name</th>
<th>Genre</th>
<th>Artist</th>
<th>Album</th>
<th>Year</th>
<th>Song</th>
</tr>

<?php  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){   ?>

<tr>

<td> 
<?php printf("%s ",$row["Name"]);?>
</td> 

<td> 
<?php printf("%s ",$row["Genre"]);?>
</td>

<td> 
<?php printf("%s ",$row["Artist"]);?>
</td>

<td> 
<?php printf("%s ",$row["Album"]);?>
</td>

<td> 
<?php printf("%s ",$row["Year"]);?>
</td>

<td> 
<audio controls>
<source src="<?php printf("%s ",$row["url"]);?>" type="audio/mpeg"> 
</audio> </td></tr>
<?php

}

?>
</table>
</body>
</html>