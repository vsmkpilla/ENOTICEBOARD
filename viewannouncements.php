<?php
session_start();
$current = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<title>E-NoticeBoard | UserView</title>
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
<h2 align="center" class="w3-light-grey"><b>Total Notices</b></h2>
<div class="table-responsive">
  <table class="w3-table-all w3-large">
    <tr>
      <th>Subject</th>
      <th>Description</th>
       <th>Date</th>
      
      <th>view</th>
     
    </tr>
<?php
include 'database_configuration.php';

$sql = "SELECT * FROM announcements";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["subject"]. "</td><td>" . $row["description"]. "</td><td>" . $row["date"];  
       echo '</td><td><a style="font-size:12px;" class="w3-btn w3-green"">view</a>';
    }
} else {
    print '
</table><div class="w3-panel w3-leftbar w3-light-grey">
  <p class="w3-xlarge w3-serif">
  <i><b>0</b> Notices(s) found on DataBase</i></p>
</div>';
}
$conn->close();
?>
  </table>
  </div>

   
