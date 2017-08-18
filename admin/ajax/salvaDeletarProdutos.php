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

	if ( !getPost('productIdToDelet') )
	{
		echo "ERROR[001] id null";
	}
	else
	{
		if (getPost('tipo') === 'snack')
		{
			@$mysql->sql_query("UPDATE `snack` SET `trash` = 1 WHERE id = '".getPost('productIdToDelet')."'; ");

			echo "Produto (lanche) deletado!";
		}
		elseif (getPost('tipo') === 'drink')
		{
			@$mysql->sql_query("UPDATE `drink` SET `trash` = 1 WHERE id = '".getPost('productIdToDelet')."'; ");

			echo "Produto (bebida) deletado!";
		}

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