<?php
	session_start();
	unset($_SESSION["pagina"]);
	$_SESSION["pagina"]=20;
	
	require_once("../includes/conexiones.php");
	require_once("../includes/inc_plantillas.php");
	
	$idCategoria = $_GET['IdCategoria'];
	
	if (!isset($_SESSION["admin_web"]))
	{
		//Query para insertar los valores en la base de datos
		$query="insert into paginasvistas (IP,Hora,Fecha,Pagina,JornadaEquipo) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].",".$idCategoria.")";
		mysqli_query($link, $query);
	}
?>