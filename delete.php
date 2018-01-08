<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "gallery";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		$bid = mysqli_real_escape_string($conn,$_POST["id"]);
		
		
		$sql = "DELETE FROM image2 WHERE id = $bid";
		echo $bid;
		$conn->query($sql) ;
		header("location: images.php"); 
		$conn->close();
?>