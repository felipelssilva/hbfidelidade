<?php

class cadProdutos
{

	function getProdutosForm()
	{
		$formulario = '
		<!-- Modal -->
		<div class="modal fade" id="NovoProduto" tabindex="-1" role="dialog" aria-labelledby="modalNovoProduto">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="modalNovoProduto">Novo produto</h4>
					</div>

					<form  method="post" action="" id="ajax_form_cadProdutos">

						<div class="modal-body">

							<label>Nome do produto:
								<input type="text" name="nomeProduto" required="required" class="form-control">
							</label>

							<label>Tipo:
								<select name="tipo" id="tipo" required="required" class="form-control">
									<option value=""> ------------ </option>
									<option value="0">Lanches</option>
									<option value="1">Bebidas</option>
								</select>
							</label>
							<label id="tipodoLanche" style="display: none;">Tipo do Lanche:
								<select name="tipoLanche" class="form-control">
									<option value=""> ------------ </option>
									<option value="0">Carne</option>
									<option value="1">Frango</option>
									<option value="2">Saladas</option>
									<option value="3">Adicionais</option>
									<option value="4">Molhos</option>
									<option value="5">Outros</option>
								</select>
							</label>
							<label id="tipodaBebida" style="display: none;">Tipo da Bebida:
								<select name="tipoBebida" class="form-control">
									<option value=""> ------------ </option>
									<option value="0">Cerveja</option>
									<option value="2">Água</option>
									<option value="1">Suco</option>
									<option value="3">Refrigerante</option>
									<option value="4">Outros</option>
								</select>
							</label>
							<label id="valoritem1" style="display: none;">Valor:
								<input type="number" name="valor" required="required" class="form-control" min="0" max="9999" value="0">
							</label>
							<label id="valoritem2" style="display: none;">Valor:
								<input type="number" name="valor" required="required" class="form-control" min="0" max="9999" value="0">
							</label>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancelar</button>
							<label><input type="submit" class="btn btn-success" name="enviar" value="Cadastrar produto" /></label>
						</div>

					</form>
				</div>
			</div>
		</div>
		';

		return $formulario;
	}


	function getProdutosJs()
	{
		$js = "
		<script type='text/javascript'>
			$(document).ready(function(){
				$('#ajax_form_cadProdutos').validate({
					rules: {
						nomeProduto: { required: true },
						tipo: { required: true },
						valor: { required: true }
					},
					messages: {
						nomeProduto: { required: 'Preencha o campo nome do produto' },
						tipo: { required: 'Informe o tipo do produto' },
						valor: { required: 'Informe o valor' }
					},
					submitHandler: function( form ){
						var dados = $( form ).serialize();

						$.ajax({
							type: 'POST',
							url: 'ajax/salvaProdutos.php',
							data: dados,
							success: function( data )
							{
								alert(data);  window.location='?go=pages/administrativo/produtos';
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