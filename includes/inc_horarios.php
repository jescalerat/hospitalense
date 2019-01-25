<h1 class="text-center"><?= cambiarAcentos(strtoupper(_HORARIOSENTRENO)) ?></h1>

<table class="table table-bordered">
	<thead class="thead-dark">
		<tr>
			<th class="text-center"><?= cambiarAcentos(_HORARIOSHORA) ?></th>
			<th class="text-center"><?= cambiarAcentos(_LUNES) ?></th>
			<th class="text-center"><?= cambiarAcentos(_MARTES) ?></th>
			<th class="text-center"><?= cambiarAcentos(_MIERCOLES) ?></th>
			<th class="text-center"><?= cambiarAcentos(_JUEVES) ?></th>
			<th class="text-center"><?= cambiarAcentos(_VIERNES) ?></th>
		</tr>
	</thead>
<?php
	//Query
	$query="select * from horarios order by Orden";
	$qhorarios=mysqli_query ($link, $query);

	//Mostrar los valores de la base de datos
	while($horarios=mysqli_fetch_array($qhorarios, MYSQLI_BOTH))
	{
?>
		<tr>
			<td class="text-center font-weight-bold align-middle">
				<?= $horarios["Hora"] ?>
			</td>
			<td class="text-center">
				<?= $horarios["Lunes"] ?>
			</td>
			<td class="text-center">
				<?= $horarios["Martes"] ?>
			</td>
			<td class="text-center">
				<?= $horarios["Miercoles"] ?>
			</td>
			<td class="text-center">
				<?= $horarios["Jueves"] ?>
			</td>
			<td class="text-center">
				<?= $horarios["Viernes"] ?>
			</td>
		</tr>
<?php
	}//while($horarios=mysqli_fetch_array($qhorarios, MYSQLI_BOTH))
	mysqli_free_result($qhorarios);
?>
</table>