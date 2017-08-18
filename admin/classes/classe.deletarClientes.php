<?php

class deletarClientes
{

	function getDeletarClienteForm($idCliente)
	{
		$formulario = '
		<!-- Modal -->
		<div class="modal fade" id="DeletarCliente_'.$idCliente.'" tabindex="1" role="dialog" aria-labelledby="deletarClienteLabel" style="text-align:left;">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="deletarClienteLabel">Deletar usuario</h4>
					</div>

					<form method="post" action="" id="ajax_form_deletarCliente_'.$idCliente.'">

						<div class="modal-body">
							<div class="alert alert-danger" role="alert"><p><b>Atenção</b></p> <p>Você estará prestes a deletar este usuario, você confirma esta ação?</p></div>

						</div>
						<div class="modal-footer">
							<label><input type="text" name="idDelet" style="opacity:0;" class="form-control" value="'.$idCliente.'"></label>
							<label><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button></label>
							<label><input type="submit" class="btn btn-danger" name="enviar" value="Deletar" /></label>
						</div>

					</form>
				</div>
			</div>
		</div>
		';

		return $formulario;
	}


	function getDeletarClienteJs($idClienteJS)
	{
		$js = "
		<script type='text/javascript'>
			$(document).ready(function(){
				$('#ajax_form_deletarCliente_".$idClienteJS."').validate({
					rules: {
						idDelet: { required: true }
					},
					messages: {
						idDelet: { required: 'Campo ID em branco' }
					},
					submitHandler: function( form ){
						var dados = $( form ).serialize();

						$.ajax({
							type: 'POST',
							url: 'ajax/salvaDeletarClientes.php',
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