<?php

class editarClientes
{

	function getEditarClienteForm($idCliente, $nome, $sobrenome, $cpf, $email, $senha, $cep, $endereco, $bairro, $cidade, $estado, $tel, $cel)
	{
		$formulario = '
		<!-- Modal -->
		<div class="modal fade" id="EditarCliente_'.$idCliente.'" tabindex="1" role="dialog" aria-labelledby="EditarClienteLabel" style="text-align:left;">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="EditarClienteLabel">Editando Cliente</h4>
					</div>

					<form method="post" action="" id="ajax_form_editCliente_'.$idCliente.'">

						<div class="modal-body">
							<label>Nome: <input type="text" name="nome" required="required" class="form-control" value="'.$nome.'" ></label>
							<label>Sobrenome: <input type="text" name="sobrenome" class="form-control"  value="'.$sobrenome.'" ></label>
							<br>
							<label>CPF: <input type="text" name="cpf" required="required" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Digite o CPF no formato 123.456.789-01" class="form-control" value="'.$cpf.'" ></label>
							<hr />
							<label>Email: <input type="email" name="email" required="required" class="form-control" value="'.$email.'" ></label>
							<br>
							<label>Senha: <input type="password" name="senha" class="form-control" value="'.$senha.'" ></label>
							<hr />
							<h3>Dados pessoais <small> Não necessário o preenchimento</small></h3>
							<label>CEP: <input type="text" name="cep" class="form-control" value="'.$cep.'" ></label>
							<br>
							<label>Endereço: <input type="text" name="endereco" class="form-control" value="'.$endereco.'" ></label>
							<label>Bairro: <input type="text" name="bairro" class="form-control" value="'.$bairro.'" ></label>
							<label>Cidade: <input type="text" name="cidade" class="form-control" value="'.$cidade.'" ></label>
							<label>Estado: <input type="text" name="estado" size="2" class="form-control" value="'.$estado.'" ></label>
							<br>
							<label>Telefone: <input type="text" name="tel" class="form-control" value="'.$tel.'" ></label>
							<label>Celular: <input type="text" name="cel" class="form-control" value="'.$cel.'" ></label>

						</div>
						<div class="modal-footer">
							<label><input type="text" name="id" style="opacity:0;" class="form-control" value="'.$idCliente.'" ></label>
							<label><button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancelar</button></label>
							<label><input type="submit" class="btn btn-success" name="enviar" value="Salvar alterações" /></label>
						</div>

					</form>
				</div>
			</div>
		</div>
		';

		return $formulario;
	}


	function getEditarClienteJs($idClienteJs)
	{
		$js = "
		<script type='text/javascript'>
			$(document).ready(function(){
				$('#ajax_form_editCliente_".$idClienteJs."').validate({
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
							url: 'ajax/salvaEditarClientes.php',
							data: dados,
							success: function( data )
							{
								alert(data); window.location='?go=pages/administrativo/clientes';
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