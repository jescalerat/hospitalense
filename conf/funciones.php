<?php
function idiomaPagina()
{
    //Comprobar idioma del navegador cliente
    if ($_SERVER['HTTP_ACCEPT_LANGUAGE'] != ''){
        // Miramos que idiomas ha definido:
        $idiomas = explode(",", $_SERVER['HTTP_ACCEPT_LANGUAGE']); # Convertimos HTTP_ACCEPT_LANGUAGE en array
        /* Recorremos el array hasta que encontramos un idioma del visitante que coincida con los idiomas en que está disponible nuestra web */
        if (substr($idiomas[0], 0, 2) == "es"){$idioma = 1;}
        else if (substr($idiomas[0], 0, 2) == "en"){$idioma = 2;}
        else if (substr($idiomas[0], 0, 2) == "ca"){$idioma = 3;}
        //else if (substr($idiomas[0], 0, 2) == "eu"){$idioma = 3;}
        //else if (substr($idiomas[0], 0, 2) == "gl"){$idioma = 4;}
        else {$idioma=1;}
    }
    
    if (!isset($_SESSION["idiomapagina"]))
    {
        $_SESSION["idiomapagina"]=$idioma;
    }
}

function diaSemana($diaDeSemana)
{
	switch ($diaDeSemana) {
		case 1:
			$diaS=_LUNES; 
			break;
		case 2:
			$diaS=_MARTES;
			break;
		case 3:
			$diaS=_MIERCOLES;
			break;
		case 4:
			$diaS=_JUEVES;
			break;
		case 5:
			$diaS=_VIERNES;
			break;
		case 6:
			$diaS=_SABADO;
			break;
		case 7:
			$diaS=_DOMINGO;
			break;
	}
	return $diaS;
}

function mesAny($mes)
{
	if($mes==1||strcmp($mes,"Enero")==0)
	{
		$mesany=_ENERO;
	}
	else if($mes==2||strcmp($mes,"Febrero")==0)
	{
		$mesany=_FEBRERO;
	}
	else if($mes==3||strcmp($mes,"Marzo")==0)
	{
		$mesany=_MARZO;
	}
	else if($mes==4||strcmp($mes,"Abril")==0)
	{
		$mesany=_ABRIL;
	}
	else if($mes==5||strcmp($mes,"Mayo")==0)
	{
		$mesany=_MAYO;
	}
	else if($mes==6||strcmp($mes,"Junio")==0)
	{
		$mesany=_JUNIO;
	}
	else if($mes==7||strcmp($mes,"Julio")==0)
	{
		$mesany=_JULIO;
	}
	else if($mes==8||strcmp($mes,"Agosto")==0)
	{
		$mesany=_AGOSTO;
	}
	else if($mes==9||strcmp($mes,"Septiembre")==0)
	{
		$mesany=_SEPTIEMBRE;
	}
	else if($mes==10||strcmp($mes,"Octubre")==0)
	{
		$mesany=_OCTUBRE;
	}
	else if($mes==11||strcmp($mes,"Noviembre")==0)
	{
		$mesany=_NOVIEMBRE;
	}
	else if($mes==12||strcmp($mes,"Diciembre")==0)
	{
		$mesany=_DICIEMBRE;
	}
	return $mesany;
}

function superindice($jornada)
{
	if ($_SESSION['idiomapagina']==1||$_SESSION['idiomapagina']==3)
	{
		$devuelveSuperindice="&ordf;";
	}
	else if ($_SESSION['idiomapagina']==2)
	{
		if ($jornada==1)
		{
			$devuelveSuperindice="st";
		}
		else if ($jornada==2)
		{
			$devuelveSuperindice="nd";
		}
		else if ($jornada==3)
		{
			$devuelveSuperindice="rd";
		}
		else
		{
			$devuelveSuperindice="th";
		}
	}
	else
	{
		if ($jornada==1)
		{
			$devuelveSuperindice="st";
		}
		else if ($jornada==2)
		{
			$devuelveSuperindice="nd";
		}
		else if ($jornada==3)
		{
			$devuelveSuperindice="rd";
		}
		else
		{
			$devuelveSuperindice="th";
		}
	}
	return $devuelveSuperindice;
}

function fecha($dia,$mes,$any,$hora,$diasemana)
{
	if ($_SESSION['idiomapagina']==1)
	{
		$fechadevuelta=diaSemana($diasemana).", ".$dia." de ".mesAny($mes)." del ".$any." a las ".$hora;
	}
	else if ($_SESSION['idiomapagina']==2)
	{
		$fechadevuelta=diaSemana($diasemana).", ".mesAny($mes)." ".$dia." of ".$any." at ".$hora;
	}
	else
	{
		$fechadevuelta=diaSemana($diasemana).", ".mesAny($mes)." ".$dia." of ".$any." at ".$hora;
	}
	return $fechadevuelta;
}

function fechamenu($dia,$mes,$any)
{
	if ($_SESSION['idiomapagina']==1)
	{
		$fechadevuelta=$dia." de ".mesAny($mes)." del ".$any;
	}
	else if ($_SESSION['idiomapagina']==2)
	{
		$fechadevuelta=mesAny($mes)." ".$dia." of ".$any;
	}
	else if ($_SESSION['idiomapagina']==3)
	{
		$particula=" de ";
		if ($mes==4||$mes==8){$particula=" d'";}
		$fechadevuelta=$dia.$particula.mesAny($mes)." del ".$any;
	}
	else
	{
		$fechadevuelta=mesAny($mes)." ".$dia." of ".$any;
	}
	return $fechadevuelta;
}

function diaFinal($mes)
{
	$diaF=31;
	if ($mes==2)
	{
		$diaF=28;
	}
	else if ($mes==4||$mes==6||$mes==9||$mes==11)
	{
		$diaF=30;
	}
	return $diaF;
}

function devolverDia($fecha)
{
	$fechacompleta=explode("-",$fecha);
	$dia=$fechacompleta[0];
	return $dia;
}

function devolverMes($fecha)
{
	$fechacompleta=explode("-",$fecha);
	$mes=$fechacompleta[1];
	return $mes;
}

function devolverAny($fecha)
{
	$fechacompleta=explode("-",$fecha);
	$any=$fechacompleta[2];
	return $any;
}

function devolverFecha($fecha)
{
	$fechacompleta=explode("-",$fecha);
	$dia=$fechacompleta[0];
	$fechacompleta=explode("-",$fecha);
	$mes=mesAny($fechacompleta[1]);
	$fechacompleta=explode("-",$fecha);
	$any=$fechacompleta[2];
	$fechaTraducida=$dia."-".$mes."-".$any;
	return $fechaTraducida;
}

function devolverFechaBBDD($fecha)
{
    $fechacompleta=explode("-",$fecha);
    $dia=$fechacompleta[2];
    $fechacompleta=explode("-",$fecha);
    $mes=mesAny($fechacompleta[1]);
    $fechacompleta=explode("-",$fecha);
    $any=$fechacompleta[0];
    $fechaTraducida=$dia."-".$mes."-".$any;
    return $fechaTraducida;
}

