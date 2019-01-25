<?php
	session_start();
	if (!isset($_SESSION['registrado']))
	{
		header("Location:login.php?abrirpagina=2");	
	}

	require_once("../includes/conexiones.php");

	if (isset($_GET['ideliminar']))
	{
		$query="delete from visitas where Id=".$_GET['ideliminar'];
		mysqli_query($link,$query);
	}

	$query="select * from visitas order by Fecha desc, Hora, IP order by Fecha limit 1";
	$query_fecha_actual=mysqli_query ($link, $query);
	$rowFechaActual=mysqli_fetch_array($query_fecha_actual);
	$fecha_actual=$rowFechaActual["Fecha"];
	mysqli_free_result($query_fecha_actual);
	
	//Query para comprobar las visitas que tengo
	$query="select * from visitas order by Fecha desc, Hora, IP order by Fecha";
	$query_visitas=mysqli_query($link, $query);
?>

	<h1 class="text-center">Visitas en Hospitalense</h1>
	
	<table class="table table-bordered">
   		<thead class="thead-dark">
	   		<tr class="d-flex">
				<th class="col-1 text-center">Eliminar</th>
	       		<th class="col-3 text-center">IP</th>
	       		<th class="col-3 text-center">Hora</th>
	       		<th class="col-3 text-center">Fecha</th>
	       		<th class="col-2 text-center">Idioma</th>
	       	</tr>
		</thead>
		
<?php 
        //Mostrar los valores de la base de datos
        while($visitas=mysqli_fetch_array($query_visitas, MYSQLI_BOTH))
        {
            //Query para mostrar el nombre en lugar de la IP
            $query="select * from usuarios where IP=\"".$visitas["IP"]."\"";
            $query_IP=mysqli_query ($link, $query);
            $rowIP=mysqli_fetch_array($query_IP);
            
            //Obtener el numero de filas devuelto
            $filas_IP=mysqli_num_rows($query_IP);
            mysqli_free_result($query_IP);
            
            if ($filas_IP>0)
            {
                $ip_usuario=$rowIP["Usuario"];
            }
            else
            {
                $ip_usuario=$visitas["IP"];
            }
            
            $fecha_futura=$visitas["Fecha"];
            if (strcmp($fecha_actual,$fecha_futura)!=0)
            {
                //Query para contar las visitas que tengo al dia
                $query="select count(Fecha) as visitas_dia from visitas where Fecha=\"".$fecha_actual."\"";
                $query_visitas_dia=mysql_query($query,$link);
                
                //Query para contar las visitas distintas que tengo al dia
                $query="select count(distinct IP) as visitas_dia_distintas from visitas where Fecha=\"".$fecha_actual."\"";
                $query_visitas_dis_dia=mysql_query($query,$link);
                
                print ("<tr bgcolor=green>");
                print ("<td><a href=comprobar_paginas_vistas.php?fecha=".$fecha_actual." target=_top>".$fecha_actual."</a>");
                print ("<td>Visitas dia:");
                print ("<td>".mysql_result($query_visitas_dia,0,"visitas_dia"));
                print ("<td>Visitas dia distintas:");
                print ("<td>".mysql_result($query_visitas_dis_dia,0,"visitas_dia_distintas"));
                $fecha_actual=mysql_result($query_visitas,$x,"Fecha");
            }
            
        }
?>
		print ("<center><h1>Visitas en Dinamico Batllo</h1>");
		//Query para comprobar las visitas que tengo
		$query="select * from visitas order by Fecha desc, Hora, IP";
		$query_visitas=mysql_query($query,$link);

		//Obtener el numero de filas devuelto
		$filas=mysql_num_rows($query_visitas);

		print ("<table width=100% border=1>");
			print ("<tr>");
				print ("<th width=12%> Eliminar");
				print ("<th width=22%> IP");
				print ("<th width=22%> Hora");
				print ("<th width=22%> Fecha");
				print ("<th width=22%> Idioma");


				$fecha_actual=mysql_result($query_visitas,0,"Fecha");
				for ($x=0; $x < $filas; $x++)
				{
					//Query para mostrar el nombre en lugar de la IP
					$query="select * from usuarios where IP=\"".mysql_result($query_visitas,$x,"IP")."\"";
					$query_IP=mysql_query($query,$link);

					//Obtener el numero de filas devuelto
					$filas_IP=mysql_num_rows($query_IP);

					if ($filas_IP>0)
					{
						$ip_usuario=mysql_result($query_IP,0,"Usuario");
					}
					else
					{
						$ip_usuario=mysql_result($query_visitas,$x,"IP");
					}
	
					$fecha_futura=mysql_result($query_visitas,$x,"Fecha");
					if (strcmp($fecha_actual,$fecha_futura)!=0)
					{
						//Query para contar las visitas que tengo al dia
						$query="select count(Fecha) as visitas_dia from visitas where Fecha=\"".$fecha_actual."\"";
						$query_visitas_dia=mysql_query($query,$link);

						//Query para contar las visitas distintas que tengo al dia
						$query="select count(distinct IP) as visitas_dia_distintas from visitas where Fecha=\"".$fecha_actual."\"";
						$query_visitas_dis_dia=mysql_query($query,$link);

						print ("<tr bgcolor=green>");
							print ("<td><a href=comprobar_paginas_vistas.php?fecha=".$fecha_actual." target=_top>".$fecha_actual."</a>");
							print ("<td>Visitas dia:");
							print ("<td>".mysql_result($query_visitas_dia,0,"visitas_dia"));
							print ("<td>Visitas dia distintas:");
							print ("<td>".mysql_result($query_visitas_dis_dia,0,"visitas_dia_distintas"));
						$fecha_actual=mysql_result($query_visitas,$x,"Fecha");
					}
					print ("<tr>");
						print ("<td><a href=comprobar_visitas.php?ideliminar=".mysql_result($query_visitas,$x,"IdVisita").">Eliminar</a>");
						print ("<td><a href=comprobar_paginas_vistas.php?fecha=".mysql_result($query_visitas,$x,"Fecha")."&IP=".mysql_result($query_visitas,$x,"IP").">".$ip_usuario);
						print ("<td>".mysql_result($query_visitas,$x,"Hora"));
						print ("<td>".mysql_result($query_visitas,$x,"Fecha"));
						print ("<td>".mysql_result($query_visitas,$x,"Idioma"));
				}

				//Query para contar las visitas que tengo al dia
				$query="select count(Fecha) as visitas_dia from visitas where Fecha=\"".$fecha_actual."\"";
				$query_visitas_dia=mysql_query($query,$link);

				//Query para contar las visitas distintas que tengo al dia
				$query="select count(distinct IP) as visitas_dia_distintas from visitas where Fecha=\"".$fecha_actual."\"";
				$query_visitas_dis_dia=mysql_query($query,$link);

				print ("<tr bgcolor=green>");
					print ("<td><a href=comprobar_paginas_vistas.php?fecha=".$fecha_actual.">".$fecha_actual."</a>");
					print ("<td>Visitas dia:");
					print ("<td>".mysql_result($query_visitas_dia,0,"visitas_dia"));
					print ("<td>Visitas dia distintas:");
					print ("<td>".mysql_result($query_visitas_dis_dia,0,"visitas_dia_distintas"));
		print ("</table>");

<?php 
    mysqli_free_result($query_visitas);
?>
