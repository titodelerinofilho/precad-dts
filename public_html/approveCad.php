<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(1);

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Cadastro;
use \App\Controller\CadastroController;
use \App\Session\Session;
use \App\WebService\Email;


session_start();
Session::requireLogin();

$cad = new CadastroController();
$objCad = new Cadastro();

if(isset($_POST['sendApproval'])) {

    $idCad = filter_input(INPUT_POST, 'approval', FILTER_VALIDATE_INT);

    $objCad->setId($idCad);
    
    $getCad = $cad->showOnly($objCad);

    $approve = $cad->approveCad($objCad);

    if($approve == TRUE) {
        $sit_approve = true;
    } else {
        $sit_approve = false;
    }

    //Send Email
    $nameDest = $getCad[0]['razao'];
    $email = $getCad[0]['email'];
    $body = '<html>
    <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-3 p-2">
            <div class="row p-2">
                <p class="text-center mt-2"><img src="https://dtsdistribuidora.com.br/wp-content/uploads/2020/10/LOGO_PRETA.png" style="width: 30%;" /></p>
                <div class="card mt-2 mb-2 p-2">
                    <p>Olá <u>' . $nameDest . '</u>, seu cadastro na DTS foi APROVADO!<br>
                    Agora, é necessário manter contato conosco para poder darmos continuidade em seu cadastro.
                    </p><br>
                    <p>Seja bem-vindo a DTS Distribuidora.</p>
                </div>
                <p><b>OBS: Mensagem enviada automaticamente. Não o responda!</p>
            </div>
        </div>
    </body>
</html>';

    $subject = '[DTS] Situação de seu cadastro na DTS Distribuidora';
    $mail = new Email();
    $envioMail = $mail->sendMail($email, $subject, $body);

    if($envioMail == TRUE) {
        $sit_email = true;
    }  else {
        $sit_email = false;
    }

    if($sit_approve == TRUE || $sit_approve == TRUE) {
        echo '<script>alert("Aprovação e Email, foram feitos com sucesso!"); window.location.href="show_cad.php?id='.$idCad.'";</script>';
    } else if($sit_approve == TRUE || $sit_email == FALSE) {
        echo '<script>alert("Aprovação registrada, e-mail não enviado!"); window.location.href="show_cad.php?id='.$idCad.'";</script>';
    } else if ($sit_approve == FALSE || $sit_email == TRUE) {
        echo '<script>alert("Aprovação falhou! E-mail de confirmação enviado!"); window.location.href="show_cad.php?id='.$idCad.'";</script>';
    } else if ($sit_approve == FALSE || $sit_email == FALSE) {
        echo '<script>alert("Erro ao aprovar o cadastro! Verifique!"); window.location.href="show_cad.php?id='.$idCad.'";</script>';
    }

}