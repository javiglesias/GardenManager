<?php
$username = "";
$password = "";
$dbserver = "localhost";
$dbname = "GARDENDB";
$conn = new mysqli($dbserver, $username, $password, $dbname);
if($conn->connect_error){
    die("DB Connection failed");
    return;
} else{
    $result = $conn->query("SELECT * FROM GARDEN");
}
$conn->close();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Garden manager</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<h1>Gestor de Jardinería</h1>
<h2>
    <a href="/insert.php">Añadir</a>
    <a href="/search.php">Buscar</a>
</h2>
<table style="width: 100%; height: 100%">
    <tr>
        <th>ESPECIE</th>
        <th>VARIEDAD</th>
        <th>NÚMERO</th>
        <th>RIEGO</th>
        <th>MULTIPLICAR</th>
        <th>TRANSPLANTAR</th>
        <th>ACLAREO</th>
        <th>METODO</th>
        <th>PODA</th>
        <th>OBSERVACIÓN</th>
        <th>IMAGEN</th>
        <th>OPCIONES</th>
    </tr>
    <?php
    while ($object = $result->fetch_object()){
        echo"<tr>";
        echo "<td>$object->ESPECIE</td>";
        echo "<td>$object->VARIEDAD</td>";
        echo "<td>$object->NUMERO</td>";
        echo "<td>$object->RIEGO</td>";
        echo "<td>$object->MULTIPLICAR</td>";
        echo "<td>$object->TRANSPLANTAR</td>";
        echo "<td>$object->ACLAREO</td>";
        echo "<td>$object->METODO</td>";
        echo "<td>$object->PODA</td>";
        echo "<td>$object->OBSERVACION</td>";
        echo "<td><a href='#'>Enlace</a></td>";
        echo "<td><a href='delete.php?id=".$object->ID."'>Borrar</a><br><a href='modify.php"."?id=".$object->ID."'>Modificar</a></td>";
        echo"</tr>";
    }
    unset($object);
    $result->free();
    ?>
</table>
</body>
</html>
