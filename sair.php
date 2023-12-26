<?php
    session_start();
    unset($_SESSION['nomeLogin']);
    unset($_SESSION['senhaLogin']);
    header('Location: cadastro.php');
?>