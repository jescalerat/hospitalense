<?php
    session_start();
	unset($_SESSION["pagina"]);
	$_SESSION["pagina"]=17;

	require_once($_SESSION["ruta"]."conf/traduccion.php");
	require_once($_SESSION["ruta"]."conf/funciones.php");
	require_once($_SESSION["ruta"]."conf/conexion.php");
	$link=Conectarse();
?>	
	<center>
		<table class="tabla_sin_borde w95">
			<tr>
				<td class="tabla_sin_borde">
					<?php require_once($_SESSION["ruta"]."includes/inc_socio.php"); ?>
				</td>
			</tr>
		</table>
	</center>
	
<?php	
	if (!isset($_SESSION["admin_web"]))
	{
		//Query para insertar los valores en la base de datos
		$query="insert into paginasvistas (IP,Hora,Fecha,Pagina) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].")";
		mysqli_query($link, $query);
	}
?>


<form name="buscapagina">
	<input type="hidden" name="paginaactual" id="paginaactual" value="<?php print ($_SESSION["pagina"]);?>">
</form>