<?php
header('Content-Type: text/html; charset=utf-8');

/* chama de sessões */
ini_set('session.use_cookies', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_lifetime', 0);
ini_set('default_charset','UTF-8');

/* inicia a sessão do php */
session_start();
/* codifica a sessão */
session_encode();

/* nomeia os coockies */
$cookie = md5('HBFidelidade');
/* set os coockies do sistema */
setcookie("CookieHBF", $cookie, time()+28800, "/hbfidelidade", "highburger.sytes.net:8080"); /* #1h - 3600 / 8h- 28800 / 1296000 expira 15  dia # 86400 expira 1 dia / expira em um mes 2592000*/


error_reporting(E_ALL);
ini_set("display_errors", 0);


function __autoload($classname) {
	$filename = "./classes/classe.". $classname .".php";
	include_once($filename);
}


/* Instanciamos os Objetos */
$mysql = new conexao;
$logar = new logar;
$deslogar = new deslogar;

if($_GET["logar"] === "ok")
{
	$logar->prossegueLogin();
}
if($_GET["deslogar"] === "ok")
{
	$deslogar->sair();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>HB - Fidelidade</title>

	<link rel="shortcut icon" href="img/favicon.ico" />

	<!-- Bootstrap Core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">


	<!-- DataTables CSS -->
	<link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

	<!-- DataTables Responsive CSS -->
	<link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">


	<!-- Custom CSS -->
	<link href="dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

    	<?php

    	if($_SESSION['usuario'] and $_SESSION['senha'])
    	{

    		$contas = new contas;

    		$cadCliente = new cadCliente;
    		$editarClientes = new editarClientes;
    		$deletarClientes = new deletarClientes;

    		$editarPedidos = new editarPedidos;
    		$deletarPedidos = new deletarPedidos;

    		$cadProdutos = new cadProdutos;
    		$editarProdutos = new editarProdutos;
    		$deletarProdutos = new deletarProdutos;

    		$contas->getConta();

    		?>


    		<div id="wrapper">

    			<?php

    			include_once("pages/menu.php");

    			$ir = $_GET['go'];
    			$ext = (isset($_GET['ext']));
    			if (empty($ext)){ $ext="php"; }
    			if (empty($ir)){ $ir = "pages/home.php"; } else { $ir .= ".".$ext; }
    			if (file_exists($ir)){ include $ir; } else { include "pages/erros/404.html"; }

    			?>

    		</div>
    		<!-- /#wrapper -->
    		<?php
    	}
    	else
    	{
    		include_once("pages/login.php");
    	}
    	?>

    	<!-- jQuery -->
    	<script src="vendor/jquery/jquery.min.js"></script>

    	<!-- Bootstrap Core JavaScript -->
    	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    	<!-- Metis Menu Plugin JavaScript -->
    	<script src="vendor/metisMenu/metisMenu.min.js"></script>


    	<!-- DataTables JavaScript -->
    	<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    	<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    	<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    	<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>

    	<!-- Custom Theme JavaScript -->
    	<script src="dist/js/sb-admin-2.js"></script>

    	<script type="text/javascript">
    		$('#tipo').on('change',function()
    		{
    			if( $(this).val()==="0")
    			{
    				$("#tipodoLanche").show();

    				if( $(this).val()>="0")
    				{
    					$("#valoritem1").show();
    				}
    			}
    			else
    			{
    				$("#tipodoLanche").hide();

    				if( $(this).val()>="0")
    				{
    					$("#valoritem1").hide();
    				}
    			}

    			if( $(this).val()==="1")
    			{
    				$("#tipodaBebida").show();

    				if( $(this).val()>="0")
    				{
    					$("#valoritem2").show();
    				}
    			}
    			else
    			{
    				$("#tipodaBebida").hide();

    				if( $(this).val()>="0")
    				{
    					$("#valoritem2").hide();
    				}
    			}
    		});
    	</script>

    	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    	<script type="text/javascript" >
    		$(document).ready(function() {
    			$('#dataTables-clientes').DataTable({
    				responsive: true
    			});
    		});

    		$(document).ready(function() {
    			$('#dataTables-lanches').DataTable({
    				responsive: true
    			});
    		});

    		$(document).ready(function() {
    			$('#dataTables-bebidas').DataTable({
    				responsive: true
    			});
    		});

    		$(document).ready(function() {
    			$('#dataTables-pedidos').DataTable({
    				responsive: true
    			});
    		});

    	</script>

    	<?php
    	if($_SESSION['usuario'] and $_SESSION['senha'])
    	{
    		?>
    		<script type="text/javascript">

    			$(document).ready(function(){
    				$('#ajax_form_configuracoes').validate({
    					rules: {
    						nome: { required: true },
    						sobrenome: { required: true },
    						cpf: { required: true },
    						email: { required: true },
    						tel1: { required: true },
    						tel2: { required: true },
    						cep: { required: true },
    						endereco: { required: true },
    						bairro: { required: true },
    						cidade: { required: true },
    						estado: { required: true }
    					},
    					messages: {
    						nome: { required: 'Digite o nome' },
    						sobrenome: { required: 'Digite o sobrenome' },
    						cpf: { required: 'Digite o CPF' },
    						email: { required: 'Digite o Email' },
    						tel1: { required: 'Digite o Telefone' },
    						tel2: { required: 'Digite o celular' },
    						cep: { required: 'Digite o CEP' },
    						endereco: { required: 'Digite o endereço' },
    						bairro: { required: 'Digite o bairro' },
    						cidade: { required: 'Digite a cidade' },
    						estado: { required: 'Digite o estado' }
    					},
    					submitHandler: function( form ){
    						var dados = $( form ).serialize();

    						$.ajax({
    							type: "POST",
    							url: "ajax/salvaConfiguracaoConta.php",
    							data: dados,
    							success: function( data )
    							{
    								alert (data); window.location = '?go=pages/usuario/configuracoes';
    							}
    						});

    						return false;
    					}
    				});
    			});

    		</script>
    		<?php
    	}
    	?>


    	<?php
    	if($contas->MostraDados('level') == '0')
    	{
    		?>
    		<script type="text/javascript">

    			$(document).ready(function(){
    				$('#ajax_form_cadPedidos').validate({
    					rules: {
    						client: { required: true },
    						snack: { required: true }
    					},
    					messages: {
    						client: { required: 'Preencha o campo cliente' },
    						snack: { required: 'Informe o lanche ' }
    					},
    					submitHandler: function( form ){
    						var dados = $( form ).serialize();

    						$.ajax({
    							type: "POST",
    							url: "ajax/salvaPedidos.php",
    							data: dados,
    							success: function( data )
    							{
    								alert ("Pedido efetuado com sucesso!"); window.location = '?go=pages/administrativo/pedidos';
    							//alert( data );
    						}
    					});

    						return false;
    					}
    				});
    			});

    		</script>

    		<?php
    		if($_SESSION['usuario'] and $_SESSION['senha'])
    		{
    			echo $cadCliente->getClienteJs();

    			echo $cadProdutos->getProdutosJs();


    			$pegaTodosProdutos = @$mysql->sql_query("SELECT * FROM hbfidelidade.snack WHERE trash = 0 ") or die ("erro [001]: pegaTodosProdutos");

    			while($showAllProducts = mysqli_fetch_array($pegaTodosProdutos))
    			{
    				echo $editarProdutos->getEditarProdutosJs($showAllProducts['id'], 'snack');
    				echo $deletarProdutos->getDeletarProdutosJs($showAllProducts['id'], 'snack');
    			}

    			$pegaTodosProdutos2 = @$mysql->sql_query("SELECT * FROM hbfidelidade.drink WHERE trash = 0 ") or die ("erro [002]: pegaTodosProdutos2");

    			while($showAllProducts2 = mysqli_fetch_array($pegaTodosProdutos2))
    			{
    				echo $editarProdutos->getEditarProdutosJs($showAllProducts2['id'], 'drink');
    				echo $deletarProdutos->getDeletarProdutosJs($showAllProducts2['id'], 'drink');
    			}


    			$pegaTodosUsuarios2 = @$mysql->sql_query("SELECT * FROM hbfidelidade.client WHERE trash = '0' ") or die ("erro [001]: pegaTodosUsuarios2");

    			while($carajo = mysqli_fetch_array($pegaTodosUsuarios2))
    			{

    				echo $editarClientes->getEditarClienteJs($carajo['id']);
    				echo $deletarClientes->getDeletarClienteJs($carajo['id']);
    			}


    			$pegaTodosPedidos2 = @$mysql->sql_query("SELECT rq.id, rq.dtReg, c.fName, c.lName, SUM(rq.value), rq.requestID FROM hbfidelidade.request AS rq LEFT JOIN hbfidelidade.client AS c ON rq.clientID=c.id WHERE c.trash = 0 AND rq.trash = 0 GROUP BY rq.requestID") or die ("erro [001]: pegaTodosPedidos2");

    			while($showAllOrder2 = mysqli_fetch_array($pegaTodosPedidos2))
    			{
    				//echo $editarPedidos->getEditarPedidosJs($showAllOrder2['requestID']);
    				echo $deletarPedidos->getDeletarPedidosJs($showAllOrder2['requestID']);
    			}

    		}

    	}
    	?>

    </body>

    </html>
