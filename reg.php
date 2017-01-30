

<!DOCTYPE html>
<html>
<title>TITLE | New User</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style/w3.css">
<link rel="stylesheet" href="style/bootstrap.min.css">
<link rel="icon" href="images/icon.png">
<style>
input[type=text], input[type=password] {
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

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
 
}
</style>
<body background="homeimg/logbg.jpg">
<div class="w3-container w3-blue">
  <center> <h1>E-NOTICEBOARD</h1>
  <p>..</p>
</div>
  <ul class="w3-navbar"> 

  <div class="container">
<h2 class="w3-light-grey" align="center" ><b>Register New User</b></h2>

<?php
if(isset($_POST['submit'])) {
$fullname = $_POST['fullname'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$myusername = $_POST['username'];
$role = $_POST['role'];

include 'database_configuration.php';

$sql = "INSERT INTO users (fullname, gender, address, username, role)
VALUES ('$fullname', '$gender', '$address', '$myusername', '$role')";

if ($conn->query($sql) === TRUE) {
 print '
  <div class="w3-panel w3-green">
    <h3>Success!</h3>
    <p>New user has been registered...the default password is set to <font color="black" size="4">123456</font></p>
  </div>
';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>
<form method="POST">
<br>
<table align="center">
  <p>
  <tr><td><label>Full Name</label></td>
  <td><input  name="fullname" type="text"  placeholder="Enter Full Name" required></p></td></tr>

  <p>
  <tr><td>
  <label>Gender</label></td>
  <td><select  name="gender"  required><option>Male</option><option>Female</option></select></p></td></tr>
 <tr><td>
<label>Address</label></td>
  <td><input  name="address" type="text" name="address" placeholder="Enter Address" required></p></td></tr>
 <tr><td>
<label>Username</label></td>
  <td><input  name="username" type="text"  placeholder="Enter Username" required></p></td></tr>
<tr>
 <p>
  <td><label>Role</label></td>
  <td><select name="role"  required><option>Standard user</option></select></td></tr>
<tr><td><button type="submit" name="submit" class="w3-btn w3-blue">Register</button></td>
<td><a href="index.php"><button type="button" name="login" class="w3-btn w3-blue">LogIn</button></a></td></tr>
</table>
</form>
   
<br><br>
<?php
  
?>
   
