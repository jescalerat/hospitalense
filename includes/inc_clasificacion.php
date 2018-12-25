<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	//$nueva_ruta = $_SESSION["ruta"];
	//$nueva_ruta_sevidor = $_SESSION["rutaservidor"];
	/*if (!isset($link))
	{
		$nueva_ruta = "../";
		$nueva_ruta_sevidor = "../";
		require_once($nueva_ruta."conf/funciones.php");
		require_once($nueva_ruta."conf/conexion.php");
		require_once($nueva_ruta."conf/traduccion.php");
		$link=Conectarse();
	}*/

	if(isset($_GET['Jornada']))
	{
		$jornada=$_GET['Jornada'];
	}
	else
	{
		$jornada=0;
	}

	if (isset($_GET['tipo_clasificacion']))
	{
		$tipo_clasificacion=$_GET['tipo_clasificacion'];
		$_SESSION['tipo_clasificacion']=$_GET['tipo_clasificacion'];
	}
	else
	{
		if(!isset($_SESSION['tipo_clasificacion'])) 
		{ 
			$_SESSION['tipo_clasificacion']=0;
		}
		else
		{
			$tipo_clasificacion=$_SESSION['tipo_clasificacion'];
		}
	}
  
	if (isset($_GET['IdCategoria']))
	{
		$categoria=$_GET['IdCategoria'];
		$_SESSION['IdCategoria']=$_GET['IdCategoria'];
	}
	else
	{
		$categoria=$_SESSION['IdCategoria'];
	}	
  
	?>

	<h3 class="text-center"><?= cambiarAcentos(mb_strtoupper(_CLASIFICACION)) ?></h3>
	<form name="cambiar_boton" method="post">
		<ul id="tabnav">
    		<li class="<?php if ($tipo_clasificacion==0){print ("activo");}else{print ("inactivo");}?>" id="bt1"><a href="javascript:llamada_prototype('includes/inc_mostrar_clasificacion.php?tipo_clasificacion=0&IdCategoria=<?php print ($categoria);?>','ContTabul');CambiarEstilo('bt1');"><?php print (_TABTODO);?></a></li>
    		<li class="<?php if ($tipo_clasificacion==1){print ("activo");}else{print ("inactivo");}?>" id="bt2"><a href="javascript:llamada_prototype('includes/inc_mostrar_clasificacion.php?tipo_clasificacion=1&IdCategoria=<?php print ($categoria);?>','ContTabul');CambiarEstilo('bt2');"><?php print (_TABCASA);?></a></li>
    		<li class="<?php if ($tipo_clasificacion==2){print ("activo");}else{print ("inactivo");}?>" id="bt3"><a href="javascript:llamada_prototype('includes/inc_mostrar_clasificacion.php?tipo_clasificacion=2&IdCategoria=<?php print ($categoria);?>','ContTabul');CambiarEstilo('bt3');"><?php print (_TABFUERA);?></a></li>
    		<li class="<?php if ($tipo_clasificacion==3){print ("activo");}else{print ("inactivo");}?>" id="bt4"><a href="javascript:llamada_prototype('includes/inc_mostrar_clasificacion.php?tipo_clasificacion=3&IdCategoria=<?php print ($categoria);?>','ContTabul');CambiarEstilo('bt4');"><?php print (cambiarAcentos(_TAB1VUELTA));?></a></li>
    		<li class="<?php if ($tipo_clasificacion==4){print ("activo");}else{print ("inactivo");}?>" id="bt5"><a href="javascript:llamada_prototype('includes/inc_mostrar_clasificacion.php?tipo_clasificacion=4&IdCategoria=<?php print ($categoria);?>','ContTabul');CambiarEstilo('bt5');"><?php print (cambiarAcentos(_TAB2VUELTA));?></a></li>
		</ul>
		<div id="ContTabul">
		<?php
			require_once("inc_mostrar_clasificacion.php");
		?>
		</div>	
	</form>

