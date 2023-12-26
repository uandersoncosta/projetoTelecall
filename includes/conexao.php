<?php

$host = "localhost";
$port = 3306;
$user = "root";
$password = "a123456789";
$dbname = "projeto";

try {
  $conn = new mysqli($host, $user, $password, $dbname, $port);
} catch (PDOException $e) {
  echo "Erro ao conectar ao BD" . $e->getMessage();
};
