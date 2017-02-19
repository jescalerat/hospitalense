<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<img src="menu/logo.png" alt="Gatito" />
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
				<li><a href="#" onclick="llamada_prototype('<?php print($_SESSION["rutaservidor"]); ?>paginas/principal.php','principal');"><?= cambiarAcentos(_MENUINICIO) ?></a></li>
				<li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= cambiarAcentos(_MENUCLUB) ?> <b class="caret"></b></a>

					<ul class="dropdown-menu">
						<li><a href="#" onclick="llamada_prototype('<?php print($_SESSION["rutaservidor"]); ?>paginas/historia.php','principal');"><?= cambiarAcentos(_MENUCLUBHISTORIA) ?></a></li>
						<li><a href="#">Himno</a></li>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Plantillas <b class="caret"></b></a>

							<ul class="dropdown-menu">
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias <b class="caret"></b></a>

					<ul class="dropdown-menu">
						<li><a href="#">Veteranos A</a></li>
						<li><a href="#">Veteranos B</a></li>
						<li><a href="#">Amateur A</a></li>
						<li><a href="#">Juvenil A</a></li>
						<li><a href="#">Juvenil B</a></li>
						<li><a href="#">Cadete A</a></li>
						<li><a href="#">Infantil A</a></li>
						<li><a href="#">Infantil B</a></li>
						<li><a href="#">Alevin A</a></li>
						<li><a href="#">Alevin B</a></li>
						<li><a href="#">Benjamin A</a></li>
						<li><a href="#">Benjamin B</a></li>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Femenino Escolar A <b class="caret"></b></a>

							<ul class="dropdown-menu">
								<li><a href="#">Fase 1 - Grupo A</a></li>
								<!--<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>-->
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Infantil/Cadete Escolar A <b class="caret"></b></a>

							<ul class="dropdown-menu">
								<li><a href="#">Fase 1 - Grupo A</a></li>
								<!--<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>-->
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Alevin Escolar C <b class="caret"></b></a>

							<ul class="dropdown-menu">
								<li><a href="#">Fase 1 - Grupo A</a></li>
								<!--<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>-->
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Benjamin Escolar C <b class="caret"></b></a>

							<ul class="dropdown-menu">
								<li><a href="#">Fase 1 - Grupo A</a></li>
								<!--<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>-->
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Benjamin Escolar D <b class="caret"></b></a>

							<ul class="dropdown-menu">
								<li><a href="#">Fase 1 - Grupo B</a></li>
								<!--<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>
								<li><a href="#">Veteranos A</a></li>-->
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