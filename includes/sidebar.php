<?php
include 'conexao.php';

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];

  $sql = "SELECT * FROM `usuario` WHERE `id_usuario` = $user_id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  $user_level = $row['nivel'];
}

?>

<div class="sidebar">
  <a href="index.php" class="sidebar-nav">
    <i class="icon fa-solid fa-house"><span>Dashboard</span></i>
  </a>
  <?php if ($user_level == 'adm') {
  ?>
    <a href="listar.php" class="sidebar-nav">
      <i class="icon fa-solid fa-users"><span>Listar</span></i>
    </a>
    <a href="bancoDeDados.php" class="sidebar-nav">
      <i class="icon fa-solid fa-users"><span>Modelo(DER)</span></i>
    </a>
  <?php } ?>
</div>