<?php
	session_start();
	if (!isset($link))
	{
	    require_once($_SESSION["ruta"]."conf/conexion.php");
	    $link=Conectarse();
	}
	require_once($_SESSION["ruta"]."conf/funciones.php");
	require_once($_SESSION["ruta"]."conf/traduccion.php");
	
	$idfoto=$_GET['IdFoto'];
	
	//Query
	$query="select * from fotos_historia where IdFoto=".$idfoto;
	$qfoto=mysqli_query($link, $query);
	$rowfoto=mysqli_fetch_array($qfoto, MYSQLI_BOTH);

	$descripcion = "";
	if ($_SESSION["idiomapagina"] == 1){
		$descripcion = $rowfoto["DescripcionES"];
	}else if ($_SESSION["idiomapagina"] == 2){
		$descripcion = $rowfoto["DescripcionEN"];
	}else if ($_SESSION["idiomapagina"] == 3){
		$descripcion = $rowfoto["DescripcionCA"];
	}
	$altura = $_GET['altura'];
	$anchura = $_GET['anchura'];
?>

	<table border="1" width="100%">
		<tr>
			<td align="center" valign="middle">
				<img src="<?php print($_SESSION["rutaservidor"]."includes/inc_mostar_foto.php?IdFoto=".$rowfoto["IdFoto"]);?>" width="<?php print ($anchura);?>" height="<?php print ($altura);?>" alt="<?php print (cambiarAcentos($descripcion));?>" title="<?php print (cambiarAcentos($descripcion));?>" border="0">
			</td>
		</tr>
	</table>

<?php
	mysqli_free_result($qfoto);
?>