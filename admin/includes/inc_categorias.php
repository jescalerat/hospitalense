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
	$tipo_usuario = $_SESSION['tipo_usuario'];
	
	$idCategoria="";
	$nombre="";
	$division="";
	$suben="";
	$promocionan="";
	$bajan="";
	$ascenso="";
	$descenso="";
	$puntos_ganar="";
	$puntos_empatar="";
	$puntos_perder="";

	if (isset($_POST['Nombre']) && $_POST['Nombre'] != "" && $accion == "A")
    {
	  	//Query
	    $query="select max(orden) as maxorden from categoria";
	    $qOrden=mysqli_query ($link, $query);
	    $rowOrden=mysqli_fetch_array($qOrden);
	    $orden = $rowOrden["maxorden"];
	    mysqli_free_result($qOrden);

	  	//Query
	    $query="insert into categoria (Categoria,Division,Suben,Promocionan,Bajan,Ascenso,Descenso,Ganados,Empatados,Perdidos,Orden) values (";
	    $query.="'".$_POST['Nombre']."'";
	    $query.=",'".$_POST['Division']."'";
	    $query.=",".$_POST['Suben'];
	    $query.=",".$_POST['Promocionan'];
	    $query.=",".$_POST['Bajan'];
	    $query.=",'".$_POST['Ascenso']."'";
	    $query.=",'".$_POST['Descenso']."'";
	    $query.=",".$_POST['PGanar'];
	    $query.=",".$_POST['PEmpatar'];
	    $query.=",".$_POST['PPerder'];
	    $query.=",".$orden.")";
    
	    mysqli_query ($link, $query);
    }
    else if ($accion == "M")
    {
	  	//Query
	    $query="update categoria set Categoria='".$_POST['Nombre']."'";
	    $query.=", Division='".$_POST['Division']."'";
	    $query.=", Suben=".$_POST['Suben'];
	    $query.=", Promocionan=".$_POST['Promocionan'];
	    $query.=", Bajan=".$_POST['Bajan'];
	    $query.=", Ascenso='".$_POST['Ascenso']."'";
	    $query.=", Descenso='".$_POST['Descenso']."'";
	    $query.=", Ganados=".$_POST['PGanar'];
	    $query.=", Empatados=".$_POST['PEmpatar'];
	    $query.=", Perdidos=".$_POST['PPerder'];
	    $query.=" where IdCategoria=".$_POST['IdCategoria'];
	    mysqli_query ($link, $query);
	    $accion = "A";
    }
    else if ($accion == "B")
    {
  	    //Query
        $query="select * from categoria where IdCategoria=".$_GET['IdCategoria'];
		$qCategoria=mysqli_query ($link, $query);
		$rowCategoria=mysqli_fetch_array($qCategoria);

		$idCategoria = $rowCategoria["IdCategoria"];
		$nombre = $rowCategoria["Categoria"];
		$division = $rowCategoria["Division"];
		$suben = $rowCategoria["Suben"];
		$promocionan = $rowCategoria["Promocionan"];
		$bajan = $rowCategoria["Bajan"];
		$ascenso = $rowCategoria["Ascenso"];
		$descenso = $rowCategoria["Descenso"];
		$puntos_ganar = $rowCategoria["Ganados"];
		$puntos_empatar = $rowCategoria["Empatados"];
		$puntos_perder = $rowCategoria["Perdidos"];
		$accion = "M";
		mysqli_free_result($qCategoria);
    }
    else if ($accion == "E")
    {
  	    //Query
        $query="delete from categoria where IdCategoria=".$_GET['IdCategoria'];
        mysqli_query ($link, $query);
		$accion = "A";
    }
    else if ($accion == "U")
    {
        $query="select * from categoria where IdCategoria=".$_GET['IdCategoria'];
		$qAnt=mysqli_query ($link, $query);
		$rowAnt=mysqli_fetch_array($qAnt);
		
		$idCategoriaAnt = $rowAnt["IdCategoria"];
		$ordenAnt = $rowAnt["Orden"];
		mysqli_free_result($qAnt);
		
		$cambioOrdenAnt = $ordenAnt - 1;
		
		$query="select * from categoria where Orden=".$cambioOrdenAnt;
		$qPost=mysqli_query ($link, $query);
		$rowPost=mysqli_fetch_array($qPost);
		
		$idCategoriaPost = $rowPost["IdCategoria"];
		$ordenPost = $rowPost["Orden"];
		mysqli_free_result($qPost);
		
		$cambioOrdenPost = $ordenPost + 1;
		
		$query="update categoria set Orden=".$cambioOrdenAnt;
        $query.=" where IdCategoria=".$idCategoriaAnt;
        mysqli_query ($link, $query);
		
		$query="update categoria set Orden=".$cambioOrdenPost;
        $query.=" where IdCategoria=".$idCategoriaPost;
        mysqli_query ($link, $query);
        
        $accion = "A";
    }
    else if ($accion == "D")
    {
        $query="select * from categoria where IdCategoria=".$_GET['IdCategoria'];
        $qAnt=mysqli_query ($link, $query);
        $rowAnt=mysqli_fetch_array($qAnt);
        
        $idCategoriaAnt = $rowAnt["IdCategoria"];
        $ordenAnt = $rowAnt["Orden"];
        mysqli_free_result($qAnt);
        
        $cambioOrdenAnt = $ordenAnt + 1;
        
        $query="select * from categoria where Orden=".$cambioOrdenAnt;
        $qPost=mysqli_query ($link, $query);
        $rowPost=mysqli_fetch_array($qPost);
        
        $idCategoriaPost = $rowPost["IdCategoria"];
        $ordenPost = $rowPost["Orden"];
        mysqli_free_result($qPost);
        
        $cambioOrdenPost = $ordenPost - 1;
        
        $query="update categoria set Orden=".$cambioOrdenAnt;
        $query.=" where IdCategoria=".$idCategoriaAnt;
        mysqli_query ($link, $query);
        
        $query="update categoria set Orden=".$cambioOrdenPost;
        $query.=" where IdCategoria=".$idCategoriaPost;
        mysqli_query ($link, $query);
        
        $accion = "A";
  }
