<?php

use \App\Entity\Cadastro;
use \App\Controller\CadastroController;
use App\Session\Session;

require __DIR__ . '/vendor/autoload.php';

session_start();
Session::requireLogin();
$page_title = 'Cadastrar Usuário - DTS PreCad';

include __DIR__ . '/App/Includes/page-header.php';
include __DIR__ . '/App/Includes/page-cad-user.php';
include __DIR__ . '/App/Includes/page-footer.php';