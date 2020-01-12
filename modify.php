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
        $query = "SELECT * FROM GARDEN WHERE ID='{$id}'";
        $result = $conn->query($query);
        if ($result === TRUE) {
            $object = $result->fetch_object();
        }
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
    <title>Modificar</title>
    <style>
        input {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }
        input[type=button], input[type=submit], input[type=reset] {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 16px 32px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<a href="index.php">INICIO</a>
<form method="POST" action="">
    <?php
    $object = $result->fetch_object();
    echo "<label>ESPECIE</label><input type=\"text\" value=\"{$object->ESPECIE}\" placeholder =\"especie\" name=\"especie\" required>";
    echo "<label>VARIEDAD</label><input type=\"text\" value=\"{$object->VARIEDAD}\"  placeholder =\"variedad\" name=\"variedad\">";
    echo "<label>NÚMERO</label><input type=\"text\" value=\"{$object->NUMERO}\"  placeholder =\"numero\" name=\"numero\" required>";
    echo "<label>RIEGO</label><input type=\"text\" value=\"{$object->RIEGO}\"  placeholder =\"riego\" name=\"riego\">";
    echo "<label>MULTIPLICAR</label><input type=\"text\" value=\"{$object->MULTIPLICAR}\"  placeholder =\"multiplicacion\" name=\"multi\">";
    echo "<label>TRANSPLANTAR</label><input type=\"text\" value=\"{$object->TRANSPLANTAR}\"  placeholder =\"transplantar\" name=\"trans\">";
    echo "<label>ACLAREO</label><input type=\"text\" value=\"{$object->ACLAREO}\"  placeholder =\"aclareo\" name=\"aclareo\">";
    echo "<label>METODO</label><input type=\"text\" value=\"{$object->METODO}\"  placeholder =\"metodo\" name=\"metodo\">";
    echo "<label>PODA</label><input type=\"text\" value=\"{$object->PODA}\"  placeholder =\"poda\" name=\"poda\">";
    echo "<label>OBSERVACIÓN</label><input type=\"text\" value=\"{$object->OBSERVACION}\"  placeholder =\"observaciones\" name=\"obser\">";
    echo "<input type=\"submit\" value=\"Modificar\" name=\"submit\">";
    unset($object);
    $result->free();
    $conn->close();
    ?>
</form>
</body>
</html>
<?php
    $conn = new mysqli($dbserver, $username, $password, $dbname);
    if(isset($_POST['submit'])) {
        $ESPECIE = $_POST["especie"];
        $VARIEDAD = $_POST["variedad"];
        $NUMERO = $_POST["numero"];
        $RIEGO = $_POST["riego"];
        $MULTIPLICAR = $_POST["multi"];
        $TRANSPLANTAR = $_POST["trans"];
        $ACLAREO = $_POST["aclareo"];
        $METODO = $_POST["metodo"];
        $PODA = $_POST["poda"];
        $OBSERVACION = $_POST["obser"];
        $queryUpdate = "UPDATE GARDEN SET ESPECIE='{$ESPECIE}', VARIEDAD='{$VARIEDAD}', NUMERO={$NUMERO}, RIEGO='{$RIEGO}', 
            MULTIPLICAR='{$MULTIPLICAR}', TRANSPLANTAR='{$TRANSPLANTAR}', ACLAREO='{$ACLAREO}', METODO='{$METODO}', 
            PODA='{$PODA}', OBSERVACION='{$OBSERVACION}' WHERE ID={$id}";
        $resultUpdate = $conn->query($queryUpdate);
        if ($resultUpdate === TRUE){
            unset($resultUpdate);
            $conn->close();
            header('Location: /index.php');
        }
        else
            echo("Error description: " . $queryUpdate);
    }
?>
