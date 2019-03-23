<?php
	
	$accion = "A";
	
	if (isset($_POST['Accion']))
	{
		$accion = $_POST['Accion'];	
	} else if (isset($_GET['Accion']))
	{
	    $accion = $_GET['Accion'];
	}
	
	$idHorario="";
	$hora="";
	$lunes="";
	$martes="";
	$miercoles="";
	$jueves="";
	$viernes="";
	
	if (isset($_POST['Hora']) && isset($_POST['Lunes']) && isset($_POST['Martes']) && isset($_POST['Miercoles']) && isset($_POST['Jueves']) && isset($_POST['Viernes']) && $accion == "A")
	{
		//Query
	    $query="select max(orden) as maxorden from horarios";
	    $qHorarios=mysqli_query ($link, $query);
	    $rowHorarios=mysqli_fetch_array($qHorarios);
	    
	    $orden = $rowHorarios["maxorden"];
	    mysqli_free_result($qHorarios);

		if ($orden == ""){
			$orden = 1;
		} else {
			$orden++;
		}
		
	  	//Query
	    $query="insert into horarios (Orden,Hora,Lunes,Martes,Miercoles,Jueves,Viernes,FechaModificacion) values (";
	    $query.=$orden;
		$query.=",'".$_POST['Hora']."'";
	    $query.=",'".$_POST['Lunes']."'";
	    $query.=",'".$_POST['Martes']."'";
		$query.=",'".$_POST['Miercoles']."'";
		$query.=",'".$_POST['Jueves']."'";
		$query.=",'".$_POST['Viernes']."'";
		$query.=",'".date('Y/m/d H:i:s')."')";

		mysqli_query ($link, $query);
    }
    else if ($accion == "M")
    {
	  	//Query
	    $query="update horarios set Hora='".$_POST['Hora']."'";
	    $query.=", Lunes='".$_POST['Lunes']."'";
	    $query.=", Martes='".$_POST['Martes']."'";
		$query.=", Miercoles='".$_POST['Miercoles']."'";
		$query.=", Jueves='".$_POST['Jueves']."'";
		$query.=", Viernes='".$_POST['Viernes']."'";
		$query.=", FechaModificacion='".date('Y/m/d H:i:s')."'";
	    $query.=" where IdHorario=".$_POST['IdHorario'];
	
	    mysqli_query ($link, $query);
	    
	    $accion = "A";
    }
    else if ($accion == "B")
    {
		//Query
		$query="select * from horarios where IdHorario=".$_GET['IdHorario'];
		$qHorarios=mysqli_query ($link, $query);
		$rowHorarios=mysqli_fetch_array($qHorarios);

		$idHorario = $rowHorarios["IdHorario"];
		$hora = $rowHorarios["Hora"];
		$lunes = $rowHorarios["Lunes"];
		$martes = $rowHorarios["Martes"];
		$miercoles = $rowHorarios["Miercoles"];
		$jueves = $rowHorarios["Jueves"];
		$viernes = $rowHorarios["Viernes"];
		$accion = "M";
		mysqli_free_result($qHorarios);
    }
    else if ($accion == "E")
    {
		//Query
		$query="delete from horarios where IdHorario=".$_GET['IdHorario'];
		mysqli_query ($link, $query);
		$accion = "A";
    }
    else if ($accion == "U")
    {
		$query="select * from horarios where IdHorario=".$_GET['IdHorario'];
		$qHorarios=mysqli_query ($link, $query);
		$rowHorarios=mysqli_fetch_array($qHorarios);
		
		$idHorarioAnt = $rowHorarios["IdHorario"];
		$ordenAnt = $rowHorarios["Orden"];
		mysqli_free_result($qHorarios);
		
		$cambioOrdenAnt = $ordenAnt - 1;
		
		$query="select * from horarios where Orden=".$cambioOrdenAnt;
		$qHorarios=mysqli_query ($link, $query);
		$rowHorarios=mysqli_fetch_array($qHorarios);
		
		$idHorarioPost = $rowHorarios["IdHorario"];
		$ordenPost = $rowHorarios["Orden"];
		mysqli_free_result($qHorarios);
		
		$cambioOrdenPost = $ordenPost + 1;
		
		$query="update horarios set Orden=".$cambioOrdenAnt;
		$query.=" where IdHorario=".$idHorarioAnt;
		mysqli_query ($link, $query);
			
		$query="update horarios set Orden=".$cambioOrdenPost;
		$query.=" where IdHorario=".$idHorarioPost;
		mysqli_query ($link, $query);		
		$accion = "A";
    }
    else if ($accion == "D")
    {
		$query="select * from horarios where IdHorario=".$_GET['IdHorario'];
		$qHorarios=mysqli_query ($link, $query);
		$rowHorarios=mysqli_fetch_array($qHorarios);
		
		$idHorarioAnt = $rowHorarios["IdHorario"];
		$ordenAnt = $rowHorarios["Orden"];
		mysqli_free_result($qHorarios);
		
		$cambioOrdenAnt = $ordenAnt + 1;
		
		$query="select * from horarios where Orden=".$cambioOrdenAnt;
		$qHorarios=mysqli_query ($link, $query);
		$rowHorarios=mysqli_fetch_array($qHorarios);
		
		$idHorarioPost = $rowHorarios["IdHorario"];
		$ordenPost = $rowHorarios["Orden"];
		mysqli_free_result($qHorarios);
		
		$cambioOrdenPost = $ordenPost - 1;
		
		$query="update horarios set Orden=".$cambioOrdenAnt;
		$query.=" where IdHorario=".$idHorarioAnt;
		mysqli_query ($link, $query);
			
		$query="update horarios set Orden=".$cambioOrdenPost;
		$query.=" where IdHorario=".$idHorarioPost;
		mysqli_query ($link, $query);
		$accion = "A";
    }

