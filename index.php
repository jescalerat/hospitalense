<?php
	session_start();
	unset($_SESSION["admin_web"]);
	if (isset($_GET["admin_web"]))
	{
		$_SESSION["admin_web"]=$_GET["admin_web"];
	}
	
	require_once("conf/traduccion.php");
	require_once("conf/funciones.php");
	include_once("conf/conexion.php");
	$link=Conectarse();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="TITLE" content="Atlético Centro Hospitalense"/>
		<meta name="DESCRIPTION" content="Resultados y clasificaciones del At. C. Hospitalense"/>
		<meta name="KEYWORDS" content="futbol,territorial,resultado,clasificacion,goleadores"/>
		<meta name="AUTHOR" content="jet"/>
		<meta http-equiv="EXPIRES" content="Mon, 31 Dec 2054 00:00:01 PST"/>
		<meta http-equiv="CHARSET" content="UTF-8"/>
		<meta http-equiv="content-LANGUAGE" content="Español"/>
		<meta http-equiv="VW96.OBJECT TYPE" content="Pag. Personal"/>
		<meta name="RATING" content="General"/>
		<meta name="REVISIT-AFTER" content="7 days"/>
		<meta name="Subject" content="Deportes"/>
		<meta name="Revisit" content="1 day"/>
		<meta name="Distribution" content="Global"/>
		<meta name="Robots" content="All"/>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

		<title>Atl&eacute;tico Centro Hospitalense</title>

		<link rel="stylesheet" href="css/normalize.css">

		<!-- Menu css -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/menubootstrap.css">
		<!-- Menu css -->


		<!-- Menu js -->
		<script type="text/javascript" src="js/jquery-latest.min.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/menubootstrap.js"></script>
		<!-- Menu js -->

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="shortcut icon" href="favicon.ico">
		
		<script type="text/javascript" src="js/funciones.js"></script>
		<!--<script type="text/javascript" src="js/prototype.js"></script>-->

		
		<!-- Greybox -->
		<link rel="stylesheet" href="css/gb_styles.css" media="all">
		<script type="text/javascript">
			var GB_ROOT_DIR = "js/greybox/";
			var GB_IMATGES_DIR = "imagenes/greybox/";
			var SALT = 0;
		</script>
		<script type="text/javascript" src="js/greybox/AJS.js"></script>
		<script type="text/javascript" src="js/greybox/AJS_fx.js"></script>
		<script type="text/javascript" src="js/greybox/gb_scripts.js"></script>
		<!-- Greybox -->
	</head>



 
 <?php
	if (isset($_SESSION["pagina"]))
	{
		$pagina=$_SESSION["pagina"];
	}
	else
	{
		$pagina=0;
	}
	print ("<body class=\"principal\" onload=\"startList();cargarPagina(".$pagina.");\">");
    
	$ruta = substr($_SERVER['SCRIPT_FILENAME'], 0, strrpos($_SERVER['SCRIPT_FILENAME'], '/'));
	$_SESSION["ruta"] = $ruta.="/";
	//Servidor local
	$_SESSION["rutaservidor"] = "http://".$_SERVER["SERVER_NAME"].":8081/workspace/hospitalense/";
	//Servidor internet
	//$_SESSION["rutaservidor"] = "http://".$_SERVER["HTTP_HOST"]."/";
	
	//Comprobar idioma del navegador cliente  
	if ($_SERVER['HTTP_ACCEPT_LANGUAGE'] != ''){ 
		// Miramos que idiomas ha definido:
		$idiomas = explode(",", $_SERVER['HTTP_ACCEPT_LANGUAGE']); # Convertimos HTTP_ACCEPT_LANGUAGE en array
		/* Recorremos el array hasta que encontramos un idioma del visitante que coincida con los idiomas en que está disponible nuestra web */
		if (substr($idiomas[0], 0, 2) == "es"){$idioma = 1;}
		else if (substr($idiomas[0], 0, 2) == "en"){$idioma = 2;}
		else if (substr($idiomas[0], 0, 2) == "ca"){$idioma = 3;}
		//else if (substr($idiomas[0], 0, 2) == "eu"){$idioma = 3;}
		//else if (substr($idiomas[0], 0, 2) == "gl"){$idioma = 4;}
		else {$idioma=1;}
	}	

	if (!isset($_SESSION["idiomapagina"]))
	{
		$_SESSION["idiomapagina"]=$idioma;
	}

	
	
?>


        <!-- Cabecera -->
        <header>
            <?php require_once($_SESSION["ruta"]."menu/menu.php"); ?>
        </header>

        <!-- Contenido -->
        <section>
            
            <div id="principal">
				<?php require_once($_SESSION["ruta"]."paginas/principal.php"); ?>
			</div>
        </section>


        <!-- Contenido relacionado-->
        <aside>
                    <p>Contenido Relacionado</p>
        </aside>



        <!-- Pie de pagina -->
        <footer>
                <a href="http://www.ejemplocodigo.com">www.ejemplocodigo.com</a>
        </footer>

		<input type="hidden" id="cargandotexto" name="cargandotexto" value="<?= cambiarAcentos(_CARGANDO) ?>"/>
</body>
</html>