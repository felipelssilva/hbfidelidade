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

	@$mysql->sql_query("UPDATE `client` SET
		`fName` = '".getPost('nome')."',
		`lName` = '".getPost('sobrenome')."',
		`cpf` = '".getPost('cpf')."',
		`address` = '".getPost('endereco')."',
		`district` = '".getPost('bairro')."',
		`city` ='".getPost('cidade')."',
		`state` ='".getPost('estado')."',
		`phone1` ='".getPost('tel1')."',
		`phone2` ='".getPost('tel2')."',
		`cep` = '".getPost('cep')."'
		WHERE id = '".getPost('iduser')."';
		");

	echo "Cliente editado com sucesso!";

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