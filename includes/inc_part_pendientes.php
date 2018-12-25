<?php
  
	if (isset($_GET['IdCategoria']))
	{
		$categoria=$_GET['IdCategoria'];
		$_SESSION['IdCategoria']=$_GET['IdCategoria'];
	}
	else
	{
		$categoria=$_SESSION['IdCategoria'];
	}	
    
	$query="select * from liga where Aplazado is not null and IdCategoria=".$categoria." order by IdLiga asc";
	$qpendientes=mysqli_query ($link, $query);

	//Obtener el numero de filas devuelto
	$totalpartidospendientes=mysqli_num_rows($qpendientes);
	
	if ($totalpartidospendientes > 0)
	{
?>
		<h3 class="text-center"><?= strtoupper(_PARTIDOSPENDIENTES) ?></h3>
		
		<div class="row">
            <div class="col-2">
                &nbsp;
            </div>
            <div class="col-8">
                <table class="table table-bordered">
                	<thead class="thead-dark">
						<tr>
							<th><?= _PARTPENJORNADA ?></th>
							<th><?= _PARTPENFECHA ?></th>
							<th><?= _PARTPENPARTIDO ?></th>
							<th><?= _PARTPENCAUSA ?></th>
						</tr>
					</thead>
<?php 
							while($partidospendientes=mysqli_fetch_array($qpendientes, MYSQLI_BOTH))
							{
								$fecha_larga=explode('-',$partidospendientes["Fecha"]);
								$dia=$fecha_larga[0];
								$mes_entero=$fecha_larga[1];
								$any=$fecha_larga[2];
							
								//Llamamos a la traducción del mes
								$mes=mesAny($mes_entero);
							
								$fecha=$dia."-".$mes."-".$any;
							
								//Traducción del nombre de los equipos
								$Equipo1=buscaEquipo($partidospendientes["Equipo1"],$link);
								$SubCategoriaLocal=$partidospendientes["SubCategoriaLocal"];
								$Equipo2=buscaEquipo($partidospendientes["Equipo2"],$link);
								$SubCategoriaVisitante=$partidospendientes["SubCategoriaVisitante"];
							
							
								if ($partidospendientes["Aplazado"]==1)
								{
									$causa=_APLAZADO;
								}
								else if ($partidospendientes["Aplazado"]==2)
								{
									$causa=_SUSPENDIDO;
								}
?>
							<tr>
								<td class="text-center"><?= $partidospendientes["Jornada"].superindice($partidospendientes["Jornada"]) ?></td>
								<td><?= $fecha ?></td>
								<td><?= $Equipo1." '".$SubCategoriaLocal."' - ".$Equipo2." '".$SubCategoriaVisitante."'" ?></td>
								<td><?= $causa ?></td>
							</tr>
<?php 
							}	
?>
                </table>
            </div>
            <div class="col-2">
                &nbsp;
            </div>
       </div>
<?php 
	}
	mysqli_free_result($qpendientes);
?>
