<?php
session_start();
$current = $_SESSION['username'];
$id = $_GET['id'];
include 'database_configuration.php';

$sql = "SELECT * FROM announcements where id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
       $subject = $row['subject'];
       $description = $row['description'];
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<title>Notice | Notices Update</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style/w3.css">
<link rel="stylesheet" href="style/bootstrap.min.css">
<link rel="icon" href="images/icon.png">
<style>
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 20px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

select {
    width: 80%;
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
<body>
<div class="w3-container w3-blue">
  <center> <h1>E-NOTICEBOARD</h1>
  <p>..</p>
</div>
  <ul class="w3-navbar w3-light-grey">
    <li><a href="announcements.php"><b>Notices</b></a></li>
    <li><a href="newuser.php"><b>Register</b></a></li>  
     <li><a href="administrator.php"><b>Registerd Users</b></a></li>
    <li><a href="myaccount.php"><b>Account Update</b></a></li>
    <li><a href="users.php"><b>Customize Users</b></a></li>
<li class="w3-right"><a class="w3-green" href="logout.php">Logout (<?php echo"$current"; ?>)</a></li>
  </ul>
  <div class="container">
<h2 align="center" class="w3-light-grey">Update Notice</h2>
<form action="update.php" method="POST">
<br>
  <table align="center">
  <p>
  <tr><td><label>Subject</label></td>
  <td><input  name="subject" type="text"  placeholder="Enter Subject" value="<?php echo"$subject"; ?>"required></td></tr></p>
    <tr><td><label><b>Description</b></label></td>
    <td><textarea name="description" placeholder="Enter Description"  required><?php echo"$description"; ?></textarea></td>
     <td><input type="hidden" name="id" value="<?php echo"$id"; ?>"></td>
     </tr>
    <tr><td><button type="submit" class="w3-btn w3-blue">Update Notice</button></td></tr>
    </table>
       </form>


   
