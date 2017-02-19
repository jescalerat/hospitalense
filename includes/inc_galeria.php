<html class="fotoprincipal">
<head>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>

<link rel="stylesheet" href="../css/estilo.css">

</head>
<body class="fotoprincipal">
	<table class="tabla_sin_borde w100">
		<tr>
			<td class="tabla_sin_borde w10" valign="top">
				<a class="glidebutton" name="anchorcerrar" href="#" id="anchorcerrar" alt="<?php print(cambiarAcentos(_CERRARGALERIA));?>" title="<?php print(cambiarAcentos(_CERRARGALERIA));?>" onclick="parent.parent.GB_hide();">
					<span data-text="<?php print(cambiarAcentos(_CERRARGALERIA));?>"><?php print(cambiarAcentos(_CERRARGALERIA));?></span>
				</a>
				<input type="hidden" value="<?php print($_GET['IdGaleria'])?>" id="IdGaleria" name="IdGaleria">
			</td>
			<td class="tabla_sin_borde">
				<div id="fotoprincipal" name="fotoprincipal">
				</div>
			</td>
			<td class="tabla_sin_borde w20" valign="top">
				<table class="tabla_sin_borde w100" align="center">
					<tr>
						<td class="tabla_sin_borde">
								<?php print(cambiarAcentos(_AMPLIARFOTO));?>
						</td>
					</tr>
					<tr>
						<td class="tabla_sin_borde" align="center">
							<a class="glidebutton" name="anchor1280" href="#" id="anchor1280" alt="<?php print(cambiarAcentos(_AMPLIARFOTO12801024));?>" title="<?php print(cambiarAcentos(_AMPLIARFOTO12801024));?>" onclick="centrarpopup('<?php print($_SESSION["rutaservidor"]);?>includes/inc_foto_ampliada.php?altura=870&anchura=950', '', 1280, 1024); return false;">
								<span data-text="<?php print(cambiarAcentos(_AMPLIARFOTO12801024));?>"><?php print(cambiarAcentos(_AMPLIARFOTO12801024));?></span>
							</a>

						</td>
					</tr>
					<tr>
						<td class="tabla_sin_borde" align="center">
							<a class="glidebutton" name="anchor800" href="#" id="anchor800" alt="<?php print(cambiarAcentos(_AMPLIARFOTO800600));?>" title="<?php print(cambiarAcentos(_AMPLIARFOTO800600));?>" onclick="centrarpopup('<?php print($_SESSION["rutaservidor"]);?>includes/inc_foto_ampliada.php?altura=580&anchura=600', '', 800, 600); return false;">
								<span data-text="<?php print(cambiarAcentos(_AMPLIARFOTO800600));?>"><?php print(cambiarAcentos(_AMPLIARFOTO800600));?></span>
							</a>							
						</td>
					</tr>
				</table>				
			</td>
		</tr>
	</table>
	
	<div id="pasarela" name="pasarela">
	</div>
	
	<script>
		cambio_foto(0,0,0,<?php print($_SESSION['idiomapagina']);?>);
	</script>
</body>
</html>