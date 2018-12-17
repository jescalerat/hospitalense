<?php
//Club=1
//Resultados=2
//Clasificación=3
//Equipos=4
//Contactar=5
//Campos=6
//Estadisticas=7
//Goleadores=8
//Mostrar equipos=9
//Mostrar campos=10
//Campus=11
//Torneo=12
//Horarios=13


$idioma=1;
if (isset($_SESSION['idiomapagina'])){
	$idioma=$_SESSION['idiomapagina'];
}

if ($idioma==1) //Español
{
	//Inicio
	define ('_BUENOSDIAS','Buenos días');
	define ('_BUENASTARDES','Buenas tardes');
	define ('_BUENASNOCHES','Buenas noches');
	define ('_CARGANDO','Cargando...');
	define ('_PROXIMAMENTE','Disponible próximamente'); 
	define ('_MANTENIMIENTO1','Página en mantenimiento'); 
	define ('_MANTENIMIENTO2','Disculpen las molestias'); 
	define ('_CERRADONAVIDAD','El club permanecerá cerrado entre el 23 de diciembre y el 6 de enero, ambos inclusive.');
	define ('_DESPLAZAMIENTOBUS','Acompaña al Juvenil A a Cunit este sábado al precio de 8 euros.<br>Preguntar en las oficinas del club.');
	define ('_CERRADOSEMANASANTA','El club permanecerá cerrado entre el 25 de marzo y el 2 de abril, ambos inclusive');
	
	//Cambio idioma
	define ('_ESPANYOL','Español');
	define ('_INGLES','Inglés');
	define ('_CATALAN','Catalán');
	define ('_CAMBIOIDIOMA','Cambio idioma');
	define ('_CAMBIANDOIDIOMA','Cambiando idioma');

	//Usuarios
	define ('_BIENVENIDA','Bienvenido ');
	define ('_POSICIONBIENVENIDA1','Su equipo ocupa la ');
	define ('_POSICIONBIENVENIDA2',' posición');
	define ('_NOUSUARIO1','Si usted no es el usuario ');
	define ('_NOUSUARIO2',' por favor salga de la sesión');
	define ('_ANONIMO','anonimo');
	define ('_USUARIO','Usuario');
	define ('_PASSWORD','Contraseña');
	define ('_ENTRAR','Entrar');
	define ('_REGISTRAR','Registrarse');
	define ('_NOENCONTRADO','El nombre de usuario o el password no son válidos');
	define ('_ERRORREGISTRO','El nombre de usuario ya existe');

	//Registro
	define ('_TITULOREGISTRO','FORMULARIO DE REGISTRO');
	define ('_ALIASREGISTRO','Alias');
	define ('_PASSWORDREGISTRO','Password');
	define ('_EMAILREGISTRO','E-mail');
	define ('_EQUIPOREGISTRO','Equipo');
	define ('_SELECCIONAEQUIPOREGISTRO','Selecciona equipo');
	define ('_OTROEQUIPOREGISTRO','Otro equipo');
	define ('_NOJUEGAREGISTRO','No juega');
	define ('_ENVIARREGISTRO','Enviar');
	define ('_TIPOERROR1REGISTRO','Falta el alias');
	define ('_TIPOERROR2REGISTRO','Falta el password');
	define ('_TIPOERROR3REGISTRO','Falta el e-mail');
	define ('_TIPOERROR4REGISTRO','Falta el equipo');
	define ('_REGISTROCORRECTO','Usted se ha registrado correctamente con los siguientes datos');

	//Fotos
	define ('_FOTOSTEMPORADA','FOTOS TEMPORADA 2006/07');
	define ('_AMPLIAR','Pulsa para ampliar la imagen');
	define ('_CERRAR','Cerrar');

	//Página resultados
	define ('_RESULTADOS','Resultados');
	define ('_IDA','Ida');
	define ('_VUELTA','Vuelta'); 
	define ('_JORNADASIGUIENTE','Jornada siguiente >>');
	define ('_JORNADAANTERIOR','<< Jornada anterior');
	define ('_INCIDENCIAS','Incidencias'); 
	define ('_JORNADA','Jornada');
	define ('_SINDATOS','Sin datos');
	define ('_APLAZADO','Aplazado');
	define ('_SUSPENDIDO','Suspendido');
	define ('_PROMOCION','Promoción');
	define ('_CALENDARIONODISPONIBLE','Calendario no disponible');

	//Página quiniela
	define ('_VOLVERQUINIELA','Volver a quiniela'); 
	define ('_PARTIDOS','Partidos'); 
	define ('_PARTIDO','Partido'); 
	define ('_PRONOSTICOS','Pronosticos');
	define ('_PRONOSTICO','Pronostico');
	define ('_QUINIELAFORO1','QUINIELA'); 
	define ('_QUINIELAFORO2','CATALUNYA F&Uacute;TBOL'); 
	define ('_QUINIELAFORO3','F&Uacute;TBOL CATALUNYA'); 
	define ('_QUINIELAWEB','QUINIELA WEB'); 
	define ('_PROXIMAMENTEQUINIELA','DISPONIBLE PR&Oacute;XIMAMENTE'); 
	define ('_JUGADORES','Jugadores participantes'); 
	define ('_NOMBRE','Nombre'); 
	define ('_ACIERTOS','Aciertos'); 
	define ('_POSICION','Posición'); 
	define ('_PARTIDOSJUGADOS','Partidos jugados'); 
	define ('_SINPRONOSTICO','Faltan pronosticos'); 
	define ('_SOLOREGISTRADOS','Sólo para usuarios registrados');
	define ('_ENVIARQUINIELA','Enviar');
	define ('_TIEMPOTERMINADO','El tiempo para rellenar la quiniela a terminado');

	//Página encuesta
	define ('_ENCUESTA','Encuesta'); 
	define ('_PREGUNTA','¿Quién crees que ganará la Liga?'); 
	define ('_EQUIPOENCUESTA','Equipo'); 
	define ('_PUNTOSENCUESTA','Puntos'); 
	define ('_ENVIARENCUESTA','Vota');
	define ('_ERRORENCUESTA','Elige un equipo');
	define ('_EQUIPOELEGIDO','El equipo que has elegido es');
	define ('_EQUIPOVALIDADO','Usted ya votó. El equipo elegido fue');
	define ('_RESULTADOSENCUESTA','Como va la encuesta');
	define ('_PORCENTAGESENCUESTA','Porcentaje');
	define ('_VOTANTESSENCUESTA','Votantes');

	//Página goleadores
	define ('_VOLVERRESULTADOS','Volver a resultados'); 
	define ('_VOLVERPROMOCION','Volver a promoción');
	define ('_CAMPO','Campo'); 
	define ('_SOLOREGISTRADOSCOMENTARIOS','Regístrate si quieres dejar tu comentario');
	define ('_FECHAPARTIDO','Fecha');

	//Página clasificación
	define ('_CLASIFICACION','Clasificación'); 
	define ('_EQUIPO','Equipo'); 
	define ('_PUNTOS','Puntos'); 
	define ('_JUGADOS','Jugados'); 
	define ('_GANADOS','Ganados'); 
	define ('_EMPATADOS','Empatados'); 
	define ('_PERDIDOS','Perdidos'); 
	define ('_GF','G. F.'); 
	define ('_GC','G. C.'); 
	define ('_HASTAJORNADA','hasta jornada'); 
	define ('_PARTIDOSCASA','Partidos jugados en casa'); 
	define ('_PARTIDOSFUERA','Partidos jugados fuera'); 
	define ('_PARTIDOS1VUELTA','Partidos jugados 1ª vuelta'); 
	define ('_PARTIDOS2VUELTA','Partidos jugados 2ª vuelta'); 
	define ('_ASCIENDE','Asciende a'); 
	define ('_PROMOCIONA','Promociona para'); 
	define ('_DESCIENDE','Desciende a'); 
	define ('_SANCION','Sancionado con ');
	define ('_VOLVERCLASIFICACION','Volver a clasificación');
	define ('_GRAFICA','Gráfica');
	define ('_TABTODO','Todo');
	define ('_TABCASA','Casa');
	define ('_TABFUERA','Fuera');
	define ('_TAB1VUELTA','1ª vuelta');
	define ('_TAB2VUELTA','2ª vuelta');
	define ('_PARTIDOSGANADOS','Partidos ganados por el');
	define ('_PARTIDOSEMPATADOS','Partidos empatados por el');
	define ('_PARTIDOSPERDIDOS','Partidos perdidos por el');

	//Campos
	define ('_CAMPOS','Campos');
	define ('_DIRECCION','Dirección'); 
	define ('_POBLACION','Población'); 
	define ('_EQUIPOS','Equipos');
	define ('_VOLVERCAMPOS','Volver a campos'); 
	define ('_BUSCAR','Buscar');
	define ('_BUSCARPOBLACION','Se han buscado todos los campos de la población: ');
	define ('_BUSCARTODO','Se ha buscado por Nombre del campo, Dirección y Población la palabra: ');
	define ('_BUSCARTOTAL','Total campos: ');
	define ('_BUSCARANTERIOR','Anterior');
	define ('_BUSCARSIGUIENTE','Siguiente');
	define ('_COMOLLEGAR','Cómo llegar'); 
	define ('_COCHE','Coche'); 
	define ('_TREN','Tren'); 
	define ('_METRO','Metro'); 
	define ('_BUS','Autobús'); 
	define ('_TRAM','Tram');
	define ('_FFCC','Ferrocarils de la Generalitat'); 

	//Equipos
	define ('_EQUIPOSBUSCADOR','Equipos');
	define ('_CAMPOOTROSEQUIPOS','Campo');
	define ('_WEB','Web'); 
	define ('_TWITTER','Twitter'); 
	define ('_DIRECCIONLOCALSOCIAL','Dirección local social'); 
	define ('_POBLACIONLOCALSOCIAL','Población local social'); 
	define ('_DIA','Día de partido'); 
	define ('_HORA','Hora de partido'); 
	define ('_CAMISETA','Camiseta'); 
	define ('_PANTALON','Pantalón'); 
	define ('_TELEFONO','Teléfono'); 
	define ('_FECHAOTROSEQUIPOS','Fecha'); 
	define ('_LOCAL','Local'); 
	define ('_RESULTADO','Resultado'); 
	define ('_VISITANTE','Visitante'); 
	define ('_VOLVEROTROSEQUIPOS','Volver a otros equipos'); 
	define ('_VOLVERCLUB','Volver al club');
	define ('_BUSCARPOBLACIONEQUIPOS','Se han buscado todos los equipos de la población: ');
	define ('_BUSCARTODOEQUIPOS','Se ha buscado por Nombre del equipo, Dirección y Población la palabra: ');
	define ('_BUSCARTOTALEQUIPOS','Total equipos: ');
	define ('_VOLVEREQUIPOS','Volver a equipos');
	
	//Página ficha
	define ('_VOLVEREQUIPO','Volver al equipo'); 
	define ('_NOMBRECOMPLETO','Nombre completo'); 
	define ('_GOLESTOTALES','Goles totales'); 
	define ('_GOLESJUGADA','Goles de jugada'); 
	define ('_GOLESPENALTY','Goles de penalty'); 
	define ('_GOLESPROPIAPUERTA','Goles en propia puerta'); 
	define ('_ALTA','Alta'); 
	define ('_BAJA','Baja');
	define ('_PROCEDENCIA','Procedencia'); 
	define ('_DESTINO','Destino'); 
	define ('_DEMARCACION','Demarcaci&oacute;n'); 
	define ('_NACIONALIDAD','Nacionalidad'); 
	define ('_SELECCION','Selecci&oacute;n'); 
	define ('_COMUNITARIO','Comunitario'); 
	define ('_PORTERO','Portero'); 
	define ('_DEFENSA','Defensa'); 
	define ('_CENTROCAMPISTA','Centrocampista'); 
	define ('_DELANTERO','Delantero'); 
	define ('_SI','S&iacute;');
	define ('_NO','No');

	//Página tabla goleadores
	define ('_GOLEADORES','Goleadores');
	define ('_JUGADOR','Jugador');
	define ('_CATEGORIA','Categoria');
	define ('_TOTAL','Total');
	define ('_JUGADA','Jugada');
	define ('_PENALTY','Penalty');

	//Página comentarios
	define ('_COMENTARIOS','Comentarios');
	define ('_AUTOR','Autor');
	define ('_COMENTARIO','Comentario');
	define ('_NOCOMENT','No hay comentarios');

	//Página partidos pendientes
	define ('_PARTIDOSPENDIENTES','Partidos pendientes');
	define ('_PARTPENJORNADA','Jornada');
	define ('_PARTPENFECHA','Fecha prevista');
	define ('_PARTPENPARTIDO','Partido');
	define ('_PARTPENCAUSA','Causa');

	//Contacta
	define ('_TITULO','Mensaje al webmaster'); 
	define ('_INTRODUCENOMBRE','Introduce tu nombre o alias'); 
	define ('_EMAIL','Email'); 
	define ('_MENSAJE','Tu mensaje'); 
	define ('_ENVIAR','Enviar'); 
	define ('_INSTRUCCION1','Todos los campos son obligatorios'); 
	define ('_INSTRUCCION2','En caso de error siga las instrucciones:'); 
	define ('_ERROR1','Introduce un nombre o alias para poder comunicarme contigo'); 
	define ('_ERROR2','Introduce una direcci&oacute;n de correo para poder comunicarme contigo'); 
	define ('_ERROR3','Introduce el mensaje que me quieres transmitir'); 
	define ('_RESPUESTA1','Gracias por dar su opini&oacute;n');
	define ('_RESPUESTA2','En menos de 24 horas me pondr&eacute; en contacto con usted para resolver sus dudas');
	define ('_OTRACONSULTA','Otra consulta');
	define ('_CONTACTAR','Si hay algún problema con el formulario envíeme un mensaje a esta dirección <a href=mailto:webmaster.hospitalense@gmail.com>webmaster.hospitalense@gmail.com</a>. Gracias');
	define ('_CONTACTAR2','También pueden llamar al coordinador Sr. Roberto al teléfono:<br>93 337 35 54');
	
	//Dias de la semana
	define ('_LUNES','Lunes'); 
	define ('_MARTES','Martes'); 
	define ('_MIERCOLES','Mi&eacute;rcoles'); 
	define ('_JUEVES','Jueves'); 
	define ('_VIERNES','Viernes'); 
	define ('_SABADO','S&aacute;bado'); 
	define ('_DOMINGO','Domingo'); 

	//Meses del año
	define ('_ENERO','Enero'); 
	define ('_FEBRERO','Febrero'); 
	define ('_MARZO','Marzo'); 
	define ('_ABRIL','Abril'); 
	define ('_MAYO','Mayo'); 
	define ('_JUNIO','Junio'); 
	define ('_JULIO','Julio'); 
	define ('_AGOSTO','Agosto'); 
	define ('_SEPTIEMBRE','Septiembre'); 
	define ('_OCTUBRE','Octubre'); 
	define ('_NOVIEMBRE','Noviembre'); 
	define ('_DICIEMBRE','Diciembre'); 

	//Menú
	define ('_MENUINICIO','Inicio'); 
	define ('_MENUCLUB','Club'); 
	define ('_MENUCLUBHISTORIA','Historia'); 
	define ('_MENUCLUBDIRECTIVA','Directiva'); 
	define ('_MENUCLUBPLANTILLAS','Plantillas'); 
	define ('_MENUCLUBHIMNO','Himno');
	define ('_MENUCLUBSOCIO','Hacerte socio');
	define ('_MENUCLUBFORMULARIOS','Formularios');
	define ('_MENUCLUBHORARIOS','Horarios');
	define ('_MENUCLUBECONOMIA','Economía');
	define ('_MENUCLUBREGIMENINTERNO','Régimen interno');
	define ('_MENUCLUBESTATUTO','Estatuto');
	define ('_MENUGOLEADORES','Goleadores'); 
	define ('_MENUCATEGORIA','Categorías'); 
	define ('_MENURESULTADOS','Resultados'); 
	define ('_MENUQUINIELA','Quiniela'); 
	define ('_MENUENCUESTA','Encuesta'); 
	define ('_MENUPROMOCION','Promoción'); 
	define ('_MENUFOTOS','Fotos'); 
	define ('_MENUCLASIFICACION','Clasificaci&oacute;n');
	define ('_MENUCLASIFICACIONCASA','En casa');
	define ('_MENUCLASIFICACIONFUERA','Fuera');
	define ('_MENUCLASIFICACION1VUELTA','1ª vuelta');
	define ('_MENUCLASIFICACION2VUELTA','2ª vuelta');
	define ('_MENUEQUIPOS','Equipos');
	define ('_MENUCAMPOS','Campos');
	define ('_MENUTORNEO','Torneo');
	define ('_MENUPAGINASAMIGAS','P&aacute;ginas amigas'); 
	define ('_MENUPUBLICIDAD','Publicidad'); 
	define ('_MENUFORO','Foro');
	define ('_MENUCONTACTA','Contacta'); 
 
  //Pantalla indice
	define ('_INDICEULTIMAJORNADA','Última jornada');
	define ('_INDICEPROXIMAJORNADA','Próxima jornada');
	define ('_PATROCINADOR','Patrocinador principal:');
	define ('_AMISTOSO','Amistoso');
	
	//Campus
	define ('_CAMPUS','CAMPUS 2.011');
	define ('_FECHASCAMPUS','Del 27 de junio al 15 de julio');
	define ('_ACTIVIDADES','ACTIVIDADES CAMPUS');
	define ('_HORA1','De 9:30 a 14:00');
	define ('_HORA2','De 14:00 a 16:00');
	define ('_HORA3','De 16:00 a 18:00');
	define ('_ACTIVIDADES1','Cuatro horas diarias, aproximadamente, de tecnificación.');
	define ('_ACTIVIDADES2','Una hora y media diaria de piscina.');
	define ('_ACTIVIDADES3','Los porteros tendrán su entrenamiento especifico.');
	define ('_ACTIVIDADES4','Comida en nuestras instalaciones con monitores de mesa.');
	define ('_ACTIVIDADES5','Técnica especifica de fútbol.');
	define ('_ACTIVIDADES6','Juegos con balón y partidos de fútbol con el objetivo de plasmar en el campo las enseñanzas diarias.');
	define ('_PLAZASLIMITADAS','Plazas limitadas por orden de inscripciones. (30 plazas)');
	define ('_PRECIOS','LISTADO DE PRECIOS');
	define ('_PRECIOSMAÑANA','Precios solo por la mañana (9:30 a 14:00)');
	define ('_PRECIOSTARDE','Precios solo por la tarde (16:00 a 18:00)');
	define ('_PRECIOSTODODIA','Precios para todo el día (9:30 a 18:00)');
	define ('_UNASEMANA','Una semana');
	define ('_DOSSEMANAS','Dos semanas');
	define ('_TRESSEMANAS','Tres semanas');
	define ('_COMEDOR','Comedor');
	define ('_UNASEMANACOMEDOR','Una semana de comedor: 40 €');
	define ('_UNDIACOMEDOR','Un día de comedor: 8 €');
	define ('_MASINFORMACION','Para más información');
	define ('_MASINFORMACION1','Pasarse por las oficinas del club todas las tardes de 18:00 a 22:00.');
	define ('_MASINFORMACION2','Llamar al coordinador del Atlético Centro Hospitalense, Roberto, a los teléfonos:');
	
	//Torneo
	define ('_TORNEO','V TORNEO JORDI ALBA ATLÉTICO CENTRO HOSPITALENSE');
	define ('_TORNEOEQUIPOS','Equipos participantes');
	define ('_TORNEOREGLAMENTO','Reglamento');
	define ('_TORNEOPARTIDOS','Partidos');
	define ('_REGLAMENTOTITULO','Reglamento del V torneo Jordi Alba Atlético Centro Hospitalense');
	define ('_REGLAMENTONORMA1','Los equipos participantes estarán compuestos por un máximo de 18 jugadores en categorías de Infantil, Juvenil, Amateur y Veteranos, y por un máximo de 12 jugadores en Promesas, Pre-Benjamín, Benjamín y Alevín.');
	define ('_REGLAMENTONORMA2','El torneo se regirá por las normas de la F. C. F. para las categorías Benjamín, Alevín, Infantil, Juvenil, Amateur y Veteranos, y por las normas del Consell Esportiu de L\'Hospitalet en Promesas, Pre-Benjamín, Benjamín Escolar y Alevín Escolar.');
	define ('_REGLAMENTONORMA3','El torneo se  disputará  en la modalidad de triangular para todo el fútbol base y a partido único los amateur y veteranos.');
	define ('_REGLAMENTONORMA4','TRIANGULARES: los equipos jugarán dos partidos de dos partes cada uno, del tiempo estipulado en las normas del torneo a su categoría.');
	define ('_REGLAMENTONORMA5','PARTIDO ÚNICO: los amateurs y veteranos jugarán un partido con el tiempo estipulado en su categoría.');
	define ('_REGLAMENTONORMA6','La puntuación será la siguiente:<br><ul><li>Partido ganado 3 puntos.</li><li>Partido empatado 1 punto.</li><li>Partido perdido 0 puntos.</li></ul><br><u>Al finalizar cada partido se realizaran lanzamientos de penaltis a muerte súbita para resolver cualquier empate en la clasificación final.<br>En caso de empate de los tres equipos también persistiera en los penaltis la clasificación se decidirá por la diferencia de goles a favor en la clasificación general entre ellos quedando el orden con el mejor diferencia de goles. Si aún persiste el empate, la clasificación la decidirá el equipo con mayor número de goles a favor, si aún así continua la igualdad quedará por delante el equipo con menos goles encajados en la clasificación final y en último lugar para deshacer el empate se decidirá por la moneda al aire.<br>En la modalidad a partido único, el empate se resolverá con lanzamientos de penaltis a muerte súbita.</u>');
	define ('_REGLAMENTONORMA7','Todo jugador que sea expulsado con roja directa no podrá disputar el próximo partido.');
	define ('_REGLAMENTONORMA8','Todos los equipos deberán presentar las fichas correspondientes con un mánimo de 20 minutos antes de empezar el partido.');
	define ('_REGLAMENTONORMA9','El equipo que no respete y no siga la buena marcha del torneo será expulsado del mismo. Esta norma incluye a la afición que acompaña al equipo.');
	define ('_REGLAMENTONORMA10','Se permitirá la participación de tres jugadores con D.N.I. en categoría Cadetes, Juvenil, Amateur y Veteranos, y 3 jugadores con D.N.I. o la Partida de Nacimiento en categorías Pre-Benjamín, Benjamín, Alevín e Infantil.');
	define ('_REGLAMENTONORMA11','Los tiempos estimados para la duración de los partidos serán los siguientes:<br><ul><li>Promesas: 2 partes de 10 minutos y 5 minutos de descanso (triangular).</li><li>Pre-Benjamín Escolar: 2 partes de 10 minutos y 5 minutos de descanso (triangular).</li><li>Benjamín Escolar: 2 partes de 12 minutos y 5 minutos de descanso (triangular).</li><li>Infantil/Cadete Escolar: 2 partes de 20 minutos y 5 minutos de descanso (triangular).</li><li>Pre-Benjamín Catalana: 2 partes de 10 minutos y 5 minutos de descanso (triangular).</li><li>Benjamín Catalana: 2 partes de 12 minutos y 5 minutos de descanso (triangular).</li><li>Alevín Catalana: 2 partes de 15 minutos y 5 minutos de descanso (triangular).</li><li>Infantil: 2 partes de 18 minutos y 5 minutos de descanso (triangular).</li><li>Juvenil: 2 partes de 30 minutos y 5 minutos de descanso (triangular).</li><li>Amateur: 2 partes de 45 minutos.</li><li>Veteranos: 2 partes de 45 minutos.</li></ul>');
	define ('_REGLAMENTONORMA12','La comisión del torneo se reserva el derecho de cualquier modificación en el funcionamiento del torneo con el fin de mejorar el transcurso del mismo.');
	define ('_TORNEOTROFEOS','Trofeos');
	define ('_TORNEO1CLASIFICADO','1er clasificado');
	define ('_TORNEO2CLASIFICADO','2º clasificado');
	define ('_TORNEO3CLASIFICADO','3er clasificado');
	define ('_TORNEO4CLASIFICADO','4º clasificado');
	define ('_TORNEO5CLASIFICADO','5º clasificado');
	define ('_TORNEO6CLASIFICADO','6º clasificado');
	define ('_TORNEO7CLASIFICADO','7º clasificado');
	define ('_TORNEO8CLASIFICADO','8º clasificado');
	define ('_TORNEO9CLASIFICADO','9º clasificado');
	define ('_TORNEOPENALTIES','Penaltis');
	define ('_TORNEOCLASPOS','Pos');
	define ('_TORNEOCLASEQU','Equipo');
	define ('_TORNEOCLASPUNTOS','Pts');
	define ('_TORNEOCLASJUG','Jug');
	define ('_TORNEOCLASGAN','Gan');
	define ('_TORNEOCLASEMP','Emp');
	define ('_TORNEOCLASPER','Per');
	define ('_TORNEOCLASGF','GF');
	define ('_TORNEOCLASGC','GC');
	define ('_TORNEO3Y4PUESTO','3er y 4º puesto');
	define ('_TORNEOFINAL','Final');
	define ('_TORNEOSEMIFINALES','Semifinales');
	define ('_TORNEOGRUPO','Grupo');
	define ('_TORNEOMEJORJUGADOR','Mejor jugador');
	define ('_TORNEORIFA1','El número de la rifa de la camiseta del Barça firmada es el: 8930');
	define ('_TORNEORIFA2','Pueden pasar por el club cualquier tarde a partir de las 18:00');
	
	//Horarios
	define ('_HORARIOSCOMIENZOENTRENO','Comienzo entrenamientos');
	define ('_HORARIOSENTRENO','Horarios entrenamientos');
	define ('_HORARIOSPARTIDO','Horarios partidos');
	define ('_HORARIOSHORA','Hora');
	define ('_HORARIOSHORAS','Horas');
	define ('_HORARIOSA','a');
	define ('_HORARIOSCATEGORIA','Categoría');
	define ('_HORARIOSDIA','Día');
	define ('_ALAS','a las');
	define ('_RESTOEQUIPOS','Resto de equipos a partir del 1 de septiembre a las 17:30');
	
	//Historia
	define ('_HISTORIA','Historia');
	
	//Galeria
	define ('_GALERIA','Galería');
	define ('_CERRARGALERIA','Cerrar'); 
	define ('_AMPLIARFOTO','Ampliar foto');
	define ('_AMPLIARFOTO12801024','1280x1024');
	define ('_AMPLIARFOTO800600','800x600');
	
	//Directiva
	define ('_DIRECTIVA','Directiva');
	
	//Plantillas
	define ('_PLANTILLAENTRENADORES','Entrenadores');
	define ('_PLANTILLAJUGADORES','Jugadores');
	
	//Himno
	define ('_HIMNO','Himno');
	
	//Hacerte socio
	define ('_HACERTESOCIO','Hacerte socio');
	
	//Formularios
	define ('_FORMULARIOS','Formularios');
	define ('_FORMDESCRIPCION','Descripción');
	define ('_FORMDESCARGA','Descarga');
	
	//Regimen interno
	define ('_REGIMENINTERNO','Régimen interno');
	
	//Estatuto
	define ('_ESTATUTO','Estatuto');
	
	//Economia
	define ('_ECONOMIA','Economía');
	define ('_ECONOMIAGASTOS','Gastos');
	define ('_ECONOMIAINGRESOS','Ingresos');
	define ('_ECONOMIACONCEPTO','Concepto');
	define ('_ECONOMIAIMPORTE','Importe');
	define ('_ECONOMIATOTAL','Total');
	
	

}
else if ($idioma==2) //Inglés
{
	//Inicio
	define ('_BUENOSDIAS','Good morning');
	define ('_BUENASTARDES','Good evening');
	define ('_BUENASNOCHES','Good night');
	define ('_CARGANDO','Loading...');
	define ('_PROXIMAMENTE','Coming soon');
	define ('_MANTENIMIENTO1','Page maintenance'); 
	define ('_MANTENIMIENTO2','We\'re sorry'); 
	define ('_CERRADONAVIDAD','The club will be closed from 23 December to 6 January inclusive');
	define ('_DESPLAZAMIENTOBUS','Accompanies Juvenil A to Cunit Saturday at the price of 8 euros.<br>Ask on the club\'s offices.');
	define ('_CERRADOSEMANASANTA','The club will be closed from 25 March to 2 April inclusive');
	
	//Cambio idioma
	define ('_ESPANYOL','Spanish');
	define ('_INGLES','English');
	define ('_CATALAN','Catalan');
	define ('_CAMBIOIDIOMA','Change language');
	define ('_CAMBIANDOIDIOMA','Changing language');
	
	//Usuarios
	define ('_BIENVENIDA','Welcome ');
	define ('_POSICIONBIENVENIDA1','Your team occupies the ');
	define ('_POSICIONBIENVENIDA2',' position');
	define ('_NOUSUARIO1','If you are not the user ');
	define ('_NOUSUARIO2',' please exit the session');
	define ('_ANONIMO','anonymous');
	define ('_USUARIO','User');
	define ('_PASSWORD','Password');
	define ('_ENTRAR','Enter');
	define ('_REGISTRAR','Registry');
	define ('_NOENCONTRADO','The name of user or password is not valid');
	define ('_ERRORREGISTRO','The name of usuary already exists');

	//Registro
	define ('_TITULOREGISTRO','REGISTRY FORM');
	define ('_ALIASREGISTRO','Alias');
	define ('_PASSWORDREGISTRO','Password');
	define ('_EMAILREGISTRO','E-mail');
	define ('_EQUIPOREGISTRO','Team');
	define ('_SELECCIONAEQUIPOREGISTRO','Select your team');
	define ('_OTROEQUIPOREGISTRO','Other team');
	define ('_NOJUEGAREGISTRO','It does not play');
	define ('_ENVIARREGISTRO','Send');
	define ('_TIPOERROR1REGISTRO','Alias does not exist');
	define ('_TIPOERROR2REGISTRO','Password does not exist');
	define ('_TIPOERROR3REGISTRO','E-mail does not exist');
	define ('_TIPOERROR4REGISTRO','Team does not exist');
	define ('_REGISTROCORRECTO','You it has been registered correctly with the following data');

	//Fotos
	define ('_FOTOSTEMPORADA','PHOTOS SEASON 2006/07'); 
	define ('_AMPLIAR','It presses to extend the image');
	define ('_CERRAR','Close');

	//Página resultados
	define ('_RESULTADOS','Results');
	define ('_IDA','First leg'); 
	define ('_VUELTA','Second leg'); 
	define ('_JORNADASIGUIENTE','Next matchday >>');
	define ('_JORNADAANTERIOR','<< Previous matchday');
	define ('_INCIDENCIAS','Information'); 
	define ('_JORNADA','Matchday'); 
	define ('_SINDATOS','No information');
	define ('_APLAZADO','Postponed');
	define ('_SUSPENDIDO','Suspended ');
	define ('_PROMOCION','Promote');
	define ('_CALENDARIONODISPONIBLE','Calendar not available');

	//Página quiniela
	define ('_VOLVERQUINIELA','Return to quiniela'); 
	define ('_PARTIDOS','Matches'); 
	define ('_PARTIDO','Match'); 
	define ('_PRONOSTICOS','Prognoses');
	define ('_PRONOSTICO','Prognose');
	define ('_QUINIELAFORO1','QUINIELA'); 
	define ('_QUINIELAFORO2','CATALUNYA F&Uacute;TBOL'); 
	define ('_QUINIELAFORO3','F&Uacute;TBOL CATALUNYA'); 
	define ('_QUINIELAWEB','QUINIELA WEB'); 
	define ('_PROXIMAMENTEQUINIELA','AVAILABLE NEXT'); 
	define ('_JUGADORES','Participant players'); 
	define ('_NOMBRE','Name'); 
	define ('_ACIERTOS','Successes'); 
	define ('_POSICION','Position'); 
	define ('_PARTIDOSJUGADOS','Played matchs'); 
	define ('_SINPRONOSTICO','There are no prognoses'); 
	define ('_SOLOREGISTRADOS','Only for registered users');
	define ('_ENVIARQUINIELA','Send');
	define ('_TIEMPOTERMINADO','The time for completing the quiniela to finished');

	//Página encuesta
	define ('_ENCUESTA','Poll'); 
	define ('_PREGUNTA','Who you think that Liga will win?'); 
	define ('_EQUIPOENCUESTA','Team'); 
	define ('_PUNTOSENCUESTA','Points'); 
	define ('_ENVIARENCUESTA','Vote');
	define ('_ERRORENCUESTA','Choose a team');
	define ('_EQUIPOELEGIDO','The team that you have chosen is');
	define ('_EQUIPOVALIDADO','You already voted. The chosen equipment was');
	define ('_RESULTADOSENCUESTA','As the survey goes');
	define ('_PORCENTAGESENCUESTA','Percentage');
	define ('_VOTANTESSENCUESTA','Voters');
	
	//Página goleadores
	define ('_VOLVERRESULTADOS','Return to results'); 
	define ('_VOLVERPROMOCION','Return to promote');
	define ('_CAMPO','Stadium'); 
	define ('_SOLOREGISTRADOSCOMENTARIOS','Registered if you want to leave your commentary');
	define ('_FECHAPARTIDO','Date');
	
	//Página clasificación
	define ('_CLASIFICACION','league table position'); 
	define ('_EQUIPO','Team'); 
	define ('_PUNTOS','Points'); 
	define ('_JUGADOS','Played'); 
	define ('_GANADOS','Win'); 
	define ('_EMPATADOS','Draw'); 
	define ('_PERDIDOS','Lost'); 
	define ('_GF','G. F.'); 
	define ('_GC','G. A.'); 
	define ('_HASTAJORNADA','until the matchday '); 
	define ('_PARTIDOSCASA','Matches played local'); 
	define ('_PARTIDOSFUERA','Matches played visitor'); 
	define ('_PARTIDOS1VUELTA','Matches played 1st leg'); 
	define ('_PARTIDOS2VUELTA','Matches played 2nd leg'); 
	define ('_ASCIENDE','Ascends to'); 
	define ('_PROMOCIONA','Promotes for'); 
	define ('_DESCIENDE','Descends to'); 
	define ('_SANCION','Sanctioned with ');
	define ('_VOLVERCLASIFICACION','Return to league table position');
	define ('_GRAFICA','Graph');
	define ('_TABTODO','All');
	define ('_TABCASA','Local');
	define ('_TABFUERA','Visitor');
	define ('_TAB1VUELTA','1st leg');
	define ('_TAB2VUELTA','2nd leg');
	define ('_PARTIDOSGANADOS','Matches won by');
	define ('_PARTIDOSEMPATADOS','Matches draw by');
	define ('_PARTIDOSPERDIDOS','Matches lost by');

	//Campos
	define ('_CAMPOS','Stadiums');
	define ('_DIRECCION','Address'); 
	define ('_POBLACION','City'); 
	define ('_EQUIPOS','Teams');
	define ('_VOLVERCAMPOS','Return to stadiums'); 
	define ('_BUSCAR','Send');
	define ('_BUSCARPOBLACION','All the fields of the following city have looked for: ');
	define ('_BUSCARTODO','One has looked for by Name of the stadium, Address and City the following word: ');
	define ('_BUSCARTOTAL','Total stadiums: ');
	define ('_BUSCARANTERIOR','Previous');
	define ('_BUSCARSIGUIENTE','Next');
	define ('_COMOLLEGAR','How to arrive');
	define ('_COCHE','Car'); 
	define ('_TREN','Train'); 
	define ('_METRO','Underground');
	define ('_BUS','Bus'); 
	define ('_TRAM','Tram'); 
	define ('_FFCC','FGC'); 

	//Otros equipos
	define ('_EQUIPOSBUSCADOR','Teams');
	define ('_CAMPOOTROSEQUIPOS','Stadium');
	define ('_WEB','Web'); 
	define ('_TWITTER','Twitter'); 
	define ('_DIRECCIONLOCALSOCIAL','Social local direction'); 
	define ('_POBLACIONLOCALSOCIAL','Social local city'); 
	define ('_DIA','Date of match'); 
	define ('_HORA','Hour of match'); 
	define ('_CAMISETA','T-Shirt'); 
	define ('_PANTALON','Trousers'); 
	define ('_TELEFONO','Telephone'); 
	define ('_FECHAOTROSEQUIPOS','Date'); 
	define ('_LOCAL','Local'); 
	define ('_RESULTADO','Result'); 
	define ('_VISITANTE','Visitor'); 
	define ('_VOLVEROTROSEQUIPOS','Return to others teams'); 
	define ('_VOLVERCLUB','Return to club');
	define ('_BUSCARPOBLACIONEQUIPOS','All the fields of the following city have looked for: ');
	define ('_BUSCARTODOEQUIPOS','One has looked for by Name of the team, Address and City the following word: ');
	define ('_BUSCARTOTALEQUIPOS','Total teams: ');	
	define ('_VOLVEREQUIPOS','Return to teams');

	//Página ficha
	define ('_VOLVEREQUIPO','Return to team'); 
	define ('_NOMBRECOMPLETO','Real name'); 
	define ('_GOLESTOTALES','Total Goals'); 
	define ('_GOLESJUGADA','Goals'); 
	define ('_GOLESPENALTY','Penalty goals'); 
	define ('_GOLESPROPIAPUERTA','Own goals'); 
	define ('_ALTA','Bought'); 
	define ('_BAJA','Sold');
	define ('_PROCEDENCIA','Previous Club'); 
	define ('_DESTINO','Next Club'); 
	define ('_DEMARCACION','Position'); 
	define ('_NACIONALIDAD','Nationality'); 
	define ('_SELECCION','International'); 
	define ('_COMUNITARIO','Communitarian'); 
	define ('_PORTERO','Goalkeeper'); 
	define ('_DEFENSA','Defender'); 
	define ('_CENTROCAMPISTA','Midfielder'); 
	define ('_DELANTERO','Striker'); 
	define ('_SI','Yes');
	define ('_NO','No');

	//Página tabla goleadores
	define ('_GOLEADORES','Goals Scored');
	define ('_JUGADOR','Player');
	define ('_CATEGORIA','Categoria');
	define ('_EQUIPOTG','Team');
	define ('_TOTAL','Total');
	define ('_JUGADA','Goal');
	define ('_PENALTY','Penalty');

	//Página comentarios
	define ('_COMENTARIOS','Commentaries');
	define ('_AUTOR','Author');
	define ('_COMENTARIO','Commentary');
	define ('_NOCOMENT','No commentaries');

	//Página partidos pendientes
	define ('_PARTIDOSPENDIENTES','Pending matches');
	define ('_PARTPENJORNADA','Matchday');
	define ('_PARTPENFECHA','Predicted date');
	define ('_PARTPENPARTIDO','Match');
	define ('_PARTPENCAUSA','Cause');

	//Contacta
	define ('_TITULO','Message to webmaster'); 
	define ('_INTRODUCENOMBRE','Insert your name or alias'); 
	define ('_EMAIL','Email'); 
	define ('_MENSAJE','Your message'); 
	define ('_ENVIAR','Send'); 
	define ('_INSTRUCCION1','All the fields are obligatory'); 
	define ('_INSTRUCCION2','In case of error it follows the instructions:'); 
	define ('_ERROR1','Insert your name or alias to be able to communicate to me with you'); 
	define ('_ERROR2','Insert your email to be able to communicate to me with you'); 
	define ('_ERROR3','Insert your message to be able to communicate to me with you'); 
	define ('_RESPUESTA1','Thanks to give its opinion');
	define ('_RESPUESTA2','In less than 24 hours I will put myself in contact with you to solve its doubts');
	define ('_OTRACONSULTA','Any question');
	define ('_CONTACTAR','If you have some problem with the form send me a message to this direction <a href=mailto:webmaster.hospitalense@gmail.com>webmaster.hospitalense@gmail.com</a>. Thanks you');
	define ('_CONTACTAR2','Can also call coordinator Mr. Roberto to the phone:<br>93 337 35 54');

	//Días de la semana
	define ('_LUNES','Monday'); 
	define ('_MARTES','Tuesday'); 
	define ('_MIERCOLES','Wednesday'); 
	define ('_JUEVES','Thursday'); 
	define ('_VIERNES','Friday'); 
	define ('_SABADO','Saturday'); 
	define ('_DOMINGO','Sunday'); 

	//Meses del año
	define ('_ENERO','January'); 
	define ('_FEBRERO','February'); 
	define ('_MARZO','March'); 
	define ('_ABRIL','April'); 
	define ('_MAYO','May'); 
	define ('_JUNIO','June'); 
	define ('_JULIO','July'); 
	define ('_AGOSTO','August'); 
	define ('_SEPTIEMBRE','September'); 
	define ('_OCTUBRE','October'); 
	define ('_NOVIEMBRE','November'); 
	define ('_DICIEMBRE','December'); 

	//Menú
	define ('_MENUINICIO','Home'); 
	define ('_MENUCLUB','Club'); 
	define ('_MENUCLUBHISTORIA','Story'); 
	define ('_MENUCLUBDIRECTIVA','Directive'); 
	define ('_MENUCLUBPLANTILLAS','Team squads'); 
	define ('_MENUCLUBHIMNO','Hymn');
	define ('_MENUCLUBSOCIO','Become a member');
	define ('_MENUCLUBFORMULARIOS','Forms');
	define ('_MENUCLUBHORARIOS','Timetable');
	define ('_MENUCLUBECONOMIA','Economy');
	define ('_MENUCLUBREGIMENINTERNO','Internal rules');
	define ('_MENUCLUBESTATUTO','Statute');
	define ('_MENUGOLEADORES','Goals Scored'); 
	define ('_MENUCATEGORIA','Categories');
	define ('_MENURESULTADOS','Results'); 
	define ('_MENUQUINIELA','Quiniela');
	define ('_MENUENCUESTA','Poll'); 
	define ('_MENUPROMOCION','Promotes'); 
	define ('_MENUFOTOS','Photos'); 
	define ('_MENUCLASIFICACION','League table position');
	define ('_MENUCLASIFICACIONCASA','Local');
	define ('_MENUCLASIFICACIONFUERA','Visitor');
	define ('_MENUCLASIFICACION1VUELTA','1st leg');
	define ('_MENUCLASIFICACION2VUELTA','2nd leg');
	define ('_MENUEQUIPOS','Teams');
	define ('_MENUCAMPOS','Stadiums');
	define ('_MENUTORNEO','Tournament');
	define ('_MENUPAGINASAMIGAS','Friendly pages'); 
	define ('_MENUPUBLICIDAD','Partners'); 
	define ('_MENUFORO','Forum');
	define ('_MENUCONTACTA','Contact us'); 
 
  //Pantalla indice
	define ('_INDICEULTIMAJORNADA','Last matchday');
	define ('_INDICEPROXIMAJORNADA','Next matchday');
	define ('_PATROCINADOR','Principal sponsor:');
	define ('_AMISTOSO','Friendly match');
	
	//Campus
	define ('_CAMPUS','CAMPUS 2.011');
	define ('_FECHASCAMPUS','From June 27 to July 15');
	define ('_ACTIVIDADES','CAMPUS ACTIVITIES');
	define ('_HORA1','From 9:30 to 14:00');
	define ('_HORA2','From 14:00 to 16:00');
	define ('_HORA3','From 16:00 to 18:00');
	define ('_ACTIVIDADES1','Four hours per day, approximately technification.');
	define ('_ACTIVIDADES2','An hour and daily average pool.');
	define ('_ACTIVIDADES3','The goalkeeper will have their specific training.');
	define ('_ACTIVIDADES4','Lunch at our table installations with monitors.');
	define ('_ACTIVIDADES5','Soccer specific technique.');
	define ('_ACTIVIDADES6','Ball games and football matches in order to capture in the field daily lessons.');
	define ('_PLAZASLIMITADAS','Limited capacity in order of registration. (30 places)');
	define ('_PRECIOS','PRICE LIST');
	define ('_PRECIOSMAÑANA','Prices only in the morning (9:30 to 14:00)');
	define ('_PRECIOSTARDE','Prices only in the evening (16:00 to 18:00)');
	define ('_PRECIOSTODODIA','PPrices for all day (9:30 to 18:00)');
	define ('_UNASEMANA','A week');
	define ('_DOSSEMANAS','Two weeks');
	define ('_TRESSEMANAS','Three weeks');
	define ('_COMEDOR','Dining room');
	define ('_UNASEMANACOMEDOR','A week of dining room: 40 €');
	define ('_UNDIACOMEDOR','One day dining: 8 €');
	define ('_MASINFORMACION','For more information');
	define ('_MASINFORMACION1','Go through the offices of the club every evening from 18:00 to 22:00.');
	define ('_MASINFORMACION2','Call Center Coordinator of Atlético Centro Hospitalense, Francisco Bueno, phones:');
	
	//Torneo
	define ('_TORNEO','V TOURNAMENT JORDI ALBA ATLÉTICO CENTRO HOSPITALENSE');
	define ('_TORNEOEQUIPOS','Participating teams');
	define ('_TORNEOREGLAMENTO','Regulation');
	define ('_TORNEOPARTIDOS','Matches');
	define ('_REGLAMENTOTITULO','Regulation of the V Tournament Jordi Alba Atlético Centro Hospitalense');
	define ('_REGLAMENTONORMA1','The participating teams will comprise a maximum of 18 players into categories Infantil, Juvenil, Amateur and Veteran, and a maximum of 12 players on Promises, Pre-Benjamin, Benjamin and Alevin.');
	define ('_REGLAMENTONORMA2','The tournament will be governed by the rules of F. C. F. for categories Benjamin, Alevin, Infantil, Juvenil, Amateur and Veterans, and the rules of the Consell Esportiu of L\'Hospitalet in Promises, Pre-Benjamin, Benjamin School and Alevin School.');
	define ('_REGLAMENTONORMA3','The tournament will be held in the form of triangular for all the youth football game and only the amateur and veterans.');
	define ('_REGLAMENTONORMA4','TRIANGULAR: teams will play two games in two parts each, the time stipulated in the rules of the tournament to its category.');
	define ('_REGLAMENTONORMA5','SINGLE MATCH: amateurs and veterans play a game with the stipulated time in its category.');
	define ('_REGLAMENTONORMA6','The score is as follows:<br><ul><li>Match won 3 points.</li><li>Match tied 1 point.</li><li>Match lost 0 points.</li></ul><br><u>End of each game releases will be made to sudden death penalties to resolve any tie in the final classification.<br>In case of equality of the three teams also persisted on penalties the classification will be decided by the difference of goals scored in the overall standings among them being the order with the best goal difference. If the tie persists, the classification will be decided by the team with most goals for, if still continuing ahead will equal the team with fewer goals conceded in the final standings and last to break the tie will be decided by the coin.<br>In the form a single match, the tie will be resolved by penalty shots to sudden death.</u>');
	define ('_REGLAMENTONORMA7','Any player who is sent off with red card may not play the next game.');
	define ('_REGLAMENTONORMA8','All teams must submit the appropriate tabs at least 20 minutes before starting the game.');
	define ('_REGLAMENTONORMA9','The team that does not respect and follow the proper conduct of the tournament will be expelled from it. This standard includes the fans that came with the team.');
	define ('_REGLAMENTONORMA10','It will allow the participation of three players with DNI in category Cadetes, Juvenil, Amateur and Veteran, and three players with DNI or Birth Certificate in categories Pre-Benjamin, Benjamin, Alevi and Infantil.');
	define ('_REGLAMENTONORMA11','The estimated times for the duration of the matches will be:<br><ul><li>Promises: 2 parts of 10 minutes and 5 minutes of rest (triangular).</li><li>Pre-Benjamin School: 2 parts of 10 minutes and 5 minutes of rest (triangular).</li><li>Benjamin School: 2 parts of 12 minutes and 5 minutes of rest (triangular).</li><li>Infantil/Cadet School: 2 parts of 20 minutes and 5 minutes of rest (triangular).</li><li>Pre-Benjamin Catalana: 2 parts of 10 minutes and 5 minutes of rest (triangular).</li><li>Benjamin Catalana: 2 parts of 12 minutes and 5 minutes of rest (triangular).</li><li>Alevin Catalana: 2 parts of 15 minutes and 5 minutes of rest (triangular).</li><li>Infantil: 2 parts of 18 minutes and 5 minutes of rest (triangular).</li><li>Juvenil: 2 partes of 30 minutes and 5 minutes of rest (triangular).</li><li>Amateur: 2 parts of 45 minutes.</li><li>Veterans: 2 parts of 45 minutes.</li></ul>');
	define ('_REGLAMENTONORMA12','The tournament committee reserves the right to any changes in the functioning of the tournament in order to improve during the same.');
	define ('_TORNEOTROFEOS','Trophies');
	define ('_TORNEO1CLASIFICADO','1st classified');
	define ('_TORNEO2CLASIFICADO','2nd classified');
	define ('_TORNEO3CLASIFICADO','3rd classified');
	define ('_TORNEO4CLASIFICADO','4th classified');
	define ('_TORNEO5CLASIFICADO','5th classified');
	define ('_TORNEO6CLASIFICADO','6th classified');
	define ('_TORNEO7CLASIFICADO','7th classified');
	define ('_TORNEO8CLASIFICADO','8th classified');
	define ('_TORNEO9CLASIFICADO','9th classified');
	define ('_TORNEOPENALTIES','Penalties');
	define ('_TORNEOCLASPOS','Pos');
	define ('_TORNEOCLASEQU','Team');
	define ('_TORNEOCLASPUNTOS','Poi');
	define ('_TORNEOCLASJUG','Pla');
	define ('_TORNEOCLASGAN','Win');
	define ('_TORNEOCLASEMP','Dra');
	define ('_TORNEOCLASPER','Los');
	define ('_TORNEOCLASGF','GF');
	define ('_TORNEOCLASGC','GA');
	define ('_TORNEO3Y4PUESTO','3rd y 4th place');
	define ('_TORNEOFINAL','Final');
	define ('_TORNEOSEMIFINALES','Semifinals');
	define ('_TORNEOGRUPO','Group');
	define ('_TORNEOMEJORJUGADOR','Best player');
	define ('_TORNEORIFA1','The number of t-shirt raffle is signed Barcelona: 8930');
	define ('_TORNEORIFA2','It can take the club any evening after 18:00');
	
	//Horarios
	define ('_HORARIOSCOMIENZOENTRENO','Start training');
	define ('_HORARIOSENTRENO','Schedule training');
	define ('_HORARIOSPARTIDO','Schedule games');
	define ('_HORARIOSHORA','Time');
	define ('_HORARIOSHORAS','');
	define ('_HORARIOSA','to');
	define ('_HORARIOSCATEGORIA','Category');
	define ('_HORARIOSDIA','Day');
	define ('_ALAS','at');
	define ('_RESTOEQUIPOS','Other teams from September 1 at 17:30');
	
	//Historia
	define ('_HISTORIA','Story');
	
	//Galeria
	define ('_GALERIA','Gallery');
	define ('_CERRARGALERIA','Close'); 
	define ('_AMPLIARFOTO','Enlarge photo');
	define ('_AMPLIARFOTO12801024','1280x1024');
	define ('_AMPLIARFOTO800600','800x600');
	
	//Directiva
	define ('_DIRECTIVA','Directive');
	
	//Plantillas
	define ('_PLANTILLAENTRENADORES','Coaches');
	define ('_PLANTILLAJUGADORES','Players');
	
	//Himno
	define ('_HIMNO','Hymn');
	
	//Hacerte socio
	define ('_HACERTESOCIO','Become a member');
	
	//Formularios
	define ('_FORMULARIOS','Forms');
	define ('_FORMDESCRIPCION','Description');
	define ('_FORMDESCARGA','Download');
	
	//Regimen interno
	define ('_REGIMENINTERNO','Internal rules');
	
	//Estatuto
	define ('_ESTATUTO','Statute');
	
	//Economia
	define ('_ECONOMIA','Economy');
	define ('_ECONOMIAGASTOS','Expenses');
	define ('_ECONOMIAINGRESOS','Income');
	define ('_ECONOMIACONCEPTO','Concept');
	define ('_ECONOMIAIMPORTE','Amount');
	define ('_ECONOMIATOTAL','Total');
	
}
else if ($idioma==3) //Catalan
{
	//Inicio
	define ('_BUENOSDIAS','Bon dia');
	define ('_BUENASTARDES','Bona tarda');
	define ('_BUENASNOCHES','Bona nit');
	define ('_CARGANDO','Carregant...');
	define ('_PROXIMAMENTE','Disponible properament');
	define ('_MANTENIMIENTO1','Pàgina en manteniment'); 
	define ('_MANTENIMIENTO2','Disculpin les molésties'); 
	define ('_CERRADONAVIDAD','El club romandrà tancat entre el 23 de desembre i el 6 de gener, ambdós inclosos');
	define ('_DESPLAZAMIENTOBUS','Acompanya al Juvenil A a Cunit aquest dissabte al preu de 8 euros.<br>Preguntar a les oficines del club.');
	define ('_CERRADOSEMANASANTA','El club romandrà tancat entre el 25 de narç i el 2 abril, ambdós inclosos');
		
	//Cambio idioma
	define ('_ESPANYOL','Espanyol');
	define ('_INGLES','Anglés');
	define ('_CATALAN','Català');
	define ('_CAMBIOIDIOMA','Canvi idioma');
	define ('_CAMBIANDOIDIOMA','Canviant idioma');


	//Usuarios
	define ('_BIENVENIDA','Benvingut ');
	define ('_POSICIONBIENVENIDA1','El seu equip ocupa la ');
	define ('_POSICIONBIENVENIDA2',' posició');
	define ('_NOUSUARIO1','Si no és l\'usuari ');
	define ('_NOUSUARIO2',' si us plau surti de la sessió');
	define ('_ANONIMO','Anónim');
	define ('_USUARIO','Usuari');
	define ('_PASSWORD','Contrasenya');
	define ('_ENTRAR','Entrar');
	define ('_REGISTRAR','Registrar');
	define ('_NOENCONTRADO','El nom d\'usuari o la contrasenya no són vàlids');
	define ('_ERRORREGISTRO','El nom d\'usuari ja existeix');

	//Registro
	define ('_TITULOREGISTRO','FORMULARI DE REGISTRE');
	define ('_ALIASREGISTRO','Àlies');
	define ('_PASSWORDREGISTRO','Password');
	define ('_EMAILREGISTRO','E-mail');
	define ('_EQUIPOREGISTRO','Equip');
	define ('_SELECCIONAEQUIPOREGISTRO','Selecciona equip');
	define ('_OTROEQUIPOREGISTRO','Un altre equip');
	define ('_NOJUEGAREGISTRO','No juga');
	define ('_ENVIARREGISTRO','Enviar');
	define ('_TIPOERROR1REGISTRO','Falta l\'àlies');
	define ('_TIPOERROR2REGISTRO','Falta el password');
	define ('_TIPOERROR3REGISTRO','Falta l\'e-mail');
	define ('_TIPOERROR4REGISTRO','Falta l\'equip');
	define ('_REGISTROCORRECTO','Vosté s\'ha registrat correctament amb les dades');

	//Fotos
	define ('_FOTOSTEMPORADA','FOTOS TEMPORADA 2006/07');
	define ('_AMPLIAR','Clica per ampliar la imatge');
	define ('_CERRAR','Tancar');

	//Página resultados
	define ('_RESULTADOS','Resultats');
	define ('_IDA','Anada');
	define ('_VUELTA','Volta');
	define ('_JORNADASIGUIENTE','Jornada següent >>');
	define ('_JORNADAANTERIOR','<< Jornada anterior');
	define ('_INCIDENCIAS','Incidéncies'); 
	define ('_JORNADA','Jornada'); 
	define ('_SINDATOS','Sense dades');
	define ('_APLAZADO','Ajornat');
	define ('_SUSPENDIDO','Suspés');
	define ('_PROMOCION','Promoció');
	define ('_CALENDARIONODISPONIBLE','Calendari no disponible');

	//Página quiniela
	define ('_VOLVERQUINIELA','Tornar a quiniela'); 
	define ('_PARTIDOS','Partits'); 
	define ('_PARTIDO','Partit'); 
	define ('_PRONOSTICOS','Pronóstics');
	define ('_PRONOSTICO','Pronóstic');
	define ('_QUINIELAFORO1','QUINIELA'); 
	define ('_QUINIELAFORO2','CATALUNYA FÚTBOL'); 
	define ('_QUINIELAFORO3','F&Uacute;TBOL CATALUNYA'); 
	define ('_QUINIELAWEB','QUINIELA WEB'); 
	define ('_PROXIMAMENTEQUINIELA','DISPONIBLE PRÓXIMAMENT'); 
	define ('_JUGADORES','Jugadors participants'); 
	define ('_NOMBRE','Nom'); 
	define ('_ACIERTOS','Encerts'); 
	define ('_POSICION','Posició'); 
	define ('_PARTIDOSJUGADOS','Partits jugats'); 
	define ('_SINPRONOSTICO','Falten pronóstics'); 
	define ('_SOLOREGISTRADOS','Només per a usuaris registrats');
	define ('_ENVIARQUINIELA','Enviar');
	define ('_TIEMPOTERMINADO','El temps per omplir la quiniela a acabat');

	//Página encuesta
	define ('_ENCUESTA','Enquesta'); 
	define ('_PREGUNTA','Qui creus que guanyarà la Lliga?'); 
	define ('_EQUIPOENCUESTA','Equip'); 
	define ('_PUNTOSENCUESTA','Punts'); 
	define ('_ENVIARENCUESTA','Vota');
	define ('_ERRORENCUESTA','Tria un equip');
	define ('_EQUIPOELEGIDO','L\'equip que has triat és');
	define ('_EQUIPOVALIDADO','Vosté ja va votar. L\'equip escollit va ser');
	define ('_RESULTADOSENCUESTA','Com va l\'enquesta');
	define ('_PORCENTAGESENCUESTA','Percentatge');
	define ('_VOTANTESSENCUESTA','Votants');

	//Página goleadores
	define ('_VOLVERRESULTADOS','Tornar a resultats'); 
	define ('_VOLVERPROMOCION','Tornar a promoció');
	define ('_CAMPO','Camp'); 
	define ('_SOLOREGISTRADOSCOMENTARIOS','Registra\'t si vols deixar el teu comentari');
	define ('_FECHAPARTIDO','Data');

	//Página clasificación
	define ('_CLASIFICACION','Clasificació'); 
	define ('_EQUIPO','Equip'); 
	define ('_PUNTOS','Punts'); 
	define ('_JUGADOS','Jugats'); 
	define ('_GANADOS','Guanyats'); 
	define ('_EMPATADOS','Empatats'); 
	define ('_PERDIDOS','Perduts'); 
	define ('_GF','G. F.'); 
	define ('_GC','G. C.'); 
	define ('_HASTAJORNADA','fins jornada'); 
	define ('_PARTIDOSCASA','Partits jugats a casa'); 
	define ('_PARTIDOSFUERA','Partits jugats fora'); 
	define ('_PARTIDOS1VUELTA','Partits jugats 1ª volta'); 
	define ('_PARTIDOS2VUELTA','Partits jugats 2ª volta'); 
	define ('_ASCIENDE','Puja a'); 
	define ('_PROMOCIONA','Promociona per'); 
	define ('_DESCIENDE','Descendeix a'); 
	define ('_SANCION','Sancionat amb ');
	define ('_VOLVERCLASIFICACION','Tornar a classificació');
	define ('_GRAFICA','Gràfica');
	define ('_TABTODO','Tot');
	define ('_TABCASA','Casa');
	define ('_TABFUERA','Fora');
	define ('_TAB1VUELTA','1ª volta');
	define ('_TAB2VUELTA','2ª volta');
	define ('_PARTIDOSGANADOS','Partits guanyats pel');
	define ('_PARTIDOSEMPATADOS','Partits empatats pel');
	define ('_PARTIDOSPERDIDOS','Partits perduts pel');

	//Campos
	define ('_CAMPOS','Camps');
	define ('_DIRECCION','Direcció'); 
	define ('_POBLACION','Població'); 
	define ('_EQUIPOS','Equips');
	define ('_VOLVERCAMPOS','Tornar a camps'); 
	define ('_BUSCAR','Cerca');
	define ('_BUSCARPOBLACION','S\'han buscat tots els camps de la població: ');
	define ('_BUSCARTODO','S\'ha buscat per Nom del camp, Direcció i Població la paraula: ');
	define ('_BUSCARTOTAL','Total camps: ');
	define ('_BUSCARANTERIOR','Anterior');
	define ('_BUSCARSIGUIENTE','Següent');
	define ('_COMOLLEGAR','Com arribar'); 
	define ('_COCHE','Cotxe'); 
	define ('_TREN','Tren'); 
	define ('_METRO','Metro'); 
	define ('_BUS','Autobús'); 
	define ('_TRAM','Tram');
	define ('_FFCC','Ferrocarils de la Generalitat'); 

	//Equipos
	define ('_EQUIPOSBUSCADOR','Equips');
	define ('_CAMPOOTROSEQUIPOS','Camp');
	define ('_WEB','Web'); 
	define ('_TWITTER','Twitter'); 
	define ('_DIRECCIONLOCALSOCIAL','Direcció local social'); 
	define ('_POBLACIONLOCALSOCIAL','Població local social'); 
	define ('_DIA','Dia de partit'); 
	define ('_HORA','Hora de partit'); 
	define ('_CAMISETA','Samarreta'); 
	define ('_PANTALON','Pantaló'); 
	define ('_TELEFONO','Teléfon'); 
	define ('_FECHAOTROSEQUIPOS','Data'); 
	define ('_LOCAL','Local'); 
	define ('_RESULTADO','Resultat'); 
	define ('_VISITANTE','Visitant'); 
	define ('_VOLVEROTROSEQUIPOS','Tornar a altres equips'); 
	define ('_VOLVERCLUB','Tornar al club');
	define ('_BUSCARPOBLACIONEQUIPOS','S\'han buscat tots els equips de la població: ');
	define ('_BUSCARTODOEQUIPOS','S\'ha buscat per Nom de l\'equip, Direcció i Població la paraula: ');
	define ('_BUSCARTOTALEQUIPOS','Total equips: ');
	define ('_VOLVEREQUIPOS','Tornar a equips');
	
	//Página ficha
	define ('_VOLVEREQUIPO','Tornar a l\'equip'); 
	define ('_NOMBRECOMPLETO','Nom complet'); 
	define ('_GOLESTOTALES','Gols totals'); 
	define ('_GOLESJUGADA','Gols de jugada'); 
	define ('_GOLESPENALTY','Gols de penal'); 
	define ('_GOLESPROPIAPUERTA','Gols en própia porta'); 
	define ('_ALTA','Alta'); 
	define ('_BAJA','Baixa');
	define ('_PROCEDENCIA','Procedéncia'); 
	define ('_DESTINO','Destinació'); 
	define ('_DEMARCACION','Demarcació'); 
	define ('_NACIONALIDAD','Nacionalitat'); 
	define ('_SELECCION','Selecció'); 
	define ('_COMUNITARIO','Comunitari'); 
	define ('_PORTERO','Porter'); 
	define ('_DEFENSA','Defensa'); 
	define ('_CENTROCAMPISTA','Migcampista'); 
	define ('_DELANTERO','Davanter'); 
	define ('_SI','Sí');
	define ('_NO','No');

	//Página tabla goleadores
	define ('_GOLEADORES','Golejadors');
	define ('_JUGADOR','Jugador');
	define ('_CATEGORIA','Categoria');
	define ('_EQUIPOTG','Equip');
	define ('_TOTAL','Total');
	define ('_JUGADA','Jugada');
	define ('_PENALTY','Penal');

	//Página comentarios
	define ('_COMENTARIOS','Comentaris');
	define ('_AUTOR','Autor');
	define ('_COMENTARIO','Comentari');
	define ('_NOCOMENT','No hi ha comentaris');

	//Página partidos pendientes
	define ('_PARTIDOSPENDIENTES','Partits pendents');
	define ('_PARTPENJORNADA','Jornada');
	define ('_PARTPENFECHA','Data prevista');
	define ('_PARTPENPARTIDO','Partit');
	define ('_PARTPENCAUSA','Causa');

	//Contacta
	define ('_TITULO','Missatge al webmaster'); 
	define ('_INTRODUCENOMBRE','Introdueix el teu nom o àlies'); 
	define ('_EMAIL','Email'); 
	define ('_MENSAJE','El teu missatge'); 
	define ('_ENVIAR','Enviar'); 
	define ('_INSTRUCCION1','Tots els camps són obligatoris'); 
	define ('_INSTRUCCION2','En cas d\'error seguiu les instruccions:'); 
	define ('_ERROR1','Introdueix un nom o àlies per poder comunicar-me amb tu'); 
	define ('_ERROR2','Introdueix una adreça de correu per poder comunicar-me amb tu'); 
	define ('_ERROR3','Introdueix el missatge que em vols transmetre'); 
	define ('_RESPUESTA1','Gràcies per donar la seva opinio');
	define ('_RESPUESTA2','En menys de 24 hores em posaré en contacte amb vosté per resoldre els seus dubtes');
	define ('_OTRACONSULTA','Una altra consulta');
	define ('_CONTACTAR','Si hi ha algun problema amb el formulari envieu-me un missatge a aquesta adreça <a href=mailto:webmaster.hospitalense@gmail.com>webmaster.hospitalense@gmail.com</a>. Gràcies');
	define ('_CONTACTAR2','També pot trucar al coordinador el Sr Roberto al teléfon:<br>93 337 35 54');
	
	//Días de la semana
	define ('_LUNES','Dilluns'); 
	define ('_MARTES','Dimarts'); 
	define ('_MIERCOLES','Dimecres'); 
	define ('_JUEVES','Dijous'); 
	define ('_VIERNES','Divendres'); 
	define ('_SABADO','Dissabte'); 
	define ('_DOMINGO','Diumenge'); 

	//Meses del año
	define ('_ENERO','Gener'); 
	define ('_FEBRERO','Febrer'); 
	define ('_MARZO','Març');
	define ('_ABRIL','Abril'); 
	define ('_MAYO','Maig'); 
	define ('_JUNIO','Juny'); 
	define ('_JULIO','Juliol'); 
	define ('_AGOSTO','Agost'); 
	define ('_SEPTIEMBRE','Setembre'); 
	define ('_OCTUBRE','Octubre'); 
	define ('_NOVIEMBRE','Novembre'); 
	define ('_DICIEMBRE','Desembre'); 

	//Menú
	define ('_MENUINICIO','Inici'); 
	define ('_MENUCLUB','Club'); 
	define ('_MENUCLUBHISTORIA','História'); 
	define ('_MENUCLUBDIRECTIVA','Directiva'); 
	define ('_MENUCLUBPLANTILLAS','Plantilles'); 
	define ('_MENUCLUBHIMNO','Himne');
	define ('_MENUCLUBSOCIO','Fer-te soci');
	define ('_MENUCLUBFORMULARIOS','Formularis');
	define ('_MENUCLUBHORARIOS','Horaris');
	define ('_MENUCLUBECONOMIA','Economia');
	define ('_MENUCLUBREGIMENINTERNO','Régim intern');
	define ('_MENUCLUBESTATUTO','Estatut');
	define ('_MENUGOLEADORES','Golejadors'); 
	define ('_MENUCATEGORIA','Categories');	
	define ('_MENURESULTADOS','Resultats'); 
	define ('_MENUQUINIELA','Quiniela'); 
	define ('_MENUENCUESTA','Enquesta'); 
	define ('_MENUPROMOCION','Promoció'); 
	define ('_MENUFOTOS','Fotos'); 
	define ('_MENUCLASIFICACION','Classificació');
	define ('_MENUCLASIFICACIONCASA','A casa');
	define ('_MENUCLASIFICACIONFUERA','Fora');
	define ('_MENUCLASIFICACION1VUELTA','1ª volta');
	define ('_MENUCLASIFICACION2VUELTA','2ª volta');
	define ('_MENUEQUIPOS','Equips');
	define ('_MENUCAMPOS','Camps');
	define ('_MENUTORNEO','Torneig');
	define ('_MENUPAGINASAMIGAS','Pàgines amigues'); 
	define ('_MENUPUBLICIDAD','Publicitat'); 
	define ('_MENUFORO','Fórum');
	define ('_MENUCONTACTA','Contacta'); 
 
  //Pantalla indice
	define ('_INDICEULTIMAJORNADA','Darrera jornada');
	define ('_INDICEPROXIMAJORNADA','Propera jornada');
	define ('_PATROCINADOR','Patrocinador principal:');
	define ('_AMISTOSO','Amistós');
	
	//Campus
	define ('_CAMPUS','CAMPUS 2.011');
	define ('_FECHASCAMPUS','Del 27 de juny al 15 de juliol');
	define ('_ACTIVIDADES','ACTIVITATS CAMPUS');
	define ('_HORA1','De 9:30 a 14:00');
	define ('_HORA2','De 14:00 a 16:00');
	define ('_HORA3','De 16:00 a 18:00');
	define ('_ACTIVIDADES1','Quatre hores diàries, aproximadament, de tecnificació.');
	define ('_ACTIVIDADES2','Una hora i mitja diària de piscina.');
	define ('_ACTIVIDADES3','Els porters tindran el seu entrenament específic.');
	define ('_ACTIVIDADES4','Dinar a les nostres instal.lacions amb monitors de taula.');
	define ('_ACTIVIDADES5','Técnica específica de futbol.');
	define ('_ACTIVIDADES6','Jocs amb pilota i partits de futbol amb l\'objectiu de plasmar en el camp dels ensenyaments diàries.');
	define ('_PLAZASLIMITADAS','Places limitades per ordre d\'inscripcions. (30 places)');
	define ('_PRECIOS','LLISTAT DE PREUS');
	define ('_PRECIOSMAÑANA','Preus només al matí (9:30 a 14:00)');
	define ('_PRECIOSTARDE','Preus només a la tarda (16:00 a 18:00)');
	define ('_PRECIOSTODODIA','Preus per a tot el dia (9:30 a 18:00)');
	define ('_UNASEMANA','Una setmana');
	define ('_DOSSEMANAS','Dues setmanes');
	define ('_TRESSEMANAS','Tres setmanes');
	define ('_COMEDOR','Menjador');
	define ('_UNASEMANACOMEDOR','Una setmana de menjador: 40 €');
	define ('_UNDIACOMEDOR','Un dia de menjador: 8 €');
	define ('_MASINFORMACION','Per a més informació');
	define ('_MASINFORMACION1','Passar-se per les oficines del club cada tarda de 18:00 a 22:00.');
	define ('_MASINFORMACION2','Trucar al coordinador de l\'Atlético Centre Hospitalense, Roberto, als teléfons:');
	
	//Torneo
	define ('_TORNEO','V TORNEIG JORDI ALBA ATLÉTICO CENTRO HOSPITALENSE');
	define ('_TORNEOEQUIPOS','Equips participants');
	define ('_TORNEOREGLAMENTO','Reglament');
	define ('_TORNEOPARTIDOS','Partits');
	define ('_REGLAMENTOTITULO','Reglament del V torneig Jordi Alba Atlético Centro Hospitalense');
	define ('_REGLAMENTONORMA1','Els equips participants estaran compostos per un màxim de 18 jugadors en categories de Infantil, Juvenil, Amateur i Veterans, i per un màxim de 12 jugadors en Promeses, Pre-Benjamí, Benjamí i Aleví.');
	define ('_REGLAMENTONORMA2','El torneig es regirà per les normes de la F. C. F. per les categories Benjamí, Aleví, Infantil, Juvenil, Amateur i Veterans, i per les normes del Consell Esportiu de L\'Hospitalet en Promeses, Pre-Benjamí, Benjamí Escolar y Aleví Escolar.');
	define ('_REGLAMENTONORMA3','El torneig es disputarà en la modalitat de triangular per a tot el futbol base i a partit únic els amateur i veterans.');
	define ('_REGLAMENTONORMA4','TRIANGULARS: els equips jugaran dos partits de dues parts cadascun, del temps estipulat en les normes del torneig a la seva categoria.');
	define ('_REGLAMENTONORMA5','PARTIT ÚNIC: els amateurs i els veterans jugaran un partit amb el temps estipulat en la seva categoria.');
	define ('_REGLAMENTONORMA6','La puntuació serà la següent: <br><ul><li>Partit guanyat 3 punts.</li><li>Partit empatat 1 punt. </li><li> Partit perdut 0 punts.</ li></ul> <br><u>En finalitzar cada partit es realitzaran llançaments de penals a mort sobtada per resoldre qualsevol empat en la classificació final.<br>En cas d\'empat dels tres equips també persisteix en els penals la classificació es decidirà per la diferéncia de gols a favor en la classificació general entre ells quedant l\'ordre amb el millor diferéncia de gols. Si encara persisteix l\'empat, la classificació l\'ha de decidir l\'equip amb major nombre de gols a favor, si encara així continua la igualtat quedarà per davant l\'equip amb menys gols encaixats en la classificació final i en últim lloc per desfer l\'empat es decidirà per la moneda a l\'aire.<br>En la modalitat a partit únic, l\'empat es resoldrà amb llançaments de penals a mort sobtada.</u>');
	define ('_REGLAMENTONORMA7','Tot jugador que sigui expulsat amb vermella directa no podrà disputar el próxim partit.');
	define ('_REGLAMENTONORMA8','Tots els equips hauran de presentar les fitxes corresponents amb un mànim de 20 minuts abans de començar el partit.');
	define ('_REGLAMENTONORMA9','L\'equip que no respecti i no segueixi la bona marxa del torneig serà expulsat del mateix. Aquesta norma inclou l\'afició que acompanya a l\'equip.');
	define ('_REGLAMENTONORMA10','Es permetrà la participació de tres jugadors amb DNI en categoria Cadets, Juvenil, Amateur i Veterans, i 3 jugadors amb DNI o la Partida de Naixement en categories Pre-Benjamí, Benjamí, Aleví i Infantil.');
	define ('_REGLAMENTONORMA11','Els temps estimats per a la durada dels partits seran els següents:<br><ul><li>Promeses: 2 parts de 10 minuts i 5 minuts de descans (triangular).</li><li>Pre-Benjamí Escolar: 2 parts de 10 minuts i 5 minuts de descans (triangular).</li><li>Benjamí Escolar: 2 parts de 12 minuts i 5 minuts de descans (triangular).</li><li>Infantil/Cadet Escolar: 2 parts de 20 minuts i 5 minuts de descans (triangular).</li><li>Pre-Benjamí Catalana: 2 parts de 10 minuts i 5 minuts de descans (triangular).</li><li>Benjamí Catalana: 2 parts de 12 minuts i 5 minuts de descans (triangular).</li><li>Aleví Catalana: 2 parts de 15 minuts i 5 minuts de descans (triangular).</li><li>Infantil: 2 parts de 18 minuts i 5 minuts de descans (triangular).</li><li>Juvenil: 2 parts de 30 minuts i 5 minuts de descans (triangular).</li><li>Amateur: 2 parts de 45 minuts.</li><li>Veterans: 2 parts de 45 minuts.</li></ul>');
	define ('_REGLAMENTONORMA12','La comissió del torneig es reserva el dret de qualsevol modificació en el funcionament del torneig amb el fí de millorar el transcurs del mateix.');
	define ('_TORNEOTROFEOS','Trofeus');
	define ('_TORNEO1CLASIFICADO','1r classificat');
	define ('_TORNEO2CLASIFICADO','2n classificat');
	define ('_TORNEO3CLASIFICADO','3r classificat');
	define ('_TORNEO4CLASIFICADO','4t classificat');
	define ('_TORNEO5CLASIFICADO','5é classificat');
	define ('_TORNEO6CLASIFICADO','6é classificat');
	define ('_TORNEO7CLASIFICADO','7é classificat');
	define ('_TORNEO8CLASIFICADO','8é classificat');
	define ('_TORNEO9CLASIFICADO','9é classificat');
	define ('_TORNEOPENALTIES','Penals');
	define ('_TORNEOCLASPOS','Pos');
	define ('_TORNEOCLASEQU','Equip');
	define ('_TORNEOCLASPUNTOS','Pun');
	define ('_TORNEOCLASJUG','Jug');
	define ('_TORNEOCLASGAN','Gua');
	define ('_TORNEOCLASEMP','Emp');
	define ('_TORNEOCLASPER','Per');
	define ('_TORNEOCLASGF','GF');
	define ('_TORNEOCLASGC','GC');
	define ('_TORNEO3Y4PUESTO','3r y 4t lloc');
	define ('_TORNEOFINAL','Final');
	define ('_TORNEOSEMIFINALES','Semifinals');
	define ('_TORNEOGRUPO','Grup');
	define ('_TORNEOMEJORJUGADOR','Millor jugador');
	define ('_TORNEORIFA1','El número de la rifa de la samarreta del Barça signada és el: 8930');
	define ('_TORNEORIFA2','Poden passar pel club qualsevol tarda a partir de les 18:00');
	
	//Horarios
	define ('_HORARIOSCOMIENZOENTRENO','Començament entrenaments');
	define ('_HORARIOSENTRENO','Horari d\'entrenaments');
	define ('_HORARIOSPARTIDO','Horaris partits');
	define ('_HORARIOSHORA','Hora');
	define ('_HORARIOSHORAS','Hores');
	define ('_HORARIOSA','a');
	define ('_HORARIOSCATEGORIA','Categoria');
	define ('_HORARIOSDIA','Dia');
	define ('_ALAS','a les');
	define ('_RESTOEQUIPOS','Resta d\'equips a partir de l\'1 de setembre a les 17:30');
	
	//Historia
	define ('_HISTORIA','História');
	
	//Galeria
	define ('_GALERIA','Galeria');
	define ('_CERRARGALERIA','Tancar'); 
	define ('_AMPLIARFOTO','Ampliar fotografia');
	define ('_AMPLIARFOTO12801024','1280x1024');
	define ('_AMPLIARFOTO800600','800x600');
	
	//Directiva
	define ('_DIRECTIVA','Directiva');
	
	//Plantillas
	define ('_PLANTILLAENTRENADORES','Entrenadors');
	define ('_PLANTILLAJUGADORES','Jugadors');
	
	//Himno
	define ('_HIMNO','Himne');
	
	//Hacerte socio
	define ('_HACERTESOCIO','Fer-te soci');
	
	//Formularios
	define ('_FORMULARIOS','Formularis');
	define ('_FORMDESCRIPCION','Descripció');
	define ('_FORMDESCARGA','Descarrega');
	
	//Regimen interno
	define ('_REGIMENINTERNO','Régim intern');
	
	//Estatuto
	define ('_ESTATUTO','Estatut');
	
	//Economia
	define ('_ECONOMIA','Economia');
	define ('_ECONOMIAGASTOS','Despeses');
	define ('_ECONOMIAINGRESOS','Ingressos');
	define ('_ECONOMIACONCEPTO','Concepte');
	define ('_ECONOMIAIMPORTE','Import');
	define ('_ECONOMIATOTAL','Totals');

}
/*else if ($idioma==3) //Italiano
{
	//Inicio
	define ('_BUENOSDIAS','Good morning');
	define ('_BUENASTARDES','Good evening');
	define ('_BUENASNOCHES','Good night');
	define ('_CARGANDO','Loading...');
	define ('_PROXIMAMENTE','Coming soon');
	define ('_MANTENIMIENTO1','Page maintenance'); 
	define ('_MANTENIMIENTO2','We''re sorry');
	define ('_CERRADONAVIDAD','The club will be closed from 23 December to 6 January inclusive');
	define ('_DESPLAZAMIENTOBUS','Accompanies Juvenil A to Cunit Saturday at the price of 8 euros.<br>Ask on the club\'s offices.');
	define ('_CERRADOSEMANASANTA','The club will be closed from 25 March to 2 April inclusive');
	
	//Cambio idioma
	define ('_ESPANYOL','Spanish');
	define ('_INGLES','English');
	define ('_CATALAN','Catalan');
	define ('_CAMBIOIDIOMA','Change language');
	define ('_CAMBIANDOIDIOMA','Changing language');
	
	//Usuarios
	define ('_BIENVENIDA','Benvenuto ');
	define ('_POSICIONBIENVENIDA1','La vostra squadra occupa ');
	define ('_POSICIONBIENVENIDA2',' posizione');
	define ('_NOUSUARIO1','Se non siete l\'utente ');
	define ('_NOUSUARIO2',' rimuovere prego la sessione');
	define ('_ANONIMO','anonimo');
	define ('_USUARIO','Utente');
	define ('_PASSWORD','Parola d\'accesso');
	define ('_ENTRAR','Entrare');
	define ('_REGISTRAR','Registrazione');
	define ('_NOENCONTRADO','Il nome dell\'utente o della parola d\'accesso � non valido');
	define ('_ERRORREGISTRO','Il nome dell\'utente gi� esiste');

	//Registro
	define ('_TITULOREGISTRO','MODULO DI REGISTRAZIONE');
	define ('_ALIASREGISTRO','Alias');
	define ('_PASSWORDREGISTRO','Parola d\'accesso');
	define ('_EMAILREGISTRO','E-mail');
	define ('_EQUIPOREGISTRO','Squadra');
	define ('_SELECCIONAEQUIPOREGISTRO','Selezionare la vostra squadra');
	define ('_OTROEQUIPOREGISTRO','L\'altra squadra');
	define ('_NOJUEGAREGISTRO','Non gioca');
	define ('_ENVIARREGISTRO','Inviare');
	define ('_TIPOERROR1REGISTRO','Lo pseudonimo non esiste');
	define ('_TIPOERROR2REGISTRO','La parola d\'accesso non esiste');
	define ('_TIPOERROR3REGISTRO','Il E-mail non esiste');
	define ('_TIPOERROR4REGISTRO','La squadra non esiste');
	define ('_REGISTROCORRECTO','Esso siete stati registrati correttamente con i seguenti dati');

	//Fotos
	define ('_FOTOSTEMPORADA','STAGIONE DELLE FOTO 2006/07'); 
	define ('_AMPLIAR','Preme per estendere l\'immagine');
	define ('_CERRAR','Fine');
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	http://www.allwords.com

	//P�gina resultados
	define ('_RESULTADOS','Results');
	define ('_IDA','First leg'); 
	define ('_VUELTA','Second leg'); 
	define ('_JORNADASIGUIENTE','Next matchday >>');
	define ('_JORNADAANTERIOR','<< Previous matchday');
	define ('_INCIDENCIAS','Information'); 
	define ('_JORNADA','Matchday'); 
	define ('_SINDATOS','No information');
	define ('_APLAZADO','Postponed');
	define ('_SUSPENDIDO','Suspended ');
	define ('_PROMOCION','Promote');
	define ('_CALENDARIONODISPONIBLE','Calendar not available');

	//P�gina quiniela
	define ('_VOLVERQUINIELA','Return to quiniela'); 
	define ('_PARTIDOS','Matches'); 
	define ('_PARTIDO','Match'); 
	define ('_PRONOSTICOS','Prognoses');
	define ('_PRONOSTICO','Prognose');
	define ('_QUINIELAFORO1','QUINIELA'); 
	define ('_QUINIELAFORO2','CATALUNYA F&Uacute;TBOL'); 
	define ('_QUINIELAFORO3','F&Uacute;TBOL CATALUNYA'); 
	define ('_QUINIELAWEB','QUINIELA WEB'); 
	define ('_PROXIMAMENTEQUINIELA','AVAILABLE NEXT'); 
	define ('_JUGADORES','Participant players'); 
	define ('_NOMBRE','Name'); 
	define ('_ACIERTOS','Successes'); 
	define ('_POSICION','Position'); 
	define ('_PARTIDOSJUGADOS','Played matchs'); 
	define ('_SINPRONOSTICO','There are no prognoses'); 
	define ('_SOLOREGISTRADOS','Only for registered users');
	define ('_ENVIARQUINIELA','Send');
	define ('_TIEMPOTERMINADO','El tiempo para rellenar la quiniela a terminado');

	//P�gina encuesta
	define ('_ENCUESTA','Poll'); 
	define ('_PREGUNTA','Who you think that Liga will win?'); 
	define ('_EQUIPOENCUESTA','Team'); 
	define ('_PUNTOSENCUESTA','Points'); 
	define ('_ENVIARENCUESTA','Vote');
	define ('_ERRORENCUESTA','Choose a team');
	define ('_EQUIPOELEGIDO','The team that you have chosen is');
	define ('_EQUIPOVALIDADO','You already voted. The chosen equipment was');
	define ('_RESULTADOSENCUESTA','As the survey goes');
	define ('_PORCENTAGESENCUESTA','Percentage');
	define ('_VOTANTESSENCUESTA','Voters');
	
	//P�gina goleadores
	define ('_VOLVERRESULTADOS','Return to results'); 
	define ('_VOLVERPROMOCION','Return to promote');
	define ('_CAMPO','Stadium'); 
	define ('_SOLOREGISTRADOSCOMENTARIOS','Registered if you want to leave your commentary');
	define ('_FECHAPARTIDO','Date');

	//P�gina clasificaci�n
	define ('_CLASIFICACION','league table position'); 
	define ('_EQUIPO','Team'); 
	define ('_PUNTOS','Points'); 
	define ('_JUGADOS','Played'); 
	define ('_GANADOS','Win'); 
	define ('_EMPATADOS','Draw'); 
	define ('_PERDIDOS','Lost'); 
	define ('_GF','G. F.'); 
	define ('_GC','G. A.'); 
	define ('_HASTAJORNADA','until the matchday '); 
	define ('_PARTIDOSCASA','Matches played local'); 
	define ('_PARTIDOSFUERA','Matches played visitor'); 
	define ('_PARTIDOS1VUELTA','Matches played 1st leg'); 
	define ('_PARTIDOS2VUELTA','Matches played 2nd leg'); 
	define ('_ASCIENDE','Ascends to'); 
	define ('_PROMOCIONA','Promotes for'); 
	define ('_DESCIENDE','Descends to'); 
	define ('_SANCION','Sanctioned with ');
	define ('_VOLVERCLASIFICACION','Return to league table position');
	define ('_GRAFICA','Graph');
	define ('_TABTODO','All');
	define ('_TABCASA','Local');
	define ('_TABFUERA','Visitor');
	define ('_TAB1VUELTA','1st leg');
	define ('_TAB2VUELTA','2nd leg');
	define ('_PARTIDOSGANADOS','Matches won by');
	define ('_PARTIDOSEMPATADOS','Matches draw by');
	define ('_PARTIDOSPERDIDOS','Matches lost by');	

	//Campos
	define ('_CAMPOS','Stadiums');
	define ('_DIRECCION','Address'); 
	define ('_POBLACION','City'); 
	define ('_EQUIPOS','Teams');
	define ('_VOLVERCAMPOS','Return to stadiums'); 
	define ('_BUSCAR','Send');
	define ('_BUSCARPOBLACION','All the fields of the following city have looked for: ');
	define ('_BUSCARTODO','One has looked for by Name of the stadium, Address and City the following word: ');
	define ('_BUSCARTOTAL','Total stadiums: ');
	define ('_BUSCARANTERIOR','Previous');
	define ('_BUSCARSIGUIENTE','Next');
	define ('_COMOLLEGAR','How to arrive');
	define ('_COCHE','Car'); 
	define ('_TREN','Train'); 
	define ('_METRO','Underground');
	define ('_BUS','Bus'); 
	define ('_TRAM','Tram'); 
	define ('_FFCC','FGC'); 

	//Otros equipos
	define ('_EQUIPOSBUSCADOR','Teams');
	define ('_CAMPOOTROSEQUIPOS','Stadium');
	define ('_WEB','Web'); 
	define ('_TWITTER','Twitter'); 
	define ('_DIRECCIONLOCALSOCIAL','Social local direction'); 
	define ('_POBLACIONLOCALSOCIAL','Social local city'); 
	define ('_DIA','Date of match'); 
	define ('_HORA','Hour of match'); 
	define ('_CAMISETA','T-Shirt'); 
	define ('_PANTALON','Trousers'); 
	define ('_TELEFONO','Telephone'); 
	define ('_FECHAOTROSEQUIPOS','Date'); 
	define ('_LOCAL','Local'); 
	define ('_RESULTADO','Result'); 
	define ('_VISITANTE','Visitor'); 
	define ('_VOLVEROTROSEQUIPOS','Return to others teams'); 
	define ('_VOLVERCLUB','Return to club');
	define ('_BUSCARPOBLACIONEQUIPOS','All the fields of the following city have looked for: ');
	define ('_BUSCARTODOEQUIPOS','One has looked for by Name of the team, Address and City the following word: ');
	define ('_BUSCARTOTALEQUIPOS','Total teams: ');	
	define ('_VOLVEREQUIPOS','Return to teams');

	//Página ficha
	define ('_VOLVEREQUIPO','Return to team'); 
	define ('_NOMBRECOMPLETO','Real name'); 
	define ('_GOLESTOTALES','Total Goals'); 
	define ('_GOLESJUGADA','Goals'); 
	define ('_GOLESPENALTY','Penalty goals'); 
	define ('_GOLESPROPIAPUERTA','Own goals'); 
	define ('_ALTA','Bought'); 
	define ('_BAJA','Sold');
	define ('_PROCEDENCIA','Previous Club'); 
	define ('_DESTINO','Next Club'); 
	define ('_DEMARCACION','Position'); 
	define ('_NACIONALIDAD','Nationality'); 
	define ('_SELECCION','International'); 
	define ('_COMUNITARIO','Communitarian'); 
	define ('_PORTERO','Goalkeeper'); 
	define ('_DEFENSA','Defender'); 
	define ('_CENTROCAMPISTA','Midfielder'); 
	define ('_DELANTERO','Striker'); 
	define ('_SI','Yes');
	define ('_NO','No');

	//Página tabla goleadores
	define ('_GOLEADORES','Goals Scored');
	define ('_JUGADOR','Player');
	define ('_CATEGORIA','Categoria');
	define ('_EQUIPOTG','Team');
	define ('_TOTAL','Total');
	define ('_JUGADA','Goal');
	define ('_PENALTY','Penalty');

	//Página comentarios
	define ('_COMENTARIOS','Commentaries');
	define ('_AUTOR','Author');
	define ('_COMENTARIO','Commentary');
	define ('_NOCOMENT','No commentaries');

	//Página partidos pendientes
	define ('_PARTIDOSPENDIENTES','Pending matches');
	define ('_PARTPENJORNADA','Matchday');
	define ('_PARTPENFECHA','Predicted date');
	define ('_PARTPENPARTIDO','Match');
	define ('_PARTPENCAUSA','Cause');

	//Contacta
	define ('_TITULO','Message to webmaster'); 
	define ('_INTRODUCENOMBRE','Insert your name or alias'); 
	define ('_EMAIL','Email'); 
	define ('_MENSAJE','Your message'); 
	define ('_ENVIAR','Send'); 
	define ('_INSTRUCCION1','All the fields are obligatory'); 
	define ('_INSTRUCCION2','In case of error it follows the instructions:'); 
	define ('_ERROR1','Insert your name or alias to be able to communicate to me with you'); 
	define ('_ERROR2','Insert your email to be able to communicate to me with you'); 
	define ('_ERROR3','Insert your message to be able to communicate to me with you'); 
	define ('_RESPUESTA1','Thanks to give its opinion');
	define ('_RESPUESTA2','In less than 24 hours I will put myself in contact with you to solve its doubts');
	define ('_OTRACONSULTA','Any question');
	//define ('_CONTACTAR','If you have some problem with the form send me a message to this direction <a href=mailto:dinamicobatllo@iespana.es>dinamicobatllo@iespana.es</a>. Thanks you');
	define ('_CONTACTAR','If you have some problem with the form send me a message to this direction <a href=mailto:webmaster@dinamicobatllo.tuocio.es>webmaster@dinamicobatllo.tuocio.es</a>. Thanks you');
	define ('_CONTACTAR2','Can also call coordinator Mr. Paco Bueno to the phone:<br>93 337 35 54');

	//Días de la semana
	define ('_LUNES','Monday'); 
	define ('_MARTES','Tuesday'); 
	define ('_MIERCOLES','Wednesday'); 
	define ('_JUEVES','Thursday'); 
	define ('_VIERNES','Friday'); 
	define ('_SABADO','Saturday'); 
	define ('_DOMINGO','Sunday'); 

	//Meses del año
	define ('_ENERO','January'); 
	define ('_FEBRERO','February'); 
	define ('_MARZO','March'); 
	define ('_ABRIL','April'); 
	define ('_MAYO','May'); 
	define ('_JUNIO','June'); 
	define ('_JULIO','July'); 
	define ('_AGOSTO','August'); 
	define ('_SEPTIEMBRE','September'); 
	define ('_OCTUBRE','October'); 
	define ('_NOVIEMBRE','November'); 
	define ('_DICIEMBRE','December'); 

	//Menú
	define ('_MENUINICIO','Home'); 
	define ('_MENUCLUB','Club'); 
	define ('_MENUGOLEADORES','Goals Scored'); 
	define ('_MENUCATEGORIA','Categories');	
	define ('_MENURESULTADOS','Results'); 
	define ('_MENUQUINIELA','Quiniela');
	define ('_MENUENCUESTA','Poll'); 
	define ('_MENUPROMOCION','Promotes'); 
	define ('_MENUFOTOS','Photos'); 
	define ('_MENUCLASIFICACIONCASA','Local');
	define ('_MENUCLASIFICACIONFUERA','Visitor');
	define ('_MENUCLASIFICACION1VUELTA','1st leg');
	define ('_MENUCLASIFICACION2VUELTA','2nd leg');
	define ('_MENUCAMPOS','Stadiums');
	define ('_MENUTORNEO','Tournament');
	define ('_MENUEQUIPOS','Others teams');
	define ('_MENUPAGINASAMIGAS','Friendly pages'); 
	define ('_MENUPUBLICIDAD','Partners'); 
	define ('_MENUFORO','Forum');
	define ('_MENUCONTACTA','Contact us'); 
 
  //Pantalla indice
	define ('_INDICEPARTANTERIOR','Previous match');
	define ('_INDICEPARTSIGUIENTE','Next match');
	define ('_PATROCINADOR','Principal sponsor:');
	define ('_AMISTOSO','Friendly match');
	
	//Campus
	define ('_CAMPUS','CAMPUS 2.011');
	define ('_FECHASCAMPUS','From June 27 to July 15');
	define ('_ACTIVIDADES','CAMPUS ACTIVITIES');
	define ('_HORA1','From 9:30 to 14:00');
	define ('_HORA2','From 14:00 to 16:00');
	define ('_HORA3','From 16:00 to 18:00');
	define ('_ACTIVIDADES1','Four hours per day, approximately technification.');
	define ('_ACTIVIDADES2','An hour and daily average pool.');
	define ('_ACTIVIDADES3','The goalkeeper will have their specific training.');
	define ('_ACTIVIDADES4','Lunch at our table installations with monitors.');
	define ('_ACTIVIDADES5','Soccer specific technique.');
	define ('_ACTIVIDADES6','Ball games and football matches in order to capture in the field daily lessons.');
	define ('_PLAZASLIMITADAS','Limited capacity in order of registration. (30 places)');
	define ('_PRECIOS','PRICE LIST');
	define ('_PRECIOSMA�ANA','Prices only in the morning (9:30 to 14:00)');
	define ('_PRECIOSTARDE','Prices only in the evening (16:00 to 18:00)');
	define ('_PRECIOSTODODIA','PPrices for all day (9:30 to 18:00)');
	define ('_UNASEMANA','A week');
	define ('_DOSSEMANAS','Two weeks');
	define ('_TRESSEMANAS','Three weeks');
	define ('_COMEDOR','Dining room');
	define ('_UNASEMANACOMEDOR','A week of dining room: 40 �');
	define ('_UNDIACOMEDOR','One day dining: 8 �');
	define ('_MASINFORMACION','For more information');
	define ('_MASINFORMACION1','Go through the offices of the club every evening from 18:00 to 22:00.');
	define ('_MASINFORMACION2','Call Center Coordinator of Atl�tico Centro Hospitalense, Francisco Bueno, phones:');
	
	//Torneo
	define ('_TORNEO','V TOURNAMENT JORDI ALBA ATL�TICO CENTRO HOSPITALENSE');
	define ('_TORNEOEQUIPOS','Participating teams');
	define ('_TORNEOREGLAMENTO','Regulation');
	define ('_TORNEOPARTIDOS','Matches');
	define ('_REGLAMENTOTITULO','Regulation of the V Tournament Jordi Alba Atl�tico Centro Hospitalense');
	define ('_REGLAMENTONORMA1','The participating teams will comprise a maximum of 18 players into categories Infantil, Juvenil, Amateur and Veteran, and a maximum of 12 players on Promises, Pre-Benjamin, Benjamin and Alev�n.');
	define ('_REGLAMENTONORMA2','The tournament will be governed by the rules of F. C. F. for categories Benjamin, Alev�n, Infantil, Juvenil, Amateur and Veterans, and the rules of the Consell Esportiu of L\'Hospitalet in Promises, Pre-Benjamin, Benjamin School and Alevin School.');
	define ('_REGLAMENTONORMA3','The tournament will be held in the form of triangular for all the youth football game and only the amateur and veterans.');
	define ('_REGLAMENTONORMA4','TRIANGULAR: teams will play two games in two parts each, the time stipulated in the rules of the tournament to its category.');
	define ('_REGLAMENTONORMA5','SINGLE MATCH: amateurs and veterans play a game with the stipulated time in its category.');
	define ('_REGLAMENTONORMA6','The score is as follows:<br><ul><li>Match won 3 points.</li><li>Match tied 1 point.</li><li>Match lost 0 points.</li></ul><br><u>End of each game releases will be made to sudden death penalties to resolve any tie in the final classification.<br>In case of equality of the three teams also persisted on penalties the classification will be decided by the difference of goals scored in the overall standings among them being the order with the best goal difference. If the tie persists, the classification will be decided by the team with most goals for, if still continuing ahead will equal the team with fewer goals conceded in the final standings and last to break the tie will be decided by the coin.<br>In the form a single match, the tie will be resolved by penalty shots to sudden death.</u>');
	define ('_REGLAMENTONORMA7','Any player who is sent off with red card may not play the next game.');
	define ('_REGLAMENTONORMA8','All teams must submit the appropriate tabs at least 20 minutes before starting the game.');
	define ('_REGLAMENTONORMA9','The team that does not respect and follow the proper conduct of the tournament will be expelled from it. This standard includes the fans that came with the team.');
	define ('_REGLAMENTONORMA10','It will allow the participation of three players with DNI in category Cadetes, Juvenil, Amateur and Veteran, and three players with DNI or Birth Certificate in categories Pre-Benjamin, Benjamin, Alev� and Infantil.');
	define ('_REGLAMENTONORMA11','The estimated times for the duration of the matches will be:<br><ul><li>Promises: 2 parts of 10 minutes and 5 minutes of rest (triangular).</li><li>Pre-Benjamin School: 2 parts of 10 minutes and 5 minutes of rest (triangular).</li><li>Benjamin School: 2 parts of 12 minutes and 5 minutes of rest (triangular).</li><li>Infantil/Cadet School: 2 parts of 20 minutes and 5 minutes of rest (triangular).</li><li>Pre-Benjamin Catalana: 2 parts of 10 minutes and 5 minutes of rest (triangular).</li><li>Benjamin Catalana: 2 parts of 12 minutes and 5 minutes of rest (triangular).</li><li>Alevin Catalana: 2 parts of 15 minutes and 5 minutes of rest (triangular).</li><li>Infantil: 2 parts of 18 minutes and 5 minutes of rest (triangular).</li><li>Juvenil: 2 partes of 30 minutes and 5 minutes of rest (triangular).</li><li>Amateur: 2 parts of 45 minutes.</li><li>Veterans: 2 parts of 45 minutes.</li></ul>');
	define ('_REGLAMENTONORMA12','The tournament committee reserves the right to any changes in the functioning of the tournament in order to improve during the same.');
	define ('_TORNEOTROFEOS','Trophies');
	define ('_TORNEO1CLASIFICADO','1st classified');
	define ('_TORNEO2CLASIFICADO','2nd classified');
	define ('_TORNEO3CLASIFICADO','3rd classified');
	define ('_TORNEO4CLASIFICADO','4th classified');
	define ('_TORNEO5CLASIFICADO','5th classified');
	define ('_TORNEO6CLASIFICADO','6th classified');
	define ('_TORNEO7CLASIFICADO','7th classified');
	define ('_TORNEO8CLASIFICADO','8th classified');
	define ('_TORNEO9CLASIFICADO','9th classified');
	define ('_TORNEOPENALTIES','Penalties');
	define ('_TORNEOCLASPOS','Pos');
	define ('_TORNEOCLASEQU','Team');
	define ('_TORNEOCLASPUNTOS','Poi');
	define ('_TORNEOCLASJUG','Pla');
	define ('_TORNEOCLASGAN','Win');
	define ('_TORNEOCLASEMP','Dra');
	define ('_TORNEOCLASPER','Los');
	define ('_TORNEOCLASGF','GF');
	define ('_TORNEOCLASGC','GA');
	define ('_TORNEO3Y4PUESTO','3rd y 4th place');
	define ('_TORNEOFINAL','Final');
	define ('_TORNEOSEMIFINALES','Semifinals');
	define ('_TORNEOGRUPO','Group');
	define ('_TORNEOMEJORJUGADOR','Best player');
	define ('_TORNEORIFA1','The number of t-shirt raffle is signed Barcelona: 8930');
	define ('_TORNEORIFA2','It can take the club any evening after 18:00');

	//Horarios	
	define ('_HORARIOSCOMIENZOENTRENO','Start training');
	define ('_HORARIOSENTRENO','Schedule training');
	define ('_HORARIOSPARTIDO','Schedule games');
	define ('_HORARIOSHORA','Time');
	define ('_HORARIOSHORAS','');
	define ('_HORARIOSA','to');
	define ('_HORARIOSCATEGORIA','Category');
	define ('_HORARIOSDIA','Day');
	define ('_ALAS','at');
	define ('_RESTOEQUIPOS','Other teams from September 1 at 17:30');
}*/
?>
