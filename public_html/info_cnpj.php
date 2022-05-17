<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(1);

require __DIR__ . '/vendor/autoload.php';

use \App\WebService\Speedio;

$obSpeedio = new Speedio;
$cnpj = $_GET['cnpj'];

if(empty($cnpj)) {
  die('<script>alert("Erro ao buscar CNPJ!");window.close();</script>');
}


$resultado = $obSpeedio->consultarCnpj($cnpj);


if(empty($resultado)) {
  die("Erro ao buscar o cnpj");
}

echo '<pre>';
print_r($resultado);
echo '</pre>';
