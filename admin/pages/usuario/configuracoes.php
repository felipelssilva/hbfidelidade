<?php
if($_SESSION['usuario'] and $_SESSION['senha'])
{
	?>



	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Minhas configurações</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-bar-chart-o fa-fw"></i> Configurações da conta
					</div>
					<div class="panel-body">


						<form method="post" action="" id="ajax_form_configuracoes">

							<div class="form-group col-lg-2">
								<label>Nome:</label>
								<input type="text" name="nome" required="required" class="form-control" value="<?=$showClient->nome;?>">
							</div>

							<div class="form-group col-lg-2">
								<label>Sobrenome:</label>
								<input type="text" name="sobrenome" required="required" class="form-control" value="<?=$showClient->sobrenome;?>">
							</div>

							<div class="form-group col-lg-2">
								<label>CPF: </label>
								<input type="text" name="cpf" required="required" class="form-control" value="<?=$showClient->cpf;?>">
							</div>

							<br clear="all">

							<div class="form-group col-lg-2">
								<label>Email: </label>
								<input type="text" name="email" class="form-control" disabled value="<?=$showClient->email;?>">
							</div>

							<div class="form-group col-lg-2">
								<label>Telefone: </label>
								<input type="text" name="tel1" required="required" class="form-control" value="<?=$showClient->tel1;?>">
							</div>

							<div class="form-group col-lg-2">
								<label>Celular: </label>
								<input type="text" name="tel2" required="required" class="form-control" value="<?=$showClient->tel2;?>">
							</div>


							<br clear="all">
							<hr>


							<div class="form-group col-lg-2">
								<label>CEP: </label>
								<input type="text" name="cep" required="required" class="form-control" value="<?=$showClient->cep;?>">
							</div>

							<div class="form-group col-lg-2">
								<label>Endereço: </label>
								<input type="text" name="endereco" required="required" class="form-control" value="<?=$showClient->endereco;?>">
							</div>

							<div class="form-group col-lg-2">
								<label>Bairro: </label>
								<input type="text" name="bairro" required="required" class="form-control" value="<?=$showClient->bairro;?>">
							</div>

							<br clear="all">

							<div class="form-group col-lg-2">
								<label>Cidade: </label>
								<input type="text" name="cidade" required="required" class="form-control" value="<?=$showClient->cidade;?>">
							</div>

							<div class="form-group col-lg-2">
								<label>Estado: </label>
								<input type="text" name="estado" required="required" class="form-control" value="<?=$showClient->estado;?>">
							</div>

							<br clear="all">
							<hr>

							<div class="form-group col-lg-12">
								<label><input type="submit" class="btn btn-success" name="enviar" value="Salvar configurações" /></label>
																<input type="text" name="iduser" style="opacity: 0;" value="<?=$showClient->id;?>">

							</div>

						</form>


					</div>
				</div>
			</div>
		</div>

	</div>




	<?
}
?>
