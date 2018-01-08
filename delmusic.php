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
	
	<style>
	

	
	table {
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 2px solid #1A124A;
    padding: 8px;
	
}

	
	
th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #548CB2;
    color: white;
}
tr:hover {background-color: #ddd; }	







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
li a.active {
    background-color: #1684bb;;
color: white;}
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

</style>

<body>

	<div id="nav1">
		<h1>
		 	<a href="">Web Gallery</a>

		</h1>
				<ul>
		    		<li><a href="">Home</a></li>
		    		<li><a href="logout.php">Logout</a></li>
				</ul>
	</div>
	
	
	<div id="nav2">
		<ul>
			<li><a class="active"href="Music.php">Audio</a></li>
			<li><a href="images.php">Images</a></li>
			<li><a href="Video.php">Video</a></li>
			
		</ul>

	</div>


	<div style="margin-left:15%;margin-bottom:30px;padding:5px 16px;"> <!-- Main Division Starts -->
	
	
	
	
	 <?php 
 
 
  $servername="localhost";
    $username="root";
    $password="";
    $dbname="gallery";

	$conn=new mysqli($servername,$username,$password,$dbname);

	$uid=(int)$_SESSION["uid"];
	$sql = "select * from music2 where uid=$uid";
	$result=mysqli_query($conn,$sql);

	?> 
	
	<form action ="" method="post">
	
	<table>
	<th></th>
	<th>Name</th>
	<th>Genre</th>
	<th>Artist</th>
	<th>Album</th>
	<th>Year</th>
	
	
	<?php
	
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){	
	$id = $row["id"];

	?>
	
	
	<tr>
	<td>
	<input type="radio" name="pid" value="<?php echo $id; ?>" checked="true">
	</td>
	
	<td>
	<div class="desc"><?php printf("%s",$row["Name"]);?></div>
	</td>
	
	<td>
	<?php printf("%s",$row["Genre"]); ?>
	</td>
	
	<td>
	<div class="desc"><?php printf("%s",$row["Artist"]); ?></div>
	</td>
	<td>
	<div class="desc"><?php printf("%s",$row["Album"]);?></div>
	</td>
	<td>
	<?php printf("%s",$row["Year"]); ?>
	</td>
	
	</tr>
  

<?php } ?>
</table>
<button type="submit" class="button" name="Delete" formaction="delete3.php">Delete</button>
<a href="#" class="button" id = "myBtn">Update</a>
	</form>
	
	
	
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    
	<div class="container">
  <form action="updatemsc.php" method="POST" enctype="multipart/form-data">
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
			<option></option>
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
		<option></option>
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
	<input type="hidden" name="id" value="<?php echo $id; ?>">
  </form>
</div>
	
	
	
	
	
	
  </div>

</div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
	
	
</div> <!-- 15% margin portion ends here with this <div> -->
	
<!-- PHP Block Starts HERE-->
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
	
	

</body>

<footer id="footer">
   <p>Contact information: <a href="mailto:someone@example.com">
  someone@example.com</a>.</p>
</footer>
</html>
