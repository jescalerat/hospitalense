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

	//Llamamos a la traducción del mes
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
		<center><a href="javascript:llamada_prototype('paginas/promocion.php?Jornada=<?= $_SESSION['jornadapromosessionresult'] ?>&IdCategoria=<?= $categoria ?>','principal')"> <?= cambiarAcentos(_VOLVERPROMOCION) ?></a></center>
<?php 		
	}
	else
	{
?>
		<center><a href="javascript:llamada_prototype('paginas/resultados.php?Jornada=<?= $_SESSION['jornadasessionresult'] ?>&IdCategoria=<?= $categoria ?>','principal')"> <?= cambiarAcentos(_VOLVERRESULTADOS) ?></a></center>
<?php 
	}

	//Comprobar que existan los escudos
	$foto_archivo1="../imagenes/escudos/".$escudo_equipo1;
	$foto_archivo2="../imagenes/escudos/".$escudo_equipo2;
	
	$archivo1=$_SERVER['DOCUMENT_ROOT']."/imagenes/escudos/".$escudo_equipo1;
	$archivo2=$_SERVER['DOCUMENT_ROOT']."/imagenes/escudos/".$escudo_equipo2;

	if($_SESSION['idiomapagina']==1)
	{
		$nodisponible="../imagenes/no-disponible.gif";
	}
	else if ($_SESSION['idiomapagina']==2)
	{
		$nodisponible="../imagenes/no-disponible-en.gif";
	}

 	if ((file_exists($archivo1)||buscaEscudo($foto_archivo1))&&strcmp($escudo_equipo1,"")!=0)
	{
		$escudo_equipo1=$foto_archivo1;
	}
	else
	{
		$escudo_equipo1=$nodisponible;
	}

	if ((file_exists($archivo2)||buscaEscudo($foto_archivo2))&&strcmp($escudo_equipo2,"")!=0)
	{
		$escudo_equipo2=$foto_archivo2;
	}
	else
	{
		$escudo_equipo2=$nodisponible;
	}
?>
	<table border="1" class="w100">
		<tr>
			<td class="w50">
				<center><img src="<?= $escudo_equipo1 ?>"></center>
			</td>
			<td>
				<center><img src="<?= $escudo_equipo2 ?>"></center>
			</td>
		</tr>
		<tr>
			<td>
				<center><?= cambiarAcentos($nombre_equipo1) ?></center>
			</td>
			<td>
				<center><?= cambiarAcentos($nombre_equipo2) ?></center>
			</td>
		</tr>
		<tr>
			<td>
				<center><?= $gol_eq1 ?></center>
			</td>
			<td>
				<center><?= $gol_eq2 ?></center>
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
        				<center>
        					<table class="tabla_sin_borde w75">
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
									<tr>
										<td class="tabla_sin_borde w70">
											<?= cambiarAcentos($nombre) ?>
										</td>
										<td class="tabla_sin_borde w20">
											<center><?= $goleadores["Resultado"] ?></center>
										</td>
										<td class="tabla_sin_borde w10">
											<center><?= $goleadores["Minuto"] ?></center>
										</td>
									</tr>
<?php 
                                } //while($goleadores=mysqli_fetch_array($qgoleadores, MYSQLI_BOTH))
?>
        					</table>
        				</center>
        				<br>
        			</td>
        		</tr>
<?php 
            } //if (mysqli_num_rows($qgoleadores) > 0){
?>
	</table>		

<!-- Incidencias -->
      	
	</p>
	<table border="1" class="w100">
		<tr>
			<td colspan="2">
				<center><?= cambiarAcentos(_INCIDENCIAS) ?></center>
			</td>
		</tr>
		<tr>
			<th class="w20">
				<?= cambiarAcentos(_FECHAPARTIDO) ?>
			</th>
			<td>
				<?= cambiarAcentos($fecha) ?>
			</td>
		</tr>
		<tr>
			<th class="w20">
				<?= cambiarAcentos(_CAMPO) ?>
			</th>
			<td>
				<?= cambiarAcentos($estadio) ?>
			</td>
		</tr>
		<tr>
			<th class="w20">
				<?= cambiarAcentos(_HORA) ?>
			</th>
			<td>
				<?= $hora.":".$minutos ?>
			</td>
		</tr>
		<tr>
			<th class="w20">
				<?= cambiarAcentos(_DIA) ?>
			</th>
			<td>
				<?= diaSemana($dia_s) ?>
			</td>
		</tr>
	</table>

<?php 
            //Query
            $query="Select * from comentarios where IdLiga=".$id." order by IdComentario";
            $qcomentarios=mysqli_query ($link, $query);
            
            if (mysqli_num_rows($qcomentarios) > 0){
?>
			<center><h2><?= strtoupper(_COMENTARIOS) ?></h2></center>
			
			<table border="1" class="w100">
<?php 
                    while($comentario=mysqli_fetch_array($qcomentarios, MYSQLI_BOTH))
                    {
?>
						<tr>
							<td class="w10"><?= _AUTOR ?></td>
							<td class="w20"><?= cambiarAcentos($comentario["Autor"]) ?></td>
							<td class="w5">&nbsp;</td>
							<td class="w15"><?= _COMENTARIO ?></td>
							<td class="w50"><?= cambiarAcentos($comentario["Comentario"]) ?></td>
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