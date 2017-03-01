<?php
	require_once($_SESSION["ruta"]."conf/traduccion.php");
	require_once($_SESSION["ruta"]."conf/funciones.php");
	require_once($_SESSION["ruta"]."conf/conexion.php");
	$link=Conectarse();
  
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
		print ("<h1><center>".strtoupper(_PARTIDOSPENDIENTES)."</center></h1>");

		print ("<table border=1 width=80% align=center>");
			print ("<tr>");
				print ("<th width=10%>"._PARTPENJORNADA);
				print ("<th width=30%>"._PARTPENFECHA);
				print ("<th>"._PARTPENPARTIDO);
				print ("<th width=20%>"._PARTPENCAUSA);

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
					$Equipo1=$partidospendientes["Equipo1"];
					$SubCategoriaLocal=$partidospendientes["SubCategoriaLocal"];
					$Equipo2=$partidospendientes["Equipo2"];
					$SubCategoriaVisitante=$partidospendientes["SubCategoriaVisitante"];
						
					//Query para mostrar los nombres correctos de los equipos a partir
					//de sus ids
					$query="Select * from equipos where IdEquipo=".$Equipo1;
					$qequipo1=mysqli_query ($link, $query);
					$rowequipo1=mysqli_fetch_array($qequipo1);

					$query="Select * from equipos where IdEquipo=".$Equipo2;
					$qequipo2=mysqli_query ($link, $query);
					$rowequipo2=mysqli_fetch_array($qequipo2);

					if ($partidospendientes["Aplazado"]==1)
					{
						$causa=_APLAZADO;
					}
					else if ($partidospendientes["Aplazado"]==2)
					{
						$causa=_SUSPENDIDO;
					}

					print ("<tr>");
						print ("<td><center>".$partidospendientes["Jornada"].superindice($partidospendientes["Jornada"])."</center>");
						print ("<td>".$fecha);
						print ("<td>".cambiarAcentos($rowequipo1["NombreEquipo"])." '".$SubCategoriaLocal."' - ".cambiarAcentos($rowequipo2["NombreEquipo"])." '".$SubCategoriaVisitante."'");
						print ("<td>".$causa);
						
					mysqli_free_result($qequipo1);
					mysqli_free_result($qequipo2);
				}
		print ("</table>");
	}
	
	mysqli_free_result($qpendientes);
	
?>
