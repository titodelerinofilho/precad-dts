<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Pré-Cadastro - DTS Distribuidora</title>
</head>
<body>
    <div class="container-auto" id="main-container">
        <div class="row align-items-center p-2" id="content-col">
            <div class="col-md-auto text-center">
                <img src="img/logo.png"/>
            </div>
            <div class="col text-center">
                <h3>Cadastro para Clientes - DTS Distribuidora</h3>
                <h5>Formulário de cadastro para clientes na DTS Distribuidora.</h5>
                <h6>Verifique os campos atentamente e qualquer dúvida, mantenha contato conosco.</h6>
            </div>
        </div>
        <div class="row">
            <div class="col p-4" id="form-col">
                <form method="post" action="src/SendCadastro.php" id="form-cad" onsubmit="validarForm()" enctype="multipart/form-data">
                    <div class="mb-3">
                        <div class="alert alert-danger" role="alert" style="display: none;" id="msg-erro">
                            Você não preencheu todos os dados. Verifique!
                        </div>
                    </div>
                    <div class="row g-3">
                        <h1>Informe os dados do cadastro</h1>
                        <div class="col-md-6">
                            <label for="tipocad" class="form-label">Selecione o tipo de cadastro:</label>
                            <select class="form-select" id="tipocad" name="tipocad">
                                <option value="1">CPF</option>
                                <option value="2">CNPJ</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="cgc" class="form-label">CPF/CNPJ: </label>
                            <input type="text" class="form-control" name="cgc" id="cgc" placeholder="Insira o seu CPF ou CNPJ do cadastro.">
                        </div>
                        <div class="col-12">
                            <label for="razao" class="form-label">Razão Social:</label>
                            <input type="text" class="form-control" name="razao" id="razao" placeholder="Informe sua razão social.">
                        </div>
                        <div class="col-12">
                            <label for="fantasia" class="form-label">Nome Fantasia:</label>
                            <input type="text" class="form-control" name="fantasia" id="fantasia" placeholder="Informe o nome fantasia da empresa">
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Informe um email válido.">
                        </div>
                        <div class="col-md-8">
                            <label for="endereco" class="form-label">Endereço:</label>
                            <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Digite o seu endereço.">
                        </div>
                        <div class="col-md-4">
                            <label for="bairro" class="form-label">Bairro:</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Informe o bairro.">
                        </div>
                        <div class="col-md-6">
                            <label for="cidade" class="form-label">Cidade:</label>
                            <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Informe a cidade.">
                        </div>
                        <div class="col-md-6">
                            <label for="estado" class="form-label">Estado:</label>
                            <input type="text" class="form-control" name="estado" id="estado" placeholder="Informe o estado.">
                        </div>
                        <div class="col-12">
                            <label for="area" class="form-label">Área de Atuação:</label>
                            <input type="text" class="form-control" name="area" id="area" placeholder="Informe sua área de atuação no mercado.">
                        </div>
                        <hr>
                        <div class="col-12">
                            <h4>Responsáveis</h4>
                            <p>Abaixo, informe os responsáveis de vossa empresa com o cadastro na DTS.</p>
                        </div>
                        <div class="col-md-5">
                            <label for="resp1" class="form-label">Responsável 1:</label>
                            <input type="text" class="form-control" name="resp1" id="resp1" placeholder="">
                        </div>
                        <div class="col-md-5">
                            <label for="resp_doc1" class="form-label">Documento (Responsável 1):</label>
                            <input type="text" class="form-control" name="resp_doc1" id="resp_doc1" placeholder="">
                        </div>
                        <div class="col-md-2">
                            <label for="resp_tipo1" class="form-label">Tipo:</label>
                            <select name="resp_tipo1" id="resp_tipo1" class="form-select p-2">
                                <option value="rg">RG</option>
                                <option value="cpf">CPF</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label for="resp2" class="form-label">Responsável 2:</label>
                            <input type="text" class="form-control" name="resp2" id="resp2" placeholder="">
                        </div>
                        <div class="col-md-5">
                            <label for="resp_doc2" class="form-label">Documento (Responsável 2):</label>
                            <input type="text" class="form-control" name="resp_doc2" id="resp_doc2" placeholder="">
                        </div>
                        <div class="col-md-2">
                            <label for="resp_tipo2" class="form-label">Tipo:</label>
                            <select name="resp_tipo2" id="resp_tipo2" class="form-select p-2">
                                <option value="rg">RG</option>
                                <option value="cpf">CPF</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label for="resp3" class="form-label">Responsável 3:</label>
                            <input type="text" class="form-control" name="resp3" id="resp3" placeholder="">
                        </div>
                        <div class="col-md-5">
                            <label for="resp_doc3" class="form-label">Documento (Responsável 3):</label>
                            <input type="text" class="form-control" name="resp_doc3" id="resp_doc3" placeholder="">
                        </div>
                        <div class="col-md-2">
                            <label for="resp_tipo3" class="form-label">Tipo:</label>
                            <select name="resp_tipo3" id="resp_tipo3" class="form-select p-2">
                                <option value="rg">RG</option>
                                <option value="cpf">CPF</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="arquivos" class="form-label">Upload de Documentos</label>
                            <input class="form-control" type="file" name="arquivos[]" id="arquivos" placeholder="Teste" multiple>
                        </div>
                        <div class="col-12">
                            <div class="alert alert-warning d-flex align-items-center p-2" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    * Formatos aceitos: *.png, *.jpg, *.jpeg, *.pdf
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-3">
                            <div class="form-check">
                                <input class="form-check-input" name="termos" type="checkbox" value="1" id="termos">
                                <label class="form-check-label" for="termos">
                                    <p>Estou ciente com o Termo de Privacidade e a segurança dos dados informados.</p>
                                </label>
                            </div>
                            <input type="submit" class="btn btn-primary" id="send" name="send" value="Enviar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <div><p>&reg; DTS Distribuidora de Equipamentos de Segurança Eletrônica LTDA</p></div>
        <div class="text-center">
            <img src="img/ssl.png" width="20%"/>
            <p>Este formulário é protegido por criptografia SSL Let's Encrypt.</p></div>

    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="js/valida.js"></script>
</body>

</html>