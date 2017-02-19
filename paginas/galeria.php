<?php
	session_start();
	unset($_SESSION["pagina"]);
	$_SESSION["pagina"]=21;
	
	require_once($_SESSION["ruta"]."conf/traduccion.php");
	require_once($_SESSION["ruta"]."conf/funciones.php");
	require_once($_SESSION["ruta"]."conf/conexion.php");
	$link=Conectarse();
?>	

	<table class="tabla_sin_borde w100">
		<tr>
			<td class="tabla_sin_borde">
				<?php require_once($_SESSION["ruta"]."includes/inc_galeria.php"); ?>
			</td>
		</tr>
	</table>
	
<?php	
	$idGaleria = $_GET['IdGaleria'];
	
	if (!isset($_SESSION["admin_web"]))
	{
		//Query para insertar los valores en la base de datos
		$query="insert into paginasvistas (IP,Hora,Fecha,Pagina,JornadaEquipo) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].",".$idGaleria.")";
		mysqli_query($link, $query);
	}
?>