function cambiarAcentos($cadena) {
	$long=strlen($cadena);
	$devuelveCadena="";

	for ($x=0;$x<$long;$x++)
	{
//Acento agudo
		if(strcmp($cadena[$x],"á")==0)
		{
			$devuelveCadena=$devuelveCadena."&aacute;";
		}
		else if(strcmp($cadena[$x],"Á")==0)
		{
			$devuelveCadena=$devuelveCadena."&Aacute;";
		}
		else if(strcmp($cadena[$x],"é")==0)
		{
			$devuelveCadena=$devuelveCadena."&eacute;";
		}
		else if(strcmp($cadena[$x],"É")==0)
		{
			$devuelveCadena=$devuelveCadena."&Eacute;";
		}
		else if(strcmp($cadena[$x],"í")==0)
		{
			$devuelveCadena=$devuelveCadena."&iacute;";
		}
		else if(strcmp($cadena[$x],"Í")==0)
		{
			$devuelveCadena=$devuelveCadena."&Iacute;";
		}
		else if(strcmp($cadena[$x],"ó")==0)
		{
			$devuelveCadena=$devuelveCadena."&oacute;";
		}
		else if(strcmp($cadena[$x],"Ó")==0)
		{
			$devuelveCadena=$devuelveCadena."&Oacute;";
		}
		else if(strcmp($cadena[$x],"ú")==0)
		{
			$devuelveCadena=$devuelveCadena."&uacute;";
		}
		else if(strcmp($cadena[$x],"Ú")==0)
		{
			$devuelveCadena=$devuelveCadena."&Uacute;";
		}
//Dieresis
		else if(strcmp($cadena[$x],"ä")==0)
		{
			$devuelveCadena=$devuelveCadena."&auml;";
		}
		else if(strcmp($cadena[$x],"Ä")==0)
		{
			$devuelveCadena=$devuelveCadena."&Auml;";
		}
		else if(strcmp($cadena[$x],"ë")==0)
		{
			$devuelveCadena=$devuelveCadena."&euml;";
		}
		else if(strcmp($cadena[$x],"Ë")==0)
		{
			$devuelveCadena=$devuelveCadena."&Euml;";
		}
		else if(strcmp($cadena[$x],"ï")==0)
		{
			$devuelveCadena=$devuelveCadena."&iuml;";
		}
		else if(strcmp($cadena[$x],"Ï")==0)
		{
			$devuelveCadena=$devuelveCadena."&Iuml;";
		}
		else if(strcmp($cadena[$x],"ö")==0)
		{
			$devuelveCadena=$devuelveCadena."&ouml;";
		}
		else if(strcmp($cadena[$x],"Ö")==0)
		{
			$devuelveCadena=$devuelveCadena."&Ouml;";
		}
		else if(strcmp($cadena[$x],"ü")==0)
		{
			$devuelveCadena=$devuelveCadena."&uuml;";
		}
		else if(strcmp($cadena[$x],"Ü")==0)
		{
			$devuelveCadena=$devuelveCadena."&Uuml;";
		}
//Acento grave
		else if(strcmp($cadena[$x],"à")==0)
		{
			$devuelveCadena=$devuelveCadena."&agrave;";
		}
		else if(strcmp($cadena[$x],"À")==0)
		{
			$devuelveCadena=$devuelveCadena."&Agrave;";
		}
		else if(strcmp($cadena[$x],"è")==0)
		{
			$devuelveCadena=$devuelveCadena."&egrave;";
		}
		else if(strcmp($cadena[$x],"È")==0)
		{
			$devuelveCadena=$devuelveCadena."&Egrave;";
		}
		else if(strcmp($cadena[$x],"ì")==0)
		{
			$devuelveCadena=$devuelveCadena."&igrave;";
		}
		else if(strcmp($cadena[$x],"Ì")==0)
		{
			$devuelveCadena=$devuelveCadena."&Igrave;";
		}
		else if(strcmp($cadena[$x],"ò")==0)
		{
			$devuelveCadena=$devuelveCadena."&ograve;";
		}
		else if(strcmp($cadena[$x],"Ò")==0)
		{
			$devuelveCadena=$devuelveCadena."&Ograve;";
		}
		else if(strcmp($cadena[$x],"ù")==0)
		{
			$devuelveCadena=$devuelveCadena."&ugrave;";
		}
		else if(strcmp($cadena[$x],"Ù")==0)
		{
			$devuelveCadena=$devuelveCadena."&Ugrave;";
		}
//Acento circunflejo
		else if(strcmp($cadena[$x],"â")==0)
		{
			$devuelveCadena=$devuelveCadena."&acirc;";
		}
		else if(strcmp($cadena[$x],"Â")==0)
		{
			$devuelveCadena=$devuelveCadena."&Acirc;";
		}
		else if(strcmp($cadena[$x],"ê")==0)
		{
			$devuelveCadena=$devuelveCadena."&ecirc;";
		}
		else if(strcmp($cadena[$x],"Ê")==0)
		{
			$devuelveCadena=$devuelveCadena."&Ecirc;";
		}
		else if(strcmp($cadena[$x],"î")==0)
		{
			$devuelveCadena=$devuelveCadena."&icirc;";
		}
		else if(strcmp($cadena[$x],"Î")==0)
		{
			$devuelveCadena=$devuelveCadena."&Icirc;";
		}
		else if(strcmp($cadena[$x],"ô")==0)
		{
			$devuelveCadena=$devuelveCadena."&ocirc;";
		}
		else if(strcmp($cadena[$x],"Ô")==0)
		{
			$devuelveCadena=$devuelveCadena."&Ocirc;";
		}
		else if(strcmp($cadena[$x],"û")==0)
		{
			$devuelveCadena=$devuelveCadena."&ucirc;";
		}
		else if(strcmp($cadena[$x],"Û")==0)
		{
			$devuelveCadena=$devuelveCadena."&Ucirc;";
		}
//Letras especiales
		else if(strcmp($cadena[$x],"ã")==0)
		{
			$devuelveCadena=$devuelveCadena."&atilde;";
		}
		else if(strcmp($cadena[$x],"Ã")==0)
		{
			$devuelveCadena=$devuelveCadena."&Atilde;";
		}
		else if(strcmp($cadena[$x],"æ")==0)
		{
			$devuelveCadena=$devuelveCadena."&aelig;";
		}
		else if(strcmp($cadena[$x],"Æ")==0)
		{
			$devuelveCadena=$devuelveCadena."&AElig;";
		}
		else if(strcmp($cadena[$x],"ç")==0)
		{
			$devuelveCadena=$devuelveCadena."&ccedil;";
		}
		else if(strcmp($cadena[$x],"Ç")==0)
		{
			$devuelveCadena=$devuelveCadena."&Ccedil;";
		}
		else if(strcmp($cadena[$x],"ñ")==0)
		{
			$devuelveCadena=$devuelveCadena."&ntilde;";
		}
		else if(strcmp($cadena[$x],"Ñ")==0)
		{
			$devuelveCadena=$devuelveCadena."&Ntilde;";
		}
		else if(strcmp($cadena[$x],"õ")==0)
		{
			$devuelveCadena=$devuelveCadena."&otilde;";
		}
		else if(strcmp($cadena[$x],"Õ")==0)
		{
			$devuelveCadena=$devuelveCadena."&Otilde;";
		}
		else if(strcmp($cadena[$x],"ø")==0)
		{
			$devuelveCadena=$devuelveCadena."&oslash;";
		}
		else if(strcmp($cadena[$x],"Ø")==0)
		{
			$devuelveCadena=$devuelveCadena."&Oslash;";
		}
		else if(strcmp($cadena[$x],"ß")==0)
		{
			$devuelveCadena=$devuelveCadena."&szlig;";
		}
		else if(strcmp($cadena[$x],"ÿ")==0)
		{
			$devuelveCadena=$devuelveCadena."&yuml;";
		}
		else if(strcmp($cadena[$x],"¨Y")==0)
		{
			$devuelveCadena=$devuelveCadena."&Yuml;";
		}
		else if(strcmp($cadena[$x],"ý")==0)
		{
			$devuelveCadena=$devuelveCadena."&yacute;";
		}
		else if(strcmp($cadena[$x],"Ý")==0)
		{
			$devuelveCadena=$devuelveCadena."&Yacute;";
		}
		else if(strcmp($cadena[$x],"þ")==0)
		{
			$devuelveCadena=$devuelveCadena."&thorn;";
		}
		else if(strcmp($cadena[$x],"Þ")==0)
		{
			$devuelveCadena=$devuelveCadena."&THORN;";
		}
//Otros signos
		else if(strcmp($cadena[$x],"¢")==0)
		{
			$devuelveCadena=$devuelveCadena."&cent;";
		}
		else if(strcmp($cadena[$x],"£")==0)
		{
			$devuelveCadena=$devuelveCadena."&pound;";
		}
		else if(strcmp($cadena[$x],"¤")==0)
		{
			$devuelveCadena=$devuelveCadena."&curren;";
		}
		else if(strcmp($cadena[$x],"©")==0)
		{
			$devuelveCadena=$devuelveCadena."&copy;";
		}
		else if(strcmp($cadena[$x],"®")==0)
		{
			$devuelveCadena=$devuelveCadena."&reg;";
		}
		else if(strcmp($cadena[$x],"º")==0)
		{
			$devuelveCadena=$devuelveCadena."&ordm;";
		}
		else if(strcmp($cadena[$x],"ª")==0)
		{
			$devuelveCadena=$devuelveCadena."&ordf;";
		}
		else if(strcmp($cadena[$x],"µ")==0)
		{
			$devuelveCadena=$devuelveCadena."&micro;";
		}
		else if(strcmp($cadena[$x],"å")==0)
		{
			$devuelveCadena=$devuelveCadena."&aring;";
		}
		else if(strcmp($cadena[$x],"Å")==0)
		{
			$devuelveCadena=$devuelveCadena."&Aring;";
		}
		else if(strcmp($cadena[$x],"°")==0)
		{
			$devuelveCadena=$devuelveCadena."&deg;";
		}
		else if(strcmp($cadena[$x],"·")==0)
		{
			$devuelveCadena=$devuelveCadena."&middot;";
		}
		else if(strcmp($cadena[$x],"€")==0)
		{
			$devuelveCadena=$devuelveCadena."&euro;";
		}
		else if(strcmp($cadena[$x],"¨")==0)
		{
			$devuelveCadena=$devuelveCadena."&uml;";
		}
		else if(strcmp($cadena[$x],"´")==0)
		{
			$devuelveCadena=$devuelveCadena."&acute;";
		}
		else if(strcmp($cadena[$x],"¸")==0)
		{
			$devuelveCadena=$devuelveCadena."&cedil;";
		}
		else if(strcmp($cadena[$x],"Ð")==0)
		{
			$devuelveCadena=$devuelveCadena."&ETH;";
		}
		else if(strcmp($cadena[$x],"ð")==0)
		{
			$devuelveCadena=$devuelveCadena."&eth;";
		}
		else if(strcmp($cadena[$x],"ƒ")==0)
		{
			$devuelveCadena=$devuelveCadena."&fnof;";
		}
		else if(strcmp($cadena[$x],"Š")==0)
		{
			$devuelveCadena=$devuelveCadena."&Scaron;";
		}
		else if(strcmp($cadena[$x],"š")==0)
		{
			$devuelveCadena=$devuelveCadena."&scaron;";
		}
		else if(strcmp($cadena[$x],"ž")==0)
		{
			$devuelveCadena=$devuelveCadena."&#382;";
		}
		else if(strcmp($cadena[$x],"Ž")==0)
		{
			$devuelveCadena=$devuelveCadena."&#381;";
		}
//Signos especiales
		else if(strcmp($cadena[$x],"...")==0)
		{
			$devuelveCadena=$devuelveCadena."&hellip;";
		}
		else if(strcmp($cadena[$x],"¡")==0)
		{
			$devuelveCadena=$devuelveCadena."&iexcl;";
		}		
		else if(strcmp($cadena[$x],"¿")==0)
		{
			$devuelveCadena=$devuelveCadena."&iquest;";
		}		
		else
		{
			$devuelveCadena=$devuelveCadena.$cadena[$x];
		}
	}
	return $devuelveCadena;
}


