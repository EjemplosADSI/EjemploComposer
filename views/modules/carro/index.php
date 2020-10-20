<?php use Carbon\Carbon;
require("../../partials/routes.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $_ENV['TITLE_SITE'] ?> | Crear Usuario</title>
    <?php include_once ('../../partials/head_imports.php') ?>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <?php include_once ('../../partials/navbar_customization.php') ?>

    <?php include_once ('../../partials/sliderbar_main_menu.php') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gestionar Carros</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Gestionar Carros</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <?php if (!empty($_GET['respuesta']) && !empty($_GET['action'])) { ?>
                <?php if ($_GET['respuesta'] == "correcto") { ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Correcto!</h5>
                        <?php if ($_GET['action'] == "create") { ?>
                            El carro ha sido registrado con exito!
                        <?php } else if ($_GET['action'] == "update") { ?>
                            Los datos del carro han sido actualizados correctamente!
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de Carros</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    Hola Mundo
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include_once ('../../partials/footer.php') ?>
</div>
<!-- ./wrapper -->

<?php include_once ('../../partials/scripts.php') ?>
</body>
</html>