<?php

class criaLogAcesso
{
	function criaLogAcesso($digitou, $pagina)
	{

		$data = date("d.m.Y"); /* Pega a Data para grava no Log */
		$hora = date("H:i:s"); /* Pega a Hora para grava no Log */
		$ip = $_SERVER['REMOTE_ADDR'];
		$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);

		$arquivo = "../log/SeguracaPainelAdmin.log"; /* nome do arquivo de log */
		if(!file_exists("$arquivo")){
			echo "The SecureAppAdmin.log file was not found or is not with your 777 permissions, create or change your permissions";
		}
		$fp_painel = fopen($arquivo, "a");

		$log_painel = "Página: $pagina \r\n";
		$log_painel.= "Data: $data \r\n";
		$log_painel.= "Hora: $hora \r\n";
		$log_painel.= "IP: $ip \r\n";
		$log_painel.= "IP Reverso: $host \r\n";
		$log_painel.= "Ação: $digitou \r\n";
		$log_painel.= "\r\n\r\n";
		$log_painel.= "----------------------------------------------------------------------------------------\r\n\r\n";

		fwrite($fp_painel, $log_painel);
		fclose($fp_painel);

	}

}



?>