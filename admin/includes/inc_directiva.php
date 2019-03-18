<?php
	
    $accion = "A";
	
	if (isset($_POST['Accion']))
	{
		$accion = $_POST['Accion'];	
	} else if (isset($_GET['Accion']))
	{
	    $accion = $_GET['Accion'];
	}
	
	$idDirectiva="";
	$cargoES="";
	$cargoCA="";
	$cargoEN="";
	$nombre="";
	$apellido1="";
	$apellido2="";
	
	if (isset($_POST['CargoES']) && isset($_POST['CargoCA']) && isset($_POST['CargoEN']) && isset($_POST['Nombre']) && $accion == "A")
	{
		//Query
	    $query="select max(orden) as maxorden from directiva";
	    $qDirectiva=mysqli_query ($link, $query);
	    $rowDirectiva=mysqli_fetch_array($qDirectiva);
	    
	    $orden = $rowDirectiva["maxorden"];
	    mysqli_free_result($qDirectiva);
	    
	    if ($orden == ""){
	        $orden = 1;
	    } else {
	        $orden++;
	    }
	    
	  	//Query
	    $query="insert into directiva (Orden,CargoES,CargoCA,CargoEN,Nombre,Apellido1,Apellido2,FechaModificacion) values (";
		$query.=$orden;
		$query.=",'".$_POST['CargoES']."'";
		$query.=",'".$_POST['CargoCA']."'";
		$query.=",'".$_POST['CargoEN']."'";
	    $query.=",'".$_POST['Nombre']."'";
	    $query.=",'".$_POST['Apellido1']."'";
	    $query.=",'".$_POST['Apellido2']."'";
		$query.=",now())";
		mysqli_query ($link, $query);
    }
    else if ($accion == "M")
    {
	  	//Query
	    $query="update directiva set CargoES='".$_POST['CargoES']."'";
		$query.=", CargoCA='".$_POST['CargoCA']."'";
		$query.=", CargoEN='".$_POST['CargoEN']."'";
	    $query.=", Apellido1='".$_POST['Nombre']."'";
		$query.=", Apellido1='".$_POST['Apellido1']."'";
	    $query.=", Apellido2='".$_POST['Apellido2']."'";
		$query.=", FechaModificacion=now()";
	    $query.=" where IdDirectiva=".$_POST['IdDirectiva'];
	    mysqli_query ($link, $query);
		$poblacion = "";		
		
		$accion = "A";
    }
    else if ($accion == "B")
    {
		//Query
		$query="select * from directiva where IdDirectiva=".$_GET['IdDirectiva'];
		$qDirectiva=mysqli_query ($link, $query);
		$rowDirectiva=mysqli_fetch_array($qDirectiva);

		$idDirectiva = $rowDirectiva["IdDirectiva"];
		$cargoES = $rowDirectiva["CargoES"];
		$cargoCA = $rowDirectiva["CargoCA"];
		$cargoEN = $rowDirectiva["CargoEN"];
		$nombre = $rowDirectiva["Nombre"];
		$apellido1 = $rowDirectiva["Apellido1"];
		$apellido2 = $rowDirectiva["Apellido2"];
		$accion = "M";
		
		mysqli_free_result($qDirectiva);
    }
    else if ($accion == "E")
    {
		//Query
		$query="delete from directiva where IdDirectiva=".$_GET['IdDirectiva'];
		$resultado = mysqli_query ($link, $query);
		$accion = "A";
    }
    else if ($accion == "U")
    {
		$query="select * from directiva where IdDirectiva=".$_GET['IdDirectiva'];
		$qDirectiva=mysqli_query ($link, $query);
		$rowDirectiva=mysqli_fetch_array($qDirectiva);
		
		$idDirectivaAnt = $rowDirectiva["IdDirectiva"];
		$ordenAnt = $rowDirectiva["Orden"];
		mysqli_free_result($qDirectiva);
		
		$cambioOrdenAnt = $ordenAnt - 1;
		
		$query="select * from directiva where Orden=".$cambioOrdenAnt;
		$qDirectiva=mysqli_query ($link, $query);
		$rowDirectiva=mysqli_fetch_array($qDirectiva);
		
		$idDirectivaPost = $rowDirectiva["IdDirectiva"];
		$ordenPost = $rowDirectiva["Orden"];
		mysqli_free_result($qDirectiva);
		
		$cambioOrdenPost = $ordenPost + 1;
		
		$query="update directiva set Orden=".$cambioOrdenAnt;
		$query.=" where IdDirectiva=".$idDirectivaAnt;
		mysqli_query ($link, $query);
			
		$query="update directiva set Orden=".$cambioOrdenPost;
		$query.=" where IdDirectiva=".$idDirectivaPost;
		mysqli_query ($link, $query);		
		$accion = "A";
    }
    else if ($accion == "D")
    {
		$query="select * from directiva where IdDirectiva=".$_GET['IdDirectiva'];
		$qDirectiva=mysqli_query ($link, $query);
		$rowDirectiva=mysqli_fetch_array($qDirectiva);
		
		$idDirectivaAnt = $rowDirectiva["IdDirectiva"];
		$ordenAnt = $rowDirectiva["Orden"];
		mysqli_free_result($qDirectiva);
		
		$cambioOrdenAnt = $ordenAnt + 1;
		
		$query="select * from directiva where Orden=".$cambioOrdenAnt;
		$qDirectiva=mysqli_query ($link, $query);
		$rowDirectiva=mysqli_fetch_array($qDirectiva);
		
		$idDirectivaPost = $rowDirectiva["IdDirectiva"];
		$ordenPost = $rowDirectiva["Orden"];
		mysqli_free_result($qDirectiva);
		
		$cambioOrdenPost = $ordenPost - 1;
		
		$query="update directiva set Orden=".$cambioOrdenAnt;
		$query.=" where IdDirectiva=".$idDirectivaAnt;
		mysqli_query ($link, $query);
			
		$query="update directiva set Orden=".$cambioOrdenPost;
		$query.=" where IdDirectiva=".$idDirectivaPost;
		mysqli_query ($link, $query);	
		$accion = "A";
    }
