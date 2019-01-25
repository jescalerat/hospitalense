<?php
    $pagina="";
    if (isset($_GET['paginacion']))
    {
        $pagina=$_GET['paginacion'];
        $_SESSION['paginacion']=$_GET['paginacion'];
    }
    else if (isset($_SESSION['paginacion']))
    {
        $pagina=$_SESSION['paginacion'];
    }	
  
    $poblacion="";
    if (isset($_GET['idpoblacion']))
    {
        $poblacion=$_GET['idpoblacion'];
        $_SESSION['idpoblacion']=$_GET['idpoblacion'];
    }
    else if (isset($_SESSION['idpoblacion']))
    {
        $poblacion=$_SESSION['idpoblacion'];
    }	
  
    $nombreabuscar="";
    if (isset($_GET['nombrebuscar']))
    {
        $nombreabuscar=$_GET['nombrebuscar'];
        $_SESSION['nombrebuscar']=$_GET['nombrebuscar'];
    }
    else if (isset($_SESSION['nombrebuscar']))
    {
        $nombreabuscar=$_SESSION['nombrebuscar'];
    }	
 	
    if (isset($_GET['identificador']))
    {
        $id=$_GET['identificador'];
        $_SESSION['equipo']=$_GET['identificador'];
    }
    else if (isset($_GET['equipo']))
    {
        $id=$_GET['equipo'];
        $_SESSION['equipo']=$_GET['equipo'];
    }
    else
    {
        $id=$_SESSION['equipo'];
    }	

    $query="select * from equipos where IdEquipo=".$id;
    $qequipo=mysqli_query ($link, $query);
    $rowequipo=mysqli_fetch_array($qequipo);

    $idEquipo = $rowequipo["IdEquipo"];
    
    //Comprobar que existan los escudos
    $escudo_equipo=$rowequipo["Escudo"];
    //$foto_archivo=$_SESSION["rutaservidor"]."imagenes/escudos/".$escudo_equipo;
    $archivo=$_SERVER['DOCUMENT_ROOT']."/imagenes/escudos/".$escudo_equipo;

    if($_SESSION['idiomapagina']==1)
    {
        $nodisponible="imagenes/no-disponible.gif";
	}
	else if ($_SESSION['idiomapagina']==2)
	{
		$nodisponible="imagenes/no-disponible-en.gif";
	}

	//if ((file_exists($archivo)||buscaEscudo($foto_archivo))&&strcmp($escudo_equipo,"")!=0)
	if ((file_exists($archivo)||buscaEscudo($archivo))&&strcmp($escudo_equipo,"")!=0)
    {
        $escudo_equipo=$archivo;
	}
	else
	{
		$escudo_equipo=$nodisponible;
	}
	
    //Cambiar el id que busco por el nombre de la poblacion
	$query="select * from poblaciones where IdPoblacion = ".$rowequipo["Poblacion"];
	$qpoblacion=mysqli_query ($link, $query);
	$rowpoblacion=mysqli_fetch_array($qpoblacion);
	
?>	
	<table class="table table-bordered">
		<thead class="thead-dark">
			<tr>
				<th class="text-center" width="30%"><img src="<?= $escudo_equipo ?>"/></th>
				<td class="text-center"><h2><?= cambiarAcentos(mb_strtoupper($rowequipo["NombreCompleto"])) ?></h2></td>
			</tr>
			<tr>
				<th class="align-middle"><?= cambiarAcentos(_CAMPOOTROSEQUIPOS) ?></th>
				<td>
<?php 
                    require_once("inc_mostrar_campos_equipos.php");
?>					
				</td>
			</tr>
<?php 
            if ($rowequipo["Web"] != null)
            {
?>				
				<tr>
					<th class="align-middle"><?= cambiarAcentos(_WEB) ?></th>
					<td><a class="list-group-item list-group-item-action list-group-item-light" href="http://<?= $rowequipo["Web"] ?>" target="_blank"><?= cambiarAcentos($rowequipo["Web"]) ?></a></td>
				</tr>
<?php 
            }
?>							
				
			<tr>
				<th><?= cambiarAcentos(_DIRECCIONLOCALSOCIAL) ?></th>
				<td><?= cambiarAcentos($rowequipo["Direccion"]) ?></td>
			</tr>
			<tr>
				<th><?= cambiarAcentos(_POBLACIONLOCALSOCIAL) ?></th>
				<td><?= cambiarAcentos($rowpoblacion["Poblacion"]) ?></td>
			</tr>
			<tr>
				<th><?= cambiarAcentos(_CAMISETA) ?></th>
				<td><?= cambiarAcentos($rowequipo["Camiseta"]) ?></td>
			</tr>
			<tr>
				<th><?= cambiarAcentos(_PANTALON) ?></th>
				<td><?= cambiarAcentos($rowequipo["Pantalon"]) ?></td>
			</tr>
			<tr>
				<th><?= cambiarAcentos(_TELEFONO) ?></th>
				<td><?= cambiarAcentos($rowequipo["Telefono"]) ?></td>
			</tr>
		</thead>
	</table>
<?php
    mysqli_free_result($qequipo);
    mysqli_free_result($qpoblacion);

	$criterios="?paginacion=".$pagina;
	if ($poblacion)
	{
		$criterios.="&poblacion=".$poblacion;
	}
	if ($nombreabuscar)
	{
		$criterios.="&nombrebuscar=".elimina_acentos($nombreabuscar);
	}
	//print ("<center><a href=javascript:llamada_prototype('paginas/equipos.php".$criterios."','principal')>"._VOLVEREQUIPOS."</a></center>");
	//print ("<center><a href=javascript:llamada_prototype('paginas/equipos.php','principal')>"._VOLVEREQUIPOS."</a></center>");
?>
	<p class="text-center"><a class="btn btn-default btn-block" href="javascript:llamada_prototype('paginas/equipos.php','principal')"><?= _VOLVEREQUIPOS ?></a></p>
