<?php
include '../../includes/conexao.php';
include '../../includes/auth_check.php';

$user_level = $_SESSION['user_level'];
if ($user_level == "adm") {
  $id = $_GET['id'];
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

  $user_id = $_SESSION['user_id'];
  $user_level = $_SESSION['user_level'];

  $required_fields = array('nome', 'cpf', 'dtNascimento', 'sexo', 'telFixo', 'telCelular', 'cep', 'endereco', 'login', 'nomeMaterno', 'senha');
  foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
      $errors[] = "O campo $field é obrigatório.<br>";
    }
  }

  if (!empty($errors)) {
    $error_message = implode(" ", $errors);
    if ($user_level == 'adm') {
      header("Location: editarPerfil.php?id=$id&msgerror=$error_message");
    } else {
      header("Location: editarPerfil.php?msgerror=$error_message");
    }
    exit();
  }

  $cep = $_POST["cep"];
  if (!validarCEP($cep)) {
    $error_message = "O CEP informado não é válido.";
    if ($user_level == 'adm') {
      header("Location: editarPerfil.php?id=$id&msgerror=$error_message");
    } else {
      header("Location: editarPerfil.php?msgerror=$error_message");
    }
    exit();
  }

  $telefone = $_POST["telFixo"];
  if (!validarTelefone($telefone)) {
    $error_message = "O telefone informado não é válido.";
    if ($user_level == 'adm') {
      header("Location: editarPerfil.php?id=$id&msgerror=$error_message");
    } else {
      header("Location: editarPerfil.php?msgerror=$error_message");
    }
    exit();
  }

  $celular = $_POST["telCelular"];
  if (!validarCelular($celular)) {
    $error_message = "O celular informado não é válido.";
    if ($user_level == 'adm') {
      header("Location: editarPerfil.php?id=$id&msgerror=$error_message");
    } else {
      header("Location: editarPerfil.php?msgerror=$error_message");
    }
    exit();
  }

  $login = $_POST["login"];
  if (!verificarLoginSemNumeros($login)) {
    $error_message = "O login não pode conter números.";
    if ($user_level == 'adm') {
      header("Location: editarPerfil.php?id=$id&msgerror=$error_message");
    } else {
      header("Location: editarPerfil.php?msgerror=$error_message");
    }
    exit();
  }

  $nomeMaterno = $_POST["nomeMaterno"];
  if (!verificarLoginSemNumeros($nomeMaterno)) {
    $error_message = "O Nome materno não pode conter números.";
    if ($user_level == 'adm') {
      header("Location: editarPerfil.php?id=$id&msgerror=$error_message");
    } else {
      header("Location: editarPerfil.php?msgerror=$error_message");
    }
    exit();
  }

  $nomeMaterno = $_POST["nome"];
  if (!verificarLoginSemNumeros($nomeMaterno)) {
    $error_message = "O nome não pode conter números.";
    if ($user_level == 'adm') {
      header("Location: editarPerfil.php?id=$id&msgerror=$error_message");
    } else {
      header("Location: editarPerfil.php?msgerror=$error_message");
    }
    exit();
  }

  $senhaCadastro = $_POST["senha"];
  if (!verificarLoginSemNumeros($senhaCadastro)) {
    $error_message = "A senha não pode conter números.";
    if ($user_level == 'adm') {
      header("Location: editarPerfil.php?id=$id&msgerror=$error_message");
    } else {
      header("Location: editarPerfil.php?msgerror=$error_message");
    }
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

  $user_id = $_SESSION['user_id'];
  $user_level = $_SESSION['user_level'];

  if ($user_level == 'adm') {
    $sql = "UPDATE `usuario` SET `nome`='$nome',`cpf`='$cpf',`dtnascimento`='$dtNascimento',`sexo`='$sexo',`telefone`='$telFixo',`celular`='$telCelular',`cep`='$cep',`endereco`='$endereco',`login`='$loginCadastro',`nome_materno`='$nomeMaterno',`senha`='$senhaCadastro',`nivel`='user', `modifyAt`= NOW() WHERE id_usuario=$id";
  } else {
    $sql = "UPDATE `usuario` SET `nome`='$nome',`cpf`='$cpf',`dtnascimento`='$dtNascimento',`sexo`='$sexo',`telefone`='$telFixo',`celular`='$telCelular',`cep`='$cep',`endereco`='$endereco',`login`='$loginCadastro',`nome_materno`='$nomeMaterno',`senha`='$senhaCadastro',`nivel`='user', `modifyAt`= NOW() WHERE id_usuario=$user_id";
  }

  $result = mysqli_query($conn, $sql);

  if ($result) {
    if ($user_level == 'adm') {
      header("Location: listar.php?msg=Os dados foram atualizados com sucesso.");
    } else {
      header("Location: perfil.php?msg=Os dados foram atualizados com sucesso.");
    }
  } else {
    header("Location: editarPerfil.php?msgerror=Ocorreu um problema ao atualizar os dados, tente novamente mais tarde.");
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
  <title>Editar Perfil - Dashboard - Telecall</title>
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
          <span class="title-content">Editar Perfil</span>
        </div>

        <?php
        if (isset($_GET['msg'])) {
          $msg = $_GET['msg'];
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>' . $msg . '</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        ?>

        <?php
        if (isset($_GET['msgerror'])) {
          $msgerror = $_GET['msgerror'];
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>' . $msgerror . '</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        ?>

        <form class="content-adm-editarPerfil" action="" method="post">
          <?php
          if ($user_level == "adm") {
            $id = $_GET['id'];
          }
          $user_id = $_SESSION['user_id'];
          $user_level = $_SESSION['user_level'];
          if ($user_level == 'adm') {
            $sql = "SELECT * FROM usuario WHERE id_usuario = $id";
          } else {
            $sql = "SELECT * FROM usuario WHERE id_usuario = $user_id";
          }
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          ?>

          <div class="editarPerfil">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" minlength="15" maxlength="40" value="<?php echo $row['nome'] ?>">
          </div>

          <div class="editarPerfil">
            <label for="cpf">CPF:</label>
            <?php if ($user_level == "adm") {
            ?>
              <input type="text" name="cpf" id="cpf" value="<?php echo $row['cpf'] ?>">
            <?php } else { ?>
              <input type="text" name="cpf" id="cpf" value="<?php echo $row['cpf'] ?>" readonly>
            <?php } ?>
          </div>

          <div class="editarPerfil">
            <label for="dtNascimento">Data de Nascimento:</label>
            <input type="date" name="dtNascimento" id="dtNascimento" min="1933-01-02" max="2005-12-31" value="<?php echo $row['dtnascimento'] ?>">
          </div>

          <div class="editarPerfil">
            <label for="sexo">Sexo:</label>
            <select class="select_editarPerfil" name="sexo" id="sexo">
              <option value="" selected="selected" disabled>Selecione um gênero</option>
              <option value="Masculino" <?php echo ($row['sexo'] == 'Masculino') ? "selected" : '' ?>>Masculino</option>
              <option value="Feminino" <?php echo ($row['sexo'] == 'Feminino') ? "selected" : '' ?>>Feminino</option>
              <option value="Outros" <?php echo ($row['sexo'] == 'Outros') ? "selected" : '' ?>>Outros</option>
            </select>
          </div>

          <div class="editarPerfil">
            <label for="telFixo">Tel.Fixo:</label>
            <input type="text" name="telFixo" id="telFixo" onkeydown="ajustaTelefone(this)" value="<?php echo $row['telefone'] ?>" minlength="14" maxlength="14">
          </div>

          <div class="editarPerfil">
            <label for="telCelular">Tel.Celular:</label>
            <input type="text" name="telCelular" id="telCelular" onkeydown="ajustaTelefone(this)" value="<?php echo $row['celular'] ?>" minlength="15" maxlength="15">
          </div>

          <div class="editarPerfil">
            <label for="endereco">CEP:</label>
            <input type="text" name="cep" id="endereco" onkeydown="ajustaCEP(this)" minlength="9" maxlength="9" value="<?php echo $row['cep'] ?>">
          </div>

          <div class="editarPerfil">
            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" id="endereco" value="<?php echo $row['endereco'] ?>">
          </div>

          <div class="editarPerfil">
            <label for="nomeMaterno">Nome Materno:</label>
            <input type="text" name="nomeMaterno" id="nomeMaterno" value="<?php echo $row['nome_materno'] ?>" minlength="15" maxlength="60">
          </div>

          <div class="editarPerfil">
            <label for="login">Login:</label>
            <input type="text" name="login" id="login" value="<?php echo $row['login'] ?>" minlength="6" maxlength="6">
          </div>

          <div class="editarPerfil">
            <label for="senha">Senha:</label>
            <input type="text" name="senha" id="senha" value="<?php echo $row['senha'] ?>" minlength="6" maxlength="8">
          </div>

          <div class="editarPerfil">
          </div>

          <div class="editarPerfil--botoes">
            <button type="submit" name="submit" class="btn-sucess">Salvar</button>
            <?php if ($user_id <= 1) { ?>
              <a href="listar.php" class="btn-danger">Cancelar</a>
            <?php } else {
            ?>
              <a href="perfil.php" class="btn-danger">Cancelar</a>
            <?php } ?>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="../../js/cadastro.js"></script>
  <script src="script.js"></script>
</body>

</html>