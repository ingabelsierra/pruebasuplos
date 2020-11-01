<?php

$dbserver = "localhost";
$dbuser = "root";
$password = "";
$dbname = "intelcost_bienes";

$database = new mysqli($dbserver, $dbuser, $password, $dbname);

if ($database->connect_errno) {
    die("No se pudo conectar a la base de datos");
} 

else {

    $id = $_GET['id'];

    $data = file_get_contents("data-1.json");
    $bienes = json_decode($data, true);

    foreach ($bienes as $bien) {

        if ($bien['Id'] == $id) {
            $id = $bien['Id'];
            $direccion = $bien['Direccion'];
            $ciudad = $bien['Ciudad'];
            $telefono = $bien['Telefono'];
            $codigo_postal = $bien['Codigo_Postal'];
            $tipo = $bien['Tipo'];
            $precio = substr($bien['Precio'], 1);
            $precio = str_replace ( ',', '', $precio);            
            $precio = (string)$precio;
           
        }
    }

    $sql = "INSERT INTO bienes (id, direccion, ciudad,telefono,codigo_postal,tipo,precio) VALUES ('$id','$direccion','$ciudad','$telefono','$codigo_postal','$tipo','$precio')";

    if ($database->query($sql) === TRUE) {
        echo "Registro guardado con exito";
    } else {
        echo "Error: " . $sql . "<br>" . $database->error;
    }

    $database->close();
} 

  