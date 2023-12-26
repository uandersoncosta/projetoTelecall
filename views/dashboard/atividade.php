<?php

require '../../includes/conexao.php';
include '../../includes/auth_check.php';

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
          <span class="title-content">Atividades do sistema</span>
        </div>

        <table class="table-list">
          <thead class="list-head">
            <tr>
              <th class="list-head-content">Nome</th>
              <th class="list-head-content">Login</th>
              <th class="list-head-content">Modificou</th>
            </tr>
          </thead>
          <tbody class="list-body">
            <tr>
              <td>Alicia</td>
              <td>Logou</td>
            </tr>
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