<?php
if(isset($_POST['submit'])) {
$name = $_POST['n'];
$email = $_POST['e'];
$mbno = $_POST['mb'];


include 'database_configuration.php';

$sql = "INSERT INTO contact (name, email, mobile)
VALUES ('$name', '$email', '$mbno')";

if ($conn->query($sql) === TRUE) {
 location : home.php;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>