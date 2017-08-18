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
	$pegaEmail = @$mysql->sql_query("SELECT email FROM hbfidelidade.client WHERE email='".getPost("email")."' ") or die("erro [001]: pegaEmail");

	if(mysqli_num_rows($pegaEmail) > 0)
	{
		echo "Email já cadastrado";
	}
	else
	{

		@$mysql->sql_query("INSERT INTO `client` (
			`dtReg`,
			`fName`,
			`lName`,
			`cpf`,
			`email`,
			`passwd`,
			`address`,
			`district`,
			`city`,
			`state`,
			`phone1`,
			`phone2`,
			`cep`
			) VALUES (
			NOW(),
			'".getPost('nome')."',
			'".getPost('sobrenome')."',
			'".getPost('cpf')."',
			'".getPost('email')."',
			'".getPost('senha')."',
			'".getPost('endereco')."',
			'".getPost('bairro')."',
			'".getPost('cidade')."',
			'".getPost('estado')."',
			'".getPost('tel')."',
			'".getPost('cel')."',
			'".getPost('cep')."'
			);
			");

		echo "Cliente cadastrado com sucesso!";

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