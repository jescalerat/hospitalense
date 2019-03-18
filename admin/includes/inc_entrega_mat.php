<?php
	$accion = "";
	
	if (isset($_GET['Accion']))
	{
	    $accion = $_GET['Accion'];	
	}
	
	$idCategoria="";
	if (isset($_GET['IdCategoria']))
	{
		$idCategoria = $_GET['IdCategoria'];	
	}
	else if (isset($_POST['IdCategoria']))
	{
		$idCategoria = $_POST['IdCategoria'];	
	}
	
	$idJugador="";
	if (isset($_GET['IdJugador']))
	{
		$idJugador = $_GET['IdJugador'];	
	}
	else if (isset($_POST['IdJugador']))
	{
		$idJugador = $_POST['IdJugador'];	
	}
	
	if ($accion == "A")
    {
  	     //Query
        $query="insert into jugador_material (IdJugador,IdMaterial,FechaEntrega) values (";
		$query.=$_GET['IdJugador'];
        $query.=",".$_GET['IdMaterial'];
        $query.=",'".date('Y/m/d')."')";

        mysqli_query ($link, $query);
		$accion = "M";
    }
    else if ($accion == "E")
    {
  	     //Query
        $query="delete from jugador_material where IdJugador=".$_GET['IdJugador']." and IdMaterial=".$_GET['IdMaterial'];
        mysqli_query ($link, $query);
		$accion = "A";
    }
?>

	<h1 class="text-center">ENTREGA MATERIAL</h1>

	<select class="form-control" name="categoria" onChange="location=this.options[this.selectedIndex].value">
		<option value="entrega_mat.php?IdCategoria=1">Categoria</option>

<?php
            //Query
            $query="select * from categoria where maestro=1 order by orden";
            $qcategorias=mysqli_query ($link, $query);

            while($categoriaSelect=mysqli_fetch_array($qcategorias, MYSQLI_BOTH))
            {
                $seleccionado = "";
                if ($categoriaSelect["IdCategoria"] == $idCategoria)
                {
                    $seleccionado = "selected";
                }
?>
					<option value="entrega_mat.php?IdCategoria=<?= $categoriaSelect["IdCategoria"] ?>" <?= $seleccionado ?>><?= $categoriaSelect["Categoria"] ?></option>
<?php
            }
            mysqli_free_result($qcategorias);
?>
	</select>

	<select class="form-control" name="jugador" onChange="location=this.options[this.selectedIndex].value">
		<option value="entrega_mat.php?IdCategoria=1">Jugador</option>

<?php
            //Query
            $query="select * from jugadores where IdCategoria=".$idCategoria." order by Nombre, Apellido1, Apellido2";
            $qJugadores=mysqli_query ($link, $query);

            while($jugadorSelect=mysqli_fetch_array($qJugadores, MYSQLI_BOTH))
            {
                $seleccionado = "";
                if ($jugadorSelect["IdJugador"] == $idJugador)
                {
                    $seleccionado = "selected";
                }
                $nombre = buscaJugador($jugadorSelect["IdJugador"], $link);
?>
					<option value="entrega_mat.php?IdCategoria=<?= $idCategoria ?>&IdJugador=<?= $jugadorSelect["IdJugador"] ?>" <?= $seleccionado ?>><?= $nombre ?></option>
<?php
            }
            mysqli_free_result($qJugadores);
?>
	</select>

<?php
	if ($idCategoria != "" && $idJugador != "")
	{ 
?>		
		<form role="form" id="entrega_material" method="post" action="entrega_mat.php">
			<input type="hidden" name="Accion" id="Accion" value=<?= $accion ?>>
			<input type="hidden" name="IdCategoria" id="IdCategoria" value=<?= $idCategoria ?>>
			<input type="hidden" name="IdJugador" id="IdJugador" value=<?= $idJugador ?>>

<?php			
			$nombreJugador = buscaJugador($idJugador, $link);
?>	
			<h2 class="text-center"><?= $nombreJugador ?></h2>

			<table class="table table-bordered">
           		<thead class="thead-dark">
        	   		<tr class="d-flex">
        	   			<th class="col-6 text-center">Material</th>
        	   			<th class="col-3 text-center">Entregado</th>
        	   			<th class="col-3 text-center">Fecha</th>
        	   		</tr>
        	   	</thead>

<?php
            //Query
			$query="select * from material order by Material";
			$qMateriales=mysqli_query ($link, $query);
			    
			while($material=mysqli_fetch_array($qMateriales, MYSQLI_BOTH))
			{
                //Query
			    $query="select * from jugador_material where IdJugador=".$idJugador." and IdMaterial=".$material["IdMaterial"];
                $qJugador=mysqli_query ($link, $query);
                $rowJugador=mysqli_fetch_array($qJugador);
						
				//Obtener el numero de filas devuelto
                $entregado=mysqli_num_rows($qJugador);

				$materialEntregado = "<img src=\"../../imagenes/desconfirmacion.gif\"/>";
				$fechaEntregado = "";
				$accion = "A";
				if ($entregado > 0)
				{
                    $materialEntregado = "<img src=\"../../imagenes/confirmacion.gif\"/>";
					$fechaEntregado = devolverFechaBBDD($rowJugador["FechaEntrega"]);
					$accion = "E";
				}
				mysqli_free_result($qJugador);
?>
				
				<tr class="d-flex">
					<td class="col-6">
						<?= $material["Material"] ?>
					</td>
					<td class="col-3 text-center">
						<a href="entrega_mat.php?Accion=<?= $accion ?>&IdMaterial=<?= $material["IdMaterial"] ?>&IdCategoria=<?= $idCategoria ?>&IdJugador=<?= $idJugador ?>"><?= $materialEntregado ?></a>
					</td>
					<td class="col-3 text-center">
						<?= $fechaEntregado ?>
					</td>
				</tr>
<?php    	
            }
            mysqli_free_result($qMateriales);
?>
			</table>
		</form>	
<?php
    }
?>	