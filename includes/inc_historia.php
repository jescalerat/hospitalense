<?php
	$query="select * from historia order by IdHistoria desc";
	
	//Query
	$qhistoria=mysqli_query($link, $query);
	$rowhistoria=mysqli_fetch_array($qhistoria);
	
	$descripcion = "";
	if ($_SESSION["idiomapagina"] == 1){
		$descripcion = $rowhistoria["TextoES"];
	}else if ($_SESSION["idiomapagina"] == 2){
		$descripcion = $rowhistoria["TextoEN"];
	}else if ($_SESSION["idiomapagina"] == 3){
		$descripcion = $rowhistoria["TextoCA"];
	}
	
	mysqli_free_result($qhistoria);

?>
<h1 class="centrar"><?php print (cambiarAcentos(mb_strtoupper(_HISTORIA)));?></h1>

<table class="tabla_sin_borde w100">
	<tr>
		<td class="tabla_sin_borde w80" valign="top">
			<p class="historia"><?php print(cambiarAcentos($descripcion));?></p>
		</td>
		<td class="tabla_sin_borde w20" valign="top">
			<?php require_once($_SESSION["ruta"]."includes/inc_galeria_fotos.php"); ?>
		</td>
	</tr>
</table>
		

