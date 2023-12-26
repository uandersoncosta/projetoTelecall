<?php
include '../../includes/auth_check.php';

include("../../includes/conexao.php");

// $id = $_GET['id'];

function formatarData($data)
{
  if (!empty($data)) {
    $timestamp = strtotime($data);
    if (date('H:i:s', $timestamp) == '00:00:00') {
      return date('d/m/Y', $timestamp);
    } else {
      return date('d/m/Y H:i:s', $timestamp);
    }
  }
  return '';
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
  <title>Area Administrativa</title>
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
          <span class="title-content">Perfil</span>
          <div class="top-list-right">
            <a href="editarPerfil.php" class="btn-warning">Editar</a>
          </div>
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

        <div class="content-adm-perfil">
          <?php
          $user_id = $_SESSION['user_id'];
          $sql = "SELECT * FROM usuario WHERE id_usuario = $user_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          ?>
          <div class="perfil-editar">
            <span class="perfil-editar-title">Nome:</span>
            <span class="perfil-editar-info"><?php echo $row['nome'] ?></span>
          </div>

          <div class="perfil-editar">
            <span class="perfil-editar-title">CPF:</span>
            <span class="perfil-editar-info"><?php echo $row['cpf'] ?></span>
          </div>

          <div class="perfil-editar">
            <span class="perfil-editar-title">Data de Nascimento:</span>
            <span class="perfil-editar-info">
              <span><?php echo formatarData($row['dtnascimento'])  ?></span>
          </div>

          <div class="perfil-editar">
            <span class="perfil-editar-title">Sexo:</span>
            <span class="perfil-editar-info"><?php echo $row['sexo'] ?></span>
          </div>

          <div class="perfil-editar">
            <span class="perfil-editar-title">Tel.Fixo:</span>
            <span class="perfil-editar-info"><?php echo $row['telefone'] ?></span>
          </div>

          <div class="perfil-editar">
            <span class="perfil-editar-title">Tel.Celular:</span>
            <span class="perfil-editar-info"><?php echo $row['celular'] ?></span>
          </div>

          <div class="perfil-editar">
            <span class="perfil-editar-title">Nome Materno:</span>
            <span class="perfil-editar-info"><?php echo $row['nome_materno'] ?></span>
          </div>

          <div class="perfil-editar">
            <span class="perfil-editar-title">Cep:</span>
            <span class="perfil-editar-info"><?php echo $row['cep'] ?></span>
          </div>

          <div class="perfil-editar">
            <span class="perfil-editar-title">Endereço:</span>
            <span class="perfil-editar-info"><?php echo $row['endereco'] ?></span>
          </div>

          <div class="perfil-editar">
            <span class="perfil-editar-title">Login:</span>
            <span class="perfil-editar-info"><?php echo $row['login'] ?></span>
          </div>

          <div class="perfil-editar">
            <span class="perfil-editar-title">Senha:</span>
            <span class="perfil-editar-info"><?php echo $row['senha'] ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>