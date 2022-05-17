<?php

use App\Entity\Cadastro;
use App\Controller\CadastroController;

require __DIR__ . '/vendor/autoload.php';

$cadastro = new Cadastro();
$cad = new CadastroController();

$cadastro->setId(1);
$fetchCadastro = $cad->showOnly($cadastro);

foreach($fetchCadastro as $cadastro) {
    echo '- '.$cadastro['razao'].' - '.$cadastro['cgc'].' - '.json_encode($cadastro['responsaveis']).'<br><hr>';
}
