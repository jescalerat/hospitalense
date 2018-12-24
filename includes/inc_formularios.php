<center><h1><?= cambiarAcentos(strtoupper(_FORMULARIOS)) ?></h1></center>

<table class="table">
	<thead class="thead-dark">
		<tr>
			<th class="text-center"><?= cambiarAcentos(_FORMDESCRIPCION) ?></th>
			<th class="text-center"><?= cambiarAcentos(_FORMDESCARGA) ?></th>
		</tr>
	</thead>
	
<?php
	//Query
	$query="select * from formularios where IdTipo = 1 order by orden asc";
	$qformularios=mysqli_query ($link, $query);

	
	//Mostrar los valores de la base de datos
	while($formularios=mysqli_fetch_array($qformularios, MYSQLI_BOTH))
	{
		$descripcion = "";
		if ($_SESSION["idiomapagina"]==1){
			$descripcion = $formularios["DescripcionES"];
		} else if ($_SESSION["idiomapagina"]==2){
			$descripcion = $formularios["DescripcionEN"];
		} else if ($_SESSION["idiomapagina"]==3){
			$descripcion = $formularios["DescripcionCA"];
		} 
?>
		<tr>
			<td class="texto_destacado_negro">
				<?= cambiarAcentos($descripcion) ?>
			</td>
			<td class="text-center">
				<a href="includes/inc_mostrar_foto.php?IdFormulario=<?= $formularios["IdFormulario"] ?>">
					<img src="imagenes/doc.png" height="42" width="42"/>
				</a> 
			</td>
		</tr>
<?php
	}//while($formularios=mysqli_fetch_array($qformularios, MYSQLI_BOTH))
	mysqli_free_result($qformularios);
?>
</table>

