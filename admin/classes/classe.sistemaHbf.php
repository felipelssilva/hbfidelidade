<?php

class sistemaHbf {

	function IntervaloDataNome($data1,$usarSoHojeOntem=0)
	{
		$data2 = date("d/m/Y");

		for($i=1;$i<=2;$i++)
		{
			${"dia".$i} =  substr(${"data".$i},0,2);
			${"mes".$i} = substr(${"data".$i},3,2);
			${"ano".$i} = substr(${"data".$i},6,4);
			${"ano".$i} = substr(${"data".$i},6,4);
			${"horas".$i} = substr(${"data".$i},11,2);
			${"minutos".$i} = substr(${"data".$i},14,2);
		}

		$segundos = mktime($horas2,$minutos2,0,$mes2,$dia2,$ano2) - mktime($horas1,$minutos1,0,$mes1,$dia1,$ano1);
		$difere = round($segundos/86400);

		if($difere == 0) {return "Hoje";}
		if($difere == 1) {return "Ontem";}

		if($usarSoHojeOntem == 1)
		{
			return $data1;
		}

		if($difere < 7)
		{
			return $difere . " dias atrás";
		}
		else
		{
			if($difere < 30)
			{
				return round($difere / 7) . " semana(s) atrás";
			}
			else
			{
				if($difere < 365)
				{
					return round($difere / 30) . " mês(es) atrás";
				}
				else
				{
					return round($difere / 365) . " ano(s) atrás";
				}
			}
		}
	}

}

?>