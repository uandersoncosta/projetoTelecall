<?php

include 'conexao.php';

if (isset($_GET["id"])) {

  if (is_numeric($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM `usuario` WHERE id_usuario = $id";
    $result = mysqli_query($conn, $sql);


    if ($result) {
      header("Location: ../views/dashboard/listar.php?id=$id&msg=Usuario excluido com sucesso!");
      exit();
    } else {
      header("Location: ../views/dashboard/listar.php?msg=Ocorreu um erro ao excluir o usuario. Tente novamente mais tarde.");
      exit();
    }
  }
}
