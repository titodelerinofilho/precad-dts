<?php

use \App\Entity\Cadastro;
use \App\Controller\CadastroController;
use App\Session\Session;

require __DIR__ . '/vendor/autoload.php';

session_start();
Session::requireLogin();
$page_title = 'Ver Cadastro - DTS PreCad';

$cadastroDao = new CadastroController();
$cadastro = new Cadastro();

$getIdInURL = $_REQUEST['id'];
$cadastro->setId($getIdInURL);

if ($getIdInURL == NULL) {
    echo '<script>alert("Não há ID associado para busca!"); window.location.href="/";</script>';
}
$showCad = $cadastroDao->showOnly($cadastro);


include __DIR__ . '/App/Includes/page-header.php';
include __DIR__ . '/App/Includes/page-show-cad.php';
include __DIR__ . '/App/Includes/page-footer.php';
