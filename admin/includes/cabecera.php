<?php
    $ruta = $_SERVER['REQUEST_URI'];

    if (strpos($ruta, "admin") > 0){
        $pos = strpos($ruta, "admin");
        $ruta = substr($ruta, 0, $pos);
    }
    if (strpos($ruta, "php") > 0){
        $pos = strripos($ruta, "/");
        $ruta = substr($ruta, 0, $pos);
    }
    if (strcmp($ruta, "/") == 0){
        $ruta = "";
    }
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

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import bootstrap.css-->
        <link type="text/css" rel="stylesheet" href="<?= $ruta ?>/css/bootstrap.min.css"  media="screen,projection"/>

        <!-- Mapas -->
        <link type="text/css" rel="stylesheet" href="<?= $ruta ?>/css/leaflet.css"/>
        
        <!-- Menu -->
        <link type="text/css" rel="stylesheet" href="<?= $ruta ?>/css/menu.css"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <!-- <link type="text/css" rel="stylesheet" href="css/estilo.css"> -->
		<link rel="shortcut icon" href="favicon.ico">
    </head>

    <body>

<?php
        if (file_exists("conf/funciones.php")) {
            require_once("conf/funciones.php");
            idiomaPagina();
            require_once("conf/traduccion.php");
            require_once("conf/conexion.php");
            $link = Conectarse();
        } else if (file_exists("../conf/funciones.php")) {
            require_once("../conf/funciones.php");
            idiomaPagina();
            require_once("../conf/traduccion.php");
            require_once("../conf/conexion.php");
            $link = Conectarse();
        } else if (file_exists("../../conf/funciones.php")) {
            require_once("../../conf/funciones.php");
            idiomaPagina();
            require_once("../../conf/traduccion.php");
            require_once("../../conf/conexion.php");
            $link = Conectarse();
        }
?>
        <div id="conexiones" name="conexiones"></div>