?>

	<h1 class="text-center">DIRECTIVA</h1>

	<form role="form" id="directiva" method="post" action="directiva.php">
		<input type="hidden" name="Accion" id="Accion" value=<?= $accion ?>>
		<input type="hidden" name="IdDirectiva" id="IdDirectiva" value=<?= $idDirectiva ?>>
		
		<table class="table">
       		<tr class="d-flex">
    			<td class="col-2 text-right">Cargo espa&ntilde;ol:</td>
           		<td class="col-3 text-center"><input type="text" class="form-control" size="20" name="CargoES" id="CargoES" value="<?= $cargoES ?>"></td>
           		<td class="col-2 text-right">&nbsp;</td>
           		<td class="col-2 text-right">Nombre:</td>
           		<td class="col-3 text-center"><input type="text" class="form-control" size="20" name="Nombre" id="Nombre" value="<?= $nombre ?>"></td>
           	</tr>
           	
           	<tr class="d-flex">
    			<td class="col-2 text-right">Cargo catal&aacute;n:</td>
           		<td class="col-3 text-center"><input type="text" class="form-control" size="20" name="CargoCA" id="CargoCA" value="<?= $cargoCA ?>"></td>
           		<td class="col-2 text-right">&nbsp;</td>
           		<td class="col-2 text-right">Primer apellido:</td>
           		<td class="col-3 text-center"><input type="text" class="form-control" size="20" name="Apellido1" id="Apellido1" value="<?= $apellido1 ?>"></td>
           	</tr>
           	
           	<tr class="d-flex">
    			<td class="col-2 text-right">Cargo ingl&eacute;s:</td>
           		<td class="col-3 text-center"><input type="text" class="form-control" size="20" name="CargoEN" id="CargoEN" value="<?= $cargoEN ?>"></td>
           		<td class="col-2 text-right">&nbsp;</td>
           		<td class="col-2 text-right">Segundo apellido:</td>
           		<td class="col-3 text-center"><input type="text" class="form-control" size="20" name="Apellido2" id="Apellido2" value="<?= $apellido2 ?>"></td>
           	</tr>
           	
           	<tr class="d-flex">
           		<td class="col-12 text-center">
           			<button type="submit" class="btn btn-default"><?= cambiarAcentos(_ENVIAR) ?></button>
           		</td>
           	</tr>
		</table>
		
		
		<table class="table table-bordered">
   			<thead class="thead-dark">
    	   		<tr class="d-flex">
    	   			<th class="col-1 text-center">&nbsp;</th>
    	   			<th class="col-1 text-center">&nbsp;</th>
    	   			<th class="col-2 text-center">Cargo</th>
    	   			<th class="col-2 text-center">Directivo</th>
    	   			<th class="col-2 text-center">Foto</th>
    	   			<th class="col-1 text-center">Modificar</th>
    	   			<th class="col-1 text-center">Eliminar</th>
