<?php
$id = $_GET["id"];
$username = "";
$password = "";
$dbserver = "localhost";
$dbname = "GARDENDB";
$conn = new mysqli($dbserver, $username, $password, $dbname);
if ($conn->connect_error) {
    $result = "DB Connection failed";
    return;
} else {
    $query = "DELETE FROM GARDEN WHERE ID='{$id}'";
    $result = $conn->query($query);
    if ($result === TRUE)
        header('Location: /index.php');
    else
        echo("Error description: " . $query);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Borrando</title>
</head>
<body>
<a href="index.php">INICIO</a>
<form action="">

</form>
</body>
</html>
