<?php
	

	if (isset($_GET['ideliminar']))
	{
		$query="delete from paginasvistas where IdPaginasVistas=".$_GET['ideliminar'];
		mysqli_query($link,$query);
	}

	$titulo = "";
	$parametros = "";
	if (isset($_GET['IP']))
	{
	    $query="select * from paginasvistas where IP=\"".$_GET['IP']."\" and Fecha=\"".$_GET['fecha']."\" order by Fecha desc, Hora, IP";
	    $titulo = "Fecha: ".$_GET['fecha']." IP: ".$_GET['IP'];
	    $parametros .= "&IP=".$_GET['IP']."&fecha=".$_GET['fecha'];
	}
	else if (isset($_GET['fecha']))
	{
	    $query="select * from paginasvistas where Fecha=\"".$_GET['fecha']."\" order by Fecha desc, Hora, IP";
	    $titulo = "Fecha: ".devolverFechaBBDD($_GET['fecha']);
	    $parametros .= "&fecha=".$_GET['fecha'];
	}
	else
	{
	    $query="select * from paginasvistas order by Fecha desc, Hora, IP limit 500";
	}
	
	//Query para comprobar las visitas que tengo
	$query_paginas_vistas=mysqli_query($link, $query);
?>

	<h1 class="text-center">Paginas vistas en Hospitalense</h1>
<?php 
    if ($titulo != ""){
?>
		<h3 class="text-center"><?= $titulo ?></h3>
<?php
    }
?>	
	
	<table class="table table-bordered">
   		<thead class="thead-dark">
	   		<tr class="d-flex">
				<th class="col-2 text-center">Eliminar</th>
	       		<th class="col-2 text-center">IP</th>
	       		<th class="col-2 text-center">Hora</th>
	       		<th class="col-2 text-center">Fecha</th>
	       		<th class="col-2 text-center">Pagina</th>
	       		<th class="col-2 text-center">Jornada-Equipo</th>
	       	</tr>
		</thead>
		
