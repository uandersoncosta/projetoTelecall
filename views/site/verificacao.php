<?php
// Conexão com o banco de dados
include '../../includes/conexao.php';
include '../../includes/auth_check.php';

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$perguntas = [
  "Qual é o seu ano de nascimento?",
  "Qual é os 3 (três) primeiros dígitos do seu CPF?",
  "Qual é os 4 últimos dígitos do seu celular?"
];

if (!isset($_SESSION['perguntaAtual'])) {
  $_SESSION['perguntaAtual'] = $perguntas[array_rand($perguntas)];
}

$perguntaAtual = $_SESSION['perguntaAtual'];

// if (isset($_POST["submitVerificar"])) {

//   $verificacao = $_POST['verificacao'];
//   $user_id = $_SESSION['user_id'];

//   if ($perguntaAtual[0]) {
//     $queryAnoNascimento  = "SELECT YEAR(dtnascimento) AS dtnascimento FROM usuario WHERE id_usuario = $user_id";
//     $resultAnoNascimento = mysqli_query($conn, $queryAnoNascimento);

//     if ($resultAnoNascimento) {
//       $row = mysqli_fetch_assoc($resultAnoNascimento);
//       $ano_nascimento = $row['dtnascimento'];

//       if ($verificacao == $ano_nascimento) {
//         header("Location: ../dashboard/index.php");
//       } else {
//         $msg = "A resposta está incorreta.";
//       }
//     }
//   }

//   if ($perguntaAtual[1]) {
//     $queryCPF = "SELECT SUBSTRING(cpf, 1, 3) AS cpf FROM usuario WHERE id_usuario = $user_id";
//     $resultCPF = mysqli_query($conn, $queryCPF);

//     if ($resultCPF) {
//       $rowCPF = mysqli_fetch_assoc($resultCPF);
//       $cpfInicio = $rowCPF['cpf'];

//       if ($verificacao == $cpfInicio) {
//         header("Location: ../dashboard/index.php");
//         exit();
//       } else {
//         $msg = "A resposta está incorreta.";
//       }
//     }
//   }

//   if ($perguntaAtual[2]) {
//     $queryCelular = "SELECT SUBSTRING(celular, -4) AS celular FROM usuario WHERE id_usuario = $user_id";
//     $resultCelular = mysqli_query($conn, $queryCelular);

//     if ($resultCelular) {
//       $rowCelular = mysqli_fetch_assoc($resultCelular);
//       $celularFinal = $rowCelular['celular'];

//       if ($verificacao == $celularFinal) {
//         header("Location: ../dashboard/index.php");
//         exit();
//       } else {
//         $msg = "A resposta está incorreta.";
//       }
//     }
//   }

//   if (!isset($_SESSION['tentativas'])) {
//     $_SESSION['tentativas'] = 1;
//   } else {
//     $_SESSION['tentativas']++;

//     if ($_SESSION['tentativas'] == 2) {
//       header("Location: ../site/login.php");
//       session_unset();
//       session_destroy();
//     }
//   }
// }
if (isset($_POST["submitVerificar"])) {
  $verificacao = $_POST['verificacao'];
  $user_id = $_SESSION['user_id'];

  $query = "";
  $respostaCorreta = "";

  switch ($perguntaAtual) {
    case $perguntas[0]:
      $query = "SELECT YEAR(dtnascimento) AS resposta FROM usuario WHERE id_usuario = $user_id";
      break;

    case $perguntas[1]:
      $query = "SELECT SUBSTRING(cpf, 1, 3) AS resposta FROM usuario WHERE id_usuario = $user_id";
      break;

    case $perguntas[2]:
      $query = "SELECT SUBSTRING(celular, -4) AS resposta FROM usuario WHERE id_usuario = $user_id";
      break;
  }

  $result = mysqli_query($conn, $query);

  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $respostaCorreta = trim($row['resposta']);
    $verificacao = trim($verificacao);

    if (strcasecmp($verificacao, $respostaCorreta) == 0) {
      unset($_SESSION['perguntaAtual']);
      $_SESSION['verificacao_concluida'] = true;
      header("Location: ../dashboard/index.php");
      exit();
    } else {
      header("Location: verificacao.php?msg=A resposta está incorreta.");
    }
  } else {
    header("Location: login.php?msg=Erro ao consultar a resposta no banco de dados.");
  }

  if (!isset($_SESSION['tentativas'])) {
    $_SESSION['tentativas'] = 1;
  } else {
    $_SESSION['tentativas']++;

    if ($_SESSION['tentativas'] == 2) {
      header("Location: ../site/login.php?msg=Você excedeu seu limite de tentativas.");
      session_unset();
      session_destroy();
      exit();
    }
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

  <!-- LOGIN -->
  <div id="" class="content">
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
        <form action="" method="POST">
          <label for="verificacao"><?php echo $perguntaAtual; ?></label>
          <input type="text" name="verificacao" id="verificacao" placeholder="Sua Resposta">

          <div class="botoesLogin d-flex align-items-center justify-content-between">
            <button class="btnEntrarLogin" type="submit" name="submitVerificar" id="submitVerificar">Verificar</button>
          </div>
      </div>
      </form>
    </section>
  </div>


  <!-- BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <!-- SWEET MODAL -->
  <script src="../../js/cadastro.js"></script>
</body>

</html>