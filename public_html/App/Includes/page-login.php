<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/signin.css">
  <title>Login - Sistemas DTS</title>
</head>
<body class="container">
  <main class="form-signin">
    <div class="row mt-5 align-self-center text-center">
      <div class="col">
        <div class="mb-3 mt-3 badge" style="background-color:darkslategray;">
          <img src="/img/logo-vazada.png" alt="" style="max-width: 70%;">
          <h3>Sis Pré-Cadastro</h3>
        </div>
        <form action="" method="post">
          <div class="form-floating">
            <input class="form-control" id="floatingInput" type="text" name="login">
            <label for="floatingInput">Login</label>
          </div>
          <div class="form-floating">
            <input class="form-control" id="floatingInput" type="password" name="pass">
            <label for="floatingInput">Senha</label>
          </div>
          <div class="mt-5">
            <input class="w-100 btn btn-lg" style="background-color: darkslategray; color: white;" type="submit" name="sendForm" value="Logar">
          </div>
        </form>
      </div>
      <!--<div class="col">
        <div class="text-center">
          <img src="/img/logo.png" alt="" style="width: 30%;"><br>
          <h3 class="h3 mb-3 fw-normal">Sistema PreCad</h3>
        </div>
      </div>-->
    </div>
  </main>
</body>

</html>