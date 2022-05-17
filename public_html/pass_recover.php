<?php

use \App\Entity\Usuario;
use \App\Controller\UsuarioController;
use App\Session\Session;

require __DIR__ . '/vendor/autoload.php';

session_start();
Session::requireLogin();
$page_title = 'Trocar Senha - DTS PreCad';

$userDao = new UsuarioController();
$user = new Usuario();


if(isset($_POST['submit']))
{
    $dataPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    $userId = $user->setId($_SESSION['session']['user_id']);

    $password = $user->setPassword(password_hash($dataPassword, PASSWORD_DEFAULT));

    echo $password;

    if(true === $userDao->passwordChange($user)) {
        echo '<script>alert("Senha modificada com sucesso!"); window.location.href="index.php";</script>';
    } else {
        echo '<script>alert("Erro ao modificar a senha! Verifique"); window.location.href="pass_recover.php";</script>';
    }
}

include __DIR__ . '/App/Includes/page-header.php';
include __DIR__ . '/App/Includes/page-pass-recovery.php';
include __DIR__ . '/App/Includes/page-footer.php';