<?php 
                    if ($_SESSION["tipo_usuario"] == 1){
?>	   			
	   					<th class="col-2 text-center">Fecha</th>
<?php 
                    }
?>	   			
	   		</tr>
	   	</thead>	

<?php
	  	//Query
	    $query="select * from directiva order by Orden";
	    $qDirectivas=mysqli_query ($link, $query);
	    $totalDirectivas=mysqli_num_rows($qDirectivas);
	
	    $x=0;
	    while($directiva=mysqli_fetch_array($qDirectivas, MYSQLI_BOTH))
	    {
	        $nombre = $directiva["Nombre"]." ".$directiva["Apellido1"]." ".$directiva["Apellido2"];
?>
				<tr class="d-flex">
					<td class="col-1">
<?php 
                    if ($x==0)
                    {
?>
						&nbsp;
<?php 
                    }
                    else
                    {
?>
						<a href="directiva.php?Accion=U&IdDirectiva=<?= $directiva["IdDirectiva"] ?>"><img src="../../imagenes/up.gif"/></a>
<?php 
                    }
?>
					</td>

					<td class="col-1">
<?php 
                    if ($x==($totalDirectivas-1))
                    {
?>
						&nbsp;
<?php 
                    }
                    else
                    {
?>
						<a href="directiva.php?Accion=D&IdDirectiva=<?= $directiva["IdDirectiva"] ?>"><img src="../../imagenes/down.gif"/></a>
<?php 
                    }
?>
    				</td>				
    				
    				<td class="col-2">
    					<?= $directiva["CargoES"] ?>
    				</td>
    	   			
    	   			<td class="col-2">
    	   				<?= $nombre ?>
    	   			</td>
    	   			
    	   			<td class="col-2">
    	   				<a href="#" onClick="window.open('../includes/subir_foto.php?idDirectiva=<?= $directiva["IdDirectiva"] ?>', '_blank')">Subir foto</a>
    					<img src="<?php print("../includes/mostrar_foto.php?IdDirectiva=".$directiva["IdDirectiva"]) ?>" height="42" width="42"/>
    	   			</td>
    			
    				<td class="col-1">
    	   				<a href="directiva.php?Accion=B&IdDirectiva=<?= $directiva["IdDirectiva"] ?>"><img src="../../imagenes/modificar.gif"/></a>
    	   			</td>
    	   			
    	   			<td class="col-1">
    	   				<a href="directiva.php?Accion=E&IdDirectiva=<?= $directiva["IdDirectiva"] ?>"><img src="../../imagenes/eliminar.gif"/></a>
    	   			</td>
			
<?php 
                    if ($_SESSION["tipo_usuario"] == 1){
?>
        				<td class="col-2 text-center">
        	   				<?= $directiva["FechaModificacion"] ?>
        	   			</td>
<?php 
                    }
?>
				</tr>
<?php    	
                $x++;
    	    }
    	    mysqli_free_result($qDirectivas);
?>
		</table>		
		
	</form>	
