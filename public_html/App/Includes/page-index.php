<div class="container" id="main-container">
    <section class="row">
        <div class="col mt-3">
            <div class="card mt-3">
                <div class="card-header">
                    Aprovados
                </div>
                <div class="card-body">
                    <span class="card-title"><?php echo $qtd_status_open ?? ''; ?> clientes</span>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    Pendentes
                </div>
                <div class="card-body">
                    <span class="card-title"><?php echo $qtd_status_closed ?? ''; ?> clientes</span>
                </div>
            </div>
        </div>
        <div class="col-md-auto mt-3">
            <div class="card mt-3">
                <div class="card-header">
                    Últimos Cadastros
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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
                            <td><a href="show_cad.php?id=<?php echo $dados["id"] ?>"><ion-icon name="eye-outline" style="width: 120%;"></ion-icon></a></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