//Devuelve la dirección IP real del cliente 
function getRealIP()
{
      $client_ip =
         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
            $_SERVER['REMOTE_ADDR']
            :
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
               $_ENV['REMOTE_ADDR']
               :
               "unknown" );
   
   return $client_ip;
}

function getRealIP2()
{
   
   if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
   {
      $client_ip =
         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
            $_SERVER['REMOTE_ADDR']
            :
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
               $_ENV['REMOTE_ADDR']
               :
               "unknown" );
   
      // los proxys van añadiendo al final de esta cabecera
      // las direcciones ip que van "ocultando". Para localizar la ip real
      // del usuario se comienza a mirar por el principio hasta encontrar
      // una dirección ip que no sea del rango privado. En caso de no
      // encontrarse ninguna se toma como valor el REMOTE_ADDR
   
      $entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);
   
      reset($entries);
      while (list(, $entry) = each($entries))
      {
         $entry = trim($entry);
         if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
         {
            // http://www.faqs.org/rfcs/rfc1918.html
            $private_ip = array(
                  '/^0\./',
                  '/^127\.0\.0\.1/',
                  '/^192\.168\..*/',
                  '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
                  '/^10\..*/');
   
            $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
   
            if ($client_ip != $found_ip)
            {
               $client_ip = $found_ip;
               break;
            }
         }
      }
   }
   else
   {
      $client_ip =
         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
            $_SERVER['REMOTE_ADDR']
            :
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
               $_ENV['REMOTE_ADDR']
               :
               "unknown" );
   }
   
   return $client_ip;
}

