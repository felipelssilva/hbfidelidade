<?php
if($contas->MostraDados('level') == '0')
{
	?>

	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Clientes Cadastrados</h1>
			</div>
		</div>

		<?=$cadCliente->getClienteButton('t1');?>
		<?=$cadCliente->getClienteForm();?>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-bar-chart-o fa-fw"></i> Clientes
					</div>

					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="table-responsive">
									<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-clientes">
										<thead>
											<tr>
												<th>#</th>
												<th>Nome</th>
												<th>Email</th>
												<th>CPF</th>
												<th>Endereço</th>
												<th>Telefone</th>
												<th>Ações</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$pegaTodosUsuarios = @$mysql->sql_query("SELECT * FROM hbfidelidade.client WHERE trash = '0' ORDER BY id ASC") or die("erro [001]: pegaTodosUsuarios");

											while($showAllClient = mysqli_fetch_array($pegaTodosUsuarios))
											{
												$count++;
												?>
												<tr>
													<td><?=$count;//$showAllClient["id"];?></td>
													<td><?=$showAllClient["fName"];?></td>
													<td><a href="mailto:<?=$showAllClient["email"];?>"><?=$showAllClient["email"];?></a></td>
													<td><?=$showAllClient["cpf"];?></td>
													<td><?=$showAllClient["address"];?></td>
													<td><?=$showAllClient["phone1"];?></td>
													<td align="center">

														<a class="btn btn-primary btn-sm btn-outline btn-circle" href="javascript:void;" data-toggle="modal" data-target="#EditarCliente_<?=$showAllClient["id"];?>"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
														<a class="btn btn-danger btn-sm btn-outline btn-circle" href="javascript:void;" data-toggle="modal" data-target="#DeletarCliente_<?=$showAllClient["id"];?>"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
													</td>
												</tr>
												<?php
												echo $editarClientes->getEditarClienteForm($showAllClient["id"], $showAllClient["fName"], $showAllClient["lName"], $showAllClient["cpf"], $showAllClient["email"], $showAllClient["passwd"], $showAllClient["cep"], $showAllClient["address"], $showAllClient["district"], $showAllClient["city"], $showAllClient["state"], $showAllClient["phone1"], $showAllClient["phone2"]);

												echo $deletarClientes->getDeletarClienteForm($showAllClient["id"]);
												?>
												<?php } ?>

											</tbody>
									</table>
								</div>
							</div>
							<div class="col-lg-8">
								<div id="morris-bar-chart">
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
