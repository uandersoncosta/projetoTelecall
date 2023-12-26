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
  <link rel="stylesheet" href="css/faq.css">
  <title>TeleCall</title>
</head>

<body>

  <header>
    <ul class="menuAntes">
      <li><a href="https://api.whatsapp.com/send?phone=552130301010&text=%23Comercial" target="_blank">Whatsapp</a></li>
      <li><a href="faq.php">FAQ</a></li>
      <li><a href="">Contato</a></li>
      <li><a href="">Português</a></li>
      <li><a href="">Português</a></li>
      <li><i class="bi bi-moon-fill"></i></li>
    </ul>

    <nav>
      <a class="logoImgNav" href="index.php"><img src="imgs/telecallLogo.png" alt="Logo-TeleCall"></a>
      <ul>
        <li><a href="../../index.php">Home</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="cpaas.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cpaas
          </a>
          <ul class="menuDropDown dropdown-menu">
            <li><a class="dropdown-item" href="cpa.php">O que é?</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            2FA
          </a>
          <ul class="menuDropDown dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Rede e infraestrutura
          </a>
          <ul class="menuDropDown dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
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
      <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
              Accordion Item #1
            </button>
          </h2>
          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
            <div class="accordion-body">
              <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse
              plugin adds the appropriate classes that we use to style each element. These classes control the overall
              appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom
              CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
              Accordion Item #2
            </button>
          </h2>
          <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
            <div class="accordion-body">
              <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse
              plugin adds the appropriate classes that we use to style each element. These classes control the overall
              appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom
              CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
              Accordion Item #3
            </button>
          </h2>
          <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse
              plugin adds the appropriate classes that we use to style each element. These classes control the overall
              appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom
              CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the
              <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="footerHeader">
        <img class="footerHeader__img" src="imgs/telecallLogo.png" alt="Logo Footer">
        <ul>
          <li><a href=""><i class="bi bi-instagram"></i></a></li>
          <li><a href=""><i class="bi bi-linkedin"></i></a></li>
          <li><a href=""><i class="bi bi-facebook"></i></a></li>
        </ul>
      </div>

      <div class="footerasside">
        <div>
          <ul><a href="">Institucional</a></ul>
          <ul><a href="">Institucional</a></ul>
          <ul><a href="">Institucional</a></ul>
          <ul><a href="">Institucional</a></ul>
          <ul><a href="">Institucional</a></ul>
          <ul><a href="">Institucional</a></ul>
        </div>
        <div>
          <ul><a href="">Institucional</a></ul>
          <ul><a href="">Institucional</a></ul>
          <ul><a href="">Institucional</a></ul>
          <ul><a href="">Institucional</a></ul>
          <ul><a href="">Institucional</a></ul>
          <ul><a href="">Institucional</a></ul>
        </div>
      </div>
    </footer>


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
  </script>
</body>

</html>