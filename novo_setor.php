<?php

    require_once 'DAO/SessionDAO.php';

    SessionDAO::VerificarLogado();

    require_once 'DAO/CadastrosDAO.php';

    if(isset($_POST['btnSalvar'])) {

        $nome_setor = $_POST['nome_setor'];
        
        $objDAO = new CadastrosDAO();

        $ret = $objDAO->CadastrarSetor($nome_setor);

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
            <h1>Cadastrar Setor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Início</a></li>
              <li class="breadcrumb-item active">Setor</li>
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
                <form method="post" action="novo_setor.php">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome_setor">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" name="btnSalvar" class="btn btn-primary">SALVAR</button>
                    <a href="consultar_setor.php" type="submit" class="btn btn-warning">VOLTAR</a>
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
