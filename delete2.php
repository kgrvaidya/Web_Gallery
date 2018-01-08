<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "gallery";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		$bid = mysqli_real_escape_string($conn,$_POST["pid"]);
		
		
		$sql = "DELETE FROM video2 WHERE id = $bid";
		
		$conn->query($sql) ;
		header("location: Video.php"); 
		$conn->close();
?>