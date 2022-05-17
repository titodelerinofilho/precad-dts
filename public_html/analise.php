<?php

use \App\Entity\Cadastro;
use \App\Controller\CadastroController;
use App\Session\Session;

require __DIR__ . '/vendor/autoload.php';

session_start();
Session::requireLogin();

$page_title = 'Analise - DTS PreCad';

$cad = new CadastroController();
$objCad = new Cadastro();

$showCad = $cad->show();

$qtd_status_open = $cad->getCadApproval();
$qtd_status_closed = $cad->getCadOpen();


include __DIR__ . '/App/Includes/page-header.php';
include __DIR__ . '/App/Includes/page-cad-analisis.php';
include __DIR__ . '/App/Includes/page-footer.php';