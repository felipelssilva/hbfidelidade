<?php

class deletarPedidos
{

	function getDeletarPedidosForm($idPedido)
	{
		$formulario = '
		<!-- Modal -->
		<div class="modal fade" id="DeletarPedido_'.$idPedido.'" tabindex="1" role="dialog" aria-labelledby="deletarPedidoLabel" style="text-align:left;">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="deletarPedidoLabel">Deletar pedido</h4>
					</div>

					<form method="post" action="" id="ajax_form_deletarPedido_'.$idPedido.'">

						<div class="modal-body">
							<div class="alert alert-danger" role="alert"><p><b>Atenção</b></p> <p>Você estará prestes a deletar este pedido, você confirma esta ação?</p></div>

						</div>
						<div class="modal-footer">
							<label><input type="text" name="requestIdToDelet" style="opacity:0;" class="form-control" value="'.$idPedido.'"></label>
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


	function getDeletarPedidosJs($idPedidoJS)
	{
		$js = "
		<script type='text/javascript'>
			$(document).ready(function(){
				$('#ajax_form_deletarPedido_".$idPedidoJS."').validate({
					rules: {
						requestIdToDelet: { required: true }
					},
					messages: {
						requestIdToDelet: { required: 'Campo ID em branco' }
					},
					submitHandler: function( form ){
						var dados = $( form ).serialize();

						$.ajax({
							type: 'POST',
							url: 'ajax/salvaDeletarPedidos.php',
							data: dados,
							success: function( data )
							{
								alert(data); window.location='?go=pages/administrativo/pedidos';
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