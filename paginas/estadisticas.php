<?php
    session_start();
    unset($_SESSION["pagina"]);
    $_SESSION["pagina"]=7;
    
    require_once("../includes/conexiones.php");
    require_once("../includes/inc_estadisticas.php");

	if (!isset($_SESSION["admin_web"]))
	{
		//Query para insertar los valores en la base de datos
		$query="insert into paginasvistas (IP,Hora,Fecha,Pagina) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].")";
		mysqli_query($link, $query);
	}
?>


<form name="buscapagina">
	<input type="hidden" name="paginaactual" id="paginaactual" value="<?php print ($_SESSION["pagina"]);?>">
</form>