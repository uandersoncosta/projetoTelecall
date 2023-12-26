<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="imgs/favicon.ico" type="image/x-icon">

  <!-- FONT MONTSERRAT -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <!-- Option 1: Include in HTML -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../css/global.css">
  <link rel="stylesheet" href="../../css/2fa.css">
  <title>2FA - Telecall</title>
</head>

<body>
  <header>
    <ul class="menuAntes">
      <li><a href="https://api.whatsapp.com/send?phone=552130301010&text=%23Comercial" target="_blank">Whatsapp</a></li>
      <li><a href="faq.php">FAQ</a></li>
      <li><a href="">Contato</a></li>
      <li>
        <div class="increMinusFont">
          <img class="btnMinus" src="../../imgs/minus.png" alt="">
          <img src="../../imgs/font.png" alt="">
          <img class="btnPlus" src="../../imgs/plus.png" alt="">
        </div>
      </li>
      <li><img class="btnModoDark" onclick="mododark()" src="../../imgs/moon.png" alt=""></li>
    </ul>

    <nav>
      <a class="logoImgNav" href="index.php"><img src="../../imgs/telecallLogo.png" alt="Logo-TeleCall"></a>
      <ul>
        <li><a href="../../index.php">Home</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cpaas
          </a>
          <ul class="menuDropDown dropdown-menu">
            <li><a class="dropdown-item" href="cpa.php">O que é?</a></li>
            <li><a class="dropdown-item" href="#">Utilização</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            2FA
          </a>
          <ul class="menuDropDown dropdown-menu">
            <li><a class="dropdown-item" href="#">O que é?</a></li>
            <li><a class="dropdown-item" href="#">Utilização</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="index.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Plataforma e Soluções
          </a>
          <ul class="menuDropDown dropdown-menu">
            <li><a class="dropdown-item" href="numerodemascara.php">Número
                Máscara</a></li>
            <li><a class="dropdown-item" href="google.php">Google
                Verified Calls</a></li>
            <li><a class="dropdown-item" href="smsprogramavel.php">SMS
                Programável</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav-item dropdown">
        <?php
        if (isset($_SESSION['user_login'])) {
          echo $_SESSION['user_login'] .
            "<a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
              </a>
              <li class='menuDropDown dropdown-menu'>
                <a href='../dashboard/index.php' class='dropdown-item'> Dashboard </a>
                <a href='../dashboard/logout.php' class='dropdown-item'> Sair</a>
              </li>";
        } else {
          echo "<a class='btnLoginInicial bn18' href='views/site/login.php'> Login </a>";
        }
        ?>
      </ul>
      <img class="menuMobile" src="imgs/menuMobile.png" alt="Menu Mobile">
    </nav>
  </header>

  <main>

    <section class="oqueecpaas">
      <img src="../../imgs/2FAP/2FA.png">
      <div>
        <h1>O que é <span>2FA</span>?</h1>../../
        <p>A autenticação de dois fatores (2FA) é um método de segurança que requer dois elementos distintos para
          permitir uma ação. O primeiro elemento é a senha inserida pelo usuário, enquanto o segundo elemento pode
          variar e incluir token, impressão digital, reconhecimento facial, código enviado por SMS e outras opções.<br>

          <br>
          O objetivo do 2FA é adicionar uma camada extra de proteção à autenticação, além da tradicional senha. Ao
          exigir um segundo fator de autenticação, o sistema torna mais difícil para invasores acessarem informações ou
          realizar ações em nome do usuário, mesmo que a senha seja comprometida. <br>

          <br>
          Com o 2FA, mesmo se alguém descobrir ou roubar a senha de um usuário, ainda seria necessário fornecer o
          segundo fator de autenticação para obter acesso. Isso aumenta significativamente a segurança, pois é
          improvável que um invasor possua os dois fatores de autenticação necessários.
        </p>
      </div>
    </section>

    <section class="oquee2faContinuação">
      <div>
        <h2>O 2FA permite que você:</h2>
        <ul>
          <li><span>Envie</span> uma senha via SMS, voz ou e-mail para autenticação do usuário</li>
          <li><span>Adicione</span> uma camada extra de segurança além da senha pessoal.</li>
          <li><span>Ofereça</span> maior segurança para usuários.</li>
        </ul>
      </div>
    </section>

    <section class="faBeneficios">
      <div>
        <h2>Fortaleça a estratégia de segurança de seu negócio</h2>
        <h6>Adicionar um número de telefone de recuperação a uma
          conta individual pode bloquear até:</h6>
        <p><span>100%</span> dos bots automatizados,</p>
        <p><span>99%</span> dos ataques de phishing em massa,</p>
        <p><span>66%</span> dos ataques direcionados.</p>
      </div>
    </section>

    <section class="cpaasUtilizacoes2">
      <div>
        <img src="../../imgs/2FAP/computador.png" alt="">
        <p>Usuário acessa seu site o aplicativo e digita a senha cadastrada para entrar em seu perfil ou completar uma
          transação.
        </p>
      </div>
      <div>
        <img src="../../imgs/2FAP/alerta.png" alt="">
        <p>A Telecall recebe a tentativa de login e solicita que o usuário insira seu número de telefone para autorizar
          o acesso.</p>
      </div>
      <div>
        <img src="../../imgs/2FAP/smartphone.png" alt="">
        <p>Após inserir seu número, a Telecall envia para o usuário por SMS, chamada ou e-mail um código PIN de uso
          único.</p>
      </div>
      <div>
        <img src="../../imgs/2FAP/computadorSucess.png" alt="">
        <p>O usuário insere o código no site ou aplicativo para concluir o processo de verificação.</p>
      </div>
    </section>

    <section class="pqTeleCall">
      <div>
        <h2>Benefícios</h2>
        <ul>
          <li>Ofereça segurança aprimorada para seus clientes.</li>
          <li>Reduza casos de fraude e invasões e evite o acesso a dados por invasores.</li>
          <li>Envio de OTP por meio de vários canais, incluindo SMS, voz ou e-mail.</li>
          <li>Flexibilidade de canais garante que o usuário conseguirá completar a tarefa desejada mesmo quando tiver
            problema com um deles. Exemplo: Enviar OTP por SMS, em caso de falha, enviar OTP por chamada de voz, em caso
            de outra falha, enviar por e-mail.</li>
          <li>API simples e de rápida implementação.</li>
          <li>Plataforma intuitiva que permite visualizar relatórios de uso por dia, mês ou ano e pesquisar usando
            diversos critérios de filtro.implementação.</li>
        </ul>
      </div>
    </section>

    <footer>
      <div class="footercontato">
        <img class="footerHeader__img" src="../../imgs/telecallLogo.png" alt="Logo Footer">
        <p>Entre em contato para futuro trabalhos.</p>
        <a class="btnFooter" href="">Contato</a>
      </div>

      <div class="footerNavbar">
        <div>
          <h1>Cpaas</h1>
          <ul>
            <li><a href="../views/site/cpa.php">O que é?</a></li>
            <li><a href="../views/site/cpa.php">Utilização</a></li>
          </ul>
        </div>
        <div>
          <h1>2FA</h1>
          <ul>
            <li><a href="../views/site/2fa.php">O que é?</a></li>
            <li><a href="../views/site/2fa.php">Utilização</a></li>
          </ul>
        </div>
        <div>
          <h1>Plataforma e Soluções</h1>
          <ul>
            <li><a href="../views/site/numerodemascara.php">Número
                Máscara</a></li>
            <li><a href="../views/site/google.php">Google
                Verified Calls</a></li>
            <li><a href="../views/site/cpa.php">SMS
                Programável</a></li>
          </ul>
        </div>
      </div>
    </footer>

    <section class="footerAfter">
      <p>Copyright © 2023. Todos os direitos reservados.</p>
      <div class="footerAfter--icons">
        <a href="" target="_blank"><i class="bi bi-facebook"></i></a>
        <a href="" target="_blank"><i class="bi bi-instagram"></i></a>
        <a href="" target="_blank"><i class="bi bi-linkedin"></i></a>
        <a href="" target="_blank"><i class="bi bi-youtube"></i></a>
      </div>
    </section>


  </main>

  <!-- BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script>
    const mododark = () => {
      const varDark = localStorage.getItem("modoDark");
      if (varDark) {
        document.body.classList.remove("dark");
        localStorage.removeItem("modoDark");
        btnModoDark.setAttribute("src", "imgs/moon.png");
      } else {
        localStorage.setItem("modoDark", "dark");
        document.body.classList.add("dark");
        btnModoDark.setAttribute("src", "imgs/sun.png");
      }
    };

    const increase = document.querySelector(".btnPlus");
    const decrease = document.querySelector(".btnMinus");

    increase.addEventListener("click", () => {
      document.body.style.fontSize = 150 + "%";
    })

    decrease.addEventListener("click", () => {
      document.body.style.fontSize = 100 + "%";
    })

    const btnMenuMobile = document.querySelector(".menuMobile");
    const navUlMobile = document.querySelector("nav ul");
    const menuMobile = () => {
      if (btnMenuMobile.classList.contains('open')) {
        btnMenuMobile.classList.remove("open")
        navUlMobile.classList.remove("open")
      } else {
        btnMenuMobile.classList.add("open")
        navUlMobile.classList.add("open")
      }
    }

    btnMenuMobile.addEventListener("click", menuMobile)
  </script>
  <script src="../../js/cadastro.js"></script>
</body>

</html>