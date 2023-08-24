<?php

function connetction() 
{
  $dsn = "mysql:host=localhost;dbname=flag;charset=utf8mb4";
  $username = "root";
  $password = "";

  try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  } catch (PDOException $e) {
    echo "Error:" . $e->getMessage();
    return null;
  }
}


function getCountries($continente = null) 
{
  $pdo = connetction();

  if($pdo === null){
    return [];
  }

  if($continente !== null){
    $sql = "SELECT * FROM flags WHERE continente = (:continente)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':continente', $continente);
  } else {
    $sql = "SELECT * FROM flags";
    $stmt = $pdo->prepare($sql);
  }

  try {
    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
  } catch (PDOException $e) {
    echo "Error:" . $e->getMessage();
    return [];
  }
}