<?php

class editarProdutos
{

	function getEditarProdutosForm($idproduto, $nomeproduto, $tipo, $valor, $tipolanchebebida)
	{

		$formulario = '
		<!-- Modal -->
		<div class="modal fade" id="EditarProdutos_'.$tipo.'_'.$idproduto.'" tabindex="1" role="dialog" aria-labelledby="EditarProdutosLabel" style="text-align:left;">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="EditarProdutosLabel">Editando produto ('.$nomeproduto.') </h4>
					</div>

					<form method="post" action="" id="ajax_form_editProduto_'.$tipo.'_'.$idproduto.'">

						<div class="modal-body">

							<label>Nome do produto:
								<input type="text" name="nomeProduto" required="required" class="form-control" value="'.$nomeproduto.'">
							</label>
							';
							if ($tipo === 'snack')
							{
								$type = '0';
								$descType = 'Lanches';
							}
							else
							{
								$type = '1';
								$descType = 'Bebibas';
							}

							$formulario .= '
							<label>Tipo:
								<select name="tipo" id="tipo" required="required" class="form-control">
									<option value="'.$type.'"> '.$descType.' </option>
									<option value=""> ------------ </option>
									<option value="0">Lanches</option>
									<option value="1">Bebidas</option>
								</select>
							</label>';

							if ($tipo === 'snack')
							{
								switch ($tipolanchebebida)
								{
									case '0':
									$lancheid = "0";
									$lanche = "Carne";
									break;
									case '1':
									$lancheid = "1";
									$lanche = "Frango";
									break;
									case '2':
									$lancheid = "2";
									$lanche = "Saladas";
									break;
									case '3':
									$lancheid = "3";
									$lanche = "Adicionais";
									break;
									case '4':
									$lancheid = "4";
									$lanche = "Molhos";
									break;
									case '5':
									$lancheid = "5";
									$lanche = "Outros";
									break;
									default:
									$lancheid = " ";
									$lanche = "ERROR";
									break;
								}

								$formulario .= '
								<label >Tipo do Lanche:
									<select name="tipoLanche" class="form-control">
										<option value="'.$lancheid.'"> '.$lanche.' </option>
										<option value=""> ------------ </option>
										<option value="0">Carne</option>
										<option value="1">Frango</option>
										<option value="2">Saladas</option>
										<option value="3">Adicionais</option>
										<option value="4">Molhos</option>
										<option value="5">Outros</option>
									</select>
								</label>
								';
							}
							else
							{
								switch ($tipolanchebebida)
								{
									case '0':
									$bebibaid = "0";
									$bebida = "Cervejas";
									break;
									case '1':
									$bebibaid = "2";
									$bebida = "Águas";
									break;
									case '2':
									$bebibaid = "1";
									$bebida = "Sucos";
									break;
									case '3':
									$bebibaid = "3";
									$bebida = "Refrigerantes";
									break;
									case '4':
									$bebibaid = "4";
									$bebida = "Outros";
									break;
									default:
									$bebibaid = " ";
									$bebida = "ERROR";
									break;
								}
								$formulario .= '
								<label >Tipo da Bebida:
									<select name="tipoBebida" class="form-control">
										<option value="'.$bebibaid.'"> '.$bebida.' </option>
										<option value=""> ------------ </option>
										<option value="0">Cerveja</option>
										<option value="2">Água</option>
										<option value="1">Suco</option>
										<option value="3">Refrigerante</option>
										<option value="4">Outros</option>
									</select>
								</label>
								';
							}
							$formulario .= '
							<label >Valor:
								<input type="text" name="valor" required="required" class="form-control" pattern="[0-9].[0-9][0-9]" value="'.$valor.'">
							</label>

						</div>
						<div class="modal-footer">
							<label><input type="text" name="idproduto" style="opacity:0;" class="form-control" value="'.$idproduto.'" ></label>
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


	function getEditarProdutosJs($idProdutoJs, $tipojs)
	{
		$js = "
		<script type='text/javascript'>
			$(document).ready(function(){
				$('#ajax_form_editProduto_".$tipojs."_".$idProdutoJs."').validate({
					rules: {
						idproduto: { required: true },
						nomeProduto: { required: true }

					},
					messages: {
						idproduto: { required: 'Preencha o campo id' },
						nomeProduto: { required: 'Preencha o nome do produto' }
					},
					submitHandler: function( form ){
						var dados = $( form ).serialize();

						$.ajax({
							type: 'POST',
							url: 'ajax/salvaEditarProdutos.php',
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