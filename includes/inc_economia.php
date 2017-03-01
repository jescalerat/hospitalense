<center><h1><?= cambiarAcentos(mb_strtoupper(_ECONOMIA)) ?></h1></center>

<center><h3><?= cambiarAcentos(mb_strtoupper(_ECONOMIAINGRESOS)) ?></h3></center>

<?php
	//Query
	$query="select * from economia where tipo=1 order by orden";
	$qingresos = mysqli_query ($link, $query);

?>

<table class="economia w100">
  <tr>
    <th class="centrar w70"><?= cambiarAcentos(_ECONOMIACONCEPTO) ?></th>
    <th class="centrar w30"><?= cambiarAcentos(_ECONOMIAIMPORTE) ?></th>
  </tr>
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
		<td class="texto_destacado_negro"><?= cambiarAcentos($conceptoIngreso) ?></td>
		<td class="centrar"><?= $ingresos["Importe"] ?> &euro;</td>
	  </tr>
<?php
	}
	mysqli_free_result($qingresos);
?>	  
</table>

<table class="economia w50" align="right">
  <tr>
    <th class="derecha texto_destacado_negro w40"><?= cambiarAcentos(strtoupper(_ECONOMIATOTAL)) ?>: </th>
    <th class="centrar w60"><?= $totalIngresos ?> &euro;</th>
  </tr>
</table>

</br></br></br></br>

<center><h3><?= cambiarAcentos(strtoupper(_ECONOMIAGASTOS)) ?></h3></center>

<?php
	//Query
	$query="select * from economia where tipo=2 order by orden";
	$qgastos = mysqli_query ($link, $query);
	
?>

<table border="1" class="economia w100">
  <tr>
    <th class="centrar w70"><?print (cambiarAcentos(_ECONOMIACONCEPTO));?></th>
    <th class="centrar w30"><?print (cambiarAcentos(_ECONOMIAIMPORTE));?></th>
  </tr>
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
		<td class="texto_destacado_negro"><?= cambiarAcentos($conceptoGasto) ?></td>
		<td class="centrar"><?= $gastos["Importe"] ?> &euro;</td>
	</tr>
<?php
	}
	mysqli_free_result($qgastos);
?>	
</table>

<table class="economia w50" align="right">
  <tr>
    <th class="derecha texto_destacado_negro w40"><?= cambiarAcentos(strtoupper(_ECONOMIATOTAL)) ?>: </th>
    <th class="centrar w60"><?= $totalGastos ?> &euro;</th>
  </tr>
</table>