//Guarda la clasificación en la base de datos pasando la temporada actual y el tipo de clasificacion
/*function setClasificacion($jornada,$tipo_clasificacion,$categoria,$link)
{
	//Query para saber los puntos de cada categoria
  $query="select * from categoria where IdCategoria = ".$categoria;
  $q_categoria=mysql_query($query,$link);
  $puntosganados=mysql_result($q_categoria,0,"Ganados");
  $puntosempatados=mysql_result($q_categoria,0,"Empatados");
  $puntosperdidos=mysql_result($q_categoria,0,"Perdidos");
  
	
	//Query para saber los equipos de la categoria
  $query="select * from equipos where IdEquipo in (";
  $query.="select Equipo1 as IdEquipo from liga where Jornada=1 and IdCategoria=".$categoria;
  $query.=" union ";
  $query.="select Equipo2 as IdEquipo from liga where Jornada=1 and IdCategoria=".$categoria.")";
  $q_equipo=mysql_query($query,$link);

	//Obtener el numero de filas devuelto
	$total_equipos=mysql_num_rows($q_equipo);
	
	//Contar equipos sancionados
	$contsancion=0;
 	for ($x=0; $x < $total_equipos; $x++)
	{
		$equipo=mysql_result($q_equipo,$x,"IdEquipo");
		$sancion=mysql_result($q_equipo,$x,"Sancion");
		if ($sancion!=0)
		{
			$equipossancionados[$contsancion][0]=mysql_result($q_equipo,$x,"NombreEquipo");
			$equipossancionados[$contsancion][1]=mysql_result($q_equipo,$x,"Sancion");
			$contsancion+=1;
		}
		$query="select * from liga where IdCategoria = ".$categoria. " and Equipo1 = ".$equipo;
		$q_subcategoria=mysql_query($query,$link);
		$SubCategoria=mysql_result($q_subcategoria,0,"SubCategoriaLocal");
		
		$puntos_casa=0;
    $goles_favor_casa=0;
    $goles_contra_casa=0;
    $partidos_ganados_casa=0;
    $partidos_empatados_casa=0;
    $partidos_perdidos_casa=0;
    $puntos_fuera=0;
    $goles_favor_fuera=0;
    $goles_contra_fuera=0;
    $partidos_ganados_fuera=0;
    $partidos_empatados_fuera=0;
    $partidos_perdidos_fuera=0;

		//Partidos de la primera vuelta
		if ($tipo_clasificacion==3)
		{
			$query="select * from liga where Equipo1=".mysql_result($q_equipo,$x,"IdEquipo")." and Jornada>=1 and Jornada<=".($total_equipos-1)." and IdCategoria=".$categoria;
		}
		//Partidos de la segunda vuelta
		else if ($tipo_clasificacion==4)
		{
			$query="select * from liga where Equipo1=".mysql_result($q_equipo,$x,"IdEquipo")." and Jornada>".($total_equipos-1)." and Jornada<=".(($total_equipos-1)*2)." and IdCategoria=".$categoria;
		}
  	//Query para buscar los partidos y sumar puntos de cada equipo en casa
    else if ($jornada==0 || $tipo_clasificacion==1 || $tipo_clasificacion==2)
    {
        $query="select * from liga where Equipo1=".mysql_result($q_equipo,$x,"IdEquipo")." and Jornada<=".(($total_equipos-1)*2)." and IdCategoria=".$categoria;
    }
    else
    {
        $query="select * from liga where Equipo1=".mysql_result($q_equipo,$x,"IdEquipo")." and Jornada<=".$jornada." and IdCategoria=".$categoria;;
    }
    $q_liga_casa=mysql_query($query,$link);

  	//Obtener el numero de filas devuelto
    $filas_liga_casa=mysql_num_rows($q_liga_casa);

  	for ($y=0; $y < $filas_liga_casa; $y++)
    {
        $goles1=mysql_result($q_liga_casa,$y,"ResultEquipo1");
        $goles2=mysql_result($q_liga_casa,$y,"ResultEquipo2");
        if (!empty($goles1)||$goles1!=NULL)
        {
             if ($goles1>$goles2)
             {
                 $partidos_ganados_casa=$partidos_ganados_casa+1;
             }
             else if ($goles1<$goles2)
             {
                 $partidos_perdidos_casa=$partidos_perdidos_casa+1;
             }
             else
             {
                 $partidos_empatados_casa=$partidos_empatados_casa+1;
             }
             $goles_favor_casa=$goles_favor_casa+$goles1;
             $goles_contra_casa=$goles_contra_casa+$goles2;
        }
    }

    //Partidos de la primera vuelta
		if ($tipo_clasificacion==3)
		{
			$query="select * from liga where Equipo2=".mysql_result($q_equipo,$x,"IdEquipo")." and Jornada>=1 and Jornada<=".($total_equipos-1)." and IdCategoria=".$categoria;
		}
		//Partidos de la segunda vuelta
		else if ($tipo_clasificacion==4)
		{
			$query="select * from liga where Equipo2=".mysql_result($q_equipo,$x,"IdEquipo")." and Jornada>".($total_equipos-1)." and Jornada<=".(($total_equipos-1)*2)." and IdCategoria=".$categoria;
		}
  	//Query para buscar los partidos y sumar puntos de cada equipo fuera
    else if ($jornada==0 || $tipo_clasificacion==1 || $tipo_clasificacion==2)
    {
        $query="select * from liga where Equipo2=".mysql_result($q_equipo,$x,"IdEquipo")." and Jornada<=".(($total_equipos-1)*2)." and IdCategoria=".$categoria;
    }
    else
    {
        $query="select * from liga where Equipo2=".mysql_result($q_equipo,$x,"IdEquipo")." and Jornada<=".$jornada." and IdCategoria=".$categoria;
    }
    $q_liga_fuera=mysql_query($query,$link);

  	//Obtener el numero de filas devuelto
    $filas_liga_fuera=mysql_num_rows($q_liga_fuera);

  	for ($y=0; $y < $filas_liga_fuera; $y++)
    {
        $goles1=mysql_result($q_liga_fuera,$y,"ResultEquipo1");
        $goles2=mysql_result($q_liga_fuera,$y,"ResultEquipo2");
        if (!empty($goles1)||$goles1!=NULL)
        {
             if ($goles1<$goles2)
             {
                $partidos_ganados_fuera=$partidos_ganados_fuera+1;
             }
             else if ($goles1>$goles2)
             {
                 $partidos_perdidos_fuera=$partidos_perdidos_fuera+1;
             }
             else
             {
                 $partidos_empatados_fuera=$partidos_empatados_fuera+1;
             }
             $goles_favor_fuera=$goles_favor_fuera+$goles2;
             $goles_contra_fuera=$goles_contra_fuera+$goles1;
        }
    }
	
		//Clasificación normal, partidos primera vuelta y partidos segunda vuelta
		if($tipo_clasificacion==0 || $tipo_clasificacion==3 || $tipo_clasificacion==4)
		{
			$partidos_ganados=$partidos_ganados_casa+$partidos_ganados_fuera;
			$partidos_empatados=$partidos_empatados_casa+$partidos_empatados_fuera;
			$partidos_perdidos=$partidos_perdidos_casa+$partidos_perdidos_fuera;
			$goles_favor=$goles_favor_casa+$goles_favor_fuera;
			$goles_contra=$goles_contra_casa+$goles_contra_fuera;
		}
		//Clasificación jugados en casa
		else if($tipo_clasificacion==1)
		{
			$partidos_ganados=$partidos_ganados_casa;
			$partidos_empatados=$partidos_empatados_casa;
			$partidos_perdidos=$partidos_perdidos_casa;
			$goles_favor=$goles_favor_casa;
			$goles_contra=$goles_contra_casa;
		}
		//Clasificación jugados en casa
		else if($tipo_clasificacion==2)
		{
			$partidos_ganados=$partidos_ganados_fuera;
			$partidos_empatados=$partidos_empatados_fuera;
			$partidos_perdidos=$partidos_perdidos_fuera;
			$goles_favor=$goles_favor_fuera;
			$goles_contra=$goles_contra_fuera;
		}

		$puntos=($partidos_ganados*$puntosganados)+($partidos_empatados*$puntosempatados)+($partidos_perdidos*$puntosperdidos)-$sancion;
		$jugados=$partidos_ganados+$partidos_empatados+$partidos_perdidos;
		
  	//Query para insertar los valores en la base de datos
    $query="insert into clasificacion (IdEquipo, Puntos, Jugados, Ganados, Empatados, Perdidos, GolesFavor, GolesContra, GolAverage, IdCategoria, SubCategoria) values (".$equipo.",".$puntos.",".$jugados.",".$partidos_ganados.",".$partidos_empatados.",".$partidos_perdidos.",".$goles_favor.",".$goles_contra.",".$puntos.",".$categoria.",'".$SubCategoria."')";
    mysql_query($query,$link);
  }

//-------------------------------------------------------------------------------------------------------------------------------

	//Cambiar la posición por el goalaverage
	$query="select Puntos, count(Puntos) from clasificacion where IdCategoria=".$categoria." group by Puntos having count(Puntos)>1";
  $qgoalaveragedist=mysql_query($query,$link);

	$ngoalaverage=mysql_num_rows($qgoalaveragedist);

	for ($x=0;$x<$ngoalaverage;$x++)
	{
			$query="create table cla_average (";
		  $query.="select Equipo1, Equipo2, ResultEquipo1, ResultEquipo2, 0 as GolAverage from liga where IdCategoria=".$categoria." and equipo1 in(";
			$query.="select idequipo from clasificacion where Puntos=".mysql_result($qgoalaveragedist,$x,"Puntos")." and IdCategoria=".$categoria.") and Equipo2 in (";
		  $query.="select idequipo from clasificacion where Puntos=".mysql_result($qgoalaveragedist,$x,"Puntos")." and IdCategoria=".$categoria."))";
		  $qcreatecalgoalaverage=mysql_query($query,$link);

		  $query="select * from cla_average";
		  $qcalgoalaverage=mysql_query($query,$link);
		  
		  $equiposgolaverage=mysql_num_rows($qcalgoalaverage);
		  
		  for ($y=0;$y<$equiposgolaverage;$y++)
			{
				$idequipogolaverage = 0;
				if (mysql_result($qcalgoalaverage,$y,"ResultEquipo1") > mysql_result($qcalgoalaverage,$y,"ResultEquipo2"))
				{
					$idequipogolaverage = mysql_result($qcalgoalaverage,$y,"Equipo1");	
				}
				else if (mysql_result($qcalgoalaverage,$y,"ResultEquipo1") < mysql_result($qcalgoalaverage,$y,"ResultEquipo2"))
				{
					$idequipogolaverage = mysql_result($qcalgoalaverage,$y,"Equipo2");	
				}
				//Modificar los puntos
			  $query="update cla_average set GolAverage=".$idequipogolaverage." where Equipo1=".mysql_result($qcalgoalaverage,$y,"Equipo1"). " and Equipo2=".mysql_result($qcalgoalaverage,$y,"Equipo2");
			  mysql_query ($query,$link);
			}
			
			$query="select GolAverage, count(GolAverage) as Puntos from cla_average where GolAverage != 0 group by GolAverage order by count(GolAverage) desc";
			$qcuentagoalaverage=mysql_query ($query,$link);
			
			$equiposgolaveragecuenta=mysql_num_rows($qcuentagoalaverage);
			
			for ($y=0;$y<$equiposgolaveragecuenta;$y++)
			{
				$query="select Puntos from clasificacion where IdEquipo = ".mysql_result($qcuentagoalaverage,$y,"GolAverage")." and IdCategoria = ".$categoria;
				$qequipogoalaverage=mysql_query ($query,$link);
		
				//Modificar los puntos
			  $query="update clasificacion set Golaverage=".(mysql_result($qequipogoalaverage,0,"Puntos")+mysql_result($qcuentagoalaverage,$y,"Puntos"))." where IdEquipo=".mysql_result($qcuentagoalaverage,$y,"GolAverage");
			  mysql_query ($query,$link);
			}
			
			if ($equiposgolaverage == 2)
			{
				for ($y=0;$y<$equiposgolaverage;$y++)
				{
					$goles = mysql_result($qcalgoalaverage,$y,"ResultEquipo1") - mysql_result($qcalgoalaverage,$y,"ResultEquipo2");

					//Modificar los puntos
				  $query="update cla_average set GolAverage=".$goles." where Equipo1=".mysql_result($qcalgoalaverage,$y,"Equipo1"). " and Equipo2=".mysql_result($qcalgoalaverage,$y,"Equipo2");
				  mysql_query ($query,$link);
				}
				
				$query="select * from cla_average order by GolAverage desc";
				$qcuentagoalaverage=mysql_query ($query,$link);
				
				$equiposgolaverage=mysql_num_rows($qcuentagoalaverage);
				
				$puntosaverage=$equiposgolaverage;
				for ($y=0;$y<$equiposgolaverage;$y++)
				{
					$query="select Puntos from clasificacion where IdEquipo = ".mysql_result($qcuentagoalaverage,$y,"Equipo1")." and IdCategoria = ".$categoria;
					$qequipogoalaverage=mysql_query ($query,$link);

					//Modificar los puntos
				  $query="update clasificacion set Golaverage=".(mysql_result($qequipogoalaverage,0,"Puntos")+$puntosaverage)." where IdEquipo=".mysql_result($qcuentagoalaverage,$y,"Equipo1")." and IdCategoria=".$categoria;
				  mysql_query ($query,$link);
				  $puntosaverage--;
				}
			}
			
			$query="drop table cla_average";
			mysql_query ($query,$link);
	}
	return $equipossancionados;
}*/


