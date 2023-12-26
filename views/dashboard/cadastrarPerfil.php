<?php

include "../../includes/conexao.php";
include '../../includes/auth_check.php';

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

if (isset($_POST['submit'])) {
  $errors = array();

  $required_fields = array('nome', 'cpf', 'dtNascimento', 'sexo', 'telFixo', 'telCelular', 'cep', 'endereco', 'login', 'nomeMaterno', 'senha');
  foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
      $errors[] = "O campo $field é obrigatório.<br>";
    }
  }

  if (!empty($errors)) {
    $error_message = implode(" ", $errors);
    header("Location: cadastrarPerfil.php?msg=$error_message");
    exit();
  }

  if (!validarCPF($_POST['cpf'])) {
    $error_message = "CPF inválido. Por favor, insira um CPF válido.";
    header("Location: cadastrarPerfil.php?msg=$error_message");
    exit();
  }

  $cpf = $_POST["cpf"];
  if (cpfExists('cpf', $cpf)) {
    $error_message = "O CPF informado já está cadastrado no sitema.";
    header("Location: cadastrarPerfil.php?msg=$error_message");
    exit();
  }

  $cep = $_POST["cep"];
  if (!validarCEP($cep)) {
    $error_message = "O CEP informado não é válido.";
    header("Location: cadastrarPerfil.php?msg=$error_message");
    exit();
  }

  $telefone = $_POST["telFixo"];
  if (!validarTelefone($telefone)) {
    $error_message = "O telefone informado não é válido.";
    header("Location: cadastrarPerfil.php?msg=$error_message");
    exit();
  }

  $celular = $_POST["telCelular"];
  if (!validarCelular($celular)) {
    $error_message = "O celular informado não é válido.";
    header("Location: cadastrarPerfil.php?msg=$error_message");
    exit();
  }

  $login = $_POST["login"];
  if (!verificarLoginSemNumeros($login)) {
    $error_message = "O login não pode conter números.";
    header("Location: cadastrarPerfil.php?msg=$error_message");
    exit();
  }

  $senhaCadastro = $_POST["senha"];
  if (!verificarLoginSemNumeros($senhaCadastro)) {
    $error_message = "A senha não pode conter números.";
    header("Location: cadastrarPerfil.php?msg=$error_message");
    exit();
  }

  $nomeMaterno = $_POST["nomeMaterno"];
  if (!verificarLoginSemNumeros($nomeMaterno)) {
    $error_message = "O Nome materno não pode conter números.";
    header("Location: cadastrarPerfil.php?msg=$error_message");
    exit();
  }

  $nome = $_POST["nome"];
  if (!verificarLoginSemNumeros($nome)) {
    $error_message = "O Nome não pode conter números.";
    header("Location: cadastrarPerfil.php?msg=$error_message");
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
  $loginCadastro = $_POST["login"];
  $nomeMaterno = $_POST["nomeMaterno"];
  $senhaCadastro = $_POST["senha"];

  $sql = "INSERT INTO `usuario`(`nome`, `cpf`, `dtnascimento`, `sexo`, `telefone`, `celular`, `cep`, `endereco`, `login`, `nome_materno`, `senha`, `nivel`, `createdAt`) VALUES ('$nome','$cpf','$dtNascimento','$sexo','$telFixo','$telCelular','$cep','$endereco','$loginCadastro','$nomeMaterno','$senhaCadastro','user', NOW())";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: listar.php?msg=Um novo usuario foi cadastrado com sucesso.");
  } else {
    header("Location: cadastrarPerfil.php?msg=Ocorreu um problema ao atualizar os dados, tente novamente mais tarde.");
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../imgs/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Cadastrar Perfil - Dashboard - Telecall</title>
</head>

<body>
  <!-- INICIO NAVBAR -->

  <?php
  require_once '../../includes/navbar.php'
  ?>
  <!-- FIM NAVBAR -->

  <!-- INICIO DO CONTEUDO -->
  <div class="content">
    <?php
    require_once '../../includes/sidebar.php'
    ?>

    <div class="wrapper">
      <div class="roww">
        <div class="top-list">
          <span class="title-content">Cadastrar Perfil</span>
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

        <form class="content-adm-editarPerfil" action="" method="post">
          <div class="editarPerfil">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" minlength="15" maxlength="40">
          </div>

          <div class="editarPerfil">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" onkeydown="ajustaCpf(this)" minlength="14" maxlength="14">
          </div>

          <div class="editarPerfil">
            <label for="dtNascimento">Data de Nascimento:</label>
            <input type="date" name="dtNascimento" id="dtNascimento" min="1933-01-02" max="2005-12-31">
          </div>

          <div class="editarPerfil">
            <label for="sexo">Sexo</label>
            <select class="select_editarPerfil" name="sexo" id="sexo">
              <option value="" selected="selected" disabled>Selecione um gênero</option>
              <option value="Masculino">Masculino</option>
              <option value="Feminino">Feminino</option>
              <option value="Outros">Outros</option>
            </select>
          </div>

          <div class="editarPerfil">
            <label for="telFixo">Tel.Fixo:</label>
            <input type="text" name="telFixo" id="telFixo" onkeydown="ajustaTelefone(this)" minlength="14" maxlength="14">
          </div>

          <div class="editarPerfil">
            <label for="telCelular">Tel.Celular:</label>
            <input type="text" name="telCelular" id="telCelular" onkeydown="ajustaTelefone(this)" minlength="15" maxlength="15">
          </div>

          <div class="editarPerfil">
            <label for="endereco">CEP:</label>
            <input type="text" name="cep" id="endereco" onkeydown="ajustaCEP(this)" minlength="9" maxlength="9">
          </div>

          <div class="editarPerfil">
            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" id="endereco">
          </div>

          <div class="editarPerfil">
            <label for="nomeMaterno">Nome Materno:</label>
            <input type="text" name="nomeMaterno" id="nomeMaterno" minlength="15" maxlength="60">
          </div>

          <div class="editarPerfil">
            <label for="login">Login:</label>
            <input type="text" name="login" id="login" minlength="6" maxlength="6">
          </div>

          <div class="editarPerfil">
            <label for="senha">Senha:</label>
            <input type="text" name="senha" id="senha" minlength="6" maxlength="8">
          </div>

          <div class="editarPerfil">
          </div>

          <div class="editarPerfil--botoes">
            <button type="submit" name="submit" class="btn-sucess">Salvar</button>
            <a href="listar.php" class="btn-danger">Cancelar</a>
          </div>
        </form>



      </div>
    </div>


  </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>