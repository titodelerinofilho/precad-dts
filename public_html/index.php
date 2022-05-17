<?php

session_start();

require 'vendor/autoload.php';

use App\Controller\CadastroController;
use App\Session\Session;

Session::requireLogin();

$page_title = 'Início - DTS PreCad';

$cadastro = new CadastroController;
$dadoscad = $cadastro->show();

$qtd_status_open = $cadastro->getCadApproval();
$qtd_status_closed = $cadastro->getCadOpen();

include __DIR__ . '/App/Includes/page-header.php';
include __DIR__ . '/App/Includes/page-index.php';
include __DIR__ . '/App/Includes/page-footer.php';