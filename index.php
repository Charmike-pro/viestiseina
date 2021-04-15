<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etusivu</title>
</head>
<body class="class=container mt-3">

    <form action="connection.php">
    <label for="sender">Nimesi:</label>
  <input type="text" id="sender" name="sender"><br><br>
  <label for="msg">Viestisi:</label>
  <input type="text" id="msg" name="msg"><br><br>
  <input type="submit" value="Lähetä!">
    </form>
<table>
<tr>
<br>
<th>Lähettäjä:</th>
<th>Viesti:</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "testi");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
/// Displays all database input if "hide" is set to 0. All messages are set to 0 as default
$sql = "SELECT * FROM rad WHERE hide = 0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["sender"] . "</td><td>"
. $row["msg"]. "</td></tr>";
}
echo "</table> <br>";
}
$conn->close();
?>
</table>
</body>
</html>
