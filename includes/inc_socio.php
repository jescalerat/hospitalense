<?php
	$query="select * from socios order by IdSocio desc";
	
	//Query
	$qsocio=mysqli_query($link, $query);
	$rowsocio=mysqli_fetch_array($qsocio);
	
	$descripcion = "";
	if ($_SESSION["idiomapagina"] == 1){
		$descripcion = $rowsocio["TextoES"];
	}else if ($_SESSION["idiomapagina"] == 2){
		$descripcion = $rowsocio["TextoEN"];
	}else if ($_SESSION["idiomapagina"] == 3){
		$descripcion = $rowsocio["TextoCA"];
	}
	
	mysqli_free_result($qsocio);
?>
<h1 class="text-center"><?= cambiarAcentos(strtoupper(_HACERTESOCIO)) ?></h1>

<p><?= cambiarAcentos($descripcion) ?></p>
