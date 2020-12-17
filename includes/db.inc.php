<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "sistemayas";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn){
  die("Falha na conexão: ".mysqli_connect_error());
}