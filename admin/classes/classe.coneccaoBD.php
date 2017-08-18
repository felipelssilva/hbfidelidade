<?php


class Conexao()
{
	public function __construct($host, $user, $pass, $bd)
	{
		mysqli_connect($host, $user, $pass) or die('Erro ao conectar com o servidor');
		mysqli_select_db($bd) or die('Erro ao conectar com o banco de dados');
	}
}

?>