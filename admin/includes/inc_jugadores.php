<?php

    $idCategoria = "";
    $categoria = "";
	$accion = "A";
	
	if (isset($_GET['Accion']))
	{
	    $accion = $_GET['Accion'];
	}
	if (isset($_POST['Accion']))
	{
	    $accion = $_POST['Accion'];
	}
	
	if (isset($_GET['IdCategoria']) || isset($_POST['IdCategoria']))
	{
		if (isset($_GET['IdCategoria']))
		{
			$idCategoria = $_GET['IdCategoria'];	
		}
		else
		{
			$idCategoria = $_POST['IdCategoria'];	
		}
		
		//Query
		$query="select * from categoria where IdCategoria=".$idCategoria;
		$qCategoria=mysqli_query ($link, $query);
		$rowCategoria=mysqli_fetch_array($qCategoria);
		
		$categoria = $rowCategoria["Categoria"];
		mysqli_free_result($qCategoria);
	}
	
	$idJugador="";
	$nombre="";
	$apellido1="";
	$apellido2="";
	$telefono="";
	$mail="";
	$direccion="";
	$poblacion="";
	$codigo_postal="";
	$entrenador="";
	$resultado = 1;
	
	if (isset($_POST['Nombre']) != "" && $accion == "A")
    {
  		if ($_POST['Poblacion'] == "")
  		{
  			$poblacion="9999";
  		}
  		else
  		{
  			$poblacion=$_POST['Poblacion'];
  		}
	  	//Query
	    $query="insert into jugadores (IdCategoria,Nombre,Apellido1,Apellido2,Telefono,Email,Direccion,Poblacion,CodigoPostal,Entrenador,FechaModificacion) values (";
		$query.=$_POST['IdCategoria'];
	    $query.=",'".$_POST['Nombre']."'";
	    $query.=",'".$_POST['Apellido1']."'";
	    $query.=",'".$_POST['Apellido2']."'";
	    $query.=",'".$_POST['Telefono']."'";
	    $query.=",'".$_POST['Mail']."'";
	    $query.=",'".$_POST['Direccion']."'";
	    $query.=",".$poblacion;
		$query.=",'".$_POST['CodigoPostal']."'";
		$query.=",'".$_POST['Entrenador']."'";
		$query.=",now())";
		mysqli_query ($link, $query);
    }
    else if ($accion == "M")
    {
  		if ($_POST['Poblacion'] == "")
  		{
  			$poblacion="9999";
  		}
  		else
  		{
  			$poblacion=$_POST['Poblacion'];
  		}
	  	//Query
	    $query="update jugadores set Nombre='".$_POST['Nombre']."'";
	    $query.=", Apellido1='".$_POST['Apellido1']."'";
	    $query.=", Apellido2='".$_POST['Apellido2']."'";
	    $query.=", Telefono='".$_POST['Telefono']."'";
	    $query.=", Email='".$_POST['Mail']."'";
	    $query.=", Direccion='".$_POST['Direccion']."'";
	    $query.=", Poblacion=".$poblacion;
	    $query.=", CodigoPostal='".$_POST['CodigoPostal']."'";
		$query.=", Entrenador='".$_POST['Entrenador']."'";
		$query.=", FechaModificacion=now()";
	    $query.=" where IdJugador=".$_POST['IdJugador']." and IdCategoria=".$_POST['IdCategoria'];
	    mysqli_query ($link, $query);
		$poblacion = "";			
    }
    else if ($accion == "B")
    {
		//Query
		$query="select * from jugadores where IdJugador=".$_GET['IdJugador']." and IdCategoria=".$_GET['IdCategoria'];
		$qJugador=mysqli_query ($link, $query);
		$rowJugador=mysqli_fetch_array($qJugador);

		$idJugador = $rowJugador["IdJugador"];
		$idCategoria = $rowJugador["IdCategoria"];
		$nombre = $rowJugador["Nombre"];
		$apellido1 = $rowJugador["Apellido1"];
		$apellido2 = $rowJugador["Apellido2"];
		$telefono = $rowJugador["Telefono"];
		$mail = $rowJugador["Email"];
		$direccion = $rowJugador["Direccion"];
		$poblacion = $rowJugador["Poblacion"];
		$codigo_postal = $rowJugador["CodigoPostal"];
		$entrenador = $rowJugador["Entrenador"];
        $accion = "M";
        mysqli_free_result($qJugador);
    }
    else if ($accion == "E")
    {
		//Query
		$query="delete from jugadores where IdJugador=".$_GET['IdJugador']." and IdCategoria=".$_GET['IdCategoria'];
		$resultado = mysqli_query ($link, $query);
		$accion = "A";
    }
