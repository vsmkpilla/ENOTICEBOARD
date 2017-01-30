<!DOCTYPE html>
<html>
<title>ADITYA | User Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style/w3.css">
<link rel="stylesheet" href="style/bootstrap.min.css">
<link rel="icon" href="images/icon.png">
<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
<script type="text/javascript">
$(function(){

           


});
</script>
<style>
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

</style>
<body background="homeimg/logbg.jpg">
<div class="w3-container  w3-panel">
 <center><a href="index.php"><button type="button" name="register" class="w3-btn-bar w3-blue"> <h1><strong>ADITYA</strong></h1></button></a>
  <h3><font color=" #382F2B"><strong>E-Notice Board</strong></font></h3>
</div>

<center>
<h4><b><font color="green">Welcome to ADITYA'S Diploma <strong>E-NOTICEBOARD</strong></font></b></h4>

<form action="login.php" method="POST">
  <div class="imgcontainer">
  
  </div>
</center>
  <div class="container">

<?php
  error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST['submit'])) {
include 'database_configuration.php';

$myuser = $_POST['username'];
$mypass = $_POST['password'];
$s="select * from registration where username='$myuser'";
$sql = "SELECT * FROM users where username='$myuser' and password='$mypass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $role = $row['role'];
if ($role == "Admin") {
setcookie(loggedin, date("F jS - g:i a"), $seconds);
session_start();
$_SESSION['username'] = $myuser;
header("location:announcements.php?user=$myuser");
}
else if($s['username']==$myuser){
	setcookie(loggedin, date("F jS - g:i a"), $seconds);
session_start();
$_SESSION['username'] = $myuser;
	header("location:viewannouncements.php?user=$myuser");
}
 else {
setcookie(loggedin, date("F jS - g:i a"), $seconds);
session_start();
$_SESSION['username'] = $myuser;
header("location:standard_user.php?user=$myuser");
}
    }
} else {
    print '
  <div class="w3-panel w3-green">
    <h3>Error!</h3>
    <p>You Are Not a User.</p>
  </div>
';
}
$conn->close();

}
?> <table align="center">
 <tr>
    <td><b>Username</b></td>
    <td><input type="text" placeholder="Enter Username" name="username" required></td></tr>
<tr>
    <td><b>Password</b></td>
    <td><input  type="password" size="12" placeholder="Enter Password" name="password" required></td></tr>
    <br>    
    <tr><td><button type="submit" name="submit" class="w3-btn-group w3-blue">LOG IN</button></td>
     <td><a href="reg.php"><button type="button" name="register" class="w3-btn-group w3-blue">Register</button></a></td></tr>
     </table>

</form>
  

