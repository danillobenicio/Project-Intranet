<?php

    require_once 'DAO/SessionDAO.php';

    SessionDAO::VerificarLogado();

    require_once 'DAO/CadastrosDAO.php';

    if(isset($_GET['id']) && is_numeric($_GET['id'])) {

        $objDAO = new CadastrosDAO();

        $dados = $objDAO->DetalharSetor($_GET['id']);

        if(count($dados) == 0) {
            header('Location: consultar_setor.php');
        }

    }else if(isset($_POST['btnSalvar'])){
        
        $nome_setor = $_POST['nome_setor'];
        $id = $_POST['id'];

        $objDAO = new CadastrosDAO();

        $ret = $objDAO->AlterarSetor($nome_setor, $id);

        header('Location: editar_setor.php?id=' . $id . '&ret=' . $ret);

    }else if(isset($_POST['btnExcluir'])) {
        
        $id = $_POST['id'];

        $objDAO = new CadastrosDAO();

        $ret = $objDAO->ExcluirSetor($id);

        header('Location: consultar_setor.php?ret=' . $ret);

    }else {

        header('Location: consultar_setor.php');
        
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
            if (isset($_GET['ret'])) {
                ExibirMsg($_GET['ret']);
            }
            ?>
            <h1>Editar Setor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Início</a></li>
              <li class="breadcrumb-item active">Setores</li>
              <li class="breadcrumb-item active">Editar</li>
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
                <form method="post" action="editar_setor.php">
                <input type="hidden" name="id" value="<?= $dados[0]['cod_setor'] ?>" />
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome_setor" value="<?= $dados[0]['descricao'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button name="btnSalvar" type="submit" class="btn btn-primary">SALVAR</button>
                    <button name="btnExcluir" type="submit" class="btn btn-danger">EXCLUIR</button>
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
