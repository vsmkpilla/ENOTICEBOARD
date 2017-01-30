<?php
session_start();
$current = $_SESSION['username'];

include 'database_configuration.php';
$cid = $_GET['id'];

$sql = "SELECT * FROM users where userid = '$cid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
        $fullname = $row['fullname'];
        $gender = $row['gender'];
        $address = $row['address'];
        $myusername = $row['username'];
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<title>E-NoticeBoard | UpdateUser </title>
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

textarea {
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
  <ul class="w3-navbar w3-light-grey">
     <li><a href="announcements.php"><b>Notices</b></a></li>
    <li><a href="newuser.php"><b>NewUser</b></a></li>  
     <li><a href="administrator.php"><b>Registerd Users</b></a></li>
    <li><a href="myaccount.php"><b>Account Update</b></a></li>
    <li><a href="users.php"><b>Customize Users</b></a></li>
<li class="w3-right"><a class="w3-green" href="logout.php">Logout (<?php echo"$current"; ?>)</a></li>
  </ul>
  <div class="container">
<h2 align="center" class="w3-light-grey"><b>Update Account - <?php echo"$fullname";?></b></h2>
<form action="update1.php" method="POST">
<table align="center">
<br>
  <p>
 <tr><td> <label>Full Name</label></td>
  <td><input  name="fullname" type="text"  placeholder="Enter Full Name" value="<?php echo"$fullname"; ?>"required></p></td></tr>
  <tr><td>
    <label><b>Gender</b></label></td>
 <td> <input  name="gender" type="text"  placeholder="Enter Gender" value="<?php echo"$gender"; ?>"required></p></td></tr>
<tr><td>
    <label><b>Address</b></label></td>
  <td><input  name="address" type="text"  placeholder="Enter Address" value="<?php echo"$address"; ?>"required></p></td></tr>
<tr><td>
       <label><b>Username</b></label></td>
  <td><input  name="username" type="text"  placeholder="Enter Username" value="<?php echo"$myusername"; ?>"required></p></td></tr>

<input type="hidden" name="id" value="<?php echo"$cid"; ?>">
<tr><td>    <button type="submit" class="w3-btn w3-blue">Update</button></td></tr>
</table>
</form>
