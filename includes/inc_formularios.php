<center><h1><?= cambiarAcentos(strtoupper(_FORMULARIOS)) ?></h1></center>

<table class="formularios w100">
	<tr>
		<th class="centrar w80"><?= cambiarAcentos(_FORMDESCRIPCION) ?></th>
		<th class="centrar w20"><?= cambiarAcentos(_FORMDESCARGA) ?></th>
	</tr>
	
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
			<td class="centrar">
				<a href="includes/inc_mostrar_foto.php?IdFormulario=<?= $formularios["IdFormulario"] ?>">
					<img src="<?= $_SESSION["rutaservidor"] ?>imagenes/doc.png" height="42" width="42"/>
				</a> 
			</td>
		</tr>
<?php
	}//while($formularios=mysqli_fetch_array($qformularios, MYSQLI_BOTH))
	mysqli_free_result($qformularios);
?>
</table>

