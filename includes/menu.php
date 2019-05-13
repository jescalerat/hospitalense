<!-- http://www.webdesignerwall.com/demo/css3-dropdown-menu/ -->

<div class="fixed-top">
	<ul id="nav">
		<li class="current"><a href="index.php"><?= cambiarAcentos(_MENUINICIO) ?></a></li>
		<li><a href="#"><?= cambiarAcentos(_MENUCLUB) ?></a>
			<ul>
				<li><a href="#" onclick="llamada_prototype('paginas/historia.php','principal');"><?= cambiarAcentos(_MENUCLUBHISTORIA) ?></a></li>
				<li><a href="#" onclick="llamada_prototype('paginas/directiva.php','principal');"><?= cambiarAcentos(_MENUCLUBDIRECTIVA) ?></a></li>
				<li><a href="#"><?= cambiarAcentos(_MENUCLUBPLANTILLAS) ?></a>
					<ul>
						<li><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=2','principal');">Amateur A</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=2','principal');">Juvenil A</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=2','principal');">Juvenil B</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=2','principal');">Cadete A</a></li>
					</ul>
				</li>
				<li><a href="#" onclick="llamada_prototype('paginas/himno.php','principal');"><?= cambiarAcentos(_MENUCLUBHIMNO) ?></a></li>
				<li><a href="#" onclick="llamada_prototype('paginas/socio.php','principal');"><?= cambiarAcentos(_MENUCLUBSOCIO) ?></a></li>
				<li><a href="#" onclick="llamada_prototype('paginas/formularios.php','principal');"><?= cambiarAcentos(_MENUCLUBFORMULARIOS) ?></a></li>
				<li><a href="#" onclick="llamada_prototype('paginas/horarios.php','principal');"><?= cambiarAcentos(_MENUCLUBHORARIOS) ?></a></li>
				<li><a href="#" onclick="llamada_prototype('paginas/economia.php','principal');"><?= cambiarAcentos(_MENUCLUBECONOMIA) ?></a></li>
				<li><a href="#" onclick="llamada_prototype('paginas/regimen_interno.php','principal');"><?= cambiarAcentos(_MENUCLUBREGIMENINTERNO) ?></a></li>
				<li><a href="#" onclick="llamada_prototype('paginas/estatuto.php','principal');"><?= cambiarAcentos(_MENUCLUBESTATUTO) ?></a></li>
			</ul>
		</li>
		<li><a href="#"><?= cambiarAcentos(_MENUCATEGORIA) ?></a>
			<ul>
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
<!--				<li><a href="#">Femenino Escolar A</a>
					<ul>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=45','principal');">Fase 1 - Grupo A</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=45','principal');">Fase 2 - Grupo A</a></li>
					</ul>
				</li>
				<li><a href="#">Infantil/Cadete Escolar A</a>
					<ul>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=45','principal');">Fase 1 - Grupo A</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=45','principal');">Fase 2 - Grupo A</a></li>
					</ul>
				</li>
-->
				<li><a href="#">Alevin Escolar A</a>
					<ul>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=15','principal');">Fase 1 - Grupo A</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=24','principal');">Fase 2 - Grupo C</a></li>
					</ul>
				</li>
				<li><a href="#">Alevin Escolar B</a>
					<ul>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=30','principal');">Fase 1 - Grupo C</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=31','principal');">Fase 2 - Grupo B</a></li>
					</ul>
				</li>				
				<li><a href="#">Benjamin Escolar A</a>
					<ul>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=16','principal');">Fase 1 - Grupo D</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=22','principal');">Fase 2 - Grupo A</a></li>
					</ul>
				</li>
<!--
				<li><a href="#">Benjamin Escolar B</a>
					<ul>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=45','principal');">Fase 1 - Grupo A</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=45','principal');">Fase 2 - Grupo A</a></li>
					</ul>
				</li>
-->
				<li><a href="#">Pre Benjamin Escolar A</a>
					<ul>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=19','principal');">Fase 1 - Grupo A</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=32','principal');">Fase 2 - Grupo C</a></li>
					</ul>
				</li>
				<li><a href="#">Mini Escolar A</a>
					<ul>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=21','principal');">Fase 1 - Grupo A</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=47','principal');">Fase 2 - Grupo B</a></li>
						<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=48','principal');">Fase 3 - Grupo B</a></li>
					</ul>
				</li>
			</ul>
		</li>	
		<li><a href="#" onclick="llamada_prototype('paginas/equipos.php','principal');"><?= cambiarAcentos(_MENUEQUIPOS) ?></a></li>
		<li><a href="#" onclick="llamada_prototype('paginas/campos.php','principal');"><?= cambiarAcentos(_MENUCAMPOS) ?></a></li>
		<li><a href="#">Torneo</a></li>
		<li><a href="#">Paginas amigas</a>
			<ul>
				<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=1','principal');">Todo deporte</a></li>
				<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=1','principal');">Todo deporte</a></li>
				<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=1','principal');">Todo deporte</a></li>
				<li><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=1','principal');">Todo deporte</a></li>
			</ul>
		</li>				
		<li><a href="#" onclick="llamada_prototype('paginas/contactar.php','principal');"><?= cambiarAcentos(_MENUCONTACTA) ?></a></li>
	</ul>
</div> 
