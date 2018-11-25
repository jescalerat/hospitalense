<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    require_once("conexiones.php");
    
	if (isset($_GET['IdCategoria']))
	{
		$categoria=$_GET['IdCategoria'];
		$_SESSION['IdCategoria']=$_GET['IdCategoria'];
	}
	else
	{
		$categoria=$_SESSION['IdCategoria'];
	}
  
	if(isset($_GET['Jornada']))
	{
		$jornada=$_GET['Jornada'];
	}
	else
	{
		$query="select max(Jornada) as Jornada from liga where ResultEquipo1 is not null and ResultEquipo2 is not null and IdCategoria=".$categoria;
		$q=mysqli_query ($link, $query);
		$rowjornada=mysqli_fetch_array($q);

		$jornada=$rowjornada["Jornada"];
	  
		if ($jornada==null)
		{
			$jornada=1;
		}
		mysqli_free_result($q);
	}

	$_SESSION['jornadasessionresult']=$jornada;
	
	$query="Select * from parametros where IdCategoria=".$categoria;
	$qparametros=mysqli_query ($link, $query);
	$rowparametros=mysqli_fetch_array($qparametros);
	
	$totaljornadas=$rowparametros["TotalJornadas"];

	$tipo=1;
	if (!isset($_GET["recarga"]))
	{
		include("inc_jornada_cabecera.php");
	}

?>	
	<div id="cargando_resultados">
<?php		
	print ("<center>".$jornada.superindice($jornada)." "._JORNADA."</center>");

	//Query
	$query="Select * from liga where Jornada=".$jornada." and IdCategoria=".$categoria." order by IdLiga";
	$qliga=mysqli_query ($link, $query);

	//Query para obtener la fecha
	$query="select Fecha,count(Fecha) as Contador from liga where Jornada=".$jornada." and IdCategoria=".$categoria." and DiaSemana=7 group by Fecha order by count(Fecha) desc";
	$q_fecha=mysqli_query ($link, $query);
	$rowfecha=mysqli_fetch_array($q_fecha);

	if (mysqli_num_rows($q_fecha) == 0)
	{
		//Query para obtener la fecha cuando juegan todos los partidos en sábado
		$query="select max(Fecha) as Fecha from liga where Jornada=".$jornada." and IdCategoria=".$categoria." and DiaSemana=6";
		$q_fecha=mysqli_query ($link, $query);
		$rowfecha=mysqli_fetch_array($q_fecha);
	}

	$fecha_larga=explode('-',$rowfecha["Fecha"]);
	$dia=$fecha_larga[0];
	$mes_entero=$fecha_larga[1];
	$any=$fecha_larga[2];

	//Llamamos a la traducción del mes
	$mes=mesAny($mes_entero);

	$fecha=$dia."-".$mes."-".$any;
?>
   	<table class="tabla_sin_borde w90">
   		<tr>
			<th class="w20"><?= cambiarAcentos(_INCIDENCIAS) ?></th>
       		<th colspan="3"><center><?= $fecha ?></center></th>
       	</tr>
