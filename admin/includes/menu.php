<?php 
    $nombre = $_SESSION['nombre'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
    $rutaMenu = "";
    if (isset($rutaAdmin)){
        $rutaMenu = $rutaAdmin;
    }
?>
<h4 class="text-center"><?= $nombre ?></h4>
	
<table class="table table-bordered">
	<thead class="thead-dark">
		<tr>
			<th>Administraci&oacute;n</th>
		</tr>
<?php 
        if ($tipo_usuario == 1){
?>
			<tr>
				<td>
					<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>bbdd.php">BBDD</a>
				</td>
			</tr>
			<tr>
				<td>
					<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>comprobar_visitas.php">Comprobar visitas</a>
				</td>
			</tr>
			<tr>
				<td>
					<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>comprobar_paginas_vistas.php">Comprobar paginas vistas</a>
				</td>
			</tr>
			<tr>
				<td>
					<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>usuarios.php">Usuarios</a>
				</td>
			</tr>
			<tr>
				<td>
					<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>categorias.php">Categorias</a>
				</td>
			</tr>
<?php 
        } //if ($tipo_usuario == 1){
?>
		<tr>
			<td>
				<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>calendario.php">Calendario</a>
			</td>
		</tr>
		<tr>
			<td>
				<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>goleadores.php">Goleadores</a>
			</td>
		</tr>
		<tr>
			<td>
				<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>jugadores.php">Jugadores</a>
			</td>
		</tr>
		<tr>
			<td>
				<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>material.php">Material</a>
			</td>
		</tr>
		<tr>
			<th>Oficina</th>
		</tr>
		<tr>
			<td>
				<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>pagos.php">Pagos</a>
			</td>
		</tr>
		<tr>
			<td>
				<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>entrega_mat.php">Entrega material</a>
			</td>
		</tr>
		<tr>
			<td>
				<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>cambio_cat.php">Cambio categoria</a>
			</td>
		</tr>
		<tr>
			<td>
				<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>informe.php">Informe</a>
			</td>
		</tr>
		<tr>
			<td>
				<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>noticias.php">Noticias</a>
			</td>
		</tr>
		<tr>
			<td>
				<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>historia.php">Historia</a>
			</td>
		</tr>
		<tr>
			<td>
				<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>directiva.php">Directiva</a>
			</td>
		</tr>
		<tr>
			<td>
				<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>galerias.php">Galerias</a>
			</td>
		</tr>
		<tr>
			<td>
				<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>socios.php">Socios</a>
			</td>
		</tr>
		<tr>
			<td>
				<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>formularios.php">Formularios</a>
			</td>
		</tr>
		<tr>
			<td>
				<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>horarios.php">Horarios</a>
			</td>
		</tr>
		<tr>
			<td>
				<a class="list-group-item list-group-item-action list-group-item-light" href="<?= $rutaMenu ?>economia.php">Economia</a>
			</td>
		</tr>
		<tr>
			<th>Privado</th>
		</tr>
		<tr>
			<td>
				<a class="list-group-item list-group-item-action list-group-item-light" href="cambio_pass.php">Cambio contrase&ntilde;a</a>
			</td>
		</tr>
		<tr>
			<td>
				<a class="list-group-item list-group-item-action list-group-item-light" href="salir.php">Salir</a>
			</td>
		</tr>
	</thead>
</table>