<?php
	session_start();
	if (!isset($link))
	{
	    require_once($_SESSION["ruta"]."conf/conexion.php");
	    $link=Conectarse();
	}
	require_once($_SESSION["ruta"]."conf/funciones.php");
	require_once($_SESSION["ruta"]."conf/traduccion.php");
	
	$idgaleria=$_GET['IdGaleria'];

	//Query
	$query="select * from fotos_historia where IdGaleria=".$idgaleria;
	$query.=" order by Orden asc";

	$q=mysqli_query($link, $query);

	//Obtener el numero de filas devuelto
	$total_registros=mysqli_num_rows($q);
		
	//Paginación
	if (isset($_GET['cursor']) && $_GET['cursor']!=0) {
		$pagina=$_GET['pagina'];
		$inicio = ($pagina - 1);
		$cursor=2-$_GET['cursor'];
	}
	else if (isset($_GET['pagina']) && $_GET['pagina']==0) {
		$inicio = 0; 
		$pagina = 1; 
		$cursor=2-$inicio;
	} 
	else { 
		$pagina=$_GET['pagina'];
		$inicio = ($pagina - 1);
		$cursor=2-$inicio;
	} 
	//Fin paginación
		
	$contador=0;
	while($fotos=mysqli_fetch_array($q))
	{
		//$pasarela[$contador][0]=$fotos["Ruta"]."/".$fotos["Foto"];
		//$pasarela[$contador][0]=$fotos["Imageshack"];
		$pasarela[$contador][0]=$_SESSION["rutaservidor"]."includes/inc_mostrar_foto.php?IdFoto=".$fotos['IdFoto'];
		//$pasarela[$contador][0]=$fotos["MediaFire"];
		$pasarela[$contador][1]=$fotos["IdFoto"];
		$pasarela[$contador][2]=$contador;
		$contador++;
	}
	mysqli_free_result($q);
	
	$contador=0;
	for ($x=$cursor;$x<=5;$x++)
	{
		$mostrar[$x][0]=isset($pasarela[$contador][0]) ? $pasarela[$contador][0] : null;
		$mostrar[$x][1]=isset($pasarela[$contador][1]) ? $pasarela[$contador][1] : null;
		$mostrar[$x][2]=isset($pasarela[$contador][2]) ? $pasarela[$contador][2] : null;
		$contador++;
	}
	
	//$photobucket=$_SESSION["rutaservidor"]."fotos/";
	//$photobucket="http://s807.photobucket.com/albums/yy354/hospitauro/";
	//$photobucket="http://www.badongo.com/es/pic/";
?>

	<table class="w100" align="center">
		<tr>
			<td align="center" class="w10">
				<?php
					if(($pagina - 1) > 0)
					{
				?>
						<a href="#" onclick=cambio_foto("<?= ($pagina - 1) ?>","<?= $mostrar[1][1] ?>",0,"<?= $_SESSION['idiomapagina'] ?>")><img src="<?= $_SESSION["rutaservidor"] ?>imagenes/greybox/prev.gif" name="btnanterior" border="0" id="btnanterior"></a>
				<?php
					}
					else
					{
				?>
						&nbsp;
				<?php
					}
				?>
			</td>
			
			<?php
			for ($x=0;$x<5;$x++)
			{
				if (!isset($mostrar[$x][0]))
				{
			?>
					<td class="w16" align="center">&nbsp;
			<?php
				}
				else
				{
					if ($x==2)
					{
			?>
						<td class="w16" align="center" bgcolor="#99cccc">
			<?php
					}
					else
					{
			?>
						<td class="w16" align="center">
			<?php
					}
			?>
							<a href="#" onclick=cambio_foto("<?= ($mostrar[$x][2]+1) ?>","<?= $mostrar[$x][1] ?>",<?= $mostrar[$x][2] ?>,"<?= $_SESSION['idiomapagina'] ?>")><img src="<?= $mostrar[$x][0] ?>" width="100" height="50" alt="<?= cambiarAcentos(_AMPLIARFOTO) ?>" title="<?= cambiarAcentos(_AMPLIARFOTO) ?>" border="0"></a>
						</td>
			<?php
				}
			}
			?>
				<td align="center" class="w10">
			<?php
				if(($pagina + 1)<=$total_registros)
				{
			?>
					<a href="#" onclick=cambio_foto("<?= ($pagina + 1) ?>","<?= $mostrar[3][1] ?>",0,"<?= $_SESSION['idiomapagina'] ?>")><img src="<?= $_SESSION["rutaservidor"] ?>imagenes/greybox/next.gif" name="btnsiguiente" border="0" id="btnsiguiente"></a>
			<?php
				}
				else
				{
			?>
					&nbsp;
			<?php
				}
			?>
				</td>
		</tr>
	</table>
