<?php
    if (isset($_GET['identificador']))
    {
        $id=$_GET['identificador'];
        $_SESSION['identificador']=$_GET['identificador'];
    }
    else
    {
        $id=$_SESSION['identificador'];
    }	
  
    if (isset($_GET['IdCategoria']))
    {
        $categoria=$_GET['IdCategoria'];
        $_SESSION['IdCategoria']=$_GET['IdCategoria'];
    }
    else
    {
        $categoria=$_SESSION['IdCategoria'];
    }	

    //Query partido
    $query="Select * from liga where IdLiga=".$id;
    $q=mysqli_query ($link, $query);
    $rowpartido=mysqli_fetch_array($q);
    
    $equipo1=$rowpartido["Equipo1"];
    $SubCategoriaEquipo1=$rowpartido["SubCategoriaLocal"];
    $equipo2=$rowpartido["Equipo2"];
    $SubCategoriaEquipo2=$rowpartido["SubCategoriaVisitante"];
    $gol_eq1=$rowpartido["ResultEquipo1"];
    $gol_eq2=$rowpartido["ResultEquipo2"];
    $hora=$rowpartido["Hora"];
    $minutos=$rowpartido["Minutos"];
    $dia_s=$rowpartido["DiaSemana"];
    $campo=$rowpartido["Campo"];

    $fecha_larga=explode('-',$rowpartido["Fecha"]);
	$dia=$fecha_larga[0];
	$mes_entero=$fecha_larga[1];
	$any=$fecha_larga[2];

	//Llamamos a la traducci�n del mes
	$mes=mesAny($mes_entero);

	$fecha=$dia."-".$mes."-".$any;

	//Query escudo y nombre equipo1
    $query="Select * from equipos where IdEquipo=".$equipo1;
	$q=mysqli_query ($link, $query);
	$rowequipo1=mysqli_fetch_array($q);
	
	$nombre_equipo1=$rowequipo1["NombreEquipo"]." '".$SubCategoriaEquipo1."'";
	$escudo_equipo1=$rowequipo1["Escudo"];

 	//Query para buscar el nombre del campo
    $query="Select * from campos where IdCampo=".$campo;
    $q=mysqli_query ($link, $query);
    $rowcampo=mysqli_fetch_array($q);

    $estadio=$rowcampo["Nombre"];

 	//Query escudo y nombre equipo2
    $query="Select * from equipos where IdEquipo=".$equipo2;
    $q=mysqli_query ($link, $query);
    $rowequipo2=mysqli_fetch_array($q);

	$nombre_equipo2=$rowequipo2["NombreEquipo"]." '".$SubCategoriaEquipo2."'";
	$escudo_equipo2=$rowequipo2["Escudo"];
 
	if (isset($_GET['promo']))
	{
?>	    
		<p class="text-center"><a class="btn btn-default btn-block" href="javascript:llamada_prototype('paginas/promocion.php?Jornada=<?= $_SESSION['jornadapromosessionresult'] ?>&IdCategoria=<?= $categoria ?>','principal')"><?= _VOLVERPROMOCION ?></a></p>
<?php 		
	}
	else
	{
?>
		<p class="text-center"><a class="btn btn-default btn-block" href="javascript:llamada_prototype('paginas/resultados.php?Jornada=<?= $_SESSION['jornadasessionresult'] ?>&IdCategoria=<?= $categoria ?>','principal')"><?= _VOLVERRESULTADOS ?></a></p>
<?php 
	}

	//Comprobar que existan los escudos
	//$foto_archivo1="../imagenes/escudos/".$escudo_equipo1;
	//$foto_archivo2="../imagenes/escudos/".$escudo_equipo2;
	
	$archivo1="../imagenes/escudos/".$escudo_equipo1;
	$archivo2="../imagenes/escudos/".$escudo_equipo2;

	if($_SESSION['idiomapagina']==1)
	{
		$nodisponible="../imagenes/no-disponible.gif";
	}
	else if ($_SESSION['idiomapagina']==2)
	{
		$nodisponible="../imagenes/no-disponible-en.gif";
	}

 	//if ((file_exists($archivo1)||buscaEscudo($foto_archivo1))&&strcmp($escudo_equipo1,"")!=0)
 	if ((file_exists($archivo1)||buscaEscudo($archivo1))&&strcmp($escudo_equipo1,"")!=0)
	{
	    $escudo_equipo1=$archivo1;
	}
	else
	{
		$escudo_equipo1=$nodisponible;
	}

	//if ((file_exists($archivo2)||buscaEscudo($foto_archivo2))&&strcmp($escudo_equipo2,"")!=0)
	if ((file_exists($archivo2)||buscaEscudo($archivo2))&&strcmp($escudo_equipo2,"")!=0)
	{
	    $escudo_equipo2=$archivo2;
	}
	else
	{
		$escudo_equipo2=$nodisponible;
	}

