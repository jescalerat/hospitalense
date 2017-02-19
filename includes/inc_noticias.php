<?php


	
//---------------------------------------------------------------------------------------------------------------
		//Paginación
		$registros = 5;

		if (!isset($_GET['paginacion'])) {
			$inicio = 0; 
			$pagina = 1; 
		} 
		else { 
			$pagina=$_GET['paginacion'];
			$inicio = ($pagina - 1) * $registros; 
		} 
		//Fin paginación
//---------------------------------------------------------------------------------------------------------------

		//Buscar las poblaciones de los equipos que tengo
		$query="select * from noticias order by Orden asc";
		$qnoticias=mysqli_query($link, $query);
		
		$querypaginacion="select * from noticias order by Orden asc LIMIT ".$inicio.", ".$registros;

		//Obtener el numero de filas devuelto
		$totalnoticias=mysqli_num_rows($qnoticias);
		
		//Querys paginacion
		$resultados = mysqli_query($link, $querypaginacion);	
		$total_paginas = ceil($totalnoticias / $registros);
		
		if ($totalnoticias > 0){
?>
		<div id="noticias">
			<table class="tabla_sin_borde w100">
<?php			
				while($noticias=mysqli_fetch_array($resultados, MYSQLI_BOTH))
				{
					$titulo="";
					$noticia="";
					if ($_SESSION["idiomapagina"]==1){
						$titulo=$noticias["TituloES"];
						$noticia=$noticias["TextoES"];
					} else if ($_SESSION["idiomapagina"]==2){
						$titulo=$noticias["TituloEN"];
						$noticia=$noticias["TextoEN"];
					} else if ($_SESSION["idiomapagina"]==3){
						$titulo=$noticias["TituloCA"];
						$noticia=$noticias["TextoCA"];
					} 
					
					$tam = strlen ($noticia);
					$noticiatrunc = "";
					if ($tam > 200){
						$noticiatrunc = substr($noticia, 0, 200)." ...";	
					} else {
						$noticiatrunc = $noticia;
					}
?>
					<tr>
						<td class="tabla_sin_borde">
							<h1><?= cambiarAcentos($titulo) ?></h1>
						</td>
					</tr>
					<tr>
						<td class="tabla_sin_borde">
							<h4><a class="noticias" href="javascript:ampliarNoticia('<?= cambiarAcentos($titulo) ?>','<?= cambiarAcentos($noticia) ?>',800,600)")><?= cambiarAcentos($noticiatrunc) ?></a></h4>
							
						</td>
					</tr>
<?php
				} //while($noticias=mysql_fetch_array($resultados))
?>
			</table>
<?php				
			mysqli_free_result($resultados);

			$division=$total_paginas*3; //El 3 es el tanto por ciento que se le da a cada pagina
			$resta=(100-$division)/2;  //Resto el tanto por ciento que ocupan las paginas y lo divido para poner Anterior y Siguiente
?>
			<p><center>

			<table class="tabla_sin_borde w80">
				<tr>
<?php
				if(($pagina - 1) > 0)
				{
?>				
					<td class="tabla_sin_borde derecha" width="<?= $resta ?>%"><a href=javascript:llamada_prototype('paginas/noticias.php?paginacion=<?= ($pagina-1) ?>','noticias')><?= cambiarAcentos(_BUSCARANTERIOR) ?></a>&nbsp;&nbsp;</td>
<?php				
				}
				else
				{
?>				
					<td class="tabla_sin_borde" width="<?= $resta ?>%"></td>
<?php				
				}
				
				for ($i=1; $i<=$total_paginas; $i++){ 
					if ($pagina == $i)
					{
?>					
						<td class="tabla_sin_borde" width="3%"><b><?= $pagina ?></b></td>
<?php					
					}
					else
					{
?>					
						<td class="tabla_sin_borde" width="3%"><a href=javascript:llamada_prototype('paginas/noticias.php?paginacion=<?= ($i) ?>','noticias')> <?= ($i) ?> </a></td>
<?php
					}
				}
			  
				if(($pagina + 1)<=$total_paginas)
				{
?>				
					<td class="tabla_sin_borde" width="<?= $resta ?>%"><a href=javascript:llamada_prototype('paginas/noticias.php?paginacion=<?= ($pagina+1) ?>','noticias')><?= cambiarAcentos(_BUSCARSIGUIENTE) ?></a></td>
<?php				
				}
				else
				{
?>				
					<td class="tabla_sin_borde" width="<?= $resta ?>%"></td>
<?php				
				}
?>			
				</tr>
			</table>
			</center>
		</div>
<?php	
		}//if ($totalnoticias > 0)
?>

<div id="ampliacion" style="padding:2 2 2 2px; position:absolute; left: 200px; top: 100px; visibility: hidden; border: 1px solid #666666; background-color:#16C8DD;"> 
	<div id="c1"> 

	</div> 
	<div id="cerrarampliacion" style="background-color:333333; font-family:arial,verdana; font-size:8pt; line-height:20px; text-align:right;float:right; height: 20px; padding-right:5px; font-weight: normal; "> 
		<a href="javascript:cerrar_ampliacion()" style="color:#ffffff;">[X] <?= cambiarAcentos(_CERRAR) ?></a> 
	</div> 
</div> 