<?php 
        //Mostrar los valores de la base de datos
        while($paginas=mysqli_fetch_array($query_paginas_vistas, MYSQLI_BOTH))
        {
            //Query para mostrar el nombre en lugar de la IP
            $query="select * from usuarios where IP=\"".$paginas["IP"]."\"";
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
                $ip_usuario=$paginas["IP"];
            }
            
            $pagina_vista="";
            $estilo = "";
            $jornada_equipo = "0";
            if ($paginas["Pagina"]==0)
            {
                $pagina_vista="Principal";
            }
            else if ($paginas["Pagina"]==1)
            {
                $pagina_vista="Club";
            }
            else if ($paginas["Pagina"]==2)
            {
                $pagina_vista="Resultados";
            }
            else if ($paginas["Pagina"]==3)
            {
                $pagina_vista="Clasificacion";
            }
            else if ($paginas["Pagina"]==4)
            {
                $pagina_vista="Equipos";
            }
            else if ($paginas["Pagina"]==5)
            {
                $pagina_vista="Contactar";
                $estilo = "bgcolor=\"red\"";
            }
            else if ($paginas["Pagina"]==52)
            {
                $pagina_vista="Contactar enviado";
                $estilo = "bgcolor=\"red\"";
            }
            else if ($paginas["Pagina"]==6)
            {
                $pagina_vista="Campos";
            }
            else if ($paginas["Pagina"]==7)
            {
                $pagina_vista="Estadisticas";
            }
            else if ($paginas["Pagina"]==8)
            {
                $pagina_vista="Goleadores";
            }
            else if ($paginas["Pagina"]==9)
            {
                $pagina_vista="Mostrar equipos";
            }
            else if ($paginas["Pagina"]==10)
            {
                $pagina_vista="Mostrar campos";
            }
            else if ($paginas["Pagina"]==11)
            {
                $pagina_vista="Campus";
            }
            else if ($paginas["Pagina"]==12)
            {
                $pagina_vista="Torneo";
            }
            else if ($paginas["Pagina"]==13)
            {
                $pagina_vista="Horarios";
            }
            else if ($paginas["Pagina"]==14)
            {
                $pagina_vista="Historia";
            }
            else if ($paginas["Pagina"]==15)
            {
                $pagina_vista="Directiva";
            }
            else if ($paginas["Pagina"]==16)
            {
                $pagina_vista="Himno";
            }
            else if ($paginas["Pagina"]==17)
            {
                $pagina_vista="Socio";
            }
            else if ($paginas["Pagina"]==18)
            {
                $pagina_vista="Formularios";
            }
            else if ($paginas["Pagina"]==19)
            {
                $pagina_vista="Economia";
            }
            else if ($paginas["Pagina"]==20)
            {
                $pagina_vista="Plantillas";
            }
            else if ($paginas["Pagina"]==21)
            {
                $pagina_vista="Galeria";
            }
            else if ($paginas["Pagina"]==22)
            {
                $pagina_vista="Regimen Interno";
            }
            else if ($paginas["Pagina"]==23)
            {
                $pagina_vista="Estatuto";
            }
            else if ($paginas["Pagina"]==24)
            {
                $pagina_vista="Paginas Amigas";
            }
            
            //Comprobar que tipo de categoria y jornada se ha visitado
            if ($paginas["Pagina"]==2){
                $cortar=explode('-',$paginas["JornadaEquipo"]);
                $categoria=$cortar[0]+0;
                $jornada=$cortar[1]+0;
                
                $query="select * from categoria where IdCategoria=".$categoria;
                $query_categoria=mysqli_query ($link, $query);
                $rowCategoria=mysqli_fetch_array($query_categoria);
                $jornada_equipo=$rowCategoria["Categoria"];
                mysqli_free_result($query_categoria);
                
                if ($jornada!=0)
                {
                    $jornada_equipo.="<br>Jornada: ".$jornada;
                }
            }
            //Comprobar que tipo de clasificacion se ha visitado
            else if($paginas["Pagina"]==3)
            {
                $cortar=explode('-',$paginas["JornadaEquipo"]);
                $tipo=$cortar[0]+0;
                $categoria=$cortar[1]+0;
                $jornada=$cortar[2]+0;
             
                if ($tipo==0)
                {
                    $jornada_equipo="Todo";
                }
                else if ($tipo==110)
                {
                    $jornada_equipo="Partidos casa";
                }
                else if ($tipo==120)
                {
                    $jornada_equipo="Partidos fuera";
                }
                else if ($tipo==130)
                {
                    $jornada_equipo="Partidos 1ª vuelta";
                }
                else if ($tipo==140)
                {
                    $jornada_equipo="Partidos 2ª vuelta";
                }
             
                $query="select * from categoria where IdCategoria=".$categoria;
                $query_categoria=mysqli_query ($link, $query);
                $rowCategoria=mysqli_fetch_array($query_categoria);
                $jornada_equipo.="<br>".$rowCategoria["Categoria"];
                mysqli_free_result($query_categoria);
                
                if ($jornada!=0)
                {
                    $jornada_equipo.="<br>Jornada: ".$jornada;
                }
            }
            //Comprobar que partido se ha visitado
            else if ($paginas["Pagina"]==8){
                if ($paginas["JornadaEquipo"]!=0){
                    $query="select * from liga where IdLiga=\"".$paginas["JornadaEquipo"]."\"";
                    $query_partido=mysqli_query ($link, $query);
                    $rowPartido=mysqli_fetch_array($query_partido);
                    $equipo1=buscaEquipo($rowPartido["Equipo1"], $link);
                    $equipo2=buscaEquipo($rowPartido["Equipo2"], $link);
                    $jornada_equipo=$equipo1." - ".$equipo2;
                    mysqli_free_result($query_partido);
                }
            }
            //Comprobar equipo que se ha visitado
            else if ($paginas["Pagina"]==9){
                if ($paginas["JornadaEquipo"]!=0){
                    $jornada_equipo=buscaEquipo($paginas["JornadaEquipo"], $link);
                }
            }
            //Comprobar que campo se ha visitado
            else if ($paginas["Pagina"]==10){
                if ($paginas["JornadaEquipo"]!=0){
                    $query="select * from campos where IdCampo=\"".$paginas["JornadaEquipo"]."\"";
                    $query_campo=mysqli_query ($link, $query);
                    $rowCampo=mysqli_fetch_array($query_campo);
                    $jornada_equipo=$rowCampo["Nombre"];
                    mysqli_free_result($query_campo);
                }
            }
            //Comprobar la pagina amiga que se ha consultado
            else if ($paginas["Pagina"]==24){
                if ($paginas["JornadaEquipo"]==131){
                    $jornada_equipo="webdeporte";
                }
                /*
                else if ($paginas["JornadaEquipo"]==132){
                    $jornada_equipo="bousalcarrer";
                }
                else if (mysql_result($query_visitas,$x,"JornadaEquipo")==133)
				{
					$jornada_equipo="tunabalmes";
				}
				else if (mysql_result($query_visitas,$x,"JornadaEquipo")==134)
				{
					$jornada_equipo="copabaixllobregat";
				}
				else if (mysql_result($query_visitas,$x,"JornadaEquipo")==135)
				{
					$jornada_equipo="barmontalban";
				}
				else if (mysql_result($query_visitas,$x,"JornadaEquipo")==136)
				{
					$jornada_equipo="makinesrenault";
				}
				else if (mysql_result($query_visitas,$x,"JornadaEquipo")==137)
				{
					$jornada_equipo="aretecup";
				}
				else if (mysql_result($query_visitas,$x,"JornadaEquipo")==138)
				{
					$jornada_equipo="hospitauro";
				}
				else if (mysql_result($query_visitas,$x,"JornadaEquipo")==139)
				{
					$jornada_equipo="patrocinador";
				}
				else if (mysql_result($query_visitas,$x,"JornadaEquipo")==140)
				{
					$jornada_equipo="territorionaranja";
				}
				else if (mysql_result($query_visitas,$x,"JornadaEquipo")==141)
				{
					$jornada_equipo="foro";
				}
                */
            }
            //Comprobar que plantilla se ha visitado
            else if ($paginas["Pagina"]==20){
                if ($paginas["JornadaEquipo"]!=0){
                    $query="select * from categoria where IdCategoria=\"".$paginas["JornadaEquipo"]."\"";
                    $query_categoria=mysqli_query ($link, $query);
                    $rowCategoria=mysqli_fetch_array($query_categoria);
                    $jornada_equipo=$rowCategoria["Categoria"];
                    mysqli_free_result($query_categoria);
                }
            }
            //Comprobar la jornada que se ha consultado
            else
            {
                $jornada_equipo=$paginas["JornadaEquipo"];
            }
?>
			<tr class="d-flex" <?php if ($estilo!="") {print($estilo);} ?>>
				<td class="col-2"><a href="comprobar_paginas_vistas.php?ideliminar=<?= $paginas["IdPaginasVistas"].$parametros ?>">Eliminar</a></td>
	       		<td class="col-2 text-center"><?= $ip_usuario ?></td>
	       		<td class="col-2 text-center"><?= $paginas["Hora"] ?></td>
	       		<td class="col-2 text-center"><?= devolverFechaBBDD($paginas["Fecha"]) ?></td>
	       		<td class="col-2 text-center"><?= $pagina_vista ?></td>
	       		<td class="col-2 text-center"><?= $jornada_equipo ?></td>
	       	</tr>

<?php             
        }

        mysqli_free_result($query_paginas_vistas);
?>
