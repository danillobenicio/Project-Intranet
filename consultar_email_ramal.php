<?php

  require_once 'DAO/SessionDAO.php';

  SessionDAO::VerificarLogado();

  require_once 'DAO/CadastrosDAO.php';

  $objDAO = new CadastrosDAO();

  $emails_ramais = $objDAO->ConsultarEmailsRamais();


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
            <h1>E-mails / Ramais</h1>
            <br>
            <a href="novo_email_ramal.php" type="button" class="btn btn-primary">NOVO</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Início</a></li>
              <li class="breadcrumb-item active">E-mails - Ramais</li>
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
              <table id="emails_ramais" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Ramal</th>
                    <th>E-mail</th>
                    <th>Setor</th>
                    <th>Filial</th>
                    <th style="width: 30px;">Ação</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php for($i = 0; $i < count($emails_ramais); $i++) { ?>              
                  <tr>
                    <td><?= $emails_ramais[$i]['pertence_pessoa'] ?></td>
                    <td><?= $emails_ramais[$i]['ramal'] ?></td>
                    <td><?= $emails_ramais[$i]['email'] ?></td>
                    <td><?= $emails_ramais[$i]['setor'] ?></td>
                    <td><?= $emails_ramais[$i]['filial'] ?></td>
                    <td style="width: 30px;"><a href="editar_email_ramal.php?id=<?=$emails_ramais[$i]['cod_ramal']?>" type="button" class="btn btn-primary btn-sm">EDITAR</a></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nome</th>
                    <th>Ramal</th>
                    <th>E-mail</th>
                    <th>Setor</th>
                    <th>Filial</th>
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
    $("#emails_ramais").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#emails_ramais_wrapper .col-md-6:eq(0)');
    
  });
</script>
</body>
</html>
