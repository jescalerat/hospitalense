<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	
	require_once($_SESSION["ruta"]."conf/traduccion.php");
	require_once($_SESSION["ruta"]."conf/funciones.php");
	require_once($_SESSION["ruta"]."conf/conexion.php");
	$link=Conectarse();
?>
	
	<table class="tabla_sin_borde w80">
		<tr>
			<td class="tabla_sin_borde">
				<?php require_once($_SESSION["ruta"]."includes/inc_noticias.php"); ?>
			</td>
		</tr>
	</table>



