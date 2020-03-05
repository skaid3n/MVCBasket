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
				MVC - Tabla Jugadores
			</div>
			<div class="card-body">
                
				<table class="table">
                <thead>
                    <tr>
                        <?php foreach ($this->cabecera as $key => $valor): ?>
                        <th><?=$valor?></th>
                        <?php endforeach;?>
                        <th>
                        	Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
				<?php require_once("template/jugadores/menubar.php") ?>
                    <!-- Muestra contenido de la tabla -->
                    <?php foreach ($this->datos as $registro => $value):?>
								<tr>
									<td><?=$value->id?></td>
									<td><?=$value->nombre?></td>
									<td><?=$value->apellidos?></td>
									<td><?=$value->nombreEquipo?></td>
									<td><?=$value->nacionalidad?></td>
									<td><?=$value->fechaNac?></td>
									<td><?=$value->draft?></td>
									<td>
										<a href="<?= URL ?>jugadores/show/<?=$value->id?>" title="Visualizar"><i class="material-icons">visibility</i></a>
										<a href="<?= URL ?>jugadores/edit/<?=$value->id?>" title="Editar"><i class="material-icons">edit</i></a>
										<a href="<?= URL ?>jugadores/delete/<?=$value->id?>"><i class="material-icons">clear</i></a>
									</td>
								</tr>
							<?php endforeach;?>
                </tbody>
            </table>
			<h4>El número de jugadores es: <?= Count($this->datos)?></h4>
			</div>
		</div>


    </div>

    <!-- /.container -->
    
    <?php require_once("template/partials/footer.php") ?>
	<?php require_once("template/partials/javascript.php") ?>
	
</body>

</html>