<?php

class deletarProdutos
{

	function getDeletarProdutosForm($idPedido, $tipo)
	{
		$formulario = '
		<!-- Modal -->
		<div class="modal fade" id="DeletarProdutos_'.$tipo.'_'.$idPedido.'" tabindex="1" role="dialog" aria-labelledby="deletarProdutoLabel" style="text-align:left;">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="deletarProdutoLabel">Deletar produto</h4>
					</div>

					<form method="post" action="" id="ajax_form_deletarProduto_'.$tipo.'_'.$idPedido.'">

						<div class="modal-body">
							<div class="alert alert-danger" role="alert"><p><b>Atenção</b></p> <p>Você estará prestes a deletar este protudo, você confirma esta ação?</p></div>

						</div>
						<div class="modal-footer">
							<label><input type="text" name="productIdToDelet" style="opacity:0;" class="form-control" value="'.$idPedido.'"></label>
							<label><input type="text" name="tipo" style="opacity:0;" class="form-control" value="'.$tipo.'"></label>
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


	function getDeletarProdutosJs($idPedidoJS, $tipojs)
	{
		$js = "
		<script type='text/javascript'>
			$(document).ready(function(){
				$('#ajax_form_deletarProduto_".$tipojs."_".$idPedidoJS."').validate({
					rules: {
						productIdToDelet: { required: true },
						tipo: { required: true }
					},
					messages: {
						requestIdToDelet: { required: 'Campo ID em branco' },
						tipo: { required: 'Campo tipo em branco' }
					},
					submitHandler: function( form ){
						var dados = $( form ).serialize();

						$.ajax({
							type: 'POST',
							url: 'ajax/salvaDeletarProdutos.php',
							data: dados,
							success: function( data )
							{
								alert(data); window.location='?go=pages/administrativo/produtos';
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