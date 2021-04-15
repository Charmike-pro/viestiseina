<?php 
session_start();
if(!isset($_SESSION['logged_in'])){
    header('Location: ./login.php');
    die();
}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ylläpitäjänsivu</title>
</head>
<body>
<a href="logout.php">Kirjaudu ulos</a>
<table class="jumbotron text-center">
<tr>
<th>ID:</th>
<th>Lähettäjä:</th>
<th>Viesti:</th>
<th>Päivämäärä:</th>
<th>Piilotettu:</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "pynnonen.pyry", "PyrynK4nt4!", "pynnonen.pyry");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM rad";
$result = $conn->query($sql);
?>
<?php if ($result->num_rows > 0): ?>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["sender"]; ?></td>
<td><?php echo $row["msg"]; ?></td>
<td><?php echo $row["date"]; ?></td>
<?php if($row["hide"] == 1): ?>
<td><a href="show.php?id=<?php echo $row["id"]; ?>">Näytä</a></td>
<?php else: ?>
    <td><a href="hide.php?id=<?php echo $row["id"]; ?>">Piilota</a></td>
</tr>
<?php endif; ?>

<?php endwhile; ?>

<?php endif;
$conn->close();
?>
</table>

</body>
</html>