?>
<h1 class="text-center">HORARIOS</h1>
<form role="form" id="horarios" method="post" action="horarios.php">
	<input type="hidden" name="Accion" id="Accion" value=<?= $accion ?>>
	<input type="hidden" name="IdHorario" id="IdHorario" value=<?= $idHorario ?>>
	
	<table class="table">
   		<tr class="d-flex">
			<td class="col-4 text-right">Hora:</td>
       		<td class="col-8 text-center">
       			<textarea id="Hora" name="Hora" class="form-control" rows="3" cols="80"><?= $hora ?></textarea>
       		</td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-4 text-right">Lunes:</td>
       		<td class="col-8 text-center">
       			<textarea id="Lunes" name="Lunes" class="form-control" rows="3" cols="80"><?= $lunes ?></textarea>
       		</td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-4 text-right">Martes:</td>
       		<td class="col-8 text-center">
       			<textarea id="Martes" name="Martes" class="form-control" rows="3" cols="80"><?= $martes ?></textarea>
       		</td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-4 text-right">Mi&eacute;rcoles:</td>
       		<td class="col-8 text-center">
       			<textarea id="Miercoles" name="Miercoles" class="form-control" rows="3" cols="80"><?= $miercoles ?></textarea>
       		</td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-4 text-right">Jueves:</td>
       		<td class="col-8 text-center">
       			<textarea id="Jueves" name="Jueves" class="form-control" rows="3" cols="80"><?= $jueves ?></textarea>
       		</td>
       	</tr>
	
		<tr class="d-flex">
			<td class="col-4 text-right">Viernes:</td>
       		<td class="col-8 text-center">
       			<textarea id="Viernes" name="Viernes" class="form-control" rows="3" cols="80"><?= $viernes ?></textarea>
       		</td>
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
	   			<th class="col-1 text-center">Hora</th>
	   			<th class="col-1 text-center">Lunes</th>
	   			<th class="col-1 text-center">Martes</th>
	   			<th class="col-1 text-center">Mi&eacute;rcoles</th>
	   			<th class="col-1 text-center">Jueves</th>
	   			<th class="col-1 text-center">Viernes</th>
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
        $query="select * from horarios order by Orden";
	    $qHorarios=mysqli_query ($link, $query);
	    $totalHorarios=mysqli_num_rows($qHorarios);
	
	    $x=0;
	    while($horario=mysqli_fetch_array($qHorarios, MYSQLI_BOTH))
	    {
	    
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
					<a href="horarios.php?Accion=U&IdHorario=<?= $horario["IdHorario"] ?>"><img src="../../imagenes/up.gif"/></a>
<?php 
                }
?>
				</td>

				<td class="col-1">
<?php 
                if ($x==($totalHorarios-1))
                {
?>
					&nbsp;
<?php 
                }
                else
                {
?>
					<a href="horarios.php?Accion=D&IdHorario=<?= $horario["IdHorario"] ?>"><img src="../../imagenes/down.gif"/></a>
<?php 
                }
?>
				</td>				
				
				<td class="col-1">
					<?= $horario["Hora"] ?>
				</td>
	   			
	   			<td class="col-1">
					<?= $horario["Lunes"] ?>
				</td>
				
				<td class="col-1">
					<?= $horario["Martes"] ?>
				</td>
				
				<td class="col-1">
					<?= $horario["Miercoles"] ?>
				</td>
				
				<td class="col-1">
					<?= $horario["Jueves"] ?>
				</td>
				
				<td class="col-1">
					<?= $horario["Viernes"] ?>
				</td>
			
				<td class="col-1">
	   				<a href="horarios.php?Accion=B&IdHorario=<?= $horario["IdHorario"] ?>"><img src="../../imagenes/modificar.gif"/></a>
	   			</td>
	   			
	   			<td class="col-1">
	   				<a href="horarios.php?Accion=E&IdHorario=<?= $horario["IdHorario"] ?>"><img src="../../imagenes/eliminar.gif"/></a>
	   			</td>
			
<?php 
                if ($_SESSION["tipo_usuario"] == 1){
?>
    				<td class="col-2 text-center">
    	   				<?= $horario["FechaModificacion"] ?>
    	   			</td>
<?php 
                }
?>
			</tr>
<?php    	
            $x++;
	    }
	    mysqli_free_result($qHorarios);
?>
	</table>
</form>	