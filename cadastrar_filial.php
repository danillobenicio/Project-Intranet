<?php

    require_once 'DAO/SessionDAO.php';

    SessionDAO::VerificarLogado();

    require_once 'DAO/CadastrosDAO.php';

    if(isset($_POST['btnSalvar'])){
      $descricao = $_POST['descricao'];
      $cod_atak = $_POST['cod_atak'];

      $objDAO = new CadastrosDAO();

      $ret = $objDAO->CadastrarFilial($descricao, $cod_atak);

    }


?>
<!DOCTYPE html>
<html lang="pt-br">
<?php include_once '_head.php'; ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include_once '_navbar.php'; ?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <?php include_once '_sidebar.php'; ?>
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             <?php
                if(isset($ret)) {
                    ExibirMsg($ret);
                }
            ?>
            <h1>Cadastrar Filial</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Início</a></li>
              <li class="breadcrumb-item active">Filial</li>
              <li class="breadcrumb-item active">Cadastrar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="card card-warning">
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="cadastrar_filial.php">
                  <div class="row">
                    <div class="col-sm-9">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Descricao</label>
                        <input type="text" class="form-control" name="descricao">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Cód Atak</label>
                        <input type="number" class="form-control" name="cod_atak">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" name="btnSalvar" class="btn btn-primary">SALVAR</button>
                    <a href="consultar_filial.php" type="submit" class="btn btn-warning">VOLTAR</a>
                </div>      
                </form>
              </div>
              <!-- /.card-body -->
            </div>
      </div>
    </section>
  </div>
</div>
</body>
</html>
