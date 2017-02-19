<?php
$any_min=2007;
$any_max=2008;
$temporada_actual=1;
function Conectarse()
{
	//Conexión localhost
	//if (!($link=mysql_connect("localhost","root","")))
  ////Conexión web byethost32.com
  //if (!($link=mysql_connect("sql111.byetcluster.com","b32_4344112","torres")))
  //Conexión web 1and1
  /*if (!($link=mysql_connect("db393887321.db.1and1.com","dbo393887321","Torres2008")))
	{
		echo "Error conectando a la base de datos.";
		exit();
	}

  //Nombre base de datos localhost
	//if (!mysql_select_db("hospitalense",$link))
  //Nombre base de datos byethost32.com
  //if (!mysql_select_db("b32_4344112_hospitalense",$link))
  //Nombre base de datos 1and1
  if (!mysql_select_db("db393887321",$link))
	{
		echo "Error seleccionando la base de datos.";
		exit();
	}
	
	//mysql_query ("SET NAMES 'utf8'");
	return $link;
	*/
	//Conexión localhost
	$enlace = mysqli_connect("localhost","root","", "Hospitalense");
	//Conexión web 1and1
	//$enlace = mysqli_connect("db393887321.db.1and1.com","dbo393887321","Torres2008", "db393887321");

	if (!$enlace) {
		echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	
	mysqli_query ($enlace, "SET NAMES 'utf8'");
	return $enlace;
}
?>
