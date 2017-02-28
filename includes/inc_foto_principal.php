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
		$idgaleria=$_GET['IdGaleria'];
	
		if ($idfoto<>0)
		{
			$query="select * from fotos_historia where IdFoto=".$idfoto." and IdGaleria=".$idgaleria." order by Orden asc";
		}
		else
		{
			$query="select * from fotos_historia where IdGaleria=".$idgaleria." order by Orden asc";
		}	  
 
		$qfoto=mysqli_query ($link, $query);
		$rowfoto=mysqli_fetch_array($qfoto);
		
		$descripcion = "";
		if ($_SESSION["idiomapagina"] == 1){
			$descripcion = $rowfoto["DescripcionES"];
		}else if ($_SESSION["idiomapagina"] == 2){
			$descripcion = $rowfoto["DescripcionEN"];
		}else if ($_SESSION["idiomapagina"] == 3){
			$descripcion = $rowfoto["DescripcionCA"];
		}

?>
<table class="tabla_sin_borde w100" align="center">
	<tr>
		<td class="tabla_sin_borde" align="center">
				<img src="<?php print($_SESSION["rutaservidor"]."includes/inc_mostrar_foto.php?IdFoto=".$rowfoto["IdFoto"])?>" width="540" heigh="400" alt="<?php print(cambiarAcentos(_AMPLIARFOTO));?>" title="<?php print(cambiarAcentos(_AMPLIARFOTO));?>" border="0">
		</td>
	</tr>
	<tr>	
		<td class="tabla_sin_borde" align="center">
				<?php print (cambiarAcentos($descripcion));?>
		</td>
		<input type="hidden" name="IdFoto" id="IdFoto" value="<?php print ($rowfoto["IdFoto"]);?>">
	</tr>
</table>

<?php
	mysqli_free_result($qfoto);
?>