	<table class="table table-bordered">
   		<thead class="thead-dark">
	   		<tr class="d-flex">
	   			<th class="col-1 text-center">&nbsp;</th>
	   			<th class="col-1 text-center">&nbsp;</th>
	   			<th class="col-3 text-center">T&iacute;tulo</th>
	   			<th class="col-3 text-center">Importe</th>
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
        $query="select * from economia where tipo=".$idTipoTabla." order by orden";
	    $qEconomia=mysqli_query ($link, $query);
	    $totalEconomia=mysqli_num_rows($qEconomia);
	
	    $x=0;
	    while($economia=mysqli_fetch_array($qEconomia, MYSQLI_BOTH))
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
					<a href="economia.php?Accion=U&IdEconomia=<?= $economia["IdEconomia"] ?>&IdTipo=<?= $idTipoTabla ?>"><img src="../../imagenes/up.gif"/></a>
<?php 
                }
?>
				</td>

				<td class="col-1">
<?php 
                if ($x==($totalEconomia-1))
                {
?>
					&nbsp;
<?php 
                }
                else
                {
?>
					<a href="economia.php?Accion=D&IdEconomia=<?= $economia["IdEconomia"] ?>&IdTipo=<?= $idTipoTabla ?>"><img src="../../imagenes/down.gif"/></a>
<?php 
                }
?>
				</td>				
				
				<td class="col-3">
					<?= $economia["ConceptoES"] ?>
				</td>
				
				<td class="col-3">
					<?= $economia["Importe"] ?>
				</td>

				<td class="col-1">
	   				<a href="economia.php?Accion=B&IdEconomia=<?= $economia["IdEconomia"] ?>&IdTipo=<?= $idTipoTabla ?>"><img src="../../imagenes/modificar.gif"/></a>
	   			</td>
	   			
	   			<td class="col-1">
	   				<a href="economia.php?Accion=E&IdEconomia=<?= $economia["IdEconomia"] ?>&IdTipo=<?= $idTipoTabla ?>"><img src="../../imagenes/eliminar.gif"/></a>
	   			</td>
			
<?php 
                if ($_SESSION["tipo_usuario"] == 1){
?>
    				<td class="col-2 text-center">
    	   				<?= $economia["Fecha"] ?>
    	   			</td>
<?php 
                }
?>
			</tr>
<?php    	
            $x++;
	    }
	    mysqli_free_result($qEconomia);
?>
	</table>
