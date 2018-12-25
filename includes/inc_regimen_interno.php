<?php
	$query="select * from formularios where IdTipo = 2 order by orden asc";
	$qregimen = mysqli_query ($link, $query);
	$rowregimen=mysqli_fetch_array($qregimen);
?>
<h1 class="text-center"><?= cambiarAcentos(mb_strtoupper(_REGIMENINTERNO)) ?></h1>

<p class="text-center">
	<embed src="includes/inc_mostrar_foto.php?IdFormulario=<?= $rowregimen["IdFormulario"] ?>" width="800" height="500"/>
</p>

<?php
	mysqli_free_result($qregimen);
?>