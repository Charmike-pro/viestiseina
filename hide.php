<?php

if (!isset($_GET['id'])) {
    die('Ei asiaa tänne');
}


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
$id = intval($_GET['id']);

$sql = "UPDATE rad SET hide = 1 WHERE (id = $id)";

if ($conn->query($sql) === TRUE) {
    echo "Piilotus onnistui!";
  } else {
    echo "Piilotuksessa ilmeni virhe:" . $conn->error;
  }
  
  $conn->close();

?>