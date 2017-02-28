<?php
	//Query
	$query="select * from directiva order by orden";
	$qdirectiva=mysqli_query ($link, $query);

	//Obtener el numero de filas devuelto
	$filasdirectiva=mysqli_num_rows($qdirectiva);
?>
<center><h1><?= cambiarAcentos(strtoupper(_DIRECTIVA)) ?></h1></center>

<?php
	if ($filasdirectiva > 0){
?>
		<table class="w100 directiva">
			
			<?php
				while($directiva=mysqli_fetch_array($qdirectiva, MYSQLI_BOTH))
				{
					$cargo = "";
					if ($_SESSION["idiomapagina"] == 1){
						$cargo = $directiva["CargoES"];
					}else if ($_SESSION["idiomapagina"] == 2){
						$cargo = $directiva["CargoEN"];
					}else if ($_SESSION["idiomapagina"] == 3){
						$cargo = $directiva["CargoCA"];
					}
					$nombreDirectivo = $directiva["Nombre"]." ".$directiva["Apellido1"]." ". $directiva["Apellido2"];
			?>	
					<tr>
						<th colspan="2" class="centrar">
							<?= cambiarAcentos($cargo) ?>
						</th>
					</tr>
					<tr>
						<td class="w20 centrar">
						<?php
							if ($directiva["Foto"] != ""){
						?>
								<img src="includes/inc_mostrar_foto.php?IdDirectiva=<?= $directiva["IdDirectiva"] ?>" height="150" width="100"/>
						<?php
							}else{
						?>
							&nbsp;
						<?php
							}
						?>
						</td>
						<td class="w80">
							<?= cambiarAcentos($nombreDirectivo) ?>
						</td>
					</tr>
			<?php
				} //while($directiva=mysqli_fetch_array($qdirectiva, MYSQLI_BOTH))
			?>					
		</table>
<?php
	} //if ($filasdirectiva > 0){
	
	mysqli_free_result($qdirectiva);
?>