<?php
    session_start();
	unset($_SESSION["pagina"]);
	$_SESSION["pagina"]=2;
	
	require_once("../includes/conexiones.php");

	$query="Select * from categoria where IdCategoria=".$_GET['IdCategoria'];
	$qcategoriares=mysqli_query ($link, $query);
	$rowcategoria=mysqli_fetch_array($qcategoriares);
		
	$query="Select count(*) as contador from parametros where IdCategoria=".$_GET['IdCategoria'];
	$qcontador=mysqli_query ($link, $query);
	$rowcontador=mysqli_fetch_array($qcontador);
		
	$calendario = false;
	if ($rowcontador["contador"] > 0)
	{
		$query="Select * from parametros where IdCategoria=".$_GET['IdCategoria'];
		$qparametros=mysqli_query ($link, $query);
		$rowparametros=mysqli_fetch_array($qparametros);
			
		if ($rowparametros["Calendario"] == 1)
		{
			$calendario = true;
		}
		mysqli_free_result($qparametros);
	}
		
	if ($calendario)
	{
?>			
		<p class="text-center">
			<table class="table">
				<tr>
					<td>
						<h2 class="text-center"><?= cambiarAcentos(mb_strtoupper($rowcategoria["Categoria"]))." ".cambiarAcentos(mb_strtoupper($rowcategoria["Division"])) ?></h2>
					</td>
				</tr>
				<tr>
					<td>		
						<h3 class="text-center"><?= cambiarAcentos(strtoupper(_RESULTADOS)) ?></h3>
						<?php require_once("../includes/inc_resultados.php"); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php require_once("../includes/inc_clasificacion.php"); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php require_once("../includes/inc_part_pendientes.php"); ?>
					</td>
				</tr>
			</table>
		</center>		
<?php 		
	}
	else
	{
?>			
		<h2 class="text-center"><?= cambiarAcentos(strtoupper($rowcategoria["Categoria"])) ?></h2>
		<br><br>
		<h3 class="text-center"><?= cambiarAcentos(strtoupper(_CALENDARIONODISPONIBLE)) ?></h3>
<?php 			
	}
		
	mysqli_free_result($qcategoriares);
	mysqli_free_result($qcontador);

?>

<form name="buscapagina">
	<input type="hidden" name="paginaactual" id="paginaactual" value="<?php print ($_SESSION["pagina"]);?>">
</form>