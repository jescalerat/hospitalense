<?php

/*
 * Mostrar una imagen desde blob mysql usando PHP
 * Autor: Braulio Andrés Soncco Pimentel <braulio@buayacorp.com>
 * http://www.buayacorp.com/
 * 
 * Este script está bajo licencia de Creative Commons 
 * http://creativecommons.org/licenses/by/2.0/
 */
 
	if (!isset($link))
	{
	    require("../conf/conexion.php");
	    $link=Conectarse();
	}
	
	// Nivel de errores
	error_reporting(E_ALL);
	
	// Recuperamos la foto de la tabla
	if (isset($_GET['IdFoto'])){
		$query = "SELECT * FROM fotos_historia WHERE IdFoto = ".$_GET['IdFoto'];
	} else if (isset($_GET['IdJugador'])){
		$query = "SELECT * FROM jugadores WHERE IdJugador = ".$_GET['IdJugador'];
	} else if (isset($_GET['IdCategoria'])){
		$query = "SELECT * FROM categoria WHERE IdCategoria = ".$_GET['IdCategoria'];
	} else if (isset($_GET['IdDirectiva'])){
		$query = "SELECT * FROM directiva WHERE IdDirectiva = ".$_GET['IdDirectiva'];
	} else if (isset($_GET['IdFormulario'])){
		$query = "SELECT * FROM formularios WHERE IdFormulario = ".$_GET['IdFormulario'];
	}
	
	$q=mysqli_query ($link, $query);
	$rowfoto=mysqli_fetch_assoc($q);

	$imagen = $rowfoto["Foto"];
	$mime = $rowfoto["Mime"];
	
	$nombreFormulario = "";
	if ($mime == "application/msword"){
		$nombreFormulario = "formulario.doc";
	}else if ($mime == "application/pdf"){
		$nombreFormulario = "formulario.pdf";
	}
	
	// Gracias a esta cabecera, podemos ver la imagen 
	// que acabamos de recuperar del campo blob
	header("Content-Type: $mime");
	header("Content-Disposition: ; filename=$nombreFormulario");
	// Muestra la imagen
	echo $imagen;

?>