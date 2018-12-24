<?php
	$idCategoria = $_GET['IdCategoria'];
	//Query
	$query="select * from categoria where IdCategoria = ".$idCategoria;
	$qcategoria=mysqli_query ($link, $query);
	$rowcategoria=mysqli_fetch_array($qcategoria);
	
?>
<h1 class="text-center"><?= cambiarAcentos(strtoupper($rowcategoria["Categoria"]))?></h1>

<table class="table">
  <tr>
    <td class="text-center">
		<?php
			if ($rowcategoria["Foto"] != ""){
		?>
				<img src="includes/inc_mostrar_foto.php?IdCategoria=<?= $idCategoria?>" height="300" width="500"/>
		<?php
			}else{
		?>
			&nbsp;
		<?php
			}
		?>
	</td>
  </tr>
</table>


</br></br></br></br>

<?php
	mysqli_free_result($qcategoria);
	
	//Query
	$query="select * from jugadores where IdCategoria=".$idCategoria." and Entrenador=1 order by Nombre";
	$qentrenadores=mysqli_query ($link, $query);
	
	//Obtener el numero de filas devuelto
	$filasentrenadores=mysqli_num_rows($qentrenadores);
	
	if ($filasentrenadores > 0){
?>

<h2 class="text-center"><?= cambiarAcentos(strtoupper(_PLANTILLAENTRENADORES))?></h2>

<?php
	}
?>

<table class="table">
<?php
	//Mostrar los valores de la base de datos
	while($entrenadores=mysqli_fetch_array($qentrenadores, MYSQLI_BOTH))
	{
?>
	  <tr>
		<td class="text-center">
			<?php
				if ($entrenadores["Foto"] != ""){
			?>
					<img src="includes/inc_mostrar_foto.php?IdJugador="<?= $entrenadores["IdJugador"] ?>" height="150" width="100"/>
			<?php
				}else{
			?>
				&nbsp;
			<?php
				}
			?>
		</td>	
		<td ><?= cambiarAcentos($entrenadores["Nombre"]." ".$entrenadores["Apellido1"]." ".$entrenadores["Apellido2"])?></td>
	  </tr>
<?php
	}
	mysqli_free_result($qentrenadores);
?>
</table>

</br></br></br></br>

<?php
	//Query
	$query="select * from jugadores where IdCategoria=".$idCategoria." and Entrenador=0 order by Nombre";
	$qjugadores=mysqli_query ($link, $query);
	
	//Obtener el numero de filas devuelto
	$filasjugadores=mysqli_num_rows($qjugadores);
	
	if ($filasjugadores > 0){
?>

<h2 class="text-center"><?= cambiarAcentos(strtoupper(_PLANTILLAJUGADORES))?></h2>

<?php
	}
?>

<table class="table">
<?php
	//Mostrar los valores de la base de datos
	while($jugadores=mysqli_fetch_array($qjugadores, MYSQLI_BOTH))
	{
?>
	  <tr>
		<td class="text-center">
			<?php
				if ($jugadores["Foto"] != ""){
			?>
					<img src="includes/inc_mostrar_foto.php?IdJugador="<?= $jugadores["IdJugador"] ?>" height="150" width="100"/>
			<?php
				}else{
			?>
				&nbsp;
			<?php
				}
			?>
		</td>
		<td><?= cambiarAcentos($jugadores["Nombre"]." ".$jugadores["Apellido1"]." ".$jugadores["Apellido2"])?></td>
	  </tr>
<?php
	}
	mysqli_free_result($qjugadores);
?>
</table>