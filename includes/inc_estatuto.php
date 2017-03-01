<?php
	$query="select * from formularios where IdTipo = 3 order by orden asc";
	$qestatuto = mysqli_query ($link, $query);
	$rowestatuto=mysqli_fetch_array($qestatuto);
?>
<center><h1><?= cambiarAcentos(strtoupper(_ESTATUTO)) ?></h1></center>

<center>
	<embed src="includes/inc_mostrar_foto.php?IdFormulario=<?= $rowestatuto["IdFormulario"] ?>" width="800" height="500"/>
</center>

<?php
	mysqli_free_result($qestatuto);
?>