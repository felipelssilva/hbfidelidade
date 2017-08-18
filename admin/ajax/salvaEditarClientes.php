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

	@$mysql->sql_query("UPDATE `client` SET `fName` = '".getPost('nome')."', `lName` = '".getPost('sobrenome')."', `cpf` = '".getPost('cpf')."', `email` = '".getPost('email')."', `passwd` = '".getPost('senha')."', `address` = '".getPost('endereco')."', `district` = '".getPost('bairro')."', `city` = '".getPost('cidade')."', `state` = '".getPost('estado')."', `phone1` = '".getPost('tel')."', `phone2` = '".getPost('cel')."', `cep` = '".getPost('cep')."' WHERE id = '".getPost('id')."'; ");

	echo "Cliente (".getPost('nome').") editado com sucesso!";

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