<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Cadastro;
use \App\Controller\CadastroController;


if(isset($_POST['send'])) {

    $cadastro = new Cadastro;
    $cadDao = new CadastroController;

    $resp1      = addslashes($_POST['resp1']);
    $resp_doc1  = addslashes($_POST['resp_doc1']);
    $resp_tipo1  = addslashes($_POST['resp_tipo1']);
    $resp2      = addslashes($_POST['resp2']);
    $resp_doc2  = addslashes($_POST['resp_doc2']);
    $resp_tipo2  = addslashes($_POST['resp_tipo2']);
    $resp3      = addslashes($_POST['resp3']);
    $resp_doc3  = addslashes($_POST['resp_doc3']);
    $resp_tipo3  = addslashes($_POST['resp_tipo3']);

    $resp = array(
        [
            "name" => $resp1,
            "doc" => $resp_doc1,
            "type" => $resp_tipo1
        ],
        [
            "name" => $resp2,
            "doc" => $resp_doc2,
            "type" => $resp_tipo2
        ],
        [
            "name" => $resp3,
            "doc" => $resp_doc3,
            "type" => $resp_tipo3
        ]
    );

    $json_resp = json_encode($resp);

    $cadastro->setTipocad(addslashes($_POST['tipocad']));
    $cadastro->setCgc(addslashes($_POST['cgc']));
    $cadastro->setRazao(addslashes($_POST['razao']));
    $cadastro->setFantasia(addslashes($_POST['fantasia']));
    $cadastro->setEmail(addslashes($_POST['email']));
    $cadastro->setEndereco(addslashes($_POST['endereco']));
    $cadastro->setBairro(addslashes($_POST['bairro']));
    $cadastro->setCidade(addslashes($_POST['cidade']));
    $cadastro->setEstado(addslashes($_POST['estado']));
    $cadastro->setArea(addslashes($_POST['area']));
    $cadastro->setArquivos($_FILES['arquivos']);
    $cadastro->setTermos(addslashes($_POST['termos']));
    $cadastro->setResponsaveis($json_resp);

    $send = $cadDao->create($cadastro);

    if($send == TRUE) {
        echo '<script>alert("Cadastro enviado com sucesso");
        window.location.href="../cadastrar.php";</script>';
    } else {
        echo '<script>alert("Erro ao enviar o cadastro, verifique!");
        window.location.href="../cadastrar.php";</script>';
    }

}
