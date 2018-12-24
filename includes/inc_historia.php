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
<h1 class="text-center"><?= cambiarAcentos(mb_strtoupper(_HISTORIA)) ?></h1>

<table class="table">
	<tr>
		<td valign="top">
			<p class="historia"><?= cambiarAcentos($descripcion) ?></p>
		</td>
		<td valign="top">
			<?php require_once("inc_galeria_fotos.php"); ?>
		</td>
	</tr>
</table>
		

