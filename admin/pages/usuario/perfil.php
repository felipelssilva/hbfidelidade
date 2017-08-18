<?php
if($_SESSION['usuario'] and $_SESSION['senha'])
{

	?>



	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Meus perfil</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-bar-chart-o fa-fw"></i> Perfil
					</div>
					<div class="panel-body">

						<div class="form-group col-lg-2">
							<label>Data do cadastro:</label>
							<p class="form-control-static">
								<?=$showClient->dtReg;?>
							</p>
						</div>

						<div class="form-group col-lg-2">
							<label>Último acesso:</label>
							<p class="form-control-static">
								<?=$showClient->LastAccess;?>
							</p>
						</div>

						<br clear="all">
						<hr>

						<div class="form-group col-lg-2">
							<label>Nome:</label>
							<p class="form-control-static">
								<?=$showClient->nome;?>
								<?=$showClient->sobrenome;?>
							</p>
						</div>

						<div class="form-group col-lg-2">
							<label>CPF: </label>
							<p class="form-control-static">
								<?=$showClient->cpf;?>
							</p>
						</div>

						<div class="form-group col-lg-2">
							<label>Email: </label>
							<p class="form-control-static">
								<?=$showClient->email;?>
							</p>
						</div>

						<div class="form-group col-lg-2">
							<label>Telefone: </label>
							<p class="form-control-static">
								<?=$showClient->tel1;?>
							</p>
						</div>

						<div class="form-group col-lg-2">
							<label>Celular: </label>
							<p class="form-control-static">
								<?=$showClient->tel2;?>
							</p>
						</div>


						<br clear="all">
						<hr>


						<div class="form-group col-lg-2">
							<label>CEP: </label>
							<p class="form-control-static">
								<?=$showClient->cep;?>
							</p>
						</div>

						<div class="form-group col-lg-2">
							<label>Endereço: </label>
							<p class="form-control-static">
								<?=$showClient->endereco;?>
							</p>
						</div>

						<div class="form-group col-lg-2">
							<label>Bairro: </label>
							<p class="form-control-static">
								<?=$showClient->bairro;?>
							</p>
						</div>

						<div class="form-group col-lg-2">
							<label>Cidade: </label>
							<p class="form-control-static">
								<?=$showClient->cidade;?>
							</p>
						</div>

						<div class="form-group col-lg-2">
							<label>Estado: </label>
							<p class="form-control-static">
								<?=$showClient->estado;?>
							</p>
						</div>


					</div>
				</div>
			</div>
		</div>

	</div>




	<?php
}
?>
