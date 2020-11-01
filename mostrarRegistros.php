<?php

$dbserver = "localhost";
$dbuser = "root";
$password = "";
$dbname = "intelcost_bienes";

$database = new mysqli($dbserver, $dbuser, $password, $dbname);

if ($database->connect_errno) {

    die("No se pudo conectar a la base de datos");
    
} else {

    $sql = "SELECT DISTINCT * from bienes";


    $result = $database->query($sql);

    $bienes = array();

    while ($row = $result->fetch_assoc()) {

        $bienes[] = $row;
    }

    echo json_encode($bienes);
} 

  