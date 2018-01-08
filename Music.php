<?php
session_start();
if(!      isset($_SESSION["uid"])       )
{
header('Location: index.html');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Web Gallery
		</title>

		<link rel="stylesheet" href="styles.css">
		 <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
	</head>
	
<?php

    $servername="localhost";
    $username="root";
    $password="";
    $dbname="gallery";

	$conn=new mysqli($servername,$username,$password,$dbname);

	$uid=(int)$_SESSION["uid"];
	$sql = "select * from music2 where uid = $uid";
	$result=mysqli_query($conn,$sql);
	
?>
	
	<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}



#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}	

div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 180px;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}


.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}


/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
	padding-right:10px;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}





input[type=text], select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}

/* Style the label to display next to the inputs */
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

/* Style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

/* Style the container */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

/* Floating column for labels: 25% width */
.col-25 {
  float: left;
  width: 20%;
  margin-top: 6px;
}

/* Floating column for inputs: 75% width */
.col-75 {
  float: left;
  width: 80%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

@media (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

</style>

<body>

	<div id="nav1">
		<h1>
		 	<a href="">Web Gallery</a>

		</h1>
				<ul>
					<li><a href="#" class="button" id = "myBtn">Upload</a></li>
					<li><a href="delmusic.php">Delete</a></li>					
		    		<li><a href="">Home</a></li>
		    		<li><a href="logout.php">Logout</a></li>
				</ul>
	</div>
	
	
	<div id="nav2">
		<ul>
			<li><a class="active" href="Music.php">Audio</a></li>
			<li><a href="images.php">Images</a></li>
			<li><a href="Video.php">Video</a></li>
			
		</ul>

	</div>


	<div style="margin-left:15%;padding:5px 16px;"> <!-- Main Division Starts -->
	
	
	
	
	
	
	<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    
	<div class="container">
  <form action="uploadmusic.php" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="Song Name">Song Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="Song Name" name="Name" placeholder="Song name">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Album">Album</label>
      </div>
      <div class="col-75">
        <input type="text" id="Album" name="Album" placeholder="Album">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Genre">Genre</label>
      </div>
      <div class="col-75">
        <select id="country" name="Genre">
          <option value="Classical">Classical</option>
          <option value="Rock">Rock</option>
          <option value="Pop">Pop</option>
		  <option value="Jazz">Jazz</option>
		  <option value="Hiphop">Hiphop</option>
		  <option value="Rap">Rap</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Artist">Artist</label>
      </div>
      <div class="col-75">
        <input type="text" id="artist" name="Artist" placeholder="Artist Name" >
      </div>
    </div>
	<div class="row">
      <div class="col-25">
        <label for="year">Year</label>
      </div>
      <div class="col-75">
        <input type="number" name="Year" placeholder="Choose Year (1970 to 2017)" min="1970" max="2017">
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="BitRate">BitRate</label>
      </div>
      <div class="col-75">
        <select id="BitRate" name="BitRate">
          <option value="320">320</option>
          <option value="128">128</option>
          <option value="64">64</option>
		  </select>
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="File">Choose File</label>
      </div>
      <div class="col-75">
        <input type="file" id="fileToUpload" name="fileToUpload" >
      </div>
    </div>
    <div class="row">	
      <input type="submit" value="Submit" onclick="closeSelf();">
    </div>
  </form>
</div>
	
	
	
	
	
	
  </div>

</div> 
 <!-- Main Division Ends -->

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
	<div align="center">
	 <?php 
	 $resulta=mysqli_query($conn, " CALL no_of_mus($uid) ");
	 $row=mysqli_fetch_array($resulta,MYSQLI_BOTH);
	 echo "The number of Music Files uploaded by you :" . $row[0]; ?>
	</div>
	
	<table id="customers" style="width:100%">
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
</div> 
	

</body> 

<footer id="footer">
   <p>Contact information: <a href="mailto:someone@example.com">
  someone@example.com</a>.</p>
</footer>

</html>
