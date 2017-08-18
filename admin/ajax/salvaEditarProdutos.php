<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

function __autoload($classname) {
	$filename = "../classes/classe.". $classname .".php";
	include_once($filename);
}

/* Instanciamos os Objetos */
$mysql = new conexao;

if( $_SERVER['REQUEST_METHOD']=='POST' )
{

	if (getPost('tipo') == '0')
	{
		/* mudar snack */
		@$mysql->sql_query("UPDATE `snack` SET `description` = '".getPost('nomeProduto')."', `type` = '".getPost('tipoLanche')."', `value` = '".getPost('valor')."' WHERE id = '".getPost('idproduto')."'; ");
		echo "Lanche (".getPost('nomeProduto').") editado com sucesso!";
	}
	elseif (getPost('tipo') == '1')
	{
		/* muda drink */
		@$mysql->sql_query("UPDATE `drink` SET `description` = '".getPost('nomeProduto')."', `type` = '".getPost('tipoBebida')."', `value` = '".getPost('valor')."' WHERE id = '".getPost('idproduto')."'; ");
		echo "Bebida (".getPost('nomeProduto').") editado com sucesso!";
	}



}

function getPost( $key )
{
	return isset( $_POST[ $key ] ) ? filter( $_POST[ $key ] ) : null;
}

function filter( $var )
{
	return $var;
}

?>