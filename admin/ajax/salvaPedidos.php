<?php
ini_set('display_errors', true);
error_reporting(E_ALL);


function __autoload($classname) {
	$filename = "../classes/classe.". $classname .".php";
	include_once($filename);
}

/* Instanciamos os Objetos*/
$mysql = new conexao;


if( $_SERVER['REQUEST_METHOD']=='POST' )
{
	$conec = mysqli_connect("localhost","root","123","hbfidelidade");

	foreach(getPost('snack') as $snack)
	{
		$pegavalorSnack = mysqli_query( $conec, "SELECT value FROM hbfidelidade.snack WHERE id='".$snack."' ") or die("erro [001]: pegavalorSnack");
		$valorSnack = mysqli_fetch_array($pegavalorSnack);

		@$mysql->sql_query("INSERT INTO `request`
			(`dtReg`, `clientID`, `snackID`, `value`, `requestID`)
			VALUES
			(NOW(), '".getPost('client')."', '".$snack."', '".$valorSnack[0]."', '".getPost('requestID')."' );
			");
	}

	foreach(getPost('drink') as $drink)
	{
		$pegavalorDrink = mysqli_query($conec, "SELECT value FROM hbfidelidade.drink WHERE id='".$drink."' ") or die("erro [001]: pegavalorDrink");
		$valorDrink = mysqli_fetch_array($pegavalorDrink);

		@$mysql->sql_query("INSERT INTO `request`
			(`dtReg`, `clientID`, `drinkID`, `value`, `requestID`)
			VALUES
			(NOW(), '".getPost('client')."', '".$drink."', '".$valorDrink[0]."', '".getPost('requestID')."' );
			");

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