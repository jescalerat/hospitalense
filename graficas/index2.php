<?
	$ruta = substr($_SERVER['SCRIPT_FILENAME'], 0, strrpos($_SERVER['SCRIPT_FILENAME'], '/'));
	$_SESSION["ruta"] = $ruta.="/";
	//Servidor local
	$_SESSION["rutaservidor"] = "http://".$_SERVER["SERVER_NAME"]."/hospitalense/";
	//Servidor internet
	//$_SESSION["rutaservidor"] = "http://".$_SERVER["SERVER_NAME"]."/";
	
	$rutajs = $_SESSION["rutaservidor"]."graficas/swfobject.js";
	print ("Rutajs: ".$rutajs);
	$rutaswf = $_SESSION["rutaservidor"]."graficas/ampie.swf";
	print ("<br>Rutaswf: ".$rutaswf);
	$rutapath = $_SESSION["rutaservidor"]."graficas/ampie/";
	print ("<br>Rutapath: ".$rutapath);
	$rutasettings = $_SESSION["rutaservidor"]."graficas/ampie_settings.xml";
	print ("<br>Rutasettings: ".$rutasettings);
	$rutadata = $_SESSION["rutaservidor"]."graficas/ampie_data.xml";
	print ("<br>Rutadata: ".$rutadata);

print("<script type=\"text/javascript\" src=".$rutajs."></script>");
  print("<!-- this id must be unique! -->");
	print("<div id=\"flashcontent\">");
		print("<strong>You need to upgrade your Flash Player</strong>");
	print("</div>");

	print("<script type=\"text/javascript\">");
		print("// <![CDATA[");
		print("var so = new SWFObject(".$rutaswf.", \"ampie\", \"500\", \"300\", \"8\", \"#FFFFFF\");");
		print("so.addVariable(\"path\", "/");");
		print("so.addVariable(\"settings_file\", encodeURIComponent(".$rutasettings."));");
		print("so.addVariable(\"data_file\", encodeURIComponent(".$rutadata."));");
		print("so.write(\"flashcontent2\");   // this id must match the div id above");
		print("// ]]>");
	print("</script>");
?>	
<!-- end of ampie script -->