?>

<?php
	if ($categoria == "")
	{
?>
		<h1 class="text-center">JUGADORES</h1>
<?php	
	}
	else
	{
?>
		<h1 class="text-center">JUGADORES <?= strtoupper($categoria) ?></h1>
<?php 	
	}
	
?>

	<select class="form-control" name="categoria" onChange="location=this.options[this.selectedIndex].value">
		<option value="jugadores.php?IdCategoria=1">Categoria</option>

<?php
            //Query
            $query="select * from categoria where maestro=1 order by orden";
            $qcategorias=mysqli_query ($link, $query);

            while($categoriaSelect=mysqli_fetch_array($qcategorias, MYSQLI_BOTH))
            {
?>
					<option value="jugadores.php?IdCategoria=<?= $categoriaSelect["IdCategoria"] ?>"><?= $categoriaSelect["Categoria"] ?></option>
<?php
            }
            mysqli_free_result($qcategorias);
?>
	</select>

<?php
    if ($categoria != "")
	{ 
?>		
		<form role="form" id="jugador" method="post" action="jugadores.php">
			<input type="hidden" name="Accion" id="Accion" value=<?= $accion ?>>
			<input type="hidden" name="IdCategoria" id="IdCategoria" value=<?= $idCategoria ?>>
			<input type="hidden" name="IdJugador" id="IdJugador" value=<?= $idJugador ?>>
			<table class="table">
           		<tr class="d-flex">
        			<td class="col-2 text-right">Nombre:</td>
               		<td class="col-4 text-center"><input type="text" class="form-control" size="20" name="Nombre" id="Nombre" value="<?= $nombre ?>"></td>
               		<td class="col-2 text-right">Primer apellido:</td>
               		<td class="col-4 text-center"><input type="text" class="form-control" size="20" name="Apellido1" id="Apellido1" value="<?= $apellido1 ?>"></td>
        		</tr>    
			
				<tr class="d-flex">
        			<td class="col-2 text-right">Segundo apellido:</td>
               		<td class="col-4 text-center"><input type="text" class="form-control" size="20" name="Apellido2" id="Apellido2" value="<?= $apellido2 ?>"></td>
               		<td class="col-6 text-right">&nbsp;</td>
        		</tr>
        		
        		<tr class="d-flex">
        			<td class="col-2 text-right">Tel&eacute;fono:</td>
               		<td class="col-4 text-center"><input type="text" class="form-control" size="20" name="Telefono" id="Telefono" value="<?= $telefono ?>"></td>
               		<td class="col-2 text-right">Mail:</td>
               		<td class="col-4 text-center"><input type="text" class="form-control" size="20" name="Mail" id="Mail" value="<?= $mail ?>"></td>
        		</tr>
        		
        		<tr class="d-flex">
        			<td class="col-2 text-right">Direcci&oacute;n:</td>
               		<td class="col-4 text-center"><input type="text" class="form-control" size="20" name="Direccion" id="Direccion" value="<?= $direccion ?>"></td>
               		<td class="col-2 text-right">Poblaci&oacute;n:</td>
               		<td class="col-4 text-center">
						<select class="form-control" name="Poblacion" id="Poblacion">
       						<option value="">Poblacion</option>
<?php 
                            //Query
                            $query="select * from poblaciones where IdPoblacion != 9999 order by Poblacion";
                            $qPoblacion=mysqli_query ($link, $query);
                            
                            while($poblacionSSelect=mysqli_fetch_array($qPoblacion, MYSQLI_BOTH))
                            {
                                $seleccionado = "";
                                if ($poblacion == $poblacionSSelect["IdPoblacion"])
                                {
                                    $seleccionado = "selected";
                                }
?>       			
								<option value="<?= $poblacionSSelect["IdPoblacion"] ?>" <?= $seleccionado ?>><?= $poblacionSSelect["Poblacion"] ?></option>
<?php 
                            }
                            mysqli_free_result($qPoblacion);
?>	
       					</select>
               		</td>
        		</tr>
			
				<tr class="d-flex">
        			<td class="col-2 text-right">C&oacute;digo postal:</td>
               		<td class="col-4 text-center"><input type="text" class="form-control" size="20" name="CodigoPostal" id="CodigoPostal" value="<?= $codigo_postal ?>"></td>
               		<td class="col-2 text-right">Entrenador:</td>
               		<td class="col-4 text-center">
						<select class="form-control" name="Entrenador" id="Entrenador">
       						<option value="">Entrenador</option>
<?php 
                                $entSeleccionadoNo="";
                                if ($entrenador == 0){
                                    $entSeleccionadoNo="selected";
                                }
                                
                                $entSeleccionadoSi="";
                                if ($entrenador == 1){
                                    $entSeleccionadoSi="selected";
                                }
?>       			
								<option value="0" <?= $entSeleccionadoNo ?>>No</option>
								<option value="1" <?= $entSeleccionadoSi ?>>Si</option>
>	
       					</select>
               		</td>
        		</tr>
			
				<tr class="d-flex">
        			<td class="col-2 text-right">&nbsp;</td>
               		<td class="col-4 text-center">
               			<a href="#" onClick="window.open('../includes/subir_foto.php?idCategoria=<?= $idCategoria ?>', '_blank')">Subir foto equipo</a>
               		</td>
               		<td class="col-4 text-center">
               			<img src="<?php print("../includes/mostrar_foto.php?IdCategoria=".$idCategoria) ?>" height="42" width="42"/>
               		</td>
        		</tr>
		
				<tr class="d-flex">
        			<td class="col-4">&nbsp;</td>
               		<td class="col-4 text-center">
						<button type="submit" class="btn btn-default"><?= cambiarAcentos(_ENVIAR) ?></button>
					</td>
               		<td class="col-4">&nbsp;</td>
				</tr>
			</table>
			
<?php
				if ($resultado <> 1)
				{
?>
					<p class="text-center">El jugador que desea eliminar tiene materiales asignados.<br>Si desea eliminar el jugador elimine antes el material que le ha sido asignado</p>
<?php 
				}
?>

			<table class="table table-bordered">
           		<thead class="thead-dark">
        	   		<tr class="d-flex">
        	   			<th class="col-3 text-center">Entrenador</th>
        	   			<th class="col-3 text-center">Foto</th>
        	   			<th class="col-2 text-center">Modificar</th>
        	   			<th class="col-2 text-center">Eliminar</th>
        	   			<th class="col-2 text-center">
<?php 
                            if ($_SESSION["tipo_usuario"] == 1){
?>
								Fecha
<?php 
                            }
?>
						</th>
           			</tr>  
           		</thead>
			
<?php
        	  	//Query
                $query="select * from jugadores where IdCategoria=".$idCategoria." and Entrenador=1 order by Nombre";
        	    $qEntrenadores=mysqli_query ($link, $query);
        	    
        	    while($entrenador=mysqli_fetch_array($qEntrenadores, MYSQLI_BOTH))
        	    {
        	        $nombre = buscaJugador($entrenador["IdJugador"], $link);
	    
?>
        			<tr class="d-flex">
        	   			<td class="col-3"><?= $nombre ?></td>
        	   			<td class="col-3 text-center">
        	   				<a href="#" onClick="window.open('../includes/subir_foto.php?idJugador=<?= $entrenador["IdJugador"] ?>', '_blank')">Subir foto</a>
							<img src="<?php print("../includes/mostrar_foto.php?IdJugador=".$entrenador["IdJugador"]) ?>" height="42" width="42"/>
        	   			</td>
        	   			<td class="col-2 text-center">
        	   				<a href="jugadores.php?Accion=B&IdJugador=<?= $entrenador["IdJugador"] ?>&IdCategoria=<?= $idCategoria ?>"><img src="../../imagenes/modificar.gif"/></a>
        	   			</td>
        	   			<td class="col-2 text-center">
        	   				<a href="jugadores.php?Accion=E&IdJugador=<?= $entrenador["IdJugador"] ?>&IdCategoria=<?= $idCategoria ?>"><img src="../../imagenes/eliminar.gif"/></a>
        	   			</td>
        	   			<td class="col-2 text-center">
<?php 
                            if ($_SESSION["tipo_usuario"] == 1){
                                print($entrenador["FechaModificacion"]);
                            }
?>
						</td>
           			</tr>  	
<?php 
        	    }
        	    mysqli_free_result($qEntrenadores);
?>   		

			</table>		

			</br></br>

			<table class="table table-bordered">
           		<thead class="thead-dark">
        	   		<tr class="d-flex">
        	   			<th class="col-3 text-center">Jugador</th>
        	   			<th class="col-3 text-center">Foto</th>
        	   			<th class="col-2 text-center">Modificar</th>
        	   			<th class="col-2 text-center">Eliminar</th>
        	   			<th class="col-2 text-center">
<?php 
                            if ($_SESSION["tipo_usuario"] == 1){
?>
								Fecha
<?php 
                            }
?>
						</th>
           			</tr>  
           		</thead>
			
<?php
        	  	//Query
                $query="select * from jugadores where IdCategoria=".$idCategoria." and Entrenador=0 order by Nombre";
        	    $qJugadores=mysqli_query ($link, $query);
        	    
        	    while($jugador=mysqli_fetch_array($qJugadores, MYSQLI_BOTH))
        	    {
        	        $nombre = buscaJugador($jugador["IdJugador"], $link);
	    
?>
        			<tr class="d-flex">
        	   			<td class="col-3"><?= $nombre ?></td>
        	   			<td class="col-3 text-center">
        	   				<a href="#" onClick="window.open('../includes/subir_foto.php?idJugador=<?= $jugador["IdJugador"] ?>', '_blank')">Subir foto</a>
							<img src="<?php print("../includes/mostrar_foto.php?IdJugador=".$jugador["IdJugador"]) ?>" height="42" width="42"/>
        	   			</td>
        	   			<td class="col-2 text-center">
        	   				<a href="jugadores.php?Accion=B&IdJugador=<?= $jugador["IdJugador"] ?>&IdCategoria=<?= $idCategoria ?>"><img src="../../imagenes/modificar.gif"/></a>
        	   			</td>
        	   			<td class="col-2 text-center">
        	   				<a href="jugadores.php?Accion=E&IdJugador=<?= $jugador["IdJugador"] ?>&IdCategoria=<?= $idCategoria ?>"><img src="../../imagenes/eliminar.gif"/></a>
        	   			</td>
        	   			<td class="col-2 text-center">
<?php 
                            if ($_SESSION["tipo_usuario"] == 1){
                                print($jugador["FechaModificacion"]); 
                            }
?>
						</td>
           			</tr>  	
<?php 
        	    }
        	    mysqli_free_result($qJugadores);
?>			
			</table>
		</form>	
<?php
	}
?>	