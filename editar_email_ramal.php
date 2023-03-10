<?php

    require_once 'DAO/SessionDAO.php';

    SessionDAO::VerificarLogado();

    require_once 'DAO/CadastrosDAO.php';

    $objDAO = new CadastrosDAO();

    $setores = $objDAO->ConsultarSetores();

    $telefone = $objDAO->ConsultarTelefone();

   if(isset($_GET['id']) && is_numeric($_GET['id']))
   {

    $emails_ramais = $objDAO->DetalharEmailRamal($_GET['id']);

    if(count($emails_ramais) == 0) 
    {
      header('Location: consultar_email_ramal.php');
    }

   }
   else if(isset($_POST['btnSalvar']))
   {
      $id = $_POST['id'];
      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $ramal = $_POST['ramal'];
      $setor = $_POST['setor'];
      $telefone = $_POST['telefone'];

      $ret = $objDAO->AlterarEmailRamal($nome, $email, $ramal, $setor, $telefone, $id);

      header('Location: editar_email_ramal.php?id=' . $id . '&ret=' . $ret);

   }
   else if(isset($_POST['btnExcluir']))
   {

      $id =  $_POST['id'];
      $ret = $objDAO->ExcluirEmailRamal($id);

      header('Location: consultar_email_ramal.php?ret=' . $ret);

   }
   else
   {

    header('Location: consultar_email_ramal.php');

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
            <h1>Editar E-mail / Ramal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">In??cio</a></li>
              <li class="breadcrumb-item active">E-mail - Ramal</li>
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
                <form method="post" action="editar_email_ramal.php">
                  <input type="hidden" value="<?= $emails_ramais[0]['cod_ramal'] ?>" name="id" />
                  <div class="row">
                    <div class="col-sm-5">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?= $emails_ramais[0]['pertence_pessoa'] ?>">
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control" name="email" value="<?= $emails_ramais[0]['email'] ?>">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Ramal</label>
                        <input type="number" class="form-control" name="ramal" maxlenght="4" value="<?= $emails_ramais[0]['ramal'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Setor</label>
                        <select class="form-control select2bs4" style="width: 100%;"  name="setor">
                          <option value="<?= $emails_ramais[0]['cod_setor'] ?>" selected="selected"><?= $emails_ramais[0]['setor'] ?></option>
                          <?php for($i = 0; $i < count($setores); $i++) { ?>
                            <option value="<?= $setores[$i]['cod_setor'] ?>"><?=$setores[$i]['descricao']?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Telefone</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="telefone">
                          <option value="<?= $emails_ramais[0]['cod_telefone'] ?>" selected="selected"><?= $emails_ramais[0]['descricao'] ?></option>
                          <?php for($i = 0; $i < count($telefone); $i++) { ?>
                              <option value="<?= $telefone[$i]['cod_telefone'] ?>"><?= $telefone[$i]['descricao'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" name="btnSalvar" class="btn btn-primary">SALVAR</button>
                    <button type="submit" name="btnExcluir" class="btn btn-danger">EXCLUIR</button>
                    <a href="consultar_email_ramal.php" type="submit" class="btn btn-warning">VOLTAR</a>
                  </div>
                </div>                  
                </form>
              </div>
              <!-- /.card-body -->
            </div>
      </div>
    </section>
  </div>
</div>


<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>

</body>
</html>
