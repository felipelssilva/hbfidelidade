<?php
if($contas->MostraDados('level') == '0')
{
	?>

	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Pedidos Cadastrados</h1>
			</div>
		</div>

		<!-- Button trigger modal -->
		<button id="nvpedido " type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#NovoPedido">
			Novo Pedido
		</button>

		<!-- Modal -->
		<div class="modal fade" id="NovoPedido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Novo pedido</h4>
					</div>

					<form  method="post" action="" id="ajax_form_cadPedidos">

						<div class="modal-body">

							<div class="alert alert-danger" role="alert"><p><b>Atenção</b></p> <p>Caso queira escolher mais de um item utilize o botão <kbd>CTRL</kbd> e escolha várias opções.</p></div>

							<label>Cliente:
								<select name="client"  required="required" class="form-control">
									<option value="">--- Escolha um Cliente ---</option>
									<?php
									$pegaTodosUsuarios = @$mysql->sql_query("SELECT * FROM hbfidelidade.client WHERE trash = '0' ORDER BY id ASC ") or die("erro [001]: pegaTodosUsuarios");

									while($showAllClient = mysqli_fetch_array($pegaTodosUsuarios))
									{
										?>
										<option value="<?=$showAllClient['id'];?>"><?=$showAllClient['fName']." ".$showAllClient['lName'];?></option>
										<?php } ?>
									</select>
								</label>

								<?=$cadCliente->getClienteButton('t2');?>

								<br clear="all">

								<label>Lanche:
									<select name="snack[]" multiple style="height:300px;" class="form-control">
										<?php
										$pegaTodosLanches = @$mysql->sql_query("SELECT * FROM hbfidelidade.snack WHERE trash = '0' ORDER BY id ASC") or die("erro [001]: pegaTodosLanches");

										while($showAllSnack = mysqli_fetch_array($pegaTodosLanches))
										{
											switch ($showAllSnack['type'])
											{
												case '0':
												$type = 'Carne';
												break;
												case '1':
												$type = 'Frango';
												break;
												case '2':
												$type = 'Saladas';
												break;
												case '3':
												$type = 'Adicionais';
												break;
												case '4':
												$type = 'Molhos';
												break;
												case '5':
												$type = 'Outros';
												break;
												default:
												$type = 'ERRO';
												break;
											}

											?>
											<option value="<?=$showAllSnack['id'];?>"><?=$showAllSnack['description']." ({$type}) (".$showAllSnack['value']." pts)";?></option>
											<?php } ?>
										</select>
									</label>
									<label>Bebiba:
										<select name="drink[]" multiple style="height:300px;" class="form-control">
											<?php
											$pegaTodosBebidas = @$mysql->sql_query("SELECT * FROM hbfidelidade.drink WHERE trash = '0' ORDER BY id ASC") or die("erro [001]: pegaTodosBebidas");

											while($showAllDrink = mysqli_fetch_array($pegaTodosBebidas))
											{
												switch ($showAllDrink['type'])
												{
													case '0':
													$type = 'Cerveja';
													break;
													case '1':
													$type = 'Suco';
													break;
													case '2':
													$type = 'Água';
													break;
													case '3':
													$type = 'Refrigerante';
													break;
													default:
													$type = 'ERRO';
													break;
												}

												?>
												<option value="<?=$showAllDrink['id'];?>"><?=$showAllDrink['description']." ({$type}) (".$showAllDrink['value']." pts)";?></option>
												<?php } ?>
											</select>
										</label>

									</div>
									<div class="modal-footer">
										<?php
										$pegatotalrequest = @$mysql->sql_query("SELECT COUNT(*) FROM hbfidelidade.request GROUP by dtReg") or die("erro [001]: pegatotalrequest");
										$TabelaRequest = mysqli_num_rows($pegatotalrequest) + 1;
										echo '<input name="requestID" value="HBF'.str_pad($TabelaRequest, 10, "0", STR_PAD_LEFT).'" style="opacity:0;">';
										?>
										<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancelar</button>
										<label><input type="submit" class="btn btn-success" name="enviar" value="Cadastrar pedido" /></label>
									</div>

								</form>
							</div>
						</div>
					</div>

					<?=$cadCliente->getClienteForm();?>

					<br clear="all">
					<br clear="all">

					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-bar-chart-o fa-fw"></i> Pedidos
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-12">
											<div class="table-responsive">
												<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-pedidos">
													<thead>
														<tr>
															<th>#</th>
															<th>Identificação do Pedido</th>
															<th>Data do pedido</th>
															<th>Cliente</th>
															<th>Total de Pontos</th>
															<th>Ações</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$pegaTodosPedidos = @$mysql->sql_query("SELECT rq.id, rq.dtReg, c.fName, c.lName, SUM(rq.value), rq.requestID, c.id, rq.snackID, rq.drinkID FROM hbfidelidade.request AS rq LEFT JOIN hbfidelidade.client AS c ON rq.clientID=c.id WHERE c.trash = 0 AND rq.trash = 0 GROUP BY rq.requestID") or die ("erro [001]: pegaTodosPedidos");

														while($showAllOrder = mysqli_fetch_array($pegaTodosPedidos))
														{
															$count++;
															?>
															<tr>
																<td><?=$count;?></td>
																<td><a href="?go=pages/administrativo/pedidos/ver&requestId=<?=$showAllOrder["requestID"];?>"><?=$showAllOrder["requestID"];?></a></td>
																<td><?=$showAllOrder["dtReg"];?></td>
																<td><?=$showAllOrder["fName"]." ".$showAllOrder["lName"];?></td>
																<td><?=$showAllOrder[4];?></td>
																<td align="center">

																	<a  disabled="disabled" class="btn btn-primary btn-sm btn-outline btn-circle" href="javascript:void;" data-toggle="modal" data-target="#EditarPedido_<?=$showAllOrder["requestID"];?>"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
																	<a class="btn btn-danger btn-sm btn-outline btn-circle" href="javascript:void;" data-toggle="modal" data-target="#DeletarPedido_<?=$showAllOrder["requestID"];?>"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>

																</td>
															</tr>
															<?php

															//echo $editarPedidos->getEditarPedidosForm($showAllOrder["requestID"], $showAllOrder[6], $showAllOrder["fName"].' '.$showAllOrder["lName"]);

															echo $deletarPedidos->getDeletarPedidosForm($showAllOrder["requestID"]);
														}
														?>

													</tbody>
												</table>
												<div class="col-lg-8">
													<div id="morris-bar-chart"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php
		}
		?>
