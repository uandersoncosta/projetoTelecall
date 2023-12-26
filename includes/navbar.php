<?php

include 'conexao.php';
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}


if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];

  $sql = "SELECT * FROM `usuario` WHERE `id_usuario` = $user_id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  $user_level = $row['nivel'];
  $user_name = $row['nome'];
}

// if (isset($_GET['id'])) {
//   $id = $_GET['id'];

//   $sql = "SELECT * FROM usuario WHERE id_usuario = $id";
//   $result = mysqli_query($conn, $sql);
//   $row = mysqli_fetch_assoc($result);
// }
?>


<nav class="navbar">
  <div class="navbar-content">
    <img src="../imgs/telecallLogo.png" alt="" class="logo">
  </div>

  <div class="navbar-content">
    <div class="avatar">
      <img src="https://as2.ftcdn.net/v2/jpg/03/31/69/91/1000_F_331699188_lRpvqxO5QRtwOM05gR50ImaaJgBx68vi.jpg" alt="Usuario" width="40">
      <div class="dropdown-menu setting">
        <?php if ($user_level == 'user') {
        ?>
          <div class="item">
            <a href="perfil.php"><span class="fa-solid fa-user"></span>Perfil</a>
          </div>
        <?php } ?>
        <div class="item">
          <a href="../../index.php"><span class="fa-solid fa-house fa-sm"></span>Home</a>
        </div>
        <div class="item">
          <a href="logout.php"><span class="fa-solid fa-arrow-right-from-bracket"></span>Sair</a>
        </div>
      </div>
    </div>
    <div class="userName"><?php echo $user_name ?></div>
  </div>
</nav>