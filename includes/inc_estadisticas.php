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
    $IdEquipo = $_GET["equipo"];
    $SubCategoria = $_GET['SubCategoria'];
  
    if (isset($_GET['Jornada']))
    {
        $jornada=$_GET['Jornada'];
    }

	//Query para saber el total de equipos de la division
    $query="Select * from parametros where IdCategoria=".$categoria;
    $qparametros=mysqli_query ($link, $query);
    $rowparametros=mysqli_fetch_array($qparametros);
    
    $totaljornadas=$rowparametros["TotalJornadas"];
    if ($jornada!=0)
    {
        $totaljornadas=$jornada;
    }

	//Buscar todos los partidos jugados por el equipo. Toda la clasificación
	if ($_GET["tipoclasificacion"]==0)
	{
		$query="Select * from liga where ((Equipo1=".$IdEquipo." and SubCategoriaLocal='".$SubCategoria."') or (Equipo2=".$IdEquipo." and SubCategoriaVisitante='".$SubCategoria."')) and Jornada<=".$totaljornadas." and IdCategoria=".$categoria;
	}
	//Buscar todos los partidos jugados por el equipo. Partidos en casa
	else if ($_GET["tipoclasificacion"]==1)
	{
		$query="Select * from liga where Equipo1=".$IdEquipo." and SubCategoriaLocal='".$SubCategoria."' and Jornada<=".$totaljornadas." and IdCategoria=".$categoria;
	}
	//Buscar todos los partidos jugados por el equipo. Partidos fuera
	else if ($_GET["tipoclasificacion"]==2)
	{
		$query="Select * from liga where Equipo2=".$IdEquipo." and SubCategoriaVisitante='".$SubCategoria."' and Jornada<=".$totaljornadas." and IdCategoria=".$categoria;
	}
	//Buscar todos los partidos jugados por el equipo. Partidos primera vuelta y segunda vuelta
	else if ($_GET["tipoclasificacion"]==3 || $_GET["tipoclasificacion"]==4)
	{
		//Partidos de la primera vuelta
        if ($_GET["tipoclasificacion"]==3)
        {
            $jornadaInicial = 1;
            $jornadaFinal = ($totaljornadas/2);
        }
		//Partidos de la segunda vuelta 
		else
		{
            $jornadaInicial = ($totaljornadas/2)+1;
            $jornadaFinal = $totaljornadas;
        }
        $query="Select * from liga where ((Equipo1=".$IdEquipo." and SubCategoriaLocal='".$SubCategoria."') or (Equipo2=".$IdEquipo." and SubCategoriaVisitante='".$SubCategoria."')) and Jornada>=".$jornadaInicial." and Jornada<=".$jornadaFinal." and IdCategoria=".$categoria;	
    }
	$qequipo=mysqli_query ($link, $query);

	$nequipo = buscaEquipo($IdEquipo,$link);

    if ($_GET["tipo"]==1)
    {
        print ("<H2><center>"._PARTIDOSGANADOS." ".$nequipo." '".$SubCategoria."'</H2>");
    }
    else if ($_GET["tipo"]==0)
    {
        print ("<H2><center>"._PARTIDOSEMPATADOS." ".$nequipo." '".$SubCategoria."'</H2>");
    }
    else if ($_GET["tipo"]==2)
    {
        print ("<H2><center>"._PARTIDOSPERDIDOS." ".$nequipo." '".$SubCategoria."'</H2>");
    }    
		
	print ("<table border=1 width=100%>");
		print ("<tr>");
			print ("<td><center>"._JORNADA."</center>");
			print ("<td width=25%><center>"._FECHAOTROSEQUIPOS."</center>");
			print ("<td width=30%><center>"._LOCAL."</center>");
			print ("<td width=10%><center>"._RESULTADO."</center>");
			print ("<td width=30%><center>"._VISITANTE."</center>");
		//Mostrar los valores de la base de datos
        while($equipo=mysqli_fetch_array($qequipo, MYSQLI_BOTH))
		{
			if ($qequipo["Equipo1"]==$_GET["equipo"])
			{
				$resultado_equipo1="ResultEquipo1";
				$resultado_equipo2="ResultEquipo2";

				//Buscar el nombre del equipo con el ID
				$nombre_equipo1=buscaEquipo($IdEquipo,$link)." '".$SubCategoria."'";

				//Buscar el nombre del equipo con el ID
				$nombre_equipo2=buscaEquipo($qequipo["Equipo2"],$link)." '".$SubCategoria."'";
            }
			else
			{
				$resultado_equipo1="ResultEquipo2";
				$resultado_equipo2="ResultEquipo1";

				//Buscar el nombre del equipo con el ID
				$query="Select * from equipos where IdEquipo=".mysql_result($qequipo,$x,"Equipo1");
				$qequipo1=mysql_query ($query,$link);	
				$nombre_equipo1=cambiarAcentos(mysql_result($qequipo1,0,"NombreEquipo"))." '".$SubCategoria."'";

				//Buscar el nombre del equipo con el ID
				$query="Select * from equipos where IdEquipo=".mysql_result($qequipo,$x,"Equipo2");
				$qequipo2=mysql_query ($query,$link);	
				$nombre_equipo2=cambiarAcentos(strtoupper(mysql_result($qequipo2,0,"NombreEquipo")))." '".$SubCategoria."'";
			}

			if ($_GET["tipo"]==1)
			{
				if (mysql_result($qequipo,$x,$resultado_equipo1)>mysql_result($qequipo,$x,$resultado_equipo2))
				{
					print("<tr>");
					print ("<td><center>".mysql_result($qequipo,$x,"Jornada").superindice(mysql_result($qequipo,$x,"Jornada")));
					$dia=devolverDia(mysql_result($qequipo,$x,"Fecha"));
					$mes=mesAny(devolverMes(mysql_result($qequipo,$x,"Fecha")));
					$any=devolverAny(mysql_result($qequipo,$x,"Fecha"));
					$fecha=$dia."-".$mes."-".$any;
					print ("<td><center>".cambiarAcentos($fecha)."</center>");
					print ("<td><center>".$nombre_equipo1."</center>");
					print ("<td><center>".mysql_result($qequipo,$x,"ResultEquipo1")."-".mysql_result($qequipo,$x,"ResultEquipo2")."</center>");
					print ("<td><center>".$nombre_equipo2."</center>");
				}
			}
			else if ($_GET["tipo"]==0)
			{
				if (mysql_result($qequipo,$x,$resultado_equipo1)==mysql_result($qequipo,$x,$resultado_equipo2)&&mysql_result($qequipo,$x,$resultado_equipo1) != null)
				{
					print("<tr>");
					print ("<td><center>".mysql_result($qequipo,$x,"Jornada").superindice(mysql_result($qequipo,$x,"Jornada")));
					$dia=devolverDia(mysql_result($qequipo,$x,"Fecha"));
					$mes=mesAny(devolverMes(mysql_result($qequipo,$x,"Fecha")));
					$any=devolverAny(mysql_result($qequipo,$x,"Fecha"));
					$fecha=$dia."-".$mes."-".$any;
					print ("<td><center>".cambiarAcentos($fecha)."</center>");
					print ("<td><center>".$nombre_equipo1."</center>");
					print ("<td><center>".mysql_result($qequipo,$x,"ResultEquipo1")."-".mysql_result($qequipo,$x,"ResultEquipo2")."</center>");
					print ("<td><center>".$nombre_equipo2."</center>");
				}
			}
			else if ($_GET["tipo"]==2)
			{
				if (mysql_result($qequipo,$x,$resultado_equipo1)<mysql_result($qequipo,$x,$resultado_equipo2))
				{
					print("<tr>");
					print ("<td><center>".mysql_result($qequipo,$x,"Jornada").superindice(mysql_result($qequipo,$x,"Jornada")));
					$dia=devolverDia(mysql_result($qequipo,$x,"Fecha"));
					$mes=mesAny(devolverMes(mysql_result($qequipo,$x,"Fecha")));
					$any=devolverAny(mysql_result($qequipo,$x,"Fecha"));
					$fecha=$dia."-".$mes."-".$any;
					print ("<td><center>".cambiarAcentos($fecha)."</center>");
					print ("<td><center>".$nombre_equipo1."</center>");
					print ("<td><center>".mysql_result($qequipo,$x,"ResultEquipo1")."-".mysql_result($qequipo,$x,"ResultEquipo2")."</center>");
					print ("<td><center>".$nombre_equipo2."</center>");
				}
			}
		}
	print ("</table>");
	$jornada=0;
	if (isset($_GET['Jornada']))
  {
  	$jornada=$_GET['Jornada'];
  }
	print ("<center><a href=javascript:llamada_prototype('paginas/resultados.php?tipo_clasificacion=".$_GET["tipoclasificacion"]."&IdCategoria=".$categoria."&jornadaClas=".$jornada."','principal') class=resultados>".cambiarAcentos(_VOLVERCLASIFICACION)."</a></center>");
?>