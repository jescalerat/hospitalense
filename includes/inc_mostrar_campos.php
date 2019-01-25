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
        $_SESSION['campo']=$_GET['identificador'];
    }
    else if (isset($_GET['campo']))
    {
        $id=$_GET['campo'];
        $_SESSION['campo']=$_GET['campo'];
    }
    else
    {
        $id=$_SESSION['campo'];
    }	

    $query="select * from campos where IdCampo=".$id;
    $qcampo=mysqli_query ($link, $query);
    $rowcampo=mysqli_fetch_array($qcampo);

    $idCampo = $rowcampo["IdCampo"];
    
    $coche=$rowcampo["Coche"];
    $tren=$rowcampo["Tren"];
    $metro=$rowcampo["Metro"];
    $bus=$rowcampo["Bus"];
    $ffcc=$rowcampo["FFCC"];
    $tram=$rowcampo["Tram"];
    $mapas=$rowcampo["Mapas"];
        
    //Cambiar el id que busco por el nombre de la poblacion
	$query="select * from poblaciones where IdPoblacion = ".$rowcampo["Poblacion"];
	$qpoblacion=mysqli_query ($link, $query);
	$rowpoblacion=mysqli_fetch_array($qpoblacion);
	
?>	
	<h1 class="text-center"><?= cambiarAcentos(mb_strtoupper($rowcampo["Nombre"])) ?></h1>
	
	<table class="table table-bordered">
		<thead class="thead-dark">
			<tr>
				<th><?= cambiarAcentos(_DIRECCION) ?></th>
				<td><?= cambiarAcentos($rowcampo["Direccion"]) ?></td>
			</tr>
			<tr>
				<th><?= cambiarAcentos(_POBLACION) ?></th>
				<td><?= cambiarAcentos($rowpoblacion["Poblacion"]) ?></td>
			</tr>
		</thead>
	</table>
			
<?php 
    if ($mapas!=null)
    {
?>			
		<h3 class="text-center"><?= cambiarAcentos(mb_strtoupper(_COMOLLEGAR)) ?></h3>
		
		<table class="table table-bordered">
    		<thead class="thead-dark">
<?php 
                if ($coche!=null)
                {
?>    		
        			<tr>
        				<th><?= cambiarAcentos(_COCHE) ?></th>
        				<td><?= cambiarAcentos($coche) ?></td>
        			</tr>
<?php 
                } //if ($coche!=null)
?>

<?php 
                if ($tren!=null)
                {
?>    		
        			<tr>
        				<th><?= cambiarAcentos(_TREN) ?></th>
        				<td><?= cambiarAcentos($tren) ?></td>
        			</tr>
<?php 
                } //if ($tren!=null)
?>

<?php 
                if ($metro!=null)
                {
?>    		
        			<tr>
        				<th><?= cambiarAcentos(_METRO) ?></th>
        				<td><?= cambiarAcentos($metro) ?></td>
        			</tr>
<?php 
                } //if ($metro!=null)
?>

<?php 
                if ($bus!=null)
                {
?>    		
        			<tr>
        				<th><?= cambiarAcentos(_BUS) ?></th>
        				<td><?= cambiarAcentos($bus) ?></td>
        			</tr>
<?php 
                } //if ($bus!=null)
?>

<?php 
                if ($ffcc!=null)
                {
?>    		
        			<tr>
        				<th><?= cambiarAcentos(_FFCC) ?></th>
        				<td><?= cambiarAcentos($ffcc) ?></td>
        			</tr>
<?php 
                } //if ($ffcc!=null)
?>

<?php 
                if ($tram!=null)
                {
?>    		
        			<tr>
        				<th><?= cambiarAcentos(_TRAM) ?></th>
        				<td><?= cambiarAcentos($tram) ?></td>
        			</tr>
<?php 
                } //if ($tram!=null)
?>

<?php 
                if ($mapas!=null)
                {
?>    		
        			<tr>
        				<td colspan="2" class="text-center"><?= $mapas ?></td>
        			</tr>
<?php 
                } //if ($mapas!=null)
?>
    			
    		</thead>
    	</table>
			
<?php 
    } //if ($mapas!=null)
?>			
			
	<table class="table table-bordered">
		<thead class="thead-dark">
			<tr>
				<th class="align-middle"><?= cambiarAcentos(_EQUIPOS) ?></th>
				<td>
<?php 
                    require_once("inc_mostrar_equipos_campos.php");
?>
				</td>
			</tr>
		</thead>
	</table>
			
	<div class="row">
<?php 
    //Buscar las fotos del campo
    $query="select * from fotos where IdCampo=".$id;
    $qfotoscampo=mysqli_query ($link, $query);
    
    while($foto=mysqli_fetch_array($qfotoscampo, MYSQLI_BOTH))
    {
    
        //Fotos Mediafire
        $url_mediafire=$foto["Mediafire"];
        //Saber en que directorio de Photobucket esta la foto
        if ($foto["Photobucket"]==1)
        {
            //$url_photobucket="\"http://i166.photobucket.com/albums/u81/dinamicobatllo/Campos/".mysql_result($qfotoscampo,$x,"Foto")."\"";
            $url_photobucket="http://i166.photobucket.com/albums/u81/dinamicobatllo/Campos/".$foto["Foto"];
        }
        else if ($foto["Photobucket"]==2)
        {
            //$url_photobucket="\"http://i166.photobucket.com/albums/u81/dinamicobatllo/Campos2/".mysql_result($qfotoscampo,$x,"Foto")."\"";
            $url_photobucket="http://i166.photobucket.com/albums/u81/dinamicobatllo/Campos2/".$foto["Foto"];
        }
        else if ($foto["Photobucket"]==3)
        {
            //$url_photobucket="\"http://i166.photobucket.com/albums/u81/dinamicobatllo/Campos3/".mysql_result($qfotoscampo,$x,"Foto")."\"";
            $url_photobucket="http://i166.photobucket.com/albums/u81/dinamicobatllo/Campos3/".$foto["Foto"];
        }
        //$url_imageshack="\"".mysql_result($qfotoscampo,$x,"Imageshack")."\"";
        $url_imageshack=$foto["Imageshack"];
        
        //Para las fotos segun el servidor en el que esten
        if (buscaFoto($url_mediafire))
        {
            $url_foto="\"".$url_mediafire."\"";
        }
        else if (buscaFoto($url_photobucket))
        {
            $url_foto="\"".$url_photobucket."\"";
        }
        else
        {
            $url_foto="\"".$url_imageshack."\"";
        }
?>
  		
            <div class="col-2">
                &nbsp;
            </div>
            <div class="col-4">
            	<img src="<?= $url_foto ?>" width="400" heigh="300" alt="<?= _AMPLIAR ?>" title="<?= _AMPLIAR ?>" border="0"/>
            </div>
<?php       
    } //while($foto=mysqli_fetch_array($qfotoscampo, MYSQLI_BOTH))
?>			
	</div>
			
			
			
			
<?php
    mysqli_free_result($qcampo);
    mysqli_free_result($qpoblacion);
    mysqli_free_result($qfotoscampo);

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
	<p class="text-center"><a class="btn btn-default btn-block" href="javascript:llamada_prototype('paginas/campos.php','principal')"><?= _VOLVERCAMPOS ?></a></p>