<?php 
   	    //Mostrar los valores de la base de datos
		while($liga=mysqli_fetch_array($qliga, MYSQLI_BOTH))
       	{
            $Equipo1=$liga["Equipo1"];
            $SubCategoriaEquipo1=$liga["SubCategoriaLocal"];
            $Equipo2=$liga["Equipo2"];
            $SubCategoriaEquipo2=$liga["SubCategoriaVisitante"];
                
            //Query para mostrar los nombres correctos de los equipos a partir
            //de sus ids
            $query="Select * from equipos where IdEquipo=".$Equipo1."";
            $qequipo1=mysqli_query ($link, $query);
			$rowequipo1=mysqli_fetch_array($qequipo1);

            $query="Select * from equipos where IdEquipo=".$Equipo2."";
            $qequipo2=mysqli_query ($link, $query);
			$rowequipo2=mysqli_fetch_array($qequipo2);

			//Llamamos a la traducción del dia de la semana
			$diasemana=diaSemana($liga["DiaSemana"]);
			$incidencias=$liga["Hora"].":".$liga["Minutos"].", ".$diasemana;
						
			$descansa = false;
			$query="Select * from comentarios where IdLiga=".$liga["IdLiga"];
			$qcomentarios=mysqli_query ($link, $query);
			$rowcomentarios=mysqli_fetch_array($qcomentarios);
			//Obtener el numero de filas devuelto
			$filascomentarios=mysqli_num_rows($qcomentarios);
			if ($liga["Equipo1"]==9999 || $liga["Equipo2"]==9999 || $liga["Campo"]==9999)
			{
				if ($filascomentarios==0)
				{
					$descansa = true;
				}
			}

			if (!$descansa)
			{
?>				
				<tr>
					<td><?= $incidencias ?></td>	
					<td class="w25"><?= cambiarAcentos($rowequipo1["NombreEquipo"])." '".$SubCategoriaEquipo1."'" ?></td>
<?php 					
					if ($liga["Aplazado"]==1)
					{
?>
						<td class="w10"><center><a href="javascript:llamada_prototype('paginas/goleadores.php?identificador=<?= $liga["IdLiga"] ?>&IdCategoria=<?= $categoria ?>','principal')" class="resultados"><?= _APLAZADO ?></center></td>
<?php 						
					}
					else if ($liga["Aplazado"]==2)
					{
?>						
						<td class="w10"><center><a href="javascript:llamada_prototype('paginas/goleadores.php?identificador=<?= $liga["IdLiga"] ?>&IdCategoria=<?= $categoria ?>','principal')" class="resultados"><?= _SUSPENDIDO ?></center></td>
<?php 						
					}
					else if (strcmp($liga["ResultEquipo1"],"")==0)
					{
?>
						<td class="w10"><center><a href="javascript:llamada_prototype('paginas/goleadores.php?identificador=<?= $liga["IdLiga"] ?>&IdCategoria=<?= $categoria ?>','principal')" class="resultados">+info</center></td>
<?php 						
					}
					else
					{
?>						
						<td class="w10"><center><a href="javascript:llamada_prototype('paginas/goleadores.php?identificador=<?= $liga["IdLiga"] ?>&IdCategoria=<?= $categoria ?>','principal')" class="resultados"><?= $liga["ResultEquipo1"]."-".$liga["ResultEquipo2"] ?></a></center></td>
<?php 						
					}
?>					
					<td class="w25"><?= cambiarAcentos($rowequipo2["NombreEquipo"])." '".$SubCategoriaEquipo2."'" ?></td>
				</tr>
<?php 					
			}
		}
?>
		<tr>
			<td class="tabla_sin_borde" colspan="4">
				<table align="center" class="tabla_sin_borde w50">
					<tr>
<?php 					
						$jornadaanterior = $jornada-1;
						if ($jornadaanterior == 0)
						{
?>
							<td class="tabla_sin_borde w40">&nbsp;</td>
<?php 							
						}
						else
						{
?>
							<td class="tabla_sin_borde w40"><a href="javascript:llamada_prototype('includes/inc_resultados.php?Jornada=<?= $jornadaanterior ?>&IdCategoria=<?= $categoria ?>&recarga=1','cargando_resultados')" class="resultados"><?= cambiarAcentos(_JORNADAANTERIOR) ?></a></td>
<?php 							
						}
						if ($rowparametros["IdaVuelta"] == 1)
						{
							if ($jornada > ($totaljornadas/2))
							{
								$jornadaida=$jornada-($totaljornadas/2);
?>								
									<td class="tabla_sin_borde"><center><a href="javascript:llamada_prototype('includes/inc_resultados.php?Jornada=<?= $jornadaida ?>&IdCategoria=<?= $categoria ?>&recarga=1','cargando_resultados')" class="resultados"><?= _IDA ?></a></center></td>
<?php 									
							}
							else
							{
								$jornadavuelta=$jornada+($totaljornadas/2);
?>								
									<td class="tabla_sin_borde"><center><a href="javascript:llamada_prototype('includes/inc_resultados.php?Jornada=<?= $jornadavuelta ?>&IdCategoria=<?= $categoria ?>&recarga=1','cargando_resultados')" class="resultados"><?= _VUELTA ?></a></center></td>
<?php 									
							}
						}
						$jornadasiguiente = $jornada+1;
						if ($jornadasiguiente > $totaljornadas)
						{
?>							
							<td class="tabla_sin_borde w40">&nbsp;</td>
<?php 							
						}
						else
						{
?> 						
							<td class="tabla_sin_borde w40"><a href="javascript:llamada_prototype('includes/inc_resultados.php?Jornada=<?= $jornadasiguiente ?>&IdCategoria=<?= $categoria ?>&recarga=1','cargando_resultados')" class="resultados"><?= cambiarAcentos(_JORNADASIGUIENTE) ?></a></td>
<?php 							
						}
?>
					</tr>						
				</table>
			</td>
		</tr>
	</table>	

<?php 	
	mysqli_free_result($qliga);
	mysqli_free_result($qparametros);
	mysqli_free_result($q_fecha);
	mysqli_free_result($qequipo1);
	mysqli_free_result($qequipo2);
	mysqli_free_result($qcomentarios);
	
?>
</div>