//Guarda la clasificación en la base de datos pasando la temporada actual y el tipo de clasificacion
function setClasificacion($jornada,$tipo_clasificacion,$categoria,$link)
{
	//Query de parametros
	$query="select * from parametros where IdCategoria = ".$categoria;
	$q_parametros=mysqli_query($link, $query);
	$rowparametros=mysqli_fetch_array($q_parametros);
	if ($jornada == 0)
	{
		$jornada=$rowparametros["TotalJornadas"];
		$total_jornadas=$rowparametros["TotalJornadas"];
	}
  
	//Query para saber los puntos de cada categoria
	$query="select * from categoria where IdCategoria = ".$categoria;
	$q_categoria=mysqli_query($link, $query);
	$rowcategoria=mysqli_fetch_array($q_categoria);
	
	$puntosganados=$rowcategoria["Ganados"];
	$puntosempatados=$rowcategoria["Empatados"];
	$puntosperdidos=$rowcategoria["Perdidos"];
  
	
	//Query para saber los equipos de la categoria
	$query="select distinct Equipo1, SubCategoriaLocal from liga where IdCategoria=".$categoria;
	$q_equipo=mysqli_query($link, $query);

	while($equipos=mysqli_fetch_array($q_equipo, MYSQLI_BOTH))
	{
		$idEquipo = $equipos["Equipo1"];
		$Subcategoria = $equipos["SubCategoriaLocal"];
		
		$puntos=0;
		$goles_favor=0;
		$goles_contra=0;
		$partidos_ganados=0;
		$partidos_empatados=0;
		$partidos_perdidos=0;

		//Partidos de la primera vuelta o de la segunda vuelta
		if ($tipo_clasificacion==3 || $tipo_clasificacion==4)
		{
			//Partidos de la primera vuelta
			if ($tipo_clasificacion==3)
			{
				$jornadaInicial = 1;
				$jornadaFinal = ($total_jornadas/2);
			}
			//Partidos de la segunda vuelta 
			else
			{
				$jornadaInicial = ($total_jornadas/2)+1;
				$jornadaFinal = $total_jornadas;
			}
			$query="select sum(ResultEquipo1) as GolesFavor, sum(ResultEquipo2) as GolesContra from";
			$query.=" (";
			$query.=" select sum(ResultEquipo1) as ResultEquipo1, sum(ResultEquipo2) as ResultEquipo2 from liga where IdCategoria=".$categoria." and Equipo1=".$idEquipo." and SubCategoriaLocal='".$Subcategoria."' and Jornada>=".$jornadaInicial." and Jornada<=".$jornadaFinal;
			$query.=" union";
			$query.=" select sum(ResultEquipo2) as ResultEquipo1, sum(ResultEquipo1) as ResultEquipo2 from liga where IdCategoria=".$categoria." and Equipo2=".$idEquipo." and SubCategoriaVisitante='".$Subcategoria."' and Jornada>=".$jornadaInicial." and Jornada<=".$jornadaFinal;
			$query.=" ) as Goles";
			$q_goles=mysqli_query($link, $query);
			$rowgoles=mysqli_fetch_array($q_goles);

			$goles_favor=$rowgoles["GolesFavor"]+0;
			$goles_contra=$rowgoles["GolesContra"]+0;
				
			$query="select sum(Ganados) as Ganados, sum(Empatados) as Empatados, sum(Perdidos) as Perdidos  from";
			$query.=" (";
			$query.=" select if (ResultEquipo1>ResultEquipo2,1,0) as Ganados, if (ResultEquipo1=ResultEquipo2,1,0) as Empatados, if (ResultEquipo1<ResultEquipo2,1,0) as Perdidos from liga where IdCategoria=".$categoria." and Equipo1=".$idEquipo." and SubCategoriaLocal='".$Subcategoria."' and Jornada>=".$jornadaInicial." and Jornada<=".$jornadaFinal;
			$query.=" union all";
			$query.=" select if (ResultEquipo1<ResultEquipo2,1,0) as Ganados, if (ResultEquipo1=ResultEquipo2,1,0) as Empatados, if (ResultEquipo1>ResultEquipo2,1,0) as Perdidos from liga where IdCategoria=".$categoria." and Equipo2=".$idEquipo." and SubCategoriaVisitante='".$Subcategoria."' and Jornada>=".$jornadaInicial." and Jornada<=".$jornadaFinal;
			$query.=" ) as Partidos";
			$q_partidos=mysqli_query($link, $query);
			$rowpartidos=mysqli_fetch_array($q_partidos);

			$partidos_ganados=$rowpartidos["Ganados"]+0;
			$partidos_empatados=$rowpartidos["Empatados"]+0;
			$partidos_perdidos=$rowpartidos["Perdidos"]+0;
		}
		//Partidos en casa
		else if ($tipo_clasificacion==1)
		{
			$query="select sum(ResultEquipo1) as ResultEquipo1, sum(ResultEquipo2) as ResultEquipo2 from liga where IdCategoria=".$categoria." and Equipo1=".$idEquipo." and SubCategoriaLocal='".$Subcategoria."' and Jornada<=".$jornada;
			$q_goles=mysqli_query($link, $query);
			$rowgoles=mysqli_fetch_array($q_goles);
			
			$goles_favor=$rowgoles["ResultEquipo1"]+0;
			$goles_contra=$rowgoles["ResultEquipo2"]+0;
				
			$query="select sum(Ganados) as Ganados, sum(Empatados) as Empatados, sum(Perdidos) as Perdidos  from";
			$query.=" (";
			$query.=" select if (ResultEquipo1>ResultEquipo2,1,0) as Ganados, if (ResultEquipo1=ResultEquipo2,1,0) as Empatados, if (ResultEquipo1<ResultEquipo2,1,0) as Perdidos from liga where IdCategoria=".$categoria." and Equipo1=".$idEquipo." and SubCategoriaLocal='".$Subcategoria."' and Jornada<=".$jornada;
			$query.=" ) as Partidos";
			$q_partidos=mysqli_query($link, $query);
			$rowpartidos=mysqli_fetch_array($q_partidos);
			
			$partidos_ganados=$rowpartidos["Ganados"]+0;
			$partidos_empatados=$rowpartidos["Empatados"]+0;
			$partidos_perdidos=$rowpartidos["Perdidos"]+0;
			
		}
		//Partidos fuera
		else if ($tipo_clasificacion==2)
		{
			$query="select sum(ResultEquipo2) as ResultEquipo1, sum(ResultEquipo1) as ResultEquipo2 from liga where IdCategoria=".$categoria." and Equipo2=".$idEquipo." and SubCategoriaVisitante='".$Subcategoria."' and Jornada<=".$jornada;
			$q_goles=mysqli_query($link, $query);
			$rowgoles=mysqli_fetch_array($q_goles);
			
			$goles_favor=$rowgoles["ResultEquipo1"]+0;
			$goles_contra=$rowgoles["ResultEquipo2"]+0;
				
			$query="select sum(Ganados) as Ganados, sum(Empatados) as Empatados, sum(Perdidos) as Perdidos  from";
			$query.=" (";
			$query.=" select if (ResultEquipo1<ResultEquipo2,1,0) as Ganados, if (ResultEquipo1=ResultEquipo2,1,0) as Empatados, if (ResultEquipo1>ResultEquipo2,1,0) as Perdidos from liga where IdCategoria=".$categoria." and Equipo2=".$idEquipo." and SubCategoriaVisitante='".$Subcategoria."' and Jornada<=".$jornada;
			$query.=" ) as Partidos";
			$q_partidos=mysqli_query($link, $query);
			$rowpartidos=mysqli_fetch_array($q_partidos);
			
			$partidos_ganados=$rowpartidos["Ganados"]+0;
			$partidos_empatados=$rowpartidos["Empatados"]+0;
			$partidos_perdidos=$rowpartidos["Perdidos"]+0;
		
		}
		else
		{
			$query="select sum(ResultEquipo1) as GolesFavor, sum(ResultEquipo2) as GolesContra from liga where IdCategoria=".$categoria." and Equipo1=".$idEquipo." and SubCategoriaLocal='".$Subcategoria."' and Jornada<=".$jornada;
			$q_goles=mysqli_query($link, $query);
			$rowgoles=mysqli_fetch_array($q_goles);
		
			$goles_favor=$rowgoles["GolesFavor"]+0;
			$goles_contra=$rowgoles["GolesContra"]+0;

			$query="select sum(ResultEquipo2) as GolesFavor, sum(ResultEquipo1) as GolesContra from liga where IdCategoria=".$categoria." and Equipo2=".$idEquipo." and SubCategoriaVisitante='".$Subcategoria."' and Jornada<=".$jornada;
			$q_goles=mysqli_query($link, $query);
			$rowgoles=mysqli_fetch_array($q_goles);
			
			$goles_favor=$goles_favor + $rowgoles["GolesFavor"] + 0;
			$goles_contra=$goles_contra + $rowgoles["GolesContra"] + 0;
				
			$query="select sum(Ganados) as Ganados, sum(Empatados) as Empatados, sum(Perdidos) as Perdidos  from";
			$query.=" (";
			$query.=" select if (ResultEquipo1>ResultEquipo2,1,0) as Ganados, if (ResultEquipo1=ResultEquipo2,1,0) as Empatados, if (ResultEquipo1<ResultEquipo2,1,0) as Perdidos from liga where IdCategoria=".$categoria." and Equipo1=".$idEquipo." and SubCategoriaLocal='".$Subcategoria."' and Jornada<=".$jornada;
			$query.=" union all";
			$query.=" select if (ResultEquipo1<ResultEquipo2,1,0) as Ganados, if (ResultEquipo1=ResultEquipo2,1,0) as Empatados, if (ResultEquipo1>ResultEquipo2,1,0) as Perdidos from liga where IdCategoria=".$categoria." and Equipo2=".$idEquipo." and SubCategoriaVisitante='".$Subcategoria."' and Jornada<=".$jornada;
			$query.=" ) as Partidos";
			$q_partidos=mysqli_query($link, $query);
			$rowpartidos=mysqli_fetch_array($q_partidos);
			
			$partidos_ganados=$rowpartidos["Ganados"]+0;
			$partidos_empatados=$rowpartidos["Empatados"]+0;
			$partidos_perdidos=$rowpartidos["Perdidos"]+0;
		}
		$puntos = ($partidos_ganados * $puntosganados) + ($partidos_empatados * $puntosempatados);
		$jugados = $partidos_ganados + $partidos_empatados + $partidos_perdidos;
    
		//Clasificación normal, partidos primera vuelta y partidos segunda vuelta
		/*if($tipo_clasificacion==0 || $tipo_clasificacion==3 || $tipo_clasificacion==4)
		{
			$partidos_ganados=$partidos_ganados_casa+$partidos_ganados_fuera;
			$partidos_empatados=$partidos_empatados_casa+$partidos_empatados_fuera;
			$partidos_perdidos=$partidos_perdidos_casa+$partidos_perdidos_fuera;
			$goles_favor=$goles_favor_casa+$goles_favor_fuera;
			$goles_contra=$goles_contra_casa+$goles_contra_fuera;
		}
		//Clasificación jugados en casa
		else if($tipo_clasificacion==1)
		{
			$partidos_ganados=$partidos_ganados_casa;
			$partidos_empatados=$partidos_empatados_casa;
			$partidos_perdidos=$partidos_perdidos_casa;
			$goles_favor=$goles_favor_casa;
			$goles_contra=$goles_contra_casa;
		}
		//Clasificación jugados en casa
		else if($tipo_clasificacion==2)
		{
			$partidos_ganados=$partidos_ganados_fuera;
			$partidos_empatados=$partidos_empatados_fuera;
			$partidos_perdidos=$partidos_perdidos_fuera;
			$goles_favor=$goles_favor_fuera;
			$goles_contra=$goles_contra_fuera;
		}

		$puntos=($partidos_ganados*$puntosganados)+($partidos_empatados*$puntosempatados)+($partidos_perdidos*$puntosperdidos)-$sancion;
		$jugados=$partidos_ganados+$partidos_empatados+$partidos_perdidos;*/
		
		//Query para insertar los valores en la base de datos
		$query="insert into clasificacion (IdEquipo, Puntos, Jugados, Ganados, Empatados, Perdidos, GolesFavor, GolesContra, GolAverage, IdCategoria, SubCategoria) values (".$idEquipo.",".$puntos.",".$jugados.",".$partidos_ganados.",".$partidos_empatados.",".$partidos_perdidos.",".$goles_favor.",".$goles_contra.",".$puntos.",".$categoria.",'".$Subcategoria."')";
		mysqli_query($link, $query);
	}

//-------------------------------------------------------------------------------------------------------------------------------

	//Cambiar la posición por el goalaverage
	$query="select Puntos, count(Puntos) from clasificacion where IdCategoria=".$categoria." group by Puntos having count(Puntos)>1";
	$qgoalaveragedist=mysqli_query($link, $query);

	while($goalaverage=mysqli_fetch_array($q_equipo, MYSQLI_BOTH))
	{
		$query="create table cla_average (";
		$query.="select Equipo1, Equipo2, ResultEquipo1, ResultEquipo2, 0 as GolAverage from liga where IdCategoria=".$categoria." and equipo1 in(";
		$query.="select idequipo from clasificacion where Puntos=".$goalaverage["Puntos"]." and IdCategoria=".$categoria.") and Equipo2 in (";
		$query.="select idequipo from clasificacion where Puntos=".$goalaverage["Puntos"]." and IdCategoria=".$categoria."))";
		$qcreatecalgoalaverage=mysqli_query($link, $query);

		$query="select * from cla_average";
		$qcalgoalaverage=mysqli_query($link, $query);
		
		$totalequiposgolaverage=mysqli_num_rows($qcalgoalaverage);
		  
		while($equiposgolaverage=mysqli_fetch_array($qcalgoalaverage, MYSQLI_BOTH))
		{
			$idequipogolaverage = 0;
			if ($equiposgolaverage["ResultEquipo1"] > $equiposgolaverage["ResultEquipo2"])
			{
				$idequipogolaverage = $equiposgolaverage["Equipo1"];
			}
			else if ($equiposgolaverage["ResultEquipo1"] < $equiposgolaverage["ResultEquipo2"])
			{
				$idequipogolaverage = $equiposgolaverage["Equipo2"];
			}
			//Modificar los puntos
			$query="update cla_average set GolAverage=".$idequipogolaverage." where Equipo1=".$equiposgolaverage["Equipo1"]. " and Equipo2=".$equiposgolaverage["Equipo2"];
			mysqli_query ($link, $query);
		}
			
		$query="select GolAverage, count(GolAverage) as Puntos from cla_average where GolAverage != 0 group by GolAverage order by count(GolAverage) desc";
		$qcuentagoalaverage=mysqli_query ($link, $query);
			
		while($equiposgolaveragecuenta=mysqli_fetch_array($qcuentagoalaverage, MYSQLI_BOTH))	
		{
			$query="select Puntos from clasificacion where IdEquipo = ".$equiposgolaveragecuenta["GolAverage"]." and IdCategoria = ".$categoria;
			$qequipogoalaverage=mysqli_query ($link, $query);
			$rowequipogoalaverage=mysqli_fetch_array($qequipogoalaverage);
		
			//Modificar los puntos
			$query="update clasificacion set Golaverage=".($rowequipogoalaverage["Puntos"]+$equiposgolaveragecuenta["Puntos"])." where IdEquipo=".$equiposgolaveragecuenta["GolAverage"];
			mysqli_query ($link, $query);
		}
			
		if ($totalequiposgolaverage == 2)
		{
			for ($y=0;$y<$totalequiposgolaverage;$y++)
			{
				$goles = $equiposgolaverage["ResultEquipo1"] - $equiposgolaverage["ResultEquipo2"];

				//Modificar los puntos
				$query="update cla_average set GolAverage=".$goles." where Equipo1=".$equiposgolaverage["Equipo1"]. " and Equipo2=".$equiposgolaverage["Equipo2"];
				mysqli_query ($query,$link);
			}
				
			$query="select * from cla_average order by GolAverage desc";
			$qcuentagoalaverage2=mysqli_query ($link, $query);
				
			$totalequiposgolaverage=mysqli_num_rows($qcuentagoalaverage2);
				
			$puntosaverage=$totalequiposgolaverage;
			while($equiposgolaveragecuenta2=mysqli_fetch_array($qcuentagoalaverage2, MYSQLI_BOTH))
			{
				$query="select Puntos from clasificacion where IdEquipo = ".$equiposgolaveragecuenta2["Equipo1"]." and IdCategoria = ".$categoria;
				$qequipogoalaverage=mysqli_query ($link, $query);
				$rowequipogoalaverage=mysqli_fetch_array($qequipogoalaverage);

				//Modificar los puntos
				$query="update clasificacion set Golaverage=".($equiposgolaveragecuenta2["Puntos"]+$puntosaverage)." where IdEquipo=".$equiposgolaveragecuenta2["Equipo1"]." and IdCategoria=".$categoria;
				mysqli_query ($link, $query);
				$puntosaverage--;
			}
		}

		$query="drop table cla_average";
		mysqli_query ($link, $query);
		
		mysqli_free_result($qcreatecalgoalaverage);
		mysqli_free_result($qcalgoalaverage);
		mysqli_free_result($qcuentagoalaverage);
		mysqli_free_result($qequipogoalaverage);
		mysqli_free_result($qcuentagoalaverage2);
	}
	
	mysqli_free_result($q_parametros);
	mysqli_free_result($q_categoria);
	mysqli_free_result($q_equipo);
	mysqli_free_result($q_goles);
	mysqli_free_result($q_partidos);
	mysqli_free_result($qgoalaveragedist);
}

