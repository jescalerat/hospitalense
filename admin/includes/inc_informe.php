<?php
	
    $idCategoria="";
	if (isset($_GET['IdCategoria']))
	{
		$idCategoria = $_GET['IdCategoria'];	
	}

?>

<h1 class="text-center">INFORME</h1>

	<select class="form-control" name="categoria" onChange="location=this.options[this.selectedIndex].value">
		<option value="informe.php?IdCategoria=1">Categoria</option>

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
					<option value="informe.php?IdCategoria=<?= $categoriaSelect["IdCategoria"] ?>" <?= $seleccionado ?>><?= $categoriaSelect["Categoria"] ?></option>
<?php
            }
            mysqli_free_result($qcategorias);
?>
	</select>


<?php
    if ($idCategoria != "")
	{ 
?>		
		<form role="form" id="informe" method="post" action="informe.php">
			<input type="hidden" name="IdCategoria" id="IdCategoria" value=<?=$idCategoria?>>

			<table class="table table-bordered">
           		<thead class="thead-dark">
        	   		<tr class="d-flex">
        	   			<th class="col-6 text-center">Material Entregado</th>
        	   			<th class="col-6 text-center">Material por Entregar</th>
        	   		</tr>
        	   	</thead>
				<tr class="d-flex">
					<td class="col-6">
						<table class="table table-bordered">
                       		<thead class="thead-light">
                    	   		<tr class="d-flex">
                    	   			<th class="col-6 text-center">Material</th>
                    	   			<th class="col-6 text-center">Jugadores</th>
                    	   		</tr>
                    	   	</thead>
<?php 
                            //Query
                            $query="select * from material";
                            $qMateriales=mysqli_query ($link, $query);
                            
                            while($material=mysqli_fetch_array($qMateriales, MYSQLI_BOTH))
                            {
?>
                				<tr class="d-flex">
                    					<td class="col-6">
                    						<?= $material["Material"] ?>
                    					</td>
                    					<td class="col-6">
<?php
										//Query
								        $query="select jug.Nombre, jug.Apellido1";
								        $query.=" from jugadores jug";
								        $query.=" where jug.IdCategoria = ".$idCategoria;
								        $query.=" and jug.IdJugador in (";
								        $query.=" select IdJugador from jugador_material where IdMaterial =".$material["IdMaterial"];
								        $query.=" )";
								        $query.=" order by jug.Nombre, jug.Apellido1";
										$qJugMateriales=mysqli_query ($link, $query);
										
										while($jugMaterial=mysqli_fetch_array($qJugMateriales, MYSQLI_BOTH))
										{
										    $nombreJugador = $jugMaterial["Nombre"]." ".$jugMaterial["Apellido1"];
?>
											<?= $nombreJugador ?>
											</br>
<?php 
										}
										mysqli_free_result($qJugMateriales);
?>
                    					
                    					</td>
                    			</tr>
<?php 
                            }
                            mysqli_free_result($qMateriales);
?>
                		</table>
					</td>
					<td class="col-6">
						<table class="table table-bordered">
                       		<thead class="thead-light">
                    	   		<tr class="d-flex">
                    	   			<th class="col-6 text-center">Material</th>
                    	   			<th class="col-6 text-center">Jugadores</th>
                    	   		</tr>
                    	   	</thead>
<?php 
                            //Query
                            $query="select * from material";
                            $qMateriales=mysqli_query ($link, $query);
                            
                            while($material=mysqli_fetch_array($qMateriales, MYSQLI_BOTH))
                            {
?>
                				<tr class="d-flex">
                    					<td class="col-6">
                    						<?= $material["Material"] ?>
                    					</td>
                    					<td class="col-6">
<?php
										//Query
								        $query="select jug.Nombre, jug.Apellido1";
								        $query.=" from jugadores jug";
								        $query.=" where jug.IdCategoria = ".$idCategoria;
								        $query.=" and jug.IdJugador not in (";
								        $query.=" select IdJugador from jugador_material where IdMaterial =".$material["IdMaterial"];
								        $query.=" )";
								        $query.=" order by jug.Nombre, jug.Apellido1";
										$qJugMateriales=mysqli_query ($link, $query);
										
										while($jugMaterial=mysqli_fetch_array($qJugMateriales, MYSQLI_BOTH))
										{
										    $nombreJugador = $jugMaterial["Nombre"]." ".$jugMaterial["Apellido1"];
?>
											<?= $nombreJugador ?>
											</br>
<?php 
										}
										mysqli_free_result($qJugMateriales);
?>
                    					
                    					</td>
                    			</tr>
<?php 
                            }
                            mysqli_free_result($qMateriales);
?>
                		</table>
					</td>
    			</tr>
    		</table>
		</form>	
<?php
	}
?>	