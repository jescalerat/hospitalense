	<table class="table table-bordered">
   		<thead class="thead-dark">
	   		<tr class="d-flex">
	   			<th class="col-1 text-center">&nbsp;</th>
	   			<th class="col-1 text-center">&nbsp;</th>
	   			<th class="col-2 text-center">Descripci&oacute;n</th>
	   			<th class="col-4 text-center">Formulario</th>
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
        $query="select * from formularios where idTipo=".$idTipoTabla." order by orden";
	    $qFormularios=mysqli_query ($link, $query);
	    $totalFormularios=mysqli_num_rows($qFormularios);
	
	    $x=0;
	    while($formulario=mysqli_fetch_array($qFormularios, MYSQLI_BOTH))
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
					<a href="formularios.php?Accion=U&IdFormulario=<?= $formulario["IdFormulario"] ?>&IdTipo=<?= $idTipoTabla ?>"><img src="../../imagenes/up.gif"/></a>
<?php 
                }
?>
				</td>

				<td class="col-1">
<?php 
                if ($x==($totalFormularios-1))
                {
?>
					&nbsp;
<?php 
                }
                else
                {
?>
					<a href="formularios.php?Accion=D&IdFormulario=<?= $formulario["IdFormulario"] ?>&IdTipo=<?= $idTipoTabla ?>"><img src="../../imagenes/down.gif"/></a>
<?php 
                }
?>
				</td>				
				
				<td class="col-2">
					<?= $formulario["DescripcionES"] ?>
				</td>
	   			
	   			<td class="col-4">
	   				<a href="#" onClick="window.open('../includes/subir_foto.php?idFormulario=<?= $formulario["IdFormulario"] ?>', '_blank')">Subir foto</a>
<?php
                    if ($formulario["Foto"] != ""){
?>
						<img src="../../imagenes/confirmacion.gif" height="42" width="42"/>
<?php
					} else {
?>
						<img src="../../imagenes/desconfirmacion.gif" height="42" width="42"/>
<?php
					}
?>    				
	   			</td>
			
				<td class="col-1">
	   				<a href="formularios.php?Accion=B&IdFormulario=<?= $formulario["IdFormulario"] ?>&IdTipo=<?= $idTipoTabla ?>"><img src="../../imagenes/modificar.gif"/></a>
	   			</td>
	   			
	   			<td class="col-1">
	   				<a href="formularios.php?Accion=E&IdFormulario=<?= $formulario["IdFormulario"] ?>&IdTipo=<?= $idTipoTabla ?>"><img src="../../imagenes/eliminar.gif"/></a>
	   			</td>
			
<?php 
                if ($_SESSION["tipo_usuario"] == 1){
?>
    				<td class="col-2 text-center">
    	   				<?= $formulario["Fecha"] ?>
    	   			</td>
<?php 
                }
?>
			</tr>
<?php    	
            $x++;
	    }
	    mysqli_free_result($qFormularios);
?>
	</table>
