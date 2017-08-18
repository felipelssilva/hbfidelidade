<?php
if($_SESSION['usuario'] and $_SESSION['senha'])
{
	?>


	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Meus pedidos</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-bar-chart-o fa-fw"></i> Pedidos
					</div>
					<div class="panel-body">

						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-pedidos">
							<thead>
								<tr>
									<th>#</th>
									<th>Identificação do Pedido</th>
									<th>Data do pedido</th>
									<th>Total de Pontos</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$pegaPedidoCliente = @$mysql->sql_query("SELECT rq.id, rq.dtReg, c.fName, c.lName, SUM(rq.value), rq.requestID, c.id, rq.snackID, rq.drinkID FROM hbfidelidade.request AS rq LEFT JOIN hbfidelidade.client AS c ON rq.clientID=c.id WHERE c.trash = 0 AND rq.trash = 0 AND c.id = '".$showClient->id."' GROUP BY rq.requestID") or die ("erro [001]: pegaTodosPedidos");

								while($showOrderClient = mysqli_fetch_array($pegaPedidoCliente))
								{
									$count++;
									?>
									<tr>
										<td><?=$count;?></td>
										<td><a href="?go=pages/pedidos/ver&requestId=<?=$showOrderClient["requestID"];?>"><?=$showOrderClient["requestID"];?></a></td>
										<td><?=$showOrderClient["dtReg"];?></td>
										<td><?=$showOrderClient[4];?></td>
									</tr>
									<?php
								}
								?>

							</tbody>
						</table>


					</div>
				</div>
			</div>
		</div>

	</div>



	<?
}
?>
