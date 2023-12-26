<?php

require '../../includes/conexao.php';
include '../../includes/auth_check.php';

if ($_SESSION['user_level'] != "adm") {
  header("Location: http://localhost/projetoTelecall/views/dashboard/index.php");
  exit();
}

if (isset($_GET["id"])) {

  if (is_numeric($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM `usuario` WHERE id_usuario = $id";
    $result = mysqli_query($conn, $sql);


    if ($result) {
      header("Location: listar.php?msg=Usuario excluido com sucesso!");
      exit();
    } else {
      header("Location: listar.php?msg=Ocorreu um erro ao excluir o usuario. Tente novamente mais tarde.");
      exit();
    }
  }
}

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
          <span class="title-content">Listar</span>
          <div class="top-list-right">
            <a href="cadastrarPerfil.php" class="btn-sucess_listar">Cadastrar</a>
            <a href="../../includes/pdf.php" class="btn-info" target="_blank"><i class="fa-solid fa-file-arrow-down"></i>PDF</a>
          </div>
        </div>

        <div class="table-top-menu">
          <form method="GET" class="input-group">
            <input type="text" class="form-control" placeholder="Pesquisar" name="search">
            <div class="input-group-append">
              <button class="btn btn-secondary" type="submit">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </form>
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



        <table class="table-list">
          <thead class="list-head">
            <tr>
              <th class="list-head-content">Nome</th>
              <th class="list-head-content">CPF</th>
              <th class="list-head-content">Sexo</th>
              <th class="list-head-content">Data de Nascimento</th>
              <th class="list-head-content">Tel.Celular</th>
              <th class="list-head-content">Ações</th>
            </tr>
          </thead>
          <tbody class="list-body">

            <?php

            if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['search'])) {
              $search = mysqli_real_escape_string($conn, $_GET['search']);
              $search = str_replace('.', '', $search);
              $search = str_replace('-', '', $search);
              $sql = "SELECT * FROM usuario WHERE nome LIKE '%$search%' OR REPLACE(REPLACE(cpf, '.', ''), '-', '') LIKE '%$search%'";
              $result = mysqli_query($conn, $sql);

              if (!$result) {
                die('Erro na consulta: ' . mysqli_error($conn));
              }
              if (mysqli_num_rows($result) == 0) {
                echo '<div class="alert alert-danger" role="alert">Nenhum resultado encontrado para a pesquisa realizada.</div>';
              }
            } else {
              $sql = "SELECT * FROM usuario WHERE id_usuario > 1";
              $result = mysqli_query($conn, $sql);

              if (!$result) {
                die('Erro na consulta: ' . mysqli_error($conn));
              }
            }

            while ($data = mysqli_fetch_array($result)) {
              if ($data['id_usuario'] > 1) {
            ?>
                <tr>
                  <td class="list-body-content"><?php echo $data['nome']; ?></td>
                  <td class="list-body-content"><?php echo $data['cpf']; ?></td>
                  <td class="list-body-content"><?php echo $data['sexo']; ?></td>
                  <td class="list-body-content"><?php echo formatarData($data['dtnascimento']) ?></td>
                  <td class="list-body-content"><?php echo $data['celular']; ?></td>
                  <td class="list-body-content">

                    <a type="button" href="visualizar.php?id=<?php echo $data['id_usuario'] ?>" class="btn-info-vz">
                      <i class="fa-solid fa-eye"></i>
                      <span class="tooltipText btnVisualizar">Visualizar</span></a>
                    <a type="button" href="editarPerfil.php?id=<?php echo $data['id_usuario'] ?>" class="btn-warning">
                      <i class="fa-solid fa-user-pen"></i><span class="tooltipText">Editar</span></a>
                    <a class="btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo $data['id_usuario']; ?>" data-bs-userid="<?php echo $data['id_usuario']; ?>">
                      <i class="fa-solid fa-trash-can"></i>
                      <span class="tooltipText">Apagar</span>
                    </a>
                  </td>
                </tr>

                <div class="modal fade" id="exampleModal-<?php echo $data['id_usuario']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Tem certeza que deseja excluir o cliente
                        <p><?php echo $data['nome']; ?></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <a type="button" href="?id=<?php echo $data['id_usuario'] ?>" class="btn btn-danger">Excluir</a>
                      </div>
                    </div>
                  </div>
                </div>
            <?php
              }
            }
            ?>


          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>