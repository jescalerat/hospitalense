<?php
	session_start();
	unset($_SESSION["pagina"]);
	$_SESSION["pagina"]=2;
	
	require_once($_SESSION["ruta"]."conf/traduccion.php");
	require_once($_SESSION["ruta"]."conf/conexion.php");
	require_once($_SESSION["ruta"]."conf/funciones.php");
	
	if(isset($_SESSION["ruta"]))
	{
		$link=Conectarse();
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
			<center>
				<table class="tabla_sin_borde w95">
					<tr>
						<td>
							<h2><center><?= cambiarAcentos(strtoupper($rowcategoria["Categoria"]))." ".cambiarAcentos(strtoupper($rowcategoria["Division"])) ?></h2>
						</td>
					</tr>
					<tr>
						<td>		
							<h2><center><?= cambiarAcentos(strtoupper(_RESULTADOS)) ?></h2>
							<?php require_once($_SESSION["ruta"]."includes/inc_resultados.php"); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php require_once($_SESSION["ruta"]."includes/inc_clasificacion.php"); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php require_once($_SESSION["ruta"]."includes/inc_part_pendientes.php"); ?>
						</td>
					</tr>
				</table>
			</center>		
<?php 		
		}
		else
		{
?>			
			<h2><center><?= cambiarAcentos(strtoupper($rowcategoria["Categoria"])) ?></h2>
			<br><br>
			<h3><center><?= cambiarAcentos(strtoupper(_CALENDARIONODISPONIBLE)) ?></h3>
<?php 			
		}


		if(isset($_GET['Jornada']))
		{
			$jornada_equipo=$_GET['Jornada'];
		}
		else
		{
			$jornada_equipo=0;
		}
	
		if (!isset($_SESSION["admin_web"]))
		{
			//Query para insertar los valores en la base de datos
			$query="insert into paginasvistas (IP,Hora,Fecha,Pagina,JornadaEquipo) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].",".$jornada_equipo.")";
			mysqli_query($link, $query);
		}
		
		mysqli_free_result($qcategoriares);
		mysqli_free_result($qcontador);
	}

?>

<form name="buscapagina">
	<input type="hidden" name="paginaactual" id="paginaactual" value="<?php print ($_SESSION["pagina"]);?>">
</form>