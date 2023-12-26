<?php
include '../../includes/auth_check.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
  header("Location: ../site/verificacao.php");
  exit();
}

// Verifica se o usuário não é um administrador (você pode ajustar a lógica conforme necessário)
if ($_SESSION['user_level'] !== 'adm') {
  // Verifica se a verificação não foi concluída
  if (empty($_SESSION['verificacao_concluida'])) {
    header("Location: ../site/verificacao.php");
    exit();
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
  <title>Dashboard - Telecall</title>
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
      <div class="row">
        <h1>Bem vindo ao dashboard</h1>
      </div>
    </div>
  </div>

  <script src="script.js"></script>
</body>

</html>