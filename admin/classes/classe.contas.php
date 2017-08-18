<?php

class Contas
{
	function getConta()
	{
		global $mysql;
		global $showClient;

		$pega_usuario = @$mysql->sql_query("SELECT * FROM hbfidelidade.client WHERE email='".$_SESSION['usuario']."'") or die("erro [001]: pega_usuario");

		$arrayShowClients = array();

		while($showClient = mysqli_fetch_array($pega_usuario))

			$arrayShowClients[] = $showClient;

		foreach ($arrayShowClients as $client)
		{
			$pegaLogAcesso = @$mysql->sql_query("SELECT * FROM hbfidelidade.logLogin WHERE clientID='".$client['id']."' ORDER BY id DESC LIMIT 1,1 ") or die("erro [001]: pegaLogAcesso");
			$showLogAcesso = mysqli_fetch_array($pegaLogAcesso);

			$showClient->id 		= $client['id'];
			$showClient->dtReg 		= $client['dtReg'];
			$showClient->nome 		= $client['fName'];
			$showClient->sobrenome 	= $client['lName'];
			$showClient->cpf 		= $client['cpf'];
			$showClient->email 		= $client['email'];
			$showClient->senha 		= $client['passwd'];
			$showClient->endereco 	= $client['address'];
			$showClient->bairro 	= $client['district'];
			$showClient->cidade 	= $client['city'];
			$showClient->estado 	= $client['state'];
			$showClient->tel1 		= $client['phone1'];
			$showClient->tel2 		= $client['phone2'];
			$showClient->cep 		= $client['cep'];
			$showClient->level 		= $client['level'];
			$showClient->trash 		= $client['trash'];
			$showClient->LastAccess = $showLogAcesso['dtLogin'];
		}

	}

	function MostraDados($dado)
	{
		global $showClient;
		return $showClient->$dado;
	}

	function MostraTodasContas($dado)
	{
		global $mysql;
		global $showAllClient;

		$pegaTodosUsuarios = @$mysql->sql_query("SELECT * FROM hbfidelidade.client WHERE trash = '0' ") or die("erro [001]: pegaTodosUsuarios");

		$arrayShowAllClients = array();

		while($showAllClient = mysqli_fetch_array($pegaTodosUsuarios))

			$arrayShowAllClients[] = $showAllClient;

		foreach ($arrayShowAllClients as $allClient)
		{
			$showAllClient->id 			= $allClient['id'];
			$showAllClient->dtReg 		= $allClient['dtReg'];
			$showAllClient->nome 		= $allClient['fName'];
			$showAllClient->sobrenome 	= $allClient['lName'];
			$showAllClient->cpf 		= $allClient['cpf'];
			$showAllClient->email 		= $allClient['email'];
			$showAllClient->senha 		= $allClient['passwd'];
			$showAllClient->endereco 	= $allClient['address'];
			$showAllClient->bairro 		= $allClient['district'];
			$showAllClient->cidade 		= $allClient['city'];
			$showAllClient->estado 		= $allClient['state'];
			$showAllClient->tel1 		= $allClient['phone1'];
			$showAllClient->tel2 		= $allClient['phone2'];
			$showAllClient->cep 		= $allClient['cep'];
			$showAllClient->level 		= $allClient['level'];
			$showAllClient->trash 		= $allClient['trash'];
		}

		return $showAllClient->$dado;
	}
}

?>