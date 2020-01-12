<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insertar</title>
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
    <label>ESPECIE</label><input type="text" value="" placeholder ="especie" name="especie" required>
    <label>VARIEDAD</label><input type="text" value=""  placeholder ="variedad" name="variedad">
    <label>NÚMERO</label><input type="text" value=""  placeholder ="numero" name="numero" required>
    <label>RIEGO</label><input type="text" value=""  placeholder ="riego" name="riego">
    <label>MULTIPLICAR</label><input type="text" value=""  placeholder ="multiplicacion" name="multi">
    <label>TRANSPLANTAR</label><input type="text" value=""  placeholder ="transplantar" name="trans">
    <label>ACLAREO</label><input type="text" value=""  placeholder ="aclareo" name="aclareo">
    <label>METODO</label><input type="text" value=""  placeholder ="metodo" name="metodo">
    <label>PODA</label><input type="text" value=""  placeholder ="poda" name="poda">
    <label>OBSERVACIÓN</label><input type="text" value=""  placeholder ="observaciones" name="obser">
    <input type="submit" value="Insertar" name="submit">
</form>
</body>
</html>
<?php
    if(isset($_POST['submit'])) {
        $username = "";
        $password = "";
        $dbserver = "localhost";
        $dbname = "GARDENDB";
        $conn = new mysqli($dbserver, $username, $password, $dbname);
        if ($conn->connect_error) {
            $result = "DB Connection failed";
            return;
        } else {
            $ESPECIE = $_POST["especie"];
            $VARIEDAD = $_POST["variedad"] ;
            $NUMERO = $_POST["numero"];
            $RIEGO = $_POST["riego"] ;
            $MULTIPLICAR = $_POST["multi"] ;
            $TRANSPLANTAR = $_POST["trans"] ;
            $ACLAREO = $_POST["aclareo"] ;
            $METODO = $_POST["metodo"] ;
            $PODA = $_POST["poda"] ;
            $OBSERVACION = $_POST["obse"];

            $baseQuery = "INSERT INTO GARDEN(ESPECIE";
            $queryVariedad =  ", VARIEDAD" ;
            $queryNumero =", NUMERO";
            $queryRiego = ", RIEGO";
            $queryMultiplicar = ", MULTIPLICAR";
            $queryTrans = ", TRANSPLANTAR";
            $queryAclareo = ", ACLAREO";
            $queryMetodo =", METODO";
            $queryPoda =", PODA";
            $queryObs = ", OBSERVACION";
            $query = "{$baseQuery}{$queryVariedad}{$queryNumero}{$queryRiego}{$queryMultiplicar}{$queryTrans}{$queryAclareo}{$queryMetodo}{$queryPoda}{$queryObs}" .
                ") VALUES ('$ESPECIE', '$VARIEDAD', $NUMERO, '$RIEGO', '$MULTIPLICAR', '$TRANSPLANTAR', '$ACLAREO', '$METODO', '$PODA', '$OBSERVACION')";
            $result = $conn->query($query);
            if ($result === TRUE)
                header('Location: /index.php');
            else
                echo("Error description: " . $query);
        }
        $conn->close();
    }
?>
