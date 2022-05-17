<div class="container" id="main-container">
    <section class="row">
        <div class="row">
            <div class="col-12-auto mt-3">
                <div class="card mt-3">
                    <div class="card-header">
                        Cadastrar Usuário
                    </div>
                    <div class="card-body">
                        <form action="src/send_user.php" method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="user" placeholder="Usuário"/>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" placeholder="E-mail"/>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Senha"/>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>