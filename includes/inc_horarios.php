<center><h1><?= cambiarAcentos(strtoupper(_HORARIOSENTRENO)) ?></h1></center>

<table class="horarios w100">
	<tr>
		<th class="centrar w15"><?= cambiarAcentos(_HORARIOSHORA) ?></th>
		<th class="centrar w17"><?= cambiarAcentos(_LUNES) ?></th>
		<th class="centrar w17"><?= cambiarAcentos(_MARTES) ?></th>
		<th class="centrar w17"><?= cambiarAcentos(_MIERCOLES) ?></th>
		<th class="centrar w17"><?= cambiarAcentos(_JUEVES) ?></th>
		<th class="centrar w17"><?= cambiarAcentos(_VIERNES) ?></th>
	</tr>
<?php
	//Query
	$query="select * from horarios order by Orden";
	$qhorarios=mysqli_query ($link, $query);

	//Mostrar los valores de la base de datos
	while($horarios=mysqli_fetch_array($qhorarios, MYSQLI_BOTH))
	{
?>
		<tr>
			<td class="centrar texto_destacado_negro">
				<?= $horarios["Hora"] ?>
			</td>
			<td class="centrar">
				<?= $horarios["Lunes"] ?>
			</td>
			<td class="centrar">
				<?= $horarios["Martes"] ?>
			</td>
			<td class="centrar">
				<?= $horarios["Miercoles"] ?>
			</td>
			<td class="centrar">
				<?= $horarios["Jueves"] ?>
			</td>
			<td class="centrar">
				<?= $horarios["Viernes"] ?>
			</td>
		</tr>
<?php
	}//while($horarios=mysqli_fetch_array($qhorarios, MYSQLI_BOTH))
	mysqli_free_result($qhorarios);
?>
</table>