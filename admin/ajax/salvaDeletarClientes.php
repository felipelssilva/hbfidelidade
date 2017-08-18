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

	if ( !getPost('idDelet') )
	{
		echo "ERROR[001] id null";
	}
	else
	{
		@$mysql->sql_query("UPDATE `client` SET	`trash` = '1' WHERE id = '".getPost('idDelet')."'; ");

		echo "Cliente deletado!";
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