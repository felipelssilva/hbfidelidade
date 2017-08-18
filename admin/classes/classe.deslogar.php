<?php

class Deslogar
{

	function sair()
	{
		session_destroy();

		header('Location: ./#deslogado');
		exit();
	}
}


?>