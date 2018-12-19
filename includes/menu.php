<div class="main fixed-top">
    <ul class="mainnav">
		<li>
			<a class="navbar-brand" href="#">
				<img src="imagenes/logo.png" width="150" height="90" alt="">
			</a>
		</li>
        <li><a href="index.php"><?= cambiarAcentos(_MENUINICIO) ?></a></li>
        <li class="hassubs"><a href="#"><?= cambiarAcentos(_MENUCLUB) ?></a>
            <ul class="dropdown">
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/historia.php','principal');"><?= cambiarAcentos(_MENUCLUBHISTORIA) ?></a></li>
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/directiva.php','principal');"><?= cambiarAcentos(_MENUCLUBDIRECTIVA) ?></a></li>
                <li class="subs hassubs"><a href="#"><?= cambiarAcentos(_MENUCLUBPLANTILLAS) ?></a>
                    <ul class="dropdown">
                        <li class="subs"><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=2','principal');">Amateur A</a></li>
                        <li class="subs"><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=3','principal');">Juvenil A</a></li>
                        <li class="subs"><a href="#" onclick="llamada_prototype('paginas/plantillas.php?IdCategoria=4','principal');">Juvenil B</a></li>
                    </ul>
                </li>
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/himno.php','principal');"><?= cambiarAcentos(_MENUCLUBHIMNO) ?></a></li>
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/socio.php','principal');"><?= cambiarAcentos(_MENUCLUBSOCIO) ?></a></li>
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/formularios.php','principal');"><?= cambiarAcentos(_MENUCLUBFORMULARIOS) ?></a></li>
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/horarios.php','principal');"><?= cambiarAcentos(_MENUCLUBHORARIOS) ?></a></li>
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/economia.php','principal');"><?= cambiarAcentos(_MENUCLUBECONOMIA) ?></a></li>
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/regimen_interno.php','principal');"><?= cambiarAcentos(_MENUCLUBREGIMENINTERNO) ?></a></li>
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/estatuto.php','principal');"><?= cambiarAcentos(_MENUCLUBESTATUTO) ?></a></li>
            </ul>
        </li>
        <li class="hassubs"><a href="#"><?= cambiarAcentos(_MENUCATEGORIA) ?></a>
            <ul class="dropdown">
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=1','principal');">Veteranos A</a></li>
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=28','principal');">Veteranos B</a></li>
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=2','principal');">Amateur A</a></li>
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=3','principal');">Juvenil A</a></li>
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=4','principal');">Juvenil B</a></li>
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=6','principal');">Cadete A</a></li>
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=9','principal');">Infantil A</a></li>
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=10','principal');">Infantil B</a></li>
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=11','principal');">Alevin A</a></li>
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=12','principal');">Alevin B</a></li>
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=14','principal');">Benjamin A</a></li>
                <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=38','principal');">Benjamin B</a></li>
                <li class="subs hassubs"><a href="#">Femenino Escolar A</a>
                    <ul class="dropdown">
                        <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=45','principal');">Fase 1 - Grupo A</a></li>
                    </ul>
                </li>
                <li class="subs hassubs"><a href="#">Infantil/Cadete Escolar A</a>
                    <ul class="dropdown">
                        <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=39','principal');">Fase 1 - Grupo A</a></li>
                        <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=40','principal');">Fase 2 - Grupo A</a></li>
                    </ul>
                </li>
                <li class="subs hassubs"><a href="#">Alevin Escolar C</a>
                    <ul class="dropdown">
                        <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=15','principal');">Fase 1 - Grupo A</a></li>
                        <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=24','principal');">Fase 2 - Grupo A</a></li>
                    </ul>
                </li>
                <li class="subs hassubs"><a href="#">Benjamin Escolar C</a>
                    <ul class="dropdown">
                        <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=16','principal');">Fase 1 - Grupo A</a></li>
                        <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=22','principal');">Fase 2 - Grupo A</a></li>
                    </ul>
                </li>
                <li class="subs hassubs"><a href="#">Benjamin Escolar D</a>
                    <ul class="dropdown">
                        <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=17','principal');">Fase 1 - Grupo A</a></li>
                        <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=23','principal');">Fase 2 - Grupo A</a></li>
                    </ul>
                </li>
                <li class="subs hassubs"><a href="#">Pre Benjamin Escolar A</a>
                    <ul class="dropdown">
                        <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=32','principal');">Fase 1 - Grupo A</a></li>
                        <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=23','principal');">Fase 2 - Grupo A</a></li>
                    </ul>
                </li>
                <li class="subs hassubs"><a href="#">Mini A</a>
                    <ul class="dropdown">
                        <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=32','principal');">Fase 1 - Grupo A</a></li>
                        <li class="subs"><a href="#" onclick="llamada_prototype('paginas/resultados.php?IdCategoria=23','principal');">Fase 2 - Grupo A</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="#"><?= cambiarAcentos(_MENUEQUIPOS) ?></a></li>
        <li><a href="#"><?= cambiarAcentos(_MENUCAMPOS) ?></a></li>
        <li><a href="#"><?= cambiarAcentos(_MENUTORNEO) ?></a></li>
        <li class="hassubs"><a href="#"><?= cambiarAcentos(_MENUPAGINASAMIGAS) ?></a>
            <ul class="dropdown">
                <li class="subs"><a href="#" target="_blanck">Todo deporte</a></li>
                <li class="subs"><a href="#" target="_blanck">Bous al carrer</a></li>
                <li class="subs"><a href="#" target="_blanck">Copa Baix Llobregat</a></li>
                <li class="subs"><a href="#" target="_blanck">Territorio Naranja</a></li>
            </ul>
        </li>
    </ul>
    <br style="clear: both;">
</div>