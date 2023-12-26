<?php
include '../../includes/conexao.php';

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

function validarCPF($cpf)
{
  $cpf = preg_replace('/[^0-9]/is', '', $cpf);

  if (preg_match('/(\d)\1{10}/', $cpf)) {
    return false;
  }

  for ($t = 9; $t < 11; $t++) {
    for ($d = 0, $c = 0; $c < $t; $c++) {
      $d += $cpf[$c] * (($t + 1) - $c);
    }

    $d = ((10 * $d) % 11) % 10;

    if ($cpf[$c] != $d) {
      return false;
    }
  }

  return true;
}

function cpfExists($campo, $valor)
{
  global $conn;

  $sql = "SELECT * FROM usuario WHERE $campo = '$valor'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    return true;
  } else {
    return false;
  }
}

function validarCEP($cep)
{
  $cep = preg_replace('/[^0-9]/is', '', $cep);
  if (preg_match('/(\d)\1{7}/', $cep)) {
    return false;
  }
  return true;
}

function validarTelefone($telefone)
{
  $telefone = preg_replace('/[^0-9]/is', '', $telefone);
  if (preg_match('/(\d)\1{7}/', $telefone)) {
    return false;
  }
  return true;
}

function validarCelular($celular)
{
  $celular = preg_replace('/[^0-9]/is', '', $celular);
  if (preg_match('/(\d)\1{8}/', $celular)) {
    return false;
  }
  return true;
}

function verificarLoginSemNumeros($login)
{
  if (preg_match('/[0-9]/', $login)) {
    return false;
  }

  return true;
}

