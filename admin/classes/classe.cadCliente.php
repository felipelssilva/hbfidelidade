<?php

class cadCliente
{

	function getClienteButton($tipo)
	{
		$button = '
		<!-- Button trigger modal -->
		';

		if($tipo == 't1')
		{
			$button .= '
			<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#NovoCliente">
				Novo Cadastro de Cliente
			</button>';
		}
		elseif ($tipo == 't2')
		{
			$button .= '
			<a id="btNovoCliente" data-target="#NovoCliente" data-toggle="modal"  class="btn btn-link">Novo Cliente?</a>
			';
		}

		$button .= '
		<br clear="all">
		<br clear="all">
		';

		return $button;
	}

	function getClienteForm()
	{
		$formulario = '
		<!-- Modal -->
		<div class="modal fade" id="NovoCliente" tabindex="1" role="dialog" aria-labelledby="NovoClienteLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="NovoClienteLabel">Novo Cliente</h4>
					</div>

					<form method="post" action="" id="ajax_form_cadCliente">

						<div class="modal-body">
							<label>Nome: <input type="text" name="nome" required="required" class="form-control" ></label>
							<label>Sobrenome: <input type="text" name="sobrenome" class="form-control"></label>
							<br>
							<label>CPF: <input type="text" name="cpf" required="required" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Digite o CPF no formato 999.999.999-99" class="form-control" placeholder="999.999.999-99"></label>
							<hr />
							<label>Email: <input type="email" name="email" required="required" class="form-control"></label>
							<br>
							<label>Senha: <input type="text" name="senha" value="123456" class="form-control"></label>
							<hr />
							<h3>Dados pessoais <small> Não necessário o preenchimento</small></h3>
							<label>CEP: <input type="text" name="cep" class="form-control"></label>
							<br>
							<label>Endereço: <input type="text" name="endereco" class="form-control"></label>
							<label>Bairro: <input type="text" name="bairro" class="form-control"></label>
							<label>Cidade: <input type="text" name="cidade" value="Uberaba" class="form-control"></label>
							<label>Estado: <input type="text" name="estado" value="MG" size="2" class="form-control"></label>
							<br>
							<label>Telefone: <input type="text" name="tel" class="form-control"></label>
							<label>Celular: <input type="text" name="cel" class="form-control"></label>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancelar</button>
							<label><input type="submit" class="btn btn-success" name="enviar" value="Cadastrar Cliente" /></label>
						</div>

					</form>
				</div>
			</div>
		</div>
		';

		return $formulario;
	}


	function getClienteJs()
	{
		$js = "
		<script type='text/javascript'>
			$(document).ready(function(){
				$('#ajax_form_cadCliente').validate({
					rules: {
						cpf: { required: true },
						nome: { required: true },
						email: { required: true }
					},
					messages: {
						cpf: { required: 'Preencha o campo CPF' },
						nome: { required: 'Informe o nome do cliente' },
						email: { required: 'Digite o email' }

					},
					submitHandler: function( form ){
						var dados = $( form ).serialize();

						$.ajax({
							type: 'POST',
							url: 'ajax/salvaClientes.php',
							data: dados,
							success: function( data )
							{
								alert(data);  window.location='?go=pages/administrativo/clientes';
							}
						});

						return false;
					}
				});
			});
		</script>
		";

		return $js;

	}

}



?>