<?php
	//Buscar equipos que tiene el campo
    $query="select e.IdEquipo, ec.IdCampo, e.NombreEquipo from ";
    $query.="equipos e left join equipo_campos ec on e.IdEquipo = ec.IdEquipo ";
    $query.="where ec.IdCampo=".$idCampo;
	$qbuscarequipos=mysqli_query ($link, $query);

?>	
	<table class="table">
		<div class="list-group">
<?php 
            while($equipo=mysqli_fetch_array($qbuscarequipos, MYSQLI_BOTH))
            {
?>		
    		<tr>
    			<td><a class="list-group-item list-group-item-action list-group-item-light" href="javascript:llamada_prototype('paginas/mostrar_equipos.php?equipo=<?= $equipo["IdEquipo"] ?>&campo=<?= $equipo["IdCampo"] ?>&volver=2','principal')"><?= cambiarAcentos($equipo["NombreEquipo"]) ?></a></td>
    		</tr>
<?php 
            }
            mysqli_free_result($qbuscarequipos);
?>
		</div>
	</table>