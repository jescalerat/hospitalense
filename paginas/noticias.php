<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	

?>
	
	<table class="tabla_sin_borde w95">
		<tr>
			<td class="tabla_sin_borde">
				<?php require_once("includes/inc_noticias.php"); ?>
			</td>
		</tr>
	</table>



