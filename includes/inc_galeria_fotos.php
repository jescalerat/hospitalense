<?php
	
	$query="select * from galerias ";
	$query.=" order by Orden asc";
	
	//Query
	$qgalerias=mysqli_query($link, $query);
	
	$x=0;
	while($galeria=mysqli_fetch_array($qgalerias, MYSQLI_BOTH))		
	{
		$parametros="?IdGaleria=".$galeria["IdGaleria"];
		$rutagaleria=$_SESSION["rutaservidor"]."paginas/galeria.php".$parametros;
		
		$query="select * from fotos_historia where IdGaleria=".$galeria["IdGaleria"];
		$query.=" order by Orden asc";

		//Query
		$qfotoprincipal=mysqli_query($link, $query);
		$rowfotoprincipal=mysqli_fetch_array($qfotoprincipal);
		
		$descripcionGaleria = "";
		if ($_SESSION["idiomapagina"] == 1){
			$descripcionGaleria = $galeria["GaleriaES"];
		}else if ($_SESSION["idiomapagina"] == 2){     
			$descripcionGaleria = $galeria["GaleriaEN"];
		}else if ($_SESSION["idiomapagina"] == 3){     
			$descripcionGaleria = $galeria["GaleriaCA"];
		}
		
?>		
	<center>
		<a href="<?php print($rutagaleria);?>" 
			onclick="return GB_showCenter('<?php print(cambiarAcentos(_GALERIA));?>', this.href, 580, 975)"
			title="<?php print(cambiarAcentos(_GALERIA));?>">
			<img id="<?php print($x);?>" src="<?php print($_SESSION["rutaservidor"]."includes/inc_mostar_foto.php?IdFoto=".$rowfotoprincipal["IdFoto"]);?>" alt="<?php print(cambiarAcentos(_GALERIA));?>" title="<?php print(cambiarAcentos(_GALERIA));?>" width="100" heigh="50"/>
			<br>
			<?php print(cambiarAcentos($descripcionGaleria));?>

		</a>
		<br><br>
	</center>
<?php
		$x++;
	}
	mysqli_free_result($qfotoprincipal);
?>