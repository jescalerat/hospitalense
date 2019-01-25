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

		//Buscar las noticias
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
			<table class="table table-striped table-sm">
			<div class="list-group">
<?php			
				$cont = 1;
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
						<td>
							<h1><?= cambiarAcentos($titulo) ?></h1>
						</td>
					</tr>
					<tr>
						<td>
							<h4>
								<a class="list-group-item list-group-item-action list-group-item-light" data-toggle="modal" data-target="#noticia<?= $cont ?>">
									<?= cambiarAcentos($noticiatrunc) ?>
								</a>
							</h4>
							<div class="modal fade" id="noticia<?= $cont ?>" tabindex="-1" role="dialog" aria-labelledby="noticiaTitle" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="noticiaTitulo"><?= cambiarAcentos($titulo) ?></h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        <?= cambiarAcentos($noticia) ?>
							      </div>
							    </div>
							  </div>
							</div>
						</td>
					</tr>
<?php
					$cont++;
				} //while($noticias=mysql_fetch_array($resultados))
?>
			</div>
			</table>
<?php				
			mysqli_free_result($resultados);
?>
			<p>

			<nav aria-label="Page navigation example">
			  <ul class="pagination pagination-sm justify-content-center">
<?php
				if(($pagina - 1) > 0)
				{
?>				
					<li class="page-item"><a class="page-link" href="javascript:llamada_prototype('paginas/noticias.php?paginacion=<?= ($pagina-1) ?>','noticias');"><?= cambiarAcentos(_BUSCARANTERIOR) ?></a></li>
<?php				
				}
				
				for ($i=1; $i<=$total_paginas; $i++){ 
					if ($pagina == $i)
					{
?>					
						<li class="page-item active"><a class="page-link" href="#"><?= $pagina ?></a></li>
<?php					
					}
					else
					{
?>					
						<li class="page-item"><a class="page-link" href="javascript:llamada_prototype('paginas/noticias.php?paginacion=<?= ($i) ?>','noticias');"> <?= ($i) ?> </a></li>
<?php
					}
				}
			  
				if(($pagina + 1)<=$total_paginas)
				{
?>				
					<li class="page-item"><a class="page-link" href="javascript:llamada_prototype('paginas/noticias.php?paginacion=<?= ($pagina+1) ?>','noticias');"><?= cambiarAcentos(_BUSCARSIGUIENTE) ?></a></li>
<?php				
				}
?>			
				</ul>
			</nav>
		</div>
<?php	
		}//if ($totalnoticias > 0)
?>

