<?php

    require_once "models/torneoModel.php";
	$nuevo = new torneoModel();
	$torneo = $nuevo->get();
    $cabecera = $nuevo->cabeceraTabla();
?>
<!doctype html>
<html lang="es">

<?php require_once("template/partials/head.php") ?>

<body>
    <?php require_once("template/partials/menu.php") ?>

    <!-- Page Content -->
    <div class="container">
        <br><br><br><br>

        <?php require_once("template/partials/mensaje.php") ?>


        <!-- Estilo card de bootstrap -->
        <div class="card">
            <div class="card-header">
                Tabla Torneos
            </div>
            <div class="card-body">
                <section>
                    <article>
                        <br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <?php foreach ($cabecera as $key => $valor): ?>
                                    <th><?=$valor?></th>
                                    <?php endforeach;?>
                                    <th>
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($torneo as $registro => $value):?>
                                <tr>
                                    <td><?=$value->id?></td>
                                    <td><?=$value->nombre?></td>
                                    <td><?=$value->fecha_inicio?></td>
                                    <td><?=$value->fecha_fin?></td>
                                    <td>
                                        <a href="#" title="Visualizar"><i class="material-icons">visibility</i></a>
                                        <a href="#" title="Editar"><i class="material-icons">edit</i></a>
                                        <a href="#" title="Eliminar"><i class="material-icons">clear</i></a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        <h5>El número de torneos es: <?= count($torneo);?></h4>
                    </article>
                </section>

            </div>
        </div>
    </div>

    <!-- /.container -->

    <?php require_once("template/partials/footer.php") ?>
    <?php require_once("template/partials/javascript.php") ?>

</body>

</html>