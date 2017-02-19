<?php
    session_start();
	unset($_SESSION["pagina"]);
	$_SESSION["pagina"]=14;

	require_once($_SESSION["ruta"]."conf/traduccion.php");
	require_once($_SESSION["ruta"]."conf/funciones.php");
	require_once($_SESSION["ruta"]."conf/conexion.php");
	$link=Conectarse();
?>	

	<table class="tabla_sin_borde w80">
		<tr>
			<td class="tabla_sin_borde">
				<?php require_once($_SESSION["ruta"]."includes/inc_historia.php"); ?>
			</td>
		</tr>
	</table>
	
<?php	
	if(isset($_GET['identificador']))
	{
		$jornada_equipo=$_GET['identificador'];
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
?>


<form name="buscapagina">
	<input type="hidden" name="paginaactual" id="paginaactual" value="<?php print ($_SESSION["pagina"]);?>">
</form>