<h1 class="text-center"><?= cambiarAcentos(mb_strtoupper(_ECONOMIA)) ?></h1>

<h3 class="text-center"><?= cambiarAcentos(mb_strtoupper(_ECONOMIAINGRESOS)) ?></h3>

<?php
	//Query
	$query="select * from economia where tipo=1 order by orden";
	$qingresos = mysqli_query ($link, $query);

?>

<table class="table table-bordered">
	<thead class="thead-dark">
		<tr>
		    <th class="text-center"><?= cambiarAcentos(_ECONOMIACONCEPTO) ?></th>
		    <th class="text-center"><?= cambiarAcentos(_ECONOMIAIMPORTE) ?></th>
	  	</tr>
	</thead>
<?php
	//Mostrar los valores de la base de datos
	$totalIngresos = 0;
	while($ingresos=mysqli_fetch_array($qingresos, MYSQLI_BOTH))
	{
		$conceptoIngreso = "";
		if ($_SESSION["idiomapagina"]==1){
			$conceptoIngreso = $ingresos["ConceptoES"];
		} else if ($_SESSION["idiomapagina"]==2){
			$conceptoIngreso = $ingresos["ConceptoEN"];
		} else if ($_SESSION["idiomapagina"]==3){
			$conceptoIngreso = $ingresos["ConceptoCA"];
		} 
		$totalIngresos += $ingresos["Importe"];
?>
	  <tr>
		<td class="font-weight-bold"><?= cambiarAcentos($conceptoIngreso) ?></td>
		<td class="text-center"><?= $ingresos["Importe"] ?> &euro;</td>
	  </tr>
<?php
	}
	mysqli_free_result($qingresos);
?>	  
	<tr>
	    <td colspan="2"></td>
	</tr>
	<tr>
	    <td class="text-right font-weight-bold"><?= cambiarAcentos(strtoupper(_ECONOMIATOTAL)) ?>: </td>
	    <td class="text-center"><?= $totalIngresos ?> &euro;</td>
	</tr>
</table>

</br></br></br></br>

<h3 class="text-center"><?= cambiarAcentos(strtoupper(_ECONOMIAGASTOS)) ?></h3>

<?php
	//Query
	$query="select * from economia where tipo=2 order by orden";
	$qgastos = mysqli_query ($link, $query);
	
?>

<table class="table table-bordered">
	<thead class="thead-dark">
  		<tr>
		    <th class="text-center"><?print (cambiarAcentos(_ECONOMIACONCEPTO));?></th>
		    <th class="text-center"><?print (cambiarAcentos(_ECONOMIAIMPORTE));?></th>
		</tr>
	</thead>
<?php
	//Mostrar los valores de la base de datos
	$totalGastos = 0;
	while($gastos=mysqli_fetch_array($qgastos, MYSQLI_BOTH))
	{
		$conceptoGasto = "";
		if ($_SESSION["idiomapagina"]==1){
			$conceptoGasto = $gastos["ConceptoES"];
		} else if ($_SESSION["idiomapagina"]==2){
			$conceptoGasto = $gastos["ConceptoEN"];
		} else if ($_SESSION["idiomapagina"]==3){
			$conceptoGasto = $gastos["ConceptoCA"];
		} 
		$totalGastos += $gastos["Importe"];
?>  
	<tr>
		<td class="font-weight-bold"><?= cambiarAcentos($conceptoGasto) ?></td>
		<td class="text-center"><?= $gastos["Importe"] ?> &euro;</td>
	</tr>
<?php
	}
	mysqli_free_result($qgastos);
?>	
	<tr>
	    <td colspan="2"></td>
	</tr>
	<tr>
	    <td class="text-right font-weight-bold"><?= cambiarAcentos(strtoupper(_ECONOMIATOTAL)) ?>: </td>
	    <td class="text-center"><?= $totalGastos ?> &euro;</td>
	</tr>
</table>
