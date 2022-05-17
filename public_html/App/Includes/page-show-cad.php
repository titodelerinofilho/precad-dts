<div class="container" id="main-container">
    <div class="row mt-5 mb-3">
        <div class="col">
            <?php foreach ($showCad as $dados) {

                $arr_resp = json_decode($dados['responsaveis'], true);
                echo '
            <h2>' . $dados['razao'] . '</h2>
            <div class="card mt-3 mb-3">
                <div class="card-header">
                    Dados de Empresariais
                </div>
                <div class="card-body">
                    <h5>Razão Social:</h5>
                    <p class="card-text">' . $dados['razao'] . '</p>
                    <hr><h5>Nome Fantasia:</h5>
                    <p class="card-text">' . $dados['fantasia'] . '</p>
                    <hr><h5>CPF/CNPJ:</h5>
                    <p class="card-text">' . $dados['cgc'] . '</p>
                    <hr><h5>Email:</h5>
                    <p class="card-text">' . $dados['email'] . '</p>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    Dados de Endereço
                </div>
                <div class="card-body">
                    <h5>Endereço:</h5>
                    <p class="card-text">' . $dados['endereco'] . '</p>
                    <hr><h5>Bairro:</h5>
                    <p class="card-text">' . $dados['bairro'] . '</p>
                    <hr><h5>Cidade:</h5>
                    <p class="card-text">' . $dados['cidade'] . '</p>
                    <hr><h5>Estado:</h5>
                    <p class="card-text">' . $dados['estado'] . '</p>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    Responsáveis
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <td>Nome</td>
                                <td>Documento</td>
                                <td>Tipo</td>
                            </tr>
                        </thead>
                ';
                //var_dump($arr_resp);
                foreach ($arr_resp as $resp) {
                    echo '
                    <tr>
                        <td>' . $resp['name'] . '</td>
                        <td>' . $resp['doc'] . '</td>
                        <td>' . strtoupper($resp['type']) . '</td>
                    </tr>
                    ';
                }
                echo '
                    </table>
                    </div>
                </div>
            </div>
        </div>';
            }

            $cnpj = $showCad[0]["cgc"];
            $pathDoc = $showCad[0]["arquivos"];
            $idCad = $showCad[0]["id"];
            $approved = $showCad[0]['status'];

            ?>
            <div class="col-md-auto">
                <h2>Operações</h2>
                <div class="list-group mt-3">
                    <?php
                    if($approved == 0) {
                    echo '
                    <form action="approveCad.php" method="POST">
                        <input type="hidden" name="approval" value="'.$idCad.'">
                        <input type="submit" id="list-item" name="sendApproval" class="list-group-item list-group-item-action" value="Aprovar Cadastro"></form>
                    ';
                    }
                    ?>
                        <a href="show_files.php?pathid=<?php echo $pathDoc ?>&cgc=<?php echo $cnpj ?>&idcad=<?php echo $idCad ?>" id="list-item" target="_blank" class="list-group-item list-group-item-action">Ver Documentos</a>
                    <a href="#" id="list-item" class="list-group-item list-group-item-action">Apagar</a>
                    <a href="info_cnpj.php?cnpj=<?php echo $cnpj ?>" id="list-item" target="_blank" class="list-group-item list-group-item-action">Cartão CNPJ</a>
                </div>
            </div>
        </div>
    </div>
