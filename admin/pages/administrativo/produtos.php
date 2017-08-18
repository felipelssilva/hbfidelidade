<?php
if($contas->MostraDados('level') == '0')
{
	?>

	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Produtos Cadastrados</h1>
			</div>
		</div>

		<!-- Button trigger modal -->
		<button id="nvproduto " type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#NovoProduto">
			Novo produto
		</button>

		<?=$cadProdutos->getProdutosForm();?>

		<br clear="all">
		<br clear="all">

		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-bar-chart-o fa-fw"></i> Lanches
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="table-responsive">
									<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-lanches">
										<thead>
											<tr>
												<th>#</th>
												<th>Nome</th>
												<th>Tipo</th>
												<th>Valor</th>
												<th>Ações</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$pegaTodosProdutos = @$mysql->sql_query("SELECT * FROM hbfidelidade.snack WHERE trash = 0 ORDER BY id ASC") or die ("erro [001]: pegaTodosProdutos");

											while($showAllProducts = mysqli_fetch_array($pegaTodosProdutos))
											{
												$count1++;
												switch ($showAllProducts["type"])
												{
													case '0':
													$lanche = "<span class='label label-default'>Carne</span>";
													break;
													case '1':
													$lanche = "<span class='label label-default'>Frango</span>";
													break;
													case '2':
													$lanche = "<span class='label label-default'>Saladas</span>";
													break;
													case '3':
													$lanche = "<span class='label label-default'>Adicionais</span>";
													break;
													case '4':
													$lanche = "<span class='label label-default'>Molhos</span>";
													break;
													case '5':
													$lanche = "<span class='label label-default'>Outros</span>";
													break;
													default:
													$lanche = "<span class='label label-danger'>ERROR</span>";
													break;
												}
												?>
												<tr>
													<td><?=$count1; //$showAllProducts["id"];?></td>
													<td><?=$showAllProducts["description"]; ?></td>
													<td><?=$lanche;?></td>
													<td><kbd><?=$showAllProducts["value"];?></kbd></td>
													<td>

														<a class="btn btn-primary btn-sm btn-outline btn-circle" href="javascript:void;" data-toggle="modal" data-target="#EditarProdutos_snack_<?=$showAllProducts["id"];?>"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
														<a class="btn btn-danger btn-sm btn-outline btn-circle" href="javascript:void;" data-toggle="modal" data-target="#DeletarProdutos_snack_<?=$showAllProducts["id"];?>"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>

													</td>
												</tr>
												<?php
												echo $editarProdutos->getEditarProdutosForm($showAllProducts["id"], $showAllProducts["description"], 'snack', $showAllProducts["value"], $showAllProducts["type"]);
												echo $deletarProdutos->getDeletarProdutosForm($showAllProducts["id"], 'snack');

											} ?>

										</tbody>
									</table>
								</div>
								<div class="col-lg-8">
									<div id="morris-bar-chart"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-bar-chart-o fa-fw"></i> Bebidas
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="table-responsive">
									<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-bebidas">
										<thead>
											<tr>
												<th>#</th>
												<th>Nome</th>
												<th>Tipo</th>
												<th>Valor</th>
												<th>Ações</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$pegaTodosProdutos2 = @$mysql->sql_query("SELECT * FROM hbfidelidade.drink WHERE trash = 0  ORDER BY id ASC") or die ("erro [002]: pegaTodosProdutos2");

											while($showAllProducts2 = mysqli_fetch_array($pegaTodosProdutos2))
											{
												$count2++;
												switch ($showAllProducts2["type"])
												{
													case '0':
													$bebida = "<span class='label label-default'>Cervejas</span>";
													break;
													case '2':
													$bebida = "<span class='label label-default'>Águas</span>";
													break;
													case '1':
													$bebida = "<span class='label label-default'>Sucos</span>";
													break;
													case '3':
													$bebida = "<span class='label label-default'>Refrigerantes</span>";
													break;
													case '4':
													$bebida = "<span class='label label-default'>Outros</span>";
													break;
													default:
													$bebida = "<span class='label label-danger'>ERROR</span>";
													break;
												}
												?>
												<tr>
													<td><?=$count2; //$showAllProducts2["id"];?></td>
													<td><?=$showAllProducts2["description"];?></td>
													<td><?=$bebida;?></td>
													<td><kbd><?=$showAllProducts2["value"];?></kbd></td>
													<td>

														<a class="btn btn-primary btn-sm btn-outline btn-circle" href="javascript:void;" data-toggle="modal" data-target="#EditarProdutos_drink_<?=$showAllProducts2["id"];?>"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
														<a class="btn btn-danger btn-sm btn-outline btn-circle" href="javascript:void;" data-toggle="modal" data-target="#DeletarProdutos_drink_<?=$showAllProducts2["id"];?>"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>

													</td>
												</tr>
												<?php

												echo $editarProdutos->getEditarProdutosForm($showAllProducts2["id"], $showAllProducts2["description"], 'drink', $showAllProducts2["value"], $showAllProducts2["type"]);
												echo $deletarProdutos->getDeletarProdutosForm($showAllProducts2["id"], 'drink');

											}
											?>

										</tbody>
									</table>
								</div>
							</div>
							<div class="col-lg-8">
								<div id="morris-bar-chart"></div>
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
