<?php
require_once "controller/controller.php";

$rotasValidas = array(null, 'america', 'asia', 'africa', 'europa', 'oceania');

try {
  $continente = isset($_REQUEST['request']) ? $_REQUEST['request'] : null;

  if (in_array($continente, $rotasValidas)) {
    $resultados = getData($continente);
  } else {
    throw new Exception('Rota inválida');
  }

  header('Content-Type: application/json');
  echo $resultados;
} catch (Exception $e) {
  $erro = array(
    'status' => 'error',
    'message' => $e->getMessage()
  );
  header('Content-Type: application/json', true, 404);
  echo json_encode($erro);
}
