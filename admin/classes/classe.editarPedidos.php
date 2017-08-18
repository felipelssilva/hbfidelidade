<?php

class editarPedidos
{

	function getEditarPedidosForm($idPedido, $idcliente, $nomecliente)
	{
		$formulario = '
		<!-- Modal -->
		<div class="modal fade" id="EditarPedido_'.$idPedido.'" tabindex="1" role="dialog" aria-labelledby="EditarClienteLabel" style="text-align:left;">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="EditarClienteLabel">Editando pedido ('.$idPedido.') </h4>
					</div>

					<form method="post" action="" id="ajax_form_editPedidos_'.$idPedido.'">

						<div class="modal-body">

							<label>Cliente:
								<select name="client" required readonly class="form-control">
									<option value="'.$idcliente.'" selected> '.$nomecliente.' </option>
								</select>
							</label>

							<br clear="all" />

							<label>Lanches:
								<select name="snack[]" multiple style="height:300px;" required="required" class="form-control">
									';

									$conec = mysqli_connect("localhost","root","123","hbfidelidade");

									$pegaTodosLanches2 = mysqli_query($conec , "SELECT * FROM hbfidelidade.snack ORDER BY id ASC") or die("erro [001]: pegaTodosLanches2");

									while($showAllSnack = mysqli_fetch_array($pegaTodosLanches2))
									{
										switch ($showAllSnack['type'])
										{
											case '0':
											$types = 'Carne';
											break;
											case '1':
											$types = 'Frango';
											break;
											case '2':
											$types = 'Saladas';
											break;
											case '3':
											$types = 'Adicionais';
											break;
											case '4':
											$types = 'Molhos';
											break;
											case '5':
											$types = 'Outros';
											break;
											default:
											$types = 'ERRO';
											break;
										}

										/*$pegaTodosPedidos = mysqli_query($conec, "SELECT c.id, rq.snackID FROM hbfidelidade.request AS rq LEFT JOIN hbfidelidade.client AS c ON rq.clientID=c.id WHERE c.trash = 0 AND rq.trash = 0 AND rq.snackID IS NOT NULL AND c.id = '".$idcliente."' ") or die ("erro [001]: pegaTodosPedidos");

										while($showAllOrder = mysqli_fetch_array($pegaTodosPedidos))
										{
											$formulario .= $showAllSnack['id'] == $showAllOrder[1] ? $selected = 'selected' : $selected = '' ;
										}

										'.$selected.'

										*/

										$formulario .= '
										<option value="'.$showAllSnack["id"].'"  >'.$showAllSnack["description"].' ('.$types.') ('.$showAllSnack["value"].' pts)</option>
										';
									}


									$formulario .= '
								</select>
							</label>
							<label>Bebibas:
								<select name="drink[]" multiple style="height:300px;" class="form-control">
									';
									$pegaTodosBebidas2 = mysqli_query($conec ,"SELECT * FROM hbfidelidade.drink ORDER BY id ASC") or die("erro [001]: pegaTodosBebidas2");

									while($showAllDrink = mysqli_fetch_array($pegaTodosBebidas2))
									{
										switch ($showAllDrink['type'])
										{
											case '0':
											$typed = 'Cerveja';
											break;
											case '1':
											$typed = 'Suco';
											break;
											case '2':
											$typed = 'Água';
											break;
											case '3':
											$typed = 'Refrigerante';
											break;
											default:
											$typed = 'ERRO';
											break;
										}

										$formulario .= '
										<option value="'.$showAllDrink["id"].'" >'.$showAllDrink["description"].' ('.$typed.') ('.$showAllDrink["value"].' pts)</option>
										';
									}

									$formulario .= '
								</select>
							</label>

						</div>
						<div class="modal-footer">
							<label><input type="text" name="requestId" style="opacity:0;" class="form-control" value="'.$idPedido.'" ></label>
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


		function getEditarPedidosJs($idPedidoJs)
		{
			$js = "
			<script type='text/javascript'>
				$(document).ready(function(){
					$('#ajax_form_editCliente_".$idPedidoJs."').validate({
						rules: {
							requestId: { required: true }
						},
						messages: {
							requestId: { required: 'Preencha o campo request id' }

						},
						submitHandler: function( form ){
							var dados = $( form ).serialize();

							$.ajax({
								type: 'POST',
								url: 'ajax/salvaEditarPedidos.php',
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