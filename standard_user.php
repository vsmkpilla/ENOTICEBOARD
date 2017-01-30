<?php
session_start();
$current = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<title>TITLE | ID Registartion</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style/w3.css">
<link rel="stylesheet" href="style/bootstrap.min.css">
<link rel="icon" href="images/icon.png">
<link rel="stylesheet" href="jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="jquery-1.12.4.js"></script>
  <script src="jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
 
<style>
input[type=text], input[type=password] , input[type=number]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
</style>
<body background="homeimg/logbg.jpg">
<div class="w3-container w3-blue">
   <center> <h1 ><b>E-NOTICEBOARD</b></h1>
  <p>..</p></div>
  <ul class="w3-navbar w3-light-grey">
    <li><a href="standard_user.php".php"><b>FullRegistration</b></a></li>
<li class="w3-right"><a class="w3-green" href="logout.php">Logout (<?php echo"$current"; ?>)</a></li>
  </ul>
  <div class="container">
<h2 align="center" class="w3-light-grey"><b>FULL Registration</b></h2>
<marquee direction="left">By Full Registration Only you can Go Forward</marquee>

<form action="addsim.php" method="POST" enctype="multipart/form-data" name="addroom">
<table align="center">
<tr><td>
 
<tr><td>
 <label><b>First Name</b></label></td>
 <td>    <input type="text" placeholder="Enter First Name" name="fname" required></td></tr>
<tr><td>
    <label><b>Middle Name</b></label></td>
    <td><input type="text" placeholder="Enter Middle Name" name="mname" required></td></tr>
<tr><td>
    <label><b>Last Name</b></label></td>
   <td> <input type="text" placeholder="Enter Last Name" name="lname" required></td></tr>
<tr><td>
    <label><b>Gender</b></label></td>
    <td><select name="gender" required><option>Male</option><option>Female</option></select></td></tr>
<tr><td>
    <label><b>Address</b></label></td>
    <td><input type="text" placeholder="Enter Address" name="address" required></td></tr>
<tr><td>
<label><b>Birthday</b></label></td>
<td><input type="text" id="datepicker" name="bday" placeholder="11/03/2016" required></td></tr>
<tr><td>
    <label><b>Phone Number</b></label></td>
    <td><input type="number" placeholder="EX:9999999999" name="phonenumber" required></td></tr>

<tr><td>
    <label><b>Image</b></label></td>
   <td><input type="file" name="image" required></td></tr>
<br>
   <tr><td> <button type="submit" class="w3-btn w3-blue">Register</button></td></tr>
   </table>
<br><br>
<?php
  
?>
   
