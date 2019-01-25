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

	//Buscar todos los partidos jugados por el equipo. Toda la clasificaci�n
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
?>
		<h2 class="text-center"><?= _PARTIDOSGANADOS." ".$nequipo." '".$SubCategoria."'" ?></h2>        
<?php 
    }
    else if ($_GET["tipo"]==0)
    {
?>
        <h2 class="text-center"><?= _PARTIDOSEMPATADOS." ".$nequipo." '".$SubCategoria."'" ?></h2>
<?php 
    }
    else if ($_GET["tipo"]==2)
    {
?>
		<h2 class="text-center"><?= _PARTIDOSPERDIDOS." ".$nequipo." '".$SubCategoria."'" ?></h2>
<?php 
    } 
?>

	<table class="table table-bordered">
		<thead class="thead-dark">
	   		<tr class="d-flex">
	   			<th class="col-1 text-center"><?= cambiarAcentos(_JORNADA) ?></th>
	   			<th class="col-2 text-center"><?= cambiarAcentos(_FECHAOTROSEQUIPOS) ?></th>
	   			<th class="col-4 text-center"><?= cambiarAcentos(_LOCAL) ?></th>
	   			<th class="col-1 text-center"><?= cambiarAcentos(_RESULTADO) ?></th>
	   			<th class="col-4 text-center"><?= cambiarAcentos(_VISITANTE) ?></th>
   			</tr>  
   		</thead>
<?php 

            //Mostrar los valores de la base de datos
            while($equipo=mysqli_fetch_array($qequipo, MYSQLI_BOTH))
            {
                if ($equipo["Equipo1"]==$_GET["equipo"])
                {
                    $resultado_equipo1="ResultEquipo1";
                    $resultado_equipo2="ResultEquipo2";
                    
                    //Buscar el nombre del equipo con el ID
                    $nombre_equipo1=mb_strtoupper(buscaEquipo($equipo["Equipo1"],$link)." '".$equipo["SubCategoriaLocal"]."'");
                    
                    //Buscar el nombre del equipo con el ID
                    $nombre_equipo2=buscaEquipo($equipo["Equipo2"],$link)." '".$equipo["SubCategoriaVisitante"]."'";
                }
                else
                {
                    $resultado_equipo1="ResultEquipo2";
                    $resultado_equipo2="ResultEquipo1";
                    
                    //Buscar el nombre del equipo con el ID
                    $nombre_equipo1=buscaEquipo($equipo["Equipo1"],$link)." '".$equipo["SubCategoriaLocal"]."'";
                    
                    //Buscar el nombre del equipo con el ID
                    $nombre_equipo2=mb_strtoupper(buscaEquipo($equipo["Equipo2"],$link)." '".$equipo["SubCategoriaVisitante"]."'");
                }
                
                $jornadaMostrar=$equipo["Jornada"].superindice($equipo["Jornada"]);
                $fechaMostrar=devolverFecha($equipo["Fecha"]);
                $localMostrar=$nombre_equipo1;
                $resultadoMosrar=$equipo["ResultEquipo1"]."-".$equipo["ResultEquipo2"];
                $visitanteMostrar=$nombre_equipo2;
                
                if ($_GET["tipo"]==1)
                {
                    if ($equipo[$resultado_equipo1]>$equipo[$resultado_equipo2])
                    {
                        require("inc_estadisticas_partidos.php");
                    }
                }
                if ($_GET["tipo"]==0)
                {
                    if ($equipo[$resultado_equipo1] != null &&
                        $equipo[$resultado_equipo1]==$equipo[$resultado_equipo2])
                    {
                        require("inc_estadisticas_partidos.php");
                    }
                }
                if ($_GET["tipo"]==2)
                {
                    if ($equipo[$resultado_equipo1]<$equipo[$resultado_equipo2])
                    {
                        require("inc_estadisticas_partidos.php");
                    }
                }
            }
?>   		
	</table>		
	
<?php 
    $jornada=0;
    if (isset($_GET['Jornada']))
    {
        $jornada=$_GET['Jornada'];
    }
?>
<p class="text-center"><a class="btn btn-default btn-block" href="javascript:llamada_prototype('paginas/resultados.php?tipo_clasificacion=<?= $_GET["tipoclasificacion"] ?>&IdCategoria=<?= $categoria ?>&jornadaClas=<?= $jornada ?>','principal')"><?= cambiarAcentos(_VOLVERCLASIFICACION) ?></a></p>