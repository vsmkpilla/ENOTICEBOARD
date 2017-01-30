<?php
session_start();
$current = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<title>E-NoticeBoard | Password Update</title>
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

</style>
<body background="homeimg/logbg.jpg">
<div class="w3-container w3-blue">
  <center> <h1>E-NOTICEBOARD</h1>
  <p>..</p></div>
  <ul class="w3-navbar w3-light-grey">
    <li><a href="viewannouncements.php"><b>Notices</b></a></li>
    <li><a href="account.php"><b>Password Update</b></a></li>
<li class="w3-right"><a class="w3-green" href="logout.php">Logout (<?php echo"$current"; ?>)</a></li>
  </ul>
  <div class="container">
<h2 align="center" class="w3-light-grey"><b>Update Password - <?php echo"$current";?></b></h2>
<?php
if(isset($_POST['submit'])) {
include 'database_configuration.php';

$cp = $_POST['cpass'];
$np = $_POST['npass'];
$user = $_POST['myuser'];

$sql = "SELECT * FROM users where username ='$user' and password='$cp'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
       
$sql = "UPDATE users SET password ='$np' WHERE username ='$user'";

if ($conn->query($sql) === TRUE) {
   header("location:logout.php");
} else {
    echo "Error updating record: " . $conn->error;
}




    }
} else {
    print '
  <div class="w3-panel w3-red">
    <h3>Error!</h3>
    <p>You entered incorrect password!!!</p>
  </div>
';
}
$conn->close();
}
?>
 <table align="center">
 <form action="account.php" method="POST">
<br>
  <p>
  <tr><td><label>Current Password</label></td>
  <td><input  name="cpass" type="password"  placeholder="Enter Current Password" required></p></td></tr>

  <p>
 <tr><td> <label>New Password</label></td>

  <td> <input  name="npass" type="password"  placeholder="Enter New Password" required></p></td></tr>
<tr><td><input type="hidden" name="myuser" value="<?php echo"$current"; ?>" ></td>
<td><button type="submit" name="submit" class="w3-btn w3-blue">Update</button></td></tr>
</form>
   
   </table>
