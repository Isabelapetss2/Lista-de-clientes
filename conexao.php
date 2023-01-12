<?php

//conexão com o banco de dados

$hostname =  "107.180.57.185";
$bancodedados = "dz_dev_test";
$usuario = "dz_dev";
$senha = "p?%3DY?#*LBW";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
    if ($mysqli->connect_errno) {
        echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

