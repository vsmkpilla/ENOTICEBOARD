<?php
session_start();
$current = $_SESSION['username'];

$id = $_GET['id'];
include 'database_configuration.php';

$sql = "SELECT * FROM registration where regstrationid = '$id'";
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
       $photo = $row['photo'];
       $date = $row['date'];
       $signature = $row['signature'];
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<title>E-NoticeBoard | view Users</title>
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
<h2 align="center" class="w3-light-grey"><b>View</b></h2>
<h3 style="font-family:Arial 'Arial Black', Gadget, sans-serif;"><?php echo"$id"; ?></h3>
   <ul class="w3-ul w3-card-4">
    <li class="w3-padding-16">
      <img src="<?php echo"$photo"; ?>" class="w3-left  w3-margin-right" style="width:150px">
      <span class="w3-large"><?php echo"$fname $mname $lname"; ?></span><br>
      <span>Address: <?php echo"$address"; ?></span><br>
<span>Phone Number: <?php echo"$phone"; ?></span><br>
<span>Birthday: <?php echo"$bday"; ?></span><br>
<span>Gender: <?php echo"$gender"; ?></span><br>
<span>Registration Date: <?php echo"$date"; ?>, <?php echo"$signature"; ?></span><br><br>
    </li>
