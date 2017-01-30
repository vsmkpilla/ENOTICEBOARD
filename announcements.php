<?php
session_start();
$current = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<title>E-NoticeBoard | Notices</title>
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
<script type="text/javascript">
 $(function(){
   $("a").click(function(){
	   $("b").toggle(1500);
   });
   });
   </script>
<body background="homeimg/logbg.jpg">
<div class="w3-container w3-blue">
  <center><a href="index.php" ><h1 class="w3-container w3-blue" >E-NOTICEBOARD</h1></a>
  <p>..</p>
</div>
<div class="w3-left-align">

  <ul class="w3-mavbar w3-leftbar w3-light-grey">
  <table align="left" >
     <tr> 
    <td><li><a href="announcements.php"><b>Notices</b></a></li></td>
    <td><li><a href="newuser.php"><b>New User</b></a></li>  </td>
     <td><li><a href="administrator.php"><b>Registerd Users</b></a></li></td>
    <td><li><a href="myaccount.php"><b>Account Update</b></a></li></td>
    <td><li><a href="users.php"><b>Customize Users</b></a></li></td>
    </tr>
    </table>
<li class="w3-right"><a class="w3-green" href="logout.php">Logout (<?php echo"$current"; ?>)</a></li>
  </ul>
  </div>
  <div class="container">
<h2  class="w3-light-grey" align="center"><b>Total Notices</b></h2>

<button onclick="document.getElementById('id01').style.display='block'" class="w3-btn w3-blue"><strong>Add Notce</strong></button><br><br>

 <div id="id01" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-8">
      <header class="w3-container w3-blue">
        <span onclick="document.getElementById('id01').style.display='none'"
        class="w3-closebtn">&times;</span>
        <h2 align="center">Add Notice</h2>
      </header>
      <div class="w3-container">
       <form action="add_announcement.php" method="POST">
             <table>
             <tr>
            
    <td> <label><b>Subject</b></label></td>
    <td><input type="text" placeholder="Enter Subject" name="subject" required></td>
    </tr>
<tr>
    <td><label><b>Description</b></label></td>
    <td><textarea name="description" placeholder="Enter Description" required></textarea></td>
    </tr>
    <tr><td><label>Put Pdf File Of the Notice</label></td>
    <td><input type="file" name="pdf"></td>
    </tr>
<tr>
    <td><button type="submit" class="w3-btn w3-blue">Add Notice</button></td>
    </tr>
    </table>
       </form>
      </div>
      <footer class="w3-container w3-blue">
       <h4 align="center">Check the Notice Before Posting :-)</h4>
      </footer>
    </div>
  </div>
<div class="table-responsive">
  <table class="w3-table-all w3-large">
    <tr>
      <th>Subject</th>
      <th>Description</th>
       <th>Date</th>
      <th>Update</th>
      <th>Delete</th>
      <th>view</th>
     
    </tr>
<?php
include 'database_configuration.php';

$sql = "SELECT * FROM announcements";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["subject"]. "</td><td>" . $row["description"]. "</td><td>" . $row["date"];
       echo '</td><td><a style="font-size:12px;" class="w3-btn w3-blue" href="annc_update.php?id='.$row['id'].'">Update</a>';
       echo '</td><td><a style="font-size:12px;" class="w3-btn w3-red" href="delete_annc.php?id='.$row['id'].'">Delete</a>';  
       echo '</td><td><a style="font-size:12px;" href="viewan.php?id='.$row['id'].'" class="w3-btn w3-green"">view</a>';
    }
} else {
    print '
</table><div class="w3-panel w3-leftbar w3-light-grey">
  <p class="w3-xlarge w3-serif">
  <i><b>0</b> Announcement(s) found on DataBase</i></p>
</div>';
}
$conn->close();
?>
  </table>
  </div>

<h3 align="center">End</h3>

   
