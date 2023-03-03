<?php

  require_once 'DAO/SessionDAO.php';

  SessionDAO::VerificarLogado();


  require_once 'DAO/CadastrosDAO.php';

  $objDAO = new CadastrosDAO();

  $setores = $objDAO->ConsultarSetores();

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
            <h1>Setores</h1>
            <br>
            <a href="novo_setor.php" type="button" class="btn btn-primary">NOVO</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Início</a></li>
              <li class="breadcrumb-item active">Setores</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <!-- /.card-header -->
              <div class="card-body">
              <table id="setores" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Ação</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php for($i = 0; $i < count($setores); $i++) { ?>  
                  <tr>
                    <td><?= $setores[$i]['descricao'] ?></td>
                    <td style="width: 30px;"><a href="editar_setor.php?id=<?=$setores[$i]['cod_setor']?>" type="button" class="btn btn-primary btn-sm">EDITAR</a></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nome</th>
                    <th>Ação</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->


<script>
  $(function () {
    $("#setores").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#setores_wrapper .col-md-6:eq(0)');
    
  });
</script>
</body>
</html>
