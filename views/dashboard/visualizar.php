<?php
include("../../includes/conexao.php");
session_start();

if ($_SESSION['user_level'] != "adm") {
  header("Location: http://localhost/projetoTelecall/views/dashboard/index.php");
  exit();
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM `usuario` WHERE `id_usuario` = $id";
  $result = mysqli_query($conn, $sql);
  $roww = mysqli_fetch_assoc($result);

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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../imgs/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <a href="editarPerfil.php?id=<?php echo $roww['id_usuario'] ?>" class="btn-warning">Editar</a>
          </div>
        </div>

        <div class="content-adm-perfil">
          <?php
          $sql = "SELECT * FROM usuario WHERE id_usuario = $id";
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
              <span><?php echo formatarData($row['dtnascimento']) ?></span>
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

          <div class="perfil-editar">
            <span class="perfil-editar-title">Última vez logado:</span>
            <span class="perfil-editar-info"><?php echo formatarData($row['loggedAt']) ?></span>
          </div>

          <div class="perfil-editar">
            <span class="perfil-editar-title">Conta criada em:</span>
            <span class="perfil-editar-info"><?php echo formatarData($row['createdAt']) ?></span>
          </div>

          <div class="perfil-editar">
            <span class="perfil-editar-title">Dados modificados em:</span>
            <span class="perfil-editar-info"><?php echo formatarData($row['modifyAt']) ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>


  <script src="script.js"></script>
</body>

</html>