function buscaEscudo($archivo)
{
    $fp = @fopen($archivo, 'r'); // @suppresses all error messages
    if ($fp) {
      fclose($fp);
      return true;
    }
    else {
    	return false;
    }
}

function buscaFoto($url)
{
	$a_url = parse_url($url);
	if (!isset($a_url['port'])) $a_url['port'] = 80;
	$errno = 0;
	$errstr = '';
	$timeout = 30;
	if(isset($a_url['host']) && $a_url['host']!=gethostbyname($a_url['host'])){
		$fid = fsockopen($a_url['host'], $a_url['port'], $errno, $errstr, $timeout);
		if (!$fid) return false;
		$page = isset($a_url['path'])  ?$a_url['path']:'';
		$page .= isset($a_url['query'])?'?'.$a_url['query']:'';
		fputs($fid, 'HEAD '.$page.' HTTP/1.0'."\r\n".'Host: '.$a_url['host']."\r\n\r\n");
		$head = fread($fid, 4096);
		fclose($fid);
		return preg_match('#^HTTP/.*\s+[200|302]+\s#i', $head);
	} else {
		return false;
	}
}

function elimina_acentos($cadena){
		$text = htmlentities($cadena, ENT_QUOTES, 'UTF-8');
		$text = strtolower($text);
		$patron = array (
			// Espacios, puntos y comas por guion
			'/[\., ]+/' => '%20',
 
			// Vocales
			'/&agrave;/' => 'a',
			'/&egrave;/' => 'e',
			'/&igrave;/' => 'i',
			'/&ograve;/' => 'o',
			'/&ugrave;/' => 'u',
 
			'/&aacute;/' => 'a',
			'/&eacute;/' => 'e',
			'/&iacute;/' => 'i',
			'/&oacute;/' => 'o',
			'/&uacute;/' => 'u',
 
			'/&acirc;/' => 'a',
			'/&ecirc;/' => 'e',
			'/&icirc;/' => 'i',
			'/&ocirc;/' => 'o',
			'/&ucirc;/' => 'u',
 
			'/&atilde;/' => 'a',
			'/&etilde;/' => 'e',
			'/&itilde;/' => 'i',
			'/&otilde;/' => 'o',
			'/&utilde;/' => 'u',
 
			'/&auml;/' => 'a',
			'/&euml;/' => 'e',
			'/&iuml;/' => 'i',
			'/&ouml;/' => 'o',
			'/&uuml;/' => 'u',
 
			'/&auml;/' => 'a',
			'/&euml;/' => 'e',
			'/&iuml;/' => 'i',
			'/&ouml;/' => 'o',
			'/&uuml;/' => 'u',
 
			// Otras letras y caracteres especiales
			'/&aring;/' => 'a',
			'/&ntilde;/' => 'n',
 
			// Agregar aqui mas caracteres si es necesario
 
		);
 
		$text = preg_replace(array_keys($patron),array_values($patron),$text);
		return $text;
}

