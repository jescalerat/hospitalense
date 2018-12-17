<?php
  session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="StyleSheet" href="../css/plantilla.css" title="hoja de estilo" media="Screen" type="text/css"/>
<title>Grafica</title>
</head>

<body>
<?php
    require_once("../conf/funciones.php");
	require_once("../conf/traduccion.php");
    require_once("../conf/conexion.php");
    $link=Conectarse();
    //mysqli_query ("SET NAMES 'utf8'");


	$id=$_GET['idequipo'];
    $jornada=$_GET['Jornada'];
	$tipo_clasificacion=$_GET['tipoclasificacion'];
	$categoria=$_GET['IdCategoria'];
	 
	 //Query
    $query="Select * from liga where Equipo1=".$id." and IdCategoria=".$categoria;
    $q=mysqli_query ($link, $query);
    $rowliga=mysqli_fetch_array($q);
    $SubCategoriaEquipo=$rowliga["SubCategoriaLocal"];

    //Borrar la clasificacion anterior
    $query="delete from clasificacion";
    mysqli_query ($link, $query);

	//Llamamos a la creación de la clasificacion
	setClasificacion($jornada,$tipo_clasificacion,$categoria,$link);
	
	//Query
    $query="select * from clasificacion where IdEquipo=".$id;
    $q=mysqli_query ($link, $query);
    $rowclasificacion=mysqli_fetch_array($q);
  
    //Query
    $query="select * from equipos where IdEquipo=".$id;
    $qequipo=mysqli_query ($link, $query);
    $rowequipo=mysqli_fetch_array($qequipo);
  
    $nombreequipo = $rowequipo["NombreEquipo"]." '".$SubCategoriaEquipo."'";

	$archivodatos = "datos/ampie_data".$id.".xml";
	$fp = fopen($archivodatos, "w");
	$string = "\n <pie>";
	$string .= "\n <slice title=\""._GANADOS."\" pull_out=\"false\">".$rowclasificacion["Ganados"]."</slice>";
	$string .= "\n <slice title=\""._EMPATADOS."\" pull_out=\"false\">".$rowclasificacion["Empatados"]."</slice>";
	$string .= "\n <slice title=\""._PERDIDOS."\" pull_out=\"false\">".$rowclasificacion["Perdidos"]."</slice>";
	$string .= "\n </pie>";
	$write = fputs($fp, $string);
	fclose($fp);
	
	$archivosettings = "datos/ampie_settings".$id.".xml";
	$fp = fopen($archivosettings, "w");
	$string = "\n <?xml version=\"1.0\" encoding=\"UTF-8\"?>";
	$string .= "\n <settings>";
	$string .= "\n <data_type>xml</data_type>";
	$string .= "\n <skip_rows>1</skip_rows>";
	$string .= "\n <pie>";
	$string .= "\n <radius>90</radius>";
	$string .= "\n <height>0</height>";
	$string .= "\n <angle>0</angle>";
	$string .= "\n <colors>#1E07E2,#FFFF80,#E21E07</colors>";
	$string .= "\n </pie>";
	$string .= "\n <animation>";
	$string .= "\n <start_time>2</start_time>";
	$string .= "\n <start_effect>strong</start_effect>";
	$string .= "\n <sequenced>true</sequenced>";
	$string .= "\n <pull_out_on_click>false</pull_out_on_click>";
	$string .= "\n </animation>";
	$string .= "\n <data_labels>";
	$string .= "\n <show><![CDATA[{title}: {percents}%]]></show>";
	$string .= "\n </data_labels>";
	$string .= "\n <balloon>";
	$string .= "\n <text_color>#000000</text_color>";
	$string .= "\n <alpha>80</alpha>";
	$string .= "\n </balloon>";
	$string .= "\n <legend>";
	$string .= "\n <border_alpha>20</border_alpha>";
	$string .= "\n <spacing>9</spacing>";
	$string .= "\n <margins>5</margins>";
	$string .= "\n <align>center</align>";
	$string .= "\n </legend>";
	$string .= "\n <context_menu>";
	$string .= "\n <default_items>";
	$string .= "\n <zoom>false</zoom>";
	$string .= "\n <print>false</print>";
	$string .= "\n </default_items>";
	$string .= "\n </context_menu>";
	$string .= "\n <labels>";
	$string .= "\n <label lid=\"0\">";
	$string .= "\n <x>0</x>";
	$string .= "\n <y>10</y> ";
	$string .= "\n <rotate>false</rotate>";
	$string .= "\n <align>center</align>";
	$string .= "\n <text_size>12</text_size>";
	$string .= "\n <text><![CDATA[<b>".$nombreequipo."</b>]]></text>";
	$string .= "\n </label>";
	$string .= "\n </labels>";
	$string .= "\n </settings>";
	$write = fputs($fp, $string);
	fclose($fp);
	?>
	<table border="0" width="100%">
		<tr>
			<td>
				<center>
				
<!-- saved from url=(0013)about:internet -->
<!-- ampie script-->
  <script type="text/javascript" src="swfobject.js"></script>
	<div id="flashcontent">
		<strong>You need to upgrade your Flash Player</strong>
	</div>

	<script type="text/javascript">
		// <![CDATA[		
		var so = new SWFObject("ampie.swf", "ampie", "520", "400", "8", "#FFFFFF");
		so.addVariable("path", "/");
		//so.addVariable("settings_file", encodeURIComponent("ampie_settings.xml"));                // you can set two or more different settings files here (separated by commas)
		//so.addVariable("data_file", encodeURIComponent("ampie_data.xml"));
		<?print ("so.addVariable(\"settings_file\", encodeURIComponent(\"".$archivosettings."\"));");?>
		<?print ("so.addVariable(\"data_file\", encodeURIComponent(\"".$archivodatos."\"));");?>
    		
//	so.addVariable("chart_data", encodeURIComponent("<settings>...</settings>"));                   // you can pass chart data as a string directly from this file
//	so.addVariable("chart_settings", encodeURIComponent("data in CSV or XML format"));              // you can pass chart settings as a string directly from this file
//	so.addVariable("additional_chart_settings", encodeURIComponent("<settings>...</settings>"));    // you can append some chart settings to the loaded ones
//  so.addVariable("loading_settings", "LOADING SETTINGS");                                         // you can set custom "loading settings" text here
//  so.addVariable("loading_data", "LOADING DATA");                                                 // you can set custom "loading data" text here
//  so.addVariable("preloader_color", "#999999");
//  so.addVariable("error_loading_file", "ERROR LOADING FILE");                                     // you can set custom "error loading file" text here
		so.write("flashcontent");
		// ]]>
	</script>
<!-- end of ampie script -->

		<tr>
			<td valign="top">
				<center>
				<a name="anchorcerrar" href="#" id="anchorcerrar" onclick="parent.parent.GB_hide();">
						<?print(cambiarAcentos(_VOLVERCLASIFICACION));?>
				</a>

</table>
</body>
</html>
