<?php
    session_start();
    unset($_SESSION["pagina"]);
    $_SESSION["pagina"]=8;
	
    require_once("../conf/traduccion.php");
    require_once("../conf/funciones.php");
    require_once("../conf/conexion.php");
    $link=Conectarse();
?>
	<table class="tabla_sin_borde w90">
		<tr>
			<td class="tabla_sin_borde">
				<div id="cargando">
					<?php require_once("../includes/inc_goleadores.php"); ?>
				</div>
			</td>
		</tr>
	</table>
		
<?php
    $jornada_equipo=$_GET['identificador'];

    if (!isset($_SESSION["admin_web"]))
    {
   	    //Query para insertar los valores en la base de datos
        $query="insert into paginasvistas (IP,Hora,Fecha,Pagina,JornadaEquipo) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].",".$jornada_equipo.")";
        mysqli_query($link, $query);
	}
?>

<form name="buscapagina">
	<input type="hidden" name="paginaactual" id="paginaactual" value="<?= $_SESSION["pagina"] ?>">
</form>