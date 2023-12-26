<?php
// Conexão com o banco de dados
include '../../includes/conexao.php';
session_start();

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submitLogin'])) {
  $required_fields = array('nomeLogin', 'senhaLogin');
  foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
      $errors[] = "O campo $field é obrigatório.<br>";
    }
  }

  if (!empty($errors)) {
    $error_message = implode(" ", $errors);
    header("Location: login.php?msg=$error_message");
    exit();
  }

  $login = $_POST['nomeLogin'];
  $senha = $_POST['senhaLogin'];

  $sql = "SELECT * from `usuario` WHERE login='$login' && `senha`='$senha'";
  $result = mysqli_query($conn, $sql);

  $num = mysqli_num_rows($result);
  if ($num > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $row['id_usuario'];
    $_SESSION['user_name'] = $row['nome'];
    $user_id = $row['id_usuario'];
    $_SESSION['user_level'] = $row['nivel'];
    $_SESSION['user_login'] = $row['login'];


    $sql2 = "UPDATE `usuario` SET `loggedAt` = NOW() WHERE `id_usuario` = $user_id";
    $result2 = mysqli_query($conn, $sql2);

    if ($_SESSION['user_level'] == "adm") {
      header("Location: ../dashboard/index.php");
    } else {
      header("Location: ../site/verificacao.php");
    }
  } else {
    header("Location: login.php?msg=Login ou senha incorretos. Por favor, tente novamente.");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../imgs/favicon.ico" type="image/x-icon">

  <!-- FONT MONTSERRAT -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/global.css">
  <link rel="stylesheet" href="../../css/cadastro.css">
  <title>Área do Cliente - Telecall</title>
</head>

<body>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login bem-sucedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Seu login foi bem-sucedido. Você será redirecionado para o painel.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- LOGIN -->
  <div id="" class="content">
    <div class="navMenuLogin">
      <a class="btnVoltarLogin" href="../../index.php">Voltar para Página Inicial</a>
    </div>
    <section class="arealogin">
      <div class="login">
        <div class="imgLogin text-center">
          <img src="../../imgs/telecallLogo--login.png" alt="TeleCall-Logo">
        </div>
        <?php
        if (isset($_GET['msg'])) {
          $msg = $_GET['msg'];
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>' . $msg . '</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        ?>
        <?php
        if (isset($_GET['success'])) {
          $success = $_GET['success'];
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>' . $success . '</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>
        <form action="" method="POST">
          <label for="login">Login</label>
          <input type="text" name="nomeLogin" id="nomeLogin" placeholder="Seu login" maxlength="6">
          <div class="erroPLogin"></div>

          <label for="senha">Senha</label>
          <input type="password" name="senhaLogin" id="senhaLogin" placeholder="Sua senha" maxlength="8">
          <div class="erroPSenha"></div>

          <div class="botoesLogin">
            <button class="btnEntrarLogin" type="submit" name="submitLogin" id="submitLogin">Entrar</button>
            <div class="checkbox-apple">
              <input type="reset" value="Limpar">
            </div>
          </div>
          <div class="btnLogin text-center mt-4">
            <p>Ainda não tem conta? <a href="cadastro.php" class="btnLoginCriarConta">Criar uma conta</a></p>
          </div>
      </div>
      </form>
    </section>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js" integrity="sha384-VEfXpzH12e3uJBmCloxZj0znuWtftAJjFf/Fnfy1oImMquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyE1aAHJAL+g7IqueF9NqF8fR8JF0Qno1b" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <!-- SWEET MODAL -->
  <script src="../../js/cadastro.js"></script>
</body>

</html>