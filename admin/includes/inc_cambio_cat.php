<?php
    $accion = "";
	
	if (isset($_GET['Accion']))
	{
		$accion = $_GET['Accion'];	
	}
	
	$idCategoriaAnt="";
	if (isset($_GET['IdCategoriaAnt']))
	{
		$idCategoriaAnt = $_GET['IdCategoriaAnt'];	
	}
	else if (isset($_POST['IdCategoriaAnt']))
	{
		$idCategoriaAnt = $_POST['IdCategoriaAnt'];	
	}
	
	$mensaje="";
	if ($accion == "M")
    {
        //Query
        $query="update jugadores set IdCategoria=".$_GET['IdCategoria'];
		$query.=",FechaModificacion=now()";
		$query.=" where IdJugador=".$_GET['IdJugador']." and IdCategoria=".$_GET['IdCategoriaAnt'];
		mysqli_query ($link, $query);
		$accion = "M";
		
		$query="select * from categoria where IdCategoria=".$_GET['IdCategoria'];
		$qCategoria=mysqli_query ($link, $query);
		$rowCategoria=mysqli_fetch_array($qCategoria);
		$categoria = $rowCategoria["Categoria"];
		
		$jugador = buscaJugador($_GET['IdJugador'], $link);
		
		$mensaje = $jugador." ha sido cambiado a ".$categoria;
		mysqli_free_result($qCategoria);

    }
?>

	<h1 class="text-center">CAMBIO CATEGORIA</h1>

	<select class="form-control" name="categoria" onChange="location=this.options[this.selectedIndex].value">
		<option value="cambio_cat.php?IdCategoriaAnt=1">Categoria</option>

<?php
            //Query
            $query="select * from categoria where maestro=1 order by orden";
            $qcategorias=mysqli_query ($link, $query);

            while($categoriaSelect=mysqli_fetch_array($qcategorias, MYSQLI_BOTH))
            {
                $seleccionado = "";
                if ($categoriaSelect["IdCategoria"] == $idCategoriaAnt)
                {
                    $seleccionado = "selected";
                }
?>
					<option value="cambio_cat.php?IdCategoriaAnt=<?= $categoriaSelect["IdCategoria"] ?>" <?= $seleccionado ?>><?= $categoriaSelect["Categoria"] ?></option>
<?php
            }
            mysqli_free_result($qcategorias);
?>
	</select>

<?php
    if ($idCategoriaAnt != "")
	{ 
		if ($mensaje != "")
		{
?>
			<p class="text-center"><?= cambiarAcentos($mensaje) ?></p>
<?php 
	   }
?>		
		
		<form role="form" id="cambio_categoria" method="post" action="cambio_cat.php">
			<input type="hidden" name="Accion" id="Accion" value=<?= $accion ?>>
			<input type="hidden" name="IdCategoriaAnt" id="IdCategoriaAnt" value=<?= $idCategoriaAnt ?>>

			<table class="table table-bordered">
           		<thead class="thead-dark">
        	   		<tr class="d-flex">
        	   			<th class="col-6 text-center">Jugador</th>
        	   			<th class="col-6 text-center">Categoria</th>
        	   		</tr>
        	   	</thead>

<?php
                //Query
			    $query="select * from jugadores where IdCategoria=".$idCategoriaAnt." order by Nombre, Apellido1, Apellido2";
			    $qJugadores=mysqli_query ($link, $query);
			
			    while($jugador=mysqli_fetch_array($qJugadores, MYSQLI_BOTH))
			    {
			        $nombreJugador = buscaJugador($jugador["IdJugador"], $link);
?>
						
					<tr class="d-flex">
    					<td class="col-6">
    						<?= $nombreJugador ?>
    					</td>
    					<td class="col-6">
                        	<select class="form-control" name="categoria" onChange="location=this.options[this.selectedIndex].value">
                        		<option value="cambio_cat.php?IdCategoria=1">Categoria</option>
<?php
                                //Query
                                $query="select * from categoria where maestro=1 order by orden";
                                $qcategorias=mysqli_query ($link, $query);
                    
                                while($categoriaSelect=mysqli_fetch_array($qcategorias, MYSQLI_BOTH))
                                {
?>
									<option value="cambio_cat.php?IdCategoria=<?= $categoriaSelect["IdCategoria"] ?>&IdCategoriaAnt=<?= $idCategoriaAnt ?>&IdJugador=<?= $jugador["IdJugador"] ?>&Accion=M"><?= $categoriaSelect["Categoria"] ?></option>
<?php
                                }
                                mysqli_free_result($qcategorias);
?>
							</select>
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