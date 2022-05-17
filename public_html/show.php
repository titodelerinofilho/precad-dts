<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Cadastro;
use \App\Controller\CadastroController;

$page_title = 'Cadastros - DTS PreCad';

$cadastro = new CadastroController();
$dadoscad = $cadastro->show();

include 'src/header.php';
?>
<div class="container" id="main-container">
    <section class="row">
        <div class="col-3 mt-3">
            <div class="card mt-3">
                <div class="card-header">
                    Aprovados
                </div>
                <div class="card-body">
                    <span class="card-title">200 clientes</span>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    Pendentes
                </div>
                <div class="card-body">
                    <span class="card-title">100 clientes</span>
                </div>
            </div>
        </div>
        <div class="col mt-3">
            <div class="card mt-3">
                <div class="card-header">
                    Últimos Cadastros
                </div>
                <div class="card-body">
                    <table class="table table-striped table-responsive table-bordered" id="table-cad">
                        <thead class="table-dark">
                            <td>ID</td>
                            <td>CNPJ</td>
                            <td>Razão Social</td>
                            <td>Cidade</td>
                            <td>Ver</td>
                        </thead>
                        <tbody>
                        <?php foreach($dadoscad as $dados) { ?>
                        <tr>
                            <?php echo '
                            <td>'.$dados["id"].'</td>
                            <td>'.$dados["cgc"].'</td>
                            <td>'.$dados["razao"].'</td>
                            <td>'.$dados["cidade"].'</td>'; ?>
                            <td><a href="show_cad.php?id=<?php echo $dados["><ion-icon name="eye-outline" style="width: 120%;"></ion-icon></a></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="row">

    </section>
</div>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
