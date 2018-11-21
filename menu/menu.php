<?php 
	require_once("conf/traduccion.php");
	require_once("conf/funciones.php");
?>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<img src="menu/logo.png" alt="Atl&eacute;tico Centro Hospitalense" title="Atl&eacute;tico Centro Hospitalense" />
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!--<a class="navbar-brand" href="#">NavBar</a>-->
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a href="#" onclick="llamada_prototype('paginas/principal.php','principal');"><?= cambiarAcentos(_MENUINICIO) ?></a></li>
				<li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= cambiarAcentos(_MENUCLUB) ?> <b class="caret"></b></a>

					<ul class="dropdown-menu">
						<li><a href="#" onclick="llamada_prototype('paginas/historia.php','principal');"><?= cambiarAcentos(_MENUCLUBHISTORIA) ?></a></li>
						<!-- <li><a href="#" onclick="llamada_prototype('paginas/directiva.php','principal');"><?= cambiarAcentos(_MENUCLUBDIRECTIVA) ?></a></li>-->
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= cambiarAcentos(_MENUCLUBPLANTILLAS) ?> <b class="caret"></b></a>

							<ul class="dropdown-menu">
								<!--<li><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=1','principal');">Veteranos A</a></li>
								<li><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=28','principal');">Veteranos B</a></li>-->
								<li><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=2','principal');">Amateur A</a></li>
								<!--<li><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=42','principal');">Amateur B</a></li>-->
								<li><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=3','principal');">Juvenil A</a></li>
								<li><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=4','principal');">Juvenil B</a></li>
								<li><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=6','principal');">Cadete A</a></li>
								<!--<li><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=7','principal');">Cadete B</a></li>-->
								<li><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=9','principal');">Infantil A</a></li>
								<li><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=10','principal');">Infantil B</a></li>
								<li><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=11','principal');">Alevin A</a></li>
								<li><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=12','principal');">Alevin B</a></li>
								<li><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=14','principal');">Benjamin A</a></li>
								<li><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=38','principal');">Benjamin B</a></li>
							</ul>
						</li>
						<li><a href="#" onclick="llamada_prototype('paginas/himno.php','principal');"><?= cambiarAcentos(_MENUCLUBHIMNO) ?></a></li>
						<!-- <li><a href="#" onclick="llamada_prototype('paginas/socio.php','principal');"><?= cambiarAcentos(_MENUCLUBSOCIO) ?></a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/formularios.php','principal');"><?= cambiarAcentos(_MENUCLUBFORMULARIOS) ?></a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/horarios.php','principal');"><?= cambiarAcentos(_MENUCLUBHORARIOS) ?></a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/economia.php','principal');"><?= cambiarAcentos(_MENUCLUBECONOMIA) ?></a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/regimen_interno.php','principal');"><?= cambiarAcentos(_MENUCLUBREGIMENINTERNO) ?></a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/estatuto.php','principal');"><?= cambiarAcentos(_MENUCLUBESTATUTO) ?></a></li> -->
					</ul>
				</li>
				<li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias <b class="caret"></b></a>

					<ul class="dropdown-menu">
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=1','principal');">Veteranos A</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=28','principal');">Veteranos B</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=2','principal');">Amateur A</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=3','principal');">Juvenil A</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=4','principal');">Juvenil B</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=6','principal');">Cadete A</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=9','principal');">Infantil A</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=10','principal');">Infantil B</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=11','principal');">Alevin A</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=12','principal');">Alevin B</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=14','principal');">Benjamin A</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=38','principal');">Benjamin B</a></li>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Femenino Escolar A <b class="caret"></b></a>

							<ul class="dropdown-menu">
								<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=45','principal');">Fase 1 - Grupo A</a></li>
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Infantil/Cadete Escolar A <b class="caret"></b></a>

							<ul class="dropdown-menu">
								<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=39','principal');">Fase 1 - Grupo A</a></li>
								<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=40','principal');">Fase 2 - Grupo A</a></li>
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Alevin Escolar C <b class="caret"></b></a>

							<ul class="dropdown-menu">
								<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=15','principal');">Fase 1 - Grupo A</a></li>
								<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=24','principal');">Fase 2 - Grupo A</a></li>
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Benjamin Escolar C <b class="caret"></b></a>

							<ul class="dropdown-menu">
								<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=16','principal');">Fase 1 - Grupo A</a></li>
								<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=22','principal');">Fase 2 - Grupo A</a></li>
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Benjamin Escolar D <b class="caret"></b></a>

							<ul class="dropdown-menu">
								<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=17','principal');">Fase 1 - Grupo B</a></li>
								<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=23','principal');">Fase 2 - Grupo A</a></li>
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pre Benjamin Escolar A <b class="caret"></b></a>

							<ul class="dropdown-menu">
								<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=32','principal');">Fase 2 - Grupo A</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li><a href="#">Equipos</a></li>
				<li><a href="#">Campos</a></li>
				<li><a href="#">Torneo</a></li>
				<li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Paginas amigas <b class="caret"></b></a>

					<ul class="dropdown-menu">
						<li><a href="#">Todo deporte</a></li>
						<li><a href="#">Bous al carrer</a></li>
						<li><a href="#">Copa Baix Llobregat</a></li>
						<li><a href="#">Territorio Naranja</a></li>
					</ul>
				</li>
				<li><a href="#">Contacta</a></li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>