<?php
	$accion = "A";
	
	if (isset($_GET['Accion']))
	{
		$accion = $_GET['Accion'];	
	}
	if (isset($_POST['Accion']))
	{
	    $accion = $_POST['Accion'];
	}
	
	$idUsuario="";
	$usuario="";
	$nombre="";
	$password="";
	$tipoUsuario="";
	
	if (isset($_POST['nombre']) && $_POST['nombre'] != "" && $accion == "A")
    {
	  	//Query
	    $query="insert into usuarios (Nombre,Usuario,Password,Tipo) values (";
	    $query.="'".$_POST['nombre']."'";
	    $query.=",'".$_POST['usuario']."'";
	    $query.=",'".$_POST['pass']."'";
	    $query.=",".$_POST['tipou'].")";
	    mysqli_query ($link, $query);
		$accion = "A";
    }
    else if ($accion == "M")
    {
	  	//Query
	    $query="update usuarios set Nombre='".$_POST['nombre']."'";
	    $query.=", Usuario='".$_POST['usuario']."'";
	    $query.=", Tipo=".$_POST['tipou'];
	    $query.=" where IdUsuario=".$_POST['IdUsuario'];
	    mysqli_query ($link, $query);
		$accion = "A";
    }
    else if ($accion == "B")
    {
      	//Query
        $query="select * from usuarios where IdUsuario=".$_GET['IdUsuario'];
		$queryUsuario=mysqli_query ($link, $query);
		$rowUsuario=mysqli_fetch_array($queryUsuario);

		$idUsuario = $rowUsuario["IdUsuario"];
		$nombre = $rowUsuario["Nombre"];
		$usuario = $rowUsuario["Usuario"];
		$password = $rowUsuario["Password"];
		$tipoUsuario = $rowUsuario["Tipo"];
		$accion = "M";
		mysqli_free_result($queryUsuario);
    }
    else if ($accion == "E")
    {
      	//Query
        $query="delete from usuarios where IdUsuario=".$_GET['IdUsuario'];
        mysqli_query ($link, $query);
		$accion = "A";
    }
?>
<h1 class="text-center">USUARIOS</h1>
<form action="usuarios.php" method="post" name="usuario" id="usuario">
	<input type="hidden" name="Accion" id="Accion" value=<?= $accion ?>>
	<input type="hidden" name="IdUsuario" id="IdUsuario" value=<?= $idUsuario ?>>
	<table class="table">
   		<tr class="d-flex">
			<td class="col-2 text-right">Nombre:</td>
       		<td class="col-4 text-center"><input type="text" class="form-control" size="20" name="nombre" id="nombre" value="<?= $nombre ?>"></td>
       		<td class="col-2 text-right">Tipo Usuario:</td>
       		<td class="col-4 text-center">
       			<select class="form-control" name="tipou" id="tipou">
       				<option value="">Tipo Usuario</option>
<?php 
                    //Query
                    $query="select * from tipo_usuario order by IdTipoUsuario";
                    $qtipos=mysqli_query ($link, $query);
                    
                    while($tipo=mysqli_fetch_array($qtipos, MYSQLI_BOTH))
                    {
                        $seleccionado = "";
                        if ($tipoUsuario == $tipo["IdTipoUsuario"])
                        {
                            $seleccionado = "selected";
                        }
?>       			
						<option value="<?= $tipo["IdTipoUsuario"] ?>" <?= $seleccionado ?>><?= $tipo["TipoUsuario"] ?></option>
<?php 
                    }
                    mysqli_free_result($qtipos);
?>	
       			</select>
       		</td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-2 text-right">Usuario:</td>
       		<td class="col-4 text-center"><input type="text" class="form-control" size="20" name="usuario" id="usuario" value="<?= $usuario ?>"></td>
       		<td class="col-2 text-right">Password:</td>
       		<td class="col-4 text-center">
<?php 
                $deshabilitado = "disabled";
                if ($accion == "A")
                {
                    $deshabilitado = "";
                }
?>       			
				<input type="text" class="form-control" size="20" name="pass" id="pass" value="<?= $password ?>" <?= $deshabilitado ?>>
       		</td>
       	</tr>
		<tr class="d-flex">
   			<td class="col-5 text-center">&nbsp;</td>
			<td class="col-2 text-center"><button type="submit" class="btn btn-default"><?= cambiarAcentos(_ENVIAR) ?></button></td>
			<td class="col-5 text-center">&nbsp;</td>
		</tr>
	</table>

	<table class="table table-bordered">
   		<thead class="thead-dark">
	   		<tr class="d-flex">
	   			<th class="col-4 text-center">Usuario</th>
	   			<th class="col-4 text-center">Tipo Usuario</th>
	   			<th class="col-2 text-center">Modificar</th>
	   			<th class="col-2 text-center">Eliminar</th>
   			</tr>  
   		</thead>
   		
<?php
	  	//Query
	    $query="select * from usuarios order by tipo";
	    $qusuarios=mysqli_query ($link, $query);
	    
	    while($usuario=mysqli_fetch_array($qusuarios, MYSQLI_BOTH))
	    {
	        $query="select * from tipo_usuario where IdTipoUsuario=".$usuario["Tipo"];
	        $qtipo=mysqli_query ($link, $query);
	        $rowTipo=mysqli_fetch_array($qtipo);
	        mysqli_free_result($qtipo);
	    
?>
			<tr class="d-flex">
	   			<td class="col-4 text-center"><?= $usuario["Usuario"] ?></td>
	   			<td class="col-4 text-center"><?= $rowTipo["TipoUsuario"] ?></td>
	   			<td class="col-2 text-center">
	   				<a href="usuarios.php?Accion=B&IdUsuario=<?= $usuario["IdUsuario"] ?>"><img src="../../imagenes/modificar.gif"/></a>
	   			</td>
	   			<td class="col-2 text-center">
	   				<a href="usuarios.php?Accion=E&IdUsuario=<?= $usuario["IdUsuario"] ?>"><img src="../../imagenes/eliminar.gif"/></a>
	   			</td>
   			</tr>  	
<?php 
	    }
	    mysqli_free_result($qusuarios);
?>   		
   	</table>		

</form>	