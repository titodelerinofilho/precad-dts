<?php

use \App\Entity\Cadastro;
use \App\Controller\CadastroController;
use App\Session\Session;

require __DIR__ . '/vendor/autoload.php';

session_start();
Session::requireLogin();

$page_title = 'Ver Arquivos - DTS PreCad';

$cad = new CadastroController;
$obCad = new Cadastro;

$idcad = $_REQUEST['idcad'];
if (empty($idcad)) {
    die();
}

$obCad->setId($idcad);
$dados = $cad->showOnly($obCad);

$dir = $dados[0];

$path = __DIR__ . '/uploads' .$dir["arquivos"];
$pathToDown = '/uploads'.$dir["arquivos"];

if(is_dir($path)) {
    $listdir = array_diff(
        scandir($path),
        ['.', '..']
    );
}
include __DIR__ . '/App/Includes/page-header.php';
include __DIR__ . '/App/Includes/page-show-files.php';
include __DIR__ . '/App/Includes/page-footer.php';
