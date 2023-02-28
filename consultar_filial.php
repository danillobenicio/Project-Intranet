<?php
  require_once 'DAO/CadastrosDAO.php';

  $objDAO = new CadastrosDAO();

  $filiais = $objDAO->ConsultarFiliais();

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
            <h1>Filiais</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Início</a></li>
              <li class="breadcrumb-item active">Filiais</li>
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
              <table id="filiais" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Atak</th>
                    <th style="width: 30px;">Ação</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php for($i = 0; $i < count($filiais); $i++) { ?>  
                  <tr>
                    <td><?= $filiais[$i]['descricao'] ?></td>
                    <td><?= $filiais[$i]['cod_filial_atak'] ?></td>
                    <td style="width: 30px;"><button type="button" class="btn btn-primary">EDITAR</button></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nome</th>
                    <th>Atak</th>
                    <th style="width: 30px;">Ação</th>
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
    $("#filiais").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#filiais_wrapper .col-md-6:eq(0)');
    
  });
</script>
</body>
</html>
