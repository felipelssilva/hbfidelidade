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

	if ( !getPost('requestIdToDelet') )
	{
		echo "ERROR[001] id null";
	}
	else
	{
		@$mysql->sql_query("UPDATE `request` SET `trash` = 1 WHERE requestID = '".getPost('requestIdToDelet')."'; ");

		echo "Pedido deletado!";
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