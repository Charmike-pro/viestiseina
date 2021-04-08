<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ylläpitäjänsivu</title>
</head>
<body>
<a href="logout.php">Kirjaudu ulos</a>
<table>
<tr>
<th>ID:</th>
<th>Lähettäjä:</th>
<th>Viesti:</th>
<th>Päivämäärä:</th>
<th>Piilotettu:</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "testi");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
/// Displays all database input
$sql = "SELECT * FROM rad";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>". $row["id"]."</td><td>".$row["sender"]. "</td><td>". $row["msg"]."</td><td>".$row["date"]."</td><td>".$row["hide"] ."</td></tr>";
}
echo "</table> <br>";
}
$conn->close();
?>
</table>

</body>
</html>