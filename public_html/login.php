<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(1);

require __DIR__ . '/vendor/autoload.php';

use App\Controller\UsuarioController;
use App\Entity\Usuario;

  $UserControl = new UsuarioController;
  $obUser = new Usuario;


if(isset($_POST['sendForm'])) {

  $field_user = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
  $field_pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_SPECIAL_CHARS);

  $obUser->setUser($field_user);
  $obUser->setPassword($field_pass);

  $userData = $UserControl->findByUser($obUser);

  if(password_verify($field_pass, $userData['pass'])) {
    
    session_start();

    $_SESSION['session'] = [
        'login' => $field_user,
        'session_id' => session_id(),
        'user_id' => $userData['id'],
        'status' => $userData['status'],
        'level' => $userData['level'],
        'sector' => $userData['sector'],
        'session_time' => date('D-m-Y H:i:s')
    ];

    header("Location: index.php?login=success");

  } else {
    echo '<script>alert("Usuário ou senha inválida!"); window.location.href="login.php";</script>';
  }

}

include __DIR__ . '/App/Includes/page-login.php';