if (isset($_POST['submitCadastro'])) {
  $errors = array();

  $required_fields = array('nome', 'cpf', 'dtNascimento', 'sexo', 'telFixo', 'telCelular', 'cep', 'endereco', 'loginCadastro', 'nomeMaterno', 'senhaCadastro');

  foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
      $errors[] = "O campo $field é obrigatório.<br>";
    }
  }

  $senhaCadastro = $_POST["senhaCadastro"];
  $senhaConfirmarCadastro = $_POST["senhaConfirmarCadastro"];

  if ($senhaCadastro !== $senhaConfirmarCadastro) {
    $errors[] = "As senhas não correspondem.<br>";
  }

  if (!empty($errors)) {
    $error_message = implode(" ", $errors);
    header("Location: cadastro.php?msg=$error_message");
    exit();
  }

  if (!validarCPF($_POST['cpf'])) {
    $error_message = "CPF inválido. Por favor, insira um CPF válido.";
    header("Location: cadastro.php?msg=$error_message");
    exit();
  }

  $cpf = $_POST["cpf"];
  if (cpfExists('cpf', $cpf)) {
    $error_message = "O CPF informado já está cadastrado no sitema.";
    header("Location: cadastro.php?msg=$error_message");
    exit();
  }

  $cep = $_POST["cep"];
  if (!validarCEP($cep)) {
    $error_message = "O CEP informado não é válido.";
    header("Location: cadastro.php?msg=$error_message");
    exit();
  }

  $telefone = $_POST["telFixo"];
  if (!validarTelefone($telefone)) {
    $error_message = "O telefone informado não é válido.";
    header("Location: cadastro.php?msg=$error_message");
    exit();
  }

  $celular = $_POST["telCelular"];
  if (!validarCelular($celular)) {
    $error_message = "O celular informado não é válido.";
    header("Location: cadastro.php?msg=$error_message");
    exit();
  }

  $login = $_POST["loginCadastro"];
  if (!verificarLoginSemNumeros($login)) {
    $error_message = "O login não pode conter números.";
    header("Location: cadastro.php?msg=$error_message");
    exit();
  }

  $nomeMaterno = $_POST["nomeMaterno"];
  if (!verificarLoginSemNumeros($nomeMaterno)) {
    $error_message = "O Nome materno não pode conter números.";
    header("Location: cadastro.php?msg=$error_message");
    exit();
  }

  $nome = $_POST["nome"];
  if (!verificarLoginSemNumeros($nome)) {
    $error_message = "O Nome não pode conter números.";
    header("Location: cadastro.php?msg=$error_message");
    exit();
  }

  $senhaCadastro = $_POST["senhaCadastro"];
  if (!verificarLoginSemNumeros($senhaCadastro)) {
    $error_message = "A senha não pode conter números.";
    header("Location: cadastro.php?msg=$error_message");
    exit();
  }

  $nome = $_POST["nome"];
  $cpf = $_POST["cpf"];
  $dtNascimento = $_POST["dtNascimento"];
  $sexo = $_POST["sexo"];
  $telFixo = $_POST["telFixo"];
  $telCelular = $_POST["telCelular"];
  $cep = $_POST["cep"];
  $endereco = $_POST["endereco"];
  $loginCadastro = $_POST["loginCadastro"];
  $nomeMaterno = $_POST["nomeMaterno"];
  $senhaCadastro = $_POST["senhaCadastro"];
  $senhaConfirmarCadastro = $_POST["senhaConfirmarCadastro"];

  $sql = "INSERT INTO `usuario`(`nome`, `cpf`, `dtnascimento`, `sexo`, `telefone`, `celular`, `cep`, `endereco`, `login`, `nome_materno`, `senha`, `nivel`, `createdAt`) VALUES ('$nome','$cpf','$dtNascimento','$sexo','$telFixo','$telCelular','$cep','$endereco','$loginCadastro','$nomeMaterno','$senhaCadastro','user', NOW())";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: login.php?success=Um novo usuario foi cadastrado com sucesso.");
  } else {
    header("Location: cadastro.php?msg=Ocorreu um problema ao cadastrar um novo usuario, tente novamente mais tarde.");
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
  <div class="wrapper">
    <div class="cadastro">
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

      <form action="" method="POST" class="d-flex flex-column">
        <div class="row">
          <div class="col-md-12 col-lg-6">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite seu nome" minlength="15" maxlength="80">
          </div>
          <div class="col-md-12 col-lg-6">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" minlength="14" maxlength="14" onkeydown="ajustaCpf(this)" placeholder="Digite seu CPF ou CNPJ">
          </div>
        </div>

        <div class="row ">
          <div class="col-md-12 col-lg-6">
            <label for="dtNascimento">Data de Nascimento</label>
            <input type="date" name="dtNascimento" id="dtNascimento" min="1933-01-02" max="2005-12-31">
          </div>

          <div class="col-md-12 col-lg-6">
            <label for="sexo">Sexo</label>
            <select class="w-100 p-1" name="sexo" id="sexo">
              <option value="" selected="selected" disabled>Selecione um gênero</option>
              <option value="Masculino">Masculino</option>
              <option value="Feminino">Feminino</option>
              <option value="Outros">Outros</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-6">
            <label for="telFixo">Telefone</label>
            <input type="text" name="telFixo" id="telFixo" onkeydown="ajustaTelefone(this)" placeholder="(xx) xxxxx-xxxx" minlength="14" maxlength="14">
            <div class="erroTelefone"></div>
          </div>
          <div class="col-md-6 col-lg-6">
            <label for="telCelular">Celular</label>
            <input type="text" name="telCelular" id="telCelular" onkeydown="ajustaTelefone(this)" placeholder="(xx) xxxxx-xxxx" minlength="15" maxlength="15">
            <div class="erroCelular"></div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-6">
            <label for="cep">CEP</label>
            <input type="text" name="cep" id="cep" onkeydown="ajustaCEP(this)" placeholder="Digite o CEP" minlength="9" maxlength="9">
            <div class="erroCep"></div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" placeholder="Digite o seu endereço">
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-6">
            <label for="loginCadastro">Login</label>
            <input type="text" name="loginCadastro" id="loginCadastro" placeholder="Digite o login" minlength="6" maxlength="6">
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6">
            <label for="nomeMaterno">Nome Materno</label>
            <input type="text" name="nomeMaterno" id="nomeMaterno" placeholder="Nome Materno" minlength="15" maxlength="60">
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-6">
            <label for="senhaCadastro">Senha</label>
            <input type="text" name="senhaCadastro" id="senhaCadastro" placeholder="Digite sua senha" minlength="6" maxlength="8">
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6">
            <label for="senhaConfirmarCadastro">Confirmar Senha</label>
            <input type="text" name="senhaConfirmarCadastro" id="senhaConfirmarCadastro" placeholder="Confirmar sua senha" minlength="6" maxlength="8">
          </div>
        </div>

        <div class="formBotoes d-flex justify-content-between mt-2">
          <a href="login.php" class="formBotoes--Voltar">Voltar para login</a>
          <button class="formBotoes--Cadastrar" type="submit" name="submitCadastro" id="submitCadastro">Cadastrar</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <!-- SWEET MODAL -->
  <script src="../../js/cadastro.js"></script>
</body>

</html>