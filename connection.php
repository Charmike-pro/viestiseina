<html>
<body onload="lol()">
<h1>Etusivu aukeaa pian...</h1>
    <script>
        var timer = setTimeout(function() {
            window.location='index.php'
        }, 3000);
</script>
</html>
<?php
$servername = "localhost";
$username = "pynnonen.pyry";
$password = "PyrynK4nt4!";
$dbname = "pynnonen.pyry";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sender = $_REQUEST['sender'];
$msg = $_REQUEST['msg'];
$date = date("Y/m/d");
$hide = 1;

$sql = "INSERT INTO rad (sender, msg, date, hide)
VALUES ('$sender', '$msg', '$date', '$hide')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
