<div class="container" id="main-container">
    <section class="row">
        <div class="row">
            <div class="col mt-3">
                <div class="card mt-3">
                    <div class="card-header">
                        Aprovados
                    </div>
                    <div class="card-body">
                        <span class="card-title"><?php echo $qtd_status_open ?? ''; ?> clientes</span>
                    </div>
                </div>
            </div>
            <div class="col mt-3">
                <div class="card mt-3">
                    <div class="card-header">
                        Pendentes
                    </div>
                    <div class="card-body">
                        <span class="card-title"><?php echo $qtd_status_closed ?? ''; ?> clientes</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12-auto mt-3">
                <div class="mt-3">
                    <form class="d-flex">
                        <div class="w-20 me-2">
                            <select class="form-select w-10" id="typeSearch">
                                <option value="0">ID</option>
                                <option value="1">CPF/CNPJ</option>
                                <option value="2">Razão Social</option>
                                <option value="3">Cidade</option>
                            </select>
                        </div>
                        <input class="form-control me-2" onkeyup="searchTable()" type="search" placeholder="Selecione o tipo de busca e digite aqui!" id="inputSearch" aria-label="Buscar">
                    </form>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        Solicitações de Cadastros
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-responsive table-bordered" id="table-cad">
                                <thead class="table-dark">
                                    <th>ID</th>
                                    <th>CNPJ</th>
                                    <th>Razão Social</th>
                                    <th>Cidade</th>
                                    <th>Ver</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($showCad as $dados) { ?>
                                        <tr>
                                            <?php echo '
                            <td>' . $dados["id"] . '</td>
                            <td>' . $dados["cgc"] . '</td>
                            <td>' . $dados["razao"] . '</td>
                            <td>' . $dados["cidade"] . '</td>'; ?>
                                            <td><a href="show_cad.php?id=<?php echo $dados["id"] ?>">
                                                    <ion-icon name="eye-outline" style="width: 120%;"></ion-icon>
                                                </a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>