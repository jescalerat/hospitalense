<?php
	session_start();
	unset($_SESSION["pagina"]);
	$_SESSION["pagina"]=25;

	$idCategoria=0;
	if (isset($_GET['IdCategoria']))
	{
	    $idCategoria=$_GET['IdCategoria'];
	}
	
	require_once("../includes/conexiones.php");
	require_once("../includes/inc_tabla_goleadores.php");

    if (!isset($_SESSION["admin_web"]))
    {
   	    //Query para insertar los valores en la base de datos
        $query="insert into paginasvistas (IP,Hora,Fecha,Pagina,JornadaEquipo) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].",".$idCategoria.")";
        mysqli_query($link, $query);
	}
?>

<form name="buscapagina">
	<input type="hidden" name="paginaactual" id="paginaactual" value="<?= $_SESSION["pagina"] ?>">
</form>