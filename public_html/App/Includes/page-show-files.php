<div class="container mt-3">
    <h3>Arquivos</h3>
    <div class="card mt-3 mb-3">
        <div class="card-header">
            Cliente: <?php echo $dir["razao"] ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Arquivo</td>
                            <td class="text-center">Baixar</td>
                            <td class="text-center">Excluir</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listdir as $dirs) {
                            $fileToDown = $pathToDown . $dirs; ?>
                            <tr>
                                <td><?php echo $dirs ?></td>
                                <td class="text-center"><a href="<?php echo $fileToDown ?>" target="_blank" download="download">
                                        <ion-icon name="save-outline"></ion-icon>
                                    </a></td>
                                <td class="text-center"><a href="">
                                        <ion-icon name="close-circle-outline"></ion-icon>
                                    </a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>