?>
	<div class="row">
        <div class="col-3">
            &nbsp;
        </div>
        <div class="col-6">
        	<table class="table table-bordered">
        		<tr>
        			<td class="text-center">
        				<img src="<?= $escudo_equipo1 ?>">
        			</td>
        			<td class="text-center">
        				<img src="<?= $escudo_equipo2 ?>">
        			</td>
        		</tr>
        		<tr>
        			<td class="text-center">
        				<?= cambiarAcentos($nombre_equipo1) ?>
        			</td>
        			<td class="text-center">
        				<?= cambiarAcentos($nombre_equipo2) ?>
        			</td>
        		</tr>
        		<tr>
        			<td class="text-center">
        				<?= $gol_eq1 ?>
        			</td>
        			<td class="text-center">
        				<?= $gol_eq2 ?>
        			</td>
        		</tr>
<?php 
            //Query
            $query="Select * from goleadores where IdLiga=".$id." order by IdGoleador";
            $qgoleadores=mysqli_query ($link, $query);
      
            if (mysqli_num_rows($qgoleadores) > 0){
?>
				<tr>
        			<td colspan="2">
        				<br>
        				<p class="text-center">
        					<table class="table">
<?php 
                                while($goleadores=mysqli_fetch_array($qgoleadores, MYSQLI_BOTH))
                                {
                                    $id_jugador=$goleadores["IdJugador"];
                                    $tipo=$goleadores["Tipo"];
                                    
                                    //Query para cambiar los ids por los nombres
                                    $query="select * from jugadores where IdJugador=".$id_jugador;
                                    $jug=mysqli_query ($link, $query);
                                    $rowjugador=mysqli_fetch_array($jug);
                                    
                                    $nombre = $rowjugador["Nombre"]." ".$rowjugador["Apellido1"];
                                    if ($tipo == 2)
                                    {
                                        $nombre .= " (P)";
                                    }
                                       
?>
									<tr class="d-flex">
										<td class="col-8">
											<?= cambiarAcentos($nombre) ?>
										</td>
										<td class="text-center col-2">
											<?= $goleadores["Resultado"] ?>
										</td>
										<td class="text-center col-2">
											<?= $goleadores["Minuto"] ?>
										</td>
									</tr>
<?php 
                                } //while($goleadores=mysqli_fetch_array($qgoleadores, MYSQLI_BOTH))
?>
        					</table>
        				</p>
        				<br>
        			</td>
        		</tr>
<?php 
            } //if (mysqli_num_rows($qgoleadores) > 0){
?>
			</table>
		</div>
		<div class="col-3">
            &nbsp;
        </div>
	</div>		

<!-- Incidencias -->
      	
	</p>
	
	<div class="row">
        <div class="col-3">
            &nbsp;
        </div>
        <div class="col-6">
        	<table class="table table-bordered">
        		<thead class="thead-dark">
            		<tr>
            			<td colspan="2" class="text-center">
            				<?= cambiarAcentos(_INCIDENCIAS) ?>
            			</td>
            		</tr>
            		<tr>
            			<th>
            				<?= cambiarAcentos(_FECHAPARTIDO) ?>
            			</th>
            			<td>
            				<?= cambiarAcentos($fecha) ?>
            			</td>
            		</tr>
            		<tr>
            			<th>
            				<?= cambiarAcentos(_CAMPO) ?>
            			</th>
            			<td>
            				<?= cambiarAcentos($estadio) ?>
            			</td>
            		</tr>
            		<tr>
            			<th>
            				<?= cambiarAcentos(_HORA) ?>
            			</th>
            			<td>
            				<?= $hora.":".$minutos ?>
            			</td>
            		</tr>
            		<tr>
            			<th>
            				<?= cambiarAcentos(_DIA) ?>
            			</th>
            			<td>
            				<?= diaSemana($dia_s) ?>
            			</td>
            		</tr>
            	</thead>
        	</table>
        </div>
        <div class="col-3">
            &nbsp;
        </div>
	</div>

<?php 
            //Query
            $query="Select * from comentarios where IdLiga=".$id." order by IdComentario";
            $qcomentarios=mysqli_query ($link, $query);
            
            if (mysqli_num_rows($qcomentarios) > 0){
?>
			<p/>
			<h4 class="text-center"><?= strtoupper(_COMENTARIOS) ?></h4>
			
			<table class="table table-bordered">
<?php 
                    while($comentario=mysqli_fetch_array($qcomentarios, MYSQLI_BOTH))
                    {
?>
						<tr class="d-flex">
							<td class="col-1"><?= _AUTOR ?></td>
							<td class="col-2"><?= cambiarAcentos($comentario["Autor"]) ?></td>
							<td class="col-1">&nbsp;</td>
							<td class="col-1"><?= _COMENTARIO ?></td>
							<td class="col-7"><?= cambiarAcentos($comentario["Comentario"]) ?></td>
						</tr>
						<tr>
							<td colspan="5">&nbsp;</td>
						</tr>
<?php 
                    } //while($comentario=mysqli_fetch_array($qcomentarios, MYSQLI_BOTH))
?>
			</table>
<?php 
            } //if (mysqli_num_rows($qcomentarios) > 0){
?>