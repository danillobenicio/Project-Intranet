<?php
  require_once 'DAO/SessionDAO.php';
  SessionDAO::VerificarLogado();

  $login = $_SESSION['login_usuario'];

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">intranet</span>
    </a>
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2 img-responsive" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$login?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa-sharp fa-solid fa-file-pen"></i>
              <p>
                Cadastros
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="consultar_email_ramal.php" class="nav-link">
                <!--<a href="#" onclick="abrirPag('consultar_email_ramal')" class="nav-link">-->
                  <p>E-mail / Ramal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="consultar_filial.php" class="nav-link">
                  <p>Filial</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="consultar_setor.php" class="nav-link">
                  <p>Setor</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fa-sharp fa-solid fa-utensils"></i>
              <p>
                Refeitório
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <p>Cardápio</p>
                </a>
              </li>
            </ul>
          </li>
          
          
        
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fa-solid fa-cart-shopping"></i>
              <p>
                Compras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">             
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <p>Cadastro de Aprovador</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                  <p>Cadastro de Diretor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fa-sharp fa-solid fa-file"></i>
                  <p>
                    Relatórios
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/examples/login.html" class="nav-link">                  
                      <p>Ocorrências de Compras</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li> 
        </ul>
      </nav>
    </div>
  </aside>