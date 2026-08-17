<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CarlosBuz</title>
  <link rel="icon" type="image/png" href="logo.png">

  <link rel="stylesheet" href="style.css">

</head>

<body>

  <div class="card_login">

    <div id="logo">

      <img src="logo.png" alt="Logo CarlosBuz">

    </div>

    <h1>SISTEMA DE TRANSPORTE ESCOLAR</h1>
    <p id="titulo">Faça login para acessar o sistema</p>

    <form action="verificar_login.php" method="POST">

      <div class="input">

        <p>E-mail:</p>
        <input type="email" name="email" required>

      </div>

      <div class="input">

        <p>Senha:</p>
        <input type="password" name="senha" required>

      </div>

      <button type="submit" name="enviar" class="botao_login"> Entrar </button>

    </form>

  </div>

</body>

</html>

