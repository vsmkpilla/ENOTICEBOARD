<?php
session_start();
$current = $_SESSION['username'];

$myid = $_GET['id'];
include 'database_configuration.php';

$sql = "SELECT * FROM registration where regstrationid = '$myid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       $fname = $row['firstname'];
       $mname = $row['middlename'];
       $lname = $row['lastname'];
       $address = $row['address'];
       $bday = $row['birthday'];
       $gender = $row['gender'];
       $phone = $row['phonenumber'];
       
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<title>E-NoticeBoard | Edit</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style/w3.css">
<link rel="stylesheet" href="style/bootstrap.min.css">
<link rel="icon" href="images/icon.png">
<style>
input[type=text], input[type=password], input[type=number] {
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
<h2 align="center" class="w3-light-grey"><b>Edit Registered User</b></h2>
<form action="edit2.php" method="POST" enctype="multipart/form-data" name="addroom">
   <table align="center"
     <tr><td><label><b>First Name</b></label></td>
    <td><input type="text" placeholder="Enter First Name" value="<?php echo"$fname"; ?>" name="fname" required></td></tr>

   <tr><td> <label><b>Middle Name</b></label></td>
    <td><input type="text" placeholder="Enter Middle Name" value="<?php echo"$mname"; ?>" name="mname" required></td></tr>
<tr>
    <td><label><b>Last Name</b></label></td>
    <td><input type="text" placeholder="Enter Last Name" value="<?php echo"$lname"; ?>" name="lname" required></td></tr>
<tr>
    <td><label><b>Gender</b></label></td>
    <td><input type="text" placeholder="Enter Gender" value="<?php echo"$gender"; ?>" name="gender"></td></tr>
<tr>
    <td><label><b>Address</b></label></td>
    <td><input type="text" placeholder="Enter Address" value="<?php echo"$address"; ?>"name="address" required></td></tr>
<tr>
<td><label><b>Birthday</b></label></td>
<td><input type="text" id="datepicker" name="bday" value="<?php echo"$bday"; ?>"placeholder="11/03/2016" required></td></tr>
<tr>
    <td><label><b>Phone Number</b></label></td>
    <td><input type="number" placeholder="546466464" value="<?php echo"$phone"; ?>" name="phonenumber" required></td>
    <td><input type="hidden" name="id" value="<?php echo"$myid"; ?>"></td></tr>
<br><tr>
    <td><button type="submit" class="w3-btn w3-blue">Update</button></td></tr>
    </table>
    </form>
<br><br>
<?php
  
?>
   
