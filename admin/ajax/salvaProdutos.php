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
	if (getPost('tipo') == 0)
	{
		// lanches
		@$mysql->sql_query("INSERT INTO `snack` (
			`dtReg`,
			`description`,
			`type`,
			`value`
			) VALUES (
			NOW(),
			'".getPost('nomeProduto')."',
			'".getPost('tipoLanche')."',
			'".getPost('valor')."'
			);
			") or die ('error [001] cad snack');
	}
	elseif (getPost('tipo') == 1)
	{
		// bebidas
		@$mysql->sql_query("INSERT INTO `drink` (
			`dtReg`,
			`description`,
			`type`,
			`value`
			) VALUES (
			NOW(),
			'".getPost('nomeProduto')."',
			'".getPost('tipoBebida')."',
			'".getPost('valor')."'
			);
			") or die ('error [002] cad drink');
	}


	echo "Produto cadastrado com sucesso!";


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