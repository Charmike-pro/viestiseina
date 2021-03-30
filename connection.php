<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sender = $_REQUEST['sender'];
$msg = $_REQUEST['msg'];

$sql = "INSERT INTO rad (sender, msg)
VALUES ('$sender', '$msg')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>