<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<a class="navbar-brand" href="#">
		<img src="imagenes/logo2.png" width="278" height="90" alt="">
	</a>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="index.php"><?= cambiarAcentos(_MENUINICIO) ?></a>
			</li>
			<li class="nav-item dropdown">
    			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    				<?= cambiarAcentos(_MENUCLUB) ?>
    			</a>
    			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
    				<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/historia.php','principal');"><?= cambiarAcentos(_MENUCLUBHISTORIA) ?></a>
    				<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/directiva.php','principal');"><?= cambiarAcentos(_MENUCLUBDIRECTIVA) ?></a>
    				<a class="dropdown-item" href="#" ><?= cambiarAcentos(_MENUCLUBPLANTILLAS) ?></a>
    				<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/himno.php','principal');"><?= cambiarAcentos(_MENUCLUBHIMNO) ?></a>
    				<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/himno.php','principal');"><?= cambiarAcentos(_MENUCLUBHIMNO) ?></a>
              		<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/socio.php','principal');"><?= cambiarAcentos(_MENUCLUBSOCIO) ?></a>
					<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/formularios.php','principal');"><?= cambiarAcentos(_MENUCLUBFORMULARIOS) ?></a>
					<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/horarios.php','principal');"><?= cambiarAcentos(_MENUCLUBHORARIOS) ?></a>
					<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/economia.php','principal');"><?= cambiarAcentos(_MENUCLUBECONOMIA) ?></a>
					<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/regimen_interno.php','principal');"><?= cambiarAcentos(_MENUCLUBREGIMENINTERNO) ?></a>
					<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/estatuto.php','principal');"><?= cambiarAcentos(_MENUCLUBESTATUTO) ?></a>
				</div>
			</li>
			<li class="nav-item dropdown">
    			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    				<?= cambiarAcentos(_MENUCATEGORIA) ?>
    			</a>
    			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=1','principal');">Veteranos A</a>
					<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=28','principal');">Veteranos B</a>
					<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=2','principal');">Amateur A</a>
					<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=3','principal');">Juvenil A</a>
					<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=4','principal');">Juvenil B</a>
					<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=6','principal');">Cadete A</a>
					<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=9','principal');">Infantil A</a>
					<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=10','principal');">Infantil B</a>
					<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=11','principal');">Alevin A</a>
					<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=12','principal');">Alevin B</a>
					<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=14','principal');">Benjamin A</a>
					<a class="dropdown-item" href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=38','principal');">Benjamin B</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#" ><?= cambiarAcentos(_MENUEQUIPOS) ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#" ><?= cambiarAcentos(_MENUCAMPOS) ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#" ><?= cambiarAcentos(_MENUTORNEO) ?></a>
			</li>
			<li class="nav-item dropdown">
    			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    				<?= cambiarAcentos(_MENUPAGINASAMIGAS) ?>
    			</a>
    			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
    				<a class="dropdown-item" href="#">Todo deporte</a>
					<a class="dropdown-item" href="#">Bous al carrer</a>
					<a class="dropdown-item" href="#">Copa Baix Llobregat</a>
					<a class="dropdown-item" href="#">Territorio Naranja</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#" ><?= cambiarAcentos(_MENUCONTACTA) ?></a>
			</li>
    	</ul>
	    <form class="form-inline my-2 my-lg-0">
	    	<table class="tabla_sin_borde w50">
    			<tr>
<?php
                    $query="select * from idiomas where IdIdioma <> ".$_SESSION['idiomapagina'];
                    $qidiomas=mysqli_query ($link, $query);
                	$filas=mysqli_num_rows($qidiomas);
                	$tantopociento=100/$filas;
                			
                	while($idioma=mysqli_fetch_array($qidiomas, MYSQLI_BOTH))
        			{
?>
   					<td width="<?= $tantopociento ?>%" align="center">
    					<a href="#"
    						onclick="cargarCambioIdioma(<?= $idioma["IdIdioma"] ?>)"
    						title="<?= cambiarAcentos(_CAMBIARIDIOMA) ?>">
    						<img src="imagenes/<?= $idioma["Ruta"] ?>" width="30" height="20" alt="<?= cambiarAcentos($idioma["Idioma"]) ?>" title="<?= cambiarAcentos($idioma["Idioma"]) ?>"/>
    					</a>
    				</td>
<?php
                    }
?>	
    			</tr>
    		</table>
		</form>
	</div>
</nav>