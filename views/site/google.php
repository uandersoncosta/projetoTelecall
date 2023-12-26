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
  <title>Google verified - Telecall</title>
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
          <a class="nav-link dropdown-toggle" href="2fa.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            2FA
          </a>
          <ul class="menuDropDown dropdown-menu">
            <li><a class="dropdown-item" href="2fa.php">O que é?</a></li>
            <li><a class="dropdown-item" href="2fa.php">Utilização</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="index.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Plataforma e Soluções
          </a>
          <ul class="menuDropDown dropdown-menu">
            <li><a href="numerodemascara.php" class="dropdown-item">Número
                Máscara</a></li>
            <li><a href="google.php" class="dropdown-item">Google
                Verified Calls</a></li>
            <li><a href="smsprogramavel.php" class="dropdown-item">SMS
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
      <img src="../../imgs/googleVerification/App development-pana.png" alt="">
      <div>
        <h1>O que é <span>Google Verified?</span></h1>
        <p>Esse novo recurso do Google, exclusivo para telefones Android, permite que empresas exibam para o cliente na
          hora da chamada sua marca, logotipo e até mesmo o motivo da chamada. A Telecall é a primeira operadora de
          telecom no Brasil a oferecer esse recurso do Google.</p>
      </div>
    </section>

    <section class="oqueecpaasContinuação">
      <div>
        <p>Compatibilidade
          Exclusivo para sistema operacional Android através do aplicativo Telefone. • Pré-instalado em telefones mais
          recentes ou pode ser baixado do Google Play Store para a maioria dos dispositivos com Android 9.0. • Hoje no
          Brasil existem quase 239 milhões de celulares smartphone ativos, sendo que o sistema Android detém uma
          participação de mais de 86% do mercado de sistema operacional móvel no país.</p>
      </div>
    </section>

    <section class="cpaasUtilizacoes2">
      <div>
        <img src="../../imgs/Cpaas/logistica.gif" alt="">
        <h4>Fraude</h4>
        <p>Aviso de problemas de fraude de cartão de crédito.</p>
      </div>
      <div>
        <img src="../../imgs/Cpaas/varejo.gif" alt="">
        <h4>Voos</h4>
        <p>Aviso de atrasos e cancelamentos de voos.</p>
      </div>
      <div>
        <img src="../../imgs/Cpaas/callcenter.gif" alt="">
        <h4>Avisos</h4>
        <p>Avisos sobre agendamentos, exames e resultados.</p>
      </div>
      <div>
        <img src="../../imgs/Cpaas/saude.gif" alt="">
        <h4>Promoções e Vendas</h4>
        <p>Oferecer uma melhor experiência de vendas e promoções.</p>
      </div>
    </section>

    <section class="pqTeleCall">
      <div>
        <h1>Porque Telecall?</h1>
        <p>Oferecemos confiança através de nossa empresa reconhecida e confiável. Com aplicativos de rápida
          implementação, garantimos agilidade em nossos serviços. Contamos com uma rede própria de alta capacidade,
          garantindo controle total de ponta a ponta e uma conexão confiável. Além disso, nosso suporte ao cliente é
          feito por representantes locais de vendas e suporte, oferecendo um atendimento próximo e personalizado. E o
          melhor de tudo, nosso preço é competitivo, proporcionando o melhor custo-benefício para um conjunto completo
          de recursos e serviços.</p>
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
    const btnModoDark = document.querySelector(".btnModoDark")
    window.addEventListener("load", () => {
      const varDark = localStorage.getItem("modoDark");
      if (varDark) {
        document.body.classList.add("dark");
        btnModoDark.setAttribute("src", "imgs/sun.png");
      }
    });

    // Função para alternar o modo escuro
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