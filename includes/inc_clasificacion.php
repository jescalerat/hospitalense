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
		<div class="container">
    		<ul class="nav nav-tabs">
        		<li class="nav-item">
        			<a class="nav-link <?php if ($tipo_clasificacion==0){print ("active");}?>" href="javascript:llamada_prototype('includes/inc_mostrar_clasificacion.php?tipo_clasificacion=0&IdCategoria=<?= $categoria ?>','ContTabul');CambiarEstilo('bt1');" id="bt1"><?= _TABTODO ?></a>
        		</li>
        		<li class="nav-item">
        			<a class="nav-link <?php if ($tipo_clasificacion==1){print ("active");}?>" href="javascript:llamada_prototype('includes/inc_mostrar_clasificacion.php?tipo_clasificacion=1&IdCategoria=<?= $categoria ?>','ContTabul');CambiarEstilo('bt2');" id="bt2"><?= _TABCASA ?></a>
        		</li>
        		<li class="nav-item">
        			<a class="nav-link <?php if ($tipo_clasificacion==2){print ("active");}?>" href="javascript:llamada_prototype('includes/inc_mostrar_clasificacion.php?tipo_clasificacion=2&IdCategoria=<?= $categoria ?>','ContTabul');CambiarEstilo('bt3');" id="bt3"><?= _TABFUERA ?></a>
        		</li>
        		<li class="nav-item">
        			<a class="nav-link <?php if ($tipo_clasificacion==3){print ("active");}?>" href="javascript:llamada_prototype('includes/inc_mostrar_clasificacion.php?tipo_clasificacion=3&IdCategoria=<?= $categoria ?>','ContTabul');CambiarEstilo('bt4');" id="bt4"><?= cambiarAcentos(_TAB1VUELTA) ?></a>
        		</li>
        		<li class="nav-item">
        			<a class="nav-link <?php if ($tipo_clasificacion==4){print ("active");}?>" href="javascript:llamada_prototype('includes/inc_mostrar_clasificacion.php?tipo_clasificacion=4&IdCategoria=<?= $categoria ?>','ContTabul');CambiarEstilo('bt5');" id="bt5"><?= cambiarAcentos(_TAB2VUELTA) ?></a>
        		</li>
    		</ul>
    	</div>
		<div id="ContTabul">
		<?php
			require_once("inc_mostrar_clasificacion.php");
		?>
		</div>	
	</form>