function buscaEquipo($equipo,$link)
{
	$query="select * from equipos where IdEquipo=".$equipo;
	$qequipo=mysqli_query ($link, $query);
	$rowequipo=mysqli_fetch_array($qequipo);
	
	$equipo = cambiarAcentos($rowequipo["NombreEquipo"]);
	mysqli_free_result($qequipo);
	return $equipo;
}

function buscaTwitter($equipo,$link)
{
    $query="select * from equipos where IdEquipo=".$equipo;
    $qequipo=mysqli_query ($link, $query);
    $rowequipo=mysqli_fetch_array($qequipo);
    
    $twitter = cambiarAcentos($rowequipo["Twitter"]);
    mysqli_free_result($qequipo);
    return $twitter;
}

function posicionClasificacion($categoria, $equipo, $link)
{
	$query="select * from clasificacion where IdCategoria=".$categoria." order by Puntos desc, Golaverage desc, GolesFavor desc, GolesContra asc, Ganados desc, Empatados desc, Perdidos desc";
	$qclasificacion=mysqli_query ($link, $query);
	
	$contador=0;

	while($clasificacion=mysqli_fetch_array($qclasificacion, MYSQLI_BOTH))
	{
		if ($clasificacion["IdEquipo"] == $equipo)
		{
			$contador = $x+1;
		}
	}
	mysqli_free_result($qclasificacion);

	return $contador;
}

