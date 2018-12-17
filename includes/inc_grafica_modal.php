<a data-toggle="modal" data-target="#myModal<?= $x ?>">
	<img src="imagenes/icono_grafica.gif" alt="<?= cambiarAcentos(_GRAFICA) ?>" title="<?= cambiarAcentos(_GRAFICA) ?>" border="0">
</a>

<!-- Modal -->
<div class="modal fade" id="myModal<?= $x ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					<?= $nombreEquipo ?>
				</h4>
			</div>
			<div class="modal-body">
				<div id="chartContainer<?= $x ?>"></div>
<?php
                    $totalPartidos = $partidosGanados + $partidosEmpatados + $partidosPerdidos;
                                        
                    $tantoganados = ($partidosGanados * 100) / $totalPartidos;
                    $tantoempatados = ($partidosEmpatados * 100) / $totalPartidos;
                    $tantoperdidos = ($partidosPerdidos * 100) / $totalPartidos;

                    $dataPoints = array(
                        array("y" => $tantoganados, "legendText" => _GANADOS, "label" => _GANADOS),
                        array("y" => $tantoempatados, "legendText" => _EMPATADOS, "label" => _EMPATADOS),
                        array("y" => $tantoperdidos, "legendText" => _PERDIDOS, "label" => _PERDIDOS)
                    );
?>

<script type="text/javascript">
    $(function () {
        var chart = new CanvasJS.Chart("chartContainer<?= $x ?>", {
            title: {
                text: ""
            },
            animationEnabled: true,
            legend: {
                verticalAlign: "center",
                horizontalAlign: "left",
                fontSize: 20,
                fontFamily: "Helvetica"
            },
            theme: "light2",
            data: [
            {
                type: "pie",
                indexLabelFontFamily: "Garamond",
                indexLabelFontSize: 20,
                indexLabel: "{label} {y}%",
                startAngle: -20,
                showInLegend: true,
                toolTipContent: "{legendText} {y}%",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart.render();
    });
</script>


			</div>
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>


