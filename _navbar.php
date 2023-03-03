<?php
  require_once 'DAO/SessionDAO.php';
  SessionDAO::VerificarLogado();

  $usuario = $_SESSION['name_usuario'];

  if(isset($_GET['closed']) && $_GET['closed'] == 1){
    SessionDAO::DeslogarSessao();
  }

?>


<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #343a40; color: #d6d7d8;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: #d6d7d8;"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <h5>Bem vindo(a), <?php echo $usuario; ?></h5>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto cor">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="_navbar.php?closed=1" role="button">
            <span style="color: #d6d7d8;">Sair</span>
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->