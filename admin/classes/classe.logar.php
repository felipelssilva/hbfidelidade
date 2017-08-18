<?php

class Logar
{

	function prossegueLogin()
	{
		global $mysql;
		$usuario = addslashes($_POST['usuario']);
		$senha = addslashes($_POST['senha']);

		$select_usuario = @$mysql->sql_query("SELECT email FROM hbfidelidade.client WHERE email='".$usuario."' AND trash = '0' ") or die("erro [001]: select_usuario");

		$logar = @$mysql->sql_query("SELECT * FROM hbfidelidade.client WHERE email='".$usuario."' AND passwd='".$senha."' AND trash = '0' ") or die("error [002]: logar");


		if ($select_usuario->num_rows < 1)
		{
			echo "<script>alert('Account not registered'); location='?errAccNotRegistred'</script>";
		}


		if ($logar->num_rows > 0)
		{
			$_SESSION['usuario'] = $usuario;
			$_SESSION['senha'] = $senha;
		}


		if(!$_SESSION['usuario'] and !$_SESSION['senha'])
		{

			echo "<script> alert('Password or user does not match');  location='?errUserPasswdNotMatch'</script>";

		} else {

			$ultimologin = date('Y-m-d H:i:s');
			$ip = $_SERVER['REMOTE_ADDR'];

			$seleciona_id_usuario = @$mysql->sql_query("SELECT id FROM hbfidelidade.client WHERE email='".$_SESSION['usuario']."' AND trash = '0' ") or die("error [003]: select_id_user");

			$id_usuario = $seleciona_id_usuario->fetch_array();

			$isert_log_login =
			@$mysql->sql_query("INSERT INTO hbfidelidade.logLogin (
				`dtLogin`,
				`clientID`,
				`ip`
				) VALUES (
				'".$ultimologin."',
				'".$id_usuario[0]."',
				'".$ip."'
				);
				") or die("error [004]: isert_log_login");


			header('Location: '.$_SERVER['HTTP_REFERER'].'');
			exit();
		}

	}

}

?>