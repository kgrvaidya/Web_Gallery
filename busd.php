<!DOCTYPE html>
<html>
<head>

<style>
input[type=text], select {
    width: 22%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}


input[type=submit] {
    width: 8%;
	
    background-color: #333333;
    color: #fff;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	
}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

tr{
  text-align: center;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: lightblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  .header-right {
    float: none;
  }
}

#one{
   
   top:230px;
   left:200px;
   }


  #table {



  }
 
</style>
</head>
 
 <body>
<!--- <div class="header">
  <a href="#default" class="logo">College Bus Management</a>
  <div class="header-right">
    <a class="active" href="#home">Bus Details</a>
    <a href="#contact">Route Details</a>
    <a href="#about">Driver Details</a>
	 <a href="#about">Feedback</a>
  </div>
</div>-->

 
 
 <form id="one" action="a.php" method="post">
 
    <h5> <label for="fname">Bus ID:</label></h5>
    <input type="text" id="fname" name="busno" placeholder="Enter bus number..">
<br>
    <h5><label for="lname">Driver name:</label></h5>
    <input type="text" id="lname" name="driver" placeholder="Enter Driver name">

   <br>

  <h5><label for="lname">Route name:</label></h5>
    <input type="text" id="lname" name="route" placeholder="Enter route name">
	<br>
    <input type="submit" value="Add">
    <h3><a href="service.html" style="color:black;">back</a></h3>
  </form>

  
  <!--<div id="table">
   <table>
   <tr>
   <td>Bus ID </td>
   <td>Driver Name </td>
   <td>Route Name</td>
   </tr>

   </div>-->


<?php 
 
 
 $servername="localhost";
   $username="root";
   $password="";
   $dbname="project2";
   $conn=new mysqli($servername,$username,$password,$dbname);
// $uid=(int)$_SESSION["uid"];
 $sql = "select * from bus_details";
 $result=mysqli_query($conn,$sql);
 ?> 
 
 
 
 <table style="width:100%">
<tr >
  <th></th>
 <th>Bus ID</th>
 <th>Driver Name</th>
 <th>Route Name</th>
</tr>

 
 <?php
 
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){	
  $id = $row["bid"];
	?>
	
	
	<tr >
	<td>

  </td>
  <td>
  <?php printf("%s",$row["bid"]); ?>	</td>
	
  <td>
 <?php printf("%s",$row["dname"]); ?>
 </td>
 
 <td>
 <?php printf("%s",$row["rname"]); ?>
 </td>
 <td>
   <a href="#" value="<?php echo $id; ?>">Select</a>
</td>

 </tr>
 

<?php } 


?>
</table>
<br>
<br>


<form action="deletebusdetails.php" method="post">
  <input type="text" placeholder="bus id" name="id">
  <input type="submit"  value="delete" placeholder="bus id" name="busid">
</form
>


</form>

 </body>
</html>
