<?php use Carbon\Carbon;
require("../../partials/routes.php");;
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $_ENV['TITLE_SITE'] ?> | Crear Carro</title>
    <?php require("../../partials/head_imports.php"); ?>
</head>
<body class="hold-transition sidebar-mini">

<!-- Site wrapper -->
<div class="wrapper">
    <?php require("../../partials/navbar_customization.php"); ?>

    <?php require("../../partials/sliderbar_main_menu.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Crear un Nuevo Carro</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= $baseURL; ?>/views/">Carro</a></li>
                            <li class="breadcrumb-item active">Inicio</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <?php if (!empty($_GET['respuesta'])) { ?>
                <?php if ($_GET['respuesta'] != "correcto") { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-ban"></i> Error!</h5>
                        Error al crear el carro: <?= $_GET['mensaje'] ?>
                    </div>
                <?php } ?>
            <?php } ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Horizontal Form -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user"></i> &nbsp; Información del Carro</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="card-refresh"
                                            data-source="create.php" data-source-selector="#card-refresh-content"
                                            data-load-on-init="false"><i class="fas fa-sync-alt"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                                class="fas fa-expand"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- form start -->
                                <form class="form-horizontal" method="post" id="frmCreateCarro"
                                      name="frmCreateCarro"
                                      action="../../../app/Controllers/CarroController.php?action=create">
                                    <div class="form-group row">
                                        <label for="marca" class="col-sm-2 col-form-label">Marca</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control" id="marca" name="marca"
                                                   placeholder="Ingrese la marca del carro">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="color" class="col-sm-2 col-form-label">Color</label>
                                        <div class="col-sm-10">
                                            <input required type="color" class="form-control" id="color"
                                                   name="color" placeholder="Seleccione el Color">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="anno" class="col-sm-2 col-form-label">Año</label>
                                        <div class="col-sm-10">
                                            <input required type="number" min="1900" max="<?= date('Y') ?>" minlength="4" class="form-control"
                                                   id="anno" name="anno" placeholder="Ingrese el Año">
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class=" custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="cajaAutomatica" name="cajaAutomatica">
                                            <label class="custom-control-label" for="customSwitch3">Tiene Caja Automatica?</label>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="cantidadGasolina" class="col-sm-2 col-form-label">Cantidad Gasolina</label>
                                        <div class="col-sm-10">
                                            <input required type="number" min="0" minlength="3" class="form-control"
                                                   id="cantidadGasolina" name="cantidadGasolina" placeholder="Ingrese la cantidad de litros">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                                        <div class="col-sm-10">
                                            <select id="estado" name="estado" class="custom-select">
                                                <option>Seleccione</option>
                                                <option value="Disponible">Disponible</option>
                                                <option value="Vendido">Vendido</option>
                                                <option value="Apartado">Apartado</option>
                                                <option value="En Reparacion">En Reparacion</option>
                                            </select>
                                        </div>
                                    </div>

                                    <hr>
                                    <button type="submit" class="btn btn-info">Enviar</button>
                                    <a href="index.php" role="button" class="btn btn-default float-right">Cancelar</a>
                                    <!-- /.card-footer -->
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php require('../../partials/footer.php'); ?>
</div>
<!-- ./wrapper -->
<?php require('../../partials/scripts.php'); ?>
</body>
</html>