function setTablaGoleadores($link)
{
	$query="truncate table tablagoleadores";
	mysqli_query ($link, $query);
	
	$query="select IdJugador,Tipo,count(*) as Cuenta from goleadores group by idjugador,tipo";
	$qgoleadores=mysqli_query ($link, $query);

	while($goleadores=mysqli_fetch_array($qgoleadores, MYSQLI_BOTH))
	{
		$idJugador=$goleadores["IdJugador"];
		$idTipo=$goleadores["Tipo"];
		$cuenta=$goleadores["Cuenta"];
		$query="select * from tablagoleadores where IdJugador=".$idJugador;
		$qtabla=mysqli_query ($link, $query);
		$rowtabla=mysqli_fetch_array($qtabla, MYSQLI_BOTH);
		$cuentatabla=mysqli_num_rows($qtabla);
		
		if ($cuentatabla==0)
		{
			if ($idTipo==1 || $idTipo==3)
			{
				$query="insert into tablagoleadores (IdJugador, Total, Jugada) values (".$idJugador.",".$cuenta.",".$cuenta.")";
			}
			if ($idTipo==2)
			{
				$query="insert into tablagoleadores (IdJugador, Total, Penalty) values (".$idJugador.",".$cuenta.",".$cuenta.")";
			}
			mysqli_query ($link, $query);
		} else {
			$idTablaGoleadores=$rowtabla["IdTablaGoleadores"];
			$total=$rowtabla["Total"] + $cuenta;
			if ($idTipo==1 || $idTipo==3)
			{
				$query="update tablagoleadores set Total=".$total.", Jugada=".$cuenta." where idTablaGoleadores=".$idTablaGoleadores;
			}
			if ($idTipo==2)
			{
				$query="update tablagoleadores set Total=".$total.", Penalty=".$cuenta." where idTablaGoleadores=".$idTablaGoleadores;
			}
			mysqli_query ($link, $query);
		}
	}
}

function ObtenerNavegador($user_agent) {  
     $navegadores = array(  
          'Opera' => 'Opera',  
          'Mozilla Firefox'=> '(Firebird)|(Firefox)',  
          'Galeon' => 'Galeon',  
          'Mozilla'=>'Gecko',  
          'MyIE'=>'MyIE',  
          'Lynx' => 'Lynx',  
          'Netscape' => '(Mozilla/4\.75)|(Netscape6)|(Mozilla/4\.08)|(Mozilla/4\.5)|(Mozilla/4\.6)|(Mozilla/4\.79)',  
          'Konqueror'=>'Konqueror',  
          'Internet Explorer 7' => '(MSIE 7\.[0-9]+)',  
          'Internet Explorer 6' => '(MSIE 6\.[0-9]+)',  
          'Internet Explorer 5' => '(MSIE 5\.[0-9]+)',  
          'Internet Explorer 4' => '(MSIE 4\.[0-9]+)',  
);  
foreach($navegadores as $navegador=>$pattern){  
       if (eregi($pattern, $user_agent))  
       return $navegador;  
    }  
return 'Desconocido';  
}  
?>