?>
<h1 class="text-center">CATEGORIAS</h1>
<form action="categorias.php" method="post" name="categoria" id="categoria">
	<input type="hidden" name="Accion" id="Accion" value=<?= $accion ?>>
	<input type="hidden" name="IdCategoria" id="IdCategoria" value=<?= $idCategoria ?>>
	<table class="table">
   		<tr class="d-flex">
			<td class="col-2 text-right">Nombre:</td>
       		<td class="col-4 text-center"><input type="text" class="form-control" size="20" name="Nombre" id="Nombre" value="<?= $nombre ?>"></td>
       		<td class="col-2 text-right">Division:</td>
       		<td class="col-4 text-center"><input type="text" class="form-control" size="20" name="Division" id="Division" value="<?= $division ?>"></td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-2 text-right">Suben:</td>
       		<td class="col-4 text-center"><input type="text" class="form-control" size="20" name="Suben" id="Suben" value="<?= $suben ?>"></td>
       		<td class="col-2 text-right">Promocionan:</td>
       		<td class="col-4 text-center"><input type="text" class="form-control" size="20" name="Promocionan" id="Promocionan" value="<?= $promocionan ?>"></td>
       	</tr>

       	<tr class="d-flex">
			<td class="col-2 text-right">Bajan:</td>
       		<td class="col-4 text-center"><input type="text" class="form-control" size="20" name="Bajan" id="Bajan" value="<?= $bajan ?>"></td>
       		<td class="col-6 text-right">&nbsp;</td>
       	</tr>

       	<tr class="d-flex">
			<td class="col-2 text-right">Ascenso:</td>
       		<td class="col-4 text-center"><input type="text" class="form-control" size="20" name="Ascenso" id="Ascenso" value="<?= $ascenso ?>"></td>
       		<td class="col-2 text-right">Descenso:</td>
       		<td class="col-4 text-center"><input type="text" class="form-control" size="20" name="Descenso" id="Descenso" value="<?= $descenso ?>"></td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-2 text-right">Puntos Ganar:</td>
       		<td class="col-4 text-center"><input type="text" class="form-control" size="20" name="PGanar" id="PGanar" value="<?= $puntos_ganar ?>"></td>
       		<td class="col-2 text-right">Puntos Empatar:</td>
       		<td class="col-4 text-center"><input type="text" class="form-control" size="20" name="PEmpatar" id="PEmpatar" value="<?= $puntos_empatar ?>"></td>
       	</tr>
	
		<tr class="d-flex">
			<td class="col-2 text-right">Puntos Perder:</td>
       		<td class="col-4 text-center"><input type="text" class="form-control" size="20" name="PPerder" id="PPerder" value="<?= $puntos_perder ?>"></td>
       		<td class="col-6 text-right">&nbsp;</td>
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
	   			<th class="col-2 text-center">&nbsp;</th>
	   			<th class="col-2 text-center">&nbsp;</th>
	   			<th class="col-4 text-center">Categoria</th>
	   			<th class="col-2 text-center">Modificar</th>
	   			<th class="col-2 text-center">Eliminar</th>
   			</tr>  
   		</thead>
<?php
	  	//Query
        $query="select * from categoria where maestro=1 order by orden";
	    $qcategorias=mysqli_query ($link, $query);
	    $totalcategorias=mysqli_num_rows($qcategorias);
	    
	    $x=0;
	    while($categoria=mysqli_fetch_array($qcategorias, MYSQLI_BOTH))
	    {
?>
			<tr class="d-flex">
	   			<td class="col-2 text-center">
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
					<a href="categorias.php?Accion=U&IdCategoria=<?= $categoria["IdCategoria"] ?>"><img src="../../imagenes/up.gif"/></a>
<?php
				}
?>
	   			</td>
	   			<td class="col-2 text-center">
<?php
                if ($x==($totalcategorias-1))
				{
?>
					&nbsp;
<?php
				}
				else
				{
?>
					<a href="categorias.php?Accion=D&IdCategoria=<?= $categoria["IdCategoria"] ?>"><img src="../../imagenes/down.gif"/></a>
<?php
				}
?>
	   			</td>
	   			<td class="col-4 text-center"><?= $categoria["Categoria"] ?></td>
	   			<td class="col-2 text-center">
	   				<a href="categorias.php?Accion=B&IdCategoria=<?= $categoria["IdCategoria"] ?>"><img src="../../imagenes/modificar.gif"/></a>
	   			</td>
	   			<td class="col-2 text-center">
	   				<a href="categorias.php?Accion=E&IdCategoria=<?= $categoria["IdCategoria"] ?>"><img src="../../imagenes/eliminar.gif"/></a>
	   			</td>
   			</tr>  	
<?php 
            $x++;
	    }
	    mysqli_free_result($qcategorias);
?>   		
   	</table>	   	
</form>	