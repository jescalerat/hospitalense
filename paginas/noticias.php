<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	
	require_once("../conf/traduccion.php");
	require_once("../conf/funciones.php");
	require_once("../conf/conexion.php");
	$link=Conectarse();
?>
	
	<table class="tabla_sin_borde w95">
		<tr>
			<td class="tabla_sin_borde">
				<?php require_once("../includes/inc_noticias.php"); ?>
			</td>
		</tr>
	</table>



