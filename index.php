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
  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Telecall - Internet, Telefonia, Celular e muito mais...</title>
</head>

<body>

  <header>
    <ul class="menuAntes">
      <li><a href="https://api.whatsapp.com/send?phone=552130301010&text=%23Comercial" target="_blank">Whatsapp</a></li>
      <li><a href="faq.php">FAQ</a></li>
      <li><a href="">Contato</a></li>
      <li>
        <div class="increMinusFont">
          <img class="btnMinus" src="imgs/minus.png" alt="">
          <img src="imgs/font.png" alt="">
          <img class="btnPlus" src="imgs/plus.png" alt="">
        </div>
      </li>
      <li><img class="btnModoDark" onclick="mododark()" src="imgs/moon.png" alt=""></li>
    </ul>

    <nav>
      <a class="logoImgNav" href="index.php"><img src="imgs/telecallLogo.png" alt="Logo-TeleCall"></a>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/views/site/cpa.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cpaas
          </a>
          <ul class="menuDropDown dropdown-menu">
            <li><a class="dropdown-item" href="views/site/cpa.php">O que é?</a></li>
            <li><a class="dropdown-item" href="views/site/cpa.php">Utilização</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            2FA
          </a>
          <ul class="menuDropDown dropdown-menu">
            <li><a class="dropdown-item" href="views/site/2fa.php">O que é?</a></li>
            <li><a class="dropdown-item" href="views/site/2fa.php">Utilização</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Plataforma e Soluções
          </a>
          <ul class="menuDropDown dropdown-menu">
            <li><a href="views/site/numerodemascara.php" class="dropdown-item" href="#">Número
                Máscara</a></li>
            <li><a href="views/site/google.php" class="dropdown-item" href="#">Google
                Verified Calls</a></li>
            <li><a href="views/site/smsprogramavel.php" class="dropdown-item" href="#">SMS
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
                <a href='../projetoTelecall/views/dashboard/index.php' class='dropdown-item'> Dashboard </a>
                <a href='../projetoTelecall/views/dashboard/logout.php' class='dropdown-item'> Sair</a>
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
    <section>
      <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item carousel-image active">
            <img class="imagemSlider" src="imgs/cpaas.jpg" alt="">
            <div class="textoSlider">
              <p>A plataforma que <span>conecta</span>,<br><span>comunica e transforma</span> <br>negócios na era
                <span>digital</span>.
              </p>
              <a class="btnSlider" href="cpa.php">Saber Mais</a>
            </div>
          </div>
          <div class="carousel-item carousel-image">
            <img class="imagemSlider" src="imgs/2FA.png" alt="">
            <div class="textoSlider">
              <p><span>Proteção em dobro</span>, <span>segurança imbatível</span>:<br>
                2FA, o escudo invencível <br> para suas informações.</p>
              <a class="btnSlider" href="2fa.php">Saber Mais</a>
            </div>
          </div>
          <div class="carousel-item carousel-image">
            <img class="imagemSlider" src="imgs/plataforma de soluções.png" alt="">
            <div class="textoSlider">
              <p>Conheça as <span>melhores plataformas</span> <br>de soluções para o seu <br> negócio digital</p>
              <a class="btnSlider" href="index.php">Saber Mais</a>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>

    <section class="quemSomos">
      <img class="quemSomos--img" src="imgs/teleCall--quemSomos.png" alt="Imagem de Quem Somos">
      <div class="quemSomos--info">
        <h2>Quem Somos?</h2>
        <p>Com experiência acumulada de mais de 20 anos e a busca constante por inovação e tecnologia, a Telecall é
          referência no segmento de telecomunicações e sinônimo de qualidade e eficiência.
          A Telecall foi fundada em 1998 e está sediada no Brasil, com escritórios em Miami, Portugal e Inglaterra.

          Nossa missão é garantir os melhores serviços aos nossos clientes, com a mobilidade, conectividade e segurança
          que só nós podemos oferecer.
          Nossa visão é ser reconhecida pela busca constante de inovação e tecnologia oferecendo apenas as melhores
          soluções de comunicação para nossos clientes.</p>
      </div>
    </section>

    <section class="nossosClientes">
      <h1 class="text-center mb-5">Clientes que acreditaram em nós</h1>
      <div class="nossosClientes-Card">

        <div class="nossosClientes--info">
          <img class="nossosClientesImg" src="imgs/NossosClientesImgs/straussMidia.png" alt="">
          <div class="nossosClientes-coment">
            <div class="nossosClientes-user">
              <h5>Richard Strauss</h5>
              <p>@richardstraussmedia</p>
            </div>
            <p>“A Telecall trabalhou com a Strauss Estratégias de Mídia na instalação de linhas telefônicas padrão tipo
              POTS e conexões de Internet… Uma vez que somos uma empresa com sede nos EUA, quando se viaja, você nunca
              sabe o que você vai encontrar. Esta empresa foi tão boa ou melhor do que qualquer empresa com sede nos EUA
              e
              eu recomendo a Telecall!”</p>
          </div>
        </div>

        <div class="nossosClientes--info">
          <img class="nossosClientesImg" src="imgs/NossosClientesImgs/czechTeam.png" alt="czTeam">
          <div class="nossosClientes-coment">
            <div class="nossosClientes-user">
              <h5>Blanka Konecná</h5>
              <p>@blankakonecna</p>
            </div>
            <p>“Equipe e visitantes da casa da República Tcheca durante os Jogos Olímpicos Rio 2016 ﬁcaram muito
              felizes.
              Os serviços prestados pela Telecall foram um sucesso, agradecemos toda a ajuda.”</p>
          </div>
        </div>

        <div class="nossosClientes--info">
          <img class="nossosClientesImg" src="imgs/NossosClientesImgs/globalMarketingEeventos.png" alt="Global">
          <div class="nossosClientes-coment">
            <div class="nossosClientes-user">
              <h5>Global Marketing</h5>
              <p>@globalmarketing</p>
            </div>
            <p>“Serviço e atendimento de excelente qualidade. Agradeço também a assistência em todo momento.”</p>
          </div>
        </div>

        <div class="nossosClientes--info">
          <img class="nossosClientesImg" src="imgs/NossosClientesImgs/australia.png" alt="australia">
          <div class="nossosClientes-coment">
            <div class="nossosClientes-user">
              <h5>Diego Mendes</h5>
              <p>@diegomendes</p>
            </div>
            <p>“..durante as Olímpiadas 2016 a Telecall nos ajudou muito com serviços de Internet Dedicada de 200MB,
              ponto
              a ponto, 0800, siga-me , WIFI... para suportar todas as necessidades do nosso Comitê. Telecall foi 100%.”
            </p>
          </div>

        </div>

        <div class="nossosClientes--info">
          <img class="nossosClientesImg" src="imgs/NossosClientesImgs/mcdonaldLogo.png" alt="Mc Donald - Logo">
          <div class="nossosClientes-coment">
            <div class="nossosClientes-user">
              <h5>Kathy Whalen</h5>
              <p>@kathywhalen</p>
            </div>
            <p>"O Mc Donald conheceu a Telecall durante os Jogos Olímpicos Rio 2016 para um pedido urgente de um evento
              de
              mídia ao vivo, quatro dias mais tarde. A Telecall foi extremamente proﬁssional... Nós simplesmente não
              teríamos conseguido sem a parceria da equipe Telecall. Só usaremos eles em eventos no Rio."</p>
          </div>
        </div>

        <div class="nossosClientes--info">
          <img class="nossosClientesImg" src="imgs/NossosClientesImgs/avmedia.png" alt="avmedia">
          <div class="nossosClientes-coment">
            <div class="nossosClientes-user">
              <h5>Michel Matko</h5>
              <p>@avmedia</p>
            </div>
            <p>“Gostaria de agradecer a Telecall por toda ajuda nos serviços prestados. Tudo funcionou bem e os técnicos
              foram muito prestativos.”</p>
          </div>
        </div>

        <div class="nossosClientes--info">
          <img class="nossosClientesImg" src="imgs/NossosClientesImgs/progolf.png" alt="progolf">
          <div class="nossosClientes-coment">
            <div class="nossosClientes-user">
              <h5>Suelen Santos</h5>
              <p>@progolf</p>
            </div>
            <p>“Gostaríamos de agradecer a Telecall pelo trabalho maravilhoso que realizaram. O trabalho da equipe é
              sensacional, com rapidez e atenção... parabéns a toda equipe da Telecall e muito obrigada.”</p>
          </div>
        </div>

        <div class="nossosClientes--info">
          <img class="nossosClientesImg" src="imgs/NossosClientesImgs/rockinrio.png" alt="rock in Rio">
          <div class="nossosClientes-coment">
            <div class="nossosClientes-user">
              <h5>Laila Dias</h5>
              <p>@rockinrio</p>
            </div>
            <p>“É com o coração transbordando de orgulho e gratidão que concluímos uma edição do Rock in Rio. Toda a
              magia
              que vivemos nesses 7 dias de festival jamais seria possível sem a participação de marcas e profissionais
              como vocês que acreditaram na gente e ajudaram a tornar esse sonho realidade. Fica aqui mais uma vez, o
              nosso muito obrigada e que venha 2019!!”</p>
          </div>
        </div>

      </div>
    </section>

    <footer>
      <div class="footercontato">
        <img class="footerHeader__img" src="imgs/telecallLogo.png" alt="Logo Footer">
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
    const btnLoginInicial = document.querySelector(".btnLoginInicial");
    const usuarioLoginInicial = document.querySelector(".usuario");
    const usuarioLoginInicialNome = document.querySelector(".usuarioNome");
    // Verificar se o usuário está logado
    const nomeUsuarioLogado = localStorage.getItem("usuarioLogadoNome");
    if (nomeUsuarioLogado) {
      usuarioLoginInicialNome.innerText = nomeUsuarioLogado;
      btnLoginInicial.style.display = "none";
      usuarioLoginInicial.style.display = "flex";
    }

    const deslogarLogin = () => {
      localStorage.removeItem("usuarioLogadoNome");

      btnLoginInicial.style.display = "flex";
      usuarioLoginInicial.style.display = "none";
    };

    const btnModoDark = document.querySelector(".btnModoDark")
    window.addEventListener("load", () => {
      const varDark = localStorage.getItem("modoDark");
      if (varDark) {
        document.body.classList.add("dark");
        btnModoDark.setAttribute("src", "imgs/sun.png");
      }
    });


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
    });

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
  <script src="js/cadastro.js"></script>

</body>

</html>