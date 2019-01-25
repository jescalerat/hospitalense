<?php
	//Buscar campos que tiene el equipo
    $query="select c.IdCampo, ec.IdEquipo, c.Nombre from ";
    $query.="campos c left join equipo_campos ec on c.IdCampo = ec.IdCampo ";
    $query.="where ec.IdEquipo=".$idEquipo;
	$qbuscarcampos=mysqli_query ($link, $query);

?>	
	<table class="table">
		<div class="list-group">
<?php 
            while($campo=mysqli_fetch_array($qbuscarcampos, MYSQLI_BOTH))
            {
?>		
    		<tr>
    			<td><a class="list-group-item list-group-item-action list-group-item-light" href="javascript:llamada_prototype('paginas/mostrar_campos.php?campo=<?= $campo["IdCampo"] ?>&equipo=<?= $campo["IdEquipo"] ?>&volver=2','principal')"><?= cambiarAcentos($campo["Nombre"]) ?></a></td>
    		</tr>
<?php 
            }
            mysqli_free_result($qbuscarcampos);
?>
		</div>
	</table>